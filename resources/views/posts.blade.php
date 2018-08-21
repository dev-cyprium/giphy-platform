@extends('layouts.main')

@section('content')
  @auth
    @include('gifs.new')
  @endauth
  
  @foreach($posts as $r)
  <div class="card my-3 post">
      <div class="card-header d-flex">
      <img src="{{ Gravatar::get($r->user->email) }}">
        <h1>{{ $r->user->email }}</h1>
      <form class='ml-auto' method="POST" action="{{ route('delete-post', $r['id']) }}">
          @csrf
          {{ method_field('delete') }}
          <button class='btn btn-danger'>Delete</button>
        </form>
      </div>
      <div class="card-body text-center">
        <img class='responsive-image' src="{{ $r['giphy']['image']['url'] }}">
      </div>
    </div>
  @endforeach
  {{ $posts->links() }}
@endsection