<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Str;
use App\Models\Priceitem;
use App\Models\Service_master;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Hash;
use PHPUnit\Framework\Constraint\Count;
use Config;
use Validator;
use Mail;
use Session;

class PriceitemController extends Controller
{
    
    public function item(Request $request){

        if($request -> method() == "GET"){
            $data = Priceitem:: all();
            $Service_master = Service_master::get();
            return view('admin/priceItem/priceItem-list',['price'=>$data,'service_master' => $Service_master,'title'=>"Price Item"]);

        }else{

        }
    }

    public function add(Request $request){
        if($request ->method() == 'GET'){       
            $data = Service_master::all();
            return view('admin/priceItem/priceItem-add',['title' =>"Price Item",'service' => $data]);
        }else if($request -> method() == "POST"){
            //print_r($request->post());die;   
            $request->validate([
                'service_master_id'  =>'required',
                'name'  =>'required',
            ]);

            $duplicatcheck =Priceitem::where('name',$request->name)->where('service_master_id',$request->service_master_id)->count();
            if($duplicatcheck == 0){
                $price = Priceitem::create([
                 'service_master_id'  =>$request->service_master_id,
                 'name'  =>$request->name,
                ]);
               
                if($price->save()){
                    return Redirect::to('admin/price-item')-> with('successmsg',Config::get('constants.ADD_SUCCESS'))->withInput($request->all);
                }else{
                    return Redirect::to('admin/price-item')-> with('errmsg',Config::get('constants.ADD_ERROR'))->withInput($request->all);
                }
            }else{
                return Redirect::to('admin/price-item/add/')-> with('errmsg',"This Item Already exist for this service")->withInput($request->all);
            }
           
        }
    }

    public function update(Request $request, $id =''){   
       if($request ->method() == 'GET' || $id != '' ){
           $data = Priceitem ::find($id);
           $service_master = Service_master::all();
           return view('admin/priceItem/priceItem-update',['price' => $data,'service_master'=>$service_master, 'title' =>"Price Item"]);
       }else if ($request -> method() == "POST"){
           
           $request->validate([
                'service_master_id'  =>'required',
                'name'  =>'required',
           ]);
          
           $duplicatcheck =Priceitem::where('name',$request->name)->where('service_master_id',$request->service_master_id)->where('id','!=',$request->id)->count();
           if($duplicatcheck == 0){
           
                $update_data = Priceitem::where('id', $request->id)->update([
                        'service_master_id'  =>$request->service_master_id,
                        'name'  =>$request->name,
                    ]);
                if($update_data){
                   
                    return Redirect::to('admin/price-item')-> with('successmsg',Config::get('constants.UPDATE_SUCCESS'));
                    echo "ok3";die;
                }else{
                    return Redirect::to('admin/price-item')-> with('errmsg',Config::get('constants.UPDATE_ERROR'))->withInput($request->all);
                }
            }else{
                return Redirect::to('admin/price-item/update/'.$request->id)-> with('errmsg',"This Item Already exist for this service")->withInput($request->all);
            }
       }
    }

    public function delete(Request $request,$id=''){
        if($request ->method() == 'GET' || $id != ''){
            $data =Priceitem ::where('id',$id)->first();
           // print_r($data);die;
            $delete = $data->delete();
            if($delete){
                return Redirect::to('admin/price-item')-> with('successmsg',Config::get('constants.DELETE_SUCCESS'))->withInput($request->all);
            }else{
                return Redirect::to('admin/price-item')-> with('errmsg',Config::get('constants.DELETE_ERROR'))->withInput($request->all);
            }
        }
    }
}
