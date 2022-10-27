<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Str;
use App\Models\Testimonial;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Hash;
use PHPUnit\Framework\Constraint\Count;
use Config;
use Validator;
use Mail;
use Session;

class TestimonialsFrontendController extends Controller
{
    public function testimonials(Request $request){
        if($request ->method() == 'GET'){
            $data = Testimonial:: all();
            return view('frontend/testimonials',['testimonials'=>$data]);
        }
    }
}
