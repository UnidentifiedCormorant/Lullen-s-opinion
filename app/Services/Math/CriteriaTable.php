<?php

namespace App\Services\Math;

class CriteriaTable
{
    const MATRIX_SIZE = 5;
    const RANDOM_INDEX = 1.12;
    const CONSISTENCY_RELATIONSHIP_BORDER = 0.1;

    public array $matrix;
    public array $compositions;
    public array $sums;
    public array $weights;
    public float $lambdaMax;
    public float $consistencyIndex;
    public float $consistencyRelationship;

    public function __construct(array $grouped)
    {
        $this->matrix = $grouped;
        $this->compositions = $this->countCompositions(); //Считаем произведения по строкам
        $this->sums = $this->countSums(); //Считаем суммы по столбцам
        $this->weights = $this->countWeights(); //Считаем веса
        $this->lambdaMax = $this->countLambdaMax(); //Считаем λmax (собственное значение матрицы)
        $this->consistencyIndex = $this->countConsistencyIndex(); //Считаем индекс согласованности
        $this->consistencyRelationship = $this->consistencyIndex / self::RANDOM_INDEX; //Считаем отношение согласованности
    }

    /**
     * Проверяет, вписались ли мы по отношению согласованности (должно быть меньше 0,1)
     *
     * @return bool
     */
    public function checkConsistencyRelationship(): bool
    {
        if(config('app.consistency_checking')){
            return $this->consistencyRelationship < self::CONSISTENCY_RELATIONSHIP_BORDER;
        }

        return true;
    }

    /**
     * Посчитать индекс согласованности
     *
     * @return float
     */
    private function countConsistencyIndex(): float
    {
        return (abs($this->lambdaMax - 5)) / (5 - 1);
    }

    /**
     * Посчитать λmax
     *
     * @return float
     */
    private function countLambdaMax(): float
    {
        $result = 0;

        for($i = 0; $i < self::MATRIX_SIZE; $i++){
            $result += $this->sums[$i] * $this->weights[$i];
        }

        return $result;
    }

    /**
     * Посчитать веса
     *
     * @return array
     */
    private function countWeights(): array
    {
        $weights = [];

        $compositionsSum = array_sum($this->compositions);

        foreach ($this->compositions as $composition){
            $weights[] = (float)($composition / $compositionsSum);
        }

        return $weights;
    }

    /**
     * Посчитать суммы по столбцам
     *
     * @return array
     */
    private function countSums(): array
    {
        $sums = [0, 0, 0, 0, 0];

        for($i = 0; $i < self::MATRIX_SIZE; $i++){
            foreach ($this->matrix as $horizontalVector){
                $sums[$i] += $horizontalVector[$i];
            }
        }

        return $sums;
    }

    /**
     * Посчитать произведения по строкам
     *
     * @return array
     */
    private function countCompositions(): array
    {
        $multiply = function (array $numbers){
            $result = 1;

            foreach ($numbers as $number){
                $result *= $number;
            }

            return $result;
        };

        return array_map($multiply, $this->matrix);
    }
}
