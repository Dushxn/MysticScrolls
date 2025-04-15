<!DOCTYPE html>
<html>
<head>
    <title>My Library</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        body {
            margin: 0;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: #000000;
            color: #ffffff;
            min-height: 100vh;
            position: relative;
            overflow-x: hidden;
        }

        /* Sidebar Styles */
        .sidebar {
            position: fixed;
            width: 220px;
            height: 100vh;
            background-color: #0a0a0a;
            border-right: 1px solid rgba(0, 255, 85, 0.2);
            padding: 20px 0;
            box-sizing: border-box;
            z-index: 10;
        }

        .sidebar h2 {
            color: #00ff55;
            font-size: 22px;
            margin: 0 0 30px 20px;
            letter-spacing: 1px;
        }

        .sidebar ul {
            list-style-type: none;
            padding: 0;
            margin: 0;
        }

        .sidebar ul li {
            margin-bottom: 5px;
        }

        .sidebar ul li a {
            display: block;
            padding: 12px 20px;
            color: #999999;
            text-decoration: none;
            border-left: 3px solid transparent;
            transition: all 0.2s;
        }

        .sidebar ul li a:hover,
        .sidebar ul li a.active {
            color: #ffffff;
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
            color: #999999;
            border: 1px solid #333333;
            padding: 10px;
            font-size: 14px;
            cursor: pointer;
            text-align: left;
            transition: all 0.3s;
        }

        .sidebar button:hover {
            background-color: #00ff55;
            color: #000;
        }

        /* Main Page */
        .main {
            margin-left: 220px;
            padding: 40px;
        }

        .header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 40px;
        }

        .add-btn {
            background-color: #00ff55;
            color: #000;
            padding: 10px 20px;
            text-decoration: none;
            font-weight: bold;
            border-radius: 4px;
            transition: background 0.3s;
        }

        .add-btn:hover {
            background-color: #00cc44;
        }

        .library-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(280px, 1fr));
            gap: 30px;
        }

        .card {
            background-color: #111111;
            border: 1px solid rgba(0, 255, 85, 0.2);
            border-radius: 8px;
            padding: 20px;
            box-shadow: 0 0 10px rgba(0, 255, 85, 0.1);
            transition: transform 0.3s ease;
        }

        .card:hover {
            transform: translateY(-5px);
        }

        .card img {
            max-width: 100%;
            height: auto;
            border-radius: 6px;
            margin-bottom: 15px;
        }

        .card h3 {
            margin: 0 0 10px 0;
            font-size: 20px;
            color: #00ff55;
        }

        .card p {
            font-size: 14px;
            line-height: 1.4;
            color: #ccc;
            margin-bottom: 8px;
        }

        .card-actions {
            margin-top: 15px;
        }

        .edit-btn, .delete-btn {
            padding: 8px 14px;
            font-size: 13px;
            font-weight: bold;
            border: none;
            cursor: pointer;
            border-radius: 4px;
            margin-right: 10px;
            text-transform: uppercase;
            letter-spacing: 0.5px;
        }

        .edit-btn {
            background-color: #00ff55;
            color: #000;
        }

        .edit-btn:hover {
            background-color: #00cc44;
        }

        .delete-btn {
            background-color: #ff4444;
            color: #fff;
        }

        .delete-btn:hover {
            background-color: #cc0000;
        }
    </style>
</head>
<body>

    <!-- Sidebar -->
    <div class="sidebar">
        <h2>Mystic<span style="color: #fff;">Scrolls</span></h2>
        <ul>
            <li><a href="/dashboard" class="active">📊 Dashboard</a></li>
            <li><a href="/my-library">📚 My Library</a></li>
            <li><a href="#">📖 Currently Reading</a></li>
            <li><a href="#">🎯 Reading Goals</a></li>
            <li><a href="#">📈 Statistics</a></li>
            <li><a href="#">⚙️ Settings</a></li>
        </ul>
        <form method="POST" action="{{ route('logout') }}">
            @csrf
            <button type="submit">🚪 Logout</button>
        </form>
    </div>

    <!-- Main Content -->
    <div class="main">
        <div class="header">
            <h2 style="color: #ffffff;">📚 My Library</h2>
            <a href="{{ route('library.create') }}" class="add-btn">+ Add New Book</a>
        </div>

        <!-- Search Form -->
<form method="GET" action="{{ route('library.index') }}" style="display: flex; gap: 10px; margin-bottom: 30px;">
    <input
        type="text"
        name="search"
        value="{{ request('search') }}"
        placeholder="Search books..."
        style="flex: 1; padding: 10px 15px; background-color: #111; border: 1px solid #333; color: #fff; border-radius: 4px;"
    >
    <select
        name="filter"
        style="padding: 10px 15px; background-color: #111; border: 1px solid #333; color: #00ff55; border-radius: 4px;"
    >
        <option value="title" {{ request('filter') == 'title' ? 'selected' : '' }}>By Title</option>
        <option value="author" {{ request('filter') == 'author' ? 'selected' : '' }}>By Author</option>
        <option value="isbn" {{ request('filter') == 'isbn' ? 'selected' : '' }}>By ISBN</option>
    </select>
    <button type="submit" class="add-btn" style="padding: 10px 20px;">Search</button>
</form>


        <div class="library-grid">
            @foreach ($books as $book)
                <div class="card">
                    @if($book->image)
                        <img src="{{ asset('storage/' . $book->image) }}" alt="Book Cover">
                    @endif
                    <h3>{{ $book->title }}</h3>
                    <p><strong>Author:</strong> {{ $book->author }}</p>
                    <p><strong>Status:</strong> {{ ucfirst(str_replace('_', ' ', $book->status)) }}</p>
                    @if($book->description)
                        <p>{{ Str::limit($book->description, 120) }}</p>
                    @endif

                    <div class="card-actions">
                        <a href="{{ route('library.edit', $book->_id) }}" class="edit-btn">Edit</a>

                        <form method="POST" action="{{ route('library.destroy', $book->_id) }}" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="delete-btn">Delete</button>
                        </form>
                    </div>
                </div>
            @endforeach
        </div>
    </div>

</body>
</html>
