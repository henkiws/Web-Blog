<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class TagPost extends Model
{

    protected $table = 'tagpost';
    public $timestamps = false;

    protected $fillable = ['post_id','tag_id'];

    public function tag()
    {
        return $this->belongsTo('App\Model\Tag','tag_id','id');
    }

}
