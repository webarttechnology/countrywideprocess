<?php

namespace App\Http\Controllers\author;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Str;
use App\Models\Blog;
use App\Models\Pdf_master;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Hash;
use PHPUnit\Framework\Constraint\Count;
use Config;
use Validator;
use Mail;
use Session;

class BlogController extends Controller
{
    public function list(Request $request){
        if($request ->method() == 'GET'){
            $data = Blog:: all();
            $pdf = Pdf_master::all();
            return view('admin/blog/blog-list',['blog'=>$data,'title'=>"Blog",'pdf'=>$pdf]);
        }
    }

    public function add(Request $request){
        if($request ->method() == 'GET'){
            return view('admin/blog/blog-add',['title' =>"Blog"]);
        }else if($request -> method() == "POST"){
           //  print_r($request->post());die;
             $request->validate([
                'name'  =>'required',
                'details'  =>'required',
                'is_active'  =>'required',
                'image'  =>'required',                 
            ]);
            $duplicateBlogyCheck = Blog::where('name',$request->name)->count();
           // echo $duplicateBlogyCheck;die;
            if($duplicateBlogyCheck == 0) {
                $slug = Str::slug($request->name, '-');
                $blog = Blog::create([
                    'name' =>$request->name,
                    'details' =>$request->details,
                    'is_active' =>$request->is_active,
                    'slug_value' =>$slug,
                    'image' => 1
                    ]);
                    $randomNoForpdf = rand(10,99);
                    $randomNoForImage = rand(1000,9999);
                    $lastId = $blog->id;
         
                $file = $request->file('image');
               
                $name = $file->getClientOriginalName();
                $path = "uploads/";

                $file->move($path,"BlogImg-".$lastId.$randomNoForImage.$name);
                $image_name = $path."BlogImg-".$lastId.$randomNoForImage.$name; 
    
               
                $update_image = Blog::where('id', $lastId)->update([
                    'image' => $image_name,
                ]);
                             
               // echo $lastId;die;
                if($request->file('document')){
                    $pdf = $request->file('document');
                    for($i=0;$i<count($pdf); $i++){
                        $file = $pdf[$i];
                        $name = $file->getClientOriginalName();
                        $file->move($path,"BlogDoc-".$lastId.$randomNoForpdf.$name);
                        $document_name = $path."BlogDoc-".$lastId.$randomNoForpdf.$name;
                        $upload_document = Pdf_master::create([
                            'blog_id' =>$lastId,
                            'pdf_link' =>$document_name,
                            'is_active' =>$request->is_active,
                        ]);
                        
                    }
                }

                
                   
                        
                if($update_image){
                    return Redirect::to('admin/blog')-> with('successmsg',"Blog Save Succesfully");
                }else{
                    return Redirect::to('admin/blog')-> with('errmsg',"Blog Not Save");
                }
            }else{
                return Redirect::to('admin/blog/add')-> with('errmsg',"Already Exist This Blog")->withInput($request->all);
            }
        }
    }
 
   public function update(Request $request , $id = ''){ 
     
        if($request ->method() == 'GET' && $id != '' ){            
            $data = Blog ::find($id);
            $pdf = Pdf_master::where('blog_id', $id) -> get();
           // print_r($pdf);die;
            return view('admin/blog/blog-update',['blog' => $data,'title' =>"Blog", 'pdf' => $pdf]);
        }else if ($request -> method() == "POST"){
           
             $id = $request->post('id');
             $request->validate([
                'name'  =>'required',
                'details'  =>'required',
                'is_active'  =>'required',
                     
             ]);   
             $slug = Str::slug($request->name, '-');    
             $duplicateBlogyCheck = Blog::where('name',$request->name)->where('id','!=',$request->id)->count();
             if($duplicateBlogyCheck == 0) {

                if($request->hasFile('image')){
                    //print_r($request->post());die;
                    $randomNoForImage = rand(1000,9999);
                    $file = $request->file('image');
                  
                    $get_file_name = Blog::where('id',$request->id)->select('image')->get();
                    foreach($get_file_name as $value){
                        @unlink($value->image);
                    }
                    $name = $file->getClientOriginalName();
                    //echo $name;die;
                    $path = "uploads/";
                    $file->move($path,"BlogImg-".$request->id.$randomNoForImage.$name);
                    $image_name = $path."BlogImg-".$request->id.$randomNoForImage.$name;        
                    $update_data = Blog::where('id', $request->id)->update([
                        'image' => $image_name,
                        'name' =>$request->name,
                        'details' =>$request->details,
                        'slug_value' =>$slug,
                        'is_active' =>$request->is_active,
                    ]);
                } if($request->file('document')){
                  $randomNoForpdf = rand(10,99);
                  
                   $pdf_id =$request->post('pdf_id');

                    $pdf = $request->file('document');
                    
                    foreach($pdf as $key => $val){
                        if($pdf_id != '' && array_key_exists($key,$pdf_id)){
                            $file = $val;
                            // echo "<pre/>";
                            // print_r($file);
                            $get_file_name = Pdf_master::where('id',$pdf_id)->select('pdf_link')->get();
                           
                            foreach($get_file_name as $value){
                                @unlink($value->image);
                            }
                            $path = "uploads/";
                            $name = $file->getClientOriginalName();
                            $file->move($path,"BlogDoc-".$request->id.$randomNoForpdf.$name);
                            $document_name = $path."BlogDoc-".$request->id.$randomNoForpdf.$name;
                            // echo "<pre/>";
                            // print_r($pdf_id[$key]);
                            $update_data =Pdf_master::where('id',$pdf_id[$key])->update([
                                'pdf_link' =>$document_name,
                            ]); 
                              echo "</br>";           
                        }else{
                            $file = $pdf[$key];
                            //print_r($file);die;
                            $path = "uploads/";
                            $name = $file->getClientOriginalName();
                            $file->move($path,"BlogDoc-".$request->id.$randomNoForpdf.$name);
                            $document_name = $path."BlogDoc-".$request->id.$randomNoForpdf.$name;
                            $update_data = Pdf_master::create([
                                'blog_id' =>$request->id,
                                'pdf_link' =>$document_name,
                                'is_active' =>$request->is_active,
                            ]);
                        }
                        
                    }
                 
                }else{
                    $update_data = Blog::where('id', $request->id)->update([
                        'name' =>$request->name,
                        'details' =>$request->details,
                        'slug_value' =>$slug,
                        'is_active' =>$request->is_active,
                    ]);
                }
                
                if($update_data){
                    return Redirect::to('admin/blog')-> with('successmsg',"Blog Update Succesfully");
                }else{
                    return Redirect::to('admin/blog')-> with('errmsg',"Blog Not Update");
                }
            }else{
                return Redirect::to('admin/blog/add')-> with('errmsg',"Already Exist This Blog")->withInput($request->all);
            }
        }
    }
 


   public function delete(Request $request,$id){
       if($request ->method() == 'GET' || $id != ''){
           $data =Blog ::find($id);
           $delete = $data->delete();
           if($delete){
               return Redirect::to('admin/blog')-> with('successmsg',Config::get('constants.DELETE_SUCCESS'))->withInput($request->all);
           }else{
               return Redirect::to('admin/blog')-> with('errmsg',Config::get('constants.DELETE_ERROR'))->withInput($request->all);
           }
       }
    }

    public function deletepdf(Request $request,$id){
        if($request ->method() == 'GET' || $id != ''){
            //echo $id;
            $data =Pdf_master::where('id',$id)->first();
           $delete = $data->delete();
        }
    }
}
