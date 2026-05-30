<?php

namespace App\View\Components\Forms;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class RememberMe extends Component
{
    /**
     * Create a new component instance.
     */
     public function __construct(
        public string $name = 'remember',
        public string $label = 'Keep me logged in'
    ) {}

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.forms.remember-me');
    }
}
