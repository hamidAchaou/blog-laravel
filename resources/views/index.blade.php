@extends('layouts.app')

@section('content')
  {{--===================== section hero ================ --}}
  <section class="hero row justify-content-center align-items-center">
    <div class="container">
      <div class="row justify-content-center">
        <div class="col-md-6">
          <h1>Welcome to Our Blog</h1>
          <p>Stay updated with the latest news and articles.</p>
          <a href="#">startid Reading</a>
        </div>
      </div>
    </div>
  </section>

{{--===================== section Blog ================ --}}
<section class="section-blog container py-5">
  <div class="item-blog row justify-content-center">
    <div class="col-sm-6 col-md-6">
      <img src="https://picsum.photos/id/1/960/620" alt="" class="w-100 rounded-md">
    </div>
    <div class="col-sm-6 col-md-6 d-flex flex-column">
      <h2 class="mb-4">Developer Web</h2>
      <h5 class="text-muted mb-3">by: Hamid AChaou</h5>
      <p class="text-justify">Lorem ipsum dolor sit amet consectetur adipisicing elit. Sed incidunt nesciunt suscipit consequuntur assumenda voluptatibus asperiores nostrum, aspernatur, inventore corrupti unde debitis, iusto distinctio explicabo ullam dicta rerum totam nemo?</p>
    </div>
  </div>
</section>

{{-- ================== blog category ===================== --}}
<section class="blog-categories py-4">
  <h2 class="text-center py-3">Blog Categories</h2>
  <div class="container mx-auto row justify-content-center text-center text-white mt-3">
    <div class="col-md-3">
      <h6>Design Thinking</h6>
    </div>
    <div class="col-md-3">
      <h6>Frontend Developer</h6>
    </div>
    <div class="col-md-3">
      <h6>Backend Developer</h6>
    </div>
    <div class="col-md-3">
      <h6>Graphic Designer</h6>
    </div>
  </div>
</section>

{{-- ================= Recents Posts ====================== --}}
<section class="container recents-posts py-5">
  <h1 class="text-center">Recent Posts</h1>
  <p class="text-center">Lorem ipsum dolor sit amet consectetur adipisicing elit. Ex sapiente obcaecati quos, eligendi iste provident illo ea facilis repellendus ratione placeat aut non nesciunt! Aliquid explicabo enim laborum quasi asperiores.</p>
  
  <div class="pt-3 pb-5 row">

    <div class="block-recentsPosts py-4 px-4 col-md-6">
      <ul class="list-unstyled d-flex flex-md-row d-flex-md-wrap flex-sm-column w-100 text-center justify-content-center">
        <li class="btn col-md-3"><a href="" class="w-100">PHP</a></li>
        <li class="btn col-md-3"><a href="" class="">Programming</a></li>
        <li class="btn col-md-3"><a href="" class="">Languages</a></li>
        <li class="btn col-md-3"><a href="" class="">Backend</a></li>
      </ul>
      <p class="text-light">Lorem ipsum dolor sit amet consectetur adipisicing elit. Veniam odit nobis adipisci at totam a repudiandae, nam similique sint nemo. Iusto consequatur culpa fugiat fugit quis eum alias vel quidem.</p>

      <a href="#" class="btn btn-readMore border-light text-light text-uppercase font-weight-bold">Read more</a>
    </div>

    <div class="col-md-6  d-flex pl-0">
      <img src="https://picsum.photos/id/129/960/320" alt="" class="w-100 object-cover">
    </div>

  </div>
</section>

@endsection