<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Str;
use App\Models\Blog;
use App\Models\Pdf_master;
use App\Models\Company;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Hash;
use PHPUnit\Framework\Constraint\Count;
use Config;
use Validator;
use Mail;
use Session;

class BlogFrontendController extends Controller
{
    public function blog(Request $request){
        if($request ->method() == 'GET'){
            $data = Blog:: all();
            return view('frontend/blog',['blog'=>$data]);
        }
    }

    public function blogdetails(Request $request, $id =''){
        if($request ->method() == 'GET' || $id != ''){
            $data = Blog::all();      
            $company = Company::all();
            $pdf = Pdf_master::all();
            //$servicelist = Service_master::where('id','>',$data->id)->orderBy('id','ASC')-> limit(1);
            //(select *from service_masters WHERE Id > 2 ORDER BY Id ASC LIMIT 1) UNION (select *from service_masters WHERE Id < 2 ORDER BY Id DESC LIMIT 1);
            return view('frontend/blog-details',['blog' =>$data,'company' =>$company, 'slug_name'=> $id, 'max_length' => count($data),'pdf'=>$pdf]);
        }
    }
}
