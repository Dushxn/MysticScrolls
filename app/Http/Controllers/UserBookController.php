<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\UserBook;
use Illuminate\Support\Facades\Auth;
use Barryvdh\DomPDF\Facade\Pdf;

class UserBookController extends Controller
{
    public function index()
    {
        $books = UserBook::where('user_id', Auth::id())->get();
        return view('userbooks.index', compact('books'));
    }

    public function create()
    {
        return view('userbooks.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'summary' => 'nullable|string',
            'content' => 'required|string',
            'cover' => 'nullable|image|max:2048'
        ]);

        $data = $request->only('title', 'summary', 'content');
        $data['user_id'] = Auth::id();

        if ($request->hasFile('cover')) {
            $data['cover'] = $request->file('cover')->store('covers', 'public');
        }
        

        UserBook::create($data);

        return redirect()->route('userbooks.index')->with('success', 'Book published!');
    }

    public function show($id)
    {
        $book = UserBook::findOrFail($id);
        return view('userbooks.show', compact('book'));
    }

    public function download($id)
    {
        $book = UserBook::findOrFail($id);
        $pdf = Pdf::loadView('userbooks.pdf', compact('book'));
        return $pdf->download($book->title . '.pdf');
    }
}
