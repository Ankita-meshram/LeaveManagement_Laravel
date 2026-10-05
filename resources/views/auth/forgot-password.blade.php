<div style="
    min-height: 100vh;
    background: #f4eadb;
    display: flex;
    align-items: center;
    justify-content: center;
    padding: 20px;
    font-family: Arial, sans-serif;
">

    <div style="
        width: 100%;
        max-width: 400px;
        background: #fffaf2;
        border-radius: 12px;
        padding: 30px;
        box-shadow: 0 8px 25px rgba(75, 46, 34, 0.12);
        box-sizing: border-box;
    ">

        <!-- Logo -->
        <div style="
            width: 52px;
            height: 52px;
            background: #4b2e22;
            color: white;
            border-radius: 10px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 20px;
            font-weight: bold;
            margin: 0 auto 18px;
        ">
            LM
        </div>

        <!-- Heading -->
        <h2 style="
            text-align: center;
            color: #4b2e22;
            margin: 0 0 8px;
            font-size: 24px;
        ">
            Leave Management
        </h2>

        <p style="
            text-align: center;
            color: #777;
            margin: 0 0 25px;
            font-size: 14px;
        ">
            Reset your password
        </p>

        <!-- Message -->
        <p style="
            color: #666;
            font-size: 14px;
            line-height: 1.5;
            margin-bottom: 20px;
        ">
            Forgot your password? No problem. Enter your email address and we will send you a password reset link.
        </p>

        <!-- Session Status -->
        @if (session('status'))
            <div style="
                background: #e8f5e9;
                color: #2e7d32;
                padding: 10px 12px;
                border-radius: 6px;
                margin-bottom: 15px;
                font-size: 13px;
            ">
                {{ session('status') }}
            </div>
        @endif

        <!-- Form -->
        <form method="POST" action="{{ route('password.email') }}">
            @csrf

            <!-- Email -->
            <div style="margin-bottom: 18px;">
                <label for="email" style="
                    display: block;
                    color: #4b2e22;
                    font-size: 14px;
                    font-weight: 600;
                    margin-bottom: 7px;
                ">
                    Email
                </label>

                <input
                    id="email"
                    type="email"
                    name="email"
                    value="{{ old('email') }}"
                    required
                    autofocus
                    style="
                        width: 100%;
                        padding: 11px 12px;
                        border: 1px solid #d8c7b5;
                        border-radius: 6px;
                        background: white;
                        box-sizing: border-box;
                        font-size: 14px;
                        outline: none;
                    "
                >

                @if ($errors->get('email'))
                    <div style="
                        color: #b42318;
                        font-size: 12px;
                        margin-top: 5px;
                    ">
                        {{ $errors->first('email') }}
                    </div>
                @endif
            </div>

            <!-- Button -->
            <button
                type="submit"
                style="
                    width: 100%;
                    background: #c59b6d;
                    color: white;
                    border: none;
                    border-radius: 6px;
                    padding: 11px;
                    font-size: 14px;
                    font-weight: 600;
                    cursor: pointer;
                "
            >
                Email Password Reset Link
            </button>
        </form>

        <!-- Back to Login -->
        <div style="
            text-align: center;
            margin-top: 20px;
        ">
            <a href="{{ route('login') }}" style="
                color: #4b2e22;
                text-decoration: none;
                font-size: 13px;
                font-weight: 600;
            ">
                ← Back to Login
            </a>
        </div>

        <!-- Footer -->
        <p style="
            text-align: center;
            color: #999;
            font-size: 12px;
            margin: 25px 0 0;
        ">
            Leave Management System
        </p>

    </div>
</div>