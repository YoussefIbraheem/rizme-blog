@extends('front.inc.layout')

@section('content')
<div class="py-5 ">
</div>

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
                  @if (isset($post->thumbnail))
                  <img class="main-thumbnail" src="{{ $post->thumbnail }}" alt="Thumbnail">
                  @else
                  <img class="main-thumbnail" src="{{ asset('assets/images/blank.png') }}" alt="">
                  @endif
                </div>
                <div class="down-content">
                 <h4><a href="{{ url("post-details/$post->id") }}">{{ $post->title }}</a></h4> 
                  <ul class="post-info">
                    <li>{{ $post->users->name }}</li> 
                    <li>{{ $post->created_at }}</li>
                    <li>{{ count($post->comments) }} Comments</li>
                  </ul>
                  <p>{{ $post->body }}</p>
                  <div class="post-options">
                    <div class="row">
                      <div class="col-6">
                        <ul class="post-tags">
                          <li><i class="fa fa-tags"></i></li>
                          @foreach ( $post->categories as $category )
                          <li><a href="{{ url("category/$category->id") }}">{{ $category->category }}</a>,</li>
                          @endforeach
                        </ul>
                      </div>
                      <div class="col-6">
                        <ul class="post-share">
                          <li><i class="fa fa-share-alt"></i></li>
                          <li><a href="http://www.facebook.com">Facebook</a>,</li>
                          <li><a href="http://www.twitter.com"> Twitter</a></li>
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
 