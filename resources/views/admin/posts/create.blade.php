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
              <textarea rows="10" type="text" name="body" class="form-control" placeholder="Ingresa el contenido completo de la publicación"></textarea>
            </div>
          </div>
        </div>
      </div>
      <div class="col-md-4">
        <div class="box box-primary">
          <div class="box-body">
            <div class="form-group">
              <label>Extracto de la publicación</label>
              <textarea type="text" name="excerpt" class="form-control" placeholder="Ingresa un extracto de la publicación"></textarea>
            </div>
          </div>
        </div>
      </div>
    </form>
  </div>
@endsection