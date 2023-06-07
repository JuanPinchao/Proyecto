@extends('layouts.plantilla')

@section('title')
    <h1>CATEGORIAS</h1>
@endsection


@section('content')

<a href="{{route('categorias.create')}}" class="btn btn-success mb-4" >CREAR</a>

<div class="card">
<div class="card-body">
<table class="table table-dark table-striped" id="Table" >
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
            <a href="{{route('categorias.edit',$categoria->id)}}" class="btn btn-primary btn-sm mr-3" >EDITAR</a>
            <input type="hidden" value="{{$categoria->id}}">
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
                    url: "{{ route('categorias.destroy', ':id') }}".replace(':id', id),
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


  









