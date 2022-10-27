<?php

namespace App\Http\Controllers\author;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Str;
use App\Models\Company;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Hash;
use PHPUnit\Framework\Constraint\Count;
use Config;
use Validator;
use Mail;
use Session;

class CompanyController extends Controller
{
    public function list(Request $request){
        if($request ->method() == 'GET'){
            $data = Company:: all();
            return view('admin/company/company-list',['company'=>$data,'title'=>"Company"]);
        }
    }

   

   public function update(Request $request , $id = ''){   
       if($request ->method() == 'GET' || $id != '' ){
           $data = Company ::find($id);
           //print_r($data);die;
           return view('admin/company/company-update',['company' => $data, 'title' =>"Company"]);
       }else if ($request -> method() == "POST"){
          // print_r($request->post());die;
           $request->validate([
                'ourmission_details'  =>'required',
                'name'  =>'required',
                'email_id'  =>'required',
                'mobile_no'  =>'required',
                'address'  =>'required',
                'facebook_link'  =>'required',
                'map_link'  =>'required',
                'mobile_no1' => 'required',
                'fax' =>'required'
           ]);

           if($request->hasFile('image')){
                $get_file_name = Company::where('id',$id)->select('image')->get();
                    foreach($get_file_name as $value){
                    @unlink($value->image);
                    }
                $file = $request->file('image');
                $name = $file->getClientOriginalName();
                $path = "uploads/";
                $file->move($path, $id.$name);

                $image_name = $path.$id.$name;

                $update_data = Company::where('id', $request->id)->update([
                    'ourmission_details'  =>$request->ourmission_details,
                    'name'  =>$request->name,
                    'email_id'  =>$request->email_id,
                    'mobile_no'  =>$request->mobile_no,
                    'address'  =>$request->address,
                    'facebook_link'  =>$request->facebook_link,
                    'map_link'  =>$request->map_link,
                    'image' => $image_name,
                    'mobile_no1' =>$request->mobile_no1,
                    'fax' =>$request->fax
                ]);
             } if($request->hasFile('logo')){
                $get_file_name = Company::where('id',$id)->select('logo')->get();
                    foreach($get_file_name as $value){
                    @unlink($value->image);
                    }
                $file = $request->file('logo');
                $name = $file->getClientOriginalName();
                $path = "uploads/";
                $file->move($path, $id.$name);

                $logo_image = $path.$id.$name;

                $update_data = Company::where('id', $request->id)->update([
                    'ourmission_details'  =>$request->ourmission_details,
                    'name'  =>$request->name,
                    'email_id'  =>$request->email_id,
                    'mobile_no'  =>$request->mobile_no,
                    'address'  =>$request->address,
                    'facebook_link'  =>$request->facebook_link,
                    'map_link'  =>$request->map_link,
                    'logo' => $logo_image,
                    'mobile_no1' =>$request->mobile_no1,
                    'fax' =>$request->fax
                ]);
             }else{ 
                $update_data = Company::where('id', $request->id)->update([
                    'ourmission_details'  =>$request->ourmission_details,
                    'name'  =>$request->name,
                    'email_id'  =>$request->email_id,
                    'mobile_no'  =>$request->mobile_no,
                    'address'  =>$request->address,
                    'facebook_link'  =>$request->facebook_link,
                    'map_link'  =>$request->map_link,
                    'mobile_no1' =>$request->mobile_no1,
                    'fax' =>$request->fax
    
                ]);
            }
                        
            if($update_data){
                    return Redirect::to('admin/company')-> with('successmsg',Config::get('constants.UPDATE_SUCCESS'))->withInput($request->all);
            }else{
                    return Redirect::to('admin/company')-> with('errmsg',Config::get('constants.UPDATE_ERROR'))->withInput($request->all);
            }
       }
       
    }


}
