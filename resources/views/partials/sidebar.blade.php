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