<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Permission\Models\Role;

class TaskStatus extends Model
{
    use HasFactory;
    protected $table = 'task_status';
    protected $fillable = [
        'task_title',
        'assign_to',
        'task_description',
        'volunteer',
        'address',
        'status',
        'remarks'
    ];

    /**
     * Get the comments for the blog post.
     */
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
