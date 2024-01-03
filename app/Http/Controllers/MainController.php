<?php

namespace App\Http\Controllers;

use App\Domain\Enums\StagesEnum;
use App\Http\Requests\StageRequest;
use App\Services\Abstracts\StageInterface;
use App\Services\Abstracts\VectorInterface;
use Database\Seeders\DatabaseSeeder;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Redirect;

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
     * Определяет какая из стартовых страниц отобразится в зависимости от прогресса и возвращает
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
     * Отправляет страницу с последней незавершённой стадией
     *
     * @return View
     */
    public function currentStage(): View
    {
        $stageData = $this->stageService->getCurrentStageData();
        $consoleLogs = $this->vectorService->getConsoleLogs();

        if($stageData->stage->slug == StagesEnum::FINAL->value){
            return view(
                'final',
                [
                    'consoleLogs' => $consoleLogs,
                    'finalData' => $this->vectorService->getFinalStageData(),
                ]
            );
        }

        return view(
            'stage',
            [
                'stageData' => $stageData,
                'consoleLogs' => $consoleLogs,
            ]
        );
    }

    /**
     * Посчитать таблицу, проверить отношение согласованности, занести в БД, отдать следующую вьюху уже с логами
     *
     * @param StageRequest $request
     * @return RedirectResponse
     */
    public function nextStage(StageRequest $request): RedirectResponse
    {
        $data = collect($request->toArray());
        $data->forget('_token');

        if($this->vectorService->nextStage($data)){
            return Redirect::route('currentStage');
        }
        return Redirect::back()->with('consistency_relationship_error', 'Нарушена логичность суждений, пожалуйста пересмотрите данные, чтобы улучшить однородность');
    }
}
