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

    public function role()
    {
        return $this->belongsTo(Role::class,'assign_to')->select('id','name');
    }
    /**
     * Get the comments for the blog post.
     */
    public function roleDetail()
    {
        return $this->belongsTo(RoleDetail::class,'volunteer')->select('id','name','role_id','parent_id');
    }
}
