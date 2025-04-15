<!DOCTYPE html>
<html>
<head>
    <title>Write a Book</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        body {
            background-color: #000;
            color: #fff;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            padding: 40px;
        }
        input, textarea {
            width: 100%;
            background: #111;
            color: #fff;
            padding: 12px;
            border: 1px solid #333;
            margin-bottom: 20px;
            border-radius: 4px;
        }
        label {
            display: block;
            margin-bottom: 5px;
            font-weight: bold;
        }
        button {
            background-color: #00ff55;
            color: #000;
            padding: 12px 24px;
            border: none;
            border-radius: 4px;
            font-weight: bold;
            cursor: pointer;
        }
        .preview {
            background: #111;
            border: 1px solid #444;
            padding: 20px;
            margin-top: 30px;
            border-radius: 4px;
        }
    </style>
    <script>
        function showPreview() {
            document.getElementById('preview-title').textContent = document.getElementById('title').value;
            document.getElementById('preview-summary').textContent = document.getElementById('summary').value;
            document.getElementById('preview-content').textContent = document.getElementById('content').value;
        }
    </script>
</head>
<body>
    <h2>✍️ Write & Publish a Book</h2>
    <form action="{{ route('userbooks.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <label>Title</label>
        <input type="text" id="title" name="title" required>

        <label>Cover Image</label>
        <input type="file" name="cover" accept="image/*">

        <label>Summary</label>
        <textarea id="summary" name="summary"></textarea>

        <label>Book Content (Chapters, Paragraphs)</label>
        <textarea id="content" name="content" rows="10" required></textarea>

        <button type="submit">📚 Publish</button>
        <button type="button" onclick="showPreview()" style="margin-left: 10px;">👁️ Live Preview</button>
    </form>

    <div class="preview">
        <h3 id="preview-title">(Preview Title)</h3>
        <p id="preview-summary">(Preview Summary)</p>
        <hr>
        <pre id="preview-content">(Preview Content)</pre>
    </div>
</body>
</html>