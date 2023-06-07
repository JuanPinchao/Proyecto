@extends('layouts.plantilla')

@section('title')
    <h1>USUARIOS</h1>
@endsection


@section('content')

<div class="card">
  <div class="card-body">
<table class="table table-dark table-striped" id="Table">
      <thead>
        <tr>
            <th scope="col">ROL</th>
            <th scope="col">NOMBRE</th>
            <th scope="col">CORREO</th>
            <th scope="col"></th>
        </tr>
      </thead>
      <tbody>

        @foreach ($users as $user)
        <tr>
            <td>{{$user->roles}}</td>
            <td>{{$user->name}}</td>
            <td>{{$user->email}}</td>
          <td>
            <a href="{{route('users.edit',$user->id)}}" class="btn btn-primary btn-sm mr-3">EDITAR</a>
          </td>
        </tr>
        @endforeach
        
      </tbody>
    </table>
</div>
</div>
    
@endsection

@section('js')
<script>
  $(document).ready( function () {
    $('#Table').DataTable();
  } );
</script>
@endsection