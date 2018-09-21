<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>Giphogram</title>

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
                <aside class="tile avatar">
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
                <div class="tile content">
                    <div class="step-form">
                        <multi-step-form>
                            <form-step class="form-input">
                                <textarea placeholder="Express yourself"></textarea>
                            </form-step>
                            <form-step>
                                <p>This is step #2</p>
                            </form-step>
                            <form-step>
                                <p>This is step #3</p>
                            </form-step>
                        </multi-step-form>
                    </div>
                </div>
                <aside class="tile">

                </aside>
            </main>
        <div class='container'>
            @if($errors->has('pop_message'))
            <div class="alert alert-danger alert-dismissible fade show">
                <button type="button" class="close" data-dismiss="alert">&times;</button>
                {{ $errors->first('pop_message') }}
            </div>
            @endif
            <div class='row'>
                <main role='main' class='offset-md-1 col-md-7' >
                    @yield('content')
                </main>

                <aside class='col-md-3'>
                    @include('aside')
                </aside>
            </div>
        </div>
    </div>

    <script src="{{ asset('js/app.js') }}">
    </script>    
    </body>
</html>
