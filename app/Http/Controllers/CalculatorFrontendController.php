<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Str;
use App\Models\Price;
use App\Models\Service_master;
use App\Models\Country;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Hash;
use PHPUnit\Framework\Constraint\Count;
use Config;
use Validator;
use Mail;
use Session;

class CalculatorFrontendController extends Controller
{
    public function calculator(Request $request){
        if($request ->method() == 'GET'){
            $data = Price:: all();
            $country = Country::all();
            $service = Service_master:: all();
            $efile = Service_master::first();
            return view('frontend/calculator',['price'=>$data,'service'=>$service,'country' =>$country,'efile' =>$efile]);
        }
    }

    public function getPricingItem(Request $request){
        if($request ->method() == 'GET'){
            $service_id = $request->get('serviceId');
           $get_item =Price::where('service_master_id',$service_id)->get();
           $option = '<option value=" ">Select A Item</option>';
           foreach($get_item as $key => $data){
            $option = $option." "."<option value='".$data -> item."' >".$data -> item."</option>";
            }
            echo $option;
        }
    }

    public function getJobSize(Request $request){
        if($request ->method() == 'GET'){
            $service_id = $request->get('serviceId');
            $itemname = $request->get('itemName');
            $get_jobsize=Price::where(array('service_master_id' =>$service_id ,'item' =>$itemname))->get();
            $option = '<option value=" ">Select A Job Size</option>';
            foreach($get_jobsize as $key => $data){
             $option = $option." "."<option value='".$data -> job_size."' >".$data -> job_size."</option>";
             }
             echo $option;
        }
    }


    public function getPricingZone(Request $request){
        if($request ->method() == 'GET'){
            $service_id = $request->get('serviceId');
            $itemname = $request->get('itemName');
            $jobSize = $request->get('jobsize')?$request->get('jobsize'):null;
            //echo $service_id . "-".$itemname. "-". $jobSize;
           
                $get_pricingzone=Price::where(array('service_master_id' =>$service_id ,'item' =>$itemname))->get();
           
            $option = '<option value=" ">Select A Court</option>';
            foreach($get_pricingzone as $key => $data){
             $option = $option." "."<option value='".$data -> price_zone."' >".$data -> price_zone."</option>";
             }
             echo $option;
        }
    }

    public function getPrice(Request $request){
        if($request ->method() == 'GET'){ 
            $service_id = $request->get('serviceId');
            $itemname = $request->get('itemName');
            $jobSize = $request->get('jobsize')?$request->get('jobsize'):null;
            $pzone = $request->get('pzone')?$request->get('pzone'):null;

                $option = '<h1 class="display-4 fw-bold">$0.00</h1>';
                $get_price=Price::select('amount', 'additional_case', 'page')->where(array('service_master_id' =>$service_id ,'priceitem_id' =>$itemname,'pricezone_id'=>$pzone,'pricelevel_id'=>$jobSize))->get();
                foreach($get_price as $key => $data){
                $option = '<h1 class="display-4 fw-bold">$'.number_format($data ->amount, 2).'</h1> <h6>'.$data -> page.'</h6> <h6> '.$data ->additional_case.'</h6>';
                }

            return  $option;
            

        }
    }

    
}
