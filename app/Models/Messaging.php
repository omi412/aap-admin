<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;
use Spatie\Permission\Models\Role;


class Messaging extends Model
{
    use HasFactory;
    protected $table = 'messagings';
    protected $fillable = [
        'message',
        'send_to',
        'volunteer'
    ];
    public $appends = ['send_date'];
    public function getSendDateAttribute($value)
    {
        return Carbon::parse($this->created_at)->format('d/m/Y g:i A');
    }

   /**
     * Get the comments for the blog post.
     */
    public function role()
    {
        return $this->belongsTo(Role::class,'send_to')->select('id','name');
    }
    /**
     * Get the comments for the blog post.
     */
    public function roleDetail()
    {
        return $this->belongsTo(RoleDetail::class,'volunteer')->select('id','name','role_id','parent_id');
    }
}
