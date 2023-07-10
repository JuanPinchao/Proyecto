<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Producto;
use App\Models\Categoria;

class IndexController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $productos = Producto::orderBy('created_at', 'desc')->take(3)->where('estado','1')->get();
        $categorias = Categoria::select('categorias.*')->whereIn('nombre', ['accesorios', 'relojes', 'zapatos'])->where('estado','1')->get();
        $productos2 = Producto::orderBy('precio', 'desc')->take(3)->where('estado','1')->get();
        return view('ecommerce.index',compact('productos','categorias','productos2'));
    }

    public function show(string $id)
    {
        $producto = Producto::find($id);
        return view('ecommerce.show', compact('producto'));
    }
    
}

