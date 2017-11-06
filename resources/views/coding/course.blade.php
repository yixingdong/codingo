@extends('layouts.coding')

@section('css')
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
        .course-link:hover{
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
    </style>
@endsection

@section('header')
    @include('partials.header')
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
                    @foreach($course->lessons as $lesson)
                        <tr>
                            <td class="col-sm-10 text-left"><a href="{{url('lesson/'.$lesson->slug)}}" class="course-link">{{$lesson->name}}</a></td>
                            <td class="col-sm-2 text-center text-blue">{{$lesson->created_at->format('Y-m-d')}}</td>
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