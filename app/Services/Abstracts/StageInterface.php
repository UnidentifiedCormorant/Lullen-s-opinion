<?php

namespace App\Services\Abstracts;

use App\Domain\Entities\StageEntity;
use App\Domain\Entities\StartPageEntity;
use App\Models\Stage;

interface StageInterface
{
    /**
     * Возвращает данные для страницы с текущей стадией
     *
     * @return StageEntity
     */
    public function getCurrentStageData(): StageEntity;

    /**
     * Получить данные для стартовой страницы
     *
     * @return StartPageEntity
     */
    public function getStartPageData(): StartPageEntity;
}
