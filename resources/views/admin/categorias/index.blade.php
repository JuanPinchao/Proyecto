@extends('layouts.plantilla')

@section('title')
    <h1>CATEGORIAS</h1>
@endsection


@section('content')

<a href="{{route('categorias.create')}}" class="btn btn-success mb-4">CREAR</a>

<table class="table">
      <thead>
        <tr>
          <th scope="col">NOMBRE</th>
          <th scope="col">DESCRIPCION</th>
          <th scope="col">ACCIONES</th>
        </tr>
      </thead>
      <tbody>

        @foreach ($categorias as $categoria)
        <tr>
          <td>{{$categoria->nombre}}</td>
          <td>{{$categoria->descripcion}}</td>
          <td>
            <form action="{{route('categorias.destroy', $categoria->id)}}" method="POST">
              @csrf
              @method('DELETE')
            <a href="{{route('categorias.edit',$categoria->id)}}" class="btn btn-primary btn-sm mr-3" >EDITAR</a>
            <button type="submit" class="btn btn-danger btn-sm mt-2">ELIMINAR</button>
            </form>
          </td>
        </tr>
        @endforeach
        
      </tbody>
    </table>
  
    

@endsection









