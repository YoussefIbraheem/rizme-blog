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
            <input type="text" name="title" class="form-control" id="exampleFormControlInput1" placeholder="Title...">
          </div>
          <div class="mb-3">
            <label for="exampleFormControlTextarea1" class="form-label">Body</label>
            <textarea name="body" class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
          </div>
          <div class="mb-3">
            <label for="exampleFormControlTextarea1" class="form-label">Thumbnail</label>
            <input class="form-control" type="file" name="thumbnail" id="formFile">
          </div>
          <div class="mb-3">
            @foreach ($showCategories as $createCategory)
            <input type="checkbox" value="{{ $createCategory->id }}" name="categories[]" class="btn-check" id="create-checkbox{{ $createCategory->id }}" autocomplete="off">
            <label class="btn m-1 btn-sm btn-primary" for="create-checkbox{{ $createCategory->id }}">{{ $createCategory->category }}</label>
            @endforeach
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn bg-secondary btn-sm btn-secondary" data-bs-dismiss="modal">Close</button>
          <button type="submit" class="btn bg-primary btn-sm btn-primary">Create</button>
        </div>
        </form>
      </div>
    </div>
  </div>