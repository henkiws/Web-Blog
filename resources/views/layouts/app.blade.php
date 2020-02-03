<!DOCTYPE html>
    <html>
        <head>
            <meta charset="utf-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <meta name="description" content="A fully featured admin theme which can be used to build CRM, CMS, etc.">
            <meta name="author" content="Coderthemes">
                <!-- CSRF Token -->
            <meta name="csrf-token" content="{{ csrf_token() }}">
    
            @include('layouts._css')
    
        </head>
    
    
        <body>

            <div class="site-wrap">

                @include('layouts.header')

                <main id="main">

                    @yield('content')

                </main>

                @include('layouts.footer')

            </div>

            <a href="#" class="back-to-top"><i class="icofont-simple-up"></i></a>

            @include('layouts._js')

        </body>

    </html>