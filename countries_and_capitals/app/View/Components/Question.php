<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;
use Str;

class Question extends Component
{
    /**
     * Create a new component instance.
     */
    public function __construct(
        protected string $country,
        protected string $currentQuestion,
        protected string $totalquestions
    )
    {
        // dd($this->country, $this->currentQuestion, $this->totalquestions);
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.question')->with([
            "country"=> $this->country,
            "currentQuestion"=> $this->currentQuestion,
            "totalquestions"=> $this->totalquestions
        ]);
    }
}
