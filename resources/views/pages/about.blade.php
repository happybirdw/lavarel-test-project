@extends('layouts.app')

@section('content')

	<div class="container">
		@unless (!$first)
			<H2>Hi I'm {{ $first }}</H2>
		@endif

		<h1>About me {{ $first }} - {{ $last }}</h1>
		<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Magni ad quia quo temporibus doloremque quidem soluta eaque quaerat quos, eligendi iste sed aspernatur voluptates facere ipsam veniam, architecto sequi voluptatibus.</p>
	</div>

@stop