<!DOCTYPE html>
<html>
<head>
    <title>{{ $book->title }}</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        body {
            background-color: #000;
            color: #fff;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            padding: 40px;
        }
        .cover {
            width: 100%;
            max-width: 400px;
            border-radius: 6px;
            margin-bottom: 20px;
        }
        h1 {
            color: #00ff55;
            margin-bottom: 10px;
        }
        .summary {
            color: #aaa;
            margin-bottom: 30px;
        }
        .content {
            white-space: pre-wrap;
            background: #111;
            padding: 20px;
            border-radius: 4px;
            border: 1px solid #333;
        }
        .download-btn {
            display: inline-block;
            margin-top: 20px;
            background-color: #00ff55;
            color: #000;
            padding: 12px 24px;
            border-radius: 4px;
            font-weight: bold;
            text-decoration: none;
        }
    </style>
</head>
<body>
    @if($book->cover)
        <img src="{{ asset('storage/' . $book->cover) }}" class="cover" alt="Cover">
    @endif
    <h1>{{ $book->title }}</h1>
    <p class="summary">{{ $book->summary }}</p>
    <div class="content">{!! nl2br(e($book->content)) !!}</div>
    <a class="download-btn" href="{{ route('userbooks.download', $book->_id) }}">⬇️ Download PDF</a>
</body>
</html>


// resources/views/userbooks/pdf.blade.php
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <style>
        body { font-family: DejaVu Sans, sans-serif; padding: 20px; }
        h1 { color: #00aa44; }
        .summary { font-style: italic; margin-bottom: 20px; }
        .content { white-space: pre-wrap; }
    </style>
</head>
<body>
    <h1>{{ $book->title }}</h1>
    <p class="summary">{{ $book->summary }}</p>
    <div class="content">{!! nl2br(e($book->content)) !!}</div>
</body>
</html>