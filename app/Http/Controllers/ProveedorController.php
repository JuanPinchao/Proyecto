<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Proveedor;

class ProveedorController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $proveedores = Proveedor::all();
        return view(('proveedores.index'),compact('proveedores'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('proveedores.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $proveedores = new Proveedor();
        $proveedores->nombre = $request->input('nombre');
        $proveedores->ciudad = $request->input('ciudad');
        $proveedores->telefono = $request->input('telefono');
        $proveedores->direccion = $request->input('direccion');
        $proveedores->correo_electronico = $request->input('correo');
        $proveedores->save();

        return redirect(route('proveedores.index'));
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {   
        $proveedor = Proveedor::find($id);
        return view(('proveedores.edit'),compact('proveedor'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $proveedores = Proveedor::find($id);
        $proveedores->nombre = $request->input('nombre');
        $proveedores->ciudad = $request->input('ciudad');
        $proveedores->telefono = $request->input('telefono');
        $proveedores->direccion = $request->input('direccion');
        $proveedores->correo_electronico = $request->input('correo');
        $proveedores->save();

        return redirect(route('proveedores.index'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $proveedor = Proveedor::find($id);
        $proveedor->delete();
        return redirect(route('proveedores.index'));
    }
}
