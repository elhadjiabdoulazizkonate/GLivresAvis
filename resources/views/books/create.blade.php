@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Ajouter un nouveau livre</h1>

    @if ($errors->any())
        <div style="color:red;">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('books.store') }}" method="POST">
        @csrf

        <label for="title">Titre :</label><br>
        <input type="text" name="title" value="{{ old('title') }}" required><br><br>

        <label for="author">Auteur :</label><br>
        <input type="text" name="author" value="{{ old('author') }}" required><br><br>

        <label for="description">Description :</label><br>
        <textarea name="description" required>{{ old('description') }}</textarea><br><br>

        <label for="published_at">Date de publication :</label><br>
        <input type="date" name="published_at" value="{{ old('published_at') }}" required><br><br>

        <button type="submit">Ajouter</button>
    </form>
</div>
@endsection
