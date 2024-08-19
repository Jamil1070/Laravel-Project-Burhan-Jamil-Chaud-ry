@extends('layouts.app')

@section('title', 'HOME')

@section('content')
<br>

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card border-primary shadow-sm">
                <div class="card-header bg-primary text-white">
                    <h4 class="mb-0"><strong>Frequently Asked Questions</strong></h4>
                </div>

                <div class="card-body">
                    @if(session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif

                    <div class="text-center mb-4">
                        <h1 class="text-purple">Category: <strong>{{ $f_a_q_categorie->name }}</strong></h1>
                    </div>

                    @auth
                        @if(Auth::user()->is_admin)
                            <div class="text-center mb-4">
                                <a href="{{ route('f_a_q_categories.edit', $f_a_q_categorie->id) }}">
                                    <img src="{{ asset('photos/edit.png') }}" style="width: 24px;" alt="Edit Category">
                                </a>
                            </div>

                            <form method="post" action="{{ route('f_a_q_categories.destroy', $f_a_q_categorie->id) }}" onsubmit="return confirm('Are you sure you want to delete this category?')">
                                @csrf
                                @method('DELETE')

                                <div class="row mb-4">
                                    <div class="col-md-6 offset-md-3 d-flex align-items-center justify-content-center">
                                        <input type="submit" value="DELETE CATEGORY" class="btn btn-danger" style="border: 1px solid black;">
                                    </div>
                                </div>
                            </form>
                        @endif
                    @endauth

                    <hr>

                    @forelse ($f_a_q_questions as $f_a_q_question)
                        <div class="mb-4 p-3 border rounded shadow-sm">
                            <h5><strong>Q: "{{ $f_a_q_question->question }}"</strong></h5>
                            <p class="mt-2"><strong>A: {{ $f_a_q_question->answer }}</strong></p>

                            @auth
                                @if(Auth::user()->is_admin)
                                    <div class="mt-3">
                                        <a href="{{ route('f_a_q_questions.edit', ['f_a_q_question' => $f_a_q_question->id]) }}">
                                            <img src="{{ asset('photos/edit.png') }}" style="width: 24px;" alt="Edit FAQ">
                                        </a>

                                        <form method="post" action="{{ route('f_a_q_questions.destroy', $f_a_q_question->id) }}" class="d-inline" onsubmit="return confirm('Are you sure you want to delete this FAQ?')">
                                            @csrf
                                            @method('DELETE')
                                            <input type="submit" value="DELETE FAQ" class="btn btn-danger btn-sm" style="border: 1px solid black; margin-left: 10px;">
                                        </form>
                                    </div>
                                @endif
                            @endauth
                        </div>
                        <hr>
                    @empty
                        <div class="text-center">
                            <p class="text-danger">There are still no FAQs.</p>
                        </div>
                    @endforelse

                    @auth
                        @if(Auth::user()->is_admin)
                            <div class="row mb-4">
                                <div class="col-md-6 offset-md-3 d-flex align-items-center justify-content-center">
                                    <a href="{{ route('f_a_q_questions.create', ['f_a_q_categorie_id' => $f_a_q_categorie->id]) }}" class="btn btn-primary">
                                        ADD FAQ
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
