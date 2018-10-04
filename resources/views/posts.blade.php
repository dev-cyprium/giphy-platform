@extends('layouts.main')

@section('content')
  @auth
    @include('gifs.new')
  @endauth
  
  <new-report-modal :open-modal="activeModal" @close="activeModal = ''" ></new-report-modal>
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
        @if (Auth::user() && Auth::user()->can('delete', $r))
          <button class='btn btn-danger' @click="modalManager.openModal('delete-post-modal', '{{$r['giphy_id']}}')">Delete</button>
          @else
            <button class='btn btn-warning' @click="activeModal = 'new-report-modal'">Report</button>
          @endif
      </div>
      <div class="post__body text-center">
        <img class='responsive-image' src="{{ $r['giphy']['image']['url'] }}">
      </div>
    </div>
    @endforeach 
  {{ $posts->links() }}
@endsection