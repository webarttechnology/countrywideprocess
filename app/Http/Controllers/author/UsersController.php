<?php

namespace App\Http\Controllers\author;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Str;
use App\Models\Registration;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Hash;
use PHPUnit\Framework\Constraint\Count;
use Config;
use Validator;
use Mail;
use Session;


class UsersController extends Controller
{
    public function list(Request $request,$id = ''){
        if($request ->method() == 'GET' || $id != ''){
            $data = Registration:: where('registration_as',$id)->get();
            return view('admin/users/users-list',['user'=>$data,'title'=>"Users",'accesrole'=>$id]);
        }
    }

   

  public function update(Request $request , $id = ''){      
       if($request ->method() == 'GET' || $id != '' ){
           $data = Registration ::find($id);
           return view('admin/users/users-update',['user' => $data, 'title' =>"Users",'accesrole'=>$data->registration_as]);
       }else if ($request -> method() == "POST"){
           //print_r($request->post());die;
           if($request->registration_as == 2){
            $request->validate([
                'fname'  =>'required',
                'lname'  =>'required',
                'email_id'  =>'required|email',
                'mobile_no'  =>'required|min:10',
                'address_type'  =>'required|in:Residence,Business',
                'address_atoney'  =>'required', 
                'city'  =>'required', 
                'state'  =>'required', 
                'zipcode'  =>'required',  
                'bar_id'  =>'required', 
                'business_name'  =>'string|nullable', 
                
                            
            ]);

        }else if($request->registration_as == 3){
            $request->validate([
                'company' =>'required',
                'email_id'  =>'required|email',
                'mobile_no'  =>'required|min:10',
                'address_type'  =>'required|in:Residence,Business',
                'address_atoney'  =>'required', 
                'city'  =>'required', 
                'state'  =>'required', 
                'zipcode'  =>'required', 
                'billing_name'  =>'required',
                'billing_email'  =>'required|email', 
                'billing_phone'  =>'required|min:10', 
                'billing_address'  =>'required',  
                                                          
            ]);
        }else{
            $request->validate([
                'fname'  =>'string|nullable',
                'lname'  =>'string|nullable',
                'businessNameforWithoutatoney' =>'string|nullable',
                'email_id'  =>'required|email',
                'mobile_no'  =>'required|min:10',   
                'address_type'  =>'required|in:Residence,Business',
                'address_atoney'  =>'required', 
                'city'  =>'required', 
                'state'  =>'required', 
                'zipcode'  =>'required', 
                
            ]);
        }
       // print_r($request->post());die;
       //echo "ID".$request->id;die;
        if($request->registration_as == 2){
            $duplicateEmailCheckforatoney =Registration::where(array('email_id'=>$request->email_id,'registration_as'=>$request->registration_as))->where('id','!=',$request->id)->count();
            if($duplicateEmailCheckforatoney == 0){
                $customer = Registration::where('id', $request->id)->update([
                    'fname'  =>$request->fname,
                    'lname' =>$request->lname,
                    'mname' =>$request->mname,
                    'email_id'  =>$request->email_id,
                    'mobile_no'  =>$request->mobile_no,
                    'address_type'  =>$request->address_type,
                    'address_atoney'  =>$request->address_atoney, 
                    'unit' =>$request->unit,
                    'city'  =>$request->city, 
                    'state'  =>$request->state, 
                    'zipcode'  =>$request->zipcode,  
                    'bar_id'  =>$request->bar_id, 
                    'business_name'  =>$request->business_name, 
                    'firm_name'  =>$request->firm_name,
                ]); 
            }else{
                return Redirect::to('admin/users/update/'.$request->id)-> with('errmsg',"You entered a duplicate Email ID for Sole Practitioner")->withInput($request->all);  
            }
        }else if($request->registration_as == 3){
            $duplicateEmailCheckindivisual =Registration::where(array('email_id'=>$request->email_id,'registration_as'=>$request->registration_as))->where('id','!=',$request->id)->count();
            if($duplicateEmailCheckindivisual == 0){
                $customer = Registration::where('id', $request->id)->update([
                    'company' =>$request->company,
                    'email_id'  =>$request->email_id,
                    'mobile_no'  =>$request->mobile_no,
                    'address_type'  =>$request->address_type,
                    'address_atoney'  =>$request->address_atoney, 
                    'unit' =>$request->unit,
                    'city'  =>$request->city, 
                    'state'  =>$request->state, 
                    'zipcode'  =>$request->zipcode, 
                    'billing_name'  =>$request->billing_name,
                    'billing_email'  =>$request->billing_email, 
                    'billing_phone' =>$request->billing_phone,
                    'billing_address'  =>$request->billing_address,
                    'business_name'  =>$request->business_name, 
                ]); 
            }else{
                return Redirect::to('admin/users/update/'.$request->id)-> with('errmsg',"You entered a duplicate Email ID for Law Firm")->withInput($request->all);  
            }  
        }else{
            $duplicateEmailCheckindivisual =Registration::where(array('email_id'=>$request->email_id,'registration_as'=>$request->registration_as))->where('id','!=',$request->id)->count();
            if($duplicateEmailCheckindivisual == 0){
                $customer = Registration::where('id', $request->id)->update([
                    'fname'  =>$request->fname,
                    'lname' =>$request->lname,
                    'mname' =>$request->mname,
                    'businesNameforwithoutatoney' =>$request->businessNameforWithoutatoney,
                    'email_id'  =>$request->email_id,
                    'mobile_no'  =>$request->mobile_no,
                    'address_type'  =>$request->address_type,
                    'address_atoney'  =>$request->address_atoney, 
                    'unit' =>$request->unit,
                    'city'  =>$request->city, 
                    'state'  =>$request->state, 
                    'zipcode'  =>$request->zipcode, 
                    'areyou' =>$request->areyou,
                    'business_name'  =>$request->business_name, 
                ]); 
            }else{
                return Redirect::to('admin/users/update/'.$request->id)-> with('errmsg',"You entered a duplicate Email ID for Party Without Attorney")->withInput($request->all);  
            }

        }
       
        if($customer){
                return Redirect::to('admin/users/'.$request->registration_as);
        }else{
                return Redirect::to('admin/users/update/'.$request->id)-> with('errmsg',Config::get('constants.ADD_ERROR'))->withInput($request->all);
        }
       
                        
           
       }
       
    }


   public function delete(Request $request,$id){
       if($request ->method() == 'GET' || $id != ''){
           $data =Registration ::find($id);
           $delete = $data->delete();
           if($delete){
               return Redirect::to('admin/users/'.$data->registration_as)-> with('successmsg',Config::get('constants.DELETE_SUCCESS'))->withInput($request->all);
           }else{
               return Redirect::to('admin/users/'.$data->registration_as)-> with('errmsg',Config::get('constants.DELETE_ERROR'))->withInput($request->all);
           }
       }
    }
    
}
