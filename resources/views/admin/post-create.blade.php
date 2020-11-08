@extends('layouts.app')

@section('content')
	
	<section class="posts">
		<div class="container">
			@if(session()->has('message'))
			    <div class="alert alert-success">
			        {{ session()->get('message') }}
			    </div>
			@endif
			<h3 class="section-title mb-4">Nuevo artículo</h3>

			<form action="{{ route('post-save') }}" method="POST">

				@csrf

				<div class="row">
					<div class="col-lg-10">
						<div class="form-group">
							<input type="text" class="form-control" name="title" placeholder="Título del artículo" autocomplete="Off">
						</div>

						<div class="form-group">
							<textarea name="content" id="" cols="30" rows="10" class="form-control" placeholder="Contenido del post"></textarea>
						</div>

						<div class="form-group">
							<textarea name="excerpt" id="" cols="30" rows="10" class="form-control" placeholder="Estracto"></textarea>
						</div>

						<div class="form-group">
							<select name="category" id="" class="form-control" required="required">
								@foreach( $categories as $cat )
									<option value="{{ $cat->id }}">{{ $cat->name }}</option>
								@endforeach
							</select>
						</div>

					</div>

					<div class="col-lg-2">
						<input type="submit" class="btn btn-secondary" value="Actualizar">
					</div>
				</div>

			</form>
		</div>
	</section>	

@endsection
