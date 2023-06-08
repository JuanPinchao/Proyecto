@extends('layouts.plantilla')

@section('title')
    <h1>SUBCATEGORIAS</h1>
@endsection


@section('content')

@can('subcategorias.create')
  <a href="{{route('subcategorias.create')}}" class="btn btn-success mb-4">CREAR</a>
@endcan


<div class="card">
  <div class="card-body">
    <table class="table table-dark table-striped" id="Table">
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
            @can('subcategorias.edit')
              <a href="{{route('subcategorias.edit',$subcategoria->id)}}" class="btn btn-primary btn-sm">EDITAR</a>
            @endcan
            @can('subcategorias.destroy')
              <input type="hidden" value="{{$subcategoria->id}}">
              <span class="btn btn-danger btn-sm eliminar">ELIMINAR</span>
            @endcan
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
                    url: "{{ route('subcategorias.destroy', ':id') }}".replace(':id', id),
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