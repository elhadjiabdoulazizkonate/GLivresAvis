<?php

namespace App\Http\Controllers;
use App\Models\Book;
use Illuminate\Http\Request;

class BookController extends Controller
{
    protected $table = 'livres'; 
    public function index()
{
    $books = Book::paginate(10);
    return view('books.index', compact('books'));
}



public function create()
{
    return view('books.create');
}

public function store(Request $request)
{
    $validated = $request->validate([
        'title' => 'required|string',
        'author' => 'required|string',
        'description' => 'required|string',
        'published_at' => 'required|date',
    ]);

    Book::create($validated);

    return redirect()->route('books.index')->with('success', 'Livre ajouté avec succès.');
}


public function show($id)
{
    // Trouver le livre par son ID
    $book = Book::find($id);

    // Vérifier si le livre existe
    if (!$book) {
        return redirect()->route('books.index')->with('error', 'Livre non trouvé');
    }

    $book = Book::with('reviews.user')->findOrFail($id);

    // Passer la variable $book à la vue
    return view('books.show', compact('book'));
}

}
