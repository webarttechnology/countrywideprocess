<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProcessserviceController extends Controller
{
    
    public function index(Request $request){        
        if($request -> method() == 'GET'){
            return view('frontend.process_service', ['title' => "Process Service"]);
        }else{

        }
    }


}
