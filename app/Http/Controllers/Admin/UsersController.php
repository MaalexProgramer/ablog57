<?php

namespace App\Http\Controllers\Admin;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Spatie\Permission\Models\Role;
use App\Http\Controllers\Controller;
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
    return view('admin.users.edit', compact('user'));
  }
  
  public function update(Request $request, User $user)
  {
    $data = $request->validate([
      'name'  => 'required',
      'email' => ['required', Rule::unique('users')->ignore($user->id)]
    ]);

    $user->update($data);

    return redirect()->route('admin.users.edit', $user)->with('success', 'Usuario actualizado');
  }
  
  public function destroy(User $user)
  {
  }
}