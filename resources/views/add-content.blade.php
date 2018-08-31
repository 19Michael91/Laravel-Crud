@extends( 'layouts.site' )

@section( 'content' )

	<div class="jumbotron">
		<div class="container">
			<h1 class="display-3">{{ $header }}</h1>
			<p>{{ $message }}</p>
			<p><a class="btn btn-primary btn-lg" href="{{ route( 'articleStore' ) }}" role="button">Add new &raquo;</a></p>
		</div>
	</div>

	<div class="conteiner">
		<div class="row">
			<form method="POST" action="{{route( 'articleStore' )}}" style="position: absolute; left: 100px; width: 50%;">
				<div class="form-group">
					<label for="title">Title</label>
					<input type="text" class="form-control" id="title" name="title">
				</div>
				<div class="form-group">
					<label for="alias">Alias</label>
					<input type="text" class="form-control" id="alias" name="alias">
				</div>
				<div class="form-group">
					<label for="exampleInputFile">Description</label>
					<textarea class="form-control" name="description"></textarea>
				</div>
				<div class="form-group">
					<label for="exampleInputFile">Text</label>
					<textarea class="form-control" name="text"></textarea>
				</div>

				<button type="submit" class="btn btn-default">Submit</button>

				{{ csrf_field() }}

			</form>
		</div>
	</div>

@endsection
