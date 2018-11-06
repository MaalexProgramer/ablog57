<?php

namespace App\Http\Controllers\Admin;

use App\User;
use Illuminate\Http\Request;
use App\Events\UserWasCreated;
use Spatie\Permission\Models\Role;
use App\Http\Controllers\Controller;
use App\Http\Requests\UpdateUserRequest;
use Spatie\Permission\Models\Permission;

class UsersController extends Controller
{
  public function index()
  {
		$users = User::get();

    return view('admin.users.index', compact('users'));
  }

  public function create()
  {
		$user = new User;

		$this->authorize('create', $user);

    $roles = Role::with('permissions')->get();
    $permissions = Permission::pluck('name', 'id');

    return view('admin.users.create', compact('user', 'roles', 'permissions'));

  }

  public function store(Request $request)
  {
		$this->authorize('create', new User);

    $data = $request->validate([
      'name' => 'required|max:255',
      'email' => 'required|email|max:255|unique:users',
    ]);

    // Generar una contraseña
    $data['password'] = str_random(8);

    // Creamos el usuario
    $user = User::create($data);

    // Asignamos los roles
    if($request->filled('roles'))
    {
      $user->assignRole($request->roles);
    }

    // Asignamos los permisos
    if ($request->filled('permissions'))
    {
      $user->givePermissionTo($request->permissions);
    }

    // Enviamos el email
    UserWasCreated::dispatch($user, $data['password']);

    // Regresamos al usuario
    return redirect()->route('admin.users.index')->with('success', 'El usuario ha sido creado');
  }

  public function show(User $user)
  {
		$this->authorize('view', $user);

    return view('admin.users.show', compact('user'));
  }

  public function edit(User $user)
  {
		$this->authorize('update', $user);

    $roles = Role::with('permissions')->get();
    $permissions = Permission::pluck('name', 'id');

    return view('admin.users.edit', compact('user', 'roles', 'permissions'));
  }

  public function update(UpdateUserRequest $request, User $user)
  {
/*     $data = $request->validate([
      'name'  => 'required',
      'email' => ['required', Rule::unique('users')->ignore($user->id)]
    ]); */
/*     $rules = [
      'name'  => 'required',
      'email' => ['required', Rule::unique('users')->ignore($user->id)]
    ];

    if($request->filled('password'))
    {
      $rules['password'] = ['confirmed', 'min:6'];
		} */

		$this->authorize('update', $user);

    $user->update( $request->validated() );

		return redirect()->route('admin.users.edit', $user)->withFlash('Usuario actualizado');
  }

  public function destroy(User $user)
  {
		$this->authorize('delete', $user);

		$user->delete();

		return redirect()->route('admin.users.index')->withFlash('Usuario eliminado');
  }
}