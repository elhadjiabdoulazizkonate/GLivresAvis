@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <h1 class="mb-4 text-3xl font-bold text-center text-amber-800">Liste des Livres</h1>

    @if($books->isEmpty())
        <p class="text-center text-muted">Aucun livre disponible pour le moment.</p>
    @else
        <div class="row">
            @foreach($books as $book)
                <div class="col-md-6 col-lg-4 mb-4">
                    <div class="card h-100 shadow-xl rounded-3xl bg-gradient-to-br from-yellow-100 to-yellow-300 transition-all duration-300 hover:scale-105 hover:shadow-2xl">
                        <div class="card-body">
                            <h5 class="card-title text-xl font-bold text-amber-900">{{ $book->title }}</h5>
                            <p class="card-text text-amber-800">{{ Str::limit($book->description, 100) }}</p>
                            <p class="text-sm text-muted">Publié le {{ \Carbon\Carbon::parse($book->published_at)->format('d/m/Y') }}</p>
                            <a href="{{ route('books.show', $book->id) }}" class="btn btn-warning mt-2 px-4 py-2 rounded-lg transition-all duration-300 hover:bg-amber-600 hover:text-white">
                                📘 Voir plus
                            </a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>

        <div class="d-flex justify-content-center mt-4">
            {{ $books->links() }}
        </div>
    @endif
</div>
@endsection


<!-- CSS personnalisé -->
<style>
    body {
        font-family: 'Playfair Display', serif;
        background: linear-gradient(to right, #fceabb, #f8b500);
        min-height: 100vh;
    }

    .container {
        max-width: 1200px;
        padding: 30px;
    }

    .card {
        border-radius: 15px;
        transition: transform 0.3s ease, box-shadow 0.3s ease;
    }

    .card:hover {
        transform: scale(1.05);
        box-shadow: 0 6px 15px rgba(0, 0, 0, 0.1);
    }

    .card-title {
        font-size: 1.25rem;
        font-weight: bold;
        color: #3e2723;
    }

    .card-text {
        font-size: 1rem;
        color: #6c4f37;
    }

    .btn-warning {
        background-color: #ffb300;
        border-radius: 10px;
        font-weight: bold;
    }

    .btn-warning:hover {
        background-color: #ff8f00;
    }

    .text-muted {
        font-size: 0.9rem;
    }

    .d-flex {
        display: flex;
        justify-content: center;
    }

    .pagination {
        display: flex;
        justify-content: center;
        margin-top: 20px;
    }

    .pagination li a {
        color: #f8b500;
        padding: 10px 15px;
        border-radius: 8px;
    }

    .pagination li a:hover {
        background-color: #ffb300;
        color: white;
    }

    .pagination .active a {
        background-color: #f8b500;
        color: white;
    }
</style>
