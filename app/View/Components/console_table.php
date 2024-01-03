<?php

namespace App\View\Components;

use App\Domain\Entities\StageConsoleLogEntity;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class console_table extends Component
{
    /**
     * Create a new component instance.
     */
    public function __construct(
        public StageConsoleLogEntity $log,
    )
    {
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View
    {
        return view('Я такой, какой я есть, и я буду таким до тех пор, пока не изменюсь');
    }
}
