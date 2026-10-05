<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Login - Leave Management</title>

    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: Arial, sans-serif;
        }

        body {
            background: #f4eadb;
            color: #2f1b14;
            min-height: 100vh;
        }

        /* LOGIN PAGE */
        .login-page {
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 30px 20px;
        }

        /* LOGIN CARD */
        .login-card {
            width: 100%;
            max-width: 390px;
            background: #fbf6ee;
            padding: 36px;
            border-radius: 15px;
            box-shadow: 0 8px 25px rgba(75, 46, 34, 0.15);
        }

        /* LOGO */
        .logo-box {
            width: 52px;
            height: 52px;
            margin: 0 auto 20px;

            display: flex;
            align-items: center;
            justify-content: center;

            background: #4b2e22;
            color: white;

            border-radius: 12px;

            font-size: 22px;
            font-weight: bold;

            box-shadow: 0 5px 12px rgba(75, 46, 34, 0.20);
        }

        /* TITLE */
        .login-title {
            text-align: center;
            color: #2f1b14;
            font-size: 25px;
            font-weight: bold;
            margin-bottom: 8px;
        }

        .login-subtitle {
            text-align: center;
            color: #806f62;
            font-size: 14px;
            margin-bottom: 30px;
        }

        /* ERROR */
        .error-box {
            background: #f8d7da;
            color: #842029;
            padding: 10px 12px;
            border-radius: 7px;
            margin-bottom: 18px;
            font-size: 13px;
        }

        .error-box ul {
            padding-left: 18px;
        }

        /* FORM */
        .form-group {
            margin-bottom: 18px;
        }

        .form-label {
            display: block;
            color: #2f1b14;
            font-size: 13px;
            font-weight: bold;
            margin-bottom: 7px;
        }

        .form-input {
            width: 100%;
            padding: 12px 13px;

            border: 1px solid #d8cbb9;
            border-radius: 7px;

            background: #eef3fb;
            color: #2f1b14;

            font-size: 14px;

            outline: none;
        }

        .form-input:focus {
            border-color: #4b2e22;
            box-shadow: 0 0 0 2px rgba(75, 46, 34, 0.10);
        }

        /* REMEMBER + FORGOT */
        .login-options {
            display: flex;
            justify-content: space-between;
            align-items: center;

            margin-bottom: 22px;
        }

        .remember {
            display: flex;
            align-items: center;

            color: #806f62;
            font-size: 13px;
        }

        .remember input {
            margin-right: 7px;
            width: 16px;
            height: 16px;
            accent-color: #4b2e22;
        }

        .forgot {
            color: #806f62;
            text-decoration: none;
            font-size: 13px;
            font-weight: 600;
        }

        .forgot:hover {
            color: #4b2e22;
        }

        /* LOGIN BUTTON */
        .login-btn {
            width: 100%;

            padding: 13px;

            background: #4b2e22;
            color: white;

            border: none;
            border-radius: 7px;

            font-size: 14px;
            font-weight: bold;

            cursor: pointer;

            box-shadow: 0 5px 12px rgba(75, 46, 34, 0.18);
        }

        .login-btn:hover {
            background: #2f1b14;
        }

        /* REGISTER */
        .register {
            text-align: center;
            margin-top: 20px;

            color: #806f62;
            font-size: 13px;
        }

        .register a {
            color: #4b2e22;
            font-weight: bold;
            text-decoration: none;
        }

        .register a:hover {
            text-decoration: underline;
        }

        /* FOOTER */
        .footer {
            text-align: center;

            margin-top: 26px;

            color: #9a8b7c;
            font-size: 12px;
        }

        /* MOBILE */
        @media (max-width: 500px) {

            .login-card {
                padding: 28px 22px;
            }

            .login-title {
                font-size: 23px;
            }
        }
    </style>
</head>

<body>

<div class="login-page">

    <div class="login-card">

        <!-- Logo -->
        <div class="logo-box">
            LM
        </div>


        <!-- Title -->
        <h1 class="login-title">
            Leave Management
        </h1>

        <p class="login-subtitle">
            Login to your account
        </p>


        <!-- Session Status -->
        @if (session('status'))
            <div class="error-box">
                {{ session('status') }}
            </div>
        @endif


        <!-- Validation Errors -->
        @if ($errors->any())
            <div class="error-box">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif


        <!-- Login Form -->
        <form method="POST" action="{{ route('login') }}">
            @csrf

            <!-- Email -->
            <div class="form-group">

                <label for="email" class="form-label">
                    Email Address
                </label>

                <input
                    id="email"
                    type="email"
                    name="email"
                    value="{{ old('email') }}"
                    required
                    autofocus
                    autocomplete="username"
                    placeholder="Enter your email"
                    class="form-input"
                >

            </div>


            <!-- Password -->
            <div class="form-group">

                <label for="password" class="form-label">
                    Password
                </label>

                <input
                    id="password"
                    type="password"
                    name="password"
                    required
                    autocomplete="current-password"
                    placeholder="Enter your password"
                    class="form-input"
                >

            </div>


            <!-- Remember + Forgot -->
            <div class="login-options">

                <label class="remember">

                    <input
                        type="checkbox"
                        name="remember"
                    >

                    Remember me

                </label>


                @if (Route::has('password.request'))

                    <a
                        href="{{ route('password.request') }}"
                        class="forgot"
                    >
                        Forgot Password?
                    </a>

                @endif

            </div>


            <!-- Login Button -->
            <button
                type="submit"
                class="login-btn"
            >
                Login
            </button>

        </form>


        <!-- Register -->
        @if (Route::has('register'))

            <div class="register">

                Don't have an account?

                <a href="{{ route('register') }}">
                    Register
                </a>

            </div>

        @endif


        <!-- Footer -->
        <div class="footer">
            Leave Management System
        </div>

    </div>

</div>

</body>
</html>