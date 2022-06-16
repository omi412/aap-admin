<?php
namespace App\Traits;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\RoleDetail;
use Carbon\Carbon;
use Auth;
use Spatie\Permission\Models\Role;
 
trait DetailsByRoleTrait {

    public function getMandals(){
      if(Auth::user()->roles[0]->name=='Admin'){
         $mandals = RoleDetail::where('role_id',3)->select('id','name')->get();
      }
      $mandals = RoleDetail::where('role_id',3)->select('id','name')->get();
        $wards = RoleDetail::where('role_id',4)->select('id','name')->get();
        $booths = RoleDetail::where('role_id',5)->select('id','name')->get();
        $galies = RoleDetail::where('role_id',6)->select('id','name')->get();
    }

}