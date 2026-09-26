<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Leave Management System - Register</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <style>
        * {
            box-sizing: border-box;
        }

        body {
            margin: 0;
            font-family: Arial, sans-serif;
            background: #f4eadb;
            color: #2f1b14;
        }

        /* =========================
           MAIN CONTAINER
        ========================== */

        .register-container {
            min-height: 100vh;

            display: flex;
            justify-content: center;
            align-items: center;

            padding: 25px;

            background:
                linear-gradient(
                    135deg,
                    #f4eadb 0%,
                    #eee0cf 50%,
                    #e7d4bf 100%
                );
        }


        /* =========================
           REGISTER CARD
        ========================== */

        .register-card {
            width: 100%;
            max-width: 470px;

            background: #fbf6ee;

            padding: 40px;

            border-radius: 18px;

            border: 1px solid #e2d2bf;

            box-shadow: 0 12px 35px rgba(47, 27, 20, 0.15);
        }


        /* =========================
           BRAND
        ========================== */

        .brand-icon {
            width: 58px;
            height: 58px;

            margin: 0 auto 18px;

            display: flex;
            align-items: center;
            justify-content: center;

            background: #4b2e22;
            color: #f4eadb;

            border-radius: 14px;

            font-size: 24px;
            font-weight: bold;

            box-shadow: 0 6px 15px rgba(75, 46, 34, 0.20);
        }


        .title {
            text-align: center;

            color: #2f1b14;

            margin: 0 0 8px;

            font-size: 27px;
            font-weight: bold;
        }


        .subtitle {
            text-align: center;

            color: #75675d;

            margin: 0 0 30px;

            font-size: 15px;
        }


        /* =========================
           FORM GROUP
        ========================== */

        .form-group {
            margin-bottom: 19px;
        }


        label {
            display: block;

            margin-bottom: 8px;

            font-weight: 600;
            font-size: 14px;

            color: #3c2a22;
        }


        input {
            width: 100%;

            padding: 13px 14px;

            border: 1px solid #d7c5b2;

            border-radius: 8px;

            background: #fffdf9;

            color: #2f1b14;

            font-size: 15px;

            transition: 0.2s;
        }


        input:focus {
            outline: none;

            border-color: #8b5e3c;

            box-shadow: 0 0 0 3px rgba(139, 94, 60, 0.12);
        }


        input::placeholder {
            color: #a3978d;
        }


        /* =========================
           ERROR
        ========================== */

        .error {
            color: #a13b32;

            font-size: 13px;

            margin-top: 6px;
        }


        /* =========================
           BOTTOM AREA
        ========================== */

        .bottom-area {
            display: flex;

            justify-content: space-between;

            align-items: center;

            margin-top: 25px;
        }


        .login-link {
            color: #6d5749;

            font-size: 14px;

            text-decoration: none;
        }


        .login-link:hover {
            color: #4b2e22;

            text-decoration: underline;
        }


        /* =========================
           REGISTER BUTTON
        ========================== */

        .register-btn {
            border: none;

            background: #4b2e22;

            color: #fffaf5;

            padding: 12px 22px;

            border-radius: 8px;

            font-size: 15px;

            font-weight: bold;

            cursor: pointer;

            transition: 0.2s;

            box-shadow: 0 5px 12px rgba(75, 46, 34, 0.18);
        }


        .register-btn:hover {
            background: #392219;

            transform: translateY(-1px);
        }


        .register-btn:active {
            transform: translateY(0);
        }


        /* =========================
           FOOTER
        ========================== */

        .footer-text {
            text-align: center;

            margin: 25px 0 0;

            font-size: 13px;

            color: #8a7b70;
        }


        /* =========================
           RESPONSIVE
        ========================== */

        @media (max-width: 520px) {

            .register-container {
                padding: 18px;
            }

            .register-card {
                padding: 30px 24px;
            }

            .title {
                font-size: 24px;
            }

            .subtitle {
                font-size: 14px;
            }

            .bottom-area {
                flex-direction: column;

                gap: 15px;
            }

            .register-btn {
                width: 100%;
            }
        }

    </style>

</head>


<body>


<div class="register-container">


    <div class="register-card">


        <!-- Brand -->

        <div class="brand-icon">
            LM
        </div>


        <!-- Title -->

        <h1 class="title">
            Leave Management
        </h1>


        <p class="subtitle">
            Create your account
        </p>


        <!-- Register Form -->

        <form method="POST" action="{{ route('register') }}">

            @csrf


            <!-- Name -->

            <div class="form-group">

                <label for="name">
                    Full Name
                </label>

                <input
                    id="name"
                    type="text"
                    name="name"
                    value="{{ old('name') }}"
                    placeholder="Enter your full name"
                    required
                    autofocus
                    autocomplete="name"
                >

                @error('name')

                    <div class="error">
                        {{ $message }}
                    </div>

                @enderror

            </div>


            <!-- Email -->

            <div class="form-group">

                <label for="email">
                    Email Address
                </label>

                <input
                    id="email"
                    type="email"
                    name="email"
                    value="{{ old('email') }}"
                    placeholder="Enter your email"
                    required
                    autocomplete="username"
                >

                @error('email')

                    <div class="error">
                        {{ $message }}
                    </div>

                @enderror

            </div>


            <!-- Password -->

            <div class="form-group">

                <label for="password">
                    Password
                </label>

                <input
                    id="password"
                    type="password"
                    name="password"
                    placeholder="Create a password"
                    required
                    autocomplete="new-password"
                >

                @error('password')

                    <div class="error">
                        {{ $message }}
                    </div>

                @enderror

            </div>


            <!-- Confirm Password -->

            <div class="form-group">

                <label for="password_confirmation">
                    Confirm Password
                </label>

                <input
                    id="password_confirmation"
                    type="password"
                    name="password_confirmation"
                    placeholder="Confirm your password"
                    required
                    autocomplete="new-password"
                >

                @error('password_confirmation')

                    <div class="error">
                        {{ $message }}
                    </div>

                @enderror

            </div>


            <!-- Bottom Area -->

            <div class="bottom-area">


                <a
                    href="{{ route('login') }}"
                    class="login-link"
                >
                    Already registered?
                </a>


                <button
                    type="submit"
                    class="register-btn"
                >
                    Register
                </button>


            </div>


        </form>


        <!-- Footer -->

        <p class="footer-text">
            Leave Management System
        </p>


    </div>


</div>


</body>

</html>