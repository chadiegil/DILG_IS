<?php

namespace App\Http\Controllers\Admin_View;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
use App\Models\Lgu;
use App\Models\Municipality;
use Image;
use File;

class Admin_LguController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(Request $request){

        $lgus = Lgu::with(['municipality'])->where([
            ['created_at', '!=', null],
            [function($query) use ($request){
                if(($lgus = $request->lgus)){
                    $query->orWhere('mayor', 'LIKE', '%'. $lgus . '%')
                    ->orWhere('vice_mayor', 'LIKE', '%'. $lgus . '%')
                    ->orWhere('sb_member1', 'LIKE', '%'. $lgus . '%')
                    ->orWhere('sb_member2', 'LIKE', '%'. $lgus . '%')
                    ->orWhere('sb_member3', 'LIKE', '%'. $lgus . '%')
                    ->orWhere('sb_member4', 'LIKE', '%'. $lgus . '%')
                    ->orWhere('sb_member5', 'LIKE', '%'. $lgus . '%')
                    ->orWhere('sb_member6', 'LIKE', '%'. $lgus . '%')
                    ->orWhere('sb_member7', 'LIKE', '%'. $lgus . '%')
                    ->orWhere('sb_member8', 'LIKE', '%'. $lgus . '%')->get();
                    
                }
            }]
        ])

        ->orderBy("municipality_id","ASC")
        ->paginate(12);


        $municipalities = Municipality::all();
        return view('Admin_View.lgu.index', compact('lgus', 'municipalities'))
        ->with('i',(request()->input('page',1)-1)*5);
    }

    public function store(Request $request){
        
        $lgus = new Lgu;
       
        $lgus->municipality_id = $request->input('municipality_id');
        $lgus->mayor = $request->input('mayor');
        $lgus->vice_mayor = $request->input('vice_mayor');
        $lgus->sb_member1 = $request->input('sb_member1');
        $lgus->sb_member2 = $request->input('sb_member2');
        $lgus->sb_member3 = $request->input('sb_member3');
        $lgus->sb_member4 = $request->input('sb_member4');
        $lgus->sb_member5 = $request->input('sb_member5');
        $lgus->sb_member6 = $request->input('sb_member6');
        $lgus->sb_member7 = $request->input('sb_member7');
        $lgus->sb_member8 = $request->input('sb_member8');

        $lgus->save();

        return redirect()->back()->with('message', 'Added Successfully!');
     
    }

    public function update_lgu(Request $request, $id){
        $lgus = Lgu::find($id);

        $lgus->mayor = $request->input('mayor');
        $lgus->vice_mayor = $request->input('vice_mayor');
        $lgus->sb_member1 = $request->input('sb_member1');
        $lgus->sb_member2 = $request->input('sb_member2');
        $lgus->sb_member3 = $request->input('sb_member3');
        $lgus->sb_member4 = $request->input('sb_member4');
        $lgus->sb_member5 = $request->input('sb_member5');
        $lgus->sb_member6 = $request->input('sb_member6');
        $lgus->sb_member7 = $request->input('sb_member7');
        $lgus->sb_member8 = $request->input('sb_member8');
       
    $lgus->update();

    return redirect()->back()->with('message', 'Updated Successfully!');

    }

    public function delete_lgu($id){
        $remove = Lgu::findOrFail($id);
        $remove -> delete();
        return redirect()->back()->with('message', 'Deleted Successfully!');   
      }    


}