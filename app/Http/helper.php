<?php

function assignRoleToModel($role_id,$model_id){
	DB::table('model_has_roles')->insert([
        'role_id' => $role_id,
        'model_type' => 'App\Models\User',
        'model_id' => $model_id
    ]);
}
  
function getRoles(){
	$loggedInUser = Auth::user();
	$role = $loggedInUser->roles[0]->name;
	//dd($role);
	if($role=='Admin'){
        return DB::table('roles')->select('id','name')->whereNotIn('name',['Admin','User'])->orderBy('id','ASC')->get();
    }elseif($role=='User'){
        return DB::table('roles')->select('id','name')->whereNotIn('name',['Admin','User'])->orderBy('id','ASC')->get();    
	}elseif($role=='Mandal Prabhari'){
		return DB::table('roles')->select('id','name')->whereNotIn('name',['Admin','User','Mandal Prabhari'])->orderBy('id','ASC')->get();
	}elseif($role=='Ward Prabhari'){
		return DB::table('roles')->select('id','name')->whereNotIn('name',['Admin','User','Mandal Prabhari','Ward Prabhari'])->orderBy('id','ASC')->get();
	}elseif($role=='Booth Prabhari'){
		return DB::table('roles')->select('id','name')->whereNotIn('name',['Admin','User','Mandal Prabhari','Ward Prabhari','Booth Prabhari'])->orderBy('id','ASC')->get();
	}
}