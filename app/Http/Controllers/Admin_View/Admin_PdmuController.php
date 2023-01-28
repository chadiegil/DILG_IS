<?php

namespace App\Http\Controllers\Admin_View;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
use App\Models\Pdmu;
use Image;
use File;

class Admin_PdmuController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(){

        $pdmus = DB::table('pdmus')->get();
        return view('Admin_View.pdmu.index', compact('pdmus'));
    }

    public function store(Request $request){
        
        $pdmus = new Pdmu;
       
        $pdmus->fname = $request->input('fname');
        $pdmus->mid_initial = $request->input('mid_initial');
        $pdmus->lname = $request->input('lname');
        $pdmus->position = $request->input('position');

        if($request->hasFile('profile_img')){

            $file = $request->file('profile_img');
            $extention = $file->getClientOriginalExtension();
            $filename = time().'.'. $extention;
            Image::make($file)->save(public_path('/pdmu_profile_images/' . $filename));
            $pdmus->profile_img = $filename;
          
          }

        $pdmus->save();

        return redirect()->back()->with('message', 'Added to PDMU Successfully!');
     
    }

    public function update_pdmu(Request $request, $id){
        $pdmus = Pdmu::find($id);

        $pdmus->fname = $request->input('fname');
        $pdmus->mid_initial = $request->input('mid_initial');
        $pdmus->lname = $request->input('lname');
        $pdmus->position = $request->input('position');

        if($request->hasFile('profile_img')){
      
            $destination = 'pdmu_profile_images/'.$pdmus->profile_img;
            if(File::exists($destination)){
                File::delete($destination);
            }

            $file = $request->file('profile_img');
            $extention = $file->getClientOriginalExtension();
            $filename = time().'.'. $extention;
            $file->move('pdmu_profile_images/', $filename);
            $pdmus->profile_img = $filename;

    }

    $pdmus->update();
    return redirect()->back()->with('message', 'Profile Updated Successfully!');

    }
}