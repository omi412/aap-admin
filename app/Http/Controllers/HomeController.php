<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Carbon\Carbon;
use Auth;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('dashboard/dashboard');
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

        Auth::login($user);
    }
}


