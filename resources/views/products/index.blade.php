@extends('layout.app')

@section('content')
    <div>
        {{-- @include('products.partials.catalogs') --}}
        <catalog-products></catalog-products>
    </div>
    @include('home.partials.products', [
    'background_color' => 'bg-primary',
    'title_text' => 'Productos Destacados',
    'title_color' => '!text-white',
    'bg_button' => 'bg-white',
    'text_button' => 'text-primary',
])
@endsection
