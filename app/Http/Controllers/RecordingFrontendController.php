<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Str;
use App\Models\Recording;
use App\Models\State;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Hash;
use PHPUnit\Framework\Constraint\Count;
use Config;
use Validator;
use Mail;
use Session;
use DB;

class RecordingFrontendController extends Controller
{
    public function recording(Request $request){
        if($request ->method() == 'GET'){
            $stateName = State::groupBy('name')->get();         
           return view('frontend/recording',['state' =>$stateName,'newyork' =>2]);
        }else if($request ->method() == 'POST'){       
           
            if($_POST['form_status'] == 1){
               $request->session()->put('state_name', $_POST['state_name']);
               $request->session()->put('county', $_POST['county']);
               $request->session()->put('document_type', $_POST['document_type']);
               $request->session()->put('suffix', $_POST['suffix']);
               $request->session()->put('inlineRadio2', $_POST['inlineRadio2']);
               $request->session()->put('inlineRadio1', $_POST['inlineRadio1']);
               $request->session()->put('first_name', $_POST['first_name']);
               $request->session()->put('last_name', $_POST['last_name']);
               $request->session()->put('organization_name', $_POST['organization_name']);
               $request->session()->put('authorized_agent_name', $_POST['authorized_agent_name']);             
            }else if($_POST['form_status'] == 2){           
               $request->session()->put('state_name', $_POST['state_name']);
               $request->session()->put('county', $_POST['county']);
               $request->session()->put('document_type', $_POST['document_type']);
               $request->session()->put('grantee_suffix', $_POST['grantee_suffix']);
               $request->session()->put('grantee_inlineRadio2', $_POST['grantee_inlineRadio2']);
               $request->session()->put('grantee_inlineRadio1', $_POST['grantee_inlineRadio1']);
               $request->session()->put('grantee_first_name', $_POST['grantee_first_name']);
               $request->session()->put('grantee_last_name', $_POST['grantee_last_name']);
               $request->session()->put('grantee_organization_name', $_POST['grantee_organization_name']);
               $request->session()->put('grantee_authorized_agent_name', $_POST['grantee_authorized_agent_name']);
               $request->session()->put('execution_date', $_POST['execution_date']);
               $request->session()->put('consideration', $_POST['consideration']);
            }
        }
    }

    

    public function tax(Request $request){
        
        $request->session()->put('state_name', $_POST['state_name']);
        $request->session()->put('county', $_POST['county']);
        $request->session()->put('document_type', $_POST['document_type']);
        $request->session()->put('transfer_tax_exempt1', $_POST['transfer_tax_exempt1']);
        $request->session()->put('transfer_tax_exempt2', $_POST['transfer_tax_exempt2']);
        $request->session()->put('consideration_amount', $_POST['consideration_amount']);
        $request->session()->put('party_count', $_POST['party_count']);
        $request->session()->put('transfer_tax', $_POST['transfer_tax']);
        $request->session()->put('title_count', $_POST['title_count']);
        $request->session()->put('sb2', $_POST['sb2']);
    }


    public function getcounty(Request $request){
        if($request->method() == 'GET'){
            $state_name = $request->get('state_name'); 
            $get_county = State::where('name',$state_name)->get();
             $option = '<option value="">Select A County</option>';
             foreach($get_county as $key => $item){
             $option = $option." "."<option value='".$item->county."' >".$item -> county."</option>";
             }
             echo $option;
        }
    }

    public function document(Request $request){
        if($request->method() == 'POST'){   
      
            $request->session()->put('state_name', $_POST['state_name']);
            $request->session()->put('county', $_POST['county']);
            $request->session()->put('document_type', $_POST['document_type']);
          
            //print_r($_FILES);die;

            $recording =Recording::create([
                'document_type' =>$request->session()->get('document_type'),
                'state_name' =>$request->session()->get('state_name'),
                'county' =>$request->session()->get('county'),
                'suffix' =>$request->session()->get('suffix'),
                'inlineRadio2' =>$request->session()->get('inlineRadio2'),
                'inlineRadio1' =>$request->session()->get('inlineRadio1'),
                'first_name' =>$request->session()->get('first_name'),
                'last_name' =>$request->session()->get('last_name'),
                'organization_name' =>$request->session()->get('organization_name'),
                'authorized_agent_name' =>$request->session()->get('authorized_agent_name'),
                'execution_date' =>$request->session()->get('execution_date'),
                'consideration' =>$request->session()->get('consideration'),

                'section' =>$request->session()->get('section'),
                'block' =>$request->session()->get('block'),
                'lot' =>$request->session()->get('lot'),
                'unit' =>$request->session()->get('unit'),
                'town' =>$request->session()->get('town'),

               
                'grantee_suffix' =>$request->session()->get('grantee_suffix'),
                'grantee_inlineRadio2' =>$request->session()->get('grantee_inlineRadio2'),
                'grantee_inlineRadio1' =>$request->session()->get('grantee_inlineRadio1'),
                'grantee_first_name' =>$request->session()->get('grantee_first_name'),
                'grantee_last_name' =>$request->session()->get('grantee_last_name'),
                'grantee_authorized_agent_name' =>$request->session()->get('grantee_authorized_agent_name'),
                'grantee_organization_name' =>$request->session()->get('grantee_organization_name'),
                 
                'transfer_tax_exempt1' =>$request->session()->get('transfer_tax_exempt1'),
                'transfer_tax_exempt2' =>$request->session()->get('transfer_tax_exempt2'),
                'consideration_amount' =>$request->session()->get('consideration_amount'),
                'party_count' =>$request->session()->get('party_count'),
                'transfer_tax' =>$request->session()->get('transfer_tax'),
                'title_count' =>$request->session()->get('title_count'),
                'sb2' =>$request->session()->get('sb2'),

                'image1' =>1,
                'image_title1' =>$request->post('image_title1'),
              
            ]); 
            $lastId = $recording->id;
            
            $file = $request->file('image1');
            $name = $file->getClientOriginalName();
            $path = "uploads/";
            $file->move($path, $lastId."image1".$name);

            $image_name = $path. $lastId."image1".$name;
            $update_image = Recording::where('id', $lastId)->update([
                'image1' => $image_name
            ]);


            if($request->file('image2')){
                $file = $request->file('image2');
                $name = $file->getClientOriginalName();
                $path = "uploads/";
                $file->move($path, $lastId."image2".$name);
    
                $image_name2 = $path. $lastId."image2".$name;
                $update_image = Recording::where('id', $lastId)->update([
                    'image2' => $image_name2,
                    'image_title2' => $request->post('image_title2')
                ]);

            }if($request->file('image3')){
                $file = $request->file('image3');
                $name = $file->getClientOriginalName();
                $path = "uploads/";
                $file->move($path, $lastId."image3".$name);
    
                $image_name3 = $path. $lastId."image3".$name;
                $update_image = Recording::where('id', $lastId)->update([
                    'image3' => $image_name3,
                    'image_title3' => $request->post('image_title3')
                ]);

            }if($request->file('image4')){
                $file = $request->file('image4');
                $name = $file->getClientOriginalName();
                $path = "uploads/";
                $file->move($path, $lastId."image4".$name);
    
                $image_name4 = $path. $lastId."image4".$name;
                $update_image = Recording::where('id', $lastId)->update([
                    'image4' => $image_name4,
                    'image_title4' => $request->post('image_title4')
                ]);

            }
           


            if($update_image){
                // session_unset();
                Session::forget('state_name');
                Session::forget('county');
                Session::forget('document_type');
                return $lastId;
            }else{
                return 0;
            }


        }
    }


    public function legaldescription(Request $request){
        if($request->method() == 'POST'){
            $request->session()->put('section', $_POST['section']);
            $request->session()->put('block', $_POST['block']);
            $request->session()->put('lot', $_POST['lot']);
            $request->session()->put('unit', $_POST['unit']);
            $request->session()->put('town', $_POST['town']);
        }

    }


    public function payment(Request $request){
        if($request->method() == 'POST'){
           
           
        }
    }
    





    public function grantee(Request $request){
        if($request->method() == "GET"){
          
           if($request->get('grantee_recordtype') == '1'){    // grantee type 1 for Person          
               $grantee_name =$request->get('granteefname') ." ".$request->get('granteeLname') ." ". $request->get('granteeMname');
           
               $grantee =Recording::create([
                   'grantee_recordtype' =>$request->get('grantee_recordtype'),
                   'grantee_pname' =>$grantee_name
               ]); 
             
           
           }else if($request->get('grantee_recordtype') == '2'){ // grantee type 2 for Person 
           
                
               $grantee_organizationName =$request->post('granteefname')." ".$request->post('granteemname')." ".$request->post('granteelname');
               echo $grantee_organizationName;die;
               $grantee = Recording::create([
                   'grantee_recordtype'  =>$request->get('grantee_recordtype'),
                   'grantee_organinationstuffname'  => $grantee_organizationName,
                   'grantee_organization_name'  =>$request->get('grantee_organization_name'),
                   'grantee_organization_author' =>$request->get('grantee_organization_author')
               ]); 
           }
           
          
        }
        if($grantee){
           return 1;
       }else{
           return 0;
       }
    }



}
