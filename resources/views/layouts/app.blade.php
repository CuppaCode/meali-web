<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="stylesheet" href="https://fonts.bunny.net/css2?family=Nunito:wght@400;600;700&display=swap">

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="font-sans antialiased">
        <div class="flex flex-col flex-wrap w-full h-screen">
            @include('layouts.navigation')

            <div class="flex flex-row flex-wrap w-11/12">
                <!-- Page Heading -->
                @if (isset($header))
                    <header class="flex h-15 w-full bg-orange-500 shadow">
                        <div class="mx-auto py-6 px-4 sm:px-6 lg:px-8">
                            {{ $header }}
                        </div>
                    </header>
                @endif

                <!-- Page Content -->
                <main class="flex p-3 w-full bg-gray-50 h-full overflow-y-scroll">
                    {{ $slot }}
                </main>
            </div>
        </div>
    </body>
</html>
