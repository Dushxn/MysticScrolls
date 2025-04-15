<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Book;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class BookController extends Controller
{
    public function index(Request $request)
{
    $query = Book::where('user_id', Auth::id());

    if ($request->filled('search')) {
        $filter = $request->input('filter', 'title');
        $search = $request->input('search');

        if (in_array($filter, ['title', 'author', 'isbn'])) {
            $query->where($filter, 'LIKE', '%' . $search . '%');
        }
    }

    $books = $query->get();

    return view('library.index', compact('books'));
}


    public function create()
    {
        return view('library.create');
    }

    public function store(Request $request)
{
    $request->validate([
        'title' => 'required',
        'description' => 'nullable',
        'author' => 'required',
        'isbn' => 'nullable',
        'publisher' => 'nullable',
        'category' => 'nullable',
        'status' => 'required|in:read,currently_reading,not_read',
        'image' => 'nullable|image|max:2048'
    ]);

    try {
        $data = $request->except('image');
        $data['user_id'] = Auth::id();

        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('books', 'public');
            $data['image'] = $imagePath;
        }

        Book::create($data);

        return redirect()->route('library.index')->with('success', 'Book added successfully!');
    } catch (\Exception $e) {
        Log::error("Error creating book: " . $e->getMessage());
        return redirect()->back()->with('error', 'Failed to add book.');
    }
}


    public function edit(Book $book)
    {
        return view('library.edit', compact('book'));
    }

    public function update(Request $request, Book $book)
{
    $request->validate([
        'title' => 'required',
        'description' => 'nullable',
        'author' => 'required',
        'isbn' => 'nullable',
        'publisher' => 'nullable',
        'category' => 'nullable',
        'status' => 'required|in:read,currently_reading,not_read',
        'image' => 'nullable|image|max:2048'
    ]);

    try {
        $data = $request->except('image');

        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('books', 'public');
            $data['image'] = $imagePath;
        }

        $book->update($data);

        return redirect()->route('library.index')->with('success', 'Book updated!');
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
