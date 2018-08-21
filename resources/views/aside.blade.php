@guest
@if ($errors->any())
<div class="alert alert-danger" role="alert">
    <ul>
      @foreach ($errors->all() as $error)
        <li>{{ $error }}</li>
      @endforeach
    </ul>
</div>
@endif
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

  <button type="submit" class="btn btn-primary">
      {{ __('Login') }}
  </button>
</form>
@else
  <h1>{{ Auth::user()->name }}</h1>
  <a href='{{ route('do-logout') }}' class="btn btn-primary">Logout</a>
@endauth