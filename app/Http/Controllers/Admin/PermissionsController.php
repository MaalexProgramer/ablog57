<?php

namespace App\Http\Controllers\Admin;

use Spatie\Permission\Models\Permission;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PermissionsController extends Controller
{
	public function index()
	{
		return view('admin.permissions.index', [
			'permissions' => Permission::all()
		]);
	}

	public function edit(Permission $permission)
	{
		return view('admin.permissions.edit', [
			'permission' => $permission
		]);
	}

	public function update(Request $request, Permission $permission)
	{
		$data = $request->validate(['display_name' => 'required']);

		$permission->update($data);

		return redirect()->route('admin.permissions.index', $permission)->withFlash('El permiso ha sido actualizado');
	}
}