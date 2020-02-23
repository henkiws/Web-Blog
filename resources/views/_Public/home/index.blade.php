@extends('layouts.app')
@section('content')
<div class="hero-section">
    <div class="wave">

      <svg width="100%" height="355px" viewBox="0 0 1920 355" version="1.1" xmlns="http://www.w3.org/2000/svg"
        xmlns:xlink="http://www.w3.org/1999/xlink">
        <g id="Page-1" stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
          <g id="Apple-TV" transform="translate(0.000000, -402.000000)" fill="#FFFFFF">
            <path
              d="M0,439.134243 C175.04074,464.89273 327.944386,477.771974 458.710937,477.771974 C654.860765,477.771974 870.645295,442.632362 1205.9828,410.192501 C1429.54114,388.565926 1667.54687,411.092417 1920,477.771974 L1920,757 L1017.15166,757 L0,757 L0,439.134243 Z"
              id="Path"></path>
          </g>
        </g>
      </svg>

    </div>

    <div class="container">
      <div class="row align-items-center">
        <div class="col-12 hero-text-image">
          <div class="row">
            <div class="col-lg-7 text-center text-lg-left">
              <h1 data-aos="fade-right">{{ $general['tagline'] }}</h1>
              <p class="mb-5" data-aos="fade-right" data-aos-delay="100">{{ $general['sub_tagline'] }}</p>
              <p data-aos="fade-right" data-aos-delay="200" data-aos-offset="-500"><a href="#"
                  class="btn btn-outline-white">Get started</a></p>
            </div>
            <div class="col-lg-5 iphone-wrap">
              <img src="{{ url('assets/front/softland') }}/img/phone_1.png" alt="Image" class="phone-1" data-aos="fade-right">
              <img src="{{ url('assets/front/softland') }}/img/phone_2.png" alt="Image" class="phone-2" data-aos="fade-right" data-aos-delay="200">
            </div>
          </div>
        </div>
      </div>
    </div>

  </div>

  <div class="site-section pb-0">
    <div class="container">
      <div class="row align-items-center">
        <div class="col-md-4 mr-auto">
          <h2 class="mb-4">Seamlessly Communicate</h2>
          <p class="mb-4">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Tenetur at reprehenderit optio,
            laudantium eius quod, eum maxime molestiae porro omnis. Dolores aspernatur delectus impedit incidunt
            dolore mollitia esse natus beatae.</p>
          <p><a href="#">Download Now</a></p>
        </div>
        <div class="col-md-6" data-aos="fade-left">
          <img src="{{ url('assets/front/softland') }}/img/undraw_svg_2.svg" alt="Image" class="img-fluid">
        </div>
      </div>
    </div>
  </div> <!-- .site-section -->

  <div class="site-section">
    <div class="container">
      <div class="row align-items-center">
        <div class="col-md-4 ml-auto order-2">
          <h2 class="mb-4">Gather Feedback</h2>
          <p class="mb-4">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Tenetur at reprehenderit optio,
            laudantium eius quod, eum maxime molestiae porro omnis. Dolores aspernatur delectus impedit incidunt
            dolore mollitia esse natus beatae.</p>
          <p><a href="#">Download Now</a></p>
        </div>
        <div class="col-md-6" data-aos="fade-right">
          <img src="{{ url('assets/front/softland') }}/img/undraw_svg_3.svg" alt="Image" class="img-fluid">
        </div>
      </div>
    </div>
  </div> <!-- .site-section -->

  <div class="site-section">
    <div class="container">

      <div class="row align-items-center">
        <div class="col-12">
          <div class="row justify-content-center">
            <div class="col-md-7 text-center hero-text">
              <h1 data-aos="fade-up" data-aos-delay="" class="aos-init aos-animate">Blog Posts</h1>
              <p class="mb-5 aos-init aos-animate" data-aos="fade-up" data-aos-delay="100">Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>  
            </div>
          </div>
        </div>
      </div>

      <div class="row mb-5">
        @foreach($post as $item)
        <div class="col-md-4">
          <div class="post-entry">
            <a href="{{ url('blog/'.$item->post_slug) }}" class="d-block mb-4">
              <img src="{{ url($item->image->media_path) }}" alt="Image" class="img-fluid">
            </a>
            <div class="post-text">
              <span class="post-meta">{{ \Carbon\Carbon::parse($item->created_at)->format('d M Y') }} &bullet; By <a href="#">{{ $item->user->name }}</a></span>  
              <h3><a href="{{ url('blog/'.$item->post_slug) }}">{{ $item->post_title }}</a></h3>
              <p>{!! substr($item->post_content, 0, 100) !!}...</p>
              <p><a href="{{ url('blog/'.$item->post_slug) }}" class="readmore">Read more</a></p>
            </div>
          </div>
        </div>
        @endforeach
      </div>

      <div class="row">
        <div class="col-12 text-center">
          <span class="p-3 active text-primary">1</span>
          <a href="#" class="p-3">2</a>
          <a href="#" class="p-3">3</a>
          <a href="#" class="p-3">4</a>
        </div>
      </div>
    </div>
  </div>

   <div class="site-section cta-section">
    <div class="container">
      <div class="row align-items-center">
        <div class="col-md-6 mr-auto text-center text-md-left mb-5 mb-md-0">
          <h2>Starts Publishing Your Apps</h2>
        </div>
        <div class="col-md-5 text-center text-md-right">
          <p><a href="#" class="btn"><span class="icofont-brand-apple mr-3"></span>App store</a> <a href="#"
              class="btn"><span class="icofont-ui-play mr-3"></span>Google play</a></p>
        </div>
      </div>
    </div>
  </div>

@endsection