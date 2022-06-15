<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Spatie\Permission\Traits\HasRoles;
use Spatie\Permission\Models\Role;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable, HasRoles;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'mobileno',
        'role',
        'approval',
        'designation',
        'manager',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

        /**
    * @return user roles
    */
    // public function roles(){
    //     return $this->belongsToMany(Role::class);//->withPivot('company_id')
    // }
    /**
    * @return Boolean - checking user has any role or not
    */
    // public function hasAnyRoles($roles){
    //     if($this->roles()->whereIn('name',$roles)->first()){
    //         return true;
    //     }
    //     return false;
    // }
    /**
    * @return Boolean - checking user has role or not
    */
    // public function hasRole($role){
    //     if($this->roles()->where('name',$role)->first()){
    //         return true;
    //     }

    //     return false;
    // }
    
}
