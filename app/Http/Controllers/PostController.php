<?php

namespace App\Http\Controllers;

use App\Post;
use Illuminate\Http\Request;
use Artesaos\SEOTools\Traits\SEOTools as SEOToolsTrait;
use Illuminate\Support\Facades\Cache;


class PostController extends Controller
{
    use SEOToolsTrait;

    public function index(Request $request)
    {
        $this->seo()->setTitle('Coding10网，最专业的Laravel学习网站,Laravel技术贴');
        $this->seo()->setDescription(
            'Coding10网，国内最专业的Laravel学习网站，这里用最简单直接的方式介绍Laravel相关的开发知识，开发工具，后台前端的内容也详细介绍。以及结合软件工程Laravel最佳的编程实践。'
        );
        $this->seo()->setCanonical(url('posts'));

        $page = is_null($request->get('page'))?1:$request->get('page');

        $content = Cache::rememberForever('posts.'.$page, function() use ($page){
            $posts = Post::paginate(10);
            return collect(['items'=>$posts->getItems(),'links'=>$posts->links()]);
        });


        return view('coding.posts',compact('content'));
    }

    public function show($slug)
    {
        $post = Cache::rememberForever('post.cache.'.$slug, function() use ($slug){
            return Post::where('slug',$slug)->firstOrFail();
        });

        $this->seo()->setTitle($post->seo_title);
        $this->seo()->setDescription($post->meta_description);
        $this->seo()->setCanonical(url('post/'.$post->slug));

        return view('coding.post',compact('post'));
    }
}
