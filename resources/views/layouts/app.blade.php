<!DOCTYPE html>
<html>
<head>
    <title>@yield('title', 'MysticScrolls')</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @yield('head') <!-- Page-specific CSS if needed -->
</head>
<body style="margin: 0; font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif; background-color: #000000; color: #ffffff; min-height: 100vh; position: relative; overflow-x: hidden;">
    
    <!-- Background Grid -->
    <div style="position: fixed; top: 0; left: 0; right: 0; bottom: 0; background-image: 
        linear-gradient(rgba(0, 255, 85, 0.03) 1px, transparent 1px), 
        linear-gradient(90deg, rgba(0, 255, 85, 0.03) 1px, transparent 1px); 
        background-size: 50px 50px; z-index: -1;"></div>

    <!-- Sidebar -->
    @include('partials.sidebar')

    <!-- Main Content -->
    <div style="margin-left: 220px; padding: 30px; box-sizing: border-box;">
        @yield('content')
    </div>

    <style>
        a:hover {
            color: #00ff55 !important;
            border-color: #00ff55 !important;
            background-color: rgba(0, 255, 85, 0.05) !important;
        }

        button:hover {
            background-color: #00ff55 !important;
            color: #000000 !important;
        }

        input:focus {
            border-color: #00ff55 !important;
            box-shadow: 0 0 0 1px #00ff55 !important;
        }
    </style>

    @yield('scripts') <!-- Page-specific scripts -->
</body>
</html>
