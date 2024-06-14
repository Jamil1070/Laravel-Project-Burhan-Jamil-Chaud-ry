@extends('layouts.app')

@section('title' ,  'HOME')


@section('content')
<br>

<div class="container">
    <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">

                    <div class="card-header"><h4><strong>{{$question->title}}</strong></h4></div>

                    <div class="card-body">

                        <small>Gepost door <strong><a href="{{route('profile', $question->user->username)}}" style="text-decoration: none; color:rgb(11, 228, 11)">{{$question->user->username}}</a> </strong> {{$question->created_at->format('d/m/Y \o\m H:i')}} </small>

                <br><br>
                {{$question->message}};
                <br>
                <br>
                @if($question->photo_path)
                    <img src="{{ asset($question->photo_path) }}" class="img-fluid">
                @endif

                <br>
                <br>
                @auth

                @if($question->user_id == Auth::user()->id)
                 {{-- <a href="{{route('posts.edit', $post->id)}}">Edit post</a> --}}
                 <a href="{{route('questions.edit', $question->id)}}"><img src="{{asset('photos/edit.png')}}"style="width:6%;"> </a>
                 {{-- @else
                 <a href="{{route('like', $question->id)}}"><img src="{{ asset('photos/like.png') }}" style="width:5%;"></a> --}}
                @endif
                @endauth
                {{-- <br>
                <br>


                <small> Deze post heeft <strong style="color:red"> {{$question->likes()->count()}} likes </strong></small> --}}

            @auth

                @if(Auth::user()->is_admin)
                <br>
                <br>
                <form method="post" action="{{route('questions.destroy', $question->id)}}" >
                    @csrf
                    @method('DELETE')

                    <div class="row mb-0">
                        <div class="col-md-6 offset-md-3 d-flex align-items-center justify-content-center">

                             <input type="submit" value="DELETE QUESTION" class="btn btn-primary" style="background-color: red; border:black;" onclick="return confirm('ARE YOU SURE YOU WANT TO DELETE THIS QUESTION?')">

                        </div>
                    </div>

                </form>
                @endif

            @endauth
<br><br>
            <hr>

            @foreach ($question->opinions as $opinion)

            {{-- <h1>this is a opinion</h1> --}}
            {{-- <h3><a href="{{route('questions.show', $question->id)}}" style="text-decoration:none; ">{{$question->title}}</a></h3> --}}
            @if($opinion->photo_path)
                    <img src="{{ asset($opinion->photo_path) }}" class="img-fluid">
                    <br>
                    <br>
                @endif
            <p>{{$opinion->message}}</p>

            <small>Gepost door <strong><a href="{{route('profile', $opinion->user->username)}}" style="text-decoration: none; color:rgb(11, 228, 11)">{{$opinion->user->username}}</a> </strong> op {{$opinion->created_at->format('d/m/Y \o\m H:i')}} </small>
            <br>

            @auth

            @if($opinion->user_id == Auth::user()->id || (Auth::user()->is_admin))
            {{-- <a href="{{route('opinions.edit', $opinion->id)}}"><img src="{{asset('photos/edit.png')}}"style="width:4%;"> </a>
             --}}
             <a href="{{ route('opinions.edit', ['opinion' => $opinion->id]) }}"><img src="{{ asset('photos/edit.png') }}" style="width:4%;"></a>

             <form method="post" action="{{route('opinions.destroy', $opinion->id)}}" >
                @csrf
                @method('DELETE')

                <div class="row mb-0">
                    <div class="col-md-6 offset-md-3 d-flex align-items-center justify-content-center">

                         <input type="submit" value="DELETE OPINION" class="btn btn-primary" style="background-color: red; border:black;" onclick="return confirm('ARE YOU SURE YOU WANT TO DELETE THIS OPINION?')">

                    </div>
                </div>

            </form>


              @else
             <a href="{{route('agree', $opinion->id)}}"><img src="{{ asset('photos/agree.png') }}" style="width:4%;"></a>

             <a href="{{route('disagree', $opinion->id)}}"><img src="{{ asset('photos/disagree.png') }}" style="width:4%;"></a>
             <br>

                 @endif



            @endauth
            <small> <strong style="color:green"> {{$opinion->agrees()->count()}} People </strong>agree with this </small>
            <br>
            <small> <strong style="color:red"> {{$opinion->disagrees()->count()}} People </strong>disagree with this </small>


             <hr>

            @endforeach
            @if ($question->opinions->isEmpty())
                    <div class="row">
                        <div class="col-md-12 text-center">
                            <small style="color: purple;">THERE ARE STILL NO OPINIONS</small>
                        </div>
                    </div>
            @endif
            <br>


            <div class="row mb-0">
                <div class="col-md-6 offset-md-3 d-flex align-items-center justify-content-center">
                    <a href="{{ route('opinions.create', ['question_id' => $question->id]) }}" class="btn btn-primary">
                        ADD OPINION
                    </a>
                </div>
            </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
