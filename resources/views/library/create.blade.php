<!DOCTYPE html>
<html>
<head>
    <title>Add Book</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        body {
            margin: 0;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: #000000;
            color: #ffffff;
            min-height: 100vh;
            overflow-x: hidden;
        }

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
    </style>
</head>
<body>

<!-- Sidebar -->
<div class="sidebar">
    <h2>Mystic<span style="color: #fff;">Scrolls</span></h2>
    <ul>
        <li><a href="/dashboard">📊 Dashboard</a></li>
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
    <h2>➕ Add a New Book</h2>

    @if(session('success'))
        <div style="color: #00ff55;">{{ session('success') }}</div>
    @endif

    @if($errors->any())
        <div style="color: red;">
            <ul>
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form method="POST" action="{{ route('library.store') }}" enctype="multipart/form-data">
        @csrf

        <label>Title:</label>
        <input name="title" value="{{ old('title') }}" required>

        <label>Book Cover:</label>
        <input type="file" name="image" accept="image/*">

        <label>Description:</label>
        <textarea name="description">{{ old('description') }}</textarea>

        <label>Author:</label>
        <input name="author" value="{{ old('author') }}" required>

        <label>ISBN:</label>
        <input name="isbn" value="{{ old('isbn') }}">

        <label>Publisher:</label>
        <input name="publisher" value="{{ old('publisher') }}">

        <label>Category:</label>
<select name="category" required>
    <option value="">-- Select Category --</option>
    <option value="Fiction" {{ old('category') == 'Fiction' ? 'selected' : '' }}>Fiction</option>
    <option value="Non-Fiction" {{ old('category') == 'Non-Fiction' ? 'selected' : '' }}>Non-Fiction</option>
    <option value="Fantasy" {{ old('category') == 'Fantasy' ? 'selected' : '' }}>Fantasy</option>
    <option value="Science Fiction" {{ old('category') == 'Science Fiction' ? 'selected' : '' }}>Science Fiction</option>
    <option value="Mystery" {{ old('category') == 'Mystery' ? 'selected' : '' }}>Mystery</option>
    <option value="Biography" {{ old('category') == 'Biography' ? 'selected' : '' }}>Biography</option>
    <option value="Romance" {{ old('category') == 'Romance' ? 'selected' : '' }}>Romance</option>
    <option value="Self-Help" {{ old('category') == 'Self-Help' ? 'selected' : '' }}>Self-Help</option>
    <option value="Other" {{ old('category') == 'Other' ? 'selected' : '' }}>Other</option>
</select>

        <label>Status:</label>
        <select name="status" required>
            <option value="">-- Select --</option>
            <option value="read" {{ old('status') == 'read' ? 'selected' : '' }}>Read</option>
            <option value="currently_reading" {{ old('status') == 'currently_reading' ? 'selected' : '' }}>Currently Reading</option>
            <option value="not_read" {{ old('status') == 'not_read' ? 'selected' : '' }}>Not Read</option>
        </select>

        <button type="submit">Add Book</button>
    </form>
</div>

</body>
</html>
