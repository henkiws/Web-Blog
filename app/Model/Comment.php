<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $table = 'comment';

    public function user()
    {
        return $this->belongsTo('App\Model\User','user_id','id');
    }

    public function post()
    {
        return $this->belongsTo('App\Model\Post','post_id','id');
    }

}
