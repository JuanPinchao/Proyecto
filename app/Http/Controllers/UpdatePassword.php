<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UpdatePassword extends Controller
{
 
   public function update(Request $request, string $id)
    {
        $user = User::find($id);

        $request->validate([
            'password' => 'required|min:8|confirmed',
            'password_confirmation' => 'required|min:8',
        ], [
            'password.required' => 'La contraseña es obligatoria.',
            'password.min' => 'La contraseña debe tener al menos :min caracteres.',
            'password.confirmed' => 'Las contraseñas no coincide.',
            'password_confirmation.required' => 'La confirmación de contraseña es obligatoria.',
            'password_confirmation.min' => 'La confirmación de contraseña debe tener al menos :min caracteres.',
        ]);

        $user->password = Hash::make($request->input('password'));
        $user->save();

        return redirect(route('profile.index'))->with('success2', 'Contraseña actualizada exitosamente.');
    }
}

