<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class team extends Model
{
    use HasFactory;
    protected $table='teams';
    protected $id='id';

    protected $fillable = [
        'name', // Add other fillable properties here, if any
        'department',
        'photo',
        'is_user',
    ];
}
