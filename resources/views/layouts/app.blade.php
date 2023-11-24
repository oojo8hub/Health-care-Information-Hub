<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <title>Evidence-informed guidelines and tools | WebNP</title>

        <!-- Fonts -->
        <link rel="stylesheet" href="https://fonts.bunny.net/css2?family=Nunito:wght@400;600;700&display=swap">

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
        <script src="{{ asset('js/tinymce/tinymce.min.js') }}" referrerpolicy="origin"></script>
        <script>
            tinymce.init({
                selector: 'textarea#myeditorinstance', // Replace this CSS selector to match the placeholder element for TinyMCE
                plugins: 'powerpaste advcode lists checklist anchor link autolink preview fullscreen',
                toolbar: 'undo redo | blocks| bold italic bullist numlist checklist | link preview fullscreen',
                link_default_target: '_blank',
                promotion: false,
                content_css: "writer",
            });
        </script>

        @livewireStyles
    </head>
    <body class="font-sans antialiased">
        <div class="min-h-screen bg-gray-100">
            @include('layouts.navigation', ['categories' => App\Models\Category::where('active', 1)->take(10)->get()])

            <!-- Page Heading -->
            @if (isset($header))
                <header class="bg-white shadow">
                    <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                        {{ $header }}
                    </div>
                </header>
            @endif

            <!-- Page Content -->
            <main>
                {{ $slot }}
            </main>
        </div>

        @stack('scripts')
        @livewireScripts
    </body>
</html>
