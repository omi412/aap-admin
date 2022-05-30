<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HouseData extends Model
{
    use HasFactory;
    protected $table = 'house_data';
    protected $fillable = [
        'owner',
        'house_no',
        'address_line_1',
        'address_line_2',
        'ward',
        'remarks'
    ];
}
