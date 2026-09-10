<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Librería - Catálogo</title>

        <!-- CDN de Tailwind CSS para garantizar la renderización inmediata -->
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
                    <a href="{{ route('catalogo') }}" class="text-indigo-600 font-semibold">Catálogo</a>
                    <a href="{{ route('nosotros') }}" class="text-gray-600 hover:text-indigo-600">Nosotros</a>
                </div>
            </div>
        </nav>

        <!-- Contenido Principal -->
        <main class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-10">
            <div class="mb-8">
                <h1 class="text-3xl font-extrabold text-gray-900">Catálogo Completo</h1>
                <p class="text-gray-600 mt-2">Explora toda nuestra colección disponible.</p>
            </div>

            <!-- Cuadrícula responsive: grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 -->
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-6">
                @forelse ($libros as $libro)
                    <div class="bg-white rounded-xl shadow-md overflow-hidden flex flex-col border border-gray-100 hover:shadow-lg transition">
                        <!-- Portada con degradado -->
                        <div class="h-44 bg-gradient-to-br {{ $libro['portada'] }} flex items-center justify-center p-4 relative">
                            <!-- Indicador numérico usando $loop -->
                            <span class="absolute top-2 left-2 bg-black/40 text-white text-xs px-2 py-0.5 rounded-full font-mono">
                                #{{ $loop->iteration }}
                            </span>

                            <span class="bg-white/90 text-gray-800 text-xs font-bold px-2.5 py-1 rounded-full absolute top-2 right-2 shadow-sm">
                                {{ $libro['categoria'] }}
                            </span>
                            <h2 class="text-white font-bold text-lg text-center drop-shadow-md px-2">
                                {{ $libro['titulo'] }}
                            </h2>
                        </div>

                        <!-- Datos del libro -->
                        <div class="p-5 flex-1 flex flex-col justify-between">
                            <div>
                                <p class="text-xs font-semibold text-gray-500 uppercase tracking-wider mb-1">
                                    Año: {{ $libro['anio'] }}
                                </p>
                                <p class="text-sm font-medium text-gray-700 mb-3">
                                    Por: <span class="text-gray-900 font-semibold">{{ $libro['autor'] }}</span>
                                </p>
                            </div>

                            <div class="pt-4 border-t border-gray-100 flex items-center justify-between mt-auto">
                                <span class="text-lg font-extrabold text-indigo-600">
                                    Bs {{ number_format($libro['precio'], 2, ',', '.') }}
                                </span>

                                <a href="{{ route('libro.detalle', $libro['id']) }}" class="inline-flex items-center px-3 py-1.5 bg-indigo-600 hover:bg-indigo-700 text-white text-xs font-semibold rounded-lg transition shadow-sm">
                                    Ver detalle
                                </a>
                            </div>
                        </div>
                    </div>
                @empty
                    <div class="col-span-full text-center py-12 bg-white rounded-xl border border-dashed border-gray-300">
                        <p class="text-gray-500 text-lg">No hay libros disponibles en este momento.</p>
                    </div>
                @endforelse
            </div>
        </main>
    </body>
</html>