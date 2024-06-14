@extends('layouts.app')

@section('content')

@auth

    <div class="container border rounded p-4" style="background-color:lightblue; border;">
        <h4 class="container">Welcome {{ auth()->user()->username }} !! You are logged in successfully!!</h4>
        <div class="mt-4">
            <a href="{{ route('logout') }}" style="text-decoration:none; color:black;"
               onclick="event.preventDefault();
                         document.getElementById('logout-form').submit();">
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
    <div class="border rounded p-4" style="background-color: #f8f9fa;">
        <h2>Hi CarGeekers</h2>
        <p>Welcome to CarGeeks! At CarGeeks, we are passionate about everything related to cars. Whether you're a car enthusiast, a professional in the automotive industry, or simply someone who loves learning about the latest trends and technologies in the world of automobiles, you've come to the right place.</p>
        <p>Our platform offers a dynamic space where you can ask questions, create posts, read posts, explore FAQs, and join forums about cars. Dive into our community and connect with fellow car enthusiasts today!</p>
    </div>
</div>

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">What would you like to do?</div>

                <span>
                    <h4>
                        <a href="{{ route('posts.create') }}" style="text-decoration: none; color: purple;">
                            <img src="{{ asset('photos/newpost.png') }}" style="width:20%; margin-right:5%; margin-left:5%; margin-top:20px;">
                            <strong>Create a new post</strong>
                        </a>
                    </h4>
                </span>

                <hr>
                <span>
                    <h4>
                        <a href="{{ url('/') }}" style="text-decoration: none; color: purple">
                            <img src="{{ asset('photos/posts.png') }}" style="width:20%; margin-right:5%; margin-left:5%; margin-top:20px;">
                            <strong>Continue reading other user's posts</strong>
                        </a>
                    </h4>
                </span>
                <hr>

                <span>
                    <h4>
                        <a href="{{ route('questions.create') }}" style="text-decoration: none; color: purple">
                            <img src="{{ asset('photos/debate2.png') }}" style="width:20%; margin-right:5%; margin-left:5%; margin-top:20px;">
                            <strong>Make a forum to ask about something</strong>
                        </a>
                    </h4>
                </span>
                <hr>

                <span>
                    <h4>
                        <a href="{{ route('questions.index') }}" style="text-decoration: none; color: purple">
                            <img src="{{ asset('photos/help.png') }}" style="width:20%; margin-right:5%; margin-left:5%; margin-top:20px;">
                            <strong>Share your opinion with other people</strong>
                        </a>
                    </h4>
                </span>
                <hr>
                <span>
                    <h4>
                        <a href="{{ route('f_a_q_categories.index') }}" style="text-decoration: none; color: purple">
                            <img src="{{ asset('photos/faq2.png') }}" style="width:20%; margin-right:5%; margin-left:5%; margin-top:20px;">
                            <strong>Frequently Asked Questions</strong>
                        </a>
                    </h4>
                </span>

                @if (Auth::user()->is_admin)
                <hr>
                <span>
                    <h4>
                        <a href="{{ route('admin.panel') }}" style="text-decoration: none; color: purple">
                            <img src="{{ asset('photos/administrator.png') }}" style="width:20%; margin-right:5%; margin-left:5%; margin-top:20px;">
                            <strong>Administrator page</strong>
                        </a>
                    </h4>
                </span>
                @endif
            </div>
        </div>
    </div>
</div>

@endsection
