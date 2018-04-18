<!DOCTYPE html>
<html lang="en">
    <head>
        <script>
            window.Laravel = {
                'csrfToken': "{{ csrf_token() }}",
                'siteName': "{{ config('app.name') }}",
                'apiDomain': "{{ config('app.url').'/api' }}",
                'URI': "/wizard/"
            }
        </script>
        <meta name="_token" content="{{ csrf_token() }}"/>
        <link rel="stylesheet" href="{{ asset('/assets/vendor/font-awesome/css/font-awesome.min.css') }}">
        <link rel="stylesheet" href="{{ asset('/css/easywiz.css') }}">
        <title>Wizard</title>
    </head>
    <body>
        <div class="app-wrapper">
            <section id="app">
                <app></app>
            </section>
        </div>
        <script src="{{ asset('/js/app.js') }}"></script>
    </body>
</html>
