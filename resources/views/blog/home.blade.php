@extends('layouts.blog')

@section('content')
	<div class="container">
		<div class="posts">
			@if( count( $posts ) > 0 )
				@foreach( $posts as $post )
					<article>
						<div class="img-cont">
							<img src="{{ route('get_image', $post->image) }}" alt="">
						</div>
						<h2 class="post-title">{{ $post->title }}</h2>
						<div class="the-excerpt mb-4">
							{{ $post->excerpt }}
						</div>
						<a href="{{ route('post', [$post->id]) }}" class="read-more btn btn-secondary">Leer más</a>
					</article>
				@endforeach
			@else
			<div class="alert alert-info">No hay artículos para mostrar</div>
			@endif
		</div>
	</div>
@endsection
