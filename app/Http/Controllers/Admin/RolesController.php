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
			'name' => 'required',
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

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
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
