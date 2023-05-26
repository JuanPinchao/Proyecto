@extends('layouts.plantilla')


@section('title')
    <h1>Crear Proveedor</h1>
@endsection

@section('content')

<form action="{{ route('proveedores.store')}}" method="POST">
    @csrf
    <div class="mb-3 mt-3">
        <label for="" class="form-label">NOMBRE</label>
        <input type="text" class="form-control" id="nombre" name="nombre" required>
    </div>
    <div class="mb-3 mt-3">
        <label for="" class="form-label">CIUDAD</label>
        <input type="text" class="form-control" id="ciudad" name="ciudad" required>
    </div>
    <div class="mb-3 mt-3">
        <label for="" class="form-label">TELEFONO</label>
        <input type="number" class="form-control" id="telefono" name="telefono" required>
    </div>
    <div class="mt-3">
        <label for="" class="form-label">DIRECCION</label>
        <input type="text" class="form-control" id="direccion" name="direccion" required>
    </div>
    <div class="mt-3">
        <label for="" class="form-label" >CORREO ELECTRONICO</label>
        <input type="email" class="form-control" id="correo" name="correo" required>
    </div>
    <div class="mt-5">
        <button type="submit" class="btn btn-success mr -4 ">GUARDAR</button>
        <a href="{{route('proveedores.index')}}" class="btn btn-danger">CANCELAR</a>
    </div>

  </form>

@endsection