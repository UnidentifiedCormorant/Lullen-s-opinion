<?php

namespace App\Facades;

use App\Domain\Enums\AlternativesEnum;
use App\Domain\Enums\CriteriaEnum;
use App\Domain\Enums\StagesEnum;
use App\Models\Stage;
use Illuminate\Support\Facades\Facade;

class StageHelper extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'StageHelper';
    }

    /**
     * Получить надписи для кнопок или столбцов/строк таблицы в зависимости от стадии
     *
     * @param Stage $stage
     * @return array
     */
    protected static function getStageTitles(Stage $stage): array
    {
        return match ($stage->slug){
            StagesEnum::ALTERNATIVES_EXPERT1->value => CriteriaEnum::toArray(),
            StagesEnum::ALTERNATIVES_EXPERT2->value => CriteriaEnum::toArray(),
            default => AlternativesEnum::toArray(),
        };
    }
}
