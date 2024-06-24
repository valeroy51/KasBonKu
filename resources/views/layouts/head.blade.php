<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title')</title>
    <link rel="shortcut icon" type="image/png" href="{{ asset('../assets/images/logos/favicon.png')}}" />
    <link rel="stylesheet" href="{{ asset('./assets/css/styles.min.css')}}"/>
    <meta name="csrf-token" content="{{ csrf_token() }}">
</head>