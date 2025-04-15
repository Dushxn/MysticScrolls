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
        <input name="category" value="{{ old('category') }}">

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
