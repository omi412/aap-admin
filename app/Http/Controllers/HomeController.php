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
use Exception;

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
        $mandals = RoleDetail::where('role_id',3)->select('id','name')->get();
        $wards =   RoleDetail::where('role_id',4)->select('id','name')->get();
        $booths =  RoleDetail::where('role_id',5)->select('id','name')->get();
        $galies =  RoleDetail::where('role_id',6)->select('id','name')->get();
        $taskStatus =  TaskStatus::all();
        $taskComplete =  TaskStatus::where('status',1)->select('id');
        $taskPending =  TaskStatus::where('status',0)->select('id');
        //dd($taskStatus);
        return view('dashboard/dashboard',compact('mandals','wards','booths','galies','taskStatus','taskComplete','taskPending'));
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
        
        $validated = $request->validate([
            'name'=> 'required|max:250',
            'mobileno'=> 'required',
        ]);
        try{
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

            Auth::login($user);

            return redirect()->route('dashboard');
        }catch(Exception $e){
            return redirect()->back()->with('error',$e->getMessage());
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

    public function hierarchy()
    {
        $roles = Role::whereIn('name',['Mandal Prabhari','Ward Prabhari','Booth Prabhari','Gali Prabhari'])->select('id','name')->pluck('id','name')->toArray();
                
        $mandals = RoleDetail::where('role_id',$roles['Mandal Prabhari'])->select('id','name')->get();
        $wards = RoleDetail::where('role_id',$roles['Ward Prabhari'])->select('id','name')->get();
        $booths = RoleDetail::where('role_id',$roles['Booth Prabhari'])->select('id','name')->get();
        $galies = RoleDetail::where('role_id',$roles['Gali Prabhari'])->select('id','name')->get();
        //dd($booths);
        return view('hierarchy/hierarchy',compact('mandals','wards','booths','galies'));
    }
}


