<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Str;
use App\Models\Service_master;
use App\Models\Company;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Hash;
use PHPUnit\Framework\Constraint\Count;
use Config;
use Validator;
use Mail;
use Session;

class ServicesFrontendController extends Controller
{
    public function service(Request $request){
        if($request ->method() == 'GET'){
            $data = Service_master:: all();
            return view('frontend/service',['service'=>$data]);
        }
    }

    public function servicedetails(Request $request, $id =''){
        if($request ->method() == 'GET' || $id != ''){
            $data = Service_master::all();
            $company = Company::all();  
            //$servicelist = Service_master::where('id','>',$data->id)->orderBy('id','ASC')-> limit(1);
            //(select *from service_masters WHERE Id > 2 ORDER BY Id ASC LIMIT 1) UNION (select *from service_masters WHERE Id < 2 ORDER BY Id DESC LIMIT 1);
            return view('frontend/service-details',['service' =>$data,'company' =>$company, 'slug_name'=> $id, 'max_length' => count($data)]);
        }
    }
}
