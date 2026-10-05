<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Profile - Leave Management</title>

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
        }

        .navbar {
            background: #4b2e22;
            color: white;
            padding: 18px 50px;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .logo {
            font-size: 22px;
            font-weight: bold;
            letter-spacing: 1px;
        }

        .nav-links {
            display: flex;
            align-items: center;
            gap: 25px;
        }

        .nav-links a {
            color: white;
            text-decoration: none;
            font-size: 15px;
        }

        .nav-links a:hover {
            color: #c59b6d;
        }

        .logout-btn {
            background: #c59b6d;
            color: #2f1b14;
            border: none;
            padding: 9px 18px;
            border-radius: 6px;
            cursor: pointer;
            font-weight: bold;
        }

        .container {
            width: 90%;
            max-width: 1000px;
            margin: 40px auto;
        }

        .page-title {
            margin-bottom: 25px;
        }

        .page-title h1 {
            color: #4b2e22;
            font-size: 30px;
            margin-bottom: 8px;
        }

        .page-title p {
            color: #806f62;
        }

        .card {
            background: #fbf6ee;
            padding: 30px;
            border-radius: 14px;
            margin-bottom: 25px;
            box-shadow: 0 5px 20px rgba(75, 46, 34, 0.10);
        }

        .card h2 {
            color: #4b2e22;
            font-size: 21px;
            margin-bottom: 8px;
        }

        .card-description {
            color: #806f62;
            font-size: 14px;
            margin-bottom: 25px;
        }

        .form-group {
            margin-bottom: 18px;
        }

        label {
            display: block;
            color: #4b2e22;
            font-weight: bold;
            font-size: 14px;
            margin-bottom: 7px;
        }

        input {
            width: 100%;
            padding: 11px 13px;
            border: 1px solid #d8c5b0;
            border-radius: 7px;
            background: white;
            color: #2f1b14;
            outline: none;
        }

        input:focus {
            border-color: #4b2e22;
        }

        .button {
            background: #4b2e22;
            color: white;
            border: none;
            padding: 11px 20px;
            border-radius: 7px;
            cursor: pointer;
            font-weight: bold;
        }

        .button:hover {
            background: #2f1b14;
        }

        .danger-button {
            background: #8b3a3a;
            color: white;
            border: none;
            padding: 11px 20px;
            border-radius: 7px;
            cursor: pointer;
            font-weight: bold;
        }

        .success {
            background: #dcefdc;
            color: #2f6b2f;
            padding: 12px 15px;
            border-radius: 7px;
            margin-bottom: 20px;
            font-size: 14px;
        }

        .error {
            color: #8b3a3a;
            font-size: 13px;
            margin-top: 5px;
        }

        .back-link {
            display: inline-block;
            margin-top: 5px;
            color: #4b2e22;
            text-decoration: none;
            font-weight: bold;
        }

        @media (max-width: 750px) {
            .navbar {
                padding: 15px 20px;
                flex-direction: column;
                gap: 15px;
            }

            .nav-links {
                gap: 12px;
                flex-wrap: wrap;
                justify-content: center;
            }

            .container {
                width: 94%;
                margin: 25px auto;
            }
        }
    </style>
</head>

<body>

<nav class="navbar">

    <div class="logo">
        Leave Management
    </div>

    <div class="nav-links">

        @if(auth()->user()->role === 'manager')

            <a href="{{ route('manager.dashboard') }}">
                Dashboard
            </a>

            <a href="{{ route('manager.employees') }}">
                Employees
            </a>

            <a href="{{ route('manager.leave-types') }}">
                Leave Types
            </a>

        @else

            <a href="{{ route('employee.dashboard') }}">
                Dashboard
            </a>

            <a href="{{ route('employee.apply-leave') }}">
                Apply Leave
            </a>

            <a href="{{ route('employee.leaves') }}">
                My Leaves
            </a>

        @endif

        <a href="{{ route('profile.edit') }}">
            Profile
        </a>

        <form method="POST" action="{{ route('logout') }}" style="margin:0;">
            @csrf

            <button type="submit" class="logout-btn">
                Logout
            </button>
        </form>

    </div>

</nav>


<div class="container">

    <div class="page-title">

        <h1>
            My Profile
        </h1>

        <p>
            Manage your account information and password.
        </p>

    </div>


    @if (session('status') === 'profile-updated')

        <div class="success">
            Profile information updated successfully.
        </div>

    @endif


    @if (session('status') === 'password-updated')

        <div class="success">
            Password updated successfully.
        </div>

    @endif


    <!-- Profile Information -->

    <div class="card">

        <h2>
            Profile Information
        </h2>

        <p class="card-description">
            Update your name and email address.
        </p>

        <form method="POST" action="{{ route('profile.update') }}">

            @csrf
            @method('patch')

            <div class="form-group">

                <label for="name">
                    Name
                </label>

                <input
                    id="name"
                    name="name"
                    type="text"
                    value="{{ old('name', auth()->user()->name) }}"
                    required
                >

                @error('name')
                    <div class="error">{{ $message }}</div>
                @enderror

            </div>


            <div class="form-group">

                <label for="email">
                    Email
                </label>

                <input
                    id="email"
                    name="email"
                    type="email"
                    value="{{ old('email', auth()->user()->email) }}"
                    required
                >

                @error('email')
                    <div class="error">{{ $message }}</div>
                @enderror

            </div>


            <button type="submit" class="button">
                Save Changes
            </button>

        </form>

    </div>


    <!-- Password -->

    <div class="card">

        <h2>
            Update Password
        </h2>

        <p class="card-description">
            Make sure your account is using a long, secure password.
        </p>

        <form method="POST" action="{{ route('password.update') }}">

            @csrf
            @method('put')

            <div class="form-group">

                <label for="current_password">
                    Current Password
                </label>

                <input
                    id="current_password"
                    name="current_password"
                    type="password"
                    required
                >

                @error('current_password', 'updatePassword')
                    <div class="error">{{ $message }}</div>
                @enderror

            </div>


            <div class="form-group">

                <label for="password">
                    New Password
                </label>

                <input
                    id="password"
                    name="password"
                    type="password"
                    required
                >

                @error('password', 'updatePassword')
                    <div class="error">{{ $message }}</div>
                @enderror

            </div>


            <div class="form-group">

                <label for="password_confirmation">
                    Confirm New Password
                </label>

                <input
                    id="password_confirmation"
                    name="password_confirmation"
                    type="password"
                    required
                >

            </div>


            <button type="submit" class="button">
                Update Password
            </button>

        </form>

    </div>


    <!-- Delete Account -->

    <div class="card">

        <h2>
            Delete Account
        </h2>

        <p class="card-description">
            Permanently delete your account and all of its data.
        </p>

        <form method="POST" action="{{ route('profile.destroy') }}"
              onsubmit="return confirm('Are you sure you want to delete your account?');">

            @csrf
            @method('delete')

            <button type="submit" class="danger-button">
                Delete Account
            </button>

        </form>

    </div>


    <a href="{{ auth()->user()->role === 'manager'
        ? route('manager.dashboard')
        : route('employee.dashboard') }}"
       class="back-link">

        ← Back to Dashboard

    </a>

</div>

</body>
</html>