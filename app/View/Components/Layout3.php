<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Layout3 extends Component
{
    /**
     * Create a new component instance.
     */
    public function __construct(
        public string $title = '',
    )
    {
        $this->title = config('app.name') . ' - ' . $title;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.layout3');
    }
}
