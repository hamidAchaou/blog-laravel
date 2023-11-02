@extends('layouts.app')

@section('content')

<section class="container">
    <div class="hero-allPosts container m-auto text-center pt-5 pb-5">
        <h1 class="text-center pt-5">All Posts</h1>
    </div>

    {{--====================== get data Posts =========================== --}}
    @foreach ($posts as $post)
    <div class="row mx-auto py-4 px-md-5 border-bottomPosts border-bottom">
        <div class="col-md-6 d-flex justify-content-center">
            <img src="/images/{{ $post->image_path }}" alt="" class="rounded-md rounded-sm object-cover w-100">        
        </div>
    
        <div class="content-posts col-md-6">
            <h2 class="py-3 pt-md-0">{{ $post->title }}</h2>
            <h5>By: <span>{{ $post->user->name }}</span>
                Or: <span>{{ date('d-m-Y', strtotime($post->created_at)) }}</span>
            </h5>
            <p>{{ $post->description }}</p>
            <a href="{{ route('blogs.show', ['blog' => $post->slug]) }}" class="btn btn-secondary text-uppercase">Read More</a>            {{-- <a href="{{ route('blogs.show', ['slug'=> $post->slug]) }}" class="btn btn-secondary text-uppercase">Read More</a> --}}
        </div>
    </div>
    @endforeach



</section>

@endsection