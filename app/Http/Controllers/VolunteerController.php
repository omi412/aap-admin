<?php

namespace App\Http\Controllers;

use App\Models\Volunteer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class VolunteerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //$volunteer = Volunteer::all();
        return view('volunteer_types.volunteer_types');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function fetchvolunteer()
    {
        $volunteer = Volunteer::all();
        return response()->json([
            'volunteer'=>$volunteer,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
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
            $volunteer = new Volunteer;
            $volunteer->volunteer_type = $request->input('volunteer_types');
            $volunteer->save();
            return response()->json([
                'status'=>200,
                'message'=>'Volunteer Type Added Successfully.'
            ]);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Volunteer  $volunteer
     * @return \Illuminate\Http\Response
     */
    public function show(Volunteer $volunteer)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Volunteer  $volunteer
     * @return \Illuminate\Http\Response
     */
    public function edit(Volunteer $volunteer)
    {
        $volunteer = Volunteer::find($volunteer);
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

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Volunteer  $volunteer
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Volunteer $volunteer)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Volunteer  $volunteer
     * @return \Illuminate\Http\Response
     */
    public function destroy(Volunteer $volunteer)
    {
        $volunteer = Volunteer::find($volunteer);
        if($volunteer)
        {
            $volunteer->delete();
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
