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

        .header {
            background: rgba(255, 255, 255, 0.95);
            backdrop-filter: blur(10px);
            padding: 1rem;
            box-shadow: 0 4px 30px rgba(177, 116, 87, 0.1);
            position: sticky;
            top: 0;
            z-index: 100;
            animation: fadeInDown 0.8s ease-out;
        }

        .logo-container {
            max-width: 200px;
            margin: 0 auto;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 1rem;
        }

        .logo-text {
            font-size: 2.5rem;
            color: var(--primary);
            font-weight: 600;
            animation: scaleIn 0.8s ease-out;
        }

        .logo-icon {
            width: 40px;
            height: 40px;
            fill: var(--primary);
            animation: bounce 2s infinite;
        }

        .container {
            max-width: 800px;
            margin: 2rem auto;
            padding: 2.5rem;
            background: rgba(255, 255, 255, 0.95);
            border-radius: 24px;
            box-shadow: 0 20px 40px rgba(177, 116, 87, 0.15);
            animation: slideUpFade 1s ease-out;
            position: relative;
            overflow: hidden;
        }

        .container::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 5px;
            background: linear-gradient(90deg, var(--primary), var(--secondary));
        }

        .form-section {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
            gap: 2rem;
            margin-bottom: 2rem;
        }

        .form-group {
            position: relative;
            margin-bottom: 1.5rem;
        }

        .form-control {
            width: 100%;
            padding: 1rem 1rem 1rem 3rem;
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
            transform: translateY(-2px);
        }

        .form-icon {
            position: absolute;
            left: 1rem;
            top: 50%;
            transform: translateY(-50%);
            color: var(--primary);
            transition: all 0.3s ease;
        }

        .form-control:focus + .form-icon {
            transform: translateY(-50%) scale(1.2);
            color: var(--secondary);
        }

        .section-title {
            font-size: 2rem;
            color: var(--primary);
            margin-bottom: 2rem;
            text-align: center;
            position: relative;
            padding-bottom: 1rem;
        }

        .section-title::after {
            content: '';
            position: absolute;
            bottom: 0;
            left: 50%;
            transform: translateX(-50%);
            width: 50px;
            height: 3px;
            background: var(--primary);
            border-radius: 2px;
        }

        .radio-group {
            display: flex;
            gap: 2rem;
            padding: 1rem;
            background: rgba(177, 116, 87, 0.05);
            border-radius: 12px;
        }

        .radio-label {
            display: flex;
            align-items: center;
            gap: 0.5rem;
            cursor: pointer;
            padding: 0.5rem 1rem;
            border-radius: 8px;
            transition: all 0.3s ease;
        }

        .radio-label:hover {
            background: rgba(177, 116, 87, 0.1);
        }

        .btn-primary {
            background: linear-gradient(135deg, var(--primary), var(--secondary));
            color: white;
            padding: 1.2rem 2.5rem;
            border: none;
            border-radius: 12px;
            font-size: 1.1rem;
            cursor: pointer;
            transition: all 0.3s ease;
            width: 100%;
            position: relative;
            overflow: hidden;
        }

        .btn-primary:hover {
            transform: translateY(-3px);
            box-shadow: 0 10px 20px rgba(177, 116, 87, 0.2);
        }

        .btn-primary::before {
            content: '';
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 100%;
            background: linear-gradient(90deg, transparent, rgba(255,255,255,0.2), transparent);
            transition: 0.5s;
        }

        .btn-primary:hover::before {
            left: 100%;
        }

        @keyframes fadeInDown {
            from {
                opacity: 0;
                transform: translateY(-20px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
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

        @keyframes scaleIn {
            from {
                opacity: 0;
                transform: scale(0.8);
            }
            to {
                opacity: 1;
                transform: scale(1);
            }
        }

        @keyframes bounce {
            0%, 100% {
                transform: translateY(0);
            }
            50% {
                transform: translateY(-10px);
            }
        }

        /* Floating label animation */
        .form-float {
            position: relative;
        }

        .form-float input {
            padding: 1.5rem 1rem 0.5rem 3rem;
        }

        .form-float label {
            position: absolute;
            left: 3rem;
            top: 50%;
            transform: translateY(-50%);
            font-size: 1rem;
            color: #666;
            pointer-events: none;
            transition: 0.3s ease all;
        }

        .form-float input:focus ~ label,
        .form-float input:not(:placeholder-shown) ~ label {
            top: 0.5rem;
            font-size: 0.75rem;
            color: var(--primary);
        }

        .login-link {
            display: flex;
            align-items: center;
            gap: 0.5rem;
            color: var(--primary);
            text-decoration: none;
            font-size: 1rem;
            margin-top: 1.5rem;
            padding: 0.5rem;
            border-radius: 8px;
            transition: all 0.3s ease;
            justify-content: center;
        }

        .login-link:hover {
            background: rgba(177, 116, 87, 0.1);
            transform: translateX(5px);
        }

        .error-message {
         color: red;
         font-size: 0.9em;
         margin-top: 5px;
        }

    </style>
</head>
<body>
   

    <div class="container">
        <h1 class="section-title">Welcome to Pettie</h1>
        
        <form method="POST" action="{{ route('register') }}">
            @csrf
            
            <!-- First Name and Last Name Section -->
            <div class="form-section">
                <div class="form-float">
                    <input type="text" id="name" name="name" class="form-control" placeholder=" " value="{{ old('name') }}" required>
                    <label for="name">First Name</label>
                    <i class="fas fa-user form-icon"></i>
                    @error('name')
                        <span class="error-message">{{ $message }}</span>
                    @enderror
                </div>
    
                <div class="form-float">
                    <input type="text" id="last_name" name="last_name" class="form-control" placeholder=" " value="{{ old('last_name') }}" required>
                    <label for="last_name">Last Name</label>
                    <i class="fas fa-user form-icon"></i>
                    @error('last_name')
                        <span class="error-message">{{ $message }}</span>
                    @enderror
                </div>
            </div>
    
            <!-- Email and Phone Number Section -->
            <div class="form-section">
                <div class="form-float">
                    <input type="email" id="email" name="email" class="form-control" placeholder=" " value="{{ old('email') }}" required>
                    <label for="email">Email Address</label>
                    <i class="fas fa-envelope form-icon"></i>
                    @error('email')
                        <span class="error-message">{{ $message }}</span>
                    @enderror
                </div>
    
                <div class="form-float">
                    <input type="tel" id="phone_number" name="phone_number" class="form-control" placeholder=" " value="{{ old('phone_number') }}" required>
                    <label for="phone_number">Phone Number</label>
                    <i class="fas fa-phone form-icon"></i>
                    @error('phone_number')
                        <span class="error-message">{{ $message }}</span>
                    @enderror
                </div>
            </div>
    
            <!-- Address and Street Section -->
            <div class="form-section">
                <div class="form-float">
                    <input type="text" id="address" name="address" class="form-control" placeholder=" " value="{{ old('address') }}" required>
                    <label for="address">Address</label>
                    <i class="fas fa-home form-icon"></i>
                    @error('address')
                        <span class="error-message">{{ $message }}</span>
                    @enderror
                </div>
    
                <div class="form-float">
                    <input type="text" id="street" name="street" class="form-control" placeholder=" " value="{{ old('street') }}" required>
                    <label for="street">Street</label>
                    <i class="fas fa-road form-icon"></i>
                    @error('street')
                        <span class="error-message">{{ $message }}</span>
                    @enderror
                </div>
            </div>
    
            <!-- City and Gender Section -->
            <div class="form-section">
                <div class="form-group">
                    <select id="city" name="city" class="form-control" required>
                        <option value="" disabled {{ old('city') ? '' : 'selected' }}>Select your city</option>
                        <option value="Amman" {{ old('city') == 'Amman' ? 'selected' : '' }}>Amman</option>
                        <option value="Zarqa" {{ old('city') == 'Zarqa' ? 'selected' : '' }}>Zarqa</option>
                        <option value="Irbid" {{ old('city') == 'Irbid' ? 'selected' : '' }}>Irbid</option>
                        <option value="Aqaba" {{ old('city') == 'Aqaba' ? 'selected' : '' }}>Aqaba</option>
                        <option value="Madaba" {{ old('city') == 'Madaba' ? 'selected' : '' }}>Madaba</option>
                        <option value="Jerash" {{ old('city') == 'Jerash' ? 'selected' : '' }}>Jerash</option>
                        <option value="Ajloun" {{ old('city') == 'Ajloun' ? 'selected' : '' }}>Ajloun</option>
                        <option value="Karak" {{ old('city') == 'Karak' ? 'selected' : '' }}>Karak</option>
                        <option value="Tafilah" {{ old('city') == 'Tafilah' ? 'selected' : '' }}>Tafilah</option>
                        <option value="Maan" {{ old('city') == 'Maan' ? 'selected' : '' }}>Maan</option>
                        <option value="Balqa" {{ old('city') == 'Balqa' ? 'selected' : '' }}>Balqa</option>
                        <option value="Mafraq" {{ old('city') == 'Mafraq' ? 'selected' : '' }}>Mafraq</option>
                    </select>
                    <i class="fas fa-city form-icon"></i>
                    @error('city')
                        <span class="error-message">{{ $message }}</span>
                    @enderror
                </div>
    
                <div class="form-group">
                    <div class="radio-group">
                        <label class="radio-label">
                            <input type="radio" name="gender" value="male" {{ old('gender') == 'male' ? 'checked' : '' }} required>
                            <i class="fas fa-mars"></i> Male
                        </label>
                        <label class="radio-label">
                            <input type="radio" name="gender" value="female" {{ old('gender') == 'female' ? 'checked' : '' }} required>
                            <i class="fas fa-venus"></i> Female
                        </label>
                    </div>
                    @error('gender')
                        <span class="error-message">{{ $message }}</span>
                    @enderror
                </div>
            </div>
    
            <!-- Password and Confirmation Section -->
            <div class="form-section">
                <div class="form-float">
                    <input type="password" id="password" name="password" class="form-control" placeholder=" " required>
                    <label for="password">Password</label>
                    <i class="fas fa-lock form-icon"></i>
                    @error('password')
                        <span class="error-message">{{ $message }}</span>
                    @enderror
                </div>
    
                <div class="form-float">
                    <input type="password" id="password_confirmation" name="password_confirmation" class="form-control" placeholder=" " required>
                    <label for="password_confirmation">Confirm Password</label>
                    <i class="fas fa-lock form-icon"></i>
                    @error('password_confirmation')
                        <span class="error-message">{{ $message }}</span>
                    @enderror
                </div>
            </div>
    
            <!-- Submit Button -->
            <button type="submit" class="btn-primary">
                <i class="fas fa-paw"></i> Create Account
            </button>
    
            <!-- Login Link -->
            <a href="{{ route('login') }}" class="login-link">
                <i class="fas fa-sign-in-alt"></i> Already have an account? Login here
            </a>
        </form>
    </div>
    

    <script>
        // Add smooth scroll animation
        document.querySelectorAll('a[href^="#"]').forEach(anchor => {
            anchor.addEventListener('click', function (e) {
                e.preventDefault();
                document.querySelector(this.getAttribute('href')).scrollIntoView({
                    behavior: 'smooth'
                });
            });
        });

        // Add form validation animation
        const inputs = document.querySelectorAll('.form-control');
        inputs.forEach(input => {
            input.addEventListener('invalid', function(e) {
                e.preventDefault();
                this.classList.add('shake');
                setTimeout(() => this.classList.remove('shake'), 500);
            });
        });
    </script>
</body>
</html>