@extends('layouts.app')

@section('content')
<section class="container py-5 edit-post">
    <div class="row justify-content-center pt-5 px-3 px-md-0">
        <div class="mt-5 col-md-8">
            <h1 class="text-center mb-4">Edit Post {{ $post->title }}</h1>

            <form method="POST" action="{{ route('blogs.update', ['blog' => $post->slug]) }}" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <div class="mb-3">
                    <label for="title" class="form-label">Title:</label>
                    <input type="text" name="title" value="{{ $post->title }}" id="title" class="shadow form-control @error('title') is-invalid @enderror" required>
                    @error('title')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="description" class="form-label">Description:</label>
                    <textarea name="description" id="description" class="shadow form-control p-3 @error('description') is-invalid @enderror" required>{{ $post->description }}</textarea>
                    @error('description')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>


                <div class="row py-4">
                    <div class="col-lg-6 mx-auto text-center">

                        <!-- Upload image input-->
                        <div class="text-center">
                            <input type="file" name="image_post" id="image_post" class="shadow d-none form-control border-0 @error('image_post') is-invalid @enderror">
                            <label for="image_post" class="btn shadow btn-light m-0 rounded-pill px-4"><i class="fa fa-cloud-upload mr-2 text-muted"></i><small class="text-uppercase font-weight-bold text-muted">Choose Image</small></label>
                        </div>
                        @error('image_post')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>

                <div class="text-center">
                    <button type="submit" class="btn btn-success">UPDATE NEW</button>
                </div>
            </form>
        </div>
    </div>
</section>
@endsection