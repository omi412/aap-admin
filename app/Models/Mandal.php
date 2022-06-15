<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mandal extends Model
{
    use HasFactory;
    protected $fillable = [
        'title'
    ];

     public function role()
    {
        return $this->hasMany('role');
    }
}
