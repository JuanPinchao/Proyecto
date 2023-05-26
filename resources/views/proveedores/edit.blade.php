@extends('layouts.plantilla')


@section('title')
    <h1>Editar Proveedor</h1>
@endsection

@section('content')

<form action="{{route('proveedores.update',$proveedor->id)}}" method="POST">
    @csrf
    @method('PUT')
    <div class="mb-3 mt-3">
        <label for="" class="form-label">NOMBRE</label>
        <input type="text" class="form-control" id="nombre" name="nombre" required  value="{{$proveedor->nombre}}">
    </div>
    <div class="mb-3 mt-3">
        <label for="" class="form-label">CIUDAD</label>
        <input type="text" class="form-control" id="ciudad" name="ciudad" required  value="{{$proveedor->ciudad}}">
    </div>
    <div class="mb-3 mt-3">
        <label for="" class="form-label">TELEFONO</label>
        <input type="number" class="form-control" id="telefono" name="telefono" required min="1" max="50" value="{{$proveedor->telefono}}">
    </div>
    <div class="mt-3">
        <label for="" class="form-label">DIRECCION</label>
        <input type="text" class="form-control" id="direccion" name="direccion" required value="{{$proveedor->direccion}}">
    </div>
    <div class="mt-3">
        <label for="" class="form-label" >CORREO ELECTRONICO</label>
        <input type="email" class="form-control" id="correo" name="correo" required" value="{{$proveedor->correo_electronico}}">
    </div>
    <div class="mt-5">
        <button type="submit" class="btn btn-success mr -4 ">GUARDAR</button>
        <a href="{{route('proveedores.index')}}" class="btn btn-danger">CANCELAR</a>
    </div>

  </form>

@endsection