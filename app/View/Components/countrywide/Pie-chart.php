<?php

namespace App\View\Components\countrywide;

use Illuminate\View\Component;

class Pie-chart extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.countrywide.pie-chart');
    }
}
