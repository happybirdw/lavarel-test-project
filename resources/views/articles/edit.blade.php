@extends('layouts.app')

@section('content')
	<div class="container">
		<h1>Edit: {!! $article->title !!}</h1>
		
		{!! Form::model($article, ['method' => 'PATCH', 'action' => ['ArticlesController@update', $article->id]]) !!}  {{-- 'url' => 'articles' . $article->id --}}

			@include ('articles.form', ['submitButtonText' => 'Update Article'])
		

		{{ Form::close() }}

		@include ('errors.list')
	</div>
@stop