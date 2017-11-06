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
        .team {
            margin-top: 50px;
        }
        .team .team-player img {
            max-width: 88%;
        }
        .team .team-player .title {
            margin: 20px auto;
        }
        .content-publish{
            padding: 5% 0;
        }
        .content-footer{
            padding: 6% 0;
        }
        .section{
            padding: 0 0;
        }
        .font-yhl{
            font-family: "Microsoft YaHei UI Light";
        }
        .fs-16{
            font-size: 16px;
        }
        .fs-18{
            font-size: 18px;
        }

    </style>
@endsection

@section('header')
    @include('partials.header')
@endsection

@section('content')
    <div class="section">
        <div class="row">
            <!--  Begin Blog area	-->
            <div class="col-md-12">
                <div class="team">
                    <div style="padding: 3% 8%">
                        <div  class="content-area">
                            <h3 class="content-title space20 text-center font-yhl">{{$post->title}}</h3>
                            <div class="content-body description">
                                <div class="content-publish">
                                    <span class="text-muted pull-left fs-18">作者：Coding Man</span>
                                    <span class="text-muted pull-right text-warning fs-18">发布日期：{{$post->updated_at->format('Y-m-d')}}</span>
                                </div>
                                <div class="post-content">
                                    {!! $post->body !!}
                                </div>
                            </div>
                            <br/><br/>
                            @if(!Auth::check())
                                <div class="content-footer">
                                    <a class="btn btn-lg btn-success text-mute" href="/login" style="width: 100%">登录参与评论</a>
                                </div>
                            @endif
                            <br/><br/>
                            <div class="section section-comments">
                                <div class="row">
                                    <div class="col-md-12">
                                        @if($post->comments->count()>0)
                                        <div class="media-area">
                                            <h3 class="title text-center">{{$post->comments->count()}} Comments</h3>
                                            {!! $post->showComments() !!}
                                        </div>
                                        @endif
                                        @if(Auth::check())
                                            <h3 id="comment-title" class="title text-center">期待您的参与</h3>
                                            <div class="media media-post">
                                                <a class="pull-left author" href="#pablo">
                                                    <div class="avatar">
                                                        <img class="media-object" alt="64x64" src="/storage/{{Auth::user()->avatar}}" width="150" height="150">
                                                    </div>
                                                </a>
                                                <div class="media-body">
                                                    <form id="post-comment" method="post" action="{{route('comment.store')}}">
                                                        <div class="form-group is-empty">
                                                            {!! csrf_field() !!}
                                                            <input type="hidden" name="target_id" value="{{$post->id}}"/>
                                                            <input type="hidden" name="target_type" value="post"/>
                                                            <input id="comment-parent" type="hidden" name="parent" value=""/>
                                                            <textarea id="comment-tt" name="content" class="form-control" placeholder="请开始你的表演" rows="6"></textarea>
                                                            <span class="material-input"></span>
                                                        </div>
                                                        <div class="media-footer">
                                                            <button href="#pablo" class="btn btn-success btn-round btn-wd pull-right fs-18">发表评论</button>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div> <!-- end media-post -->
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <br>
                        </div>
                    </div>
                    <br>
                </div>
            </div>
            <!-- End Blog list area -->
            <div class="col-md-12">
            </div>
        </div>
    </div>
@endsection
@section('js')
    <script src="https://cdn.bootcss.com/jquery-scrollTo/2.1.1/jquery.scrollTo.min.js"></script>
    <script>
        $(window).load(function(){
            $(".post-content").css('line-height','2em').css('letter-spacing','1px').css('text-align','justify');
            $(".post-content p").css('margin','20px 0');
            $(".post-content img").css('margin','30px 0').addClass("img-responsive center-block img-rounded img-raised");
            $("pre").css("font-family", "Microsoft YaHei UI Light")
                .css('letter-spacing','1px')
                .css('line-height','2em');
            $(".action-replay").click(function () {
                @if(Auth::check())
                $('#comment-title').text('@'+$(this).data('user')+',我有话说');
                $('#comment-parent').val($(this).data('parent'));
                $.scrollTo('#post-comment');
                $('#comment-tt').focus();
                @else
                    window.location.href="/login";
                @endif
            });
        })
    </script>
@endsection
