@extends('layouts.main')

@section('content')
  <new-report-modal  :manager="modalManager"></new-report-modal>
  <delete-post-modal :manager="modalManager"></delete-post-modal>

  @foreach($posts as $r)
  <giphy-post :modal-manager="modalManager" inline-template>
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
        <h2>{{ $r->display_time }}</h2>
      </div>
      <div class="post__description">
        <p>The description of this post must be a cool description</p>
      </div>
      <div class="post__body text-center">
        <responsive-image url="{{ $r['giphy']['image']['url'] }}" ></responsive-image>
      </div>
      <div class="post__controlls">
        <a href='#' :class="[{'post__icon--shake': likeShaking},'post__icon']" 
          @click.prevent="likeShaking = true" 
          @animationend="likeShaking = false"
        >
          <i class="fas fa-thumbs-up"></i>
        </a>
       @if (Auth::user() && Auth::user()->can('delete', $r))
          <a href='#' class="post__icon" @click.prevent="modalManager.openModal('delete-post-modal', '{{$r['giphy_id']}}')">
            <i class="fa fa-trash"></i>
          </a>
        @else
          <a href='#' class="post__icon" @click.prevent="modalManager.openModal('new-report-modal', {})">
            <i class="fas fa-exclamation-triangle"></i>
          </a>
        @endif
      </div>
      <div class="gray-border"></div>
      <div class="post-comments">
          @if ($r->comments->count() == 0)
            <div class="post-comment post-comment--empty">
              {{ __('utils.no_comments') }}
            </div>
          @endif
          @foreach($r->comments as $comment)
            <div class="post-comment">
                <span class="post-comment__user">{{ $comment->user->name }}&nbsp;</span>
                {{ $comment->text }}
            </div>
          @endforeach
      </div>
      <div class="gray-border"></div>
      <div class="post-comment-form">
        <form>
          <input class="post-comment-form__input" type="text" placeholder="{{ __('forms.comment.new') }}">
        </form>
      </div>
    </div>
    </giphy-post>   
    @endforeach 
  {{ $posts->links() }}
@endsection