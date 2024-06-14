@extends('layouts.app')

@section('title' ,  'HOME')


@section('content')
<br>

<div class="container">
    <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">


                    <div class="card-header"><h4> Profiel van <strong style="color:rgb(11, 228, 11);">{{$user->username}}</strong></h4></div>

                    <div class="card-body">
                        @if(session('success'))
                         <div class="alert alert-success">
                    {{ session('success') }}
                    </div>
                         @endif



            @if($user->photo_path)
            <img src="{{ asset($user->photo_path) }}" class="img-fluid">
            @else
            <img src="{{ asset('photos/mecanic.png') }}" class="img-fluid">
            @endif
            <hr>



                <h5 style="color:purple">Username: <strong style="color:black;">{{ $user->username }}</strong></h5>

                <h5 style="color:purple">Email: <strong style="color:black;">{{ $user->email }}</strong></h5>

                <h5 style="color:purple">Date of birth: <strong style="color:black;">{{ $user->dateofbirth }}</strong></h5>

                <h5 style="color:purple">About ME:
                    <br>
                    <br><strong style="color:black;">{{ $user->aboutme }}</strong></h5>




            <hr>


            <h2>Gemaakte Posts</h2>

            @if($user->likes->isEmpty())
                    <p style="color:red;">Still no posts</p>
                @else

                    <ul>
                        @foreach($user->posts as $post)
                    <a href="{{route('posts.show', $post->id)}}" style="text-decoration: none;">{{$post->title}}</a>
                    <br>
                @endforeach

                    </ul>
                @endif



                <hr>

                <h2>Gelikete Posts</h2>

                @if($user->likes->isEmpty())
                    <p style="color:red;">Still no likes</p>
                @else

                    <ul>@foreach($user->likes as $like)
                        <a href="{{route('posts.show', $like->id)}}" style="text-decoration: none;">{{$like->post-> title}}</a>
                        <br>
                        @endforeach

                    </ul>
                @endif





            <hr>

                @if(Auth::check() && Auth::user()->id === $user->id)
            <div class="row mb-3">
                <form method="POST" action="{{ route('store') }}" enctype="multipart/form-data">
                    @csrf
                <label for="title" class="col-md-4 col-form-label text-md-end" style="color: purple;">Update Photo</label>

                <div class="col-md-6">
                    <input id="photo" type="file" class="form-control @error('photo') is-invalid @enderror" name="photo" value="{{ old('photo') }}" required autofocus>

                    @error('photo')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                    <div class="row mb-0">
                        <div class="col-md-8 offset-md-4">
                            <br>
                        <button type="submit" class="btn btn-primary">
                            Update profile photo
                        </button>

                        </div>
                    </div>
                    </div>
             </div>

            </form>

              {{-- password --}}
              <hr>
              <li class="list-group-item {{(request()->route()->getName()=='change_password')?'active':''}}"></li>
              {{-- <a href="{{route('change_password')}}"><h1>CHANGE PASSWORD</h1></a> --}}
              <a href="/change_password" style="text-decoration: none"><h6> Change pasword</h6></a>

              <a href="{{route('editProfile', $user->id)}}" style="text-decoration: none"><h6> Edit profile</h6></a>
              <hr>

            @endif


            <a href="{{ route('contact') }}" style="text-decoration: none;">Contact us</a>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
<script type="text/javascript" src="{{asset('js/profile.js')}}"></script>
