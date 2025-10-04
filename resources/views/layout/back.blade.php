<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="apple-touch-icon" sizes="57x57" href="/apple-icon-57x57.png">
    <link rel="apple-touch-icon" sizes="60x60" href="/apple-icon-60x60.png">
    <link rel="apple-touch-icon" sizes="72x72" href="/apple-icon-72x72.png">
    <link rel="apple-touch-icon" sizes="76x76" href="/apple-icon-76x76.png">
    <link rel="apple-touch-icon" sizes="114x114" href="/apple-icon-114x114.png">
    <link rel="apple-touch-icon" sizes="120x120" href="/apple-icon-120x120.png">
    <link rel="apple-touch-icon" sizes="144x144" href="/apple-icon-144x144.png">
    <link rel="apple-touch-icon" sizes="152x152" href="/apple-icon-152x152.png">
    <link rel="apple-touch-icon" sizes="180x180" href="/apple-icon-180x180.png">
    <link rel="icon" type="image/png" sizes="192x192" href="/android-icon-192x192.png">
    <link rel="icon" type="image/png" sizes="32x32" href="/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="96x96" href="/favicon-96x96.png">
    <link rel="icon" type="image/png" sizes="16x16" href="/favicon-16x16.png">
    <link rel="manifest" href="/manifest.json">
    <meta name="msapplication-TileColor" content="#ffffff">
    <meta name="msapplication-TileImage" content="/ms-icon-144x144.png">
    <meta name="theme-color" content="#ffffff">
    <meta property="og:title" content="Droguería Jaén | Tu socio en salud" />
    <meta property="og:description"
        content="En Droguería Jaén somos una empresa del rubro salud dedicada a ofrecer soluciones confiables e integrales para el bienestar de las personas y el fortalecimiento del sector sanitario." />
    <meta property="og:url" content="https://drogueriajaen.com.pe" />
    <meta property="og:type" content="article" />
    <meta property="og:image" content="https://drogueriajaen.com.pe/THUMBNAIL.png" />
    <meta property="og:site_name" content="Droguería Jaén" />

    <meta property="og:image:width" content="1200" />
    <meta property="og:image:height" content="625" />
    <meta property="og:image:alt" content="Descripción alternativa de la imagen para accesibilidad" />
    <title>Droguería Jaén | Tu socio en salud</title>
    <meta name="description"
        content="En Droguería Jaén somos una empresa del rubro salud dedicada a ofrecer soluciones confiables e integrales para el bienestar de las personas y el fortalecimiento del sector sanitario.">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Hind:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    @vite(['resources/css/app.css', 'resources/js/app.js', 'resources/back/styles/main.css', 'resources/back/back.js'])
    <meta name="csrf-token" content="{{ csrf_token() }}">
</head>

<body class="overflow-x-hidden">
    @include('layout.partials.header')

    <div id="app" class="max-width mx-auto px-4 py-8">
    </div>

    @include('layout.partials.footer')
</body>

</html>