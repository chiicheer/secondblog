@extends('layouts.app')
@section('content')
    <div class="card">
        <div class="card-header">All Categories</div>

        <div class="card-body">
            <table class="table table-hover">
              <thead>
                <th>Name</th>
                <th colspan="2">Action</th>
              </thead>
              <tbody>
                @if($categories->count() >0)
                 @foreach($categories as $category)
                  <tr>
                    <td>{{ $category->name }}</td>
                    <td>
                      <a href="{{ route('category.edit',[$category->id]) }}" class="btn btn-sm btn-info">Edit</a>
                    </td>
                    <td>
                      <a href="{{ route('category.destroy',[$category->id]) }}" class="btn btn-sm btn-danger">Delete</a>
                    </td>
                  </tr>
                 @endforeach
                 @else
                    <tr>
                      <th colspan="2" class="text-center">No Categories yet!</th>
                    </tr>
                @endif
              </tbody>
            </table>
        </div>
    </div>
@endsection