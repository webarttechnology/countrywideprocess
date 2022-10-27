<?php

namespace App\Http\Controllers\author;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Recording;
use PDF;

class PDFController extends Controller
{
    public function generatePDF(Request $request,$id=''){
        if($request->method() == 'GET' || $id != ''){
           $data =Recording::where('id',$id)->first();
            $pdf = PDF::loadView('admin.myPDF', ['pdfdata'=>$data]);
        
            return $pdf->download('eRecordinginformation.pdf');
        }
    }

    public function downloadPDF(Request $request,$id=''){
        
      
    
        if($request->method() == 'GET' || $id != ''){
            $data =Recording::select('image1','image2','image3','image4')->where('id',$id)->first();  
         
            $myFile = public_path($data -> image1); //Let say If I put the file name Bang.png
            $headers = ['Content-Type: application/pdf'];
            $newName = 'itsolutionstuff-pdf-file-'.time().'.pdf';
            return response()->download($myFile, $newName, $headers);
          
            if($data->image2 != ''){
                $myFile = public_path($data -> image2); //Let say If I put the file name Bang.png
                $headers = ['Content-Type: application/pdf'];
                $newName = 'itsolutionstuff-pdf-file1-'.time().'.pdf';
                echo response()->download($myFile, $newName, $headers);
            }
            if($data->image3 != ''){
                $myFile = public_path($data -> image3); //Let say If I put the file name Bang.png
                $headers = ['Content-Type: application/pdf'];
                $newName = 'itsolutionstuff-pdf-file2-'.time().'.pdf';
                echo response()->download($myFile, $newName, $headers);
            }
            if($data->image4 != ''){
                $myFile = public_path($data -> image4); //Let say If I put the file name Bang.png
                $headers = ['Content-Type: application/pdf'];
                $newName = 'itsolutionstuff-pdf-file5-'.time().'.pdf';
                echo response()->download($myFile, $newName, $headers);
            }
    
    
            
          


            // return response()->download([public_path('Document1.pdf'),public_path('Document2.pdf')]);
        }
    }


}
