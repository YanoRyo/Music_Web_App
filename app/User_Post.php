<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class User_Post extends Model
{
    //
    protected $table = 'users_post';

    public function users()
    {
        return $this->belongsTo('App\User');
    }
}
