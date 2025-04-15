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
            overflow-x: hidden;
            display: flex;
        }

        .sidebar {
            width: 220px;
            background-color: #0a0a0a;
            border-right: 1px solid rgba(0, 255, 85, 0.2);
            height: 100vh;
            padding: 20px 0;
        }

        .sidebar h2 {
            color: #00ff55;
            font-size: 22px;
            margin-left: 20px;
            margin-bottom: 30px;
        }

        .sidebar ul {
            list-style: none;
            padding: 0;
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

        h2 {
            margin-bottom: 30px;
            color: #00ff55;
        }

        input, textarea {
            width: 100%;
            padding: 12px 15px;
            border: 1px solid #333;
            font-size: 14px;
            background-color: #111;
            color: #fff;
            border-radius: 4px;
            margin-bottom: 20px;
        }

        input:focus, textarea:focus {
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
            border-radius: 4px;
            transition: background 0.3s ease;
        }

        button:hover {
            background-color: #00cc44;
        }

        img.preview {
            width: 200px;
            border-radius: 4px;
            margin-bottom: 20px;
        }

        .alert {
            padding: 12px;
            background-color: #111;
            border-left: 5px solid #00ff55;
            margin-bottom: 20px;
        }

        .preview-section {
            background-color: #111;
            border: 1px solid #333;
            padding: 20px;
            border-radius: 6px;
            margin-top: 30px;
        }
    </style>
    <script>
        function showPreview() {
            document.getElementById('preview-title').innerText = document.getElementById('title').value;
            document.getElementById('preview-summary').innerText = document.getElementById('summary').value;
            document.getElementById('preview-content').innerText = document.getElementById('content').value;
        }
    </script>
</head>
<body>

<!-- Sidebar -->
<div class="sidebar">
    <h2>Mystic<span style="color: white;">Scrolls</span></h2>
    <ul>
        <li><a href="/dashboard">📊 Dashboard</a></li>
        <li><a href="/my-library">📚 My Library</a></li>
        <li><a href="{{ route('userbooks.index') }}" class="active">🖊️ My Books</a></li>
    </ul>
    <!-- <form method="POST" action="{{ route('logout') }}">
        @csrf
        <button type="submit">🚪 Logout</button>
    </form> -->
</div>

<!-- Main Content -->
<div class="main">
    <h2>✏️ Edit Your Book</h2>

    @if(session('success'))
        <div class="alert">{{ session('success') }}</div>
    @endif

    @if($errors->any())
        <div class="alert" style="color: red;">
            <ul>
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form method="POST" action="{{ route('userbooks.update', $book->_id) }}" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <label>Title:</label>
        <input type="text" name="title" id="title" value="{{ old('title', $book->title) }}" required>

        <label>Summary:</label>
        <textarea name="summary" id="summary" rows="3">{{ old('summary', $book->summary) }}</textarea>

        <label>Content:</label>
        <textarea name="content" id="content" rows="8">{{ old('content', $book->content) }}</textarea>

        <label>Current Cover:</label><br>
        @if($book->cover)
            <img src="{{ asset('storage/' . $book->cover) }}" class="preview" alt="Current Cover"><br>
        @else
            <p style="color: #999;">No cover uploaded</p>
        @endif

        <label>Replace Cover (optional):</label>
        <input type="file" name="cover" accept="image/*">

        <button type="submit">💾 Save Changes</button>
        <button type="button" onclick="showPreview()" style="margin-left: 10px;">👁️ Live Preview</button>
    </form>

    <div class="preview-section">
        <h3 id="preview-title">(Preview Title)</h3>
        <p id="preview-summary">(Preview Summary)</p>
        <hr>
        <pre id="preview-content">(Preview Content)</pre>
    </div>
</div>

</body>
</html>
