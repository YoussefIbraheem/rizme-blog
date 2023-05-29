@extends('front/inc/layout')

@section('content')

<div class="heading-page header-text">
    <section class="page-heading">
      <div class="container">
        <div class="row">
          <div class="col-lg-12">
            <div class="text-content">
              <h4>Messages</h4>
              <h2>Users Messages</h2>
            </div>
          </div>
        </div>
      </div>
    </section>
  </div>
  <div class="container w-50 text-center">
    <div class="row">
      @include('front.inc.error')
      @include('front.inc.success')
    </div>
  </div>
<section class="p-5">
<table class="table table-striped">
    <thead>
        <tr>
          <th scope="col">#</th>
          <th scope="col">Subject</th>
          <th scope="col">Message</th>
          <th scope="col">Name</th>
          <th scope="col">Recevied At</th>
          <th scope="col">Actions</th>
          <th scope="col">Sorted</th>
        </tr>
      </thead>
      <tbody>
        @foreach ($messages as $message )
        <tr>
            <th scope="row">{{ $loop->iteration }}</th>
            <td>{{ $message->subject }}</td>
            <td><textarea disabled name="" id="" cols="45" rows="5">{{ $message->body }}</textarea></td>
            <td>{{ $message->name }}</td>
            <td>{{ $message->created_at }}</td>
            <td>
            <button type="button" class="btn bg-info btn-info" data-bs-toggle="modal" data-bs-target="#sendMail{{ $message->id }}">
                Send Email
            </button>
            </td>
            <td>
              <form class="inline-block" method="POST" action="{{ url("change-status/$message->id") }}">
                @csrf
              @if($message->sorted == true)
              <button><i class="fa-solid fa-check fa-2xl" style="color: #006400;"></i></button>
              @else
              <button><i class="fa-solid fa-xmark fa-2xl" style="color: #ff0000;"></i></button>
              @endif
              </form>
            </td>
          </tr>   
         
        @endforeach
      </tbody>
  </table>
</section>
@include('front.inc.email-modal')
@endsection