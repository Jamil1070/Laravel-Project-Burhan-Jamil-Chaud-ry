@extends('layouts.app')

@section('title' ,  'HOME')


@section('content')
<br>

<div class="container">
    <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">

                    <div class="card-header"><h4><strong>{{$post->title}}</strong></h4></div>

                    <div class="card-body">

                        <small>Gepost door <strong><a href="{{route('profile', $post->user->username)}}" style="text-decoration: none; color:rgb(11, 228, 11)">{{$post->user->username}}</a> </strong> {{$post->created_at->format('d/m/Y \o\m H:i')}} </small>

                <br><br>
                {{$post->message}}
                <br>
                <br>
                @if($post->photo_path)
                    <img src="{{ asset($post->photo_path) }}" class="img-fluid">
                @endif

                <br>
                <br>
                @auth

                @if($post->user_id == Auth::user()->id)
                 {{-- <a href="{{route('posts.edit', $post->id)}}">Edit post</a> --}}
                 <a href="{{route('posts.edit', $post->id)}}"><img src="{{asset('photos/edit.png')}}"style="width:6%;"> </a>
                 @else
                 <a href="{{route('like', $post->id)}}"><img src="{{ asset('photos/like.png') }}" style="width:5%;"></a>
                @endif
                @endauth
                <br>
                <br>


                <small> Deze post heeft <strong style="color:red"> {{$post->likes()->count()}} likes </strong></small>

            @auth

                @if(Auth::user()->is_admin)
                <br>
                <br>
                <form method="post" action="{{route('posts.destroy', $post->id)}}" >
                    @csrf
                    @method('DELETE')

                    <div class="row mb-0">
                        <div class="col-md-6 offset-md-3 d-flex align-items-center justify-content-center">

                             <input type="submit" value="DELETE POST" class="btn btn-primary" style="background-color: red; border:black;" onclick="return confirm('ARE YOU SURE YOU WANT TO DELETE THIS POST?')">

                        </div>
                    </div>

                </form>
                @endif

            @endauth
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
