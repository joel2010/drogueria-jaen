@extends('layout.app')

@section('content')

{{-- <home-section></home-section> --}}
    <x-HeroSection
        class="h-[200px]"
        image="/images/home-banner.png"
        title="¿Quiénes Somos?"
        showWspButton="true"
    />



    @include('home.partials.featured')
    @include('home.partials.about')
    @include('home.partials.help')
    @include('home.partials.benefits')
    @include('home.partials.products')
    @include('home.partials.contact')
@endsection
