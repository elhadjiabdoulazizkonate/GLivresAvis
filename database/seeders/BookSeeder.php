<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Book;
use Carbon\Carbon;

class BookSeeder extends Seeder
{
    public function run(): void
    {
        $books = [
            [
                'title' => 'Le Petit Prince',
                'author' => 'Antoine de Saint-Exupéry',
                'description' => 'Un conte poétique et philosophique de Saint-Exupéry.',
                'published_at' => Carbon::create(1943, 4, 6),
            ],
            [
                'title' => 'Les Misérables',
                'author' => 'Victor Hugo',
                'description' => 'Un roman de Victor Hugo sur la rédemption et la justice.',
                'published_at' => Carbon::create(1862, 6, 30),
            ],
            [
                'title' => 'L’Étranger',
                'author' => 'Albert Camus',
                'description' => 'Un roman d’Albert Camus sur l’absurde et l’isolement.',
                'published_at' => Carbon::create(1942, 5, 19),
            ],
            [
                'title' => 'Le Comte de Monte-Cristo',
                'author' => 'Alexandre Dumas',
                'description' => 'Une épopée de vengeance et de justice d’Alexandre Dumas.',
                'published_at' => Carbon::create(1844, 8, 28),
            ],
            [
                'title' => 'Harry Potter à l\'école des sorciers',
                'author' => 'J.K. Rowling',
                'description' => 'Le début de la saga magique de J.K. Rowling.',
                'published_at' => Carbon::create(1997, 6, 26),
            ],
            [
                'title' => '1984',
                'author' => 'George Orwell',
                'description' => 'Un roman dystopique de George Orwell.',
                'published_at' => Carbon::create(1949, 6, 8),
            ],
            [
                'title' => 'Le Seigneur des Anneaux',
                'author' => 'J.R.R. Tolkien',
                'description' => 'L’univers épique de Tolkien entre magie et guerre.',
                'published_at' => Carbon::create(1954, 7, 29),
            ],
            [
                'title' => 'Don Quichotte',
                'author' => 'Miguel de Cervantès',
                'description' => 'Le chevalier errant de Cervantès et ses aventures.',
                'published_at' => Carbon::create(1605, 1, 16),
            ],
            [
                'title' => 'Fables de La Fontaine',
                'author' => 'Jean de La Fontaine',
                'description' => 'Des contes animaliers pleins de morale et de sagesse.',
                'published_at' => Carbon::create(1668, 3, 31),
            ],
            [
                'title' => 'La Peste',
                'author' => 'Albert Camus',
                'description' => 'Une allégorie de l’humanité face à la mort, par Camus.',
                'published_at' => Carbon::create(1947, 6, 10),
            ],
        ];

        foreach ($books as $book) {
            Book::create($book);
        }
    }
}
