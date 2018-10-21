@extends('admin.layout')

@section('content')
  <div class="row">
    <div class="col-md-6">
      <div class="box box-primary">
        <div class="box-header with-border">
          <h3 class="box-title">Datos personales</h3>
        </div>
        <div class="box-body">
          <form method="POST" action="{{ route('admin.users.update', $user) }}">
            @csrf
            @method('PUT')

            @if ($errors->any())
              <ul class="list-group">
                @foreach ($errors->all() as $error)
                  <li class="list-group-item list-group-item-danger">
                    {{ $error }}
                  </li>
                @endforeach
              </ul>
            @endif

            <div class="form-group">
              <label for="name">Nombre:</label>
              <input name="name" value="{{ old('name', $user->name) }}" class="form-control">
            </div>

            <div class="form-group">
              <label for="email">Email:</label>
              <input name="email" value="{{ old('email', $user->email) }}" class="form-control">
            </div>
            
            <button class="btn btn-primary btn-block">Actualizar usuario</button>
          </form>
        </div>
      </div>
    </div>
  </div>
@endsection