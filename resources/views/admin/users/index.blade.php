@extends('layouts.plantilla')

@section('title')
    <h1>USUARIOS</h1>
@endsection


@section('content')
    <div class="card">
        <div class="card-body">
            <div class="row justify-content-center">
                @foreach ($users as $user)
                    <div class="col-md-4 mb-4">
                        <div class="card">
                            <div class="card-body">
                                <div class="user-card text-center">
                                    <img src="{{ $user->file }}" class="rounded-circle user-photo" alt="{{ $user->name }}">
                                    <h4 class="user-name mt-3">{{ $user->name }}</h4>
                                    <a href="{{ route('users.edit', $user->id) }}"
                                        class="btn btn-primary btn-sm mt-2">CAMBIAR ROL</a>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach

            </div>
        </div>
    </div>
@endsection


<style>
    .user-photo {
        width: 150px;
        height: 160px;
        object-fit: cover;
    }
</style>
