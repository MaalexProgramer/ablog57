@extends('layout')

@section('content')
	<section class="posts container">
		@foreach ($posts as $post)
			<article class="post no-imag">
				<div class="content-post">
						<header class="container-flex space-between">
							<div class="date">
								<span class="c-gray-1">{{ $post->published_at->diffForHumans() }}</span>
							</div>
							<div class="post-category">
								<span class="category text-capitalize">{{ $post->category->name }}</span>
							</div>
						</header>
						<h1>{{ $post->title }}</h1>
						<div class="divider"></div>
						<p>{{ $post->excerpt }}</p>
						<footer class="container-flex space-between">
							<div class="read-more">
								<a href="#" class="text-uppercase c-green">read more</a>
							</div>
							<div class="tags container-flex">
								<span class="tag c-gray-1 text-capitalize">#yosemite</span>
								<span class="tag c-gray-1 text-capitalize">#peak</span>
								<span class="tag c-gray-1 text-capitalize">#explorer</span>
							</div>
						</footer>
					</div>
			</article>
		@endforeach
	</section>
@endsection
