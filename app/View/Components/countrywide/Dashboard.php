<?php

namespace App\View\Components\countrywide;

use Illuminate\View\Component;

class Dashboard extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public $title = '';
    public $count = '';
    public $color = '';
    public $icon = '';
    public function __construct($title, $count, $color, $icon)
    {
        $this -> title = $title;
        $this -> count = $count;
        $this -> color = $color;
        $this -> icon = $icon;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.countrywide.dashboard');
    }
}
