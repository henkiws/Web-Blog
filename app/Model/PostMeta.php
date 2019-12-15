<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class PostMeta extends Model
{
    protected $table = 'postmeta';

    public function post()
    {
        return $this->belongsTo('App\Model\Post','post_id','id');
    }
    
}
