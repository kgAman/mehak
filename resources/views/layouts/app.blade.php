<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="scroll-smooth">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        
        <title>{{ config('app.name', 'Property Maintenance') }}</title>

        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400;600;800;900&display=swap" rel="stylesheet">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    
    <body class="font-['Montserrat',_sans-serif] antialiased bg-slate-950 text-white min-h-screen flex flex-col">
        
        <div class="relative z-50">
            @include('layouts.navigation')
        </div>

        @isset($header)
            <header class="bg-slate-900 border-b-4 border-amber-500 shadow-xl">
                <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                    {{ $header }}
                </div>
            </header>
        @endisset

        <main class="flex-grow w-full relative z-10">
            {{ $slot }}
        </main>

        <div class="relative z-20">
            @include('partials.home.footer')
        </div>

        <script src="https://unpkg.com/lucide@latest"></script>
        <script>
            document.addEventListener('DOMContentLoaded', () => {
                lucide.createIcons();
            });
        </script>
        
        <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>

    </body>
</html>