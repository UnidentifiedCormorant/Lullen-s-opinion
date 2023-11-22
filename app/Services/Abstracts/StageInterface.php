<?php

namespace App\Services\Abstracts;

use App\Models\Stage;

interface StageInterface
{
    /**
     * Возвращает текущую стадию
     *
     * @return Stage
     */
    public function getCurrentStage(): Stage;
}
