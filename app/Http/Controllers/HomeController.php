<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Carbon\Carbon;
use Auth;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use App\Models\pending_approval;
use App\Models\RoleDetail;
use App\Models\TaskStatus;


class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //$this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $mandals = RoleDetail::where('role_id',1)->select('id','name')->get();
        $wards =   RoleDetail::where('role_id',2)->select('id','name')->get();
        $booths =  RoleDetail::where('role_id',3)->select('id','name')->get();
        $galies =  RoleDetail::where('role_id',4)->select('id','name')->get();
        $taskStatus =  TaskStatus::get();
        return view('dashboard/dashboard',compact('mandals','wards','booths','galies','taskStatus'));
    }

    public function checkMobileNo(Request $request){
        $user = User::where('mobileno',$request->mobile)->first();
        if(empty($user)){
            return response(['status'=>200,'action'=>'register']);
        }else{
            Auth::login($user);
            return response(['status'=>200,'action'=>'login']);
        }
    }
    public function signup(Request $request){
        $user = new User;
        $user->name = $request->name;
        $user->mobileno = $request->mobileno;
        $user->email = "";
        $user->password = "";
        $user->created_at = Carbon::now();
        $user->updated_at = Carbon::now();
        $user->save();
        $role = Role::where('name','User')->pluck('id')->toArray();
        $user->assignRole($role);
        //assignRoleToModel($role->id,$user->id);

        Auth::login($user);

        return redirect()->route('dashboard');
    }
}


