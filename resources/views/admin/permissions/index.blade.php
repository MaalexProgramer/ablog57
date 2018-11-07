@extends('admin.layout')

@section('header')
	<h1>
		Permisos
		<small>Listado</small>
	</h1>
	<ol class="breadcrumb">
			<li><a href="{{ route('dashboard') }}"><i class="fa fa-dashboard"></i> Inicio</a></li>
			<li class="active">Permisos</li>
	</ol>
@endsection

@section('content')
	<div class="box box-primary">
		<div class="box-header">
				<h3 class="box-title">Listado de Permisos</h3>
		</div>
		<div class="box-body">
				<table id="permissions-table" class="table table-bordered table-striped">
						<thead>
								<tr>
										<th>ID</th>
										<th>Identificador</th>
										<th>Nombre</th>
										<th>Acciones</th>
								</tr>
						</thead>
						<tbody>
								@foreach ($permissions as $permission)
										<tr>
												<td>{{ $permission->id }}</td>
												<td>{{ $permission->name }}</td>
												<td>{{ $permission->display_name }}</td>
												<td>
													<a href="{{ route('admin.permissions.edit', $permission) }}"
														class="btn btn-xs btn-info">
														<i class="fa fa-pencil"></i>
													</a>
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
      $("#permissions-table").DataTable();
    });
  </script>
@endpush