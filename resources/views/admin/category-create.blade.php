@extends('layouts.app')

@section('content')
	
	<section class="posts">
		<div class="container">
			@if(session()->has('message'))
			    <div class="alert alert-success">
			        {{ session()->get('message') }}
			    </div>
			@endif
			<h3 class="section-title mb-4">Nueva categoría</h3>

			<form action="{{ route('category-save') }}" method="POST">

				@csrf

				<div class="row">
					<div class="col-lg-10">
						<div class="form-group">
							<input type="text" class="form-control" name="name" placeholder="Nombre de la categoría" autocomplete="Off">
						</div>

					</div>

					<div class="col-lg-2">
						<input type="submit" class="btn btn-secondary" value="Guardar">
					</div>
				</div>

			</form>
		</div>
	</section>	

@endsection
