<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
// use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Str;

class Post extends Model
{
    // use SoftDeletes;

    protected static function boot()
    {
        parent::boot();
        static::creating(function ($model) {            
            $model->post_slug = Str::slug($model->post_title);
        });
        static::updating(function ($model) {            
            $model->post_slug = Str::slug($model->post_title);
        });
    }

    protected $table = 'post';

    protected $fillable = ['post_author','post_slug','post_title','post_content','post_type','post_status','comment_status','comment_count','category_id'];

    protected $hidden = [
        'deleted_at', 'updated_at','created_at'
    ];

    public function user()
    {
        return $this->belongsTo('App\User','post_author','id');
    }

    public function image()
    {
        return $this->belongsTo('App\Model\Media','id','fk');
    }

    public function meta()
    {
        return $this->hasMany('App\Model\PostMeta','post_id','id');
    }

    public function category()
    {
        return $this->belongsTo('App\Model\Category','category_id','id');
    }

    public function tags()
    {
        return $this->hasMany('App\Model\TagPost','post_id','id');
    }
    
}
