@extends('layouts.plantilla')

@section('title')
    <h1>PRODUCTOS</h1>
@endsection


@section('content')
    @can('productos.create')
        <a href="{{ route('productos.create') }}" class="btn btn-success mb-4">CREAR</a>
    @endcan

    <div class="card">
        <div class="card-body">
            <div class="container">
                <div class="row">
                    @foreach($productos as $producto)
                    <div class="col-md-4">
                        <div class="card mb-4">
                            <div class="card-body"><img src="{{ $producto->file }}" class="card-img-top" alt="{{ $producto->nombre }}" width="100px" height="200px"></div>
                            <div class="card-body">
                                <h4 class="card-title "><b>{{ $producto->nombre }}</b></h4>
                                <p class="card-text mt-5">{{ $producto->descripcion }}</p>
                                <p class="card-price">Precio: ${{ $producto->precio }}</p>
                                <p class="card-price">categoria: {{ $producto->cnombre }}</p>
                                <p class="card-price">subcategoria: {{ $producto->subnombre }}</p>
                                @can('productos.edit')
                                <a href="{{ route('productos.edit', $producto->id) }}"
                                    class="btn btn-primary btn-sm mr-3">EDITAR</a>
                            @endcan
                            @can('productos.destroy')
                                <span class="btn btn-danger btn-sm eliminar" data-id="{{$producto->id}}">ELIMINAR</span>
                            @endcan
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
@endsection

@section('js')
    <script>
        $('.eliminar').click(function() {

            var id = $(this).data('id');

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
                            );
                            $(`.eliminar[data-id=${id}]`).closest('.col-md-4').remove();
                            
                        },
                        error: function(respuesta) {
                            Swal.fire(
                                'Error',
                                'Error desconocido',
                                'error'
                            );
                        }
                    });
                }
            });
        });
    </script>

@endsection
