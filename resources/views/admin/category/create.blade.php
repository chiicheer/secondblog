@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ isset($category)? 'Edit Category' : 'New Category' }}</div>

                <div class="card-body">
                @if(count($errors) > 0)
                        <ul class="list-group">
                            @foreach($errors->all() as $error)
                                <li class="list-group-item text-danger">{{ $error }}</li>
                            @endforeach
                        </ul>
                @endif
                    <form action="{{ isset($category)? route('category.update',['id' => $category->id]) : route('category.store') }}" method="POST">
                        @csrf

                        @if(isset($category))
                            @method('PUT')
                        @endif

                        <div class="form-group">
                            <label>Category Name</label>
                            <input type="text" name="name" class="form-control" value="{{ isset($category)? $category->name : '' }}">
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-block btn-success">{{ isset($category)? 'Update Category' : 'Create Category' }}</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection