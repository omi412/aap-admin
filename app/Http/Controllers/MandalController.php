<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Mandal;

class MandalController extends Controller
{
        public function index()
    {
        $data['mandals'] = Mandal::orderBy('id','desc')->paginate(5);
   
        return view('master.mandal.mandal',$data);
    }
    
   
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $mandal   =   Mandal::updateOrCreate(

        	        [
                        'id' => $request->id
                    ],
                    [
                        'title' => $request->title, 
                    ]);
    
        return response()->json(['success' => true]);
    }
    
    
    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request)
    {   
        $where = array('id' => $request->id);
        $mandal  = Mandal::where($where)->first();
 
        return response()->json($mandal);
    }
 
   
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $mandal = Mandal::where('id',$request->id)->delete();
   
        return response()->json(['success' => true]);
    }
}
