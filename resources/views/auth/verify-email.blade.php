<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Leave Management System - Verify Email</title>

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

        .verify-container {
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

        .verify-card {
            width: 100%;
            max-width: 500px;

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

            margin-bottom: 20px;
        }

        .success {
            background: #e3eee4;

            color: #315a3a;

            border-left: 4px solid #6d9273;

            padding: 12px 14px;

            border-radius: 7px;

            margin-bottom: 20px;

            font-size: 14px;

            line-height: 1.5;
        }

        .actions {
            display: flex;

            align-items: center;

            justify-content: space-between;

            gap: 15px;

            margin-top: 25px;
        }

        .verify-btn {
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

        .verify-btn:hover {
            background: #392219;

            transform: translateY(-1px);
        }

        .verify-btn:active {
            transform: translateY(0);
        }

        .logout-btn {
            border: none;

            background: transparent;

            color: #6d5749;

            font-size: 14px;

            cursor: pointer;

            text-decoration: none;

            padding: 8px 0;
        }

        .logout-btn:hover {
            color: #4b2e22;

            text-decoration: underline;
        }

        .footer-text {
            text-align: center;

            margin: 25px 0 0;

            font-size: 13px;

            color: #8a7b70;
        }

        @media (max-width: 500px) {

            .verify-container {
                padding: 18px;
            }

            .verify-card {
                padding: 30px 24px;
            }

            .title {
                font-size: 24px;
            }

            .subtitle {
                font-size: 14px;
            }

            .actions {
                flex-direction: column;

                align-items: stretch;
            }

            .verify-btn {
                width: 100%;
            }

            .logout-btn {
                text-align: center;
            }
        }
    </style>

</head>

<body>

<div class="verify-container">

    <div class="verify-card">

        <!-- Brand -->

        <div class="brand-icon">
            LM
        </div>


        <!-- Title -->

        <h1 class="title">
            Verify Your Email
        </h1>


        <p class="subtitle">
            Please verify your email address to continue using the Leave Management System.
        </p>


        <!-- Information -->

        <div class="info-box">
            Thanks for signing up! Before getting started, please verify your email address
            by clicking the verification link we sent to your email.
        </div>


        <!-- Success Message -->

        @if (session('status') == 'verification-link-sent')

            <div class="success">
                A new verification link has been sent to the email address you provided during registration.
            </div>

        @endif


        <!-- Actions -->

        <div class="actions">

            <!-- Resend Verification Email -->

            <form method="POST" action="{{ route('verification.send') }}">

                @csrf

                <button
                    type="submit"
                    class="verify-btn"
                >
                    Resend Verification Email
                </button>

            </form>


            <!-- Logout -->

            <form method="POST" action="{{ route('logout') }}">

                @csrf

                <button
                    type="submit"
                    class="logout-btn"
                >
                    Log Out
                </button>

            </form>

        </div>


        <!-- Footer -->

        <p class="footer-text">
            Leave Management System
        </p>

    </div>

</div>

</body>

</html>