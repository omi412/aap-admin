<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class messaging extends Model
{
    use HasFactory;
    protected $table = 'messagings';
    protected $fillable = [
        'message',
        'send_to'
    ];
}
