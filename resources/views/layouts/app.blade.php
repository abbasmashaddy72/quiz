<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Favicon -->
    <link rel="shortcut icon" href="{{ asset('favicon.ico') }}" />
    <!-- Styles -->
    <link rel="stylesheet" href="{{ mix('css/app.css') }}">
    <style>
        [x-cloak] {
            display: none !important;
        }

    </style>
    @stack('styles')
    <!-- Livewire styles -->
    <livewire:styles />
</head>

<body class="overflow-x-hidden bg-body dark:bg-dark-bg">
    @include('layouts.admin.loader')

    <div>
        @role('competitor')
        @else
            @include('layouts.admin.sidebar')
        @endrole
        <main class="flex flex-col justify-between h-screen main-content" x-data="{ data: true }">
            @role('competitor')
            @else
                <div class="relative">
                    @include('layouts.admin.navbar')
                </div>
            @endrole
            @role('competitor')
                <div class="container-fluid">
                    <div class="flex flex-wrap">
                        {{ $slot }}
                    </div>
                </div>
            @else
                <div class="p-6 py-0 mt-4 mb-auto lg:p-10 lg:py-0 container-fluid">
                    <div class="flex flex-wrap">
                        {{ $slot }}
                    </div>
                </div>
            @endrole
            @include('layouts.admin.footer')
        </main>
    </div>
    <!-- Scripts -->
    @livewireScripts
    @stack('scripts')
    <script src="{{ asset('js/theme/libs.min.js') }}"></script>
    <script src="{{ asset('js/theme/external.min.js') }}"></script>
    <script src="{{ asset('js/theme/hope-ui.js') }}"></script>
    <script src="{{ mix('js/app.js') }}"></script>
    @if (getenv('APP_ENV') === 'local')
        <script id="__bs_script__">
            //<![CDATA[
            document.write("<script async src='http://HOST:3000/browser-sync/browser-sync-client.js?v=2.18.6'><\/script>"
                .replace("HOST", location.hostname));
            //]]>
        </script>
    @endif
</body>

</html>
