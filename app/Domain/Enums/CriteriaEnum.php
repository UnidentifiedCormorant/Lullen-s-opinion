<?php

namespace App\Domain\Enums;

enum CriteriaEnum: string
{
    use EnumTrait;

    case DEVELOPMENT_TIME = 'Время разработки';
    case COMPLEXITY_OF_DEVELOPMENT = 'Сложность разработки';
    case TECHNOLOGICAL_CAPABILITIES = 'Технологические возможности';
    case DEMAND_EXPERT = 'Спрос';
    case COMPLEXITY_OF_IMPLEMENTATION = 'Сложность внедрения';

    public static function toArray(): array
    {
        return array_column(CriteriaEnum::cases(), 'value');
    }
}
