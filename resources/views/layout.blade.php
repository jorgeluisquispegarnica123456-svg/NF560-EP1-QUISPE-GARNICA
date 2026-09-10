<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Librería en Línea</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="bg-slate-100 text-slate-900">

    <nav class="bg-slate-900 text-white shadow-lg">
        <div class="mx-auto flex max-w-7xl items-center justify-between px-6 py-4">

            <a href="{{ route('inicio') }}" class="text-xl font-bold">
                📚 Librería en Línea
            </a>

            <div class="flex gap-6">

                <a href="{{ route('inicio') }}"
                   @class([
                       'font-bold text-yellow-400' => request()->routeIs('inicio'),
                       'text-white hover:text-yellow-300' => !request()->routeIs('inicio')
                   ])>
                    Inicio
                </a>

                <a href="{{ route('catalogo') }}"
                   @class([
                       'font-bold text-yellow-400' => request()->routeIs('catalogo'),
                       'text-white hover:text-yellow-300' => !request()->routeIs('catalogo')
                   ])>
                    Catálogo
                </a>

                <a href="{{ route('nosotros') }}"
                   @class([
                       'font-bold text-yellow-400' => request()->routeIs('nosotros'),
                       'text-white hover:text-yellow-300' => !request()->routeIs('nosotros')
                   ])>
                    Nosotros
                </a>

            </div>
        </div>
    </nav>

    <main class="min-h-screen">
        {{ $slot }}
    </main>

    <footer class="bg-slate-900 px-6 py-8 text-center text-white">
        <p class="font-semibold">
            Librería en Línea
        </p>

        <p class="mt-2 text-sm text-slate-400">
            2026 · Todos los derechos reservados
        </p>
    </footer>

</body>
</html>