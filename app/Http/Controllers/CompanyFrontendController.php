<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Str;
use App\Models\Company;
use App\Models\Service_master;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Hash;
use PHPUnit\Framework\Constraint\Count;
use Config;
use Validator;
use Mail;
use Session;

class CompanyFrontendController extends Controller
{
    public function company(Request $request){
        if($request ->method() == 'GET'){
            $data = Company:: all();
            $efile = Service_master::first();
            return view('frontend/company',['company'=>$data ,'efile' =>$efile]);
        }
    }
}
