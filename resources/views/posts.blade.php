@extends('layout')

@section('content')
  @include('gifs.new')
  @foreach($result as $r)
  <div class="card my-3">
      <div class="card-header">
        {{ $r['title'] }}
      </div>
      <div class="card-body">
        <img class='responsive-image' src="{{ $r['image']['url'] }}">
      </div>
    </div>
  @endforeach
@endsection