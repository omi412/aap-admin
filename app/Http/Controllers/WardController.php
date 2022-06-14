<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Ward;


class WardController extends Controller
{
    public function index()
    {
        $data['wards'] = Ward::orderBy('id','desc')->paginate(5);
   
        return view('master.ward.ward',$data);
    }
    
   
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $ward   =   Ward::updateOrCreate(

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
        $ward  = Ward::where($where)->first();
 
        return response()->json($ward);
    }
 
   
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $ward = Ward::where('id',$request->id)->delete();
   
        return response()->json(['success' => true]);
    }
}
