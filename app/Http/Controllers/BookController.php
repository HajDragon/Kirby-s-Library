<?php

namespace App\Http\Controllers;

use App\Models\Book; // Capitalized 'Book'
use Illuminate\Http\Request;
use Illuminate\Validation\Rule; // Needed for the update unique rule

class BookController extends Controller
{
    public function index()
    {
        return view('books.index',[
            'books' => Book::all(),
        ]);
    }

    public function edit(Book $book){
        return view('books.edit',['book'=>$book]);
    }

    public function show(Book $book){
        return view('books.show',[$book]);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title'        => 'required|string|max:255',
            'author'       => 'required|string|max:255', // Changed to lowercase
            'publisher'    => 'required|string|max:255', // Changed to lowercase
            'isbn'         => 'required|string|max:255|unique:books,isbn', // Changed to lowercase
            'release_date' => 'required|date',
        ]);

        Book::create($validated);
        return redirect()->route('books.index')->with('success','Book created successfully');
    }

    public function update(Request $request, Book $book)
    {
        $validated = $request->validate([
            'title'        => 'required|string|max:255',
            'author'       => 'required|string|max:255',
            'publisher'    => 'required|string|max:255',
            'isbn'         => ['required', 'string', 'max:255', Rule::unique('books', 'isbn')->ignore($book->id)],
            'release_date' => 'required|date',
        ]);

        $book->update($validated);
        return redirect()->route('books.index')->with('success','Book updated successfully');
    }

    public function destroy(Book $book)
    {
        $book->delete();

        return redirect()->route('books.index')->with('success','Book deleted successfully');
    }
}
