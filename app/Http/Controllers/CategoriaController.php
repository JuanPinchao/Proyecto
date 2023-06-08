<?php

namespace App\Http\Controllers;

use App\Models\Categoria;
use Illuminate\Http\Request;

class CategoriaController extends Controller
{

    public function __construct()
    {
        $this->middleware('can:categorias.index')->only('index');
        $this->middleware('can:categorias.create')->only('create','store');
        $this->middleware('can:categorias.edit')->only('edit','update');
        $this->middleware('can:categorias.destroy')->only('destroy');
    }
    
    public function index()
    {
        $categorias = Categoria::where('estado',1)->get();
        return view(('admin.categorias.index'),compact('categorias'));
    }

    public function create()
    {
        return view('admin.categorias.create');
    }

    public function store(Request $request)
    {
        $categorias = new Categoria();
        $categorias->nombre = $request->input('nombre');
        $categorias->descripcion = $request->input('descripcion');
        $categorias->estado = 1;
        $categorias->save();

        return redirect(route('categorias.index'));

    }

    public function edit(string $id)
    {
        $categoria = Categoria::find($id);
        return view(('admin.categorias.edit'),compact('categoria'));
    }

    public function update(Request $request, string $id)
    {
        $categoria = Categoria::find($id);
        $categoria->nombre = $request->input('nombre');
        $categoria->descripcion = $request->input('descripcion');
        $categoria->save();

        return redirect(route('categorias.index'));
    }

    public function destroy(string $id)
    {
        $categoria = Categoria::find($id);
        $categoria->estado = 0;
        $categoria->save();
        return $resultado = "ok";
       
    }
}