<?php

namespace App\Domain\Enums;

enum AlternativesEnum: string
{
    use EnumTrait;

    case ANGULAR = 'Angular';
    case REACTJD = 'React.js';
    case VUEJS = 'Vue.js';
    case DOJO2 = 'Dojo 2';
    case EMBER = 'Ember';

    public static function toArray(): array
    {
        return array_column(AlternativesEnum::cases(), 'value');
    }
}
