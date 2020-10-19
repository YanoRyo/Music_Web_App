<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Message2 extends Model
{
    //
    protected $table = 'messages2';
    protected $fillable = [
        'send_name','send','recieve', 'message'
    ];

    protected $guarded = [
        'create_at', 'update_at'
    ];
}
