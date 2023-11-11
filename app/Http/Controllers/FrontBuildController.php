<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Contracts\Foundation\Application as FoundationApplication;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Foundation\Application;
use Illuminate\Http\Request;

class FrontBuildController extends Controller
{
    /**
     * Возвращает вьюху по её названию
     * Сразу смотрит в папку front-build
     * Пример роута, если вьюха в папке: http://127.0.0.1:8000/view/deep.deeper.deepest
     * Когда разберёшься как работает - файл try.blade.php и папку deep можно удалить
     *
     * @param string $view
     * @return View
     */
    public function ShowView(string $view): View
    {
        return view('front-build.' . $view);
    }
}
