<?php

namespace App\Domain\Enums;

enum StagesEnum: string
{
    case ALTERNATIVES_EXPERT1 = 'alternativesExpert1';
    case ALTERNATIVES_EXPERT2 = 'alternativesExpert2';
    case DEVELOPMENT_TIME_EXPERT1 = 'developmentTimeExpert1';
    case DEVELOPMENT_TIME_EXPERT2 = 'developmentTimeExpert2';
    case COMPLEXITY_OF_IMPLEMENTATION_EXPERT1 = 'complexityOfImplementationExpert1';
    case COMPLEXITY_OF_IMPLEMENTATION_EXPERT2 = 'complexityOfImplementationExpert2';
    case TECHNOLOGICAL_CAPABILITIES_EXPERT1 = 'technologicalCapabilitiesExpert1';
    case TECHNOLOGICAL_CAPABILITIES_EXPERT2 = 'technologicalCapabilitiesExpert2';
    case DEMAND_EXPERT1 = 'demandExpert1';
    case DEMAND_EXPERT2 = 'demandExpert2';
    case COMPLEXITY_OF_DEVELOPMENT_EXPERT1 = 'complexityOfDevelopmentExpert1';
    case COMPLEXITY_OF_DEVELOPMENT_EXPERT2 = 'complexityOfDevelopmentExpert2';
    case FINAL = 'final';

    public function getSlug(): string
    {
        return match ($this){
            StagesEnum::ALTERNATIVES_EXPERT1 => 'alternativesExpert1',
            StagesEnum::ALTERNATIVES_EXPERT2 => 'alternativesExpert2',
            StagesEnum::DEVELOPMENT_TIME_EXPERT1 => 'developmentTimeExpert1',
            StagesEnum::DEVELOPMENT_TIME_EXPERT2 => 'developmentTimeExpert2',
            StagesEnum::COMPLEXITY_OF_IMPLEMENTATION_EXPERT1 => 'complexityOfImplementationExpert1',
            StagesEnum::COMPLEXITY_OF_IMPLEMENTATION_EXPERT2 => 'complexityOfImplementationExpert2',
            StagesEnum::TECHNOLOGICAL_CAPABILITIES_EXPERT1 => 'technologicalCapabilitiesExpert1',
            StagesEnum::TECHNOLOGICAL_CAPABILITIES_EXPERT2 => 'technologicalCapabilitiesExpert2',
            StagesEnum::DEMAND_EXPERT1 => 'demandExpert1',
            StagesEnum::DEMAND_EXPERT2 => 'demandExpert2',
            StagesEnum::COMPLEXITY_OF_DEVELOPMENT_EXPERT1 => 'complexityOfDevelopmentExpert1',
            StagesEnum::COMPLEXITY_OF_DEVELOPMENT_EXPERT2 => 'complexityOfDevelopmentExpert2',
            StagesEnum::FINAL => 'final',
        };
    }
}
