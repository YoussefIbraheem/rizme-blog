<div class="col-lg-4">
    <div class="sidebar">
      <div class="row">
          @if ($errors->any())
          <div class="col-lg-12">
              <div class="alert alert-danger">
                  <ul>
                      @foreach ($errors->all() as $error)
                          <li>{{ $error }}</li>
                      @endforeach
                  </ul>
              </div>
            </div>
            @endif
        
        <div class="col-lg-12">
          <button type="button" class=" post-btn" data-bs-toggle="modal" data-bs-target="#createPost">
            Create Post
          </button>
        </div>
        <div class="col-lg-12">
          <div class="sidebar-item categories">
            <div class="sidebar-heading">
              <h2>Categories</h2>
            </div>
            <div class="content">
              <ul>
                <li><a href="#">- Nature Lifestyle</a></li>
                <li><a href="#">- Awesome Layouts</a></li>
                <li><a href="#">- Creative Ideas</a></li>
                <li><a href="#">- Responsive Templates</a></li>
                <li><a href="#">- HTML5 / CSS3 Templates</a></li>
                <li><a href="#">- Creative &amp; Unique</a></li>
              </ul>
            </div>
          </div>
        </div>
        <div class="col-lg-12">
          <div class="sidebar-item tags">
            <div class="sidebar-heading">
              <h2>Tag Clouds</h2>
            </div>
            <div class="content">
              <ul>
                <li><a href="#">Lifestyle</a></li>
                <li><a href="#">Creative</a></li>
                <li><a href="#">HTML5</a></li>
                <li><a href="#">Inspiration</a></li>
                <li><a href="#">Motivation</a></li>
                <li><a href="#">PSD</a></li>
                <li><a href="#">Responsive</a></li>
              </ul>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  @include('front.inc.modal')