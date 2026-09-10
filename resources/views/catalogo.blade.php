<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Catálogo de libros</title>
    <!-- Carga de Tailwind CSS -->
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-slate-100 text-slate-800 antialiased">

    <main class="mx-auto max-w-7xl px-6 py-10">
        <h1 class="text-3xl font-bold text-slate-900">Catálogo de libros</h1>

        <div class="mt-8 grid grid-cols-1 gap-6 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4">
            @forelse ($libros as $libro)
                <div class="overflow-hidden rounded-xl bg-white shadow-lg border border-slate-100">
                    <div class="h-48 bg-gradient-to-br {{ $libro['portada'] }}"></div>

                    <div class="p-5">
                        <span class="rounded-full bg-slate-200 px-3 py-1 text-sm font-medium text-slate-700">
                            {{ $libro['categoria'] }}
                        </span>

                        <h2 class="mt-3 text-xl font-bold text-slate-900">
                            {{ $libro['titulo'] }}
                        </h2>

                        <p class="mt-1 text-slate-600">
                            {{ $libro['autor'] }}
                        </p>

                        <p class="mt-4 text-lg font-bold text-slate-900">
                            Bs {{ number_format($libro['precio'], 2, ',', '.') }}
                        </p>

                        <a href="{{ route('libro.detalle', $libro['id']) }}"
                           class="mt-4 inline-block w-full text-center rounded-lg bg-slate-900 px-4 py-2 text-white font-medium hover:bg-slate-700 transition-colors">
                            Ver detalle
                        </a>
                    </div>
                </div>
            @empty
                <div class="col-span-full rounded-lg bg-white p-6 text-center text-slate-500 shadow">
                    <p>No hay libros disponibles en este momento.</p>
                </div>
            @endforelse
        </div>
    </main>

</body>
</html>