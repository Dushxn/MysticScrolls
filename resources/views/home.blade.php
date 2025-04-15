<!DOCTYPE html>
<html>
<head>
    <title>MysticScrolls - Welcome</title>
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

        .hero {
            text-align: center;
            padding: 80px 20px;
            background: linear-gradient(120deg, #0a0a0a, #111111);
            border-bottom: 1px solid rgba(0, 255, 85, 0.1);
        }

        .hero h1 {
            font-size: 48px;
            color: #00ff55;
            margin-bottom: 10px;
        }

        .hero p {
            font-size: 18px;
            color: #999;
            max-width: 600px;
            margin: 0 auto;
        }

        .feature-section {
            padding: 60px 30px;
        }

        .feature-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(260px, 1fr));
            gap: 30px;
            max-width: 1100px;
            margin: 0 auto;
        }

        .feature-card {
            background-color: #111;
            border: 1px solid rgba(0, 255, 85, 0.1);
            border-radius: 10px;
            overflow: hidden;
            box-shadow: 0 0 10px rgba(0, 255, 85, 0.05);
            transition: transform 0.3s ease;
        }

        .feature-card:hover {
            transform: translateY(-5px);
        }

        .feature-card img {
            width: 100%;
            height: 160px;
            object-fit: cover;
        }

        .feature-card-content {
            padding: 20px;
        }

        .feature-card-content h3 {
            margin: 0 0 10px;
            color: #00ff55;
        }

        .feature-card-content p {
            margin: 0;
            color: #ccc;
            font-size: 14px;
            line-height: 1.4;
        }

        .cta {
            text-align: center;
            padding: 40px 20px;
        }

        .cta a {
            background-color: #00ff55;
            color: #000;
            padding: 14px 28px;
            font-weight: bold;
            text-decoration: none;
            border-radius: 5px;
            transition: background-color 0.3s ease;
        }

        .cta a:hover {
            background-color: #00cc44;
        }
    </style>
</head>
<body>

    <!-- Hero Section -->
    <div class="hero">
        <h1>Welcome to MysticScrolls</h1>
        <p>Your personal digital reading tracker and library assistant. Manage your books, track your reading journey, and stay motivated — all in one place.</p>
    </div>

    <!-- Feature Section -->
    <div class="feature-section">
        <div class="feature-grid">
            <!-- Card 1 -->
            <div class="feature-card">
                <img src="https://uiii.ac.id/assets/images/1636690539-alfons-morales-YLSwjSy7stw-unsplash-2.jpg" alt="Library">
                <div class="feature-card-content">
                    <h3>My Library</h3>
                    <p>Browse your personal collection of books. Add, edit, or remove entries easily with cover uploads and reading status.</p>
                </div>
            </div>

            <!-- Card 2 -->
            <div class="feature-card">
                <img src="https://i.pinimg.com/736x/19/4d/a5/194da5517e0a11e677a9dee64e4f1d96.jpg" alt="Progress Tracking">
                <div class="feature-card-content">
                    <h3>Track Progress</h3>
                    <p>Update your reading status — whether you're currently reading, finished, or planning to start. Stay organized!</p>
                </div>
            </div>

            <!-- Card 3 -->
            <div class="feature-card">
                <img src="https://img.freepik.com/premium-photo/cozy-reading-nook-by-window-with-stack-books-lit-candle_14117-982426.jpg" alt="Reading Goals">
                <div class="feature-card-content">
                    <h3>Set Goals</h3>
                    <p>Set personal reading goals and track your achievements over time. Build a streak and challenge yourself monthly!</p>
                </div>
            </div>

            <!-- Card 4 -->
            <div class="feature-card">
                <img src="https://wander-mag.com/wp-content/uploads/2022/03/reading-clay-banks-w_qTfiPbjbg-unsplash.jpg" alt="Discover">
                <div class="feature-card-content">
                    <h3>Search & Filter</h3>
                    <p>Easily search your books by title, author, or ISBN. Powerful filters help you find what you’re looking for instantly.</p>
                </div>
            </div>
        </div>
    </div>

    <!-- Call to Action -->
    <div class="cta">
        <a href="{{ route('login') }}">📖 Get Started</a>
    </div>

</body>
</html>
