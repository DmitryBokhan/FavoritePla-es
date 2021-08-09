<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Photo extends Model
{
    use HasFactory;

    protected $fillable = [
        'originalName', 'hashName', 'extention', 'path', 'size', 'description',
    ];

    public function categories()
    {
        return $this->belongsToMany('App\Models\Category');
    }
}
