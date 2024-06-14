@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Edit Opinion</div>

                <div class="card-body">
                    {{-- <form method="POST" action="{{ route('f_a_q_questions.update', ['f_a_q_question' => $f_a_q_question->id]) }}" enctype="multipart/form-data"> --}}
                        <form method="POST" action="{{ route('f_a_q_questions.update', $f_a_q_question->id) }}" enctype="multipart/form-data">
                        @csrf


                        
                        @method('PUT')

                        <div class="row mb-3">
                            <label for="question" class="col-md-4 col-form-label text-md-end">Question</label>

                            <div class="col-md-6">
                                {{-- <input type="hidden" name="f_a_q_categorie" value="{{ $f_a_q_categorie->id }}"> --}}

                                <input id="question" type="text" class="form-control @error('question') is-invalid @enderror" name="question" value="{{ $f_a_q_question->question}}" required autofocus>

                                @error('question')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror

                            </div>
                        </div>



                        <div class="row mb-3">
                            <label for="answer" class="col-md-4 col-form-label text-md-end">Answer</label>

                            <div class="col-md-6">
                                <textarea id="answer" style="height: 200px; width: 100%;" class="form-control @error('answer') is-invalid @enderror" name="answer"  required autofocus>{{$f_a_q_question->answer}}</textarea>
                                @error('answer')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror

                            </div>
                        </div>




                        <div class="row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    Edit FAQ
                                </button>


                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
