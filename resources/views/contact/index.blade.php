@extends('layout.app')

@section('content')
    @include('home.partials.contact')
    <div class="w-full h-[400px]">
    <iframe
        src="https://www.google.com/maps?q=-11.980154087238967,-77.06918009325446&hl=es&z=16&output=embed"
        width="100%"
        height="100%"
        style="border:0;"
        allowfullscreen
        loading="lazy"
        referrerpolicy="no-referrer-when-downgrade">
    </iframe>
</div>
@endsection
