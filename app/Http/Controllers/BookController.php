<?php

namespace App\Http\Controllers;

use App\Models\Book; // Capitalized 'Book'
use App\Models\Library;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule; // Needed for the update unique rule

class BookController extends Controller
{
    public function index(Request $request)
    {
        $books = Book::all();
        return view('books.index', [
            'books' => $books,
        ]);
    }

    public function edit(Book $book)
    {
        // The keys 'book' and 'libraries' match the variables your view expects.
        return view('books.edit', [
            'book' => $book,
            'libraries' => Library::all(),
        ]);
    }

    public function show(Book $book)
    {
        // show() typically only needs the single model, unless your show view
        // specifically needs the whole list of libraries for something.
        return view('books.show', [
            'book' => $book,
        ]);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title'        => 'required|string|max:255',
            'author'       => 'required|string|max:255',
            'publisher'    => 'required|string|max:255',
            'isbn'         => 'required|string|max:255|unique:books,isbn',
            'release_date' => 'required|date',
            'Library_Name' => 'required|string|max:255',
            'address'=>'required|string|max:255',
        ]);

        $request->library->update([
            'name' => $request->input('library_name'),
            'address' => $request->input('address'),
        ]);

        unset($validated['library_name'], $validated['address']);

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
            'Library_Name' => 'required|string|max:255',
            'address'=>'required|string|max:255',
        ]);

        $book->library->update([
            'name' => $validated['Library_Name'],
            'address' => $validated['address'],
        ]);

        unset($validated['Library_Name'], $validated['address']);

        $book->update($validated);
        return redirect()->route('books.index')->with('success','Book updated successfully');
    }

    public function destroy(Book $book)
    {
        $book->delete();

        return redirect()->route('books.index')->with('success','Book deleted successfully');
    }
}
