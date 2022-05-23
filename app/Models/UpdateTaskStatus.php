<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UpdateTaskStatus extends Model
{
    use HasFactory;
    protected $table = 'task_status';
    protected $fillable = [
        'task_title',
        'task_description',
        'status',
        'upload_image',
        'remark'

    ];
}
