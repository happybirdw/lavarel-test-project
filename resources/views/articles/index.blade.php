@extends('layouts.app')

@section('content')
	<div class="container">
		<h1 class="text-center">Articles</h1>
	    <div class="row">
	        <div class="col-md-6">
        	    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
		    		<h4>Sort by Tags <span class="caret"></span></h4>
		  		</a>
		        <ul class="dropdown-menu">

					@foreach ($tags as $tag)
						<li>
							<a href="{{ url('/tags', $tag->name) }}"> 
								{{ $tag->name }}
							</a> 
						</li>
					@endforeach
				</ul> 
			</div>		
	        <div class="col-md-3 col-md-offset-3">
				<a class="btn btn-default btn-lg" role="button" href="{{ url('/articles/create') }}" >
					Create an article
				</a>
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