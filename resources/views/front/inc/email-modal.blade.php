
    {{-- send Email modal --}}
    @if(isset($messages))
   @foreach ($messages as $message )
   <div class="modal fade" id="sendMail{{ $message->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Send Mail</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <form action="{{url("send-email/$message->id")}}" method="POST">
            @csrf
            <div class="mb-3">
              <label for="exampleFormControlInput1" class="form-label">Email</label>
              <input disabled value="{{ $message->email }}" type="email" class="form-control" id="exampleFormControlInput1">
            </div>
            <div class="mb-3">
              <label for="exampleFormControlTextarea1" class="form-label">In Response To</label>
              <textarea disabled name="body" class="form-control" id="exampleFormControlTextarea1" rows="3">{{ $message->body }}</textarea>
            </div>
            <div class="mb-3">
              <label for="exampleFormControlTextarea1" class="form-label">Email Response</label>
              <textarea name="body" class="form-control" id="exampleFormControlTextarea1" rows="10"></textarea>
            </div>
           </div>
           <div class="modal-footer">
             <button type="button" class="btn bg-secondary btn-secondary" data-bs-dismiss="modal">Close</button>
             <button type="submit" class="btn bg-primary btn-primary">Send Mail</button>
        </form>
        </div>
      </div>
    </div>
  </div>
   @endforeach
   @endif

