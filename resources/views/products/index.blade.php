@extends('layout.app')

@section('content')
    <div>
        @include('products.partials.catalogs')
    </div>
    @include('products.partials.products-featured')
@endsection
