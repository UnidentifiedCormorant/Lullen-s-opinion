<?php

namespace App\Services;

use App\Domain\Entities\StageEntity;
use App\Domain\Entities\StartPageEntity;
use App\Domain\Enums\StagesEnum;
use App\Facades\StageHelper;
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

        return new StageEntity(
            stage: $stage,
            buttonsTitles: StageHelper::getStageTitles($stage),
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
