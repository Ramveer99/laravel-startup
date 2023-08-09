<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;


class blogslug extends Model
{
    use HasFactory;
    use Sluggable;
    protected $guarded=[];

    public function sluggable():array
    {
       return[
        'slug'=>[
            'source'=>'tittle'
        ]
        ];
    }
}
