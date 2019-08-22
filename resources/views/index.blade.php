<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <title>Default Laravel & Vue Deployment</title>
        <meta charset="UTF-8">
        <meta name="description" content="">
        <meta name="keywords" content="">
        <meta name="author" content="Jacob Mathison">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="icon" href="/images/favicon.zing.ico">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <link rel="stylesheet" href="/css/app.css">
        <link rel="stylesheet" href="/css/app.dark.css" disabled>
    </head>
    <body class='h-100'>
        <div id='app' style='margin-bottom: 120px'>
            <router-view></router-view>
        </div>


        <script src="https://cdn.zing.land/js/jquery-3.3.1.min.js"></script>
        <script src="https://cdn.zing.land/js/bootstrap4/popper.min.js"></script>
        <script src="https://cdn.zing.land/js/bootstrap4/tether.min.js"></script>
        <script src="https://cdn.zing.land/js/bootstrap4/bootstrap.min.js"></script>
        <script src="https://kit.fontawesome.com/6685db230c.js"></script>
        <script type="text/javascript" src="/js/bundle.js"></script>
    </body>
</html>
