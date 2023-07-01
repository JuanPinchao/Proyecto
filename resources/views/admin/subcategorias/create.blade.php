@extends('layouts.plantilla')


@section('title')
    <h1>Crear Subcategoria</h1>
@endsection

@section('content')
    <div class="card">
        <div class="card-body">
            <form action="{{ route('subcategorias.store') }}" method="POST">
                @csrf
                <div class="mb-3 mt-3">
                    <label for="" class="form-label">NOMBRE</label>
                    <input type="text" class="form-control" id="nombre" name="nombre" required>
                </div>
                <label for="nombre" class="form-label">DESCRIPCION</label>
                <textarea class="form-control" id="descripcion" name="descripcion" required rows="4" cols="50"></textarea>
                <div class="mb-3 mt-3">
                    <label for="" class="form-label">CATEGORIA</label>
                    <select class="form-control" name="categoria">
                        @foreach ($categorias as $categoria)
                            <option value="{{ $categoria->id }}">{{ $categoria->nombre }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="mt-5">
                    <button type="submit" class="btn btn-success mr-2">GUARDAR</button>
                    <a href="{{ route('subcategorias.index') }}" class="btn btn-danger">CANCELAR</a>
                </div>

            </form>
        </div>
    </div>
@endsection
