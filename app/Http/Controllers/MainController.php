<?php

namespace App\Http\Controllers;

use App\Domain\Enums\StagesEnum;
use App\Services\Abstracts\StageInterface;
use App\Services\Abstracts\VectorInterface;
use Illuminate\Contracts\View\View;

class MainController extends Controller
{
    public function __construct(
        private StageInterface  $stageService,
        private VectorInterface $vectorService,
    )
    {
    }

    /**
     * Определяет какая из траниц отобразится в зависимости от прогресса
     *
     * @return View
     */
    //TODO: Завести ДТОху для stage и progress
    public function start(): View
    {
        $stage = $this->stageService->getCurrentStage();
        $progress = $stage->slug !== StagesEnum::ALTERNATIVES_EXPERT1->value;

        return view('index',
            [
                'progress' => $progress,
                'stage' => $stage,
            ]
        );
    }

    public function currentStage()
    {
        dd('aaaaaaaaaaaaaaa');
    }

    public function nextStage()
    {

    }

    private function quickMath()
    {

    }
}
