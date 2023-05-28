@extends('front/inc/layout')

@section('content')
    <!-- Page Content -->
    <!-- Banner Starts Here -->
    <div class="heading-page header-text">
        <section class="page-heading">
          <div class="container">
            <div class="row">
              <div class="col-lg-12">
                <div class="text-content">
                  <h4>Post Details</h4>
                  <h2>{{ $post->title }}</h2>
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
                  <div class="col-lg-12">
                    <div class="blog-post">
                      <div class="blog-thumb">
                        @if (isset($post->thumbnail))
                        <img class="main-thumbnail" src="{{asset($post->thumbnail) }}" alt="Thumbnail">
                        @else
                        <img class="main-thumbnail" style="height:100px" src="{{ asset('storage/blank.png') }}" alt="">
                        @endif
                      </div>
                      <div class="down-content">
                        <a style="pointer-events: none;" href="post-details.html"><h4>{{ $post->title }}</h4></a>
                        <ul class="post-info">
                          <li><a style="pointer-events: none;" href="#">{{ $post->users->name }}</a></li>
                          <li><a style="pointer-events: none;" href="#">{{ $post->created_at }}</a></li>
                          <li><a style="pointer-events: none;" href="#">{{ count($post->comments) }} Comments</a></li>
                        @if($post->published)
                        <li><a style="pointer-events:none" href="#">published</a></li>
                        @else
                        <li><a style="pointer-events:none" href="#">Not published</a></li>
                        @endif
                        </ul>
                        
                        <br><br>
                      <p>{{ $post->body }}</p>
                        <div class="post-options">
                          <div class="row">
                            <div class="col-6">
                              <ul class="post-tags">
                                <li><i class="fa fa-tags"></i></li>
                                @foreach ($post->categories as $category )
                                <li><a href="{{ url("/category/$category->id") }}">{{ $category->category }}</a>,</li>
                                @endforeach
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
                  <div class="col-lg-12">
                    <div class="sidebar-item comments">
                      <div class="sidebar-heading">
                        <h2>{{ count($post->comments) }} Comments</h2>
                      </div>
                      <div class="content">
                        <ul>
                          @foreach ($comments as $comment)
                          <li>
                            <div class="author-thumb">
                              @if (!empty($comment->users->profile_picture))
                              <img class="profile-picture" src="{{ $comment->users->profile_picture }}" alt="profile picture" > 
                              @else
                              <img class="profile-picture" src="{{ asset('storage/random-user.png') }}" alt="no profile picture">
                              @endif
                            </div>
                            <div class="right-content">
                              <h4>{{ $comment->users->name }}<span>{{ $comment->created_at }}</span>
                                @if ( Auth::check() &&$comment->user_id == Auth::user()->id)
                                <form method="POST"  style="display: inline-block" action="{{ url("/delete-comment/$comment->id") }}">
                                  @csrf
                                  @method('DELETE')
                                <button class="btn btn-sm" style="background: none; border: none; cursor: pointer;">Delete</button></h4>
                                </form>
                                @endif
                              
                              <p>{{ $comment->body }}</p>
                            </div>
                          </li>
                            @endforeach
                        </ul>
                      </div>
                    </div>
                  </div>
                  <div class="col-lg-12">
                    <div class="sidebar-item submit-comment">
                      <div class="sidebar-heading">
                        <h2>Your comment</h2>
                      </div>
                      <div class="content">
                        <form id="comment" action="{{ url("add-comment/$post->id") }}" method="post">
                          @csrf
                          <div class="row">

                            <div class="col-lg-12">
                              <fieldset>
                                <textarea name="comment" rows="6" id="message" placeholder="Type your comment" required=""></textarea>
                              </fieldset>
                            </div>
                            <div class="col-lg-12">
                              <fieldset>
                                <button type="submit" id="form-submit" class="main-button">Submit</button>
                              </fieldset>
                            </div>
                          </div>
                        </form>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>
      @endsection