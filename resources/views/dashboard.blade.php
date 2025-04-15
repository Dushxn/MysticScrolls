<!DOCTYPE html>
<html>
<head>
    <title>ReadTrack Dashboard</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<body style="margin: 0; font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif; background-color: #000000; color: #ffffff; min-height: 100vh; position: relative; overflow-x: hidden;">
    <!-- Minimal background grid -->
    <div style="position: fixed; top: 0; left: 0; right: 0; bottom: 0; background-image: 
        linear-gradient(rgba(0, 255, 85, 0.03) 1px, transparent 1px), 
        linear-gradient(90deg, rgba(0, 255, 85, 0.03) 1px, transparent 1px); 
        background-size: 50px 50px; z-index: -1;"></div>
    
    <!-- Side Navigation -->
    <div style="position: fixed; width: 220px; height: 100vh; background-color: #0a0a0a; border-right: 1px solid rgba(0, 255, 85, 0.2); padding: 20px 0; box-sizing: border-box; z-index: 10;">
        <div style="padding: 0 20px;">
            <h2 style="color: #00ff55; font-size: 22px; margin: 0 0 30px 0; letter-spacing: 1px;">Mystic<span style="color: #ffffff;">Scrolls</span></h2>
        </div>
        
        <ul style="list-style-type: none; padding: 0; margin: 0;">
            <li style="margin-bottom: 5px;">
                <a href="#" style="display: block; padding: 12px 20px; color: #ffffff; text-decoration: none; border-left: 3px solid #00ff55; background-color: rgba(0, 255, 85, 0.1);">
                    <span style="margin-right: 10px; opacity: 0.7;">📊</span> Dashboard
                </a>
            </li>
            <li style="margin-bottom: 5px;">
                <a href="/my-library" style="display: block; padding: 12px 20px; color: #999999; text-decoration: none; border-left: 3px solid transparent; transition: all 0.2s;">
                    <span style="margin-right: 10px; opacity: 0.7;">📚</span> My Library
                </a>
            </li>
            <li style="margin-bottom: 5px;">
                <a href="#" style="display: block; padding: 12px 20px; color: #999999; text-decoration: none; border-left: 3px solid transparent; transition: all 0.2s;">
                    <span style="margin-right: 10px; opacity: 0.7;">📖</span> Currently Reading
                </a>
            </li>
            <li style="margin-bottom: 5px;">
                <a href="#" style="display: block; padding: 12px 20px; color: #999999; text-decoration: none; border-left: 3px solid transparent; transition: all 0.2s;">
                    <span style="margin-right: 10px; opacity: 0.7;">🎯</span> Reading Goals
                </a>
            </li>
            <li style="margin-bottom: 5px;">
                <a href="#" style="display: block; padding: 12px 20px; color: #999999; text-decoration: none; border-left: 3px solid transparent; transition: all 0.2s;">
                    <span style="margin-right: 10px; opacity: 0.7;">📈</span> Statistics
                </a>
            </li>
            <li style="margin-bottom: 5px;">
                <a href="#" style="display: block; padding: 12px 20px; color: #999999; text-decoration: none; border-left: 3px solid transparent; transition: all 0.2s;">
                    <span style="margin-right: 10px; opacity: 0.7;">⚙️</span> Settings
                </a>
            </li>
        </ul>
        
        <div style="position: absolute; bottom: 20px; left: 0; width: 100%; padding: 0 20px; box-sizing: border-box;">
            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button type="submit" style="width: 100%; background-color: transparent; color: #999999; border: 1px solid #333333; padding: 10px; font-size: 14px; cursor: pointer; transition: all 0.3s; text-align: left;">
                    <span style="margin-right: 10px; opacity: 0.7;">🚪</span> Logout
                </button>
            </form>
        </div>
    </div>
    
    <!-- Main Content -->
    <div style="margin-left: 220px; padding: 30px; box-sizing: border-box;">
        <!-- Header -->
        <header style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 30px;">
            <div>
                <h1 style="margin: 0; color: #ffffff; font-weight: 500; font-size: 24px; letter-spacing: 1px;">Welcome, <span style="color: #00ff55;">{{ auth()->user()->name }}</span></h1>
                <p style="margin: 5px 0 0 0; color: #999999; font-size: 14px;">{{ date('l, F j, Y') }}</p>
            </div>
            
            <div style="display: flex; align-items: center;">
                <div style="position: relative; margin-right: 20px;">
                    <input type="text" placeholder="Search books..." style="padding: 10px 15px; width: 250px; background-color: #111111; border: 1px solid #333333; color: #ffffff; font-size: 14px; outline: none;">
                </div>
                
                <div style="width: 40px; height: 40px; border-radius: 50%; background-color: #00ff55; color: #000000; display: flex; align-items: center; justify-content: center; font-weight: bold; font-size: 16px;">
                    {{ substr(auth()->user()->name, 0, 1) }}
                </div>
            </div>
        </header>
        
        <!-- Stats Cards -->
        <div style="display: grid; grid-template-columns: repeat(4, 1fr); gap: 20px; margin-bottom: 30px;">
            <div style="background-color: #0a0a0a; border: 1px solid #333333; padding: 20px; border-radius: 4px;">
                <h3 style="margin: 0 0 5px 0; color: #999999; font-size: 14px; font-weight: normal; text-transform: uppercase; letter-spacing: 1px;">Books Read</h3>
                <p style="margin: 0; font-size: 28px; font-weight: 600; color: #00ff55;">24</p>
                <p style="margin: 5px 0 0 0; font-size: 12px; color: #999999;">+3 from last month</p>
            </div>
            
            <div style="background-color: #0a0a0a; border: 1px solid #333333; padding: 20px; border-radius: 4px;">
                <h3 style="margin: 0 0 5px 0; color: #999999; font-size: 14px; font-weight: normal; text-transform: uppercase; letter-spacing: 1px;">Reading Streak</h3>
                <p style="margin: 0; font-size: 28px; font-weight: 600; color: #00ff55;">12 days</p>
                <p style="margin: 5px 0 0 0; font-size: 12px; color: #999999;">Your longest: 30 days</p>
            </div>
            
            <div style="background-color: #0a0a0a; border: 1px solid #333333; padding: 20px; border-radius: 4px;">
                <h3 style="margin: 0 0 5px 0; color: #999999; font-size: 14px; font-weight: normal; text-transform: uppercase; letter-spacing: 1px;">Pages Read</h3>
                <p style="margin: 0; font-size: 28px; font-weight: 600; color: #00ff55;">5,842</p>
                <p style="margin: 5px 0 0 0; font-size: 12px; color: #999999;">Avg. 194 pages per book</p>
            </div>
            
            <div style="background-color: #0a0a0a; border: 1px solid #333333; padding: 20px; border-radius: 4px;">
                <h3 style="margin: 0 0 5px 0; color: #999999; font-size: 14px; font-weight: normal; text-transform: uppercase; letter-spacing: 1px;">Reading Goal</h3>
                <p style="margin: 0; font-size: 28px; font-weight: 600; color: #00ff55;">24/50</p>
                <p style="margin: 5px 0 0 0; font-size: 12px; color: #999999;">48% of yearly goal</p>
            </div>
        </div>
        
        <!-- Currently Reading Section -->
        <div style="margin-bottom: 40px;">
            <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 20px;">
                <h2 style="margin: 0; color: #ffffff; font-size: 18px; font-weight: 500;">Currently Reading</h2>
                <a href="#" style="color: #00ff55; text-decoration: none; font-size: 14px;">View All</a>
            </div>
            
            <div style="display: grid; grid-template-columns: repeat(3, 1fr); gap: 20px;">
                <!-- Book 1 -->
                <div style="background-color: #0a0a0a; border: 1px solid #333333; border-radius: 4px; overflow: hidden;">
                    <div style="height: 180px; background-color: #111111; display: flex; align-items: center; justify-content: center; color: #00ff55; font-size: 40px;">📖</div>
                    <div style="padding: 15px;">
                        <h3 style="margin: 0 0 5px 0; color: #ffffff; font-size: 16px;">Neuromancer</h3>
                        <p style="margin: 0 0 10px 0; color: #999999; font-size: 14px;">William Gibson</p>
                        <div style="background-color: #111111; height: 6px; border-radius: 3px; margin-bottom: 10px;">
                            <div style="background-color: #00ff55; width: 65%; height: 100%; border-radius: 3px;"></div>
                        </div>
                        <p style="margin: 0; color: #999999; font-size: 12px;">65% complete • 120 pages left</p>
                    </div>
                </div>
                
                <!-- Book 2 -->
                <div style="background-color: #0a0a0a; border: 1px solid #333333; border-radius: 4px; overflow: hidden;">
                    <div style="height: 180px; background-color: #111111; display: flex; align-items: center; justify-content: center; color: #00ff55; font-size: 40px;">📖</div>
                    <div style="padding: 15px;">
                        <h3 style="margin: 0 0 5px 0; color: #ffffff; font-size: 16px;">Dune</h3>
                        <p style="margin: 0 0 10px 0; color: #999999; font-size: 14px;">Frank Herbert</p>
                        <div style="background-color: #111111; height: 6px; border-radius: 3px; margin-bottom: 10px;">
                            <div style="background-color: #00ff55; width: 30%; height: 100%; border-radius: 3px;"></div>
                        </div>
                        <p style="margin: 0; color: #999999; font-size: 12px;">30% complete • 412 pages left</p>
                    </div>
                </div>
                
                <!-- Book 3 -->
                <div style="background-color: #0a0a0a; border: 1px solid #333333; border-radius: 4px; overflow: hidden;">
                    <div style="height: 180px; background-color: #111111; display: flex; align-items: center; justify-content: center; color: #00ff55; font-size: 40px;">📖</div>
                    <div style="padding: 15px;">
                        <h3 style="margin: 0 0 5px 0; color: #ffffff; font-size: 16px;">Snow Crash</h3>
                        <p style="margin: 0 0 10px 0; color: #999999; font-size: 14px;">Neal Stephenson</p>
                        <div style="background-color: #111111; height: 6px; border-radius: 3px; margin-bottom: 10px;">
                            <div style="background-color: #00ff55; width: 15%; height: 100%; border-radius: 3px;"></div>
                        </div>
                        <p style="margin: 0; color: #999999; font-size: 12px;">15% complete • 390 pages left</p>
                    </div>
                </div>
            </div>
        </div>
        
        <!-- Recent Activity & Reading Goals -->
        <div style="display: grid; grid-template-columns: 2fr 1fr; gap: 20px;">
            <!-- Recent Activity -->
            <div>
                <h2 style="margin: 0 0 20px 0; color: #ffffff; font-size: 18px; font-weight: 500;">Recent Activity</h2>
                
                <div style="background-color: #0a0a0a; border: 1px solid #333333; border-radius: 4px; padding: 20px;">
                    <!-- Activity Item 1 -->
                    <div style="display: flex; align-items: flex-start; margin-bottom: 20px; padding-bottom: 20px; border-bottom: 1px solid #222222;">
                        <div style="width: 40px; height: 40px; border-radius: 50%; background-color: rgba(0, 255, 85, 0.1); color: #00ff55; display: flex; align-items: center; justify-content: center; margin-right: 15px; flex-shrink: 0;">
                            📖
                        </div>
                        <div>
                            <p style="margin: 0 0 5px 0; color: #ffffff; font-size: 15px;">You read <span style="color: #00ff55;">42 pages</span> of <span style="color: #00ff55;">Neuromancer</span></p>
                            <p style="margin: 0; color: #999999; font-size: 13px;">Today, 2:30 PM</p>
                        </div>
                    </div>
                    
                    <!-- Activity Item 2 -->
                    <div style="display: flex; align-items: flex-start; margin-bottom: 20px; padding-bottom: 20px; border-bottom: 1px solid #222222;">
                        <div style="width: 40px; height: 40px; border-radius: 50%; background-color: rgba(0, 255, 85, 0.1); color: #00ff55; display: flex; align-items: center; justify-content: center; margin-right: 15px; flex-shrink: 0;">
                            ✅
                        </div>
                        <div>
                            <p style="margin: 0 0 5px 0; color: #ffffff; font-size: 15px;">You completed <span style="color: #00ff55;">The Hitchhiker's Guide to the Galaxy</span></p>
                            <p style="margin: 0; color: #999999; font-size: 13px;">Yesterday, 9:15 PM</p>
                        </div>
                    </div>
                    
                    <!-- Activity Item 3 -->
                    <div style="display: flex; align-items: flex-start; margin-bottom: 20px; padding-bottom: 20px; border-bottom: 1px solid #222222;">
                        <div style="width: 40px; height: 40px; border-radius: 50%; background-color: rgba(0, 255, 85, 0.1); color: #00ff55; display: flex; align-items: center; justify-content: center; margin-right: 15px; flex-shrink: 0;">
                            🏆
                        </div>
                        <div>
                            <p style="margin: 0 0 5px 0; color: #ffffff; font-size: 15px;">You achieved a <span style="color: #00ff55;">10-day reading streak</span></p>
                            <p style="margin: 0; color: #999999; font-size: 13px;">2 days ago</p>
                        </div>
                    </div>
                    
                    <!-- Activity Item 4 -->
                    <div style="display: flex; align-items: flex-start;">
                        <div style="width: 40px; height: 40px; border-radius: 50%; background-color: rgba(0, 255, 85, 0.1); color: #00ff55; display: flex; align-items: center; justify-content: center; margin-right: 15px; flex-shrink: 0;">
                            ➕
                        </div>
                        <div>
                            <p style="margin: 0 0 5px 0; color: #ffffff; font-size: 15px;">You added <span style="color: #00ff55;">3 books</span> to your library</p>
                            <p style="margin: 0; color: #999999; font-size: 13px;">3 days ago</p>
                        </div>
                    </div>
                </div>
            </div>
            
            <!-- Reading Goals -->
            <div>
                <h2 style="margin: 0 0 20px 0; color: #ffffff; font-size: 18px; font-weight: 500;">Reading Goals</h2>
                
                <div style="background-color: #0a0a0a; border: 1px solid #333333; border-radius: 4px; padding: 20px;">
                    <!-- Yearly Goal -->
                    <div style="margin-bottom: 25px;">
                        <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 10px;">
                            <h3 style="margin: 0; color: #ffffff; font-size: 15px; font-weight: 500;">Yearly Goal</h3>
                            <span style="color: #00ff55; font-size: 15px; font-weight: 500;">24/50 books</span>
                        </div>
                        <div style="background-color: #111111; height: 8px; border-radius: 4px;">
                            <div style="background-color: #00ff55; width: 48%; height: 100%; border-radius: 4px;"></div>
                        </div>
                    </div>
                    
                    <!-- Monthly Goal -->
                    <div style="margin-bottom: 25px;">
                        <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 10px;">
                            <h3 style="margin: 0; color: #ffffff; font-size: 15px; font-weight: 500;">Monthly Goal</h3>
                            <span style="color: #00ff55; font-size: 15px; font-weight: 500;">3/4 books</span>
                        </div>
                        <div style="background-color: #111111; height: 8px; border-radius: 4px;">
                            <div style="background-color: #00ff55; width: 75%; height: 100%; border-radius: 4px;"></div>
                        </div>
                    </div>
                    
                    <!-- Weekly Goal -->
                    <div>
                        <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 10px;">
                            <h3 style="margin: 0; color: #ffffff; font-size: 15px; font-weight: 500;">Weekly Goal</h3>
                            <span style="color: #00ff55; font-size: 15px; font-weight: 500;">5/7 days</span>
                        </div>
                        <div style="background-color: #111111; height: 8px; border-radius: 4px;">
                            <div style="background-color: #00ff55; width: 71%; height: 100%; border-radius: 4px;"></div>
                        </div>
                    </div>
                    
                    <button style="width: 100%; background-color: transparent; color: #00ff55; border: 1px solid #00ff55; padding: 10px; font-size: 14px; cursor: pointer; transition: all 0.3s; margin-top: 25px;">
                        Set New Goal
                    </button>
                </div>
            </div>
        </div>
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
</body>
</html>