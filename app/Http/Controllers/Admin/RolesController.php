<?php

namespace App\Http\Controllers\Admin;

use Spatie\Permission\Models\Role;
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

	public function store(Request $request)
	{
		$data = $request->validate([
			'name' => 'required|unique:roles',
			'guard_name' => 'required'
		]);

		$role = Role::create($data);

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

	public function update(Request $request, Role $role)
	{
		$data = $request->validate([
			'name' => 'required|unique:roles,name,' . $role->id,	//unico y que ignore el id que se esta editando
			'guard_name' => 'required'
		]);

		$role->update($data);

		$role->permissions()->detach();		//Quitar los permisos

		if ($request->has('permissions')) {
			$role->givePermissionTo($request->permissions);
		}

		return redirect()->route('admin.roles.edit', $role)->withFlash('El role fue actualizado correctamente');
	}

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
