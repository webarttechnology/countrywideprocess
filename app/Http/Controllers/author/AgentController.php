<?php

namespace App\Http\Controllers\author;

use App\Http\Controllers\Controller;
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

class AgentController extends Controller
{
    public function list(Request $request){
        if($request ->method() == 'GET'){
            $data = Agent:: all();
            return view('admin/agent/agent-list',['agent'=>$data,'title'=>"Agent"]);
        }
    }

    public function add(Request $request){
        if($request ->method() == 'GET'){
            $country =Country::all();
            return view('admin/agent/agent-add',['title' =>"Agent",'country'=>$country]);
        }else if($request -> method() == "POST"){
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
                'is_active' =>'required'               
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
                    'past_experience' =>$request->past_experience,
                    'is_active' =>$request->is_active
                ]); 
                if($agent){
                    return Redirect::to('admin/agents')-> with('successmsg',Config::get('constants.ADD_SUCCESS'))->withInput($request->all);
                }else{
                    return Redirect::to('admin/agents')-> with('errmsg',Config::get('constants.ADD_ERROR'))->withInput($request->all);
                }
            }else{
                return Redirect::to('admin/agents/add')-> with('errmsg',Config::get('constants.DUPLICATE_EMAIL_ID'))->withInput($request->all);
            }

        }
    }
 
   public function update(Request $request , $id = ''){    
        if($request ->method() == 'GET' || $id != '' ){
            $data = Agent ::find($id);
            $country =Country::all();
            return view('admin/agent/agent-update',['agent' => $data,'title' =>"Agent",'country'=>$country]);
        }else if ($request -> method() == "POST"){
             $id = $request->post('id');
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
                'is_active' =>'required'               
            ]);  
            $duplicatePriceCheck =Agent::where('email_id',$request->email_id)->where('id','!=',$request->post('id'))->count();
            if($duplicatePriceCheck == 0){     
            $update_data = Agent::where('id', $request->id)->update([
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
                'past_experience' =>$request->past_experience,
                'is_active' =>$request->is_active
            ]);
             
             if($update_data){
                 return Redirect::to('admin/agents')-> with('successmsg',"Blog Update Succesfully");
             }else{
                 return Redirect::to('admin/agents')-> with('errmsg',"Blog Not Update");
             }
            }else{
                return Redirect::to('admin/agents/update/'.$id)-> with('errmsg',Config::get('constants.DUPLICATE_EMAIL_ID'))->withInput($request->all);
            }
        }
    }
 


   public function delete(Request $request,$id){
       if($request ->method() == 'GET' || $id != ''){
           $data =Agent ::find($id);
           $delete = $data->delete();
           if($delete){
               return Redirect::to('admin/agents')-> with('successmsg',Config::get('constants.DELETE_SUCCESS'))->withInput($request->all);
           }else{
               return Redirect::to('admin/agents')-> with('errmsg',Config::get('constants.DELETE_ERROR'))->withInput($request->all);
           }
       }
    } 
}
