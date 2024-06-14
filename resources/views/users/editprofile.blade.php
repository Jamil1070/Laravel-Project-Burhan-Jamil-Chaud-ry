@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Edit Post</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('updateProfile', $user->id) }}">
                        @csrf
                        <!--si cambiamos el post por PUT no va a funcionar entonces tenemos que usar este metodo-->
                        @method('PUT')

                        <div class="row mb-3">
                            <label for="username" class="col-md-4 col-form-label text-md-end">Username</label>

                            <div class="col-md-6">
                                <input id="username" type="text" class="form-control @error('username') is-invalid @enderror" name="username" value="{{ $user->username}}" required autofocus>

                                @error('username')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror

                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="name" class="col-md-4 col-form-label text-md-end">Name</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ $user->name}}" required autofocus>

                                @error('name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror

                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="dateofbirth" class="col-md-4 col-form-label text-md-end">Date of birth</label>

                            <div class="col-md-6">
                                <input id="name" type="date" class="form-control @error('dateofbirth') is-invalid @enderror" name="dateofbirth" value="{{ $user->dateofbirth}}" required autofocus>

                                @error('dateofbirth')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror

                            </div>
                        </div>


                        <div class="row mb-3">
                            <label for="aboutme" class="col-md-4 col-form-label text-md-end">About me</label>

                            <div class="col-md-6">
                                <textarea id="aboutme" style="height: 200px; width: 100%;" class="form-control @error('aboutme') is-invalid @enderror" name="aboutme" value="{{ $user->aboutme }}" required autofocus></textarea>
                                @error('aboutme')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror

                            </div>
                        </div>


                        <div class="row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    Edit Profile
                                </button>


                            </div>
                        </div>

                        <li class="list-group-item {{(request()->route()->getName()=='change_password')?'active':''}}"></li>
              {{-- <a href="{{route('change_password')}}"><h1>CHANGE PASSWORD</h1></a> --}}
              <a href="/change_password" style="text-decoration: none"><h6> Change pasword</h6></a>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
