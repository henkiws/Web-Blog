<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Str;

class Post extends Model
{
    use SoftDeletes;

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

    protected $fillable = ['post_author','post_slug','post_title','post_content','post_type','post_status','comment_status','comment_count'];

    protected $hidden = [
        'deleted_at', 'updated_at','created_at'
    ];

    public function user()
    {
        return $this->belongsTo('App\Model\User','post_author','id');
    }
    
}
