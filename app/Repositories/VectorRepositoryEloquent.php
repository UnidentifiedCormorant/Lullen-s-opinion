<?php

namespace App\Repositories;

use App\Models\Stage;
use App\Models\Vector;
use App\Repositories\Abstracts\StageRepositoryInterface;
use App\Repositories\Abstracts\VectorRepositoryInterface;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Prettus\Repository\Eloquent\BaseRepository;

class VectorRepositoryEloquent extends BaseRepository implements VectorRepositoryInterface
{
    /**
     * @return string
     */
    public function model()
    {
        return Vector::class;
    }

    /**
     * @inheritdoc
     */
    public function getVectorsForExpert(int $expertNumber): Collection
    {
        return $this->model->newQuery()->whereHas('stage', function (Builder $query) use ($expertNumber){
            $query->where('expert', $expertNumber);
        })->get();
    }
}
