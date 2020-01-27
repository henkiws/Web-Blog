<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class PostMeta extends Model
{
    protected $table = 'postmeta';

    protected $fillable = ['post_id','meta_key','meta_value'];

    protected $hidden = [
        'updated_at','created_at'
    ];

    public function post()
    {
        return $this->belongsTo('App\Model\Post','post_id','id');
    }
    
}
