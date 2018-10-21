<?php

namespace App\Http\Controllers\Admin;

use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

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
  }
  
  public function update(Request $request, User $user)
  {
  }
  
  public function destroy(User $user)
  {
  }
}