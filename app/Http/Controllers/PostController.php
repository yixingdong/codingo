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
        $this->seo()->setTitle('Home');
        $this->seo()->setDescription('This is a description for this page');
        $this->seo()->setCanonical(url('post'));

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
