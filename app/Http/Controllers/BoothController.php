<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Booth;

class BoothController extends Controller
{
    public function index()
    {
        $data['booths'] = Booth::orderBy('id','desc')->paginate(5);
   
        return view('master.booth.booth',$data);
    }
    
   
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $booth   =   Booth::updateOrCreate(

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
        $booth  = Booth::where($where)->first();
 
        return response()->json($booth);
    }
 
   
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $booth = Booth::where('id',$request->id)->delete();
   
        return response()->json(['success' => true]);
    }
}
