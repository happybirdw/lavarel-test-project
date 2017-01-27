@extends('layouts.app')

@section('content')
	<div class="container">
				<h1>Articles</h1>
	    <div class="row">
	        <div class="col-md-6">
				<a href="{{ url('/articles/create') }}" >
					Create an article
				</a>
			</div>

	        <div class="col-md-6">
        	    <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
		    		Tags 
		    		<span class="caret"></span>
		  		</button>
		        <ul class="dropdown-menu">
		        	{{-- <li>{{ $tags }}</li> --}}

					@foreach ($tags as $tag)
						<li>
							<a href="{{ url('/tags', $tag->name) }}"> 
								{{ $tag->name }}
							</a> 
						</li>
					@endforeach
				</ul> 
			</div>		
		</div>	
						
				<hr/>

		@foreach ($articles as $article)

			<article>
				
				<h2>
					<a href="{{ url('/articles', $article->id) }}">
						{{ $article->title }}
					</a>
				</h2>	


				<div class="body">{{ $article->body }}</div>

			</article>

		@endforeach
	
	</div>
@stop