<div class="col-lg-4">
    <div class="sidebar">
      <div class="row">
        <div></div>
        @include('front.inc.error')
        @include('front.inc.success')
        <div class="col-lg-12">
          <button type="button" class=" post-btn" data-bs-toggle="modal" data-bs-target="#createPost">
            Create Post
          </button>
        </div>
        <div class="col-lg-12">
          <div class="sidebar-item tags">
            <div class="sidebar-heading">
              <h2>Categories</h2>
            </div>
            <div class="content">
              <ul>
                @foreach ($showCategories as $category)
                <li><a href="{{ url("category/$category->id") }}">{{ $category->category }}</a></li>
                @endforeach
                <li><a href="{{ url("/") }}">General</a></li>
              </ul>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  @include('front.inc.create-post-modal')