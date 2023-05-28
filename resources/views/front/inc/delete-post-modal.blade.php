{{-- @if(isset($posts))
 @foreach ($posts as $post) --}}
<div class="modal fade" id="deletePost{{ $post->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">
        <div class="modal-header">
          <h1 class="modal-title fs-5" id="exampleModalLabel">Delete Post</h1>
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
    {{-- @endforeach
    @endif --}}