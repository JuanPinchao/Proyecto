@extends('layouts.plantilla')

@section('title')
    <h1>PRODUCTOS</h1>
@endsection


@section('content')

<a href="{{route('productos.create')}}" class="btn btn-success mb-4">CREAR</a>

<table class="table">
      <thead>
        <tr>
          <th scope="col">NOMBRE</th>
          <th scope="col">CANTIDAD</th>
          <th scope="col">PRECIO</th>
          <th scope="col">CATEGORIA</th>
          <th scope="col">SUBCATEGORIA</th>
          <th scope="col">ACCIONES</th>
        </tr>
      </thead>
      <tbody>

        @foreach ($productos as $producto)
        <tr>
          <td>{{$producto->nombre}}</td>
          <td>{{$producto->cantidad}}</td>
          <td>{{$producto->precio}}</td>
          <td>{{$producto->cnombre}}</td>
          <td>{{$producto->subnombre}}</td>
          <td>
            <form action="{{route('productos.destroy', $producto->id)}}" method="POST">
              @csrf
              @method('DELETE')
            <a href="{{route('productos.edit',$producto->id)}}" class="btn btn-primary btn-sm mr-3">EDITAR</a>
            <button type="submit" class="btn btn-danger btn-sm">ELIMINAR</button>
            </form>
          </td>
        </tr>
        @endforeach
        
      </tbody>
    </table>
  
    

@endsection









