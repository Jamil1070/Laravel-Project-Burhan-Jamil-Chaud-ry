@extends('layouts.app')

@section('title' ,  'HOME')


@section('content')
<br>



    @guest


        <div class="container border rounded p-4" style="background-color: lightcoral; border;">
            <h4>You are not logged in.</h4>
            <div class="mt-4">
                <a href="/login" style="text-decoration:none; color:black;"><strong>Login</strong></a>
                <a href="/register" style="text-decoration:none; color:black; margin:120px; f"><strong>Register</strong></a>
            </div>

        </div>


    @endguest
    <br>
<div class="container">
    <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">

                    <div class="card-header"> Questions</div>

                    <div class="card-body">
                @if (session('status'))
                <div class="alert alert-success" role="alert">
                    {{session ('status')}}
                </div>
                @endif

                @if ($questions->isEmpty())
                    <div style="text-align: center;">
                <p style="color:red;">There are still no questions.</p>
             </div>
                @else
                @foreach ($questions as $question)

                <h3><a href="{{route('questions.show', $question->id)}}" style="text-decoration:none; ">{{$question->title}}</a></h3>
                <p>{{$question->message}}</p>

                <small>Posted By <strong><a href="{{route('profile', $question->user->username)}}" style="text-decoration: none; color:rgb(11, 228, 11)">{{$question->user->username}}</a> </strong> op {{$question->created_at->format('d/m/Y \o\m H:i')}} </small>
                <br>

                @auth

                @if($question->user_id == Auth::user()->id)
                <a href="{{route('questions.edit', $question->id)}}"><img src="{{asset('photos/edit.png')}}"style="width:4%;"> </a>

                     @endif
                @endauth
                <br>
                 <hr>

                @endforeach
                @endif
                <div class="row mb-0">
                    <div class="col-md-6 offset-md-3 d-flex align-items-center justify-content-center">
                        <a href="{{ route('questions.create') }}" class="btn btn-primary">
                            NEW QUESTION
                        </a>
                    </div>
                </div>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
