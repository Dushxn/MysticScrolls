<!DOCTYPE html>
<html>
<head>
    <title>{{ $book->title }}</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        :root {
            --primary: #00ff55;
            --primary-dark: #00cc44;
            --bg-dark: #121212;
            --bg-darker: #0a0a0a;
            --text: #f5f5f5;
            --text-secondary: #aaaaaa;
            --border: #333333;
        }
        
        body {
            background-color: var(--bg-dark);
            color: var(--text);
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            margin: 0;
            padding: 0;
            line-height: 1.6;
            display: flex;
            flex-direction: column;
            min-height: 100vh;
        }
        
        /* Header */
        header {
            background-color: var(--bg-darker);
            padding: 16px 24px;
            border-bottom: 1px solid var(--border);
            display: flex;
            justify-content: space-between;
            align-items: center;
            position: sticky;
            top: 0;
            z-index: 100;
        }
        
        .book-title {
            color: var(--primary);
            font-size: 1.2rem;
            margin: 0;
            white-space: nowrap;
            overflow: hidden;
            text-overflow: ellipsis;
            max-width: 70%;
        }
        
        /* Main container */
        .container {
            display: flex;
            flex: 1;
        }
        
        /* Sidebar */
        .sidebar {
            width: 300px;
            background-color: var(--bg-darker);
            padding: 20px;
            border-right: 1px solid var(--border);
            display: none;
        }
        
        .cover {
            width: 100%;
            border-radius: 8px;
            box-shadow: 0 4px 12px rgba(0, 255, 85, 0.2);
            margin-bottom: 20px;
        }
        
        .summary {
            color: var(--text-secondary);
            margin-bottom: 24px;
            font-size: 0.95rem;
        }
        
        /* Reading area */
        .reading-area {
            flex: 1;
            padding: 40px 20px;
            max-width: 800px;
            margin: 0 auto;
            width: 100%;
        }
        
        .content {
            white-space: pre-wrap;
            background: rgba(17, 17, 17, 0.6);
            padding: 30px;
            border-radius: 8px;
            border: 1px solid var(--border);
            font-size: 1.1rem;
            line-height: 1.8;
            margin-bottom: 40px;
        }
        
        /* Controls */
        .controls {
            position: fixed;
            bottom: 0;
            left: 0;
            right: 0;
            background-color: var(--bg-darker);
            padding: 12px 24px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            border-top: 1px solid var(--border);
            z-index: 100;
        }
        
        .btn {
            background-color: var(--primary);
            color: var(--bg-darker);
            padding: 8px 16px;
            border-radius: 4px;
            font-weight: 600;
            text-decoration: none;
            border: none;
            cursor: pointer;
            transition: all 0.2s ease;
        }
        
        .btn:hover {
            background-color: var(--primary-dark);
        }
        
        .btn-outline {
            background-color: transparent;
            border: 1px solid var(--primary);
            color: var(--primary);
        }
        
        .btn-outline:hover {
            background-color: rgba(0, 255, 85, 0.1);
        }
        
        .progress {
            flex: 1;
            height: 4px;
            background-color: var(--border);
            border-radius: 2px;
            margin: 0 20px;
            position: relative;
        }
        
        .progress-bar {
            position: absolute;
            top: 0;
            left: 0;
            height: 100%;
            background-color: var(--primary);
            border-radius: 2px;
            width: 30%; /* Example progress */
        }
        
        /* Reading settings */
        .reading-settings {
            background-color: var(--bg-darker);
            position: fixed;
            bottom: 60px;
            right: 20px;
            padding: 16px;
            border-radius: 8px;
            border: 1px solid var(--border);
            display: none;
        }
        
        .settings-title {
            color: var(--primary);
            margin-top: 0;
            margin-bottom: 12px;
            font-size: 1rem;
        }
        
        .font-size-controls {
            display: flex;
            align-items: center;
            margin-bottom: 12px;
        }
        
        .control-btn {
            background-color: var(--bg-dark);
            color: var(--primary);
            border: 1px solid var(--border);
            width: 30px;
            height: 30px;
            display: flex;
            align-items: center;
            justify-content: center;
            border-radius: 4px;
            cursor: pointer;
        }
        
        .font-size-value {
            margin: 0 10px;
            color: var(--text-secondary);
        }
        
        /* Toggle button */
        .toggle-sidebar {
            background: transparent;
            border: none;
            color: var(--primary);
            cursor: pointer;
            padding: 8px;
            font-size: 1.2rem;
        }
        
        .settings-toggle {
            background: transparent;
            border: none;
            color: var(--primary);
            cursor: pointer;
            padding: 8px;
            font-size: 1.2rem;
        }
        
        /* Chapter navigation */
        .chapter-nav {
            display: flex;
            gap: 8px;
        }
        
        /* Responsive design */
        @media (min-width: 992px) {
            .sidebar {
                display: block;
            }
            
            .reading-area {
                padding: 40px;
            }
            
            .toggle-sidebar {
                display: none;
            }
            
            .content {
                padding: 40px;
            }
        }
        
        @media (max-width: 768px) {
            .reading-area {
                padding: 20px 16px 80px;
            }
            
            .content {
                padding: 20px;
                font-size: 1rem;
            }
            
            .chapter-nav {
                display: none;
            }
        }
    </style>
</head>
<body>
    <header>
        <button class="toggle-sidebar">☰</button>
        <h1 class="book-title">{{ $book->title }}</h1>
        <button class="settings-toggle">⚙️</button>
    </header>
    
    <div class="container">
        <aside class="sidebar">
            @if($book->cover)
                <img src="{{ asset('storage/' . $book->cover) }}" class="cover" alt="Book Cover">
            @endif
            <h2>{{ $book->title }}</h2>
            <p class="summary">{{ $book->summary }}</p>
            <a class="btn" href="{{ route('userbooks.download', $book->_id) }}">⬇️ Download PDF</a>
        </aside>
        
        <main class="reading-area">
            <div class="content">{!! nl2br(e($book->content)) !!}</div>
        </main>
    </div>
    
    <div class="reading-settings">
        <h3 class="settings-title">Reading Settings</h3>
        <div class="font-size-controls">
            <button class="control-btn">A-</button>
            <span class="font-size-value">100%</span>
            <button class="control-btn">A+</button>
        </div>
    </div>
    
    <div class="controls">
        <div class="chapter-nav">
            <button class="btn btn-outline">Previous Chapter</button>
            <button class="btn btn-outline">Next Chapter</button>
        </div>
        <div class="progress">
            <div class="progress-bar"></div>
        </div>
        <a class="btn" href="{{ route('userbooks.download', $book->_id) }}">⬇️</a>
    </div>

    <script>
        // Toggle sidebar visibility on mobile
        document.querySelector('.toggle-sidebar').addEventListener('click', function() {
            const sidebar = document.querySelector('.sidebar');
            sidebar.style.display = sidebar.style.display === 'block' ? 'none' : 'block';
        });
        
        // Toggle reading settings
        document.querySelector('.settings-toggle').addEventListener('click', function() {
            const settings = document.querySelector('.reading-settings');
            settings.style.display = settings.style.display === 'block' ? 'none' : 'block';
        });
        
        // Font size controls
        const content = document.querySelector('.content');
        let fontSize = 100;
        
        document.querySelectorAll('.control-btn').forEach(button => {
            button.addEventListener('click', function() {
                if (this.textContent === 'A+' && fontSize < 150) {
                    fontSize += 10;
                } else if (this.textContent === 'A-' && fontSize > 70) {
                    fontSize -= 10;
                }
                
                content.style.fontSize = `${fontSize/100 * 1.1}rem`;
                document.querySelector('.font-size-value').textContent = `${fontSize}%`;
            });
        });
    </script>
</body>
</html>