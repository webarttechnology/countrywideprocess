<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\author\ServicesMasterController;
use App\Http\Controllers\author\ServicesController;
use App\Http\Controllers\author\CompanyController;
use App\Http\Controllers\author\TestimonialsController;
use App\Http\Controllers\author\BlogController;
use App\Http\Controllers\PriceController;
use App\Http\Controllers\author\AgentController;
use App\Http\Controllers\author\UsersController;
use App\Http\Controllers\PriceitemController;
use App\Http\Controllers\PricezoneController;
use App\Http\Controllers\PricelevelController;

use App\Http\Controllers\author\RecordingController;
use App\Http\Controllers\author\PDFController;



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

Route::get('/admin', function () {
    return view('admin.login');
});

Route::get('/admin',[UserController::class,'login']);
Route::post('admin/login',[UserController::class,'login']);
Route::get('admin/logout',[UserController::class,'logout']);
Route::get('admin/dashboard',[Usercontroller::class, 'dashboard'])->middleware('is_login');


Route::prefix('/admin')-> group(function(){
    Route::get('/services-master',[ServicesMasterController::class,'list'])->middleware('is_login');
    Route::get('/services-master/add',[ServicesMasterController::class,'add'])->middleware('is_login');
    Route::post('/services-master/add',[ServicesMasterController::class,'add'])->middleware('is_login');
    Route::get('/services-master/update/{id}',[ServicesMasterController::class,'update'])->middleware('is_login');
    Route::post('/services-master/update',[ServicesMasterController::class,'update'])->middleware('is_login');
    Route::get('/services-master/delete/{id}',[ServicesMasterController::class,'delete'])->middleware('is_login');


    Route::get('/services',[ServicesController::class,'list'])->middleware('is_login');
    Route::get('/services/add',[ServicesController::class,'add'])->middleware('is_login');
    Route::post('/services/add',[ServicesController::class,'add'])->middleware('is_login');
    Route::get('/services/update/{id}',[ServicesController::class,'update'])->middleware('is_login');
    Route::post('/services/update',[ServicesController::class,'update'])->middleware('is_login');
    Route::get('/services/delete/{id}',[ServicesController::class,'delete'])->middleware('is_login');


    Route::get('/company',[CompanyController::class,'list'])->middleware('is_login');
    Route::get('/company/update/{id}',[CompanyController::class,'update'])->middleware('is_login');
    Route::post('/company/update',[CompanyController::class,'update'])->middleware('is_login');


    Route::get('/testimonials',[TestimonialsController::class,'list'])->middleware('is_login');
    Route::get('/testimonials/add',[TestimonialsController::class,'add'])->middleware('is_login');
    Route::post('/testimonials/add',[TestimonialsController::class,'add'])->middleware('is_login');
    Route::get('/testimonials/update/{id}',[TestimonialsController::class,'update'])->middleware('is_login');
    Route::post('/testimonials/update',[TestimonialsController::class,'update'])->middleware('is_login');
    Route::get('/testimonials/delete/{id}',[TestimonialsController::class,'delete'])->middleware('is_login');

    Route::get('/blog',[BlogController::class,'list'])->middleware('is_login');
    Route::get('/blog/add',[BlogController::class,'add'])->middleware('is_login');
    Route::post('/blog/add',[BlogController::class,'add'])->middleware('is_login');
    Route::get('/blog/update/{id}',[BlogController::class,'update'])->middleware('is_login');
    Route::post('/blog/update',[BlogController::class,'update'])->middleware('is_login');
    Route::get('/blog/delete/{id}',[BlogController::class,'delete'])->middleware('is_login');
    Route::get('/blog/delete/pdf/{id}',[BlogController::class,'deletepdf'])->middleware('is_login');


    Route::get('/agents',[AgentController::class,'list'])->middleware('is_login');
    Route::get('/agents/add',[AgentController::class,'add'])->middleware('is_login');
    Route::post('/agents/add',[AgentController::class,'add'])->middleware('is_login');
    Route::get('/agents/update/{id}',[AgentController::class,'update'])->middleware('is_login');
    Route::post('/agents/update',[AgentController::class,'update'])->middleware('is_login');
    Route::get('/agents/delete/{id}',[AgentController::class,'delete'])->middleware('is_login');


    Route::get('/users/{id}',[UsersController::class,'list'])->middleware('is_login');
    Route::get('/users/adduser/{id}',[UsersController::class,'add'])->middleware('is_login');
    Route::post('/users/adduser',[UsersController::class,'add'])->middleware('is_login');
    Route::get('/users/update/{id}',[UsersController::class,'update'])->middleware('is_login');
    Route::post('/users/update',[UsersController::class,'update'])->middleware('is_login');
    Route::get('/users/delete/{id}',[UsersController::class,'delete'])->middleware('is_login');

    Route::get('/price-item',[PriceitemController::class,'item'])->middleware('is_login');
    Route::get('/price-item/add',[PriceitemController::class,'add'])->middleware('is_login');
    Route::post('/price-item/add',[PriceitemController::class,'add'])->middleware('is_login');
    Route::get('/price-item/update/{id}',[PriceitemController::class,'update'])->middleware('is_login');
    Route::post('/price-item/update',[PriceitemController::class,'update'])->middleware('is_login');
    Route::get('/price-item/delete/{id}',[PriceitemController::class,'delete'])->middleware('is_login');

    Route::get('/price-zone',[PricezoneController::class,'item'])->middleware('is_login');
    Route::get('/price-zone/add',[PricezoneController::class,'add'])->middleware('is_login');
    Route::post('/price-zone/add',[PricezoneController::class,'add'])->middleware('is_login');
    Route::get('/price-zone/update/{id}',[PricezoneController::class,'update'])->middleware('is_login');
    Route::post('/price-zone/update',[PricezoneController::class,'update'])->middleware('is_login');
    Route::get('/price-zone/delete/{id}',[PricezoneController::class,'delete'])->middleware('is_login');

    Route::get('/price-zone/item',[PricezoneController::class,'getPriceItem']);

    Route::get('/price-level',[PricelevelController::class,'item'])->middleware('is_login');
    Route::get('/price-level/add',[PricelevelController::class,'add'])->middleware('is_login');
    Route::post('/price-level/add',[PricelevelController::class,'add'])->middleware('is_login');
    Route::get('/price-level/update/{id}',[PricelevelController::class,'update'])->middleware('is_login');
    Route::post('/price-level/update',[PricelevelController::class,'update'])->middleware('is_login');
    Route::get('/price-level/delete/{id}',[PricelevelController::class,'delete'])->middleware('is_login');

    Route::get('/price-level/zone',[PricelevelController::class,'getPricezone']);

    Route::get('/price',[PriceController::class,'item'])->middleware('is_login');
    Route::get('/price/add',[PriceController::class,'add'])->middleware('is_login');
    Route::post('/price/add',[PriceController::class,'add'])->middleware('is_login');
    Route::get('/price/update/{id}',[PriceController::class,'update'])->middleware('is_login');
    Route::post('/price/update',[PriceController::class,'update'])->middleware('is_login');
    Route::get('/price/delete/{id}',[PriceController::class,'delete'])->middleware('is_login');
    
    Route::get('/price/level',[PriceController::class,'getpricelevel']);

    Route::get('/recording',[RecordingController::class,'recording']);
    Route::get('/recording/view/{id}',[RecordingController::class,'show']);

    Route::get('/generate-pdf/{id}', [PDFController::class, 'generatePDF']);
    Route::get('/recording-download/{id}', [PDFController::class, 'downloadPDF']);
    

});




