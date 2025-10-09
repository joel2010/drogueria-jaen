@extends('layout.app')

@section('content')
    @foreach ($banners as $banner)
        @if ($banner->computer && $banner->mobile)
        <x-HeroSection
            image="/storage/{{ $banner->computer->file_path }}"
            title="{{ $banner->title }}"
            showWspButton="true"
        />
        @endif
    @endforeach

    @include('home.partials.featured')
    @include('home.partials.about')
    @include('home.partials.help')
    @include('home.partials.benefits')
    @include('home.partials.products')
    @include('home.partials.contact')
@endsection
