<?php

namespace App\Repositories\Abstracts;

use Illuminate\Database\Eloquent\Collection;
use Prettus\Repository\Contracts\RepositoryInterface;

interface VectorRepositoryInterface extends RepositoryInterface
{
    /**
     * Получить все векторы для выбранного эксперта
     *
     * @param int $expertNumber
     * @return Collection
     */
    public function getVectorsForExpert(int $expertNumber): Collection;
}
