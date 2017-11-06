<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Cache;
use Illuminate\Database\Eloquent\Builder;


class Course extends Model
{
    const PUBLISHED = 'PUBLISHED';

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function lessons()
    {
        return $this->hasMany(Lesson::class);
    }

    static public function findBySlug($slug)
    {
        return Cache::rememberForever('course.'.$slug,function () use ($slug){
            return self::with('lessons')->where('slug',$slug)->firstOrFail();
        });
    }
}
