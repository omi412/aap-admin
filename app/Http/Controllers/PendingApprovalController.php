<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\pending_approval;
use App\Models\RoleDetail;
use App\Models\User;
use Carbon\Carbon;
use Auth;
use DB;
use Spatie\Permission\Models\Role;
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
            $users = User::where('status',1)->get();
            //dd($users);
            return response()->json(['user'=>$users]);
        }
        $mandals = RoleDetail::where('role_id',3)->select('id','name')->get();
        $wards = RoleDetail::where('role_id',4)->select('id','name')->get();
        $booths = RoleDetail::where('role_id',5)->select('id','name')->get();
        $galis = RoleDetail::where('role_id',6)->select('id','name')->get();
        return view('pending_approval.pending_approval',compact('mandals','wards','booths','galis'));
        
    }

    public function fetchPendingApproval()
    {
        $users = User::all();
        //dd($users);
        return response()->json([
            'users'=>$users,
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
                DB::beginTransaction();

                $user = new user;
                $user->name = $request->input('name');
                $user->mobileno = $request->input('mobileno');
                $user->status = $request->input('approval');
                $user->manager = $request->input('manager');
                //$user->role_mandal = $request->input('role_mandal');
                //$user->ward_id = $request->input('ward_id');
                //$user->booth_id = $request->input('booth_id');
                //$user->gali_id = $request->input('gali_id');
                //$user->designation = '';
                //dd($pending_approval);
                $user->created_at = Carbon::now();
                $user->updated_at = Carbon::now();
                $user->save();

                $user->assignRole([$request->role]);
                $role = Role::find($request->role);
                
                $role_details_id = 0;
                
                if($role->name=='Mandal Prabhari'){
                    $role_details_id = $request->mandal_id;
                }
                if($role->name=='Ward Prabhari'){
                    $role_details_id = $request->ward_id;
                }
                if($role->name=='Booth Prabhari'){
                    $role_details_id = $request->booth_id;
                }
                if($role->name=='Gali Prabhari'){
                    $role_details_id = $request->gali_id;
                }
                DB::table('role_user')->insert([
                    'role_id'=>$request->role,
                    'user_id'=>$user->id,
                    'role_details_id'=>$role_details_id,
                    'created_at'=>Carbon::now(),
                    'updated_at'=>Carbon::now(),
                ]);
                //assignRoleToModel($request->role,$user->id);
                DB::commit();

                return response()->json([
                    'status'=>200,
                    'message'=>'User created successfully.'
                ]);
            }catch(Exception $e){
                DB::rollback();
                return response()->json([
                    'status'=>500,
                    'error'=>$e->getMessage()
                ]);
            }
            
        }

    }

    public function edit($id)
    {
        $user = User::find($id);
        if($user)
        {
            return response()->json([
                'status'=>200,
                'user'=> $user,
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
            $user = User::find($id);
            if($user)
            {
                try{
                    $user->update([
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
