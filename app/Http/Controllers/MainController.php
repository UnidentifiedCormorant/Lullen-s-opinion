<?php

namespace App\Http\Controllers;

use App\Domain\Enums\AlternativesEnum;
use App\Domain\Enums\CriteriaEnum;
use App\Services\Abstracts\StageInterface;
use App\Services\Abstracts\VectorInterface;
use Database\Seeders\DatabaseSeeder;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;

class MainController extends Controller
{
    public function __construct(
        private StageInterface  $stageService,
        private VectorInterface $vectorService,
    )
    {
    }

    /**
     * Удаляет весь прогресс и отправляет на первую стадию
     *
     * @return RedirectResponse
     */
    public function newGame(): RedirectResponse
    {
        dd('так, падажжи ёбана');

        $seeder = new DatabaseSeeder();
        $seeder->run();

        return redirect()->route('currentStage');
    }

    /**
     * Определяет какая из страниц отобразится в зависимости от прогресса
     *
     * @return View
     */
    public function start(): View
    {
        return view(
            'index',
            ['startPageData' => $this->stageService->getStartPageData(),]
        );
    }


    public function currentStage()
    {
        dd($this->stageService->getCurrentStageData());

        return view(
            'stage',
            ['stageData' => $this->stageService->getCurrentStageData()]
        );
    }

    public function nextStage()
    {

    }

    private function quickMath()
    {

    }
}
