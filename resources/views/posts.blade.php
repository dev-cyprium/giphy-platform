@extends('layout')

@section('content')
  @include('gifs.new')
  @foreach($result as $r)
  <div class="card my-3 post">
      <div class="card-header d-flex">
        <h1>{{ $r['title'] }}</h1>
      <form class='ml-auto' method="POST" action="{{ route('delete-post', $r['id']) }}">
          @csrf
          {{ method_field('delete') }}
          <button class='btn btn-danger'>Delete</button>
        </form>
      </div>
      <div class="card-body text-center">
        <img class='responsive-image' src="{{ $r['image']['url'] }}">
      </div>
    </div>
  @endforeach
@endsection