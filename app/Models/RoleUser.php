<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RoleUser extends Model
{
    use HasFactory;
    protected $table = "role_user";

    public function role(){
        return $this->belongsTo(\Spatie\Permission\Models\Role::class,'role_id');//->withPivot('company_id')
    }
    
    public function roleDetails(){
        return $this->belongsTo(RoleDetail::class,'role_details_id');//->withPivot('company_id')
    }
}
