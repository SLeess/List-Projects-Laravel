<?php

namespace App\View\Components\Layout;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Main_layout extends Component
{
    /**
     * Create a new component instance.
     */
    public function __construct(private string $pageTitle)
    {
        //
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.layout.main_layout');
    }
}