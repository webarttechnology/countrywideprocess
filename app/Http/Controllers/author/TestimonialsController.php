<?php

namespace App\Http\Controllers\author;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Str;
use App\Models\Testimonial;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Hash;
use PHPUnit\Framework\Constraint\Count;
use Config;
use Validator;
use Mail;
use Session;

class TestimonialsController extends Controller
{
    public function list(Request $request){
        if($request ->method() == 'GET'){
            $data = Testimonial:: all();
            return view('admin/testimonial/testimonial-list',['testimonial'=>$data,'title'=>"Testimonials"]);
        }
    }

   public function add(Request $request){
       if($request ->method() == 'GET'){
           return view('admin/testimonial/testimonial-add',['title' =>"Testimonials"]);
       }else if($request -> method() == "POST"){
          // print_r($request->post());die;   
           $request->validate([
               'author_name'  =>'required',
               'details'  =>'required',
               'is_active' =>'required',
           ]);
               $testimonials = Testimonial::create([
                'author_name'  =>$request->author_name,
                'details'  =>$request->details,
                'is_active' =>$request->is_active,
               ]);
               if($testimonials->save()){
                   return Redirect::to('admin/testimonials')-> with('successmsg',Config::get('constants.ADD_SUCCESS'))->withInput($request->all);
               }else{
                   return Redirect::to('admin/testimonials')-> with('errmsg',Config::get('constants.ADD_ERROR'))->withInput($request->all);
               }
          
       }
   }

  public function update(Request $request , $id = ''){
      $cat_id = $id;      
       if($request ->method() == 'GET' || $id != '' ){
           $data = Testimonial ::find($id);
           return view('admin/testimonial/testimonial-update',['testimonial' => $data, 'title' =>"Testimonials"]);
       }else if ($request -> method() == "POST"){
           $request->validate([
            'author_name'  =>'required',
               'details'  =>'required',
               'is_active' =>'required'
           ]);
           $update_data = Testimonial::where('id', $request->id)->update([
                'author_name'  =>$request->author_name,
                'details'  =>$request->details,
                'is_active' =>$request->is_active
            ]);
                        
            if($update_data){
                    return Redirect::to('admin/testimonials')-> with('successmsg',Config::get('constants.UPDATE_SUCCESS'))->withInput($request->all);
            }else{
                    return Redirect::to('admin/testimonials')-> with('errmsg',Config::get('constants.UPDATE_ERROR'))->withInput($request->all);
            }
       }
       
    }


   public function delete(Request $request,$id){
       if($request ->method() == 'GET' || $id != ''){
           $data =Testimonial ::find($id);
           $delete = $data->delete();
           if($delete){
               return Redirect::to('admin/testimonials')-> with('successmsg',Config::get('constants.DELETE_SUCCESS'))->withInput($request->all);
           }else{
               return Redirect::to('admin/testimonials')-> with('errmsg',Config::get('constants.DELETE_ERROR'))->withInput($request->all);
           }
       }
    }
}
