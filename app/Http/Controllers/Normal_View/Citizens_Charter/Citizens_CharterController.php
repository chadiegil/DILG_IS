<?php

namespace App\Http\Controllers\Normal_View\Citizens_Charter;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Citizens_Charter;
use App\Models\Pdf_Upload_Cit_Charter;

use DB;
use PDF;

class Citizens_CharterController extends Controller
{
    public function index(){

        $cit_charter = DB::table('citizens_charters')->orderBy('created_at', 'ASC')->get();
        $pdf_cit_charter = Pdf_Upload_Cit_Charter::get();

        return view('Normal_View.Citizens_charter.index', compact('cit_charter', 'pdf_cit_charter'));
    }

    // public function export_citizes_charter_pdf(){

    //     set_time_limit(60);
        
    //     $cit_charter = Citizens_Charter::whereNotNull('created_at')->orderBy('created_at', 'ASC')->get();
    //     $pdf = PDF::loadView('pdf.citizens_charters', [
    //         'citizens_charters' => $cit_charter
    //     ]);
    //     return $pdf->download('Citizens Charter.pdf');
    // }

    public function download_pdf_cit_charter( Request $request, $file){

        return response()->download('/home/dilgboho/public_html/pdf_cit_charter/' .$file);

    }
}
