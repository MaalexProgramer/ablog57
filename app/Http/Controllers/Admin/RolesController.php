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
		return view('admin.roles.index', [
			'roles' => Role::all()
		]);
	}

	public function create()
	{
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

		$role = Role::create($request->validated());

		if ($request->has('permissions'))
		{
			$role->givePermissionTo($request->permissions);
		}

		return redirect()->route('admin.roles.index')->withFlash('El role fue creado correctamente');
	}

    public function show($id)
    {
        //
    }

	public function edit(Role $role)
	{
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
		if ($role->id === 1)
		{
			throw new \Illuminate\Auth\Access\AuthorizationException('No se puede eliminar este rol.');
		};

		$role->delete();

		return redirect()->route('admin.roles.index')->withFlash('El role fue eliminado');
	}
}