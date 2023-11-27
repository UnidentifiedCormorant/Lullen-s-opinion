<?php

namespace App\Http\Controllers;

use App\Services\Abstracts\StageInterface;
use App\Services\Abstracts\VectorInterface;
use Database\Seeders\DatabaseSeeder;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

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
        $seeder = new DatabaseSeeder();
        $seeder->run();

        return redirect()->route('currentStage');
    }

    /**
     * Определяет какая из сатртовых страниц отобразится в зависимости от прогресса и возвращает
     *
     * @return View
     */
    public function startPage(): View
    {
        return view(
            'index',
            ['startPageData' => $this->stageService->getStartPageData(),]
        );
    }

    /**
     * Отправляет сраницу с последней незавершённой стадией
     *
     * @return View
     */
    public function currentStage(): View
    {
        return view(
            'stage',
            ['stageData' => $this->stageService->getCurrentStageData()]
        );
    }

    public function nextStage(Request $request)
    {
        dd($request->all());
    }

    private function quickMath()
    {

    }
}
