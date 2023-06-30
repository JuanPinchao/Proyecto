<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Producto;
use App\Models\Categoria;
use App\Models\Subcategoria;
use Spatie\LaravelIgnition\Solutions\SolutionProviders\RunningLaravelDuskInProductionProvider;

class ProductoController extends Controller
{

    public function __construct()
    {
        $this->middleware('can:productos.index')->only('index');
        $this->middleware('can:productos.create')->only('create','store');
        $this->middleware('can:productos.edit')->only('edit','update');
        $this->middleware('can:productos.destroy')->only('destroy');
    }

    public function index()
    {
        $productos = Producto::select('c.nombre as cnombre','sub.nombre as subnombre','productos.*')
                                ->join('categorias as c','productos.categorias_id','c.id')
                                ->join('subcategorias as sub','productos.subcategorias_id','sub.id')
                                ->where('productos.estado',1)->get();
        return view(('admin.productos.index'),compact('productos'));
    }

    public function create()
    {

        $categorias = Categoria::where('categorias.estado',1)->get();
        $subcategorias = Subcategoria::where('subcategorias.estado',1)->get();

        return view('admin.productos.create',compact('categorias','subcategorias'));
    }

    public function store(Request $request)
    {

        $name = $request['file']->getClientOriginalName();
        $destino = "img";
        $filename = $request['file']->move($destino, $name);

        $productos = new Producto();
        $productos->nombre = $request->input('nombre');
        $productos->cantidad = $request->input('cantidad');
        $productos->precio = $request->input('precio');
        $productos->categorias_id = $request->input('categoria');
        $productos->subcategorias_id = $request->input('subcategoria');
        $productos->file = $filename;
        $productos->estado = 1;
        $productos->save();

        return redirect(route('productos.index'));

    }

    public function edit(string $id)
    {
        $categorias = Categoria::where('categorias.estado',1)->get();
        $subcategorias = Subcategoria::where('subcategorias.estado',1)->get();
        $producto = Producto::find($id);
        return view(('admin.productos.edit'),compact('producto','categorias','subcategorias'));
    }

    public function update(Request $request, string $id)
    {
        
        $producto = Producto::find($id);
        $producto->nombre = $request->input('nombre');
        $producto->cantidad = $request->input('cantidad');
        $producto->precio = $request->input('precio');
        $producto->categorias_id = $request->input('categoria');
        $producto->subcategorias_id = $request->input('subcategoria');

        if ($request->hasFile('file')) {
            $name = $request->file('file')->getClientOriginalName();
            $destino = "img";
            $filename = $request->file('file')->move($destino, $name);
            $producto->file = $filename;
        }

        $producto->save();

        return redirect(route('productos.index'));
    }
    
    public function destroy(string $id)
    {
        $producto = Producto::find($id);
        $producto->estado = 0;
        $producto->save();
        return $respuesta = "ok";
    }
}
