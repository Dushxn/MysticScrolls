<!DOCTYPE html>
<html>
<head>
    <title>{{ $book->title }} - MysticScrolls</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        body {
            margin: 0;
            background-color: #000;
            color: #fff;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            padding: 40px;
        }

        .container {
            max-width: 1000px;
            margin: 0 auto;
        }

        .book-details {
            display: flex;
            gap: 40px;
            margin-bottom: 40px;
        }

        .book-details img {
            width: 250px;
            border-radius: 6px;
            border: 1px solid rgba(0,255,85,0.2);
        }

        .book-meta h2 {
            margin-top: 0;
            color: #00ff55;
        }

        .book-meta p {
            margin: 5px 0;
            color: #ccc;
        }

        .note-form textarea {
            width: 100%;
            background-color: #111;
            color: #fff;
            border: 1px solid #333;
            padding: 12px;
            border-radius: 4px;
            resize: vertical;
            min-height: 100px;
            margin-bottom: 20px;
        }

        .note-form button {
            background-color: #00ff55;
            color: #000;
            font-weight: bold;
            border: none;
            padding: 12px 24px;
            border-radius: 4px;
            cursor: pointer;
        }

        .note-form button:hover {
            background-color: #00cc44;
        }

        .note {
            border: 1px solid rgba(0,255,85,0.1);
            background-color: #111;
            padding: 15px;
            border-radius: 4px;
            margin-bottom: 15px;
            color: #ccc;
        }

        .note strong {
            color: #00ff55;
        }

        a.back {
            color: #00ff55;
            text-decoration: none;
            display: inline-block;
            margin-bottom: 20px;
        }

        .success {
            color: #00ff55;
            margin-bottom: 10px;
        }
    </style>
</head>
<body>
    <div class="container">
        <a href="{{ route('library.index') }}" class="back">← Back to My Library</a>

        @if(session('success'))
            <div class="success">{{ session('success') }}</div>
        @endif

        <div class="book-details">
            <div>
                @if($book->image)
                    <img src="{{ asset('storage/' . $book->image) }}" alt="Book Cover">
                @else
                    <img src="https://via.placeholder.com/250x350?text=No+Cover" alt="Placeholder">
                @endif
            </div>
            <div class="book-meta">
                <h2>{{ $book->title }}</h2>
                <p><strong>Author:</strong> {{ $book->author }}</p>
                <p><strong>ISBN:</strong> {{ $book->isbn }}</p>
                <p><strong>Publisher:</strong> {{ $book->publisher }}</p>
                <p><strong>Category:</strong> {{ $book->category }}</p>
                <p><strong>Status:</strong> {{ ucfirst(str_replace('_', ' ', $book->status)) }}</p>
                <p><strong>Description:</strong> {{ $book->description }}</p>
            </div>
        </div>

        <hr style="border-color: #222; margin: 40px 0;">

        <h3 style="color: #00ff55;">📝 Add a Note</h3>

        <form method="POST" action="{{ route('library.addNote', $book->_id) }}" class="note-form">
            @csrf
            <textarea name="content" placeholder="Type your note here..." required></textarea>
            <button type="submit">Add Note</button>
        </form>

        <h3 style="margin-top: 40px; color: #00ff55;">📒 Your Notes</h3>
        @forelse ($notes as $note)
            <div class="note">
                <strong>Note:</strong><br>{{ $note->content }}
            </div>
        @empty
            <p style="color: #777;">No notes yet.</p>
        @endforelse
    </div>
</body>
</html>
