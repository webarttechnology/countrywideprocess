<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use net\authorize\api\contract\v1 as AnetAPI;
use net\authorize\api\controller as AnetController;
use App\Models\Recording;
use App\Models\Registration;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Str;
use App\Models\State;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Hash;
use PHPUnit\Framework\Constraint\Count;
use Config;
use Validator;
use Session;

class PayController extends Controller
{
    public function getpay(Request $request,$id=''){
        if($request->method() == "GET" || $id != ''){
            // echo "<pre/>";
            $data =Registration::where('id',$id)->first();
           // print_r($data);die;
            return view('frontend.rpayment',['registration'=>$data]);
        }else if($request->method() == "POST"){
            // print_r($request->post());die;
            $customer_id =$request->customer_id;
            $cardexpiredDate = $request->post('expiry_year') ."-".$request->post('expiry_month');
            $merchantAuthentication = new AnetAPI\MerchantAuthenticationType();
            $merchantAuthentication->setName(env('MERCHANT_LOGIN_ID'));
            $merchantAuthentication->setTransactionKey(env('MERCHANT_TRANSACTION_KEY'));

            $refId = 'ref' . time();  

    // Set credit card information for payment profile
    $creditCard = new AnetAPI\CreditCardType();
    $creditCard->setCardNumber($request->cardnumber);
    $creditCard->setExpirationDate($cardexpiredDate);
    $creditCard->setCardCode($request->csv_code);
    $paymentCreditCard = new AnetAPI\PaymentType();
    $paymentCreditCard->setCreditCard($creditCard);

    // Create the Bill To info for new payment type
    $billTo = new AnetAPI\CustomerAddressType();
    $billTo->setFirstName($request->name);
    $billTo->setLastName("Johnson");
    $billTo->setCompany("Souveniropolis");
    $billTo->setAddress($request->address);
    $billTo->setCity($request->city);
    $billTo->setState($request->state);
    $billTo->setZip($request->pincode);
    $billTo->setCountry($request->country);
    $billTo->setPhoneNumber($request->mobile_no);
    $billTo->setfaxNumber("999-999-9999");

    // Create a customer shipping address
    $customerShippingAddress = new AnetAPI\CustomerAddressType();
    $customerShippingAddress->setFirstName("James");
    $customerShippingAddress->setLastName("White");
    $customerShippingAddress->setCompany("Addresses R Us");
    $customerShippingAddress->setAddress(rand() . " North Spring Street");
    $customerShippingAddress->setCity("Toms River");
    $customerShippingAddress->setState("NJ");
    $customerShippingAddress->setZip("08753");
    $customerShippingAddress->setCountry("USA");
    $customerShippingAddress->setPhoneNumber("888-888-8888");
    $customerShippingAddress->setFaxNumber("999-999-9999");

    // Create an array of any shipping addresses
    $shippingProfiles[] = $customerShippingAddress;


    // Create a new CustomerPaymentProfile object
    $paymentProfile = new AnetAPI\CustomerPaymentProfileType();
    $paymentProfile->setCustomerType('individual');
    $paymentProfile->setBillTo($billTo);
    $paymentProfile->setPayment($paymentCreditCard);
    $paymentProfiles[] = $paymentProfile;


    // Create a new CustomerProfileType and add the payment profile object
    $customerProfile = new AnetAPI\CustomerProfileType();
    $customerProfile->setDescription("Customer 2 Test PHP");
    $customerProfile->setMerchantCustomerId("M_" . time());
    $customerProfile->setEmail($request->email_id);
    $customerProfile->setpaymentProfiles($paymentProfiles);
    $customerProfile->setShipToList($shippingProfiles);


    // Assemble the complete transaction request
    $request = new AnetAPI\CreateCustomerProfileRequest();
    $request->setMerchantAuthentication($merchantAuthentication);
    $request->setRefId($refId);
    $request->setProfile($customerProfile);

    // Create the controller and get the response
    $controller = new AnetController\CreateCustomerProfileController($request);
    $response = $controller->executeWithApiResponse(\net\authorize\api\constants\ANetEnvironment::PRODUCTION);
  
    if (($response != null) && ($response->getMessages()->getResultCode() == "Ok")) {
        echo "Succesfully created customer profile : " . $response->getCustomerProfileId() . "\n";
        $paymentProfiles = $response->getCustomerPaymentProfileIdList();
        //echo "SUCCESS: PAYMENT PROFILE ID : " . $paymentProfiles[0] . "\n";
        return Redirect::to('login')-> with('successmsg',"Account created successfully");
    } else {
        echo "ERROR :  Invalid response\n";
        $errorMessages = $response->getMessages()->getMessage();
        //echo "Response : " . $errorMessages[0]->getCode() . "  " .$errorMessages[0]->getText() . "\n";
        return Redirect::to('payment-getway/'.$customer_id)->with('errmsg',"Some Error in Your Card Details Please Check");
    }
    //print_r($response);
            
        }

    }
}
