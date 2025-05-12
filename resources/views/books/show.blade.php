@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <!-- Section Détails du Livre -->
    <div class="card mb-4 shadow-lg border-0 rounded-3xl bg-gradient-to-r from-amber-200 to-amber-400 p-4">
        <div class="card-body">
            <h2 class="card-title text-4xl font-bold text-amber-900">{{ $book->title }}</h2>
            <p class="card-text text-lg text-amber-700 mt-3">{{ $book->description }}</p>
            <p class="card-subtitle text-md text-muted">Publié le : {{ \Carbon\Carbon::parse($book->published_at)->format('d M Y') }}</p>
            <p class="mt-2"><strong>Note moyenne :</strong> {{ number_format($book->average_rating, 1) }}/5</p>
        </div>
    </div>

    <!-- Section Avis des Lecteurs -->
    <div class="card mb-4 shadow-lg border-0 rounded-3xl bg-gradient-to-r from-amber-100 to-amber-200 p-4">
        <div class="card-header bg-amber-300 text-amber-900 font-bold">Avis des Lecteurs</div>
        <ul class="list-group list-group-flush">
            @foreach($book->reviews as $review)
                <li class="list-group-item p-4 rounded-xl shadow-md hover:bg-amber-50 transition-all duration-300">
                    <div class="d-flex justify-content-between">
                        <div>
                            <strong class="text-amber-800">{{ $review->user->name }}</strong> 
                            a donné une note de 
                            <span class="text-warning">{{ $review->rating }}/5</span>
                        </div>
                        <div class="text-sm text-muted">
                            <small>{{ \Carbon\Carbon::parse($review->created_at)->diffForHumans() }}</small>
                        </div>
                    </div>
                    <p class="text-amber-600 italic mt-2">"{{ $review->comment }}"</p>
                    <div class="text-right mt-3">
                        <a href="{{ route('reviews.edit', $review->id) }}" class="btn btn-warning btn-sm">✏ Modifier</a>
                        <form action="{{ route('reviews.destroy', $review->id) }}" method="POST" style="display: inline-block;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm">🗑 Supprimer</button>
                        </form>
                    </div>
                </li>
            @endforeach
        </ul>
        @if($book->reviews->isEmpty())
            <p class="text-muted text-center mt-3">Aucun avis pour ce livre pour le moment.</p>
        @endif
    </div>

    <!-- Formulaire d'Ajout d'Avis -->
    <div class="card shadow-lg border-0 rounded-3xl p-4 mb-5 bg-gradient-to-r from-amber-300 to-amber-400">
        <div class="card-header bg-amber-300 text-amber-900 font-bold">Ajouter un Avis</div>
        <div class="card-body">
            <form action="{{ url('/books/' . $book->id . '/reviews') }}" method="POST">
                @csrf
                <div class="mb-3">
                    <label for="rating" class="form-label text-amber-800">Note (1 à 5)</label>
                    <input type="number" name="rating" id="rating" class="form-control" min="1" max="5" required>
                </div>

                <div class="mb-3">
                    <label for="comment" class="form-label text-amber-800">Commentaire</label>
                    <textarea name="comment" id="comment" class="form-control" rows="4" required></textarea>
                </div>

                <div class="text-right">
                    <button type="submit" class="btn btn-warning px-5">💾 Ajouter mon avis</button>
                </div>
            </form>
        </div>
    </div>

    <!-- Lien Retour -->
    <div class="mt-4 text-center">
        <a href="{{ url('/books') }}" class="btn btn-secondary px-5 py-2 rounded-lg transition-all duration-300 hover:bg-amber-600 hover:text-white">
            ↩ Retour à la liste des livres
        </a>
    </div>
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
        border-radius: 20px;
        box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
    }

    .card-title {
        font-size: 2rem;
        font-weight: bold;
        color: #3e2723;
    }

    .card-header {
        font-size: 1.5rem;
        font-weight: bold;
        color: #3e2723;
        text-align: center;
    }

    .card-body {
        background-color: rgba(255, 255, 255, 0.9);
        border-radius: 15px;
        padding: 20px;
    }

    .btn:hover {
        transform: scale(1.1);
        background-color: #ff6f00;
        color: white;
        transition: background-color 0.3s ease-in-out, transform 0.3s;
    }

    .btn-secondary:hover {
        background-color: #ff6f00;
        color: white;
    }

    .btn-warning:hover {
        background-color: #ffa000;
    }

    .list-group-item {
        background-color: #fff;
        border-radius: 12px;
        box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
        margin-bottom: 15px;
        transition: background-color 0.3s ease, box-shadow 0.3s ease;
    }

    .list-group-item:hover {
        background-color: #f9e3b1;
        box-shadow: 0 6px 15px rgba(0, 0, 0, 0.2);
    }

    .form-control {
        border-radius: 12px;
        box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
    }

    .form-label {
        font-weight: bold;
        color: #3e2723;
    }

    .card-header {
        background-color: #f8b500;
        color: #3e2723;
        border-radius: 12px;
    }
</style>
