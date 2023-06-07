@extends('layouts.plantilla')


@section('title')
    <h1>Crear Producto</h1>
@endsection

@section('content')


<div class="card">
  <div class="card-body">
    <form action="{{ route('productos.store')}}" method="POST">
        @csrf
        <div class="mb-3 mt-3">
          <label for="" class="form-label">NOMBRE</label>
          <input type="text" class="form-control" id="nombre" name="nombre" required min="1" max="50">
        </div>

        <div class="mt-3">
          <label for="" class="form-label">CANTIDAD</label>
          <input type="number" class="form-control" id="cantidad" name="cantidad" required >
        </div>

        <div class="mt-3">
          <label for="" class="form-label" >PRECIO</label>
          <input type="number" class="form-control" id="precio" name="precio" required">
        </div>
        <div class="mb-3 mt-3">
          <label for="" class="form-label">CATEGORIA</label>
          <select onchange="cambiarOpciones()" class="form-control" id="categoria" name="categoria" required>
            <option value="" disabled selected>Selecciona una categoría</option>
          @foreach ($categorias as $categoria)       
              <option value="{{$categoria->id}}" required>{{$categoria->nombre}}</option> 
          @endforeach
          </select>
        </div>
        <div class="mb-3 mt-3">
          <label for="" class="form-label">SUBCATEGORIA</label>
          <select  class="form-control" id="subcategoria" name="subcategoria">
          </select>
        </div>
        <div class="mt-5">
          <button type="submit" class="btn btn-success mr-2">GUARDAR</button>
          <a href="{{route('productos.index')}}" class="btn btn-danger">CANCELAR</a>
      </div>
    </form>
  </div>
</div>


  <script>
    function cambiarOpciones() {
      var select1 = document.getElementById("categoria");
      var select2 = document.getElementById("subcategoria");
      
      var valorSeleccionado = select1.value;
      
      // Eliminar todas las opciones existentes del select2
      select2.innerHTML = "";
      
      // Generar nuevas opciones basadas en el valor seleccionado
      @foreach ($categorias as $categoria)
      if (valorSeleccionado === "{{$categoria->id}}") {
          @foreach ($subcategorias as $subcategoria)
            if ("{{ $categoria->id }}" === "{{ $subcategoria->categorias_id }}") {
              select2.add(new Option ("{{$subcategoria->nombre}}", "{{$subcategoria->id}}"));
            }
          @endforeach
      }
      @endforeach
    }
    </script>



@endsection


