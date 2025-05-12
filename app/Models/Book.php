<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Book extends Model
{
    use HasFactory;

    protected $table = 'books';

    protected $fillable = ['title', 'author', 'description', 'published_at'];

    public function reviews()
    {
        return $this->hasMany(Review::class);
    }

    public function getAverageRatingAttribute()
{
    return $this->reviews()->avg('rating');
}

public function index()
{
    $books = \App\Models\Book::paginate(5); // 5 livres par page
    return view('books.index', compact('books'));
}


}


