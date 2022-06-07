<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\pending_approval;
use App\Models\RoleDetail;
use App\Models\User;
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
        $wards = RoleDetail::where('role_id',2)->select('id','name')->get();
        $booths = RoleDetail::where('role_id',3)->select('id','name')->get();
        $galis = RoleDetail::where('role_id',4)->select('id','name')->get();
        return view('pending_approval.pending_approval',compact('mandals','wards','booths','galis'));
        
    }

    public function fetchvolunteer()
    {
        $pending_approval = pending_approval::all();
        return response()->json([
            'pending_approval'=>$pending_approval,
        ]);
    }

    public function store(Request $request)
    {
        //dd($request->all());
        $validator = Validator::make($request->all(), [
            'name'=> 'required|max:100',
            'mobileno'=> 'required|max:100|unique:users',
            'approval'=> 'required',
            'role'=> 'nullable|max:250',
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
            try{
                $user = new user;
                $user->name = $request->input('name');
                $user->mobileno = $request->input('mobileno');
                $user->approval = $request->input('approval');
                //$user->designation = $request->input('role');
                $user->manager = $request->input('manager');
                $user->designation = '';
                //dd($pending_approval);
                $user->created_at = Carbon::now();
                $user->updated_at = Carbon::now();
                $user->save();

                $user->assignRole([$request->role]);

                //assignRoleToModel($request->role,$user->id);

                return response()->json([
                    'status'=>200,
                    'message'=>'User created successfully.'
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
                        'designation'=>$request->role,
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

    public function getWards($mandal_id)
    {
        $wards = RoleDetail::select('id','name')->where("parent_id",$mandal_id)->get();
        return response()->json(['status'=>200,'wards'=>$wards]);
    }
    public function getBooths($ward_id)
    {
        $booths = RoleDetail::select('id','name')->where("parent_id",$ward_id)->get();
        return response()->json(['status'=>200,'booths'=>$booths]);
    }
    public function getGali($booth_id)
    {
        $galies = RoleDetail::select('id','name')->where("parent_id",$booth_id)->get();
        return response()->json(['status'=>200,'galies'=>$galies]);
    }

    
}
