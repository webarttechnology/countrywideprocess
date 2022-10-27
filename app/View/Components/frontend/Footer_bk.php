<?php

namespace App\View\Components\frontend;

use Illuminate\View\Component;
use App\Models\Blog;
use App\Models\Service_master;

class Footer extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public $service ='';
    public $blog ='';
    public $efile ='';
    public function __construct()
    {
        $blog = Blog::all();
        $service = Service_master::all();
        $efile = Service_master::first();
      
        $this -> service = $service;
        $this -> blog = $blog;
        $this -> efile = $efile;
        //print_r($efile->name);die;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.frontend.footer');
    }
}
