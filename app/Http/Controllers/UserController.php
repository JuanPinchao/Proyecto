<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Spatie\Permission\Models\Role;

class UserController extends Controller
{

    public function __construct()
    {
        $this->middleware('can:users.index');
    }

    public function index()
    {
        $users = User::select('roles.name as roles','users.*')
                    ->join('model_has_roles','model_has_roles.model_id','users.id')
                    ->join('roles','roles.id','model_has_roles.role_id')
                    ->get();
        return view('admin.users.index',compact('users'));
    }
  
    public function edit(string $id)
    {
        $roles = Role::all();
        $user = User::find($id);
        return view('admin.users.edit',compact('user','roles'));
    }

    public function update(Request $request, string $id)
    {
        $user = User::find($id);
        $user->roles()->sync($request->rol);

        return redirect(Route('users.index'));
    }

}
