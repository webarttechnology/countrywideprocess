<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Str;
use App\Models\Agent;
use App\Models\Country;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Hash;
use PHPUnit\Framework\Constraint\Count;
use Config;
use Validator;
use Mail;
use Session;

class AgentFrontendController extends Controller
{
    public function agent(Request $request){
        if($request ->method() == 'GET'){
            $data = Agent:: all();
            $country =Country::all();
            return view('frontend/agent',['agent'=>$data,'country'=>$country]);
        }else if($request -> method() == "POST"){
            //print_r($request->post());die;
            $request->validate([
                'country_id'  =>'required',
                'fname'  =>'required',
                'lname'  =>'required',
                'email_id'  =>'email|required',
                'company'  =>'required',
                'address1'  =>'required',
                'city'  =>'required',
                'state'  =>'required',
                'pincode'  =>'required',
                'mobile_no'  =>'required|min:10',
                'yoe'  =>'required',              
            ]);
            $duplicatePriceCheck =Agent::where('email_id',$request->email_id)->count();
            if($duplicatePriceCheck == 0){  
                $agent = Agent::create([
                    'country_id'  =>$request->country_id,
                    'fname'  =>$request->fname,
                    'lname'  =>$request->lname,
                    'email_id'  =>$request->email_id,
                    'company' =>$request->company,
                    'address1'  =>$request->address1,
                    'city'  =>$request->city,
                    'state'  =>$request->state,
                    'pincode'  =>$request->pincode,
                    'mobile_no'  =>$request->mobile_no,
                    'yoe'  =>$request->yoe, 
                    'badge_no' =>$request->badge_no,
                    'address2' =>$request->address2,
                    'fax_no' =>$request->fax_no,
                    'past_experience' =>$request->past_experience
                ]); 
                if($agent){
                    return Redirect::to('agent')-> with('successmsg',Config::get('constants.ADD_SUCCESS'));
                }else{
                    return Redirect::to('agent')-> with('errmsg',Config::get('constants.ADD_ERROR'))->withInput($request->all);
                }
            }else{
                return Redirect::to('agent')-> with('errmsg',Config::get('constants.DUPLICATE_EMAIL_ID'))->withInput($request->all);
            } 
        }
    }
}
