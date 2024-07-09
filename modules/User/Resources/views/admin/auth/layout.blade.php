<!DOCTYPE html>
<html>
    <head>
        <base href="{{ url('/') }}">
        <meta charset="UTF-8">
        <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">

        <title>
            @yield('title') - FleetCart
        </title>

        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Manrope:wght@200..800&family=Plus+Jakarta+Sans:ital,wght@0,200..800;1,200..800&display=swap" rel="stylesheet">

        @vite([
            'modules/User/Resources/assets/admin/sass/auth.scss',
            'modules/User/Resources/assets/admin/js/auth.js',
        ])

        @include('admin::partials.globals')
    </head>

    <body class="clearfix {{ is_rtl() ? 'rtl' : 'ltr' }}" dir="{{ is_rtl() ? 'rtl' : 'ltr' }}">
        <div class="login-page">
            @yield('content')
        </div>
    </body>
</html>
