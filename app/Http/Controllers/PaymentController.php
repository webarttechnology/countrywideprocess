<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use net\authorize\api\contract\v1 as AnetAPI;
use net\authorize\api\controller as AnetController;
use App\Models\Recording;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Str;
use App\Models\State;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Hash;
use PHPUnit\Framework\Constraint\Count;
use Config;
use Validator;
use Session;

class PaymentController extends Controller
{
    
    public function getpay(Request $request) {
        if($request->method() == "POST"){
            $data = $request->post('fav_language'); 
            $record_id =$request->record_id;
            Session::forget('recording_id');
            return view('frontend.pay',['amount' =>$data,'record_id' =>$record_id]);
        }
    }

    public function handleonlinepay(Request $request) {
        if($request->method() == "POST"){
        // echo "<pre/>";
        //  print_r($request->post());die;
        $request->validate([
            'fname'  =>'required|string',
            'lname'  =>'required|string',
            'company'  =>'required',
            'email_id'  =>'email|required',
            'address'  =>'required',
            'city'  =>'required',
            'country'  =>'required',
            'state'  =>'required',
            'pincode'  =>'required',
            'cardnumber'  =>'required|max:16',
            'expiry_month'  =>'required',  
            'expiry_year' =>'required' ,
            'csv_code' => 'required'          
        ]);
       $cardexpiredDate = $request->post('expiry_year') ."-".$request->post('expiry_month');
       $invoice_number=time();
       $record_id= $request->record_id;
       $document_type =Recording::select('document_type')->where('id',$record_id)->first();
    //    echo $document_type->document_type;die;
       //echo $record_id;die;
    $amount = $request->amount;
    $merchantAuthentication = new AnetAPI\MerchantAuthenticationType();
    $merchantAuthentication->setName(env('MERCHANT_LOGIN_ID'));
    $merchantAuthentication->setTransactionKey(env('MERCHANT_TRANSACTION_KEY'));
    
    // Set the transaction's refId
    $refId = 'ref' . time();
    // Create the payment data for a credit card
    $creditCard = new AnetAPI\CreditCardType();
    $creditCard->setCardNumber($request->cardnumber);
    $creditCard->setExpirationDate($cardexpiredDate);
    $creditCard->setCardCode($request->csv_code);

    // Add the payment data to a paymentType object
    $paymentOne = new AnetAPI\PaymentType();
    $paymentOne->setCreditCard($creditCard);

    // Create order information
    $order = new AnetAPI\OrderType();
    $order->setInvoiceNumber($invoice_number);
    $order->setDescription($document_type->document_type);

    // Set the customer's Bill To address
    $customerAddress = new AnetAPI\CustomerAddressType();
    $customerAddress->setFirstName($request->fname);
    $customerAddress->setLastName($request->lname);
    $customerAddress->setCompany($request->company);
    $customerAddress->setAddress($request->address);
    $customerAddress->setCity($request->city);
    $customerAddress->setState($request->state);
    $customerAddress->setZip($request->pincode);
    $customerAddress->setCountry($request->country);

    // Set the customer's identifying information
    $customerData = new AnetAPI\CustomerDataType();
    $customerData->setType("individual");
    $customerData->setId("99999456654");
    $customerData->setEmail($request -> email_id);

    // Add values for transaction settings
    $duplicateWindowSetting = new AnetAPI\SettingType();
    $duplicateWindowSetting->setSettingName("duplicateWindow");
    $duplicateWindowSetting->setSettingValue("60");

    // Add some merchant defined fields. These fields won't be stored with the transaction,
    // but will be echoed back in the response.
    $merchantDefinedField1 = new AnetAPI\UserFieldType();
    $merchantDefinedField1->setName("customerLoyaltyNum");
    $merchantDefinedField1->setValue("1128836273");

    $merchantDefinedField2 = new AnetAPI\UserFieldType();
    $merchantDefinedField2->setName("favoriteColor");
    $merchantDefinedField2->setValue("blue");

    // Create a TransactionRequestType object and add the previous objects to it
    $transactionRequestType = new AnetAPI\TransactionRequestType();
    $transactionRequestType->setTransactionType("authCaptureTransaction");
    $transactionRequestType->setAmount($amount);
    $transactionRequestType->setOrder($order);
    $transactionRequestType->setPayment($paymentOne);
    $transactionRequestType->setBillTo($customerAddress);
    $transactionRequestType->setCustomer($customerData);
    $transactionRequestType->addToTransactionSettings($duplicateWindowSetting);
    $transactionRequestType->addToUserFields($merchantDefinedField1);
    $transactionRequestType->addToUserFields($merchantDefinedField2);

    // Assemble the complete transaction request
    $request = new AnetAPI\CreateTransactionRequest();
    $request->setMerchantAuthentication($merchantAuthentication);
    $request->setRefId($refId);
    $request->setTransactionRequest($transactionRequestType);

    // Create the controller and get the response
    $controller = new AnetController\CreateTransactionController($request);
    $response = $controller->executeWithApiResponse(\net\authorize\api\constants\ANetEnvironment::PRODUCTION);
  
 

    if ($response != null) {
        // Check to see if the API request was successfully received and acted upon
        if ($response->getMessages()->getResultCode() == "Ok") {
            // Since the API request was successful, look for a transaction response
            // and parse it to display the results of authorizing the card
            $tresponse = $response->getTransactionResponse();
        
            if ($tresponse != null && $tresponse->getMessages() != null) {
                
                // echo " Successfully created transaction with Transaction ID: " . $tresponse->getTransId() . "\n";
                // echo " Transaction Response Code: " . $tresponse->getResponseCode() . "\n";
                // echo " Message Code: " . $tresponse->getMessages()[0]->getCode() . "\n";
                // echo " Auth Code: " . $tresponse->getAuthCode() . "\n";
                // echo " Description: " . $tresponse->getMessages()[0]->getDescription() . "\n";
               // echo $record_id;die;
          
                $update_paymentstatus = Recording::where('id', $record_id)->update([
                    'payment_status' => 1,
                    'payment_amt' => $amount,
                    'invoice_no' =>$tresponse->getTransId()
                ]);
               
                if($update_paymentstatus){
                    Session::put('paymentrecord_id',$record_id );
                    return Redirect::to('payment/success')-> with('paymentsuccessmsg',Config::get('constants.ADD_SUCCESS'));
                }
            } else {
                echo "Transaction Failed \n";
                if ($tresponse->getErrors() != null) {
                    echo " Error Code  : " . $tresponse->getErrors()[0]->getErrorCode() . "\n";
                    echo " Error Message : " . $tresponse->getErrors()[0]->getErrorText() . "\n";
                }
            }
            // Or, print errors if the API request wasn't successful
        } else {
            echo "Transaction Failed \n";
            $tresponse = $response->getTransactionResponse();
        
            if ($tresponse != null && $tresponse->getErrors() != null) {
                echo " Error Code  : " . $tresponse->getErrors()[0]->getErrorCode() . "\n";
                echo " Error Message : " . $tresponse->getErrors()[0]->getErrorText() . "\n";
            } else {
                echo " Error Code  : " . $response->getMessages()->getMessage()[0]->getCode() . "\n";
                echo " Error Message : " . $response->getMessages()->getMessage()[0]->getText() . "\n";
            }
        }
    } else {
        echo  "No response returned \n";
    }
    }
}

 public function paymentsuccess(Request $request){
     if($request->method() == "GET" ){
        $record_id = Session::get('paymentrecord_id');
        // echo $record_id;die;
        $data =Recording::where('id',$record_id)->first();
        //  print_r($data->invoice_no);die;
         if($data->invoice_no != ''){
            return view('frontend.payment-success',['tranjuctionId' =>$data->invoice_no]);
         }else{
            return Redirect::to('/');
         }
        
     }
 }
}
