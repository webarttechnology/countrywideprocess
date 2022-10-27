<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Str;
use App\Models\Admin;
use App\Models\Country;
use App\Models\Company;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Hash;
use PHPUnit\Framework\Constraint\Count;
use Config;
use Validator;
use Mail;
use Session;

class UserController extends Controller
{
    public function login(Request $request){
        if($request->method() == 'GET'){
            return view('admin.login');
        }else if($request->method() == 'POST'){
            $request->validate([
                'email_id'  =>'required|email',
                'password'  =>'required|min:8'
             ]);
            $loginData = Admin::where('email',$request->email_id)->first();
            $company =Company::where(['is_active' => 1])->first();
           // print_r($company);die;
           
            if($loginData != ''){
                if($loginData->pwd==$request->password){
                    $request->session()->put('loginStatus', true);
                    $request->session()->put('loginID', $loginData['id']);
                    $request->session()->put('email', $loginData['email']);
                    $request->session()->put('name', $loginData['name']);
                    $request->session()->put('image', $loginData['image']);
                    $request->session()->put('company_logo', $company['logo']);
                    $request->session()->put('company_name', $company['name']);
                    $request->session()->put('company_address', $company['address']);
                    $request->session()->put('company_mobileno', $company['mobile_no']);
                    $request->session()->put('company_email', $company['email_id']);
                    return redirect::to('admin/dashboard');
                }else{
                    return redirect::to('/admin')->with('errmsg',Config::get('constants.PASSWORD_ERROR'))->withInput($request->all);
                }
            }else{
                return redirect::to('/admin')->with('errmsg',Config::get('constants.EMAIL_ERROR'))->withInput($request->all);
            }
        }
        
    }

    public function logout(){
        Session::forget('loginStatus');
        return redirect::to('/admin');
    }

    public function dashboard(Request $request){
        return view('admin/dashboard');
    }
}
