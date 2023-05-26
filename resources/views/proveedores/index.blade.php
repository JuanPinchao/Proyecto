@extends('layouts.plantilla')

@section('title')
    <h1>PROVEEDORES</h1>
@endsection


@section('content')

<a href="{{route('proveedores.create')}}" class="btn btn-success mb-4">CREAR</a>

<table class="table">
      <thead>
        <tr>
          <th scope="col">ID</th>
          <th scope="col">NOMBRE</th>
          <th scope="col">CIUDAD</th>
          <th scope="col">TELEFONO</th>
          <th scope="col">DIRECCION</th>
          <th scope="col">CORREO ELECTRONICO</th>
        </tr>
      </thead>
      <tbody>

        @foreach ($proveedores as $proveedor)
        <tr>
          <td>{{$proveedor->id}}</td>
          <td>{{$proveedor->nombre}}</td>
          <td>{{$proveedor->ciudad}}</td>
          <td>{{$proveedor->telefono}}</td>
          <td>{{$proveedor->direccion}}</td>
          <td>{{$proveedor->correo_electronico}}</td>
          <td>
            <form action="{{route('proveedores.destroy', $proveedor->id)}}" method="POST">
              @csrf
              @method('DELETE')
            <a href="{{route('proveedores.edit',$proveedor->id)}}" class="btn btn-primary btn-sm mr-3">EDITAR</a>
            <button type="submit" class="btn btn-danger btn-sm">ELIMINAR</button>
            </form>
          </td>
        </tr>
        @endforeach
        
      </tbody>
    </table>
  
    

@endsection
