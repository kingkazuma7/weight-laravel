<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <meta name="google-site-verification" content="6SNLD4Z1k89AAcyohUG5cpxsqiCxqkX12VetSTQVdIo" />
        <meta name="description" content="@yield('meta_description', config('app.meta.description'))">
        <meta name="keywords" content="@yield('meta_keywords', config('app.meta.keywords'))">

        <title>@yield('meta_title', config('app.meta.title'))</title>

        @if(env('APP_ENV') === 'production')
        <!-- Google tag (gtag.js) -->
        <script async src="https://www.googletagmanager.com/gtag/js?id=G-0B5S0SKBTH"></script>
        <script>
            window.dataLayer = window.dataLayer || [];
            function gtag(){dataLayer.push(arguments);}
            gtag('js', new Date());

            gtag('config', 'G-0B5S0SKBTH');
        </script>
        @endif

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
        <!-- Favicon -->
        <link rel="icon" href="{{ asset('mma_favicon.svg') }}" type="image/svg+xml">
        <link rel="alternate icon" href="{{ asset('favicon.ico') }}" type="image/x-icon">
        <link rel="icon" type="image/png" sizes="32x32" href="{{ asset('favicon-32x32.png') }}">
        <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('favicon-16x16.png') }}">
        <link rel="apple-touch-icon" href="{{ asset('images/logo.webp') }}">

        <!-- Styles -->
        <link href="{{ asset('css/app.css') }}" rel="stylesheet">
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
                @yield('content')
            </main>

            @include('layouts.footer')
        </div>
    </body>
</html>
