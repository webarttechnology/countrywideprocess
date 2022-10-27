<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Str;
use App\Models\Priceitem;
use App\Models\Pricezone;
use App\Models\Pricelevel;
use App\Models\Service_master;
use App\Models\Price;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Hash;
use PHPUnit\Framework\Constraint\Count;
use Config;
use Validator;
use Mail;
use Session;

class PriceController extends Controller
{
    public function item(Request $request){
        if($request -> method() == "GET"){
            $data = Price:: all();
            $Service_master = Service_master::get();
            $priceitem = Priceitem::get();
            $pricezone = Pricezone::get();
            $pricelevel = Pricelevel::get();
            return view('admin/price/price-list',['price'=>$data,'pricezone'=>$pricezone,'service_master' => $Service_master,'priceitem'=>$priceitem,'pricelevel'=>$pricelevel,'title'=>"Price"]);

        }else{

        }
    }

    public function add(Request $request){
        if($request ->method() == 'GET'){       
            $data = Service_master::all();
            return view('admin/price/price-add',['title' =>"Price",'service' => $data]);
        }else if($request -> method() == "POST"){
            //print_r($request->post());die;   
            $request->validate([
                'service_master_id'  =>'required',
                'priceitem_id' =>'required',
                'pricezone_id' =>'required',
                'pricelevel_id' =>'required',
                'amount' =>'required'
            ]);  
                $pricezone = Price::create([
                 'service_master_id'  =>$request->service_master_id,
                 'priceitem_id' =>$request->priceitem_id,
                 'pricezone_id' =>$request->pricezone_id,
                 'pricelevel_id' =>$request->pricelevel_id,
                 'amount' =>$request->amount,
                 'page'=>$request->page,
                 'additional_case' =>$request->additional_case
                ]);
               
                if($pricezone->save()){
                    return Redirect::to('admin/price')-> with('successmsg',Config::get('constants.ADD_SUCCESS'));
                }else{
                    return Redirect::to('admin/price')-> with('errmsg',Config::get('constants.ADD_ERROR'))->withInput($request->all);
                }
           
           
        }
    }

    public function update(Request $request, $id =''){
        if($request ->method() == 'GET' || $id != '' ){
            $data = Price ::find($id);
            $service_master = Service_master::all();
            $priceitem = Priceitem::where('service_master_id',$data->service_master_id)->get();
            $pricezone = Pricezone::where('service_master_id',$data->service_master_id)->where('priceitem_id',$data->priceitem_id)->get();
            $pricelevel = Pricelevel::where('service_master_id',$data->service_master_id)->where('priceitem_id',$data->priceitem_id)->where('pricezone_id',$data->pricezone_id)->get();
            return view('admin/price/price-update',['price' => $data,'service_master'=>$service_master, 'title' =>"Price Level",'priceitem'=>$priceitem,'pricezone'=>$pricezone,'pricelevel'=>$pricelevel]);
        }else if ($request -> method() == "POST"){
            
            $request->validate([
                'service_master_id'  =>'required',
                'priceitem_id' =>'required',
                'pricezone_id' =>'required',
                'pricelevel_id' =>'required',
                'amount' =>'required'
            ]);
            
           
                 $update_data = Price::where('id', $request->id)->update([
                    'service_master_id'  =>$request->service_master_id,
                    'priceitem_id' =>$request->priceitem_id,
                    'pricezone_id' =>$request->pricezone_id,
                    'pricelevel_id' =>$request->pricelevel_id,
                    'amount' =>$request->amount,
                    'page'=>$request->page,
                    'additional_case' =>$request->additional_case
                     ]);
                 if($update_data){
                    
                     return Redirect::to('admin/price')-> with('successmsg',Config::get('constants.UPDATE_SUCCESS'));
                 }else{
                     return Redirect::to('admin/price')-> with('errmsg',Config::get('constants.UPDATE_ERROR'))->withInput($request->all);
                 }
            
        }
    }

    public function delete(Request $request,$id=''){
        if($request ->method() == 'GET' || $id != ''){
            $data =Price ::where('id',$id)->first();
           // print_r($data);die;
            $delete = $data->delete();
            if($delete){
                return Redirect::to('admin/price')-> with('successmsg',Config::get('constants.DELETE_SUCCESS'))->withInput($request->all);
            }else{
                return Redirect::to('admin/price')-> with('errmsg',Config::get('constants.DELETE_ERROR'))->withInput($request->all);
            }
        }
    }


    public function getpricelevel(Request $request){
        $service_id = $request->get('serviceId');
        $item_id =$request->get('item_id');
        $zone_id =$request->get('zone_id');
        $pricelevel =Pricelevel ::where('service_master_id',$service_id)->where('priceitem_id',$item_id)->where('pricezone_id',$zone_id)->get();
        $option = ' <select id="selCourt" class="form-select"><option value=" ">Select A Price Item</option>';
        foreach($pricelevel as $key => $data){
         $option = $option." "."<option value='".$data -> id."' >".$data -> name."</option>";
         }
         $option = $option." "."</select>";
         return $option;
    }

}
