@extends('layouts.main')

@section('content')
  <new-report-modal  :manager="modalManager"></new-report-modal>
  <delete-post-modal :manager="modalManager"></delete-post-modal>

  @foreach($posts as $r)
    <div class="post">
      <div class="post__header">
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
        <h2>5 days ago</h2>
      </div>
      <div class="post__body text-center">
        <img class='responsive-image' src="{{ $r['giphy']['image']['url'] }}">
      </div>
      <div class="post__controlls">
       @if (Auth::user() && Auth::user()->can('delete', $r))
       <a href='#' @click.prevent="modalManager.openModal('delete-post-modal', '{{$r['giphy_id']}}')">
          Delete
          <i class="fas fa-exclamation-triangle"></i>
        </a>
        @else
        <a href='#' @click.prevent="modalManager.openModal('new-report-modal', {})">
          Report
          <i class="fas fa-exclamation-triangle"></i>
        </a>
        @endif
      </div>
    </div>
    @endforeach 
  {{ $posts->links() }}
@endsection