@extends('layouts.coding')

@section('css')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/5.0.0/normalize.min.css">
    <link rel="stylesheet" href="/me/mediaelementplayer.css">
    <style>
        /*.index-page .wrapper > .header {*/
        /*height: 50vh;*/
        /*}*/

        /*#slogan {*/
        /*margin-top: 18vh;*/
        /*color: #FFFFFF;*/
        /*text-align: center;*/
        /*}*/
        .team .team-player img {
            max-width: 85%;
        }
        .course-link{
            color: dimgrey;
            display: block;
            padding-left: 10px;
        }
        .course-link:hover, .course-link.activated{
            text-decoration: none;
            border-left: solid 3px chocolate;
            display: block;
            color: chocolate;
            font-size: larger;
        }
        #lesson-list td,#lesson-list th{
            padding-top: 15px;
            padding-bottom: 15px;
        }
        .main-raised{
            margin:0 0;
            border-radius: 0;
        }
    </style>
@endsection

@section('header')
    <div class="media-wrapper">
        <video id="player1" width="640" height="360" style="max-width:100%;" poster="https://lorempixel.com/640/480/?93718" preload="none" controls playsinline webkit-playsinline>
            {{--<source src="{{url('storage/'.json_decode($lesson->video)[0]->download_link)}}" type="video/mp4">--}}
            <source src="http://clips.vorwaerts-gmbh.de/big_buck_bunny.mp4" type="video/mp4">
            {{--http://clips.vorwaerts-gmbh.de/big_buck_bunny.mp4--}}
        </video>
    </div>
    <div class="player-info">
        <div id="player1-rendername">
            <p class="error"></p>
        </div>
    </div>
@endsection

@section('content')
    <div class="container section text-center">
        <div class="row" style="margin-top: -50px;">
            <div class="col-md-8 text-center">
                <h3 class="space-70">目录</h3>
                <table class="table" id="lesson-list">
                    <tbody>
                    <tr>
                        <th class="text-left" style="padding-left: 20px">标题</th>
                        <th class="text-center">时间</th>
                    </tr>
                    @foreach($lesson->course->lessons as $item)
                        <tr>

                            <td class="col-sm-10 text-left">
                                @if($item->id == $lesson->id)
                                    <a href="{{url('lesson/'.$item->slug)}}" class="course-link activated">{{$item->name}}</a>
                                @else
                                    <a href="{{url('lesson/'.$item->slug)}}" class="course-link">{{$item->name}}</a>
                                @endif
                            </td>
                            <td class="col-sm-2 text-center text-blue">{{$item->created_at->format('Y-m-d')}}</td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
            <div class="col-md-4">
                <div>

                </div>
            </div>
        </div>
    </div>
@endsection

@section('js')
    <script src="/me/mediaelement-and-player.js"></script>
    <script src="/me/lang/zh-cn.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            mejs.i18n.language('zh-CN');
            var mediaElements = document.querySelectorAll('video, audio'), i, total = mediaElements.length;
            for (i = 0; i < total; i++) {
                new MediaElementPlayer(mediaElements[i], {
                    stretching: 'auto',
                    pluginPath: '../build/',
                    success: function (media) {
                        var renderer = document.getElementById(media.id + '-rendername');
                        media.addEventListener('loadedmetadata', function () {
                            var src = media.originalNode.getAttribute('src').replace('&amp;', '&');
                            if (src !== null && src !== undefined) {
                                renderer.querySelector('.error').innerHTML = '';
                            }
                        });
                        media.addEventListener('error', function (e) {
                            renderer.querySelector('.error').innerHTML = '<strong>Error</strong>: ' + e.message;
                        });
                    }
                });
            }
        });
    </script>
@endsection