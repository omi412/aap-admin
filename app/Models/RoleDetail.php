<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RoleDetail extends Model
{
    use HasFactory;
    protected $table = 'role_details';
    protected $fillable = [
        'user_name',
        'manager_name',
        'name',
        'status'
    ];

    public function role()
    {
        return $this->hasMany('role');
    }
}
