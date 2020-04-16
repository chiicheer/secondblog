@extends('layouts.app')
@section('content')

<div class="card">
    <div class="card-header">Users</div>

    <div class="card-body">
            <table class="table table-hover">
                <thead>
                    <th>Image</th>
                    <th>Name</th>
                    <th>Action</th>
                </thead>
                <tbody>
                    @if($users->count() > 0)
                        @foreach($users as $user)
                        <tr>
                            <td>
                                <img src="{{ asset($user->profile->avatar) }}" alt="noimage" width="50px" height="50px" style="border-radius:50%;">
                            </td> 
                            <td>{{ $user->name }}</td>
                            <td>
                                @if(Auth::id() !== $user->id)
                                <a href="{{ route('users.destroy',[$user->id])}}" class="btn btn-sm btn-danger">Delete</a>
                                @endif
                            </td>
                        </tr>
                        @endforeach
                    @else
                        <tr>
                            <th colspan="4" class="text-center">No User</th>
                        </tr>
                    @endif
                </tbody>
            </table>
    </div>
</div>
@endsection