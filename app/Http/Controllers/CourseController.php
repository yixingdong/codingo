<?php

namespace App\Http\Controllers;

use App\Course;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use Artesaos\SEOTools\Traits\SEOTools as SEOToolsTrait;

class CourseController extends Controller
{
    use SEOToolsTrait;

    public function index(Request $request)
    {
        $this->seo()->setTitle('Coding10网，最专业的Laravel学习网站,Laravel技术贴');
        $this->seo()->setDescription(
            'Coding10网，国内最专业的Laravel学习网站，这里用最简单直接的方式介绍Laravel相关的开发知识，开发工具，后台前端的内容也详细介绍。以及结合软件工程Laravel最佳的编程实践。'
        );
        $this->seo()->setCanonical(url('courses'));

        $page = is_null($request->get('page'))?1:$request->get('page');

        $courses = Cache::rememberForever('courses.'.$page, function() use ($page){
            return Course::paginate(10);
        });

        return view('coding.courses',compact('courses'));
    }

    public function show($slug)
    {
        $course = Course::findBySlug($slug);

        $this->seo()->setTitle($course->seo_title);
        $this->seo()->setDescription($course->meta_description);
        $this->seo()->setCanonical(url('course/'.$course->slug));

        return view('coding.course',compact('course'));
    }
}
