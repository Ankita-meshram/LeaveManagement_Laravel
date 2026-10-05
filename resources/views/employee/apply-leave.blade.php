<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Apply Leave</title>

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
        }

        .nav-links {
            display: flex;
            align-items: center;
            gap: 25px;
        }

        .nav-links a {
            color: white;
            text-decoration: none;
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
            max-width: 800px;
            margin: 45px auto;
        }

        .form-box {
            background: #fbf6ee;
            padding: 35px;
            border-radius: 15px;
            box-shadow: 0 5px 20px rgba(75, 46, 34, 0.12);
        }

        h1 {
            color: #4b2e22;
            margin-bottom: 8px;
        }

        .subtitle {
            color: #806f62;
            margin-bottom: 30px;
        }

        .form-group {
            margin-bottom: 22px;
        }

        label {
            display: block;
            margin-bottom: 8px;
            font-weight: bold;
            color: #4b2e22;
        }

        input,
        select,
        textarea {
            width: 100%;
            padding: 12px;
            border: 1px solid #d8c7b5;
            border-radius: 7px;
            background: white;
            color: #2f1b14;
            font-size: 15px;
        }

        input:focus,
        select:focus,
        textarea:focus {
            outline: none;
            border-color: #8b5e3c;
        }

        textarea {
            min-height: 120px;
            resize: vertical;
        }

        .error {
            color: #a52a2a;
            font-size: 13px;
            margin-top: 6px;
        }

        .success {
            background: #e2f0df;
            color: #286328;
            padding: 13px;
            border-radius: 7px;
            margin-bottom: 20px;
        }

        .buttons {
            display: flex;
            gap: 12px;
            margin-top: 25px;
        }

        .submit-btn {
            background: #4b2e22;
            color: white;
            border: none;
            padding: 13px 25px;
            border-radius: 7px;
            cursor: pointer;
            font-weight: bold;
            font-size: 15px;
        }

        .back-btn {
            background: #e2d3c1;
            color: #4b2e22;
            padding: 13px 25px;
            border-radius: 7px;
            text-decoration: none;
            font-weight: bold;
        }

        .days-box {
            margin-top: 10px;
            color: #8b5e3c;
            font-weight: bold;
        }

        @media (max-width: 700px) {
            .navbar {
                padding: 15px 20px;
            }

            .nav-links {
                gap: 10px;
            }

            .container {
                width: 95%;
            }

            .form-box {
                padding: 25px;
            }
        }
    </style>
</head>

<body>

<nav class="navbar">

    <div class="logo">
        LEAVE MANAGEMENT
    </div>

    <div class="nav-links">

        <a href="{{ route('employee.dashboard') }}">
            Dashboard
        </a>

        <a href="{{ route('employee.leaves') }}">
            My Leaves
        </a>

        <form method="POST" action="{{ route('logout') }}">
            @csrf

            <button type="submit" class="logout-btn">
                Logout
            </button>
        </form>

    </div>

</nav>


<div class="container">

    <div class="form-box">

        <h1>Apply for Leave</h1>

        <p class="subtitle">
            Fill in the details below to submit your leave request.
        </p>


        @if(session('success'))
            <div class="success">
                {{ session('success') }}
            </div>
        @endif


        <form method="POST"
              action="{{ route('employee.apply-leave.store') }}">

            @csrf


            <!-- Leave Type -->

            <div class="form-group">

                <label for="leave_type_id">
                    Leave Type
                </label>

                <select name="leave_type_id" id="leave_type_id">

                    <option value="">
                        Select Leave Type
                    </option>

                    @foreach($leaveTypes as $leaveType)

                        <option value="{{ $leaveType->id }}"
                            {{ old('leave_type_id') == $leaveType->id ? 'selected' : '' }}>

                            {{ $leaveType->name }}
                            (Maximum {{ $leaveType->max_days }} days)

                        </option>

                    @endforeach

                </select>

                @error('leave_type_id')
                    <div class="error">
                        {{ $message }}
                    </div>
                @enderror

            </div>


            <!-- Start Date -->

            <div class="form-group">

                <label for="start_date">
                    Start Date
                </label>

                <input
                    type="date"
                    name="start_date"
                    id="start_date"
                    value="{{ old('start_date') }}"
                >

                @error('start_date')
                    <div class="error">
                        {{ $message }}
                    </div>
                @enderror

            </div>


            <!-- End Date -->

            <div class="form-group">

                <label for="end_date">
                    End Date
                </label>

                <input
                    type="date"
                    name="end_date"
                    id="end_date"
                    value="{{ old('end_date') }}"
                >

                <div id="daysBox" class="days-box"></div>

                @error('end_date')
                    <div class="error">
                        {{ $message }}
                    </div>
                @enderror

            </div>


            <!-- Reason -->

            <div class="form-group">

                <label for="reason">
                    Reason
                </label>

                <textarea
                    name="reason"
                    id="reason"
                    placeholder="Enter reason for leave..."
                >{{ old('reason') }}</textarea>

                @error('reason')
                    <div class="error">
                        {{ $message }}
                    </div>
                @enderror

            </div>


            <div class="buttons">

                <button type="submit" class="submit-btn">
                    Submit Leave
                </button>

                <a href="{{ route('employee.dashboard') }}"
                   class="back-btn">
                    Cancel
                </a>

            </div>

        </form>

    </div>

</div>


<script>

    const startDate = document.getElementById('start_date');
    const endDate = document.getElementById('end_date');
    const daysBox = document.getElementById('daysBox');

    function calculateDays() {

        if (startDate.value && endDate.value) {

            const start = new Date(startDate.value);
            const end = new Date(endDate.value);

            const difference =
                (end - start) / (1000 * 60 * 60 * 24);

            if (difference >= 0) {

                const days = difference + 1;

                daysBox.innerText =
                    "Total Leave Days: " + days;

            } else {

                daysBox.innerText =
                    "End date must be after start date.";

            }

        } else {

            daysBox.innerText = "";

        }
    }

    startDate.addEventListener('change', calculateDays);
    endDate.addEventListener('change', calculateDays);

</script>

</body>
</html>36