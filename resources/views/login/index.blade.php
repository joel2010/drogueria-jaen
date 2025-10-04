@extends('layout.app')

@section('content')
    <div class="auth">
        <h2 class="text-title2 mb-10 text-center">Iniciar sesión</h2>
        <form action="/login" class="auth__form" method="POST">
            @csrf
            <div class="form-group">
                <label for="email">Correo electrónico</label>
                <input type="email" name="email" class="w-full border border-gray-300 rounded-lg p-2 focus:outline-none focus:ring-2 focus:ring-primary" required value="{{ old('email') }}" />
                @error('email')
                    <div class="error">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group">
                <label for="password">Contraseña</label>
                <input type="password" name="password" class="w-full border border-gray-300 rounded-lg p-2 focus:outline-none focus:ring-2 focus:ring-primary" required />
                @error('password')
                    <div class="error">{{ $message }}</div>
                @enderror
            </div>
            <button type="submit" class="w-full bg-primary text-white font-semibold py-2 px-8 rounded-full shadow-lg hover:bg-primary-dark transition-colors duration-300">Iniciar sesión</button>
        </form>
    </div>
@endsection