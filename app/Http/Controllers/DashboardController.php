<?php

namespace App\Http\Controllers;
use Session;
use Illuminate\Http\Request;
use App\Traits\CountryTrait;
use Illuminate\Support\Facades\Redirect;
use App\Models\Package;

class DashboardController extends Controller
{

    use CountryTrait;

    public function userdashboard(Request $request){
        if($request->method() == "GET"){
            return view('frontend/user-dashboard');
        }
    }

    public function simplifypackage(Request $request){
        if($request->method() == "GET"){
            $package =Package::where(['user_id' => $request -> session() -> get('loginId')])->get(['user_id', 'submitterPackageID']);
          
                $a = array();
                foreach($package as $item){
                    $packagedata = $this -> retrievepackage($item->submitterPackageID);
                    array_push($a, $packagedata);
                }
                
              
                // echo "<pre/>";
                // print_r($a[0] );
                // die;
              


            return view('frontend/simplify-package',['packagedata'=>$a]);
        }
    }

    public function retrivepackage(Request $request,$id=''){
        if($request->method() == "GET" || $id != ''){
            $packagedata = $this -> retrievepackage($id);
        
            // $this -> retrivedocs($packagedata -> packageStatus -> documents[0] -> id);
            // die;
            return view('frontend/package-viewer',['packagedata'=>$packagedata,'docs'=>$packagedata->packageStatus->documents]);
        }

    }


    public function downloaddocs(Request $request,$id=''){
        if($request->method() == "GET" || $id != ''){
            $doenloaddocs = $this -> retrivedocs($id);
            echo "<pre/>";
            print_r($doenloaddocs);
            die;
        }
    }
}
