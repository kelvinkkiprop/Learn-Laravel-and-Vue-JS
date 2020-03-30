<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel and VueJS Articles</title>

        <!-------------- CSRF Token -------------->
        <meta name="csrf-token" content="{{  csrf_token()    }}">
        <!-------------- Fonts -------------->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
         <!-------------- Latest compiled and minified Bootstrap CSS -------------->
        <link href="{{ asset('bootstrap-4.4.1-dist/css/bootstrap.min.css') }}"  rel="stylesheet">

    </head>
    <body>

        <!-- Bring In Vue Components -->
        <div id="app">            
            {{-- <example-component></example-component> --}}
            <navbar></navbar>
            <div class="container">
                <articles></articles>
            </div>

        </div>
        <!-- ./ Bring In Vue Components -->


        <!-------------- jQuery library -------------->
        <script src="{{ asset('jQuery/jQuery 3.4.1.js') }}"></script>
        <!-------------- Popper JS -------------->
        <script src="{{ asset('popper/popper.min.js') }}"></script>
        <!-------------- Latest compiled Bootstrap JavaScript -------------->
        <script src="{{ asset('bootstrap-4.4.1-dist/js/bootstrap.min.js') }}"></script> 
        <!-------------- App Script -------------->
        <script src="{{ asset('js/app.js') }}"></script>

    </body>
</html>
