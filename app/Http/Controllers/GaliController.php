<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Gali;

class GaliController extends Controller
{
    public function index()
    {
        $data['galies'] = Gali::orderBy('id','desc')->paginate(5);
   
        return view('master.gali.gali',$data);
    }
    
   
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $gali   =   Gali::updateOrCreate(

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
        $gali  = Gali::where($where)->first();
 
        return response()->json($gali);
    }
 
   
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $gali = Gali::where('id',$request->id)->delete();
   
        return response()->json(['success' => true]);
    }
}
