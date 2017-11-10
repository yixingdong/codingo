@extends('layouts.coding')
@section('css')
    <style>
        .index-page .wrapper > .header {
            height: 50vh;
        }
        #slogan {
            margin-top: 18vh;
            color: #FFFFFF;
            text-align: center;
        }
        .team .team-player img {
            max-width: 100%;
        }
        .team .team-player .title {
            margin: 20px auto;
        }
        .blog-desc{
            padding: 1% 0;
            padding-top: 5%;
        }
        .blog-footer{
            padding: 0 0;
            padding-bottom: 8%;
        }
        .read-me{
            color: #cb7314;
        }
        .read-me:hover{
            text-decoration: none;
            font-size: larger;
            color: #669900;
        }
    </style>
@endsection

@section('header')
    @include('partials.header')
@endsection

@section('content')
    <div class="section row">
        <!--  Begin Blog list area	-->
        <div class="col-md-12" style="margin-top: -100px;">
            <div class="team container">
                <div class="text-center">
                    @foreach($posts as $post)
                        <div class="col-md-12">
                            <div  class="team-player">
                                <h4 class="title">{{$post->title}}</h4>
                                <a href="{{url('post/'.$post->slug)}}"><img  src="{{$post->image}}" alt="Thumbnail Image" class="img-rounded img-raised"></a>

                                <p class="description text-left blog-desc">{!! $post->body !!}</p>
                                <div class="blog-footer">
                                    <span class="text-muted pull-left">发布日期：{{$post->created_at}}</span>
                                    <span class="text-muted pull-right"><a href="{{url('post/'.$post->slug)}}" class="read-me">阅读全文</a></span>
                                </div>
                            </div>
                        </div>
                    @endforeach
                    <br>
                    {{$posts->links()}}
                </div>
            </div>
        </div>
        <!-- End Blog list area -->
        <div class="col-md-12">
        </div>
    </div>
@endsection