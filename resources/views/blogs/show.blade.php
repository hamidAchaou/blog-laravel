@extends('layouts.app')

@section('content')

<section class=" hero-showPosts">
    
    @error('success')
        <span class="valid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
    @enderror
    @error('title')
        <span class="valid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
    @enderror
    <div class="hero-img">
        <img src="/images/{{ $post->image_path }}" alt="" class="rounded-md rounded-sm object-cover w-100" style="attachment: fixed;">
    </div>

    <div class="container hero-allPosts  m-auto text-center py-5">
        <h1 class="text-center">{{ $post->title }}</h1>
        <h5>By: <span>{{ $post->user->name }}</span> | {{ date('d-m-Y', strtotime($post->created_at)) }}</h5>
    </div>

    <p class="container text-center fs-5 lh-base fs-sm-6">{{ $post->description }}</p>
    <div class="d-flex justify-content-center gap-3 mb-5">

        @if (Auth::check() && Auth::user()->id == $post->user_id)

        <button type="button" class="btn btn-danger text-uppercase" data-bs-toggle="modal" data-bs-target="#exampleModal">
            DELETE
          </button>

        <!-- Modal -->
        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">DELETE POST</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                <h2 class="text-danger">Are You sur deleted this post ?</h2> 
                </div>
                <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                <form action="{{ route('blogs.destroy', ['blog' => $post->slug]) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button class="btn btn-danger text-uppercase">Delete</button>
                </form>
                </div>
            </div>
            </div>
        </div>

            <a href="{{ route('blogs.edit', ['blog' => $post->slug]) }}" class="btn btn-primary text-uppercase">Edit</a>
        @endif
    </div>  

</section>

@endsection

{{-- <section class="container hero-showPosts">
    
    <div class="hero-allPosts  m-auto text-center py-5">
        <h1 class="text-center pt-4 mt-4">{{ $post->title }}</h1>
        <h5>By: <span>{{ $post->user->name }}</span> | {{ date('d-m-Y', strtotime($post->created_at)) }}</h5>
    </div>

    <p class="text-center">{{ $post->description }}</p>
    <div class="d-flex justify-content-center gap-3 mb-3">
        <a href="#" class="btn btn-danger text-uppercase">Delete</a>
        <a href="#" class="btn btn-primary text-uppercase">Edit</a>
    </div>  
    <div class="d-flex justify-content-center">
        <img src="/images/{{ $post->image_path }}" alt="" class="rounded-md rounded-sm object-cover w-100">
    </div>

</section> --}}