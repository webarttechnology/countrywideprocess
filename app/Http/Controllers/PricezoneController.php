<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Str;
use App\Models\Priceitem;
use App\Models\Pricezone;
use App\Models\Service_master;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Hash;
use PHPUnit\Framework\Constraint\Count;
use Config;
use Validator;
use Mail;
use Session;

class PricezoneController extends Controller
{
    public function item(Request $request){
        if($request -> method() == "GET"){
            $data = Pricezone:: all();
            $Service_master = Service_master::get();
            $priceitem = Priceitem::get();
            return view('admin/priceZone/priceZone-list',['pricezone'=>$data,'service_master' => $Service_master,'priceitem'=>$priceitem,'title'=>"Price Zone"]);

        }else{

        }
    }

    public function add(Request $request){
        if($request ->method() == 'GET'){       
            $data = Service_master::all();
            return view('admin/priceZone/priceZone-add',['title' =>"Price zone",'service' => $data]);
        }else if($request -> method() == "POST"){
            //print_r($request->post());die;   
            $request->validate([
                'service_master_id'  =>'required',
                'name'  =>'required',
                'priceitem_id' =>'required'
            ]);

            $duplicatcheck =Pricezone::where('name',$request->name)->where('service_master_id',$request->service_master_id)->where('priceitem_id',$request->priceitem_id)->count();
            if($duplicatcheck == 0){
                $pricezone = Pricezone::create([
                 'service_master_id'  =>$request->service_master_id,
                 'name'  =>$request->name,
                 'priceitem_id' =>$request->priceitem_id
                ]);
               
                if($pricezone->save()){
                    return Redirect::to('admin/price-zone')-> with('successmsg',Config::get('constants.ADD_SUCCESS'));
                }else{
                    return Redirect::to('admin/price-zone')-> with('errmsg',Config::get('constants.ADD_ERROR'))->withInput($request->all);
                }
            }else{
                return Redirect::to('admin/price-zone/add/')-> with('errmsg',"This Pricing Zone Already exist for this service And Item")->withInput($request->all);
            }
           
        }
    }

    public function update(Request $request, $id =''){
        if($request ->method() == 'GET' || $id != '' ){
            $data = Pricezone ::find($id);
            // echo "<pre/>";
            // print_r($data);die;
            $service_master = Service_master::all();
            $priceitem = Priceitem::where('service_master_id',$data->service_master_id)->get();
            return view('admin/priceZone/priceZone-update',['price' => $data,'service_master'=>$service_master, 'title' =>"Price Zone",'priceitem'=>$priceitem]);
        }else if ($request -> method() == "POST"){
            
            $request->validate([
                'service_master_id'  =>'required',
                'name'  =>'required',
                'priceitem_id' =>'required'
            ]);
            
            $duplicatcheck =Pricezone::where('name',$request->name)->where('service_master_id',$request->service_master_id)->where('priceitem_id',$request->priceitem_id)->where('id','!=',$request->id)->count();
            if($duplicatcheck == 0){
            
                 $update_data = Pricezone::where('id', $request->id)->update([
                        'service_master_id'  =>$request->service_master_id,
                        'name'  =>$request->name,
                        'priceitem_id' =>$request->priceitem_id
                     ]);
                 if($update_data){
                    
                     return Redirect::to('admin/price-zone')-> with('successmsg',Config::get('constants.UPDATE_SUCCESS'));
                     echo "ok3";die;
                 }else{
                     return Redirect::to('admin/price-zone')-> with('errmsg',Config::get('constants.UPDATE_ERROR'))->withInput($request->all);
                 }
             }else{
                 return Redirect::to('admin/price-zone/update/'.$request->id)-> with('errmsg',"This Pricing Zone Already exist for this service And Price Item")->withInput($request->all);
             }
        }
    }

    public function delete(Request $request,$id=''){
        if($request ->method() == 'GET' || $id != ''){
            $data =Pricezone ::where('id',$id)->first();
           // print_r($data);die;
            $delete = $data->delete();
            if($delete){
                return Redirect::to('admin/price-zone')-> with('successmsg',Config::get('constants.DELETE_SUCCESS'))->withInput($request->all);
            }else{
                return Redirect::to('admin/price-zone')-> with('errmsg',Config::get('constants.DELETE_ERROR'))->withInput($request->all);
            }
        }
    }

    public function getPriceItem(Request $request){
        $service_id = $request->get('serviceId');
        $priceItem =Priceitem ::where('service_master_id',$service_id)->get();
        $option = '<select id="selItem" name="item" class="form-select" onchange="getpricezone()"><option value=" ">Select A Price Item</option>';
        foreach($priceItem as $key => $data){
         $option = $option." "."<option value='".$data -> id."' >".$data -> name."</option>";
         }
         $option = $option." "."</select>";
         return $option;
    }
}
