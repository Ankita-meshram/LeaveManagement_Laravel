<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Leave Management System - Forgot Password</title>

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

        .forgot-container {
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
           CARD
        ========================== */

        .forgot-card {
            width: 100%;
            max-width: 450px;

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

            margin: 0 0 25px;

            font-size: 15px;

            line-height: 1.6;
        }


        /* =========================
           SESSION STATUS
        ========================== */

        .status {
            background: #e3eee4;
            color: #315a3a;

            border-left: 4px solid #6d9273;

            padding: 11px 13px;

            border-radius: 7px;

            margin-bottom: 20px;

            font-size: 14px;
        }


        /* =========================
           FORM
        ========================== */

        .form-group {
            margin-bottom: 20px;
        }


        label {
            display: block;

            margin-bottom: 8px;

            font-weight: 600;
            font-size: 14px;

            color: #3c2a22;
        }


        input[type="email"] {
            width: 100%;

            padding: 13px 14px;

            border: 1px solid #d7c5b2;

            border-radius: 8px;

            background: #fffdf9;

            color: #2f1b14;

            font-size: 15px;

            transition: 0.2s;
        }


        input[type="email"]:focus {
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
           BUTTON AREA
        ========================== */

        .button-area {
            display: flex;

            justify-content: space-between;

            align-items: center;

            margin-top: 25px;
        }


        .back-link {
            color: #6d5749;

            font-size: 14px;

            text-decoration: none;
        }


        .back-link:hover {
            color: #4b2e22;

            text-decoration: underline;
        }


        .reset-btn {
            border: none;

            background: #4b2e22;

            color: #fffaf5;

            padding: 12px 18px;

            border-radius: 8px;

            font-size: 14px;

            font-weight: bold;

            cursor: pointer;

            transition: 0.2s;

            box-shadow: 0 5px 12px rgba(75, 46, 34, 0.18);
        }


        .reset-btn:hover {
            background: #392219;

            transform: translateY(-1px);
        }


        .reset-btn:active {
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

        @media (max-width: 500px) {

            .forgot-container {
                padding: 18px;
            }

            .forgot-card {
                padding: 30px 24px;
            }

            .title {
                font-size: 24px;
            }

            .subtitle {
                font-size: 14px;
            }

            .button-area {
                flex-direction: column;

                gap: 15px;
            }

            .reset-btn {
                width: 100%;
            }
        }

    </style>

</head>


<body>


<div class="forgot-container">


    <div class="forgot-card">


        <!-- Brand -->

        <div class="brand-icon">
            LM
        </div>


        <!-- Title -->

        <h1 class="title">
            Forgot Password?
        </h1>


        <p class="subtitle">
            No problem. Enter your email address and we will send you a password reset link.
        </p>


        <!-- Session Status -->

        @if (session('status'))

            <div class="status">
                {{ session('status') }}
            </div>

        @endif


        <!-- Form -->

        <form method="POST" action="{{ route('password.email') }}">

            @csrf


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
                    placeholder="Enter your registered email"
                    required
                    autofocus
                    autocomplete="email"
                >

                @error('email')

                    <div class="error">
                        {{ $message }}
                    </div>

                @enderror

            </div>


            <!-- Buttons -->

            <div class="button-area">

                <a
                    href="{{ route('login') }}"
                    class="back-link"
                >
                    Back to Login
                </a>


                <button
                    type="submit"
                    class="reset-btn"
                >
                    Email Reset Link
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