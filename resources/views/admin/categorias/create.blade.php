@extends('layouts.plantilla')


@section('title')
    <h1>Crear Categorias</h1>
@endsection

@section('content')


<div class="card">
  <div class="card-body">
    <form action="{{ route('categorias.store')}}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="mb-3 mt-3">
          <label for="" class="form-label">NOMBRE</label>
          <input type="text" class="form-control" id="nombre" name="nombre" required min="1" max="50">
        </div>
        <div class="mb-3 mt-3">
          <label for="nombre" class="form-label">DESCRIPCION</label>
          <textarea class="form-control" id="descripcion" name="descripcion" required rows="4" cols="50"></textarea>
      </div>
        <div class="mb-3 mt-3">
          <label class="form-label">FOTO DE PRODUCTO</label>
          <input id="file" type="file" class="form-control" name="file" required accept="image/*">
        </div>
        <div class="mt-5">
            <button type="submit" class="btn btn-success mr-2">GUARDAR</button>
            <a href="{{route('categorias.index')}}" class="btn btn-danger">CANCELAR</a>
        </div>
      </form>
  </div>
</div>

@endsection