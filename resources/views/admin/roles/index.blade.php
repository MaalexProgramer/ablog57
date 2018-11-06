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
          <i class="fa fa-plus"></i>  Crear role
      </a>
    </div>

    <div class="box-body">
      <table id="roles-table" class="table table-bordered table-striped">
        <thead>
          <tr>
            <th>ID</th>
            <th>Nombre</th>
            <th>Guard</th>
            <th>Acciones</th>
          </tr>
        </thead>
        <tbody>
          @foreach ($roles as $role)
            <tr>
              <td>{{ $role->id }}</td>
              <td>{{ $role->name }}</td>
              <td>{{ $role->guard_name }}</td>
              <td>
                <a href="{{ route('admin.roles.show', $role) }}" class="btn btn-xs btn-default">
                  <i class="fa fa-eye"></i>
                </a>
                <a href="{{ route('admin.roles.edit', $role) }}" class="btn btn-xs btn-info">
                  <i class="fa fa-pencil"></i>
                </a>
                <form method="POST" action="{{ route('admin.roles.destroy', $role) }}" style="display: inline">
                  @csrf
                  @method('DELETE')
                  <button class="btn btn-xs btn-danger" onclick="return confirm('¿Estás seguro de querer eliminar esta usuario?')">
                    <i class="fa fa-times"></i>
                  </button>
                </form>
              </td>
            </tr>
          @endforeach
        </tbody>
      </table>
    </div>
  </div>
@endsection

@push('styles')
  <link rel="stylesheet" href="/adminlte/plugins/datatables/dataTables.bootstrap.css">
@endpush

@push('scripts')
  <script src="/adminlte/plugins/datatables/jquery.dataTables.min.js"></script>
  <script src="/adminlte/plugins/datatables/dataTables.bootstrap.min.js"></script>
  <script>
    $(function () {
      $("#roles-table").DataTable();
    });
  </script>
@endpush