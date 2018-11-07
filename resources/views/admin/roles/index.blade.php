@extends('admin.layout')

@section('header')
  <h1>
    Roles
    <small>Listado</small>
  </h1>
  <ol class="breadcrumb">
    <li><a href="{{ route('dashboard') }}"><i class="fa fa-dashboard"></i> Inicio</a></li>
    <li class="active">Roles</li>
  </ol>
@endsection

@section('content')
  <div class="box box-primary">
    <div class="box-header">
      <h3 class="box-title">Listado de Roles</h3>
      <a href="{{ route('admin.roles.create') }}" class="btn btn-primary pull-right">
          <i class="fa fa-plus"></i>  Crear Rol
      </a>
    </div>

    <div class="box-body">
      <table id="roles-table" class="table table-bordered table-striped">
        <thead>
          <tr>
            <th>ID</th>
            <th>Identificador</th>
            <th>Nombre</th>
            <th>Permisos</th>
            <th>Acciones</th>
          </tr>
        </thead>
        <tbody>
          @foreach ($roles as $role)
            <tr>
              <td>{{ $role->id }}</td>
              <td>{{ $role->name }}</td>
              <td>{{ $role->display_name }}</td>
              <td>{{ $role->permissions->pluck('display_name')->implode(', ') }}</td>
              <td>
                <a href="{{ route('admin.roles.edit', $role) }}" class="btn btn-xs btn-info">
                  <i class="fa fa-pencil"></i>
								</a>
								@if ($role->id !== 1)
									<form method="POST" action="{{ route('admin.roles.destroy', $role) }}" style="display: inline">
										@csrf @method('DELETE')

										<button class="btn btn-xs btn-danger" onclick="return confirm('¿Estás seguro de querer eliminar esta usuario?')">
											<i class="fa fa-times"></i>
										</button>
									</form>
								@endif
              </td>
            </tr>
          @endforeach
        </tbody>
      </table>
    </div>
  </div>
@endsection

@push('styles')
  <link rel="stylesheet" href="/adminlte/plugins/datatables/dataTables.bootstrap4.min.css">
@endpush

@push('scripts')
  <script src="/adminlte/plugins/datatables/jquery.dataTables.min.js"></script>
  <script src="/adminlte/plugins/datatables/dataTables.bootstrap4.min.js"></script>
  <script>
    $(function () {
      $("#roles-table").DataTable();
    });
  </script>
@endpush