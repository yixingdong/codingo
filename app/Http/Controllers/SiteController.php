<?php

namespace App\Http\Controllers;

use App\Course;
use App\Lesson;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\DB;
use App\Post;
use TCG\Voyager\Facades\Voyager;

class SiteController extends Controller
{
    public function sitemap()
    {
        // create new sitemap object
        $sitemap = App::make("sitemap");

        // add items to the sitemap (url, date, priority, freq)
        $sitemap->add(url(''), '2012-08-25T20:10:00+02:00', '1.0', 'daily');
        $sitemap->add(url('pages'), '2012-08-26T12:30:00+02:00', '0.9', 'monthly');

        // get all posts from db
        $posts = Post::orderBy('created_at', 'desc')->get();

        // add every post to the sitemap
        foreach ($posts as $post)
        {
            if($post->sitemap_include)
                $sitemap->add(url('post/'.$post->slug), $post->updated_at->toIso8601String(), $post->sitemap_priority, $post->sitemap_freq);
        }

        $courses = Course::orderBy('created_at', 'desc')->get();
        // add every post to the sitemap
        foreach ($courses as $course)
        {
            if($course->sitemap_include)
                $sitemap->add(url('course/'.$course->slug), $course->updated_at->toIso8601String(), $course->sitemap_priority, $course->sitemap_freq);
        }

        $lessons = Lesson::orderBy('created_at', 'desc')->get();
        // add every post to the sitemap
        foreach ($lessons as $lesson)
        {
            if($lesson->sitemap_include)
                $sitemap->add(url('lesson/'.$lesson->slug), $lesson->updated_at->toIso8601String(), $lesson->sitemap_priority, $lesson->sitemap_freq);
        }

        // generate your sitemap (format, filename)
        return $sitemap->store('xml', 'coding');
        // this will generate file coding.xml to your public folder
    }

    public function test()
    {
        dd(setting('.test_name'));
    }
}
