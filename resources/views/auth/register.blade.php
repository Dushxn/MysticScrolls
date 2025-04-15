<!DOCTYPE html>
<html>
<head>
    <title>Register</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<body style="margin: 0; font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif; background-color: #000000; height: 100vh; display: flex; align-items: center; justify-content: center; position: relative; overflow: hidden;">
    <!-- Minimal background grid -->
    <div style="position: absolute; top: 0; left: 0; right: 0; bottom: 0; background-image: 
        linear-gradient(rgba(0, 255, 85, 0.03) 1px, transparent 1px), 
        linear-gradient(90deg, rgba(0, 255, 85, 0.03) 1px, transparent 1px); 
        background-size: 50px 50px;"></div>
    
    <div style="background-color: #000000; padding: 40px; border-radius: 4px; box-shadow: 0 0 30px rgba(0, 0, 0, 0.5); width: 100%; max-width: 360px; transform: translateY(0); transition: all 0.3s ease; animation: fadeIn 0.6s ease-out; border: 1px solid rgba(0, 255, 85, 0.2); position: relative; z-index: 10;">
        <!-- Simple top accent line -->
        <div style="width: 50px; height: 3px; background: #00ff55; margin-bottom: 30px;"></div>
        
        <div style="margin-bottom: 30px;">
            <h2 style="margin: 0; color: #ffffff; font-weight: 500; font-size: 24px; letter-spacing: 1px;">CREATE ACCOUNT</h2>
            <p style="margin-top: 8px; color: #999999; font-size: 14px;">Join our platform</p>
        </div>

        <form method="POST" action="{{ route('register') }}" style="display: flex; flex-direction: column;">
            @csrf
            <div style="position: relative; margin-bottom: 20px;">
                <label for="name" style="display: block; margin-bottom: 8px; font-size: 12px; color: #00ff55; font-weight: 400; letter-spacing: 1px;">NAME</label>
                <input 
                    type="text" 
                    id="name"
                    name="name" 
                    placeholder="Your full name" 
                    required 
                    style="width: 100%; padding: 12px 15px; border: 1px solid #333333; font-size: 14px; transition: all 0.3s; box-sizing: border-box; outline: none; background-color: #111111; color: #ffffff;">
            </div>
            
            <div style="position: relative; margin-bottom: 20px;">
                <label for="email" style="display: block; margin-bottom: 8px; font-size: 12px; color: #00ff55; font-weight: 400; letter-spacing: 1px;">EMAIL</label>
                <input 
                    type="email" 
                    id="email"
                    name="email" 
                    placeholder="your@email.com" 
                    required 
                    style="width: 100%; padding: 12px 15px; border: 1px solid #333333; font-size: 14px; transition: all 0.3s; box-sizing: border-box; outline: none; background-color: #111111; color: #ffffff;">
            </div>
            
            <div style="position: relative; margin-bottom: 20px;">
                <label for="password" style="display: block; margin-bottom: 8px; font-size: 12px; color: #00ff55; font-weight: 400; letter-spacing: 1px;">PASSWORD</label>
                <input 
                    type="password" 
                    id="password"
                    name="password" 
                    placeholder="••••••••" 
                    required 
                    style="width: 100%; padding: 12px 15px; border: 1px solid #333333; font-size: 14px; transition: all 0.3s; box-sizing: border-box; outline: none; background-color: #111111; color: #ffffff;">
            </div>
            
            <div style="position: relative; margin-bottom: 30px;">
                <label for="password_confirmation" style="display: block; margin-bottom: 8px; font-size: 12px; color: #00ff55; font-weight: 400; letter-spacing: 1px;">CONFIRM PASSWORD</label>
                <input 
                    type="password" 
                    id="password_confirmation"
                    name="password_confirmation" 
                    placeholder="••••••••" 
                    required 
                    style="width: 100%; padding: 12px 15px; border: 1px solid #333333; font-size: 14px; transition: all 0.3s; box-sizing: border-box; outline: none; background-color: #111111; color: #ffffff;">
            </div>
            
            <button 
                type="submit" 
                style="background-color: #00ff55; color: #000000; border: none; padding: 14px; font-size: 14px; font-weight: 600; cursor: pointer; transition: all 0.3s; text-transform: uppercase; letter-spacing: 1px; margin-top: 10px;">
                Register
            </button>
        </form>

        <div style="text-align: center; margin-top: 25px; padding-top: 20px; border-top: 1px solid #222222;">
            <a href="{{ route('login') }}" style="color: #00ff55; text-decoration: none; font-size: 14px; transition: color 0.3s;">Already have an account? Sign in</a>
        </div>
    </div>

    <style>
        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(10px); }
            to { opacity: 1; transform: translateY(0); }
        }
        
        input:focus {
            border-color: #00ff55 !important;
            box-shadow: 0 0 0 1px #00ff55 !important;
        }
        
        button:hover {
            background-color: #00cc44;
        }

        ::placeholder {
            color: rgba(255, 255, 255, 0.3);
            opacity: 1;
        }
        
        a:hover {
            text-decoration: underline;
        }
    </style>
</body>
</html>