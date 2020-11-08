@extends('layouts.app')

@section('content')
	
	<section class="categories">
		<div class="container">
			<h3 class="section-title mb-4">Categorías <a href="{{ route('category-create') }}" class="btn btn-secondary ml-2">Crear</a></h3>

			<table class="table table-dark table-striped">
				<thead>
					<tr>
						<th scope="col">#</th>
						<th scope="col">Nombre</th>
						<th scope="col">Fecha</th>
					</tr>
				</thead>
				<tbody>
					@foreach( $categories as $category )
						<tr>
							<th scope="row">1</th>
							<td><a href="{{ route('category-edit', [$category->id]) }}">{{ $category->name }}</a></td>
							<td>Fecha</td>
						</tr>
					@endforeach
				</tbody>
			</table>
		</div>
	</section>	

@endsection
