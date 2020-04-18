@extends('layouts.frontend')
@section('page')

<div class="stunning-header stunning-header-bg-lightviolet">
    <div class="stunning-header-content">
        <h1 class="stunning-header-title">Category: {{ $title }}</h1>
    </div>
</div>

<!-- End Stunning Header -->

<!-- Post Details -->


<div class="container">
    <div class="row medium-padding120">
        <main class="main">
            
            <div class="row">
                <div class="case-item-wrap">
                    @if(count($category->posts) > 0)
                    @foreach($category->posts as $post)
                        <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
                            <div class="case-item">
                                <div class="case-item__thumb">
                                    <img src="{{ $post->featured_image }}" alt="{{ $post->title }}">
                                </div>
                                <h6 class="case-item__title text-center">
                                    <a href="#">{{ $post->title }}</a>
                                </h6>
                            </div>
                        </div>
                    @endforeach
                    @else
                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                            <h3 class="text-center">No posts found for this category!</h3>
                        </div>
                    @endif
                </div>
            </div>

            <!-- End Post Details -->
        </main>
    </div>
</div>

@endsection
