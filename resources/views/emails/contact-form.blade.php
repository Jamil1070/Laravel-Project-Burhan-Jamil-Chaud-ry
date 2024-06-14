@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Contact us</div>

                <div class="card-body">

                    <ul>
                        <li><strong>Name:</strong> {{ $formData['name'] }}</li>
                        <li><strong>Email:</strong> {{ $formData['email'] }}</li>
                        <li><strong>Message:</strong> {{ $formData['message'] }}</li>
                    </ul>

                    <p>Thank your for contacting with us</p>

                        {{-- <div class="row mb-3">
                            <label for="title" class="col-md-4 col-form-label text-md-end">Title</label>

                            <div class="col-md-6">
                                <input id="titel" type="text" class="form-control @error('title') is-invalid @enderror" name="title" value="{{ old('title') }}" required autofocus>

                                @error('title')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror

                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="message" class="col-md-4 col-form-label text-md-end">Content</label>

                            <div class="col-md-6">
                                <textarea id="message" style="height: 200px; width: 100%;" class="form-control @error('message') is-invalid @enderror" name="message" value="{{ old('message') }}" required autofocus></textarea>
                                @error('message')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror

                            </div>
                        </div> --}}




                        {{-- <div class="row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    Add Post
                                </button>


                            </div>
                        </div> --}}
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
