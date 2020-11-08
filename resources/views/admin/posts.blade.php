@extends('layouts.app')

@section('content')
	
	<section class="posts">
		<div class="container">
			@if(session()->has('message'))
			    <div class="alert alert-success">
			        {{ session()->get('message') }}
			    </div>
			@endif
			
			<h3 class="section-title mb-4">Artículos <a href="{{ route('post-create') }}" class="btn btn-secondary ml-2">Crear</a></h3>

			<table class="table table-dark table-striped">
				<thead>
					<tr>
						<th scope="col">#</th>
						<th scope="col">Título</th>
						<th scope="col">Fecha</th>
					</tr>
				</thead>
				<tbody>
					@foreach( $posts as $post )
						<tr>
							<th scope="row">1</th>
							<td><a href="{{ route('post-edit', [$post->id]) }}">{{ $post->title }}</a></td>
							<td>Fecha</td>
						</tr>
					@endforeach
				</tbody>
			</table>
		</div>
	</section>	

@endsection
