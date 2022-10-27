<?php

namespace App\Http\Controllers\author;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Str;
use App\Models\Service;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Hash;
use PHPUnit\Framework\Constraint\Count;
use Config;
use Validator;
use Mail;
use Session;


class ServicesController extends Controller
{
    public function list(Request $request){
        if($request ->method() == 'GET'){
            $data = Service:: all();
            return view('admin/service/service-list',['service'=>$data,'title'=>"Services"]);
        }
    }

   public function add(Request $request){
       if($request ->method() == 'GET'){
           return view('admin/service/service-add',['title' =>"Services"]);
       }else if($request -> method() == "POST"){
          // print_r($request->post());die;   
           $request->validate([
               'details'  =>'required',
               'title'  =>'required',
               'is_active' =>'required'
           ]);
               $service = Service::create([
                'title'  =>$request->title,
                'details'  =>$request->details,
                'is_active' =>$request->is_active
               ]);
              
               if($service->save()){
                   return Redirect::to('admin/services')-> with('successmsg',Config::get('constants.ADD_SUCCESS'))->withInput($request->all);
               }else{
                   return Redirect::to('admin/services')-> with('errmsg',Config::get('constants.ADD_ERROR'))->withInput($request->all);
               }
          
       }
   }

  public function update(Request $request , $id = ''){
      $cat_id = $id;      
       if($request ->method() == 'GET' || $id != '' ){
           $data = Service ::find($id);
           return view('admin/service/service-update',['service' => $data, 'title' =>"Services"]);
       }else if ($request -> method() == "POST"){
           $request->validate([
            'details'  =>'required',
            'title'  =>'required',
            'is_active' =>'required'
           ]);

            $update_data = Service::where('id', $request->id)->update([
                'title'  =>$request->title,
                'details'  =>$request->details,
                'is_active' =>$request->is_active
            ]);
                        
            if($update_data){
                    return Redirect::to('admin/services')-> with('successmsg',Config::get('constants.UPDATE_SUCCESS'))->withInput($request->all);
            }else{
                    return Redirect::to('admin/services')-> with('errmsg',Config::get('constants.UPDATE_ERROR'))->withInput($request->all);
            }
       }
       
    }


   public function delete(Request $request,$id){
       if($request ->method() == 'GET' || $id != ''){
           $data =Service ::find($id);
           $delete = $data->delete();
           if($delete){
               return Redirect::to('admin/services')-> with('successmsg',Config::get('constants.DELETE_SUCCESS'))->withInput($request->all);
           }else{
               return Redirect::to('admin/services')-> with('errmsg',Config::get('constants.DELETE_ERROR'))->withInput($request->all);
           }
       }
    }
}
