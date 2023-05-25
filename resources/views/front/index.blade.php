@extends('front/inc/layout')

@section('content')
<div class="py-5"></div>
<section class="blog-posts">
  <div class="container">
    <div class="row">
      <div class="col-lg-8">
        <div class="all-blog-posts">
          <div class="row w-75 m-auto">
            @foreach ($posts as $post )
            <div class="col-lg-12">
              <div class="blog-post">
                <div class="blog-thumb">
                  <img style="height:300px" src="{{ $post->thumbnail }}" alt="">
                </div>
                <div class="down-content">
                  <h4>{{ $post->title }}</h4>
                  <ul class="post-info">
                    <li>{{ $post->users->name }}</li>
                    <li><img class="mx-3" src="{{ $post->users->profile_picture }}" alt=""></li>
                    <li>{{ $post->created_at }}</li>
                    <li>12 Comments</li>
                  </ul>
                  <p>{{ $post->body }}</p>
                  <div class="post-options">
                    <div class="row">
                      <div class="col-6">
                        <ul class="post-tags">
                          <li><i class="fa fa-tags"></i></li>
                          <li><a href="#">Beauty</a>,</li>
                          <li><a href="#">Nature</a></li>
                        </ul>
                      </div>
                      <div class="col-6">
                        <ul class="post-share">
                          <li><i class="fa fa-share-alt"></i></li>
                          <li><a href="#">Facebook</a>,</li>
                          <li><a href="#"> Twitter</a></li>
                        </ul>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
           @endforeach
          </div>
        </div>
      </div>
      @include('front.inc.sidebar')
    </div>
  </div>
</section>

@endsection
 