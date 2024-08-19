@extends('layouts.app')

@section('title', 'HOME')

@section('content')
    <br>
    @guest
        <div class="container border rounded p-4" style="background-color: #e7f0ff; border: 1px solid #cce4ff; box-shadow: 0 4px 8px rgba(0,0,0,0.1);">
            <h4 style="text-align: center;">You are not logged in!</h4>
            <div class="mt-4 text-center">
                <a href="/login" class="btn btn-primary" style="text-decoration:none; color:white; background-color: #007bff; border-color: #007bff;"><strong>Login</strong></a>
                <a href="/register" class="btn btn-secondary" style="text-decoration:none; color:white; background-color: #6c757d; border-color: #6c757d; margin-left: 10px;"><strong>Register</strong></a>
            </div>
        </div>
    @endguest
    <br>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card" style="border: 1px solid #dee2e6; border-radius: 8px;">
                    <div class="card-header" style="background-color: #007bff; color: white; font-weight: bold;">All Posts</div>
                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif

                        @if ($posts->isEmpty())
                            <div style="text-align: center; padding: 20px;">
                                <p style="color:red; font-weight: bold;">There are still no posts.</p>
                            </div>
                        @else
                            @foreach ($posts as $post)
                                <div class="post-item" style="border-bottom: 1px solid #dee2e6; padding: 15px 0;">
                                    <h3>
                                        <a href="{{ route('posts.show', $post->id) }}" style="text-decoration: none; color: #007bff;">{{ $post->title }}</a>
                                    </h3>
                                    <small>Posted by <strong><a href="{{ route('profile', $post->user->username) }}" style="text-decoration: none; color: #007bff;">{{ $post->user->username }}</a></strong> on {{ $post->created_at->format('d/m/Y \o\m H:i') }}</small>
                                    <br>
                                    @auth
                                        @if ($post->user_id == Auth::user()->id)
                                            <a href="{{ route('posts.edit', $post->id) }}" style="text-decoration: none;">
                                                <img src="{{ asset('photos/edit.png') }}" style="width: 24px; vertical-align: middle;"/>
                                            </a>
                                        @else
                                            <a href="{{ route('like', $post->id) }}" style="text-decoration: none;">
                                                <img src="{{ asset('photos/like.png') }}" style="width: 24px; vertical-align: middle;"/>
                                            </a>
                                        @endif
                                    @endauth
                                    <br>
                                    <small>This post has <strong style="color:red;">{{ $post->likes()->count() }} likes</strong></small>
                                </div>
                            @endforeach
                        @endif

                        <div class="row mb-0">
                            <div class="col-md-6 offset-md-3 d-flex align-items-center justify-content-center">
                                <a href="{{ route('posts.create') }}" class="btn btn-primary" style="background-color: #007bff; border-color: #007bff;">
                                    NEW POST
                                </a>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
