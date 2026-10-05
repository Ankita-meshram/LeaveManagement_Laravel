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
            Create your account
        </p>

        <form method="POST" action="{{ route('register') }}">
            @csrf

            <!-- Name -->
            <div style="margin-bottom: 15px;">
                <label for="name" style="
                    display: block;
                    color: #4b2e22;
                    font-size: 14px;
                    font-weight: 600;
                    margin-bottom: 7px;
                ">
                    Name
                </label>

                <input
                    id="name"
                    type="text"
                    name="name"
                    value="{{ old('name') }}"
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
                    "
                >

                @if ($errors->get('name'))
                    <div style="color:#b42318;font-size:12px;margin-top:5px;">
                        {{ $errors->first('name') }}
                    </div>
                @endif
            </div>

            <!-- Email -->
            <div style="margin-bottom: 15px;">
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
                    style="
                        width: 100%;
                        padding: 11px 12px;
                        border: 1px solid #d8c7b5;
                        border-radius: 6px;
                        background: white;
                        box-sizing: border-box;
                        font-size: 14px;
                    "
                >

                @if ($errors->get('email'))
                    <div style="color:#b42318;font-size:12px;margin-top:5px;">
                        {{ $errors->first('email') }}
                    </div>
                @endif
            </div>

            <!-- Password -->
            <div style="margin-bottom: 15px;">
                <label for="password" style="
                    display: block;
                    color: #4b2e22;
                    font-size: 14px;
                    font-weight: 600;
                    margin-bottom: 7px;
                ">
                    Password
                </label>

                <input
                    id="password"
                    type="password"
                    name="password"
                    required
                    style="
                        width: 100%;
                        padding: 11px 12px;
                        border: 1px solid #d8c7b5;
                        border-radius: 6px;
                        background: white;
                        box-sizing: border-box;
                        font-size: 14px;
                    "
                >

                @if ($errors->get('password'))
                    <div style="color:#b42318;font-size:12px;margin-top:5px;">
                        {{ $errors->first('password') }}
                    </div>
                @endif
            </div>

            <!-- Confirm Password -->
            <div style="margin-bottom: 20px;">
                <label for="password_confirmation" style="
                    display: block;
                    color: #4b2e22;
                    font-size: 14px;
                    font-weight: 600;
                    margin-bottom: 7px;
                ">
                    Confirm Password
                </label>

                <input
                    id="password_confirmation"
                    type="password"
                    name="password_confirmation"
                    required
                    style="
                        width: 100%;
                        padding: 11px 12px;
                        border: 1px solid #d8c7b5;
                        border-radius: 6px;
                        background: white;
                        box-sizing: border-box;
                        font-size: 14px;
                    "
                >

                @if ($errors->get('password_confirmation'))
                    <div style="color:#b42318;font-size:12px;margin-top:5px;">
                        {{ $errors->first('password_confirmation') }}
                    </div>
                @endif
            </div>

            <!-- Register Button -->
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
                Register
            </button>
        </form>

        <!-- Login Link -->
        <div style="
            text-align: center;
            margin-top: 20px;
            font-size: 13px;
        ">
            <span style="color:#777;">Already have an account?</span>

            <a href="{{ route('login') }}" style="
                color: #4b2e22;
                text-decoration: none;
                font-weight: 600;
                margin-left: 4px;
            ">
                Login
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