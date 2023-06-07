@extends('layouts.plantilla')

@section('title')
    <h1>PRODUCTOS</h1>
@endsection


@section('content')

<a href="{{route('productos.create')}}" class="btn btn-success mb-4">CREAR</a>

<div class="card">
  <div class="card-body">
<table class="table table-dark table-striped" id="Table">
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
            <a href="{{route('productos.edit',$producto->id)}}" class="btn btn-primary btn-sm mr-3">EDITAR</a>
            <input type="hidden" value="{{$producto->id}}">
            <span class="btn btn-danger btn-sm eliminar">ELIMINAR</span>
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

      $('.eliminar').click(function() {

        tabla = $('#Table').DataTable();
        fila = $(this);


        Swal.fire({
          title: 'Estas seguro?',
          text: "Esta accion no se puede deshacer",
          icon: 'warning',
          showCancelButton: true,
          confirmButtonColor: '#3085d6',
          cancelButtonColor: '#d33',
          confirmButtonText: 'Si, borrar!'
        }).then((result) => {
            if (result.isConfirmed) {

              let id = $(this).closest('td').find('input[type=hidden]').val();
      

              $.ajax({
                    type: 'DELETE',
                    url: "{{ route('productos.destroy', ':id') }}".replace(':id', id),
                    data: {
                        _token: '{{ csrf_token() }}'
                    },
                    success: function(respuesta) {    
                        Swal.fire(
                            'Éxito',
                            'Cambios efectuados correctamente',
                            'success'
                        )
                        tabla.row(fila.parents('tr')).remove().draw();
                        
                    },
                    error: function(respuesta) {
                        Swal.fire(
                            'Error',
                            'Error desconocido',
                            'error'
                        )
                    }
                });
            }
        })
      });
  </script>

  <script>
    $(document).ready( function () {
      $('#Table').DataTable();
    } );
  </script>


@endsection







