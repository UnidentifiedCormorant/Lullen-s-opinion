<?php

namespace App\Repositories\Abstracts;

use App\Models\Stage;
use Prettus\Repository\Contracts\RepositoryInterface;

interface StageRepositoryInterface extends RepositoryInterface
{
    /**
     * Получить текущую стадию
     *
     * @return Stage
     */
    public function getCurrentStage(): Stage;
}
