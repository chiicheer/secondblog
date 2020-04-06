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
                <th>Action</th>
              </thead>
              <tbody>
                @foreach($posts as $post)
                  <tr>
                      <td>
                          <img src="{{ asset('storage/'.$post->featured_image) }}" alt="{{ $post->title }}" width="90px" height="80px" style="border-radius: 30%">
                      </td>
                      <td>{{ $post->title }}</td>
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