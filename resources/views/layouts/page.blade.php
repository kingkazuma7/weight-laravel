<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <meta name="description" content="@yield('meta_description', config('app.meta.description'))">
        <meta name="keywords" content="@yield('meta_keywords', config('app.meta.keywords'))">

        <title>@yield('meta_title', config('app.meta.title'))</title>

        <!-- OGP -->
        <meta property="og:title" content="@yield('meta_title', config('app.meta.title'))">
        <meta property="og:type" content="website">
        <meta property="og:url" content="{{ url()->current() }}">
        <meta property="og:image" content="{{ asset('images/logo.webp') }}">
        <meta property="og:description" content="@yield('meta_description', config('app.ogp.description'))">
        <meta property="og:site_name" content="{{ config('app.ogp.site_name') }}">

        <!-- Twitter Card -->
        <meta name="twitter:card" content="summary_large_image">
        <meta name="twitter:site" content="@369work_">
        <meta name="twitter:title" content="@yield('meta_title', config('app.meta.title'))">
        <meta name="twitter:description" content="@yield('meta_description', config('app.ogp.description'))">
        <meta name="twitter:image" content="{{ asset('images/logo.webp') }}">

        <link rel="canonical" href="{{ url()->current() }}">
        <link rel="icon" href="{{ asset('images/logo.webp') }}" type="image/x-icon">

        <!-- Scripts -->
        <script src="https://cdn.tailwindcss.com"></script>
        <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600;700&display=swap" rel="stylesheet">
    </head>
    <body class="font-sans antialiased">
        <div class="min-h-screen flex flex-col">
            <a href="#main" class="skip-link sr-only focus:not-sr-only">
                メインコンテンツへスキップ
            </a>
            @include('layouts.header')

            <!-- Page Content -->
            <main id="main">
                {{ $slot }}
            </main>

            @include('layouts.footer')
        </div>
    </body>
</html>
