<?php

namespace App\Http\Controllers;

use App\Models\Volunteer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class VolunteerController extends Controller
{
    public function index()
    {
        return view('volunteer_types.volunteer_types');
    }

    public function fetchvolunteer()
    {
        $volunteers = Volunteer::all();
        return response()->json([
            'volunteers'=>$volunteers,
        ]);
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
             'volunteer_types'=> 'required|max:191',
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
            try{
                Volunteer::create([
                    "volunteer_type"=>$request->volunteer_types
                ]);
            
                return response()->json([
                    'status'=>200,
                    'message'=>'Volunteer Added Successfully.'
                ]);
            }catch(Exception $e){
                return response()->json([
                    'status'=>500,
                    'error'=>$e->getMessage()
                ]);
            }
        }

    }

    public function edit($id)
    {
        $volunteer = Volunteer::find($id);
        if($volunteer)
        {
            return response()->json([
                'status'=>200,
                'volunteer'=> $volunteer,
            ]);
        }
        else
        {
            return response()->json([
                'status'=>404,
                'message'=>'No Volunteer Found.'
            ]);
        }

    }

    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'volunteer_types'=> 'required|max:191',
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
            $volunteer = Volunteer::find($id);
            if($volunteer)
            {
                 $volunteer->volunteer_type = $request->input('volunteer_types');
                $volunteer->update();
                return response()->json([
                    'status'=>200,
                    'message'=>'Volunteer Updated Successfully.'
                ]);
            }
            else
            {
                return response()->json([
                    'status'=>404,
                    'message'=>'No Volunteer Found.'
                ]);
            }

        }
    }

    public function destroy($id)
    {
        $Volunteer = Volunteer::find($id);
        if($Volunteer)
        {
            $Volunteer->delete();
            return response()->json([
                'status'=>200,
                'message'=>'Volunteer Deleted Successfully.'
            ]);
        }
        else
        {
            return response()->json([
                'status'=>404,
                'message'=>'No Volunteer Found.'
            ]);
        }
    }
}