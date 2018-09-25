<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="apple-touch-icon" sizes="76x76" href="{{asset('assets/img/apple-icon.png')}}">
    <link rel="icon" type="image/png" href="{{asset('assets/img/favicon.ico')}}">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>
     @extends('layouts.partials.css')
    <link rel="stylesheet" href="{{asset('assets/css/toastr.min.css')}}">
    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">


    <!DOCTYPE html>
    <html lang="en">

    <head>



</head>
<body>
    <div id="app">
        <div class="wrapper">
            @include('layouts.partials.sidebar')
            <div class="main-panel">
                @include('layouts.partials.nav')
                @yield('content')

                @extends('layouts.partials.footer')
            </div>
        </div>



    </div>

    <!-- Scripts -->
    {{--<script src="{{ asset('js/app.js') }}"></script>--}}
    @include('layouts.partials.js')
@yield('scripts')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script type="text/javascript" src="//cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>

    <script type="text/javascript">
        $(document).ready( function () {
            $('.datatables').datatables();
        } );
    </script>
    <script src="{{asset('assets/js/toastr.min.js')}}"></script>
    <script>
        @if(Session::has('success'))
        toastr.success("{{Session::get('success')}}")
        @endif

    </script>

</body>
</html>
