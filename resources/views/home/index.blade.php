@extends('layout.app')

@section('content')

{{-- <home-section></home-section> --}}
    <x-HeroSection
        image="/images/home-banner.png"
        title="En Droguería Jaén, la salud es un compromiso compartido"
    />



    @include('home.partials.featured')
    @include('home.partials.about')
    @include('home.partials.help')
    @include('home.partials.benefits')
    @include('home.partials.products')
    @include('home.partials.contact')
@endsection
