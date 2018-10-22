<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>Giphygram</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet" type="text/css">
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">

        <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    </head>
    <body>
    <div id='app'>
            <nav class="site-navigation">
                <div class="site-navigation__header">
                    <img class="site-navigation__logo" src={{ asset('img/logo.svg') }} >
                    <div class="site-navigation__search">
                        <div class="form-input form-input--left-extension">
                            <input type="text" placeholder="Search people...">
                            <i class="fas fa-search"></i>
                        </div>
                    </div>
                </div>
                <div class="site-navigation__navbar">
                    <ul>
                        <li class="link link--is-active">
                            <a href='#'>Trending</a>
                        </li>
                        <li class="link">
                            <a href='#'>Fresh</a>
                        </li>
                        <li class="link">
                            <a href='#'>Friends</a>
                        </li>
                    </ul>
                </div>
            </nav>
            <main class="my-container" role="main">
                <aside class="tile avatar align-self-start">
                    @auth
                        <div class="avatar__image">
                            <img src="{{ Gravatar::get(Auth::user()->email) }}" />
                        </div>
                        <h1>{{ Auth::user()->email }}</h1>
                        <h2>{{ Auth::user()->name }}</h2>
                        <div class="avatar__stats">
                            <div class="avatar__stat">
                                <h3>21</h3>
                                <h4>Posts</h4>
                            </div>
                            <div class="avatar__stat">
                                <h3>120</h3>
                                <h4>Upvotes</h4>
                            </div>
                        </div>
                    @endauth
                </aside>
                <div class="content">
                    @auth
                    <div class="tile">
                        @include("gifs.new")
                    </div>
                    @endauth
                    <div class='gifs'>
                        @yield('content')
                    </div>
                </div>

                <aside class="tile mleft-2 align-self-start">
                    @include('aside')
                </aside>
            </main>
        <div class='my-container justify-content-center'>
            @if($errors->has('pop_message'))
            <div class="alert alert-danger alert-dismissible fade show">
                <button type="button" class="close" data-dismiss="alert">&times;</button>
                {{ $errors->first('pop_message') }}
            </div>
            @endif
        </div>
    </div>
    
    <div>
        {{ Debuger::logQueryDataAsJSON() }}
    </div>

    <script src="{{ asset('/js/manifest.js') }}"></script>
    <script src="{{ asset('/js/vendor.js') }}"></script>
    <script src="{{ asset('js/app.js') }}">
    </script>    
    </body>
</html>