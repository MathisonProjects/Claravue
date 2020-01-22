<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        @if (isset($settings['metaTitle']))
            <title> {{ $settings['metaTitle'] }}</title>
        @else
            <title>Vue Laravel Clean</title>
        @endif
        @if (isset($settings['metaTitle']))
            <meta name="description" content="{{ $settings['metaTagDescription'] }}">
        @else
            <meta name="description" content="Default template for managing all websites by Mathison Projects">
        @endif
        @if (isset($settings['metaTagKeywords']))
            <meta name="keywords" content="{{ $settings['metaTagKeywords'] }}">
        @else
            <meta name="keywords" content="">
        @endif
        <meta charset="UTF-8">
        <meta name="author" content="Jacob Mathison">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <meta property="og:title" content="Mathison Projects" />
        <meta property="og:url" content="https://dev-mathison-cloud.mathisonprojects.dev" />
        <meta property="og:image:type" content="image/png" />
        <meta property="og:image" content="{{ $settings['baseUrl'] }}images/android-chrome-512x512_1.png" />
        <meta property="og:image:secure_url" content="{{ $settings['baseUrl'] }}images/android-chrome-512x512_1.png" />
        <meta property="og:image:width" content="512" />
        <meta property="og:image:height" content="512" />
        <link rel="icon" href="/images/icons/favicon.ico">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <link rel="stylesheet" href="/css/app.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/MaterialDesign-Webfont/4.7.95/css/materialdesignicons.css">
        <link href='https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Material+Icons' rel="stylesheet">
    </head>
    <body class='h-100'>
        <div id='app'>
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
