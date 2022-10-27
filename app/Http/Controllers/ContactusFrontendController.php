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

class ContactusFrontendController extends Controller
{
    public function contactus(Request $request){
        if($request ->method() == 'GET'){
            $data = Company::all();
            $service = Service_master::all();
            // print_r($service[0]->name);die;
            return view('frontend/contactus',['company'=>$data,'service'=>$service]);
        }else if($request->method() == 'POST'){
           // print_r($request->post());die;
            $request->validate([
                'name'  =>'required',
                'email_id'  =>'required|email',
                'mobile_no'  =>'required|numeric',
                'city'  =>'required',
                'service'  =>'required',
                'comment'  =>'required'
               ]);

               $fname = $request->name;
               $email = $request->email_id;
               $mobile_no = $request->mobile_no;
               $city = $request->city;
               $service =$request->service;
               $comment = $request->comment;
               $mailto = 'cwprocess@gmail.com';

               Mail::send('contact-mail', ['fname' => $fname,'city'=> $city, 'service'=>$service, 'email' => $email, 'mobile_no' => $mobile_no, 'content' => $comment], function ($message) use($mailto) {  
                $message->to($mailto)->subject('Contact for Queries!');
            });

            return redirect('/contact-us')->with('successmsg',Config::get('constants.MAIL_SUCCESS'));
        }
    }
}
