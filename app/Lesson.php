<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Cache;
use Illuminate\Database\Eloquent\Builder;


class Lesson extends Model
{
    public function course()
    {
        return $this->belongsTo(Course::class);
    }

    static public function findBySlug($slug)
    {
        return Cache::rememberForever('lesson.'.$slug,function () use ($slug){
            return self::with('course')->where('slug',$slug)->firstOrFail();
        });
    }

    public function scopePublished(Builder $query)
    {
        return $query->where('status','published');
    }
}
