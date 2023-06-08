<?php

namespace App\Http\Controllers;

use App\Models\Categoria;
use Illuminate\Http\Request;
use App\Models\Subcategoria;

class SubcategoriasController extends Controller
{

    public function __construct()
    {
        $this->middleware('can:subcategorias.index')->only('index');
        $this->middleware('can:subcategorias.create')->only('create','store');
        $this->middleware('can:subcategorias.edit')->only('edit','update');
        $this->middleware('can:subcategorias.destroy')->only('destroy');
    }

    public function index()
    {
        $subcategorias = Subcategoria::select('c.nombre as cnombre','subcategorias.*')
                                        ->join('categorias as c','subcategorias.categorias_id','c.id')
                                        ->where('subcategorias.estado',1)->get();
        return view(('admin.subcategorias.index'),compact('subcategorias'));
    }

    public function create()
    {
        $categorias = Categoria::where('estado',1)->get();
        return view('admin.subcategorias.create',compact('categorias'));
    }

    public function store(Request $request)
    {
        $subcategorias = new Subcategoria();
        $subcategorias->nombre = $request->input('nombre');
        $subcategorias->descripcion = $request->input('descripcion');
        $subcategorias->categorias_id = $request->input('categoria');
        $subcategorias->estado = 1;
        $subcategorias->save();

        return redirect(route('subcategorias.index'));
    }

    public function edit(string $id)
    {
        $categorias = Categoria::where('estado',1)->get();
        $subcategoria = Subcategoria::find($id);
        return view(('admin.subcategorias.edit'),compact('subcategoria','categorias'));
    }

    public function update(Request $request, string $id)
    {
        $subcategoria = Subcategoria::find($id);
        $subcategoria->nombre = $request->input('nombre');
        $subcategoria->descripcion = $request->input('descripcion');
        $subcategoria->categorias_id = $request->input('categoria');
        $subcategoria->save();

        return redirect(route('subcategorias.index'));
    }

    public function destroy(string $id)
    {
        $subcategoria = Subcategoria::find($id);
        $subcategoria->estado = 0;
        $subcategoria->save();

        return $respuesta = "ok";
    }
}
