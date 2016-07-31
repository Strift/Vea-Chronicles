<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta id="token" name="token" value="{{ csrf_token() }}">
        <title>Vea Chronicles</title>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
        <link rel="stylesheet" href="{{ asset('css/backoffice.css') }}" type="text/css">
    </head>

    <body>
        @yield('body')
        <script src="{{ asset('js/vendor.js') }}"></script>
        @yield('scripts')
    </body>
</html>
