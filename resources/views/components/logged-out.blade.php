<!DOCTYPE html>
<html class="w-full overflow-x-hidden" lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>
        {{ $title ?? 'Scholarspace' }}
    </title>
    <meta name="google-site-verification" content="lpki7YHn9zLN5Is7lsjRYSzHIXMSiEErVlY6ppajh2o" />
    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <meta http-equiv="Content-Security-Policy" content="upgrade-insecure-requests" />
    <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet"/>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">

    <!-- Standard Meta Tags -->
    <meta name="title" content="Scholarspace - Premium Essay Writing Services for College Students">
    <meta name="description" content="Discover Scholarspace, your go-to platform for high-quality, professional essay writing services tailored for college students. Achieve academic excellence with our expert writers.">
    <meta name="keywords" content="essay writing services, academic writing, college essays, professional writers, plagiarism-free papers, essay help">
    <meta name="author" content="Scholarspace">
    <meta name="robots" content="index, follow">

    <!-- Open Graph Meta Tags -->
    <meta property="og:title" content="Scholarspace - Premium Essay Writing Services for College Students">
    <meta property="og:description" content="Discover Scholarspace, your go-to platform for high-quality, professional essay writing services tailored for college students. Achieve academic excellence with our expert writers.">
    <meta property="og:type" content="website">
    <meta property="og:url" content="https://www.scholarspace.me">
    <meta property="og:image" content="https://www.scholarspace.me/assets/images/og-image.jpg">
    <meta property="og:site_name" content="Scholarspace">
    <meta property="og:locale" content="en_US">

    <!-- Twitter Card Meta Tags -->
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:title" content="Scholarspace - Premium Essay Writing Services for College Students">
    <meta name="twitter:description" content="Discover Scholarspace, your go-to platform for high-quality, professional essay writing services tailored for college students. Achieve academic excellence with our expert writers.">
    <meta name="twitter:image" content="https://www.scholarspace.me/assets/images/twitter-card.jpg">
    <meta name="twitter:site" content="@Scholarspace">
    <meta name="twitter:creator" content="@Scholarspace">

    <!-- Additional Meta Tags -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="canonical" href="https://www.scholarspace.me">
    <link rel="icon" type="image/png" href="{{ asset('images/favicon.png') }}">
    <link rel="apple-touch-icon" href="{{ asset('images/favicon.png') }}">
    <meta name="robots" content="index, follow">

</head>
<body class="font-sans text-black/80 w-full overflow-x-hidden min-h-screen flex justify-between flex-col bg-gray-50 antialiased">
@include('layouts.navigation.logged-out')
@include('session.alerts')
{{ $slot }}
@include('layouts.footer')
</body>
</html>
