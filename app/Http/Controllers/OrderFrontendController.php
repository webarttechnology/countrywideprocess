<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Str;
use App\Models\Service_master;
use App\Models\State;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Hash;
use PHPUnit\Framework\Constraint\Count;
use Config;
use Validator;
use Mail;
use Session;
use DB;

class OrderFrontendController extends Controller
{
    public function newerevording(Request $request){
        $service =Service_master::all();
        $country =State::all();
        session_unset();
        return view("frontend.new-erecording",['service' =>$service,'county' =>$country]);

    }

    public function orderinfo(Request $request){
        if($request->method() == "POST"){
            //print_r($_POST);
            $newarray = [
                'service' =>$request->post('service'),
                'county' =>$request->post('county'),
                'jurisdiction' =>$request->post('jurisdiction')
            ];
               
            $request->session()->put('service', $_POST['service']);
            $request->session()->put('county', $_POST['county']);
            $request->session()->put('jurisdiction', $_POST['jurisdiction']);
            return $newarray;  
        }

    }

    public function caseinfo(Request $request){
        if($request->method() == "POST"){
           // print_r($_POST);
            $caseinfo = [
                'case_number' =>$request->post('case_number'),
                'jurisdiction' =>$request->post('jurisdiction1')
            ];
            $request->session()->put('case_number', $_POST['case_number']);
            $request->session()->put('jurisdiction', $_POST['jurisdiction1']);
            return $caseinfo;
        }
    }

    public function addparty(Request $request){
        if($request->method() == "POST"){
           // print_r($_POST);
          
          // $request->session()->put('party', $request->post());
          if($request->post('inlineRadio1') == "true"){
                $party= "<td><input type ='checkbox' name='checkerror'></td><td>".$request->post('fast_name'). " " .$request->post('last_name')."</td>
                <td>".$request->post('roles')."</td>";
          }else{
            $party= "<td><input type ='checkbox' name='checkerror'></td><td>".$request->post('organigation_name') ."</td>
            <td>".$request->post('roles')."</td>";
          }
        

        $addparty = [
            'roles' =>$request->roles,
            'person' =>$request->inlineRadio1,
            'organzation' =>$request->inlineRadio2,
            'peoplename' =>$request->fast_name .$request->middle_name.$request->last_name,
            'organigation_name' =>$request->organigation_name,
            'suffix' =>$request->suffix,
            'isthisleadclient1' =>$request->isthisleadclient1,
            'isthisleadclient2' =>$request->isthisleadclient2,
            'party_record' => $party
        ];

      

        $request->session()->put('roles', $_POST['roles']);
        $request->session()->put('person', $_POST['inlineRadio1']);       
        $request->session()->put('organization', $_POST['inlineRadio2']);
        $request->session()->put('fast_name', $_POST['fast_name']);
        $request->session()->put('middle_name', $_POST['middle_name']);
        $request->session()->put('last_name', $_POST['last_name']);
        $request->session()->put('organigation_name', $_POST['organigation_name']);
        $request->session()->put('suffix', $_POST['suffix']);
        $request->session()->put('isthisleadclient1', $_POST['isthisleadclient1']);
        $request->session()->put('isthisleadclient2', $_POST['isthisleadclient2']);

        return $addparty;
        }
    }
}
