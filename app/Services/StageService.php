<?php

namespace App\Services;

use App\Models\Stage;
use App\Repositories\Abstracts\StageRepositoryInterface;
use App\Services\Abstracts\StageInterface;

class StageService implements StageInterface
{
    public function __construct(
        private StageRepositoryInterface $stageRepository
    ){}

    /**
     * @inheritdoc
     */
    public function getCurrentStage(): Stage
    {
        return $this->stageRepository->getCurrentStage();
    }
}
