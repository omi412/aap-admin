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
      	$role_id_mandal = $this->getRoleId('Mandal Prabhari');
        return RoleDetail::where('role_id',$role_id_mandal)->select('id','name')->get();
      }else{
      	return [];
      }
    }
    public function getWards(){
      if(Auth::user()->roles[0]->name=='Admin'){
      	$role_id_mandal = $this->getRoleId('Ward Prabhari');
        
        return RoleDetail::where('role_id',$role_id_mandal)->select('id','name')->get();
      
      }elseif(Auth::user()->roles[0]->name=='Mandal Prabhari'){
      	
      	$role_id_ward = $this->getRoleId('Ward Prabhari');
      	$my_mandal_id = Auth::user()->roleUser->role_details_id;
      	$wards = RoleDetail::where('role_id',$role_id_ward)->where('parent_id',$my_mandal_id)->select('id','name')->get();
      	return $wards;

      }else{
      	return [];
      }
    }
    public function getBooths(){
      if(Auth::user()->roles[0]->name=='Admin'){
      	$role_id_booth = $this->getRoleId('Booth Prabhari');
        return RoleDetail::where('role_id',$role_id_booth)->select('id','name')->get();
      }elseif(Auth::user()->roles[0]->name=='Ward Prabhari'){
      	
      	$role_id_ward = $this->getRoleId('Booth Prabhari');
      	
      	$my_ward_id = Auth::user()->roleUser->role_details_id;
      	
      	$booths = RoleDetail::where('role_id',$role_id_ward)->where('parent_id',$my_ward_id)->select('id','name')->get();
      	return $booths;

      }else{
      	return [];
      }
    }
    public function getGalies(){
      if(Auth::user()->roles[0]->name=='Admin'){
      	$role_id_gali = $this->getRoleId('Gali Prabhari');
        return RoleDetail::where('role_id',$role_id_gali)->select('id','name')->get();

    }elseif(Auth::user()->roles[0]->name=='Booth Prabhari'){
      	$role_id_mandal = $this->getRoleId('Gali Prabhari');
      	$my_booth_id = Auth::user()->roleUser->role_details_id;
        
        return RoleDetail::where('role_id',$role_id_mandal)->where('parent_id',$my_booth_id)->select('id','name')->get();
      }else{
      	return [];
      }
    }
    
    public function getRoleId($role_name){
    	$role = Role::where('name',$role_name)->select('id')->first();
    	return !empty($role) ? $role->id : NULL;
    }

}