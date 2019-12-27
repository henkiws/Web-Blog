<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Category extends Model
{
    protected static function boot()
    {
        parent::boot();
        static::creating(function ($model) {            
            $model->slug = Str::slug($model->name);
        });
        static::updating(function ($model) {            
            $model->slug = Str::slug($model->name);
        });
    }

    protected $table = 'category';

    protected $fillable = ['name','slug','parent_id'];
}
