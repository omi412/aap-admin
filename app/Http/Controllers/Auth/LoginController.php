<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Models\User;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/dashboard';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
        $this->user = new User;
    }

     public function login(Request $request)
        {
            // Check validation - Note : you can change validation as per your requirements 
            $this->validate($request, [
                'mobileno' => 'required|regex:/[0-9]{10}/|digits:10',   
                          
            ]);

            // Get user record
            $user = User::where('mobileno', $request->get('mobileno'))->first();

            // Check Condition Mobile No. Found or Not
            if($request->get('mobileno') != $user->mobileno) {
                \Session::put('errors', 'Please Register First mobile number.!!');
                return back();
            }        
            
            // Set Auth Details
            \Auth::login($user);
            
            // Redirect home page
            return redirect()->route('dashboard');
        }
}
