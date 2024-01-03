<?php

namespace App\Domain\Entities;

use App\Domain\Enums\AlternativesEnum;

class ExpertSummary
{
    public float $maxFinalWeight;
    public string $selectedAlternative;

    public function __construct
    (
        public int $expertNumber,
        public array $weights,
        public array $finalWeights,
    )
    {
        $this->maxFinalWeight = max($this->finalWeights);
        $this->selectedAlternative = AlternativesEnum::toArray()[
                array_search(
                    $this->maxFinalWeight,
                    $this->finalWeights
                )
            ];
    }
}
