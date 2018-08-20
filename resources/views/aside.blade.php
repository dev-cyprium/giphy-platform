@guest
<form method="POST" action="{{ route('do-login') }}">
    @csrf
    <div class="form-group">
        <h1>Giphogram</h1>
    </div>
    <div class="form-group">
      <label for="exampleInputEmail1">Email address</label>
      <input type="email" name='email' class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email">
    </div>
    <div class="form-group">
      <label for="exampleInputPassword1">Password</label>
      <input type="password" name='password' class="form-control" id="exampleInputPassword1" placeholder="Password">
    </div>
    <button type="submit" class="btn btn-primary">Login</button>
  </form>
@else
  <h1>{{ Auth::user()->name }}</h1>
  <a href='{{ route('do-logout') }}' class="btn btn-primary">Logout</a>
@endauth