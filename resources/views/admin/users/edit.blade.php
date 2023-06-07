@extends('layouts.plantilla')
@section('title')
    <h1>Asignar Rol</h1>
@endsection

@section('content')

<div class="card">
    <div class="card-body">
        <form action="{{route('users.update',$user->id)}}" method="POST">
            @csrf
            @method('PUT')
            <div class="mb-3 mt-3">
                <label for="" class="form-label">NOMBRE</label>
                <input disabled selected type="text" class="form-control" id="name" name="name" value="{{$user->name}}">
            </div>
            <div class="mt-3">
                <label for="" class="form-label">CORREO</label>
                <input disabled selected type="text" class="form-control" id="email" name="email" value="{{$user->email}}">
            </div>
            <div class="mt-3">
                <label for="" class="form-label">ROL</label>
                <select class="form-control" id="rol" name="rol" required>
                    <option value="" disabled selected>Selecciona un rol</option>
                @foreach ($roles as $rol)       
                    <option value="{{$rol->id}}" required>{{$rol->name}}</option> 
                @endforeach
                </select>
            </div>
            <div class="mt-5">
                <button type="submit" class="btn btn-success mr-2">GUARDAR</button>
                <a href="{{route('users.index')}}" class="btn btn-danger">CANCELAR</a>
            </div>

        </form>
    </div>
</div>

@endsection