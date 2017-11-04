<?php

namespace App\Http\Controllers;

use App\Lesson;
use Illuminate\Http\Request;
use Artesaos\SEOTools\Traits\SEOTools as SEOToolsTrait;
use Illuminate\Support\Facades\Cache;

class LessonController extends Controller
{
    use SEOToolsTrait;

    public function index(Request $request)
    {
        $this->seo()->setTitle('Coding10网，最专业的Laravel学习网站,Laravel技术贴');
        $this->seo()->setDescription(
            'Coding10网，国内最专业的Laravel学习网站，这里用最简单直接的方式介绍Laravel相关的开发知识，开发工具，后台前端的内容也详细介绍。以及结合软件工程Laravel最佳的编程实践。'
        );
        $this->seo()->setCanonical(url('lessons'));

        $page = is_null($request->get('page'))?1:$request->get('page');

        $lessons = Cache::rememberForever('lessons.'.$page, function() use ($page){
            return Lesson::paginate(10);
        });

        return view('coding.courses',compact('lessons'));
    }

    public function show($slug)
    {
        $lesson = Lesson::findBySlug($slug);

        $this->seo()->setTitle($lesson->seo_title);
        $this->seo()->setDescription($lesson->meta_description);
        $this->seo()->setCanonical(url('course/'.$lesson->slug));

        return view('coding.lesson',compact('lesson'));
    }
}
