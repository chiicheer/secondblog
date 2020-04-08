@extends('layouts.app')

@section('content')

	<div class="card">
		<div class="card-body">
			<div class="card-title text-center font-weight-bold">{{ $post->title }}</div>
			<img src="{{ $post->featured_image }}" alt="{{ $post->title }}" width="100%" height="100%">
			<p class="card-text mt-3">{{ $post->description }}</p>
		</div>
	</div>

@endsection