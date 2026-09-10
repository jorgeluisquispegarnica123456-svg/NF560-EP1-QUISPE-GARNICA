<?php

namespace App\Http\Controllers;

class LibroController extends Controller
{
    private array $libros = [
        [
            'id' => 1,
            'titulo' => 'Cien años de soledad',
            'autor' => 'Gabriel García Márquez',
            'categoria' => 'Novela',
            'anio' => 1967,
            'precio' => 85.00,
            'stock' => 8,
            'destacado' => true,
            'portada' => 'from-amber-400 to-orange-600',
            'sinopsis' => 'La saga de la familia Buendía en Macondo.',
        ],
        [
            'id' => 2,
            'titulo' => 'El nombre de la rosa',
            'autor' => 'Umberto Eco',
            'categoria' => 'Novela',
            'anio' => 1980,
            'precio' => 95.00,
            'stock' => 0,
            'destacado' => false,
            'portada' => 'from-slate-500 to-slate-800',
            'sinopsis' => 'Un fraile investiga muertes en una abadía medieval.',
        ],
        [
            'id' => 3,
            'titulo' => 'Rayuela',
            'autor' => 'Julio Cortázar',
            'categoria' => 'Novela',
            'anio' => 1963,
            'precio' => 78.50,
            'stock' => 5,
            'destacado' => true,
            'portada' => 'from-rose-400 to-pink-600',
            'sinopsis' => 'Una novela que puede leerse de múltiples maneras.',
        ],
        [
            'id' => 4,
            'titulo' => 'Clean Code',
            'autor' => 'Robert C. Martin',
            'categoria' => 'Técnico',
            'anio' => 2008,
            'precio' => 120.00,
            'stock' => 15,
            'destacado' => true,
            'portada' => 'from-sky-400 to-blue-700',
            'sinopsis' => 'Principios para escribir código limpio y mantenible.',
        ],
        [
            'id' => 5,
            'titulo' => 'Ficciones',
            'autor' => 'Jorge Luis Borges',
            'categoria' => 'Cuento',
            'anio' => 1944,
            'precio' => 65.00,
            'stock' => 3,
            'destacado' => false,
            'portada' => 'from-emerald-400 to-teal-700',
            'sinopsis' => 'Relatos sobre laberintos, espejos e infinitos.',
        ],
        [
            'id' => 6,
            'titulo' => 'El principito',
            'autor' => 'A. de Saint-Exupéry',
            'categoria' => 'Infantil',
            'anio' => 1943,
            'precio' => 45.00,
            'stock' => 20,
            'destacado' => false,
            'portada' => 'from-yellow-300 to-amber-500',
            'sinopsis' => 'Un piloto conoce a un pequeño príncipe en el desierto.',
        ],
    ];

    public function inicio()
    {
        $libros = $this->libros;

        return view('inicio', compact('libros'));
    }

    public function catalogo()
    {
        $libros = $this->libros;

        return view('catalogo', compact('libros'));
    }

    public function detalle(int $id)
    {
        $libros = $this->libros;

        $libro = collect($libros)->firstWhere('id', $id);

        return view('detalle', compact('libro'));
    }

    public function nosotros()
    {
        return view('nosotros');
    }
}