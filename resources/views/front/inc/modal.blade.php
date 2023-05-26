 <!-- Edit Post Modal -->
 @foreach ($posts as $post )
 <div class="modal fade" id="editPost{{ $post->id }}" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="staticBackdropLabel">Modal title</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <form enctype="multipart/form-data" method="POST" action="{{ url("/update-post/$post->id") }}">
          @method('PUT')
          @csrf
        <div class="modal-body">
          <div class="mb-3">
            <label for="exampleFormControlInput1" class="form-label">Title</label>
            <input value="{{ $post->title }}" type="title" name="title" class="form-control" id="exampleFormControlInput1" placeholder="Title...">
          </div>
          <div class="mb-3">
            <label for="exampleFormControlTextarea1" class="form-label">Body</label>
            <textarea  name="body" class="form-control" id="exampleFormControlTextarea1" rows="3">{{ $post->body }}</textarea>
          </div>
          <div class="mb-3">
            <label for="exampleFormControlTextarea1" class="form-label">Thumbnail</label>
            <input value="{{ $post->thumbnail }}" class="form-control" type="file" name="thumbnail" id="formFile">
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn bg-secondary btn-sm btn-secondary" data-bs-dismiss="modal">Close</button>
          <button type="submit" class="btn bg-primary btn-sm btn-primary">Update</button>
        </div>
      </div>
    </form>
    </div>
  </div>
   {{-- delete modal --}}
    
<div class="modal fade" id="deletePost{{ $post->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Modal title</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      
      <div class="modal-body">
        Are you sure you want to delete that post?
      </div>
      <div class="modal-footer">
        <form method="POST" action="{{ url("delete-post/$post->id") }}">
          @method('delete')
          @csrf
        <button  type="button" class="btn bg-secondary btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-danger bg-danger">Delete</button>
      </form>
      </div>
      
    </div>
  </div>
</div>
  @endforeach
<!-- Create Post Modal -->
  <div class="modal fade" id="createPost" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="staticBackdropLabel">Create Post</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <form class="form-group" enctype="multipart/form-data" method="POST" action="{{ url("/create-post") }}">
          @csrf
        <div class="modal-body">
          <div class="mb-3">
            <label for="exampleFormControlInput1" class="form-label">Title</label>
            <input type="title" name="title" class="form-control" id="exampleFormControlInput1" placeholder="Title...">
          </div>
          <div class="mb-3">
            <label for="exampleFormControlTextarea1" class="form-label">Body</label>
            <textarea name="body" class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
          </div>
          <div class="mb-3">
            <label for="exampleFormControlTextarea1" class="form-label">Thumbnail</label>
            <input class="form-control" type="file" name="thumbnail" id="formFile">
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn bg-secondary btn-sm btn-secondary" data-bs-dismiss="modal">Close</button>
          <button type="submit" class="btn bg-primary btn-sm btn-primary">Create</button>
        </div>
        </form>
      </div>
    </div>
   
