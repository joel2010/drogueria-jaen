@extends('layout.app')

@section('content')
    <div>
        {{-- @include('products.partials.catalogs') --}}
        <catalog-products></catalog-products>
    </div>
    @include('products.partials.products-featured')
@endsection
