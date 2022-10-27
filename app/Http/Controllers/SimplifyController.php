<?php

namespace App\Http\Controllers;
use Session;
use Illuminate\Http\Request;
use App\Traits\CountryTrait;
use Illuminate\Support\Facades\Redirect;

class SimplifyController extends Controller
{   

    use CountryTrait;
    
    public function requireDocument(Request $request){
        if($request -> method() == 'GET'){
            $condition = $this -> getuniquecountry($request -> session() -> get('county'), $request -> session() -> get('jurisdiction')); 
            $formData = '';
            foreach($condition[0] -> requirements as $inputd){ 
                
                if($inputd -> type == 'ENUMERATED' && $inputd -> required != "IF_AVAILABLE"){
                   foreach($condition[1] as $optionval){
                       if($optionval -> path == $inputd -> path){
                          $optionvalue = $optionval -> options;
                       }
                   }
                   $formData.=$this -> getInput('radio', $inputd -> required, $inputd -> label, $inputd -> path, $optionvalue);
                   
                }else if($inputd -> type == 'STRING' && $inputd -> required != "IF_AVAILABLE"){
                    $formData.=$this -> getInput('STRING', $inputd -> required, $inputd -> label, $inputd -> path);
                }else if($inputd -> type == 'INTEGER' && $inputd -> required != "IF_AVAILABLE"){                  
                    $formData.=$this -> getInput('INTEGER', $inputd -> required, $inputd -> label, $inputd -> path);
                }else if($inputd -> type == 'BOOLEAN' && $inputd -> required != "IF_AVAILABLE"){                  
                    $formData.=$this -> getInput('BOOLEAN', $inputd -> required, $inputd -> label, $inputd -> path);
                }     
                   
            } 

         
            
            if($formData != ''){
            return view('simplify.case_participants', ['inputfields' => $formData]);
            }else{
              return redirect::to("case-participants");  
            }
           
           
        }else if($request -> method() == 'POST'){
             
          
             $request -> session() -> put('county', $request -> input('county'));
             $request -> session() -> put('jurisdiction', $request -> input('jurisdiction'));   
             $request -> session() -> put('packagename', $request -> input('package_name')); 
              
        
             $condition = $this -> getuniquecountry($request -> input('county'), $request -> input('jurisdiction')); 
            
            
             $formData = $this -> getInput('DOCUMENT', "ALWAYS", $request -> input('jurisdiction'), strtolower(str_replace(" ", "_", $request -> input('jurisdiction'))));
             $helpDocuments = 0;
             foreach($condition[0] -> requirements as $inputd){ 
                if($inputd -> type == 'HELPER_DOCUMENT'){
                    $helpDocuments++;
                    $formData.=$this -> getInput('HELPER_DOCUMENT', $inputd -> required, $inputd -> label, strtolower(str_replace(" ", "_", $inputd -> label)));
                }    
                   
            }             
             return view('simplify.require_documents', ['inputfields' => $formData, "isHelperdocuments" => $helpDocuments]);
            
        }else{
                return redirect::to('/');
        }
    }
    
    public function saveDocument(Request $request){
        
        if($request -> method() == "POST"){
            $base64Image = [];
            $documentName = [];

            //print_r($request -> post('applyMagicWand'));die;
            
            foreach($_FILES as $key=> $val){
                $documentName = $request -> input('documentname');
                if($request -> file($key) != ''){
                $base64Image[] =  base64_encode(file_get_contents($request -> file($key)));
                }else{
                    $base64Image[] = '';    
                }
            }
            
           $request -> session() -> put('document_name', $documentName);  
           $request -> session() -> put('require_documents', $base64Image); 
           $request -> session() -> put('applyMagicWand', $request -> post('applyMagicWand'));
           
         
        }
        
        return redirect::to('require-document');
    }
    
    
    public function orderinfo(Request $request){
        if($request -> method()=='POST'){            
            $request -> session() -> put('county', $request -> input('county'));
            $request -> session() -> put('jurisdiction', $request -> input('jurisdiction'));   
            $request -> session() -> put('packagename', $request -> input('package_name'));  
            
            $condition = $this -> getuniquecountry($request -> input('county'), $request -> input('jurisdiction')); 
            
          
           
        }else{
            
            if($request -> session() -> get('loginstatusforCustomer')){
                
                $request->session()->flash("finalData");
                $request -> session() -> flash('county');
                $request -> session() -> flash('jurisdiction');   
                $request -> session() -> flash('packagename'); 
                
                
                $msg = $request -> get('msg') == 1?'Your request submitted successfully.':'';
                $country = $this -> countryList($request); 
                return view('simplify.neworder', ['country' => $country, 'message' => $msg]);
            }else{
                return redirect::to('login');
            }
           
            
        }
       
    }

    public function case_participants(Request $request, $packageId = ''){
        if($request -> method() == 'POST'){
            return $this -> createPackage($request);
        }else{
            //return $this -> createPackage($request);
            return $this -> retrievepackage($packageId);
        }
    }

    public function add_document(Request $request, $packageId='100'){       
        if($request -> method() == "POST"){          
            $base64Image = [];
            
          
            
            foreach($request -> file('document') as $value){
                
       
                
              $base64Image[] =  base64_encode(file_get_contents($value));
            }
            
            // $base64Image[] =  base64_encode(file_get_contents($request -> file('document')));
            return $this -> addDocument($request, $request -> input('packageId'), $base64Image, $request -> session() -> get('formdataReceivedbyUser'));
        }else if($packageId != ''){
            return view("document", ['packageId' => $packageId]);
        }
    }


    public function get_jusisdiction(Request $request){
        if($request -> ajax()){
            $countryCode = $request -> get('countryCode');
            $optionvalue = $this -> getjusisdiction($countryCode);           
            $option = "<option value=''>Select</option>";
            foreach($optionvalue as $val){
                $option=$option.'<option value="'.$val -> instrument.'">'.$val -> instrument.'</option>';
            }
            echo $option;
        }
    }
    
    public function success(Request $request){
        
        if($request -> method() == "GET"){
            return view('simplify.success');           
        }else{
            return redirect::to('/new-order');  
        }
    }
    
    public function newrequest(Request $request){
        if($request -> method() == 'GET' && $request -> session() -> get('county') != ''){
            $jurisdiction = $this -> getjusisdiction($request -> session() -> get('county'));
            return view('simplify.new_request', ['jurisdiction' => $jurisdiction, "countryCode" => $request -> session() -> get('county'), 'package_name' => $request -> session() -> get('packagename')]);
        }else{
            return redirect::to('/');
        }
    }
    
    
    public function submitdocument(Request $request){
        $loginId = $request -> session() -> get('loginId');
        // echo  $loginId; die;
        return $this -> submitsimplefiDocument($request -> session() -> get('finalData'),$loginId);
    }

}
