@extends('layouts.main')

@section('content')
  @auth
    @include('gifs.new')
  @endauth
  
  <example></example>
  @foreach($posts as $r)
  <div class="card my-3 post">
      <div class="card-header d-flex">
        <img class="gravatar-image" src="{{ Gravatar::get($r->user->email) }}">
        <h1>
          @if(!(isset($noLinkName) ? $noLinkName : false))
          <a href='{{ route('user-posts', $r->user) }}'>
            {{ $r->user->name }}
          </a>
          @else
            {{ $r->user->name }}
          @endif
        </h1>
        <form class='ml-auto' method="POST" action="{{ route('delete-post', $r['id']) }}">
          @csrf
          {{ method_field('delete') }}
          @if (Auth::user() && Auth::user()->can('delete', $r))
            <button class='btn btn-danger'>Delete</button>
          @else
            <a href='#' class='btn btn-warning'>Report</a>
          @endif
        </form>
      </div>
      <div class="card-body text-center">
        <img class='responsive-image' src="{{ $r['giphy']['image']['url'] }}">
      </div>
    </div>
  @endforeach
  {{ $posts->links() }}
@endsection