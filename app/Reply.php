<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Reply extends Model
{
    //
    protected $table = 'replys';

    protected $fillable = [
        'recieve_name','recieve_id','send_id','message'
    ];

    protected $guarded = [
        'create_at', 'update_at'
    ];
}

