<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ChatHistory extends Model
{
    use HasFactory,SoftDeletes;

    protected $fillable = [
        'user_id',
        'message',
        'response',
        'message_at',
        'session_id',
        'response_at',
        'character_id',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function character()
    {
        return $this->belongsTo(Character::class);
    }
}
