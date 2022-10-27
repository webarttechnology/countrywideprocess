<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Str;
use App\Models\Service_master;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Hash;
use PHPUnit\Framework\Constraint\Count;
use Config;
use Validator;
use Mail;
use Session;

class EfilingFrontendController extends Controller
{
    public function efiling(Request $request){
        if($request ->method() == 'GET'){
            $data = Service_master::where('name',"Efillings and Eservices")->get();
            return view('frontend/efiling-details',['service'=>$data]);
        }
    }
}
