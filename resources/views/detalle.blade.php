<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Librería - Detalle del Libro</title>

        <!-- CDN de Tailwind CSS -->
        <script src="https://cdn.tailwindcss.com"></script>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />
    </head>
    <body class="font-sans antialiased bg-gray-50 text-gray-800">
        <!-- Navegación -->
        <nav class="bg-white shadow-sm border-b border-gray-200">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 h-16 flex items-center justify-between">
                <span class="font-bold text-xl text-indigo-600">📖 Mi Librería</span>
                <div class="space-x-4">
                    <a href="{{ route('inicio') }}" class="text-gray-600 hover:text-indigo-600">Inicio</a>
                    <a href="{{ route('catalogo') }}" class="text-gray-600 hover:text-indigo-600">Catálogo</a>
                    <a href="{{ route('nosotros') }}" class="text-gray-600 hover:text-indigo-600">Nosotros</a>
                </div>
            </div>
        </nav>

        <!-- Contenido de Detalle -->
        <main class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 py-12">
            <!-- Botón Volver -->
            <div class="mb-6">
                <a href="{{ route('catalogo') }}" class="inline-flex items-center text-sm font-semibold text-indigo-600 hover:text-indigo-800 transition">
                    ← Volver al catálogo
                </a>
            </div>

            @if ($libro)
                <div class="bg-white rounded-2xl shadow-xl overflow-hidden border border-gray-100 md:flex">
                    <!-- Portada Grande -->
                    <div class="md:w-1/2 h-64 md:h-auto bg-gradient-to-br {{ $libro['portada'] }} p-8 flex items-center justify-center relative">
                        @if($libro['destacado'])
                            <span class="absolute top-4 left-4 bg-yellow-400 text-yellow-950 text-xs font-bold px-3 py-1 rounded-full shadow">
                                ★ Destacado
                            </span>
                        @endif
                        <h1 class="text-white font-extrabold text-3xl text-center drop-shadow-md">
                            {{ $libro['titulo'] }}
                        </h1>
                    </div>

                    <!-- Datos del Libro -->
                    <div class="md:w-1/2 p-8 flex flex-col justify-between">
                        <div>
                            <div class="flex items-center justify-between mb-4">
                                <span class="bg-indigo-50 text-indigo-700 text-xs font-bold px-3 py-1 rounded-full border border-indigo-100 uppercase tracking-wide">
                                    {{ $libro['categoria'] }}
                                </span>
                                <span class="text-sm font-semibold text-gray-400">
                                    Año {{ $libro['anio'] }}
                                </span>
                            </div>

                            <p class="text-lg font-medium text-gray-700 mb-4">
                                Autor: <span class="text-gray-900 font-bold">{{ $libro['autor'] }}</span>
                            </p>

                            <h2 class="text-sm font-bold text-gray-900 uppercase tracking-wider mb-2">Sinopsis</h2>
                            <p class="text-gray-600 text-sm leading-relaxed mb-6">
                                {{ $libro['sinopsis'] }}
                            </p>
                        </div>

                        <div class="pt-6 border-t border-gray-100 flex items-center justify-between">
                            <div>
                                <span class="block text-xs text-gray-400 font-medium uppercase">Precio</span>
                                <span class="text-3xl font-extrabold text-indigo-600">
                                    Bs {{ number_format($libro['precio'], 2, ',', '.') }}
                                </span>
                            </div>

                            <!-- Badge de stock condicional con @class -->
                            <span @class([
                                'px-3 py-1.5 rounded-lg text-xs font-bold',
                                'bg-emerald-100 text-emerald-800 border border-emerald-200' => $libro['stock'] > 0,
                                'bg-rose-100 text-rose-800 border border-rose-200' => $libro['stock'] === 0,
                            ])>
                                @if($libro['stock'] > 0)
                                    Disponible ({{ $libro['stock'] }})
                                @else
                                    Agotado
                                @endif
                            </span>
                        </div>
                    </div>
                </div>
            @else
                <!-- Estado Libro No Encontrado -->
                <div class="bg-white rounded-xl shadow-md p-12 text-center border border-gray-100">
                    <div class="inline-flex items-center justify-center w-16 h-16 bg-rose-100 text-rose-600 rounded-full mb-4">
                        ✕
                    </div>
                    <h2 class="text-2xl font-bold text-gray-900 mb-2">Libro no encontrado</h2>
                    <p class="text-gray-600 mb-6">El identificador ingresado no corresponde a ningún libro registrado.</p>
                    <a href="{{ route('catalogo') }}" class="inline-flex items-center px-4 py-2 bg-indigo-600 text-white font-semibold rounded-lg hover:bg-indigo-700 transition">
                        Ver catálogo disponible
                    </a>
                </div>
            @endif
        </main>
    </body>
</html>