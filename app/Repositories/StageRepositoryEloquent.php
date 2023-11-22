<?php

namespace App\Repositories;

use App\Models\Stage;
use App\Repositories\Abstracts\StageRepositoryInterface;
use Prettus\Repository\Eloquent\BaseRepository;

class StageRepositoryEloquent extends BaseRepository implements StageRepositoryInterface
{
    /**
     * @return string
     */
    public function model()
    {
        return Stage::class;
    }

    /**
     * Получить текущую стадию
     *
     * @return Stage
     */
    public function getCurrentStage(): Stage
    {
        return $this->model
            ->where('completed', false)
            ->first();
    }
}
