@if ($errors->any())
<div class="my-5">
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
</div>