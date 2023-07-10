<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Categoria;
use App\Models\Producto;
use App\Models\Subcategoria;

class ShopController extends Controller
{
    public function index()
    {
        $title = (object) [
            'nombre' => 'Todos los productos',
            'descripcion' => 'Aquí encontrarás todos nuestros productos en un solo lugar. 
            Navega a través de nuestra amplia selección y descubre lo que tenemos para ofrecerte. 
            Desde ropa de moda hasta dispositivos electrónicos de última generación, 
            ¡lo tenemos todo! Explora nuestras categorías y encuentra exactamente lo que estás buscando. 
            No esperes más, ¡comienza a explorar y encuentra tus productos favoritos ahora mismo!',
        ];
        $categorias = Categoria::with('subcategorias')->where('estado','1')->get();
        $productos = Producto::select('productos.*')->where('estado','1')->get();
        return view('ecommerce.shop',compact('categorias','productos','title'));
    }

    public function showSubcategoria(string $id)
    {
        $title = Subcategoria::find($id);
        $productos = Producto::select('productos.*')
                            ->where('estado','1')
                            ->where('subcategorias_id',$id)->get();
        $categorias = Categoria::with('subcategorias')->where('estado','1')->get();
        return view('ecommerce.shop',compact('categorias','productos','title'));
    }

    public function showCategoria(string $id){
        $title = Categoria::find($id);
        $productos = Producto::select('productos.*')
                            ->where('estado','1')
                            ->where('categorias_id',$id)->get();
        $categorias = Categoria::with('subcategorias')->where('estado','1')->get();
        return view('ecommerce.shop',compact('categorias','productos','title'));

    }

}
