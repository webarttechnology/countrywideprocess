<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Str;
use App\Models\Price;
use App\Models\Service_master;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Hash;
use PHPUnit\Framework\Constraint\Count;
use Config;
use Validator;
use Mail;
use Session;

class PricingFrontendController extends Controller
{
    public function pricing(Request $request){
        if($request ->method() == 'GET'){
            $data = Price:: all();
            $service = Service_master:: all();
            $efile = Service_master::first();
            return view('frontend/pricing',['price'=>$data,'service'=>$service,'efile' =>$efile]);
        }
    }
}
