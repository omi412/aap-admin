<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    use HasFactory;
    protected $table = 'contacts';
    protected $fillable = [
        'house_id',
        'first_name',
        'last_name',
        'gender',
        'age',
        'user_type'
    ];

    public function houseData()
    {
        return $this->belongsTo(HouseData::class,'house_id');
    }
}
