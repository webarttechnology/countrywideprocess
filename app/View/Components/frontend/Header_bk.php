<?php

namespace App\View\Components\frontend;

use Illuminate\View\Component;
use App\Models\Service_master;

class Header extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public $efile ='';
    public function __construct()
    {
        echo "test";
        die;
        $efile = Service_master::first();
        print_r($efile);
        die;
        //print_r($efile);die;
        $this -> efile = $efile;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.frontend.header');
    }
}
