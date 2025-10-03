@extends('layout.app')

@section('content')

    <x-HeroSection
        image="/images/home-banner.png"
        title="En Droguería Jaén, la salud es un compromiso compartido"
        showWspButton="true"
    />

    @include('home.partials.featured')
    @include('home.partials.about')
    @include('home.partials.help')
    @include('home.partials.benefits')
    @include('home.partials.products')
    @include('home.partials.contact')
@endsection
