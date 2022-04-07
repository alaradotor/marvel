<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comic extends Model
{
    protected $fillable = [
        'id','imagen', 'titulo', 'volumen'
    ];
    // public $timestamps= false;
}
