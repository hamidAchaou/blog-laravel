@extends('layouts.app')

@section('content')
<section class="container py-5">
    <div class="row justify-content-center pt-5 px-3 px-md-0">
        <div class="card shadow mt-5 col-md-8">
            <div class="card-body">
                <h1 class="card-title text-center mb-4">Create New Blog</h1>
                
                <form method="POST" action="{{ route('blogs.store')}}" enctype="multipart/form-data">
                    @csrf
                    
                    <div class="mb-3">
                        <label for="title" class="form-label">Title:</label>
                        <input type="text" name="title" value="{{ old('title')}}" id="title" class="form-control @error('title') is-invalid @enderror" required>
                        @error('title')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    
                    <div class="mb-3">
                        <label for="description" class="form-label">Description:</label>
                        <textarea name="description" id="description" class="form-control @error('description') is-invalid @enderror" required>{{ old('description') }}</textarea>
                        @error('description')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    

                    <div class="row py-4">
                        <div class="col-lg-6 mx-auto text-center">

                            <!-- Upload image input-->
                            <div class="input-group  rounded-pill bg-light shadow-sm w-100">
                                <input type="file" name="image_post" id="image_post" class="form-control border-0 @error('image_post') is-invalid @enderror" accept="image/*" required>
                                <label for="image_post" class="btn btn-light m-0 rounded-pill px-4"><i class="fa fa-cloud-upload mr-2 text-muted"></i><small class="text-uppercase font-weight-bold text-muted">Choose file</small></label>
                            </div>
                            @error('image_post')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                    
                    <div class="text-center">
                        <button type="submit" class="btn btn-success">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>
@endsection