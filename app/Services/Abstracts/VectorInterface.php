<?php

namespace App\Services\Abstracts;

use App\Domain\Entities\FinalStageEntity;
use App\Domain\Entities\StageConsoleLogEntity;
use Illuminate\Support\Collection;

interface VectorInterface
{
    /**
     * Посчитать таблицу, проверить отношение согласованности, занести в БД, отдать следующую вьюху уже с логами
     * ...но только в том случае, если относительная согласованность позволяет
     *
     * @param Collection $data
     * @return bool
     */
    public function nextStage(Collection $data): bool;

    /**
     * Получить консольные логи для текущей стадии
     *
     * @return Collection<int, StageConsoleLogEntity>
     */
    public function getConsoleLogs(): Collection;

    /**
     * Упаковка для вьюхи + определение "победителя"
     *
     * @return FinalStageEntity
     */
    public function getFinalStageData(): FinalStageEntity;
}
