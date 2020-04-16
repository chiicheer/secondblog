@extends('layouts.app')

@section('content')

	<div class="card">
		<div class="card-body">
			<div class="card-title text-center font-weight-bold">Show Details: {{ $post->title }}</div>
			<img src="{{ $post->featured_image }}" alt="{{ $post->title }}" width="100%" height="100%">
			<p class="card-text mt-3">{{ $post->description }}</p>
			<p>Category:: {{ $post->category->name }}</p>
			<p>Tags::
				@foreach($post->tags as $tag)
					{{ $tag->tag }}
				@endforeach
			</p>

		<div class="d-flex justify-content-between"></div>
            <a href="{{ route('post.edit',[$post->id]) }}" class="btn btn-sm btn-primary">Edit</a>
            <form action="{{ route('post.destroy',[$post->id ]) }}" method="POST">
            	@csrf
            	@method('DELETE')
            	<button class="btn btn-danger">Trash</button>
            </form>

		</div>
	</div>

@endsection