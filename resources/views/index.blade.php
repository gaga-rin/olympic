<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Olympic App</title>
    </head>
    <body>
        <div id="app">
            <a>テスト</a>
            <index-component></index-component>
        </div>
        <script src="{{mix('js/app.js')}}"></script>
    </body>
</html>
