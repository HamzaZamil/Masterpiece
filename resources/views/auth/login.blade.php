<!DOCTYPE html>
<html>
<head>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600&display=swap');

        :root {
            --primary: #b17457;
            --secondary: #d4a992;
            --accent: #f8e4d9;
        }

        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
        }

        body {
            font-family: 'Poppins', sans-serif;
            background: linear-gradient(135deg, var(--accent) 0%, #fff 100%);
            min-height: 100vh;
            overflow-x: hidden;
        }

        .container {
            max-width: 500px;
            margin: 2rem auto;
            padding: 2.5rem;
            background: rgba(255, 255, 255, 0.95);
            border-radius: 24px;
            box-shadow: 0 20px 40px rgba(177, 116, 87, 0.15);
            animation: slideUpFade 1s ease-out;
        }

        .section-title {
            font-size: 2rem;
            color: var(--primary);
            margin-bottom: 2rem;
            text-align: center;
            position: relative;
            padding-bottom: 1rem;
        }

        .form-float {
            position: relative;
            margin-bottom: 1.5rem;
        }

        .form-control {
            width: 100%;
            padding: 1.5rem 1rem 0.5rem 3rem;
            border: 2px solid transparent;
            border-radius: 12px;
            background: rgba(177, 116, 87, 0.05);
            font-size: 1rem;
            transition: all 0.3s ease;
        }

        .form-control:focus {
            outline: none;
            border-color: var(--primary);
            background: white;
            box-shadow: 0 0 0 4px rgba(177, 116, 87, 0.1);
        }

        .form-icon {
            position: absolute;
            left: 1rem;
            top: 50%;
            transform: translateY(-50%);
            color: var(--primary);
        }

        .form-float label {
            position: absolute;
            left: 3rem;
            top: 0.5rem;
            font-size: 0.75rem;
            color: var(--primary);
        }

        .footer-links {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-top: 2rem;
        }

        .register-link {
            color: var(--primary);
            text-decoration: none;
            font-size: 0.9rem;
            display: flex;
            align-items: center;
            gap: 0.5rem;
            transition: all 0.3s ease;
        }

        .register-link:hover {
            color: var(--secondary);
            transform: translateX(5px);
        }

        .btn-primary {
            background: linear-gradient(135deg, var(--primary), var(--secondary));
            color: white;
            padding: 1rem 2rem;
            border: none;
            border-radius: 12px;
            font-size: 1.1rem;
            cursor: pointer;
            transition: all 0.3s ease;
        }

        .btn-primary:hover {
            transform: translateY(-3px);
            box-shadow: 0 10px 20px rgba(177, 116, 87, 0.2);
        }

        @keyframes slideUpFade {
            from {
                opacity: 0;
                transform: translateY(40px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }
    </style>
</head>
<body>
    <div class="container">
        <h1 class="section-title">Login to Pettie</h1>
        
        <form method="POST" action="{{ route('login') }}">
            @csrf
            
            <div class="form-float">
                <input type="email" id="email" name="email" class="form-control" required autofocus>
                <label for="email">Email Address</label>
                <i class="fas fa-envelope form-icon"></i>
            </div>

            <div class="form-float">
                <input type="password" id="password" name="password" class="form-control" required>
                <label for="password">Password</label>
                <i class="fas fa-lock form-icon"></i>
            </div>

            <div class="footer-links">
                <a href="{{ route('register') }}" class="register-link">
                    <i class="fas fa-user-plus"></i> Create new account
                </a>

                <button type="submit" class="btn-primary">
                    <i class="fas fa-sign-in-alt"></i> Log in
                </button>
            </div>
        </form>
    </div>
</body>
</html>