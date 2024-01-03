<?php

namespace App\View\Components;

use App\Domain\Entities\ExpertSummary;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class summary_console_table extends Component
{
    /**
     * Create a new component instance.
     */
    public function __construct(
        public ExpertSummary $expertSummary
    )
    {
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('lullen lullenium ulullenium');
    }
}
