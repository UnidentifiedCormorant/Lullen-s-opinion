<?php

namespace App\Domain\Enums;

enum AlternativesEnum: string
{
    use EnumTrait;

    case ANGULAR = 'Angular';
    case REACTJD = 'React.js';
    case VUEJS = 'Vue.j';
    case DOJO2 = 'Dojo 2';
    case EMBER = 'Ember';

    public static function toArray(): array
    {
        return array_column(AlternativesEnum::cases(), 'value');
    }
//    public function toArray(): string
//    {
//        return match ($this){
//            StagesEnum::ALTERNATIVES_EXPERT1 => 'alternativesExpert1',
//            StagesEnum::ALTERNATIVES_EXPERT2 => 'alternativesExpert2',
//            StagesEnum::DEVELOPMENT_TIME_EXPERT1 => 'developmentTimeExpert1',
//            StagesEnum::DEVELOPMENT_TIME_EXPERT2 => 'developmentTimeExpert2',
//            StagesEnum::COMPLEXITY_OF_IMPLEMENTATION_EXPERT1 => 'complexityOfImplementationExpert1',
//            StagesEnum::COMPLEXITY_OF_IMPLEMENTATION_EXPERT2 => 'complexityOfImplementationExpert2',
//            StagesEnum::TECHNOLOGICAL_CAPABILITIES_EXPERT1 => 'technologicalCapabilitiesExpert1',
//            StagesEnum::TECHNOLOGICAL_CAPABILITIES_EXPERT2 => 'technologicalCapabilitiesExpert2',
//            StagesEnum::DEMAND_EXPERT1 => 'demandExpert1',
//            StagesEnum::DEMAND_EXPERT2 => 'demandExpert2',
//            StagesEnum::COMPLEXITY_OF_DEVELOPMENT_EXPERT1 => 'complexityOfDevelopmentExpert1',
//            StagesEnum::COMPLEXITY_OF_DEVELOPMENT_EXPERT2 => 'complexityOfDevelopmentExpert2',
//        };
//    }
}
