<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;
class blog extends Model
{
    use HasFactory;
    protected $table="blogs";
    protected $id='id';

    protected $fillable = [ 
        'subject', 
        'authors',
        'slug',
        'tittle',
        'current',
        'about', 
    ];
    public $timestamps = false;
    
    protected static function boot()
    {
        parent::boot();
        static::created(function ($createslug) {
            $createslug->slug = $createslug->generateSlug($createslug->tittle);
            $createslug->save();
        });
    }
    private function generateSlug($tittle)
    {
        if (static::whereSlug($slug = Str::slug($tittle))->exists()) {
            $max = static::whereName($tittle)->latest('id')->skip(1)->value('slug');
            if (isset($max[-1]) && is_numeric($max[-1])) {
                return preg_replace_callback('/(\d+)$/', function($mathces) {
                    return $mathces[1] + 1;
                }, $max);
            }
            return "{$slug}-2";
        }
        return $slug;
    }    
}
