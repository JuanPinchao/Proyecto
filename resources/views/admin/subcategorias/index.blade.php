@extends('layouts.plantilla')

@section('title')
    <h1>SUBCATEGORIAS</h1>
@endsection


@section('content')

<a href="{{route('subcategorias.create')}}" class="btn btn-success mb-4">CREAR</a>

<table class="table">
      <thead>
        <tr>
          <th scope="col">CATEGORIA</th>
          <th scope="col">NOMBRE</th>
          <th scope="col">DESCRIPCION</th>
          <th scope="col">ACCIONES</th>

        </tr>
      </thead>
      <tbody>

        @foreach ($subcategorias as $subcategoria)
        <tr>
          <td>{{$subcategoria->cnombre}}</td>
          <td>{{$subcategoria->nombre}}</td>
          <td>{{$subcategoria->descripcion}}</td>
          <td>
            <form  class="d-inline" action="{{route('subcategorias.destroy', $subcategoria->id)}}" method="POST">
              @csrf
              @method('DELETE')
            <a href="{{route('subcategorias.edit',$subcategoria->id)}}" class="btn btn-primary btn-sm">EDITAR</a>
            <button type="submit" class="btn btn-danger btn-sm mt-2">ELIMINAR</button>
          
            </form>
          </td>
        </tr>
        @endforeach
        
      </tbody>
    </table>
  
    

@endsection
