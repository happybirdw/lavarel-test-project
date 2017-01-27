@extends('layouts.app')

@section('content')
	<div class="container">
		<h1>{{ $article->title }}</h1>

		<article>
			{{ $article->body }}
		</article>

		@unless ($article->tags->isEmpty())

			<h5>Tags:</h5>
			<ul>
				@foreach ($article->tags as $tag)
					<li>
						<a href="{{ url('/tags', $tag->name) }}">
							{{ $tag->name }}
						</a>
					</li>
				@endforeach
			</ul>
			
		@endunless

		<a href="{{ $article->id }}/edit">Edit</a>

	</div>
@stop