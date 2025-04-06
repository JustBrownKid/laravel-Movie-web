<?php

namespace App\Models;


use App\Models\Actor;
use App\Models\Category;
use Illuminate\Database\Eloquent\Model;


class Movie extends Model
{
    protected $fillable = [
        'title',
        'image',
        'watch',
        'description',
        'release_year',
        'runtime',
        
    ];
    public function categories()
    {
        return $this->belongsToMany(Category::class);
    }
    public function actors()
    {
        return $this->belongsToMany(Actor::class);
    }
    
 }

