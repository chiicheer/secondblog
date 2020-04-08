@extends('layouts.app')

@section('content')
    <div class="card">
        <div class="card-header">Posts</div>

        <div class="card-body">
            @if ($posts->count() > 0)
            <table class="table table-hover">
              <thead>
                <th>Image</th>
                <th>Title</th>
                <th colspan="3">Action</th>
              </thead>
              <tbody>
                @foreach($posts as $post)
                  <tr>
                      <td>
                          <img src="{{ $post->featured_image }}" alt="{{ $post->title }}" width="90px" height="80px" style="border-radius: 30%">
                      </td>
                      <td>{{ $post->title }}</td>
                      <td><a href="{{ route('post.show',[$post->id]) }}" class="btn btn-sm btn-info">View</a></td>
                      @if(Auth::check())
                      <td>
                          <a href="{{ route('post.edit',[$post->id]) }}" class="btn btn-sm btn-primary">Edit</a>
                      </td>
                      <td>
                          <form action="{{ route('post.destroy',[$post->id]) }}" method="POST">
                              @csrf
                              <!--Form method spoofing-->
                              @method('DELETE')
                              <button type="submit" class="btn btn-sm btn-danger">Trash</button>
                          </form>
                      </td>
                      @endif
                  </tr>
                @endforeach
              </tbody>
            </table>
            @else
                <strong class="text-center">No posts found yet</strong>
            @endif
        </div>
    </div>
@endsection