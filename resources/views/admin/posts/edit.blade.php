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
    @if ($post->photos->count())
      <div class="col-md-12">
        <div class="box box-primary">
          <div class="box-body">
            @foreach($post->photos as $photo)
              <form method="POST" action="{{ route('admin.photos.destroy', $photo) }}">
                @csrf
                @method('DELETE')

                <div class="col-md-2">
                  <button class="btn btn-danger btn-xs" style="position: absolute">
                    <i class="fa fa-remove"></i>
                  </button>
                  <img class="img-responsive" src="{{ url($photo->url) }}">
                </div>
              </form>
            @endforeach
          </div>
        </div>
      </div>
    @endif

		<form method="POST" action="{{ route('admin.posts.update', $post) }}">
			@csrf
			@method('PUT')

			<div class=" col-md-8">
				<div class="box box-primary">
					<div class="box-body">
						<div class="form-group {{ $errors->has('title') ? 'has-error' : '' }}">
							<label>Titulo de la publicación</label>
							<input name="title" type="text"
								class="form-control"
								value="{{ old('title', $post->title) }}"
								placeholder="Ingresa aquí el título de la publicación">
							{!! $errors->first('title', '<span class="help-block">:message</span>') !!}
						</div>
            <div class="box-body">
              <div class="form-group {{ $errors->has('body') ? 'has-error' : '' }}">
                <label>Contenido de la publicación</label>
                <textarea id="editor" rows="10" type="text" name="body" class="form-control" placeholder="Ingresa el contenido completo de la publicación">{{ old('body', $post->body) }}</textarea>
                {!! $errors->first('body', '<span class="help-block">:message</span>') !!}
              </div>
            </div>
            <div class="box-body">
              <div class="form-group {{ $errors->has('iframe') ? 'has-error' : '' }}">
                <label>Contenido embebido (iframe)</label>
                <textarea id="editor" rows="2" type="text" name="iframe" class="form-control" placeholder="Ingresa contenido embebido (iframe) de audio o video">{{ old('iframe', $post->iframe) }}</textarea>
                {!! $errors->first('iframe', '<span class="help-block">:message</span>') !!}
              </div>
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
								<input name="published_at"
									class="form-control pull-right"
									value="{{ old('published_at', $post->published_at ? $post->published_at->format('m/d/Y') : null) }}"
									type="text"
									id="datepicker">
							</div>
						</div>
						<div class="form-group {{ $errors->has('category_id') ? 'has-error' : '' }}">
							<label>Categorías</label>
							<select name="category_id" class="form-control select2">
								<option value="">Seleciona una categoría</option>
								@foreach ($categories as $category)
									<option value="{{ $category->id }}"
											{{ old('category_id', $post->category_id) == $category->id ? 'selected' : '' }}
										>{{ $category->name }}
									</option>
								@endforeach
							</select>
							{!! $errors->first('category_id', '<span class="help-block">:message</span>') !!}
						</div>
						<div class="form-group {{ $errors->has('tags') ? 'has-error' : '' }}">
							<label>Etiquetas</label>
							<select name="tags[]" class="form-control select2"
								multiple="multiple"
								data-placeholder="Seleccione una o más etiquetas" style="width: 100%;">
								@foreach ($tags as $tag)
									<option {{ collect(old('tags', $post->tags->pluck('id')))->contains($tag->id) ? 'selected' : '' }} value="{{ $tag->id }}">
										{{ $tag->name }}
									</option>
								@endforeach
							</select>
							{!! $errors->first('tags', '<span class="help-block">:message</span>') !!}
						</div>
						<div class="form-group {{ $errors->has('excerpt') ? 'has-error' : '' }}">
							<label>Extracto de la publicación</label>
							<textarea name="excerpt"
								type="text"
								class="form-control"
								placeholder="Ingresa un extracto de la publicación">{{ old('excerpt', $post->excerpt) }}</textarea>
							{!! $errors->first('excerpt', '<span class="help-block">:message</span>') !!}
						</div>
						<div class="form-group">
							<div class="dropzone">

							</div>
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
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.5.1/dropzone.css">
	<!-- bootstrap datepicker -->
	<link rel="stylesheet" href="/adminlte/bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css">
	<!-- Select2 -->
	<link rel="stylesheet" href="/adminlte/bower_components/select2/dist/css/select2.min.css">
@endpush

@push('scripts')
	<script src="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.5.1/min/dropzone.min.js"></script>
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

		$('.select2').select2({
			tags: true
		});

		CKEDITOR.replace('editor');
    CKEDITOR.config.height = 315;

		var myDropzone = new Dropzone('.dropzone', {
			url: '/admin/posts/{{ $post->url }}/photos',
			paramName: 'photo',
			acceptedFiles: 'image/*',
			maxFilesize: 2,
			//maxFiles: 2,
			headers: {
				'X-CSRF-TOKEN': '{{ csrf_token() }}'
			},
			dictDefaultMessage: 'Arrastrar las fotos aquí para subirlas'
		});

		myDropzone.on('error', function(file, res) {
			console.log(res.photo[0]);
			var msg = res.photo[0];
			$('.dz-error-message:last > span').text(msg);
		});
		Dropzone.autoDiscover = false;
	</script>
@endpush