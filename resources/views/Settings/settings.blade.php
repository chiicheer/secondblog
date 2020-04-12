@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Edit blog settings</div>

                <div class="card-body">
                    <form action="{{ route('setting.update') }}" method="post">
                        {{ csrf_field() }}
                        <div class="form-group">
                            <label for="name">Site name</label>
                            <input type="text" name="site_name" class="form-control" value="{{ $settings->site_name }}">
                        </div>
                        <div class="form-group">
                            <label for="name">Address</label>
                            <input type="text" name="address" class="form-control" value="{{ $settings->address }}">
                        </div>
                        <div class="form-group">
                            <label for="name">Contact phone</label>
                            <input type="text" name="contact_number" class="form-control" value="{{ $settings->contact_number }}">
                        </div>
                        <div class="form-group">
                        <label for="name">Contact email</label>
                            <input type="text" name="contact_email" class="form-control" value="{{ $settings->contact_email }}">
                        </div>
                        <div class="form-group">
                            <div class="text-center">
                            <button type="submit" class="btn btn-success">Update site settings</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection