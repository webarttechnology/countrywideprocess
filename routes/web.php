<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ServicesFrontendController;
use App\Http\Controllers\CompanyFrontendController;
use App\Http\Controllers\EfilingFrontendController;
use App\Http\Controllers\PricingFrontendController;
use App\Http\Controllers\TestimonialsFrontendController;
use App\Http\Controllers\AgentFrontendController;
use App\Http\Controllers\BlogFrontendController;
use App\Http\Controllers\ContactusFrontendController;
use App\Http\Controllers\CalculatorFrontendController;
use App\Http\Controllers\RegisterFrontendController;
use App\Http\Controllers\CustomerFrontendController;
use App\Http\Controllers\RecordingFrontendController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\OrderFrontendController;
use App\Http\Controllers\PayController;
use App\Models\Service_master;
use App\Http\Controllers\ProcessserviceController;

use App\Http\Controllers\SimplifyController;
use App\Http\Controllers\DashboardController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    $efile = Service_master::first();
    return view('frontend.home',['efile' =>$efile]);
});

Route::get('/services',[ServicesFrontendController::class,'service']);
Route::get('/services/{id}',[ServicesFrontendController::class,'servicedetails']);

Route::get('/company',[CompanyFrontendController::class,'company']);

// Route::get('/efillings-and-eservices',[EfilingFrontendController::class,'efiling']);

Route::get('/pricing',[PricingFrontendController::class,'pricing']);

Route::get('/calculator',[CalculatorFrontendController::class,'calculator']);
Route::get('/calculator/pricing-item',[CalculatorFrontendController::class,'getPricingItem']);
Route::get('/calculator/pricing-jobsize',[CalculatorFrontendController::class,'getJobSize']);
Route::get('/calculator/pricing-zone',[CalculatorFrontendController::class,'getPricingZone']);
Route::get('/calculator/price',[CalculatorFrontendController::class,'getPrice']);

Route::get('/testimonials',[TestimonialsFrontendController::class,'testimonials']);

Route::get('/agent',[AgentFrontendController::class,'agent']);
Route::post('/agent',[AgentFrontendController::class,'agent']);

Route::get('/blog',[BlogFrontendController::class,'blog']);
Route::get('/blog/{id}',[BlogFrontendController::class,'blogdetails']);

Route::get('/contact-us',[ContactusFrontendController::class,'contactus']);
Route::post('/contact-us',[ContactusFrontendController::class,'contactus']);

Route::get('/register',[RegisterFrontendController::class,'register']);
Route::post('/register',[RegisterFrontendController::class,'register']);

Route::post('/customer',[CustomerFrontendController::class,'showpricingList']);

Route::get('/login',[CustomerFrontendController::class,'login']);
Route::post('/login',[CustomerFrontendController::class,'login']);
Route::get('/logout',[CustomerFrontendController::class,'logout']);

Route::get('/erecording-service',[RecordingFrontendController::class,'recording']); 
Route::post('/erecording-service',[RecordingFrontendController::class,'recording']);
Route::post('/property-tax',[RecordingFrontendController::class,'tax']);
Route::post('/document-tab',[RecordingFrontendController::class,'document']);
Route::post('/payment-option',[RecordingFrontendController::class,'payment']);
Route::post('/legal-description',[RecordingFrontendController::class,'legaldescription']);

Route::get('/get-county',[RecordingFrontendController::class,'getcounty']);


Route::post('/payment', [PaymentController::class, 'getpay']);
Route::get('payment/success', [PaymentController::class, 'paymentsuccess']);

Route::post('/pay', [PaymentController::class, 'handleonlinepay']);

//Route::get('/new-order',[OrderFrontendController::class,'newerevording']); 
//Route::post('/order-info',[OrderFrontendController::class,'orderinfo']);
Route::post('/case-info',[OrderFrontendController::class,'caseinfo']);
Route::post('/add-party',[OrderFrontendController::class,'addparty']);  

Route::get('/payment-getway/{id}', [PayController::class, 'getpay']);
Route::post('/payment-getway', [PayController::class, 'getpay']);

Route::get('/process-serving', [ProcessserviceController::class, 'index']);


// Simplify API integration 


Route::get('/order-info',[SimplifyController::class,'orderinfo'])->middleware('is_customerlogin'); 

Route::get('/require-document', [SimplifyController::class, 'requireDocument'])->middleware('is_customerlogin'); 
Route::get('/require-document/{newid}', [SimplifyController::class, 'requireDocument'])->middleware('is_customerlogin'); 
Route::post('/require-document', [SimplifyController::class, 'requireDocument'])->middleware('is_customerlogin'); 
Route::get('/new-request', [SimplifyController::class, 'newrequest'])->middleware('is_customerlogin'); 




Route::post("/save-document", [SimplifyController::class, 'saveDocument']);

Route::get('/new-order',[SimplifyController::class,'orderinfo']); 
Route::post('/new-order',[SimplifyController::class,'orderinfo']); 
Route:: get('/get-jusisdiction', [SimplifyController::class, 'get_jusisdiction']);
Route::post("/case-participants", [SimplifyController::class, 'case_participants']);
Route::get("/case-participants", [SimplifyController::class, 'case_participants']);
Route::get("/retrieve-package/{id}", [SimplifyController::class, 'case_participants']);
Route::post("/add-document", [SimplifyController::class, 'add_document']);
Route::get("/add-document", [SimplifyController::class, 'add_document']);
Route::get("/success", [SimplifyController::class, 'success']);
Route::post("/success", [SimplifyController::class, 'success']);

Route::get("/submit-document", [SimplifyController::class, 'submitdocument'])->middleware('is_customerlogin');


Route::get("/user-dashboard", [DashboardController::class, 'userdashboard'])->middleware('is_customerlogin');
Route::get("/simplify-package", [DashboardController::class, 'simplifypackage'])->middleware('is_customerlogin');
Route::get("/viewer-package/{id}", [DashboardController::class, 'retrivepackage'])->middleware('is_customerlogin');
Route::get("/document-download/{id}", [DashboardController::class, 'downloaddocs'])->middleware('is_customerlogin');


