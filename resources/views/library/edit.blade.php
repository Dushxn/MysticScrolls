<!DOCTYPE html>
<html>
<head>
    <title>Edit Book</title>
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

        /* Sidebar */
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

        /* Main */
        .main {
            margin-left: 220px;
            padding: 40px;
        }

        input, textarea, select {
            width: 100%;
            padding: 12px 15px;
            border: 1px solid #333333;
            font-size: 14px;
            background-color: #111111;
            color: #ffffff;
            border-radius: 4px;
            margin-bottom: 20px;
            box-sizing: border-box;
            outline: none;
        }

        input:focus, textarea:focus, select:focus {
            border-color: #00ff55;
            box-shadow: 0 0 0 1px #00ff55;
        }

        button {
            background-color: #00ff55;
            color: #000;
            border: none;
            padding: 14px;
            font-size: 14px;
            font-weight: 600;
            cursor: pointer;
            text-transform: uppercase;
            border-radius: 4px;
            transition: background 0.3s ease;
        }

        button:hover {
            background-color: #00cc44;
        }

        .messages {
            margin-bottom: 20px;
        }

        .success {
            color: #00ff55;
        }

        .error {
            color: #ff4444;
        }
    </style>
</head>
<body>

    <!-- Sidebar -->
    <div class="sidebar">
        <h2>Mystic<span style="color: #fff;">Scrolls</span></h2>
        <ul>
            <li><a href="#" class="active">📊 Dashboard</a></li>
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
        <h2>Edit Book</h2>

        <div class="messages">
            @if(session('success'))
                <div class="success">{{ session('success') }}</div>
            @endif

            @if(session('error'))
                <div class="error">{{ session('error') }}</div>
            @endif

            @if($errors->any())
                <div class="error">
                    <ul>
                        @foreach($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
        </div>

        <form method="POST" action="{{ route('library.update', $book->_id) }}">
            @csrf
            @method('PUT')

            <label>Title:</label>
            <input name="title" value="{{ old('title', $book->title) }}" required>

            <label>Image URL:</label>
            <input name="image" value="{{ old('image', $book->image) }}">

            <label>Description:</label>
            <textarea name="description">{{ old('description', $book->description) }}</textarea>

            <label>Author:</label>
            <input name="author" value="{{ old('author', $book->author) }}" required>

            <label>ISBN:</label>
            <input name="isbn" value="{{ old('isbn', $book->isbn) }}">

            <label>Publisher:</label>
            <input name="publisher" value="{{ old('publisher', $book->publisher) }}">

            <label>Category:</label>
            <input name="category" value="{{ old('category', $book->category) }}">

            <label>Status:</label>
            <select name="status" required>
                <option value="">-- Select --</option>
                <option value="read" {{ old('status', $book->status) == 'read' ? 'selected' : '' }}>Read</option>
                <option value="currently_reading" {{ old('status', $book->status) == 'currently_reading' ? 'selected' : '' }}>Currently Reading</option>
                <option value="not_read" {{ old('status', $book->status) == 'not_read' ? 'selected' : '' }}>Not Read</option>
            </select>

            <button type="submit">Update Book</button>
        </form>
    </div>

</body>
</html>
