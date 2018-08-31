@extends( 'layouts.site' )



@section( 'content' )
			<!-- Main jumbotron for a primary marketing message or call to action -->
			<div class="jumbotron">
				<div class="container">
					<h1 class="display-3">{{ $header }}</h1>
					<p>{{ $message }}</p>
					<p><a class="btn btn-primary btn-lg" href="{{ route( 'articleStore' ) }}" role="button">Add new &raquo;</a></p>
				</div>
			</div>

			<div class="container">
				<!-- Example row of columns -->
				<div class="row">
					@foreach( $articles as $article )
						<div class="col-md-4">
							<h2>{{ $article->title }}</h2>
							<p>{!! $article->description !!}</p>
							<p><a class="btn btn-secondary" href="{{ route( 'articleShow', ['id' => $article->id] ) }}" role="button">View details &raquo;</a></p>

							<form action="{{ route( 'articleDelete', [ 'article' => $article->id ] ) }}" method="POST">
								<!-- <input type="hidden" name="_method" value="DELETE"> -->
								{{ method_field( 'DELETE' ) }}
								{{ csrf_field() }}
								<button type="submit" class="btn btn-danger">Delete</button>
							</form>
						</div>




					@endforeach
				</div>

				<hr>

			</div> <!-- /container -->

		</main>

		<footer class="container">
			<p>&copy; Company 2017-2018</p>
		</footer>

		<!-- Bootstrap core JavaScript
		================================================== -->
		<!-- Placed at the end of the document so the pages load faster -->
		<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
		<script>window.jQuery || document.write('<script src="../../assets/js/vendor/jquery-slim.min.js"><\/script>')</script>
		<script src="../../assets/js/vendor/popper.min.js"></script>
		<script src="../../dist/js/bootstrap.min.js"></script>
@endsection
