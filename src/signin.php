<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign In</title>
    <!-- <link rel="stylesheet" href="../css/signin.css"> -->
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, Arial, sans-serif;
        }

        body {
            background-color: #000;
            height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .vertical-line {
            position: absolute;
            top: 0;
            bottom: 0;
            width: 0.5px;
            background-color: #fff;
            z-index: 0;
            filter: blur(2px);
        }

        /* Posisi masing-masing garis */
        .line-1 {
            left: 10%;
        }

        .line-2 {
            left: 48%;
        }

        .line-3 {
            left: 55%;
        }

        .line-4 {
            left: 90%;
        }

        .login-container {
            position: relative;
            background-color: #111;
            padding: 2rem;
            border-radius: 12px;
            width: 100%;
            max-width: 400px;
            margin: 0 1rem;
            border: 1px solid #fff;
            z-index: 1;
        }

        .login-title {
            color: #fff;
            font-size: 1.5rem;
            margin-bottom: 1.5rem;
        }

        .form-group {
            margin-bottom: 1rem;
        }

        .form-group label {
            display: block;
            color: #fff;
            margin-bottom: 0.5rem;
            font-size: 0.9rem;
        }

        .form-group input {
            width: 100%;
            padding: 0.75rem;
            border: 1px solid #333;
            background-color: transparent;
            border-radius: 6px;
            color: #fff;
            font-size: 0.9rem;
        }

        .form-group input:focus {
            outline: none;
            border-color: #666;
        }

        .remember-forgot {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin: 1rem 0;
        }

        .remember-me {
            display: flex;
            align-items: center;
            gap: 0.5rem;
            color: #fff;
            font-size: 0.9rem;
        }

        .remember-me input[type="checkbox"] {
            width: auto;
            accent-color: #000;
            cursor: pointer;
        }

        .forgot-password {
            color: #fff;
            text-decoration: none;
            font-size: 0.9rem;
        }

        .forgot-password:hover {
            text-decoration: underline;
        }

        .login-button {
            width: 100%;
            padding: 0.75rem;
            background-color: #e0e0e0;
            border: none;
            border-radius: 6px;
            color: #000;
            font-weight: 500;
            cursor: pointer;
            margin: 1rem 0;
        }

        .login-button:hover {
            background-color: #d0d0d0;
        }

        .register-prompt {
            text-align: center;
            color: #fff;
            font-size: 0.9rem;
        }

        .register-link {
            color: #fff;
            text-decoration: none;
            margin-left: 0.25rem;
        }

        .register-link:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>
    <div class="vertical-line line-1"></div>
    <div class="vertical-line line-2"></div>
    <div class="vertical-line line-3"></div>
    <div class="vertical-line line-4"></div>

    <div class="login-container">
        <h1 class="login-title">Sign in</h1>
        <form>
            <div class="form-group">
                <label for="username">Username</label>
                <input type="text" id="username" placeholder="Enter your user name">
            </div>
            <div class="form-group">
                <label for="password">Password</label>
                <input type="password" id="password" placeholder="Enter your Password">
            </div>
            <div class="remember-forgot">
                <label class="remember-me">
                    <input type="checkbox">
                    <span>Remember me</span>
                </label>
                <a href="forgotpassword.html" class="forgot-password">Forgot Password?</a>
            </div>
            <button type="submit" class="login-button">Login</button>
            <div class="register-prompt">
                Don't have an Account? <a href="signup.html" class="register-link">Register</a>
            </div>
        </form>
    </div>
</body>
</html>