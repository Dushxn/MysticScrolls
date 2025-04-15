<!DOCTYPE html>
<html>

<head>
    <title>My Books</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        body {
            margin: 0;
            background-color: #000;
            color: #fff;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            display: flex;
        }

        .sidebar {
            width: 220px;
            background-color: #0a0a0a;
            border-right: 1px solid rgba(0, 255, 85, 0.2);
            height: 100vh;
            padding: 20px 0;
            box-sizing: border-box;
        }

        .sidebar h2 {
            color: #00ff55;
            font-size: 22px;
            margin-left: 20px;
            margin-bottom: 30px;
        }

        .sidebar ul {
            list-style-type: none;
            padding: 0;
            margin: 0;
        }

        .sidebar ul li a {
            display: block;
            padding: 12px 20px;
            color: #999;
            text-decoration: none;
            border-left: 3px solid transparent;
        }

        .sidebar ul li a:hover,
        .sidebar ul li a.active {
            color: #fff;
            border-left: 3px solid #00ff55;
            background-color: rgba(0, 255, 85, 0.1);
        }

        .sidebar form {
            padding: 0 20px;
            position: absolute;
            bottom: 20px;
            width: 100%;
            box-sizing: border-box;
        }

        .sidebar button {
            width: 100%;
            background-color: transparent;
            color: #999;
            border: 1px solid #333;
            padding: 10px;
            font-size: 14px;
            cursor: pointer;
        }

        .main {
            flex-grow: 1;
            padding: 40px;
        }

        .header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 40px;
        }

        .write-btn {
            background-color: #00ff55;
            color: #000;
            padding: 12px 24px;
            border-radius: 4px;
            text-decoration: none;
            font-weight: bold;
        }

        .book-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(260px, 1fr));
            gap: 30px;
        }

        .card {
            background-color: #111;
            border: 1px solid rgba(0, 255, 85, 0.2);
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 255, 85, 0.1);
        }

        .card img {
            width: 100%;
            height: 180px;
            object-fit: cover;
            margin-bottom: 10px;
            border-radius: 4px;
        }

        .card h3 {
            color: #00ff55;
            margin: 0 0 10px;
        }

        .card p {
            color: #ccc;
            font-size: 14px;
        }

        .card a {
            display: inline-block;
            margin-top: 10px;
            color: #00ff55;
            text-decoration: none;
        }
    </style>
</head>

<body>

    <!-- Sidebar -->
    <div class="sidebar">
        <h2>Mystic<span style="color: white;">Scrolls</span></h2>
        <ul>
            <li><a href="/dashboard">📊 Dashboard</a></li>
            <li><a href="/my-library">📚 My Library</a></li>
            <li><a href="{{ route('userbooks.index') }}" class="active">🖊️ My Books</a></li>
            <li><a href="#">📖 Currently Reading</a></li>
            <li><a href="#">🎯 Reading Goals</a></li>
            <li><a href="#">📈 Statistics</a></li>
        </ul>
        <form method="POST" action="{{ route('logout') }}">
            @csrf
            <button type="submit">🚪 Logout</button>
        </form>
    </div>

    <!-- Main Section -->
    <div class="main">
        <div class="header">
            <h2>📚 My Books</h2>
            <a href="{{ route('userbooks.create') }}" class="write-btn">✍️ Write Now</a>
        </div>

        @if(session('success'))
        <div style="color: #00ff55; margin-bottom: 20px;">{{ session('success') }}</div>
        @endif

        <div class="book-grid">
            @foreach($books as $book)
            <div class="card">
                <img src="{{ $book->cover ? asset('storage/' . $book->cover) : 'https://via.placeholder.com/400x200?text=No+Cover' }}" alt="Cover">
                <h3>{{ $book->title }}</h3>
                <p>{{ \Illuminate\Support\Str::limit($book->summary, 100) }}</p>

                <a href="{{ route('userbooks.show', $book->_id) }}">📖 Read</a>
                <a href="{{ route('userbooks.edit', $book->_id) }}" style="margin-left: 10px;">✏️ Edit</a>

                <form action="{{ route('userbooks.destroy', $book->_id) }}" method="POST" style="display:inline;">
                    @csrf
                    @method('DELETE')
                    <button type="submit" onclick="return confirm('Are you sure?')" style="background:none; border:none; color:#ff4444; cursor:pointer; margin-left:10px;">🗑️ Delete</button>
                </form>
            </div>

            @endforeach
        </div>
    </div>

</body>

</html>