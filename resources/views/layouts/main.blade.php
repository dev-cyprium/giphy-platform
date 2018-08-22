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

    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    </head>
    <body>
        <div class='container' id='app'>
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


    <script src="{{ asset('js/app.js') }}">
    </script>    
    </body>
</html>
