<?php

namespace App\Services;

use App\Domain\Entities\ExpertSummary;
use App\Domain\Entities\FinalStageEntity;
use App\Domain\Entities\StageConsoleLogEntity;
use App\Facades\StageHelper;
use App\Repositories\Abstracts\StageRepositoryInterface;
use App\Repositories\Abstracts\VectorRepositoryInterface;
use App\Services\Abstracts\VectorInterface;
use App\Services\Math\CriteriaTable;
use Illuminate\Support\Collection;

class VectorService implements VectorInterface
{
    public function __construct(
        public VectorRepositoryInterface $vectorRepository,
        public StageRepositoryInterface $stageRepository,
    )
    {
    }

    /**
     * @inheritdoc
     */
    public function nextStage(Collection $data): bool
    {
        //Проверяем не последняя ли это стадия

        //Группируем по окончаниям имён параметров, в группе номер критерия + его рейтинг
        $grouped = $data->groupBy(function (string $item, string $key) {
            return substr($key, -3, 3);
        });

        //Считаем ВСЁ
        $criteriaTable = new CriteriaTable($this->fillMatrix($grouped));

        if($criteriaTable->checkConsistencyRelationship()) {

            //Заносим всё что есть в БД
            $stage = $this->stageRepository->getCurrentStage();

            foreach ($criteriaTable->matrix as $horizontalVector) {

                //TODO: А можно и покрасивше написать всё-таки...
                $this->vectorRepository->create([
                    'stage_id' => $stage->id,
                    'slot_1' => $horizontalVector[0],
                    'slot_2' => $horizontalVector[1],
                    'slot_3' => $horizontalVector[2],
                    'slot_4' => $horizontalVector[3],
                    'slot_5' => $horizontalVector[4],
                ]);
            }

            //Завершаем стадию
            $this->stageRepository->update(
                ['completed' => true],
                $stage->id
            );

            return true;
        }

        return false;
    }

    /**
     * @inheritdoc
     */
    public function getConsoleLogs(): Collection
    {
        $vectors = $this->vectorRepository->all();

        $logs = collect([]);

        foreach ($vectors->groupBy('stage_id') as $stageVectors){
            $logs->push(
                new StageConsoleLogEntity(
                    $stageVectors->first()->stage,
                    StageHelper::getStageTitles($stageVectors->first()->stage),
                    new CriteriaTable($this->vectorsToMatrix($stageVectors)),
                )
            );
        }

        return $logs;
    }

    /**
     * @inheritdoc
     */
    public function getFinalStageData(): FinalStageEntity
    {
        return new FinalStageEntity(
            $this->getFinalDataForExpert(1),
            $this->getFinalDataForExpert(2),
        );
    }

    /**
     * Считает сводных таблицы для весов для обоих экспертов, считает финальные веса, определяет чьё мнение ближе к истине
     *
     * @param int $expertNumber
     * @return ExpertSummary
     */
    private function getFinalDataForExpert(int $expertNumber): ExpertSummary
    {
        //TODO: Формируем сводную таблицу для обоих экспертов
        // в сводную летят веса со всех стадий, кроме сравнения критериев для каждого эксперта
        // впоследствии считаются финальные веса, как матричное умножение всей таблицы весов на веса после сравнения критериев
        // положение самого большого числа в этом векторе соответствует критерию, который выбрал эксперт

        //Получаем векторы для эксперта и считаем из них объекты таблиц критериев, формируем их всего этого дела массив
        $expertVectors = [];
        foreach ($this->vectorRepository->getVectorsForExpert($expertNumber)->groupBy('stage_id') as $stageVectors){
            $criteriaTable = new CriteriaTable($this->vectorsToMatrix($stageVectors));
            $expertVectors[] = $criteriaTable->weights;
        }

        //Получаем веса, полученные после сравнения критериев
        $criteriaWeights = $expertVectors[0];

        //Получаем веса, полученные от сравнения альтернатив по критериям
        $weightsMatrix = [
            $expertVectors[1],
            $expertVectors[2],
            $expertVectors[3],
            $expertVectors[4],
            $expertVectors[5],
        ];

        //Формируем правильную матрицу сводной таблицы
        $weightsMatrixTransported = $this->initEmptyMatrix();
        for ($i = 0; $i < 5; $i++){
            for ($j = 0; $j < 5; $j++){
                $weightsMatrixTransported[$i][$j] = $weightsMatrix[$j][$i];
            }
        }

        //Прокрутить матричное умножение между $weightsMatrixTransported и $criteriaWeights
        $finalWeights = [];
        for ($i = 0; $i < 5; $i++){
            $weight = 0;
            for ($j = 0; $j < 5; $j++) {
                $weight += $weightsMatrixTransported[$i][$j] * $criteriaWeights[$j];
            }
            $finalWeights[] = $weight;
        }

        return new ExpertSummary(
            $expertNumber,
            $weightsMatrixTransported,
            $finalWeights,
        );
    }

    /**
     * Заполнить матрицу значениями
     *
     * @param Collection $grouped
     * @return array
     */
    private function fillMatrix(Collection $grouped): array
    {
        $matrix = $this->initEmptyMatrix(); //Формируем матрицу 5х5 из единиц

        foreach ($grouped as $value => $group) {
            $criteria = (int)$group[0]; //Адекватно именуем переменные
            $rate = (int)$group[1];

            //Определяем какой из критериев выбран
            $arrayIndexes = $this->parseGroupNameToArrayIndexes($value);

            //Заполняем ячейку матрицы и "противоположную" ячейку матрицы
            if ($arrayIndexes->first == $criteria) {
                $matrix[$arrayIndexes->first][$arrayIndexes->second] = $rate;
                $matrix[$arrayIndexes->second][$arrayIndexes->first] = (float)(1 / $rate);
            } else {
                $matrix[$arrayIndexes->second][$arrayIndexes->first] = $rate;
                $matrix[$arrayIndexes->first][$arrayIndexes->second] = (float)(1 / $rate);
            }
        }

        return $matrix;
    }

    /**
     * Получить номера критериев из названия группы
     *
     * @param string $value
     * @return object
     */
    private function parseGroupNameToArrayIndexes(string $value): object
    {
        return (object)[
            'first' => (int)substr($value, 0, -2),
            'second' => (int)substr($value, -1),
        ];
    }

    /**
     * Формирует единичную матрицу
     *
     * @return \int[][]
     */
    private function initEmptyMatrix(): array
    {
        return [
            [1, 1, 1, 1, 1],
            [1, 1, 1, 1, 1],
            [1, 1, 1, 1, 1],
            [1, 1, 1, 1, 1],
            [1, 1, 1, 1, 1],
        ];
    }

    /**
     * Преобразовать набор векторов в матрицу, угодную для инициализации объекта
     *
     * @param Collection $stageVectors
     * @return array
     */
    private function vectorsToMatrix(Collection $stageVectors): array
    {
        $matrix = [];

        foreach ($stageVectors as $stageVector){
            $vector = [
                $stageVector->slot_1,
                $stageVector->slot_2,
                $stageVector->slot_3,
                $stageVector->slot_4,
                $stageVector->slot_5,
            ];
            $matrix[] = $vector;
        }

        return $matrix;
    }
}
