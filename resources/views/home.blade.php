@extends('layouts.app')

@section('content')

@auth

    <div class="container border rounded p-4" style="background-color: #e7f0ff; border: 1px solid #cce4ff;">
        <h4 class="container text-center">Welcome, {{ auth()->user()->username }}! You are logged in successfully!</h4>
        <div class="mt-4 text-center">
            <a href="{{ route('logout') }}" class="btn btn-dark" 
               onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                {{ __('Logout') }}
            </a>

            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                @csrf
            </form>
        </div>
    </div>
    <br>
    <br>

@endauth

<div class="container mb-4">
    <div class="border rounded p-4" style="background-color: #f0f2f5; border: 1px solid #d1d3d4;">
        <h2 class="text-center mb-3">Hello CarGeekers!</h2>
        <p>Welcome to CarGeeks! We are passionate about everything related to cars. Whether you're a car enthusiast, a professional in the automotive industry, or simply someone who loves learning about the latest trends and technologies in the world of automobiles, you've come to the right place.</p>
        <p>Our platform offers a dynamic space where you can ask questions, create posts, read posts, explore FAQs, and join forums about cars. Dive into our community and connect with fellow car enthusiasts today!</p>
    </div>
</div>

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card border rounded">
                <div class="card-header text-center font-weight-bold">What would you like to do?</div>

                <div class="card-body">
                    <div class="text-center mb-4">
                        <a href="{{ route('posts.create') }}" class="btn btn-outline-primary">
                            <img src="{{ asset('photos/newpost.png') }}" class="img-fluid" style="width: 20%; margin-bottom: 10px;">
                            <br>
                            <strong>Create a new post</strong>
                        </a>
                    </div>

                    <hr>

                    <div class="text-center mb-4">
                        <a href="{{ url('/') }}" class="btn btn-outline-primary">
                            <img src="{{ asset('photos/posts.png') }}" class="img-fluid" style="width: 20%; margin-bottom: 10px;">
                            <br>
                            <strong>Continue reading other user's posts</strong>
                        </a>
                    </div>

                    <hr>

                    <div class="text-center mb-4">
                        <a href="{{ route('questions.create') }}" class="btn btn-outline-primary">
                            <img src="{{ asset('photos/debate2.png') }}" class="img-fluid" style="width: 20%; margin-bottom: 10px;">
                            <br>
                            <strong>Make a forum to ask about something</strong>
                        </a>
                    </div>

                    <hr>

                    <div class="text-center mb-4">
                        <a href="{{ route('questions.index') }}" class="btn btn-outline-primary">
                            <img src="{{ asset('photos/help.png') }}" class="img-fluid" style="width: 20%; margin-bottom: 10px;">
                            <br>
                            <strong>Share your opinion with other people</strong>
                        </a>
                    </div>

                    <hr>

                    <div class="text-center mb-4">
                        <a href="{{ route('f_a_q_categories.index') }}" class="btn btn-outline-primary">
                            <img src="{{ asset('photos/faq2.png') }}" class="img-fluid" style="width: 20%; margin-bottom: 10px;">
                            <br>
                            <strong>Frequently Asked Questions</strong>
                        </a>
                    </div>

                    @if (Auth::user()->is_admin)
                    <hr>

                    <div class="text-center mb-4">
                        <a href="{{ route('admin.panel') }}" class="btn btn-outline-primary">
                            <img src="{{ asset('photos/administrator.png') }}" class="img-fluid" style="width: 20%; margin-bottom: 10px;">
                            <br>
                            <strong>Administrator page</strong>
                        </a>
                    </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
