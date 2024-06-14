@extends('layouts.app')

@section('title' ,  'HOME')


@section('content')
<br>

<div class="container">
    <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">

                    <div class="card-header"><h4><strong>Frequently Asked Questions</strong></h4></div>

                    <div class="card-body">

                        @if(session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif

                        <div style="text-align: center;">
                            <h1 style="color: purple">Category: <strong>{{$f_a_q_categorie->name}}</strong></h1>
                        </div>



                @auth

                @if(Auth::check() && Auth::user()->is_admin)

                <div style="text-align: center;">
                 <a href="{{route('f_a_q_categories.edit', $f_a_q_categorie->id)}}"><img src="{{asset('photos/edit.png')}}"style="width:6%;"> </a>
                </div>
                @endif
                @endauth
            @auth
                
                @if(Auth::check() && Auth::user()->is_admin)

                <br>
                <form method="post" action="{{route('f_a_q_categories.destroy', $f_a_q_categorie->id)}}" >

                    @csrf
                    @method('DELETE')

                    <div class="row mb-0">
                        <div class="col-md-6 offset-md-3 d-flex align-items-center justify-content-center">

                             <input type="submit" value="DELETE CATEGORIE" class="btn btn-primary" style="background-color: red; border:black;" onclick="return confirm('ARE YOU SURE YOU WANT TO DELETE THIS QUESTION?')">

                        </div>
                    </div>

                </form>
                @endif

            @endauth

            <hr>


            @foreach ($f_a_q_questions as $f_a_q_question)
            <h5><strong>Q: "{{$f_a_q_question->question}}"</strong></h5>

            <br>
            <h4><small>A: {{$f_a_q_question->answer}}</small></h4>


            @auth

            @if(Auth::check() && Auth::user()->is_admin)

             <a href="{{ route('f_a_q_questions.edit', ['f_a_q_question' => $f_a_q_question->id]) }}"><img src="{{ asset('photos/edit.png') }}" style="width:4%;"></a>

             <form method="post" action="{{route('f_a_q_questions.destroy', $f_a_q_question->id)}}" >
                @csrf
                @method('DELETE')

                <div class="row mb-0">
                    <div class="col-md-6 offset-md-3 d-flex align-items-center justify-content-center">

                         <input type="submit" value="DELETE FAQ" class="btn btn-primary" style="background-color: red; border:black;" onclick="return confirm('ARE YOU SURE YOU WANT TO DELETE THIS OPINION?')">

                    </div>
                </div>
                <br>



            </form>


         @endif

            @endauth
            <hr>
            @endforeach


            @if ($f_a_q_categorie->f_a_q_questions->isEmpty())
                    <div class="row">
                        <div class="col-md-12 text-center">
                            <p style="color: red;">THERE ARE STILL NO FAQs</p>
                        </div>
                    </div>
            @endif
            <br>
            @if(Auth::check() && Auth::user()->is_admin)
            <div class="row mb-0">
                <div class="col-md-6 offset-md-3 d-flex align-items-center justify-content-center">
                    <a href="{{ route('f_a_q_questions.create', ['f_a_q_categorie_id' => $f_a_q_categorie->id]) }}" class="btn btn-primary">
                        ADD FAQ
                    </a>
                </div>
            </div>

            @endif

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
