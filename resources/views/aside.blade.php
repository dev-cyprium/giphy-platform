<div class="affix">
  @guest
  <form method="POST" action="{{ route('login') }}" aria-label="{{ __('forms.login') }}">
    @csrf
    <div class="form-group">
      <label for="email">{{ __('forms.email') }}</label>
        <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required autofocus>

      @if ($errors->has('email'))
          <span class="invalid-feedback" role="alert">
              <strong>{{ $errors->first('email') }}</strong>
          </span>
      @endif
    </div>

    <div class="form-group">
      <label for="password">{{ __('forms.password') }}</label>

      <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>

      @if ($errors->has('password'))
        <span class="invalid-feedback" role="alert">
          <strong>{{ $errors->first('password') }}</strong>
        </span>
      @endif
    </div>

    <div class="d-flex">
      <button type="submit" class="btn btn-primary">
          {{ __('forms.login') }}
      </button>
      <a href="{{ route('register') }}" class="btn btn-primary ml-auto">{{ __('forms.register') }}</a>
    </div>
  </form>
  @else
  <h1>{{ Auth::user()->name }}</h1>  
  <ul>
    <li>
      <a href='{{ route('posts') }}'>{{ __('utils.all_gifs') }}</a>
    </li>
    <li>
      <a href='{{ route('user-posts', Auth::user())}}'>{{ __('utils.my_gifs') }}</a>
    </li>
    <li>
      <a href='#'>{{ __('utils.settings') }}</a>
    </li>
  </ul>
  <div>
    <p class='affix__end'>Powered by <a href='https://developers.giphy.com/' target="_blank">Giphy</a></p>
    <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();" class="form-button">Logout</a>
    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">{{ csrf_field() }}</form>
    @endauth
    <div class="mt-3 translation-control">
      <a href='{{ route('change-locale', 'en') }}'>en</a> // 
      <a href='{{ route('change-locale', 'sr') }}'>sr</a>
    </div>
  </div>
</div>