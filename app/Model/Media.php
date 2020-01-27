<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Media extends Model
{
    protected $table = 'media';
    
    protected $fillable = ['fk','media_name','media_path','media_type','media_status'];

    protected $hidden = [
        'updated_at','created_at'
    ];
}
