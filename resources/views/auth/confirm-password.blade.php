<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Leave Management System - Confirm Password</title>

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

        .confirm-container {
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

        .confirm-card {
            width: 100%;
            max-width: 450px;

            background: #fbf6ee;

            padding: 40px;

            border-radius: 18px;

            border: 1px solid #e2d2bf;

            box-shadow: 0 12px 35px rgba(47, 27, 20, 0.15);
        }

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

            margin: 0 0 28px;

            font-size: 15px;

            line-height: 1.6;
        }

        .info-box {
            background: #f3e9dc;

            border-left: 4px solid #8b5e3c;

            padding: 14px 15px;

            border-radius: 8px;

            color: #5d5048;

            font-size: 14px;

            line-height: 1.6;

            margin-bottom: 22px;
        }

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

        input[type="password"] {
            width: 100%;

            padding: 13px 14px;

            border: 1px solid #d7c5b2;

            border-radius: 8px;

            background: #fffdf9;

            color: #2f1b14;

            font-size: 15px;

            transition: 0.2s;
        }

        input[type="password"]:focus {
            outline: none;

            border-color: #8b5e3c;

            box-shadow: 0 0 0 3px rgba(139, 94, 60, 0.12);
        }

        input::placeholder {
            color: #a3978d;
        }

        .error {
            color: #a13b32;

            font-size: 13px;

            margin-top: 6px;
        }

        .button-area {
            margin-top: 25px;
        }

        .confirm-btn {
            width: 100%;

            border: none;

            background: #4b2e22;

            color: #fffaf5;

            padding: 13px;

            border-radius: 8px;

            font-size: 16px;

            font-weight: bold;

            cursor: pointer;

            transition: 0.2s;

            box-shadow: 0 5px 12px rgba(75, 46, 34, 0.18);
        }

        .confirm-btn:hover {
            background: #392219;

            transform: translateY(-1px);
        }

        .confirm-btn:active {
            transform: translateY(0);
        }

        .footer-text {
            text-align: center;

            margin: 25px 0 0;

            font-size: 13px;

            color: #8a7b70;
        }

        @media (max-width: 500px) {

            .confirm-container {
                padding: 18px;
            }

            .confirm-card {
                padding: 30px 24px;
            }

            .title {
                font-size: 24px;
            }

            .subtitle {
                font-size: 14px;
            }
        }
    </style>

</head>

<body>

<div class="confirm-container">

    <div class="confirm-card">

        <!-- Brand -->

        <div class="brand-icon">
            LM
        </div>


        <!-- Title -->

        <h1 class="title">
            Confirm Password
        </h1>


        <p class="subtitle">
            Please confirm your password before continuing.
        </p>


        <!-- Information -->

        <div class="info-box">
            This is a secure area of the application.
            Please confirm your password before continuing.
        </div>


        <!-- Form -->

        <form method="POST" action="{{ route('password.confirm') }}">

            @csrf


            <!-- Password -->

            <div class="form-group">

                <label for="password">
                    Password
                </label>

                <input
                    id="password"
                    type="password"
                    name="password"
                    placeholder="Enter your password"
                    required
                    autocomplete="current-password"
                >

                @error('password')

                    <div class="error">
                        {{ $message }}
                    </div>

                @enderror

            </div>


            <!-- Button -->

            <div class="button-area">

                <button
                    type="submit"
                    class="confirm-btn"
                >
                    Confirm Password
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