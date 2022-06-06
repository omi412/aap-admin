<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\pending_approval;
use App\Models\RoleDetail;
use Carbon\Carbon;
use Auth;
class PendingApprovalController extends Controller
{
    public function index(Request $request)
    {
        //$user = getRoles();
        //dd($user);
        // if($request->ajax()){
        //     $house_data = HouseData::all();
        //     return response()->json(['house_data'=>$house_data]);
        // }else{
        //     return view('house_data.house_data');
        // }
        if($request->ajax()) {
            $pending_approval = pending_approval::get();
            //dd($pending_approval);
            return response()->json(['pending_approval'=>$pending_approval]);
        }
        $mandals = RoleDetail::where('role_id',1)->select('id','name')->get();
        return view('pending_approval.pending_approval',compact('mandals'));
        
    }

    public function edit($id)
    {
        $pending_approval = pending_approval::find($id);
        if($pending_approval)
        {
            return response()->json([
                'status'=>200,
                'pending_approval'=> $pending_approval,
            ]);
        }
        else
        {
            return response()->json([
                'status'=>404,
                'message'=>'Pending Approval Found.'
            ]);
        }
    }

    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
             'name'=> 'required|max:100',
             'mobileno'=> 'required|max:100',
             'approval'=> 'required',
             'designation'=> 'nullable|max:250',
             'manager'=> 'required',
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
            $pending_approval = pending_approval::find($id);
            if($pending_approval)
            {
                try{
                    $pending_approval->update([
                        'name'=>$request->name,
                        'mobileno'=>$request->mobileno,
                        'approval'=>$request->approval,
                        'designation'=>$request->designation,
                        'manager'=>$request->manager
                    ]);
                    return response()->json([
                        'status'=>200,
                        'message'=>'Pending Approval Updated Successfully.'
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
                    'message'=>'Pending Approval Not Found'
                ]);
            }

        }
    }

    
}
