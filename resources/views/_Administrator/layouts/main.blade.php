<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="A fully featured admin theme which can be used to build CRM, CMS, etc.">
        <meta name="author" content="Coderthemes">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <link rel="shortcut icon" href="assets/images/favicon_1.ico">

        <title>Ubold - Responsive Admin Dashboard Template</title>

        @include('_Administrator.layouts._css')

    </head>
    <body class="fixed-left">

        <div id="wrapper">

            @include('_Administrator.layouts.header')

            @include('_Administrator.layouts.side')

            <div class="content-page">
                <div class="content">
                    <div class="container">
                        @yield('content')
                        @include('_Administrator.layouts.footer')
                    </div>
                </div>
            </div>

            @include('_Administrator.layouts._js')

        </div>

    </body>
</html>