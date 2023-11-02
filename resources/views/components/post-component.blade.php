<div class="row mx-auto py-4 px-5 border-bottomPosts border-bottom">
    <div class="col-md-6">
        <img src="{{ $post->image_path }}" alt="" class="w-100 rounded-md">
    </div>

    <div class="content-posts col-md-6">
        <h2 class="py-3 pt-md-0">{{ $post->title }}</h2>
        <h5>By: <span>{{ $post->user->name }}</span></h5>
        <p>{{ $post->description }}</p>
        <a href="#" class="btn btn-secondary text-uppercase">Read More</a>
    </div>
</div>