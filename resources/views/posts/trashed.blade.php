@extends('layouts.app')

@section('content')
    <div class="card">
        <div class="card-header">Trashed Posts</div>

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
                          <img src="{{ $post->featured_image }}" alt="{{ $post->title }}" width="60px" height="50px" style="border-radius: 50%">
                      </td>
                      <td>{{ $post->title }}</td>
                      <td><a href="{{ route('post.show',[$post->id]) }}" class="btn btn-sm btn-info">View</a></td>
                      <td>
                          <a href="{{ route('post.restore',['id'=>$post->id]) }}" class="btn btn-sm btn-warning">Restore</a>
                      </td>
                      <td>
                          <form action="{{ route('post.kill',['id'=>$post->id]) }}" method="POST">
                              @csrf
                              <!--Form method spoofing-->
                              @method('DELETE')
                              <button type="submit" class="btn btn-sm btn-danger">Delete</button>
                          </form>
                      </td>
                  </tr>
                @endforeach
              </tbody>
            </table>
            @else
                <strong class="text-center">No trashed posts yet!</strong>
            @endif
        </div>
    </div>
@endsection