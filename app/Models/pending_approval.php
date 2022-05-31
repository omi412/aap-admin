<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class pending_approval extends Model
{
    use HasFactory;
    protected $table = 'pending_approvals';
    protected $fillable = [
        'name',
        'mobileno',
        'approval',
        'designation',
        'manager'
    ];
}
