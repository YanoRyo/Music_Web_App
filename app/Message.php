<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
    
    protected $fillable = [
        // 'user_id', 'name', 'comment'
        'send_name','send', 'message'
    ];

    protected $guarded = [
        'create_at', 'update_at'
    ];
}
