<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class UpdateProfile extends Controller
{
  
    public function update(Request $request, string $id)
    {
        $user = User::find($id);
    
        $request->validate([
            'name' => 'required|min:3|max:50',
            'email' => 'required|email|unique:users,email,'.$user->id,
            'file' => 'nullable|mimes:jpeg,png|max:2048',
        ],[
            'name.required' => 'El nombre es obligatorio.',
            'name.min' => 'El nombre debe tener al menos :min caracteres.',
            'name.max' => 'El nombre no debe exceder los :max caracteres.',
            'email.required' => 'El correo electrónico es obligatorio.',
            'email.email' => 'El correo electrónico no es válido.',
            'email.unique' => 'El correo electrónico ya está en uso.',
            'file.mimes' => 'El archivo debe ser una imagen en formato JPEG o PNG.',
            'file.max' => 'El tamaño máximo del archivo es :max kilobytes.',
        ]);
    
        $user->name = $request->input('name');
        $user->email = $request->input('email');
    
        if ($request->hasFile('file')) {
            $name = $request->file('file')->getClientOriginalName();
            $destination = "img";
            $filename = $request->file('file')->move($destination, $name);
            $user->file = $filename;
        }
    
        $user->save();
    
        return redirect(route('profile.index'))->with('success', 'Perfil actualizado exitosamente.');
    }
    

    public function destroy(string $id)
    {
        //
    }
}
