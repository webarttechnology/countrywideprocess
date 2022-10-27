<?php

namespace App\Http\Controllers\author;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Str;
use App\Models\Service_master;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Hash;
use PHPUnit\Framework\Constraint\Count;
use Config;
use Validator;
use Mail;
use Session;
use Carbon\Carbon;
use \Crypt;

class ServicesMasterController extends Controller
{
    public function list(Request $request){
        if($request ->method() == 'GET'){
            $data = Service_master:: all();
           // print_r($data[0]->image);die;
            return view('admin/serviceMaster/service-list',['service'=>$data,'title'=>"Services Master"]);
        }
    }

   public function add(Request $request){
       if($request ->method() == 'GET'){
           return view('admin/serviceMaster/service-add',['title' =>"Services Master"]);
       }else if($request -> method() == "POST"){
          // print_r($request->post());die;   
           $request->validate([
               'name'  =>'required',
               'title'  =>'required',
               'details'  =>'required',
               'image'  =>'required',
               'is_active' =>'required',
               'logo' =>'required'
           ]);
           $duplicateCategaryCheck = Service_master::where('name',$request->name)->count();
           if($duplicateCategaryCheck == 0) {
             $slug = Str::slug($request->name, '-');
               $categary = Service_master::create([
                'name'  =>$request->name,
                'title'  =>$request->title,
                'details'  =>$request->details,
                'image'  =>1,
                'is_active' =>$request->is_active,
                'heading' =>$request->heading,
                'slug_value' =>$slug,
                'logo' =>1
               ]);

               $randomNoForLogo = rand(10,99);
               $randomNoForImage = rand(1000,9999);


               $lastId = $categary->id;
               $file = $request->file('image');
               $name = $file->getClientOriginalName();
               $path = "uploads/";

               $file->move($path, $lastId.$slug.$randomNoForImage);
               $image_name = $path.$lastId.$slug.$randomNoForImage; 
    
               
               $update_image = Service_master::where('id', $lastId)->update([
                'image' => $image_name,
               ]);

               $file = $request->file('logo');
               $name = $file->getClientOriginalName();
               $path = "uploads/";
               $file->move($path, $lastId.$request->$slug.$randomNoForLogo);
    
               $logo_name = $path.$lastId.$slug.$randomNoForLogo;
               $update_logo = Service_master::where('id', $lastId)->update([
                'logo' => $logo_name,
               ]);


               if($categary->save()){
                   return Redirect::to('admin/services-master')-> with('successmsg',Config::get('constants.ADD_SUCCESS'))->withInput($request->all);
               }else{
                   return Redirect::to('admin/services-master')-> with('errmsg',Config::get('constants.ADD_ERROR'))->withInput($request->all);
               }
           }else{
               return Redirect::to('admin/services-master/add')-> with('errmsg',"Already Exist This Service")->withInput($request->all);
           }
       }
   }

  public function update(Request $request , $id = ''){
      $cat_id = $id;      
       if($request ->method() == 'GET' || $id != '' ){
           $data = Service_master ::find($id);
           return view('admin/serviceMaster/service-update',['service' => $data, 'title' =>"Services Master"]);
       }else if ($request -> method() == "POST"){
           $request->validate([
                'name'  =>'required',
                'title'  =>'required',
                'details'  =>'required',
                'is_active' =>'required',
           ]);
           $duplicateCategaryCheck = Service_master::where('name',$request->name)->where('id','!=',$request->id)->count();
           if($duplicateCategaryCheck == 0) {
            $slug = Str::slug($request->name, '-');
                    if($request->hasFile('image')){
                       
                        $randomNoForImage = rand(1000,9999);
                                $get_file_name = Service_master::where('id',$request->id)->select('image')->get();
                                    foreach($get_file_name as $value){
                                    @unlink($value->image);
                                    }
                                $file = $request->file('image');
                                $name = $file->getClientOriginalName();
                                $path = "uploads/";
                                $file->move($path, $request->id.$slug.$randomNoForImage);
                
                                $image_name = $path.$request->id.$slug.$randomNoForImage;
                                $update_data = Service_master::where('id', $request->id)->update([
                                    'name'  =>$request->name,
                                    'title'  =>$request->title,
                                    'details'  =>$request->details,
                                    'is_active' =>$request->is_active,
                                    'slug_value' =>$slug,
                                    'image' => $image_name
                                ]);
                    }else if($request->hasFile('logo')){
                        $randomNoForLogo = rand(10,99);
                        $get_file_name = Service_master::where('id',$id)->select('logo')->get();
                            foreach($get_file_name as $value){
                            @unlink($value->logo);
                            }
                        $file = $request->file('logo');
                        $name = $file->getClientOriginalName();
                        $path = "uploads/";
                        $file->move($path, $request->id.$slug.$randomNoForLogo);
        
                        $logo_name = $path.$request->id.$slug.$randomNoForLogo;
        
                        $update_data = Service_master::where('id', $request->id)->update([
                            'name'  =>$request->name,
                            'title'  =>$request->title,
                            'details'  =>$request->details,
                            'is_active' =>$request->is_active,
                            'slug_value' =>$slug,
                            'logo' => $logo_name
                        ]);
                }else{ 
                            $update_data = Service_master::where('id', $request->id)->update([
                                    'name'  =>$request->name,
                                    'title'  =>$request->title,
                                    'details'  =>$request->details,
                                    'is_active' =>$request->is_active,
                                    'slug_value' =>$slug
                            ]);
                        }

                    if($update_data){
                        return Redirect::to('admin/services-master')-> with('successmsg',Config::get('constants.UPDATE_SUCCESS'))->withInput($request->all);
                    }else{
                        return Redirect::to('admin/services-master')-> with('errmsg',Config::get('constants.UPDATE_ERROR'))->withInput($request->all);
                    }
            }else{
               return Redirect::to('admin/services-master/update'."/". $request->id)-> with('errmsg',"Do Not Update,Already Exis Updated Service")->withInput($request->all);
           }
       }
       
    }


   public function delete(Request $request,$id){
       if($request ->method() == 'GET' || $id != ''){
           $data =Service_master ::find($id);
           $delete = $data->delete();
           if($delete){
               return Redirect::to('admin/services-master')-> with('successmsg',Config::get('constants.DELETE_SUCCESS'))->withInput($request->all);
           }else{
               return Redirect::to('admin/services-master')-> with('errmsg',Config::get('constants.DELETE_ERROR'))->withInput($request->all);
           }
       }
    }

}
