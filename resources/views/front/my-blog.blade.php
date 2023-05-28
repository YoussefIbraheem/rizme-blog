@extends('front.inc.layout')

@section('content')
    <!-- Page Content -->
    <!-- Banner Starts Here -->
    <div class="heading-page header-text">
      <section class="page-heading">
        <div class="container">
          <div class="row">
            <div class="col-lg-12">
              <div class="text-content">
                <h4>Hello {{ Auth::user()->name }}</h4>
                <h2>Our Recent Blog Entries</h2>
              </div>
            </div>
          </div>
        </div>
      </section>
    </div>
    
    <!-- Banner Ends Here -->
    <section class="blog-posts grid-system">
      <div class="container">
        <div class="row">
          
          <div class="col-lg-8">
            <div class="all-blog-posts">
              <div class="row">
                @foreach ($posts as $post)
                <div class="col-lg-6">
                  <div class="blog-post">
                    @if(isset($post->thumbnail))
                    <div class="blog-thumb">
                      <img class="main-thumbnail" src="{{ $post->thumbnail }}" alt="thumbnail">
                    </div>
                    @endif
                    <div class="down-content">
                      
                      <a href="{{ url("/post-details/$post->id") }}"><h4>{{ $post->title }}</h4></a>
                      <ul class="post-info">
                        <li><a style="pointer-events:none" href="#">{{ $post->users->name }}</a></li>
                        <li><a style="pointer-events:none" href="#">{{ $post->created_at }}</a></li>
                        <li><a style="pointer-events:none" href="#">{{ count($post->comments)}} Comments</a></li>
                      </ul>
                      <p>{{ $post->body }}</p>
                      <div class="post-options">
                        <div class="row">
                          <div class="col-lg-6">
                            <ul class="post-tags">
                              <li><i class="fa fa-tags"></i></li>
                              @foreach ($post->categories as $category )
                              <li><a href="#">{{ $category->category }}</a>,</li>
                              @endforeach
                            </ul>
                          </div>
                          <div class="col-lg-6">
                            <button type="button" class="btn bg-info btn-sm" data-bs-toggle="modal" data-bs-target="#editPost{{ $post->id }}">
                              Edit
                            </button>
                            <button type="submit" class="btn bg-danger btn-sm" data-bs-toggle="modal" data-bs-target="#deletePost{{ $post->id }}">
                             delete
                            </button>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                @include('front.inc.edit-post-modal')
                @include('front.inc.delete-post-modal')
                @endforeach
              </div>
            </div>
          </div>
          @include('front.inc.sidebar')
        </div>
      </div>
    </section>
@endsection