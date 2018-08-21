@guest
<form method="POST" action="{{ route('login') }}" aria-label="{{ __('Login') }}">
  @csrf
  <div class="form-group">
    <label for="email">{{ __('E-Mail') }}</label>
      <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required autofocus>

    @if ($errors->has('email'))
        <span class="invalid-feedback" role="alert">
            <strong>{{ $errors->first('email') }}</strong>
        </span>
    @endif
  </div>

  <div class="form-group">
    <label for="password">{{ __('Password') }}</label>

    <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>

    @if ($errors->has('password'))
      <span class="invalid-feedback" role="alert">
        <strong>{{ $errors->first('password') }}</strong>
      </span>
    @endif
  </div>

  <div class="d-flex">
    <button type="submit" class="btn btn-primary">
        {{ __('Login') }}
    </button>
    <a href="{{ route('register') }}" class="btn btn-primary ml-auto">Register</a>
  </div>
</form>
@else
  <h1>{{ Auth::user()->name }}</h1>
  <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();" class="btn btn-primary">Logout</a>

  <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">{{ csrf_field() }}</form>
@endauth