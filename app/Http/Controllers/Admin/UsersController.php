<?php

namespace App\Http\Controllers\Admin;

use App\User;
use Illuminate\Http\Request;
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
  }
  
  public function store(Request $request)
  {
  }
  
  public function show(User $user)
  {
    return view('admin.users.show', compact('user'));
  }
  
  public function edit(User $user)
  {
    $roles = Role::pluck('name', 'id');

    return view('admin.users.edit', compact('user', 'roles'));
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

    $user->update( $request->validated() );

    return back()->with('success', 'Usuario actualizado');
  }
  
  public function destroy(User $user)
  {
  }
}