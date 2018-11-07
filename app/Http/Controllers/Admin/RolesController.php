<?php

namespace App\Http\Controllers\Admin;

use Spatie\Permission\Models\Role;
use App\Http\Requests\SaveRolesRequest;
use Spatie\Permission\Models\Permission;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class RolesController extends Controller
{
	public function index()
	{
		$this->authorize('view', new Role);
		
		return view('admin.roles.index', [
			'roles' => Role::all()
		]);
	}

	public function create()
	{
		$this->authorize('create', $role = new Role);

		return view('admin.roles.create', [
			'role' => New Role,
			'permissions' => Permission::pluck('name', 'id')
		]);
	}

	public function store(SaveRolesRequest $request)
	{
/* 		$data = $request->validate([
			'name' => 'required|unique:roles',
			'display_name' => 'required'
		],[
				'name.required' => 'El campo identificador es obligatorio.',
				'name.unique' 	=> 'Este identificador ya ha sido registrado.',
				'display_name.required' => 'El campo nombre es obligatorio.'
			]
		); */

		$this->authorize('create', new Role);

		$role = Role::create($request->validated());

		if ($request->has('permissions'))
		{
			$role->givePermissionTo($request->permissions);
		}

		return redirect()->route('admin.roles.index')->withFlash('El role fue creado correctamente');
	}

	public function edit(Role $role)
	{
		$this->authorize('update', $role);

		return view('admin.roles.edit', [
			'role' => $role,
			'permissions' => Permission::pluck('name', 'id')
		]);
	}

	public function update(SaveRolesRequest $request, Role $role)
	{
		//'name' => 'required|unique:roles,name,' . $role->id,	//unico y que ignore el id que se esta

/* 		$data = $request->validate(['display_name' => 'required'],
			[
				'display_name.required' => 'El campo nombre es obligatorio.'
			]
		); */

		$this->authorize('update', $role);

		$role->update($request->validated());

		$role->permissions()->detach();		//Quitar los permisos

		if ($request->has('permissions')) {
			$role->givePermissionTo($request->permissions);
		}

		//return redirect()->route('admin.roles.edit', $role)->withFlash('El role fue actualizado correctamente');
		return redirect()->route('admin.roles.index')->withFlash('El role fue actualizado correctamente');
	}

	public function destroy(Role $role)
	{
		$this->authorize('delete', $role);

		$role->delete();

		return redirect()->route('admin.roles.index')->withFlash('El role fue eliminado');
	}
}