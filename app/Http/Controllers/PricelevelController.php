<?php

namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Str;
use App\Models\Priceitem;
use App\Models\Pricezone;
use App\Models\Pricelevel;
use App\Models\Service_master;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Hash;
use PHPUnit\Framework\Constraint\Count;
use Config;
use Validator;
use Mail;
use Session;

use Illuminate\Http\Request;

class PricelevelController extends Controller
{
    public function item(Request $request){
        if($request -> method() == "GET"){
            $data = Pricelevel:: all();
            $Service_master = Service_master::get();
            $priceitem = Priceitem::get();
            $pricezone = Pricezone::get();
            return view('admin/pricelevel/pricelevel-list',['pricelevel'=>$data,'pricezone'=>$pricezone,'service_master' => $Service_master,'priceitem'=>$priceitem,'title'=>"Price level"]);

        }else{

        }
    }

    public function add(Request $request){
        if($request ->method() == 'GET'){       
            $data = Service_master::all();
            return view('admin/pricelevel/pricelevel-add',['title' =>"Price level",'service' => $data]);
        }else if($request -> method() == "POST"){
            //print_r($request->post());die;   
            $request->validate([
                'service_master_id'  =>'required',
                'name'  =>'required',
                'priceitem_id' =>'required',
                'pricezone_id' =>'required'
            ]);

            $duplicatcheck =Pricelevel::where('name',$request->name)->where('service_master_id',$request->service_master_id)->where('priceitem_id',$request->priceitem_id)->where('pricezone_id',$request->pricezone_id)->count();
            if($duplicatcheck == 0){
                $pricezone = Pricelevel::create([
                 'service_master_id'  =>$request->service_master_id,
                 'name'  =>$request->name,
                 'priceitem_id' =>$request->priceitem_id,
                 'pricezone_id' =>$request->pricezone_id
                ]);
               
                if($pricezone->save()){
                    return Redirect::to('admin/price-level')-> with('successmsg',Config::get('constants.ADD_SUCCESS'));
                }else{
                    return Redirect::to('admin/price-level')-> with('errmsg',Config::get('constants.ADD_ERROR'))->withInput($request->all);
                }
            }else{
                return Redirect::to('admin/price-level/add/')-> with('errmsg',"This Pricing Level Already exist for this service And Item and Pricing Zone")->withInput($request->all);
            }
           
        }
    }

    public function update(Request $request, $id =''){
        if($request ->method() == 'GET' || $id != '' ){
            $data = Pricelevel ::find($id);
            $service_master = Service_master::all();
            $priceitem = Priceitem::where('service_master_id',$data->service_master_id)->get();
            $pricezone = Pricezone::where('service_master_id',$data->service_master_id)->where('priceitem_id',$data->priceitem_id)->get();
            return view('admin/pricelevel/pricelevel-update',['price' => $data,'service_master'=>$service_master, 'title' =>"Price Level",'priceitem'=>$priceitem,'pricezone'=>$pricezone]);
        }else if ($request -> method() == "POST"){
            
            $request->validate([
                'service_master_id'  =>'required',
                'name'  =>'required',
                'priceitem_id' =>'required',
                'pricezone_id' =>'required'
            ]);
            
            $duplicatcheck =Pricelevel::where('name',$request->name)->where('service_master_id',$request->service_master_id)->where('pricezone_id',$request->pricezone_id)->where('priceitem_id',$request->priceitem_id)->where('id','!=',$request->id)->count();
            if($duplicatcheck == 0){
            
                 $update_data = Pricelevel::where('id', $request->id)->update([
                    'service_master_id'  =>$request->service_master_id,
                    'name'  =>$request->name,
                    'priceitem_id' =>$request->priceitem_id,
                    'pricezone_id' =>$request->pricezone_id
                     ]);
                 if($update_data){
                    
                     return Redirect::to('admin/price-level')-> with('successmsg',Config::get('constants.UPDATE_SUCCESS'));
                     echo "ok3";die;
                 }else{
                     return Redirect::to('admin/price-level')-> with('errmsg',Config::get('constants.UPDATE_ERROR'))->withInput($request->all);
                 }
             }else{
                 return Redirect::to('admin/price-level/update/'.$request->id)-> with('errmsg',"This Pricing Level Already exist for this service And Item and Pricing Zone")->withInput($request->all);
             }
        }
    }

    public function delete(Request $request,$id=''){
        if($request ->method() == 'GET' || $id != ''){
            $data =Pricelevel ::where('id',$id)->first();
           // print_r($data);die;
            $delete = $data->delete();
            if($delete){
                return Redirect::to('admin/price-level')-> with('successmsg',Config::get('constants.DELETE_SUCCESS'))->withInput($request->all);
            }else{
                return Redirect::to('admin/price-level')-> with('errmsg',Config::get('constants.DELETE_ERROR'))->withInput($request->all);
            }
        }
    }


    public function getPricezone(Request $request){
        $service_id = $request->get('serviceId');
        $item_id =$request->get('item_id');
        $pricezone =Pricezone ::where('service_master_id',$service_id)->where('priceitem_id',$item_id)->get();
        $option = '<select id="seljobsize" class="form-select" onchange="getpricelevel()"><option value=" ">Select A Price Item</option>';
        foreach($pricezone as $key => $data){
         $option = $option." "."<option value='".$data -> id."' >".$data -> name."</option>";
         }
         $option = $option." "."</select>";
         return $option;
    }

}
