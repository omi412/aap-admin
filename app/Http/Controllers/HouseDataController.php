<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\HouseData;
use Carbon\Carbon;

class HouseDataController extends Controller
{
    public function index(Request $request)
    {
        // if($request->ajax()){
        //     $house_data = HouseData::all();
        //     return response()->json(['house_data'=>$house_data]);
        // }else{
        //     return view('house_data.house_data');
        // }
        if($request->ajax()) {
            $house_data = HouseData::get();
            return response()->json(['house_data'=>$house_data]);
        }

        return view('house_data.house_data');
        
    }

    public function store(Request $request)
    {   
        $validator = Validator::make($request->all(), [
             'owner'=> 'required|max:100',
             'house_no'=> 'required|max:100',
             'address_line_1'=> 'required',
             'address_line_2'=> 'nullable|max:250',
             'ward'=> 'required',
             'remarks'=> 'nullable',
        ]);

        if($validator->fails())
        {
            return response()->json(['status'=>400,'errors'=>$validator->messages()]);
        }
        else
        {
            try{
                HouseData::create([
                    'owner'=>$request->owner,
                    'house_no'=>$request->house_no,
                    'address_line_1'=>$request->address_line_1,
                    'address_line_2'=>$request->address_line_2,
                    'ward'=>$request->ward,
                    'remarks'=>$request->remarks
                ]);
            
                return response()->json(['status'=>200,'message'=>'House Data Added Successfully.']);
            }catch(Exception $e){
                return response()->json(['status'=>500,'message'=>$e->getMessage()]);
            }
        }

    }

    public function edit($id)
    {
        $house_data = HouseData::find($id);
        if($house_data)
        {
            return response()->json([
                'status'=>200,
                'house_data'=> $house_data,
            ]);
        }
        else
        {
            return response()->json([
                'status'=>404,
                'message'=>'House Found.'
            ]);
        }
    }

    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
             'owner'=> 'required|max:100',
             'house_no'=> 'required|max:100',
             'address_line_1'=> 'required',
             'address_line_2'=> 'nullable|max:250',
             'ward'=> 'required',
             'remarks'=> 'nullable',
        ]);

        if($validator->fails())
        {
            return response()->json([
                'status'=>400,
                'errors'=>$validator->messages()
            ]);
        }
        else
        {
            $house_data = HouseData::find($id);
            if($house_data)
            {
                try{
                    $house_data->update([
                        'owner'=>$request->owner,
                        'house_no'=>$request->house_no,
                        'address_line_1'=>$request->address_line_1,
                        'address_line_2'=>$request->address_line_2,
                        'ward'=>$request->ward,
                        'remarks'=>$request->remarks
                    ]);
                    return response()->json([
                        'status'=>200,
                        'message'=>'House Data Updated Successfully.'
                    ]);
                }catch(Exception $e){
                    return response()->json([
                        'status'=>500,
                        'message'=>$e->getMessage()
                    ]);
                }
                
            }
            else
            {
                return response()->json([
                    'status'=>404,
                    'message'=>'House Data Not Found'
                ]);
            }

        }
    }

    public function destroy($id)
    {
        $house_data = HouseData::find($id);
        if($house_data)
        {
            $house_data->delete();
            return response()->json([
                'status'=>200,
                'message'=>'House Data Deleted Successfully.'
            ]);
        }
        else
        {
            return response()->json([
                'status'=>404,
                'message'=>'No Task Status Found.'
            ]);
        }
    }
}
