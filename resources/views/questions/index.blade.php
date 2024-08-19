@extends('layouts.app')

@section('title', 'HOME')

@section('content')
<br>

@guest
    <div class="container border rounded p-4 my-4" style="background-color: lightcoral; border: 2px solid darkred; box-shadow: 0 4px 8px rgba(0,0,0,0.2);">
        <h4 class="text-white">You are not logged in.</h4>
        <div class="mt-4 text-center">
            <a href="/login" class="btn btn-dark mx-2"><strong>Login</strong></a>
            <a href="/register" class="btn btn-dark mx-2"><strong>Register</strong></a>
        </div>
    </div>
@endguest

<br>

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card border-primary shadow-sm">
                <div class="card-header bg-primary text-white">Questions</div>
                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    @if ($questions->isEmpty())
                        <div class="text-center">
                            <p class="text-danger">There are still no questions.</p>
                        </div>
                    @else
                        @foreach ($questions as $question)
                            <div class="mb-4 p-3 border rounded shadow-sm">
                                <h3><a href="{{ route('questions.show', $question->id) }}" class="text-decoration-none text-primary">{{ $question->title }}</a></h3>
                                <p>{{ $question->message }}</p>
                                <small class="text-muted">
                                    Posted By <strong><a href="{{ route('profile', $question->user->username) }}" class="text-success text-decoration-none">{{ $question->user->username }}</a></strong> on {{ $question->created_at->format('d/m/Y \o\m H:i') }}
                                </small>
                                <br>
                                @auth
                                    @if($question->user_id == Auth::user()->id)
                                        <a href="{{ route('questions.edit', $question->id) }}">
                                            <img src="{{ asset('photos/edit.png') }}" style="width: 24px; vertical-align: middle;">
                                        </a>
                                    @endif
                                @endauth
                            </div>
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
