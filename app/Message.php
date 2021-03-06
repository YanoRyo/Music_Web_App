<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
    protected $table = 'messages';
    protected $fillable = [
        'send_name','send','recieve', 'message'
    ];

    protected $guarded = [
        'create_at', 'update_at'
    ];
}
