<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Review;
use App\Models\User;
class ReviewController extends Controller
{
    public function store(Request $request)
{
    $request->validate([
        'book_id' => 'required|exists:books,id',
        'user_id' => 'required|exists:users,id',
        'rating' => 'required|integer|min:1|max:5',
        'comment' => 'required|string',
    ]);

    Review::create($request->all());

    return redirect('/books/' . $request->book_id)->with('success', 'Avis ajouté');
}

public function edit(Review $review)
{
    return view('reviews.edit', compact('review'));
}

// Mettre à jour l'avis
public function update(Request $request, Review $review)
{
    $validated = $request->validate([
        'rating' => 'required|integer|min:1|max:5',
        'comment' => 'required|string|max:1000',
    ]);

    $review->update($validated);

    return redirect('/books/' . $review->book_id)->with('success', 'Avis mis à jour avec succès !');
}

public function destroy(Review $review)
{
    $bookId = $review->book_id;
    $review->delete();

    return redirect()->to("/books/{$bookId}")->with('success', 'Avis supprimé avec succès.');
}



}
