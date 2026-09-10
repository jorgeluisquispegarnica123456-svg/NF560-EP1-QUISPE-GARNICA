<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Librería - Inicio</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />

        <!-- Styles / Scripts -->
        @if (file_exists(public_path('build/manifest.json')) || file_exists(public_path('hot')))
            @vite(['resources/css/app.css', 'resources/js/app.js'])
        @endif
    </head>
    <body class="font-sans antialiased bg-gray-50 text-gray-800">
        <!-- Navegación -->
        <nav class="bg-white shadow-sm border-b border-gray-200">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 h-16 flex items-center justify-between">
                <span class="font-bold text-xl text-indigo-600">📖 Mi Librería</span>
                <div class="space-x-4">
                    <a href="{{ route('inicio') }}" class="text-indigo-600 font-semibold">Inicio</a>
                    <a href="#" class="text-gray-600 hover:text-indigo-600">Catálogo</a>
                    <a href="#" class="text-gray-600 hover:text-indigo-600">Nosotros</a>
                </div>
            </div>
        </nav>

        <!-- Encabezado -->
        <header class="bg-indigo-700 text-white py-12">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
                <h1 class="text-4xl font-extrabold sm:text-5xl">Descubre tu próxima lectura</h1>
                <p class="mt-3 text-indigo-200 text-lg">Explora nuestra selección de libros destacados y novedades.</p>
            </div>
        </header>

        <!-- Listado de Libros -->
        <main class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-10">
            <h2 class="text-2xl font-bold mb-6 text-gray-900">Libros Disponibles</h2>

            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-6">
                @foreach ($libros as $libro)
                    <div class="bg-white rounded-xl shadow-md overflow-hidden flex flex-col border border-gray-100 hover:shadow-lg transition">
                        <!-- Portada dinámica usando el campo 'portada' -->
                        <div class="h-40 bg-gradient-to-br {{ $libro['portada'] }} flex items-center justify-center p-4 relative">
                            @if($libro['destacado'])
                                <span class="absolute top-3 right-3 bg-yellow-400 text-yellow-950 text-xs font-bold px-2.5 py-1 rounded-full shadow">
                                    ★ Destacado
                                </span>
                            @endif
                            <h3 class="text-white font-bold text-xl text-center drop-shadow-md">
                                {{ $libro['titulo'] }}
                            </h3>
                        </div>

                        <!-- Información del Libro -->
                        <div class="p-5 flex-1 flex flex-col justify-between">
                            <div>
                                <div class="flex items-center justify-between text-xs font-semibold text-gray-500 uppercase tracking-wider mb-2">
                                    <span>{{ $libro['categoria'] }}</span>
                                    <span>{{ $libro['anio'] }}</span>
                                </div>

                                <p class="text-sm font-medium text-gray-600 mb-2">Por: <span class="text-gray-800">{{ $libro['autor'] }}</span></p>
                                <p class="text-gray-600 text-sm line-clamp-2 mb-4">{{ $libro['sinopsis'] }}</p>
                            </div>

                            <div class="pt-4 border-t border-gray-100 flex items-center justify-between mt-auto">
                                <span class="text-xl font-extrabold text-indigo-600">S/ {{ number_format($libro['precio'], 2) }}</span>
                                
                                @if($libro['stock'] > 0)
                                    <span class="text-xs bg-emerald-100 text-emerald-800 font-semibold px-2.5 py-1 rounded">
                                        Stock: {{ $libro['stock'] }}
                                    </span>
                                @else
                                    <span class="text-xs bg-rose-100 text-rose-800 font-semibold px-2.5 py-1 rounded">
                                        Agotado
                                    </span>
                                @endif
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </main>
    </body>
</html>