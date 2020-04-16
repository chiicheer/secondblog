@extends('layouts.app')
@section('content')
<div class="card">
    <div class="card-header">
        Edit Post: {{ $post->title }}
    </div>
    <div class="card-body">
        <form action="{{route('post.update',[$post->id])}}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="title">Title</label>
                <input type="text" name="title" value="{{ $post->title }}" class="form-control">    
            </div>    
            <div class="form-group">
                <label for="description">Description</label>
            <textarea name="description" id="article" cols="5" rows="5" class="form-control">{{ $post->description }}</textarea>
            </div>
            <div class="form-group">
                <label for="category">Select a category</label>
                <select name="category_id" id="category" class="form-control">
                  @foreach($categories as $category)
                  <option value="{{ $category->id }}"
                    @if($post->category_id == $category->id)
                    selected
                    @endif
                    >{{ $category->name }}</option>
                  @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="tags">Select tags</label>
                  @foreach($tags as $tag)
                  <div class="checkbox">
                      <label><input type="checkbox" name="tags[]" value="{{ $tag->id }}"
                          @foreach($post->tags as $ta)
                            @if($tag->id == $ta->id)
                                checked
                            @endif
                          @endforeach
                          >{{ $tag->name }}</label>
                  </div>
                  @endforeach
            </div>

            <div class="form-group">
                <label for="featured">Featured image</label>
                <input type="file" name="featured" class="form-control-file">
            </div>
            <div class="form-group">
                <div class="text-center">
                    <button class="btn btn-success" type="submit">Update Post</button>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection