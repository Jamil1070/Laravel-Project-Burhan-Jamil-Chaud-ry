@extends('layouts.app')

@section('title', 'HOME')

@section('content')
<br>

@guest
    <div class="container border rounded p-4 my-4" style="background-color: lightblue; border: 2px solid darkblue; box-shadow: 0 4px 8px rgba(0,0,0,0.2);">
        <h4 class="text-dark">U bent niet ingelogd!</h4>
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
                <div class="card-header bg-primary text-white">Categories</div>
                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    @if ($f_a_q_categories->isEmpty())
                        <div class="text-center">
                            <p class="text-danger">There are still no categories of FAQs.</p>
                        </div>
                    @else
                        @foreach ($f_a_q_categories as $f_a_q_categorie)
                            <div class="mb-4 p-3 border rounded shadow-sm">
                                <h3><a href="{{ route('f_a_q_categories.show', $f_a_q_categorie->id) }}" class="text-decoration-none text-primary">{{ $f_a_q_categorie->name }}</a></h3>

                                @auth
                                    @if (Auth::user()->is_admin)
                                        <a href="{{ route('f_a_q_categories.edit', $f_a_q_categorie->id) }}">
                                            <img src="{{ asset('photos/edit.png') }}" style="width: 24px; vertical-align: middle;">
                                        </a>
                                    @endif
                                @endauth
                            </div>
                            <hr>
                        @endforeach
                    @endif

                    @auth
                        @if (Auth::user()->is_admin)
                            <div class="row mb-0">
                                <div class="col-md-6 offset-md-3 d-flex align-items-center justify-content-center">
                                    <a href="{{ route('f_a_q_categories.create') }}" class="btn btn-primary">
                                        NEW CATEGORY
                                    </a>
                                </div>
                            </div>
                        @endif
                    @endauth
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
