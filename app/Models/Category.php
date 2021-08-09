<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function photos()
    {
        return $this->belongsToMany('App\Models\Photo');
    }

    public function places()
    {
        return $this->belongsToMany('App\Models\Place');
    }

}
