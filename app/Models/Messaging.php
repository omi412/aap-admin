<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;
class Messaging extends Model
{
    use HasFactory;
    protected $table = 'messagings';
    protected $fillable = [
        'message',
        'send_to'
    ];

    public function getSendDateAttribute($value)
    {
        return Carbon::parse($this->created_at)->format('d/m/Y g:i A');
    }
}
