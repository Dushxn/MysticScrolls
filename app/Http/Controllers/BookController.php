<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Book;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class BookController extends Controller
{
    public function index()
    {
        try {
            $books = Book::where('user_id', Auth::id())->get();
            return view('library.index', compact('books'));
        } catch (\Exception $e) {
            Log::error("Failed to load books: " . $e->getMessage());
            return redirect()->back()->with('error', 'Failed to load your library.');
        }
    }

    public function create()
    {
        return view('library.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'image' => 'nullable|url',
            'description' => 'nullable',
            'author' => 'required',
            'isbn' => 'nullable',
            'publisher' => 'nullable',
            'category' => 'nullable',
            'status' => 'required|in:read,currently_reading,not_read'
        ]);

        try {
            Book::create($request->all() + ['user_id' => Auth::id()]);
            return redirect()->route('library.index')->with('success', 'Book added successfully!');
        } catch (\Exception $e) {
            Log::error("Error creating book: " . $e->getMessage());
            return redirect()->back()->with('error', 'Failed to add book. Please try again.');
        }
    }

    public function edit(Book $book)
    {
        return view('library.edit', compact('book'));
    }

    public function update(Request $request, Book $book)
    {
        try {
            $book->update($request->all());
            return redirect()->route('library.index')->with('success', 'Book updated successfully!');
        } catch (\Exception $e) {
            Log::error("Error updating book: " . $e->getMessage());
            return redirect()->back()->with('error', 'Failed to update book.');
        }
    }

    public function destroy(Book $book)
    {
        try {
            $book->delete();
            return redirect()->route('library.index')->with('success', 'Book deleted successfully!');
        } catch (\Exception $e) {
            Log::error("Error deleting book: " . $e->getMessage());
            return redirect()->back()->with('error', 'Failed to delete book.');
        }
    }
}
