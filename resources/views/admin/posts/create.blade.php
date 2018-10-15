@extends('admin.layout') 
@section('header')
<h1>
  POSTS
  <small>Crear publicación</small>
</h1>
<ol class="breadcrumb">
  <li><a href="{{ route('dashboard') }}"><i class="fa fa-dashboard"></i> Inicio</a></li>
  <li><a href="{{ route('admin.posts.index') }}"><i class="fa fa-list"></i> Posts</a></li>
  <li class="active">Crear</li>
</ol>
@endsection
 
@section('content')
  <div class="row">
    <form action="">
      <div class=" col-md-8">
        <div class="box box-primary">
          <div class="box-header">
            <h3 class="box-title">Crear una publicaciones</h3>
          </div>
          <div class="box-body">
            <div class="form-group">
              <label>Título de la publicación</label>
              <input type="text" name="title" class="form-control" placeholder="Ingresa aquí el título de la publicación">
            </div>
          </div>
          <div class="box-body">
            <div class="form-group">
              <label>Contenido de la publicación</label>
              <textarea id="editor" rows="10" type="text" name="body" class="form-control" placeholder="Ingresa el contenido completo de la publicación"></textarea>
            </div>
          </div>
        </div>
      </div>
      <div class="col-md-4">
        <div class="box box-primary">
          <div class="box-body">
            <div class="form-group">
              <label>Fecha de publicación:</label>
              <div class="input-group date">
                <div class="input-group-addon">
                  <i class="fa fa-calendar"></i>
                </div>
                <input name="published_at" type="text" class="form-control pull-right" id="datepicker">
              </div>
            </div>
						<div class="form-group">
							<label>Categorías</label>
							<select name="category_id" class="form-control select2">
								<option value="">Seleciona una categoría</option>
								@foreach ($categories as $category)
									<option value="{{ $category->id }}">{{ $category->name }}</option>
								@endforeach
							</select>
							{!! $errors->first('category_id', '<span class="help-block">:message</span>') !!}
            </div>
            <div class="form-group">
							<label>Etiquetas</label>
              <select class="form-control select2"
                multiple="multiple"
                data-placeholder="Seleccione una o más etiquetas" style="width: 100%;">
                @foreach ($tags as $tag)
                  <option value="{{ $tag->id }}">{{ $tag->name }}</option>
                @endforeach
              </select>
            </div>
            <div class="form-group">
              <label>Extracto de la publicación</label>
              <textarea type="text" name="excerpt" class="form-control" placeholder="Ingresa un extracto de la publicación"></textarea>
            </div>
            <div class="form-group">
              <button type="submit" class="btn btn-primary btn-block">Guardar publicación</button>
            </div>
          </div>
        </div>
      </div>
    </form>
  </div>
@endsection

@push('styles')
  <!-- bootstrap datepicker -->
  <link rel="stylesheet" href="/adminlte/bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css">
  <!-- Select2 -->
  <link rel="stylesheet" href="/adminlte/bower_components/select2/dist/css/select2.min.css">
@endpush

@push('scripts')
  <!-- CK Editor -->
  <script src="/adminlte/bower_components/ckeditor/ckeditor.js"></script>
  <!-- bootstrap datepicker -->
  <script src="/adminlte/bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script>
  <!-- Select2 -->
  <script src="/adminlte/bower_components/select2/dist/js/select2.full.min.js"></script>

  <script>
    //Date picker
    $('#datepicker').datepicker({
      autoclose: true
    });

    CKEDITOR.replace('editor');
    $('.select2').select2();
  </script>
@endpush