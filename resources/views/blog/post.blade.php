@extends('layouts.blog')

@section('content')
	<div class="container">
		
		<article class="single-post">
			<h3 class="section-title mb-4">{{ $post->title }}</h3>

			<div class="the-content">
				{{ $post->content }}
			</div>
		</article>
	</div>
@endsection
