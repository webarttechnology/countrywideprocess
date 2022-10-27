<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Str;
use App\Models\Customer;
use App\Models\Registration;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Hash;
use PHPUnit\Framework\Constraint\Count;
use Config;
use Validator;
use Mail;
use Session;


class CustomerFrontendController extends Controller
{
    public function showpricingList(Request $request){
        if($request ->method() == 'POST'){
            $request->validate([
                'name'  =>'required',
                'email_id'  =>'required|email',
            ]);
            $price = Customer::create([
                'name'  =>$request->name,
                'email_id'  =>$request->email_id,
               ]);
           // if($price){
                return Redirect::to('pricing');
           // }
           
        }
    }



    public function login(Request $request){
        if($request ->method() == 'GET'){
            return view('frontend/login');
        }else if($request ->method() == 'POST'){
           // print_r($request->post());die;
            $request->validate([
                'email_id'  =>'required|email',
                'password'  =>'required|min:8',    
            ]);
            $loginCheck = Registration::where(['email_id' =>$request->email_id ])->first();
            
            if($loginCheck != ''){
                if(Hash :: check($request->password, $loginCheck->password)){
                    $request -> session()->put('loginstatusforCustomer', true);
                    $request -> session()->put('accesrole', $loginCheck -> registration_as);
                    $request -> session()->put('loginId', $loginCheck -> id);
                    return redirect :: to('order-info');
                }else{
                    return redirect :: to('/login') -> with('errmsg', config::get('constants.PASSWORD_ERROR'))->withInput($request->all); 
                }
            }else{
                return redirect :: to('/login') -> with('errmsg', config::get('constants.EMAIL_ERROR'))->withInput($request->all);
            }
        }

    }

    public function logout(Request $request){
        if($request->method() == 'GET'){
            Session::forget('loginstatusforCustomer');
            return redirect::to('/');
        }
    }
}
