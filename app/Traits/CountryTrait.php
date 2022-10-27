<?php
namespace App\Traits;    
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Session;
use App\Models\Document;
use App\Models\Package;

trait CountryTrait{
    private $link = "https://test.simplifile.com/sf/rest/api/erecord";
    private $key = "4DZB2NYSXMIIPZVDHVGLQI1QM<*>f345beNBZ8Pyzg2CZpwfKUhut6jwMBlIF/ZvaUaq4XA=";
    public function countryList($request){
        $endkey = '/recipients/all';
        $jdata = Http::get($this -> link.$endkey.'?key='.$this -> key);
        $data = json_decode($jdata);
        return $data -> recipientList -> recipients;
    }

    public function getuniquecountry($countryCode, $jurisdiction){
        $endkey = '/recipients/'.$countryCode.'/requirements';  
        $jdata = Http::get($this -> link.$endkey.'?key='.$this -> key);
        $data = json_decode($jdata);  
      
        foreach($data -> recipientRequirements -> instruments as $val){         
            if($val -> instrument == $jurisdiction){
                return [$val, $data -> recipientRequirements -> enumerations];
            }
        }
    }


    public function getjusisdiction($countryCode){
        $endkey = '/recipients/'.$countryCode.'/requirements';
        $jdata = Http::get($this -> link.$endkey.'?key='.$this -> key);
        $data = json_decode($jdata);
        return $data-> recipientRequirements -> instruments;
    }

    public function createPackage($requestData){
        
    //   echo  $requestData -> session() -> get('packagename');
    //   die;
      
        $submittedData = $requestData -> input();   
        $endkey = '/packages/create';  
        
        $documentArray = $requestData -> session() -> get('require_documents');
        $documentNameArray = $requestData -> session() -> get('document_name');

        $documentuploadedArray = [];
        for($i = 1; $i<count($documentArray); $i++){
          $documentuploadedArray[]=
				[
					"fileBytes"=> [
						$documentArray[$i]
					],
					"helperKindOfInstrument"=> $documentNameArray[$i]
				];
			 
        }


if($requestData -> session() -> get('finalData') == ''){

$userData = [
	"documents"=> [
		[
			"submitterDocumentID"=> rand(1000000, 9999999),
			"name"=> $documentNameArray[0],
			"kindOfInstrument"=> [
				$requestData -> session() -> get('jurisdiction')
			],
			"indexingData"=> [
				"mortgageConsideration"=> "0.00",
				"partyCount" => array_key_exists("partyCount", $submittedData)?$submittedData['partyCount']:'',
				"numberOfTitles" => array_key_exists("numberOfTitles", $submittedData)?$submittedData['numberOfTitles']:'',
				"filed" => array_key_exists("filed", $submittedData)?$submittedData['filed']:'',
				"exempt" => array_key_exists("exempt", $submittedData)?$submittedData['exempt']:'',
				"grantors"=> [
					[
			            "nameUnparsed"=> array_key_exists("grantors", $submittedData)?$submittedData['grantors'][1]:'',
                        "firstName"=> array_key_exists("grantors", $submittedData)?$submittedData['grantors'][2]:'',
                        "middleName"=> array_key_exists("grantors", $submittedData)?$submittedData['grantors'][3]:'',
                        "lastName"=> array_key_exists("grantors", $submittedData)?$submittedData['grantors'][4]:'',
                        "type"=> array_key_exists("grantors", $submittedData)?$submittedData['grantors'][0]:''
					]
				],
				"grantees"=> [
					[
                      "nameUnparsed"=> array_key_exists("grantors", $submittedData)?$submittedData['grantees'][1]:'',
                      "firstName"=> array_key_exists("grantors", $submittedData)?$submittedData['grantees'][2]:'',
                      "middleName"=> array_key_exists("grantors", $submittedData)?$submittedData['grantees'][3]:'',
                      "lastName"=> array_key_exists("grantors", $submittedData)?$submittedData['grantees'][4]:'',
                      "type"=> array_key_exists("grantors", $submittedData)?$submittedData['grantees'][0]:''
					]
				]
			],
			"fileBytes"=> [
				 $documentArray[0]
			],
			"helperDocuments"=> $documentuploadedArray
		]

	],
	"recipient"=> $requestData -> session() -> get('county'),
	"submitterPackageID"=> rand(100000, 999999),
	"name"=>$requestData -> session() -> get('packagename'),
    
	"operations"=> [
		"draftOnErrors"=> true,
		"submitImmediately"=> false,
		"applyMagicWand"=>  $requestData -> session() -> get('applyMagicWand'),
		"verifyPageMargins"=> true
	]
];

}else{
    
    $document = $requestData -> session() -> get('finalData')['documents'];
    
    $newDocument = 	[
			"submitterDocumentID"=> rand(1000000, 9999999),
			"name"=> $documentNameArray[0],
			"kindOfInstrument"=> [
				$requestData -> session() -> get('jurisdiction')
			],
			"indexingData"=> [
				"mortgageConsideration"=> "0.00",
				"partyCount" => array_key_exists("partyCount", $submittedData)?$submittedData['partyCount']:'',
				"numberOfTitles" => array_key_exists("numberOfTitles", $submittedData)?$submittedData['numberOfTitles']:'',
				"filed" => array_key_exists("filed", $submittedData)?$submittedData['filed']:'',
				"exempt" => array_key_exists("exempt", $submittedData)?$submittedData['exempt']:'',
				"grantors"=> [
					[
			            "nameUnparsed"=> array_key_exists("grantors", $submittedData)?$submittedData['grantors'][1]:'',
                        "firstName"=> array_key_exists("grantors", $submittedData)?$submittedData['grantors'][2]:'',
                        "middleName"=> array_key_exists("grantors", $submittedData)?$submittedData['grantors'][3]:'',
                        "lastName"=> array_key_exists("grantors", $submittedData)?$submittedData['grantors'][4]:'',
                        "type"=> array_key_exists("grantors", $submittedData)?$submittedData['grantors'][0]:''
					]
				],
				"grantees"=> [
					[
                      "nameUnparsed"=> array_key_exists("grantors", $submittedData)?$submittedData['grantees'][1]:'',
                      "firstName"=> array_key_exists("grantors", $submittedData)?$submittedData['grantees'][2]:'',
                      "middleName"=> array_key_exists("grantors", $submittedData)?$submittedData['grantees'][3]:'',
                      "lastName"=> array_key_exists("grantors", $submittedData)?$submittedData['grantees'][4]:'',
                      "type"=> array_key_exists("grantors", $submittedData)?$submittedData['grantees'][0]:''
					]
				]
			],
			"fileBytes"=> [
				 $documentArray[0]
			],
			"helperDocuments"=> $documentuploadedArray
		];
		
    
   
     $document[count($document)]= $newDocument;
     
     
     
     $userData = [
	"documents"=> $document,
	"recipient"=> $requestData -> session() -> get('county'),
	"submitterPackageID"=> rand(100000, 999999),
	"name"=> $requestData -> session() -> get('packagename'),
	"operations"=> [
		"draftOnErrors"=> true,
		"submitImmediately"=> false,
		"applyMagicWand"=>  $requestData -> session() -> get('applyMagicWand'),
		"verifyPageMargins"=> true
	]
];
    
}


$requestData -> session() -> put('finalData', $userData);



return redirect::to("success");
die;
        
    //     $jdata = Http::withHeaders([
    //         'api_token' => $this -> key
    //     ])->post($this -> link.$endkey, $userData);
        
        
    //   $data = json_decode($jdata);
        
    //   $requestData -> session() -> put('package_id', $data -> packageStatus -> id);
       
    //   if($data -> resultCode == 'SUCCESS'){
    //          return redirect::to("success?msg=".$data -> packageStatus -> id);
    //   }else{

    //   }
    }

  public function submitsimplefiDocument($userdata,$loginId){

    //print_r($loginId);die;
  
   $endkey = '/packages/create';  
    
//   $package = new Package([
//         'name' => $userdata['name'],
//         'recipient' => $userdata['recipient'],
//         'submitterPackageID' => $userdata['submitterPackageID'],
//         'operations' => json_encode($userdata['operations'])
//   ]);
   
//   $insertPackage = $package -> save();
   

   
   
//   foreach($userdata['documents'] as $val){
       
//      $document = new Document([
//       'packageId' => $insertPackage,
//       'submitterDocumentID' => $val['submitterDocumentID'],
//       'name' => $val['name'],
//       'kindOfInstrument' => $val['kindOfInstrument'][0],
//       'indexingData' => json_encode($val['indexingData']),
//       'fileBytes' => $val['fileBytes'][0],
//       'helperDocuments' => json_encode($val['helperDocuments'])
//      ]);
     
//      $document -> save();
//   }
   
//   die;
 
    
      
    $jdata = Http::withHeaders([
            'api_token' => $this -> key
    ])->post($this -> link.$endkey, $userdata);
        
    $data = json_decode($jdata);
    // echo "<pre/>";
    // print_r($userdata);die;

    // echo $loginId =$request ->session->get('loginID');die;
    
    if($data -> resultCode == 'SUCCESS'){
          $package = new Package([
                'user_id' =>$loginId,
                'submitterPackageID' => $data->packageStatus->alternatePackageName
            ]);
            $package->save();
       echo $data -> resultCode;
    }else{
        $errormsg = "<ul>";
        foreach($data->failure -> errors as $val){
            $errormsg .= "<li>".$val -> message."</li>";
        }
        $errormsg .= "</ul>";
        echo  $errormsg;
    }
      
  }


    public function getInput($type, $isRequire, $lable, $fieldName, $option = []){
      
        $fields = '';
        $optionfileds = '';
        
         $fieldId = str_replace("[].", "_", $fieldName);
         $fieldId = str_replace("(", "", $fieldId);
         $fieldId = str_replace(")", "", $fieldId);
         $fieldId = str_replace(";", "", $fieldId);
         $fieldId = str_replace("'", "", $fieldId);
      
         $blogId = $fieldId."_blog";
         
        if($type == 'radio'){
            if($option != ''){
            
            foreach($option as $val){
                $optionfileds .= '<option value='.strtolower($val).'>'.strtolower($val).'</option>';
            }

            
            $isRequireSign = $isRequire == 'ALWAYS'?'<span style="color:red;">*</span>':'';
    
            $fields.='<div class="col-md-12 mb-3" id="'.$blogId.'">
                <lable>'.$lable.' :'.$isRequireSign.'</lable>
                <select class="form-control" name="'.$fieldName.'" id="'.$fieldId.'">
                '.$optionfileds.'
                </select>
            </div>';
            }else{
                return "Require option values";
            }
        }else if($type == 'STRING'){           
            $isRequireSign = $isRequire == 'ALWAYS'?'<span style="color:red;">*</span>':'';
            $fields .='<div class="col-md-12 mb-3" id="'.$blogId.'">
            <lable>'.$lable.' :'.$isRequireSign.'</lable>
                <input type="text" class="form-control"  name="'.$fieldName.'" id="'.$fieldId.'" placeholder="'.$lable.'">
                <span id="organization_name_error" class="text-danger"></span>
            </div>';
        }else if($type == 'INTEGER'){            
            $isRequireSign = $isRequire == 'ALWAYS'?'<span style="color:red;">*</span>':'';
            $fields .='<div class="col-md-12 mb-3" id="'.$blogId.'">
            <lable>'.$lable.' :'.$isRequireSign.'</lable>
                <input type="number" class="form-control" name="'.$fieldName.'"  id="'.$fieldId.'" placeholder="'.$lable.'">
                <span id="organization_name_error" class="text-danger"></span>
            </div>';
        } else if($type == 'BOOLEAN'){
            $isRequireSign = $isRequire == 'ALWAYS'?'<span style="color:red;">*</span>':'';
            $fields .='<div class="col-md-12 mb-3" id="'.$blogId.'">
                <lable>'.$lable.' :'.$isRequireSign.'</lable>
                <input type="radio" name="'.$fieldName.'"  id="'.$fieldId.'" placeholder="'.$lable.'" value="Yes"> Yes
                <input type="radio" name="'.$fieldName.'"  id="'.$fieldId.'" placeholder="'.$lable.'" value="No"> No
                <span id="organization_name_error" class="text-danger"></span>
            </div>';
        }else if($type == 'DOCUMENT'){
            $isRequireSign = $isRequire == 'ALWAYS'?'<span style="color:red;">*</span>':'';
            $fields .='<div class="col-md-6 mb-3" id="'.$blogId.'">
                <lable>Main Document Name:'.$isRequireSign.'</lable>
                <input type="text" name="documentname[]" class="form-control"  id="'.$fieldId.'" placeholder="Main Document Name" required="required"/> 
                <span id="organization_name_error" class="text-danger"></span>
                </div>
            <div class="col-md-6 mb-3" id="'.$blogId.'">
                <lable>Upload document:'.$isRequireSign.'</lable>
                <input type="file" name="'.$blogId.'"  id="'.$fieldId.'" accept="application/pdf" placeholder="'.$lable.'" required="required" onchange="getFileData(this);"/> 
                <span id="organization_name_error" class="text-danger"></span>
            </div>';
        }else if($type == 'HELPER_DOCUMENT'){
            $isRequireSign = $isRequire == 'ALWAYS'?'<span style="color:red;">*</span>':' (optional)';
            $requiedStatus = $isRequire == 'ALWAYS'?'required':'';
            $fields .='<div class="col-md-6 mb-3 helperdocname" id="'.$blogId.'">
                <lable>Helper Document Name'.$isRequireSign.'</lable>
                <input type="text" name="documentname[]" class="form-control"  id="'.$fieldId.'"  placeholder="'.$lable.'" value="'.$lable.'" '.$requiedStatus.'/> 
                <span id="organization_name_error" class="text-danger"></span>
                </div>
                <div class="col-md-6 mb-3 helperdoc" id="'.$blogId.'">
                <lable>Upload document</lable>
                <input type="file" name="'.$blogId.'"  id="'.$fieldId.'" accept="application/pdf" placeholder="'.$lable.'" '.$requiedStatus.' onchange="getFileData(this);"/> 
                <span id="organization_name_error" class="text-danger"></span>
            </div>';
        }

        return $fields;
    }

    public function createpayment($request){   
        print_r($request -> input());
        die;
        $endkey = '/packages/create';       
        $jdata = Http::post($this -> link.$endkey.'?key='.$this -> key, [

        ]);

        print_r($jdata);
        die;

    }

    public function retrievepackage($packageId){
        $endkey = '/packages/'.$packageId.'/retrieve';
        $jdata = Http::get($this -> link.$endkey.'?key='.$this -> key);
        $data = json_decode($jdata);
        // echo "<pre/>";
        // print_r($data);
        return $data;
    }

    // public function retrieveallpackage(){
    //     $package =Package::all();
    //     foreach($package as $item){
    //         return retrievepackage($packageId);
    //     }
    //     return $package;
    // }

    public function retrivedocs($docsId){
        $endkey = '/documents/'.$docsId.'/retrieve';
        $jdata = Http::get($this -> link.$endkey.'?key='.$this -> key);
        $data = json_decode($jdata);
        // echo "<pre/>";
        // print_r($data);die;
        return $data;
    }

    public function addDocument($request, $packageId, $documents, $submittedData){
        
  
     
    //$endkey = '/packages/'.$packageId.'/document';
    $endkey = '/packages/create';
    $submitterDocumentID = rand(10000, 99999);
    $doc = [
	"documents"=> [
		[
			"submitterDocumentID"=> $submitterDocumentID,
			"name"=> $request -> session() -> get('jurisdiction'),
			"kindOfInstrument"=> [
				$request -> session() -> get('jurisdiction')
			],
			"indexingData"=> [
				"mortgageConsideration"=>  $request -> input('mortgageConsideration'),
				"grantors"=> [
					[
                        "nameUnparsed"=> $submittedData['grantors'][1],
                        "firstName"=> $submittedData['grantors'][2],
                        "middleName"=> $submittedData['grantors'][3],
                        "lastName"=> $submittedData['grantors'][4],
                        "type"=> $submittedData['grantors'][0]
					]
				],
				"grantees"=> [
					[
 	   			    "nameUnparsed"=> $submittedData['grantees'][1],
                    "firstName"=> $submittedData['grantees'][2],
                    "middleName"=> $submittedData['grantees'][3],
                    "lastName"=> $submittedData['grantees'][4],
                    "type"=> $submittedData['grantees'][0]
					]
				]
			],
			"fileBytes"=> [$documents[0]]
		],
		[
			"submitterDocumentID"=> $submitterDocumentID+1,
			"name"=> $request -> session() -> get('jurisdiction'),
			"kindOfInstrument"=> [
				$request -> session() -> get('jurisdiction')
			],
			"indexingData"=> [
				"mortgageConsideration"=> $request -> input('mortgageConsideration'),
				"grantors"=> [
					[
					  "nameUnparsed"=> $submittedData['grantors'][1],
                      "firstName"=> $submittedData['grantors'][2],
                      "middleName"=> $submittedData['grantors'][3],
                      "lastName"=> $submittedData['grantors'][4],
                      "type"=> $submittedData['grantors'][0]
					]
				],
				"grantees"=> [
					[
					 "nameUnparsed"=> $submittedData['grantees'][1],
                     "firstName"=> $submittedData['grantees'][2],
                     "middleName"=> $submittedData['grantees'][3],
                     "lastName"=> $submittedData['grantees'][4],
                     "type"=> $submittedData['grantees'][0]
					]
				]
			],
			"fileBytes"=> [$documents[1]]
		],
		
		[
			"submitterDocumentID"=> $submitterDocumentID+2,
			"name"=> $request -> session() -> get('jurisdiction'),
			"kindOfInstrument"=> [
				$request -> session() -> get('jurisdiction')
			],
			"indexingData"=> [
				"mortgageConsideration"=> $request -> input('mortgageConsideration'),
				"grantors"=> [
					[
					  "nameUnparsed"=> $submittedData['grantors'][1],
                      "firstName"=> $submittedData['grantors'][2],
                      "middleName"=> $submittedData['grantors'][3],
                      "lastName"=> $submittedData['grantors'][4],
                      "type"=> $submittedData['grantors'][0]
					]
				],
				"grantees"=> [
					[
					 "nameUnparsed"=> $submittedData['grantees'][1],
                     "firstName"=> $submittedData['grantees'][2],
                     "middleName"=> $submittedData['grantees'][3],
                     "lastName"=> $submittedData['grantees'][4],
                     "type"=> $submittedData['grantees'][0]
					]
				]
			],
			"fileBytes"=> [$documents[2]]
		]
	],
	"recipient"=> $request -> session() -> get('county'),
	"submitterPackageID"=> rand(10000, 99999),
	"name"=> time()."-package",
	"operations"=> [
		"draftOnErrors"=> true,
		"submitImmediately"=> false,
		"verifyPageMargins"=> true
	]
];



    
        
       $jdata = Http::withHeaders([
            'api_token' => $this -> key
        ])->post($this -> link.$endkey, $doc);

        $documentData = json_decode($jdata);
      
        print_r($documentData);
        die;
        
        if($documentData -> resultCode == "SUCCESS"){
            return redirect::to($documentData -> packageStatus -> viewPackageUrl);
        }else{

        }

    }
}

?>