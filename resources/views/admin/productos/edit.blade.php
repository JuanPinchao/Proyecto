@extends('layouts.plantilla')


@section('title')
    <h1>Editar Producto</h1>
@endsection

@section('content')
    <div class="card">
        <div class="card-body">
            <form action="{{ route('productos.update', $producto->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="mb-3 mt-3">
                    <label for="nombre" class="form-label">NOMBRE</label>
                    <input type="text" class="form-control" id="nombre" name="nombre" required value="{{ $producto->nombre }}">
                </div>
                <div class="mb-3 mt-3">
                    <label for="nombre" class="form-label">DESCRIPCION</label>
                    <textarea class="form-control" id="descripcion" name="descripcion" required rows="4" cols="50">{{ $producto->descripcion}}</textarea>
                </div>
                <div class="mt-3">
                    <label for="precio" class="form-label">PRECIO</label>
                    <input type="number" class="form-control" id="precio" name="precio" required
                        value="{{ $producto->precio }}">
                </div>
                <div class="mt-3">
                    <label for="cantidad" class="form-label">CANTIDAD</label>
                    <input type="number" class="form-control" id="cantidad" name="cantidad" required
                        value="{{ $producto->cantidad }}">
                </div>
                <div class="mb-3 mt-3">
                    <label for="categoria" class="form-label">CATEGORIA</label>
                    <select onchange="opciones()" class="form-control" id="categoria" name="categoria">
                        @foreach ($categorias as $categoria)
                            <option value="{{ $categoria->id }}"
                                {{ $categoria->id === $producto->categorias_id ? 'selected' : '' }}>{{ $categoria->nombre }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <div>
                    <label for="subcategoria" class="form-label">Subcategoria</label>
                    <select class="form-control" id="subcategoria" name="subcategoria">
                        @foreach ($subcategorias as $subcategoria)
                            <option value="{{ $subcategoria->id }}"
                                {{ $subcategoria->id === $producto->subcategorias_id ? 'selected' : '' }}>
                                {{ $subcategoria->nombre }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <div class="mb-3 mt-3">
                    <label class="form-label">FOTO DE PRODUCTO</label>
                    <input id="file" type="file" class="form-control" name="file" accept="image/*">
                </div>
                

                <div class="mt-5">
                    <button type="submit" class="btn btn-success mr -4">GUARDAR</button>
                    <a href="{{ route('productos.index') }}" class="btn btn-danger">CANCELAR</a>
                </div>
            </form>
        </div>
    </div>
    <script>
        function opciones() {
            var categoriaSelect = document.getElementById("categoria");
            var subcategoriaSelect = document.getElementById("subcategoria");
            var categoriaid = categoriaSelect.value;

            subcategoriaSelect.innerHTML = "";

            @foreach ($categorias as $categoria)
                if ("{{ $categoria->id }}" === categoriaid) {
                    @foreach ($subcategorias as $subcategoria)
                        if ("{{ $categoria->id }}" === "{{ $subcategoria->categorias_id }}") {
                            var option = document.createElement("option");
                            option.value = "{{ $subcategoria->id }}";
                            option.text = "{{ $subcategoria->nombre }}";
                            option.selected = "{{ $subcategoria->id }}" === "{{ $producto->subcategorias_id }}";
                            subcategoriaSelect.appendChild(option);
                        }
                    @endforeach
                }
            @endforeach
        }
    </script>
@endsection
