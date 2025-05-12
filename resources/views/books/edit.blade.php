@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <div class="card">
        <div class="card-header">✏ Modifier l'avis</div>
        <div class="card-body">
            <form action="{{ route('reviews.update', $review->id) }}" method="POST">
                @csrf
                @method('PUT')

                <div class="mb-3">
                    <label class="form-label">Utilisateur</label>
                    <input type="text" class="form-control" value="{{ $review->user->name }}" disabled>
                </div>

                <div class="mb-3">
                    <label for="rating" class="form-label">Note</label>
                    <input type="number" name="rating" id="rating" class="form-control" min="1" max="5" value="{{ $review->rating }}" required>
                </div>

                <div class="mb-3">
                    <label for="comment" class="form-label">Commentaire</label>
                    <textarea name="comment" id="comment" class="form-control" rows="3" required>{{ $review->comment }}</textarea>
                </div>

                <button type="submit" class="btn btn-success">💾 Enregistrer les modifications</button>
                <a href="{{ url('/books/' . $review->book_id) }}" class="btn btn-secondary">↩ Retour au livre</a>
            </form>
        </div>
    </div>
</div>
@endsection
