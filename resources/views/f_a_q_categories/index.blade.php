@extends('layouts.app')

@section('title' ,  'HOME')


@section('content')
<br>



    @guest


        <div class="container border rounded p-4" style="background-color: lightblue; border;">
            <h4>U bent niet ingelogd.!!</h4>
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

                    <div class="card-header"> Categories</div>

                    <div class="card-body">
                @if (session('status'))
                <div class="alert alert-success" role="alert">
                    {{session ('status')}}
                </div>
                @endif

                @if ($f_a_q_categories->isEmpty())
                    <div style="text-align: center;">
                <p style="color:red;">There are still no categories of FAQs.</p>
             </div>
                @else

                @foreach ($f_a_q_categories as $f_a_q_categorie)

                <h3><a href="{{route('f_a_q_categories.show', $f_a_q_categorie->id)}}" style="text-decoration:none; ">{{$f_a_q_categorie->name}}</a></h3>

                @auth

                @if(Auth::user()->is_admin)

                <a href="{{route('f_a_q_categories.edit', $f_a_q_categorie->id)}}"><img src="{{asset('photos/edit.png')}}"style="width:4%;"> </a>
                <div class="row mb-0">
                    <div class="col-md-6 offset-md-3 d-flex align-items-center justify-content-center">
                        <a href="{{ route('f_a_q_categories.create') }}" class="btn btn-primary">
                            NEW CATEGORIE
                        </a>
                    </div>
                </div>

                @endif

                @endauth
                <hr>


                @endforeach
                @endif



                </div>
            </div>
        </div>
    </div>
</div>
@endsection
