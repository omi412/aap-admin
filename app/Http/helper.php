<?php
  
function getRoles(){
	$loggedInUser = Auth::user();
	$role = $loggedInUser->roles[0]->name;
	if($role=='Admin'){
        return App\Models\Role::select('id','name')->whereNotIn('name',['Admin','User'])->orderBy('id','ASC')->get();
	}elseif($role=='Mandal Prabhari'){
		return App\Models\Role::select('id','name')->whereNotIn('name',['Admin','User','Mandal Prabhari'])->orderBy('id','ASC')->get();
	}elseif($role=='Ward Prabhari'){
		return App\Models\Role::select('id','name')->whereNotIn('name',['Admin','User','Mandal Prabhari','Ward Prabhari'])->orderBy('id','ASC')->get();
	}elseif($role=='Booth Prabhari'){
		return App\Models\Role::select('id','name')->whereNotIn('name',['Admin','User','Mandal Prabhari','Ward Prabhari','Booth Prabhari'])->orderBy('id','ASC')->get();
	}
}