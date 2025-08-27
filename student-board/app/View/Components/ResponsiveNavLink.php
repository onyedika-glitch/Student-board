<?php

namespace App\View\Components;

use Illuminate\View\Component;

class ResponsiveNavLink extends Component
{
    public $href;
    public $active;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($href, $active = false)
    {
        $this->href = $href;
        $this->active = $active;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.responsive-nav-link');
    }
}