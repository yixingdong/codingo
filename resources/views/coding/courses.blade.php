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
            max-width: 85%;
        }
        .course-item:hover{
            text-decoration: none;
            color: coral;
        }
    </style>
@endsection

@section('header')
    @include('partials.header')
@endsection

@section('content')
    <div class="section container text-center">
        <h2 class="title">所有课程</h2>
        <div class="team">
            <div class="row">
                @foreach($courses as $course)
                    <div class="col-md-4">
                        <div  class="team-player">
                            <a href="{{url('course/'.$course->id)}}">
                                <img  src="{{$course->image}}" alt="Thumbnail Image" class="img-rounded img-raised"></a>
                            <h4  class="title">
                                <a href="{{url('course/'.$course->id)}}" class="course-item">{{$course->name}} </a> <br>
                                <small  class="text-muted">{{$course->created_at}}</small>
                            </h4>
                        </div>
                    </div>
                @endforeach
            </div>
            {{$courses->links()}}
        </div>
    </div>
@endsection