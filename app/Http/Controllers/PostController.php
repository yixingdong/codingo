<?php

namespace App\Http\Controllers;

use App\Post;
use Illuminate\Http\Request;
use Artesaos\SEOTools\Traits\SEOTools as SEOToolsTrait;


class PostController extends Controller
{
    use SEOToolsTrait;

    public function index()
    {
        $this->seo()->setTitle('Coding10网，最专业的Laravel学习网站,Laravel技术贴');
        $this->seo()->setDescription(
            'Coding10网，国内最专业的Laravel学习网站，这里用最简单直接的方式介绍Laravel相关的开发知识，开发工具，后台前端的内容也详细介绍。以及结合软件工程Laravel最佳的编程实践。'
        );
        $this->seo()->setCanonical(url('posts'));

        $posts = Post::paginate(10);

        return view('coding.posts',compact('posts'));
    }

    public function show(Post $post)
    {
        $this->seo()->setTitle($post->seo_title);
        $this->seo()->setDescription($post->meta_description);
        $this->seo()->setCanonical(url('post/'.$post->id));

        return view('coding.post',compact('post'));
    }
}
