@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Admin Panel</div>

                    <div class="card-body">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>Username</th>
                                    <th>Is Admin?</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($users as $user)
                                    <tr>
                                        <td>{{ $user->username }}</td>
                                        <td>
                                            @if ($user->is_admin)
                                                Yes
                                            @else
                                                No
                                            @endif
                                        </td>
                                        <td>
                                            <form method="POST" action="{{ route('admin.update', $user->id) }}">
                                                @csrf
                                                @method('PUT')
                                                <input type="hidden" name="is_admin" value="{{ $user->is_admin ? 0 : 1 }}">
                                                <button type="submit" class="btn btn-primary">
                                                    {{ $user->is_admin ? 'Remove Admin' : 'Make Admin' }}
                                                </button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach

       



                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
