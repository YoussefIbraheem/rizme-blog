 <!-- Edit Post Modal -->
{{-- @if(isset($posts))
 @foreach ($posts as $post ) --}}
 <div class="modal fade" id="editPost{{ $post->id }}" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="staticBackdropLabel">Edit Post</h5>
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
            <label for="exampleFormControlTextarea1" class="form-label">Add Thumbnail</label>
            <input value="{{ $post->thumbnail }}" class="form-control" type="file" name="thumbnail" id="formFile">
          </div>
          <div class="mb-3">
            <label for="">Remove Photo</label>
            <input name="checkThumbnail" type="checkbox" class="form-control">
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
  {{-- @endforeach
  @endif --}}