<?php

namespace App\Services;

use App\Domain\Entities\StageEntity;
use App\Domain\Entities\StartPageEntity;
use App\Domain\Enums\AlternativesEnum;
use App\Domain\Enums\CriteriaEnum;
use App\Domain\Enums\StagesEnum;
use App\Repositories\Abstracts\StageRepositoryInterface;
use App\Services\Abstracts\StageInterface;

class StageService implements StageInterface
{
    public function __construct(
        private StageRepositoryInterface $stageRepository
    ){}

    public function completeStage(): void
    {
        $stage = $this->stageRepository->getCurrentStage();

        $stage->update([
            'completed' => true,
        ]);
    }

    /**
     * @inheritdoc
     */
    public function getCurrentStageData(): StageEntity
    {
        $stage = $this->stageRepository->getCurrentStage();

        $buttonTitles = match ($stage->slug){
            StagesEnum::ALTERNATIVES_EXPERT1->value => CriteriaEnum::toArray(),
            StagesEnum::ALTERNATIVES_EXPERT2->value => CriteriaEnum::toArray(),
            default => AlternativesEnum::toArray(),
        };

        return new StageEntity(
            stage: $stage,
            buttonsTitles: $buttonTitles,
        );
    }

    /**
     * @inheritdoc
     */
    public function getStartPageData(): StartPageEntity
    {
        $stage = $this->stageRepository->getCurrentStage();

        return new StartPageEntity(
            progress: $stage->slug !== StagesEnum::ALTERNATIVES_EXPERT1->value,
            stage: $stage,
        );
    }
}
