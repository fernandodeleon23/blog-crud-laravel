@extends('layouts.app')

@section('content')
	
	<section class="posts">
		<div class="container">
			@if(session()->has('message'))
			    <div class="alert alert-success">
			        {{ session()->get('message') }}
			    </div>
			@endif
			<h3 class="section-title mb-4">Editar artículo</h3>

			<form action="{{ route('post-update', [$post->id]) }}" method="POST" enctype="multipart/form-data">

				@csrf

				<div class="row">
					<div class="col-lg-10">
						<div class="form-group">
							<input type="text" class="form-control" name="title" placeholder="Título del artículo" value="{{ $post->title }}" autocomplete="Off">
						</div>

						<div class="form-group">
							<textarea name="content" id="" cols="30" rows="10" class="form-control" placeholder="Contenido del post">{{ $post->content }}</textarea>
						</div>

						<div class="form-group">
							<textarea name="excerpt" id="" cols="30" rows="10" class="form-control" placeholder="Contenido del post">{{ $post->excerpt }}</textarea>
						</div>

						<div class="form-group">
							<select name="category" id="" class="form-control">
								@foreach( $categories as $cat )
									<option
										value="{{ $cat->id }}"
										@if( $cat->id == $post->category->id )
											selected
										@endif
										>{{ $cat->name }}
									</option>
								@endforeach
							</select>
						</div>

						<div class="form-group">
							<h5 class="mb-3">Imagen del artículo</h5>
							@if( $post->image )
								<p><strong>Actual:</strong> {{ $post->image }}</p>
							@endif
							<input type="file" name="file0">
						</div>

						<div class="form-group mt-5">
							<button type="button" class="btn btn-danger" data-toggle="modal" data-target="#deleteModal">
								Eliminar
							</button>

							<!-- Modal -->
							<div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="deleteModalTitle" aria-hidden="true">
								<div class="modal-dialog modal-dialog-centered" role="document">
									<div class="modal-content">
										<div class="modal-header">
											<h5 class="modal-title" id="deleteModalLongTitle">Eliminar artículo?</h5>
											<button type="button" class="close" data-dismiss="modal" aria-label="Close">
											<span aria-hidden="true">&times;</span>
											</button>
										</div>
										<div class="modal-footer">
											<button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
											<a class="btn btn-primary" href="{{ route('delete-post', $post->id) }}">Eliminar</a>
										</div>
									</div>
								</div>
							</div>
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
