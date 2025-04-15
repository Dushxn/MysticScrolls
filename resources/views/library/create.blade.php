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
            padding: 40px;
        }

        .container {
            max-width: 500px;
            margin: 0 auto;
            background-color: #111111;
            padding: 30px;
            border-radius: 10px;
            border: 1px solid rgba(0, 255, 85, 0.2);
            box-shadow: 0 0 20px rgba(0, 255, 85, 0.05);
        }

        h2 {
            color: #00ff55;
            margin-bottom: 20px;
        }

        label {
            display: block;
            margin-bottom: 6px;
            font-size: 13px;
            letter-spacing: 0.5px;
            color: #00ff55;
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

        .messages ul {
            padding-left: 16px;
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

    <div class="container">
        <h2>➕ Add a New Book</h2>

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

        <form method="POST" action="{{ route('library.store') }}">
            @csrf

            <label for="title">Title</label>
            <input name="title" id="title" value="{{ old('title') }}" required>

            <label for="image">Image URL</label>
            <input name="image" id="image" value="{{ old('image') }}">

            <label for="description">Description</label>
            <textarea name="description" id="description">{{ old('description') }}</textarea>

            <label for="author">Author</label>
            <input name="author" id="author" value="{{ old('author') }}" required>

            <label for="isbn">ISBN</label>
            <input name="isbn" id="isbn" value="{{ old('isbn') }}">

            <label for="publisher">Publisher</label>
            <input name="publisher" id="publisher" value="{{ old('publisher') }}">

            <label for="category">Category</label>
            <input name="category" id="category" value="{{ old('category') }}">

            <label for="status">Status</label>
            <select name="status" id="status" required>
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
