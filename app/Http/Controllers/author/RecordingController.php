<?php

namespace App\Http\Controllers\author;

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
use Sessio;
use DB;

class RecordingController extends Controller
{
    public function recording(Request $request){
        if($request ->method() == 'GET'){
            $recording = Recording::where('payment_status',1)->get();
           return view('admin/recording/record-list',['recording' =>$recording,'title'=>'Recording']);
        }
    }

    public function show(Request $request,$id=''){
        if($request ->method() == 'GET' || $id != ''){
            $data = Recording::where('id',$id)->first();
            // echo "<pre/>";
            // print_r($data);die;
            return view('admin/recording/record-view',['recording' =>$data,'title'=>'Recording']);
        }
    }
}
