<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Apply Leave | Leave Management</title>

    <style>
        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
        }

        body {
            font-family: Arial, sans-serif;
            background: #f4eadb;
            color: #2f1b14;
        }

        /* ================= NAVBAR ================= */

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
            font-size: 15px;
            font-weight: 500;
        }

        .nav-links a:hover {
            text-decoration: underline;
        }

        .logout-btn {
            background: #c59b6d;
            color: #2f1b14;
            border: none;
            padding: 9px 16px;
            border-radius: 6px;
            cursor: pointer;
            font-weight: bold;
        }

        .logout-btn:hover {
            background: #d5b084;
        }

        /* ================= CONTAINER ================= */

        .container {
            max-width: 800px;
            margin: 45px auto;
            padding: 0 20px;
        }

        .heading {
            margin-bottom: 25px;
        }

        .heading h1 {
            font-size: 32px;
            color: #4b2e22;
        }

        .heading p {
            margin-top: 8px;
            color: #6d5143;
        }

        /* ================= CARD ================= */

        .card {
            background: #fbf6ee;
            padding: 35px;
            border-radius: 14px;

            box-shadow:
                0 5px 20px rgba(75, 46, 34, 0.12);
        }

        /* ================= FORM ================= */

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
            padding: 12px 14px;

            border: 1px solid #d8c4ad;
            border-radius: 7px;

            background: white;
            font-size: 15px;
            outline: none;
        }

        input:focus,
        select:focus,
        textarea:focus {
            border-color: #8b5e3c;
        }

        textarea {
            min-height: 120px;
            resize: vertical;
        }

        /* ================= DATES ================= */

        .date-row {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 20px;
        }

        .days-box {
            margin-top: 8px;

            padding: 12px;

            background: #f4eadb;
            border-radius: 7px;

            color: #6d5143;
            font-size: 14px;
        }

        /* ================= ERROR ================= */

        .error-box {
            background: #fce8e6;
            color: #a33a2b;

            padding: 12px 15px;
            border-radius: 7px;

            margin-bottom: 20px;
        }

        .error-box ul {
            padding-left: 20px;
        }

        /* ================= BUTTONS ================= */

        .buttons {
            display: flex;
            gap: 12px;
            margin-top: 25px;
        }

        .submit-btn,
        .back-btn {
            padding: 12px 22px;

            border-radius: 7px;

            text-decoration: none;
            font-weight: bold;

            cursor: pointer;
            border: none;
        }

        .submit-btn {
            background: #4b2e22;
            color: white;
        }

        .submit-btn:hover {
            background: #2f1b14;
        }

        .back-btn {
            background: #e1d1bd;
            color: #4b2e22;
        }

        .back-btn:hover {
            background: #d5c0a8;
        }

        /* ================= MOBILE ================= */

        @media (max-width: 700px) {

            .navbar {
                padding: 15px 20px;
            }

            .nav-links {
                gap: 12px;
            }

            .date-row {
                grid-template-columns: 1fr;
            }

            .card {
                padding: 22px;
            }
        }

        @media (max-width: 550px) {

            .navbar {
                flex-direction: column;
                gap: 15px;
            }

            .nav-links {
                flex-wrap: wrap;
                justify-content: center;
            }
        }
    </style>
</head>

<body>

    <!-- ================= NAVBAR ================= -->

    <div class="navbar">

        <div class="logo">
            Leave Management
        </div>

        <div class="nav-links">

            <a href="{{ route('employee.dashboard') }}">
                Dashboard
            </a>

            <a href="{{ route('employee.apply-leave') }}">
                Apply Leave
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

    </div>


    <!-- ================= MAIN CONTENT ================= -->

    <div class="container">

        <div class="heading">

            <h1>Apply for Leave</h1>

            <p>
                Fill in the details below to submit your leave request.
            </p>

        </div>


        <div class="card">

            <!-- ERROR MESSAGES -->

            @if ($errors->any())

                <div class="error-box">

                    <ul>

                        @foreach ($errors->all() as $error)

                            <li>
                                {{ $error }}
                            </li>

                        @endforeach

                    </ul>

                </div>

            @endif


            <!-- FORM -->

            <form method="POST"
                  action="{{ route('employee.apply-leave.store') }}">

                @csrf


                <!-- LEAVE TYPE -->

                <div class="form-group">

                    <label for="leave_type_id">
                        Leave Type
                    </label>

                    <select
                        name="leave_type_id"
                        id="leave_type_id"
                        required
                    >

                        <option value="">
                            -- Select Leave Type --
                        </option>

                        @foreach ($leaveTypes as $leaveType)

                            <option
                                value="{{ $leaveType->id }}"
                                {{ old('leave_type_id') == $leaveType->id ? 'selected' : '' }}
                            >

                                {{ $leaveType->name }}
                                (Maximum {{ $leaveType->max_days }} days)

                            </option>

                        @endforeach

                    </select>

                </div>


                <!-- DATES -->

                <div class="date-row">

                    <div class="form-group">

                        <label for="start_date">
                            Start Date
                        </label>

                        <input
                            type="date"
                            name="start_date"
                            id="start_date"
                            value="{{ old('start_date') }}"
                            required
                        >

                    </div>


                    <div class="form-group">

                        <label for="end_date">
                            End Date
                        </label>

                        <input
                            type="date"
                            name="end_date"
                            id="end_date"
                            value="{{ old('end_date') }}"
                            required
                        >

                    </div>

                </div>


                <!-- DAYS -->

                <div class="days-box" id="daysBox">

                    Select start and end dates to calculate total leave days.

                </div>


                <!-- REASON -->

                <div
                    class="form-group"
                    style="margin-top: 22px;"
                >

                    <label for="reason">
                        Reason
                    </label>

                    <textarea
                        name="reason"
                        id="reason"
                        placeholder="Enter reason for your leave..."
                        required
                    >{{ old('reason') }}</textarea>

                </div>


                <!-- BUTTONS -->

                <div class="buttons">

                    <button
                        type="submit"
                        class="submit-btn"
                    >
                        Submit Leave
                    </button>

                    <a
                        href="{{ route('employee.dashboard') }}"
                        class="back-btn"
                    >
                        Back
                    </a>

                </div>

            </form>

        </div>

    </div>


    <!-- ================= JAVASCRIPT ================= -->

    <script>

        const startDate =
            document.getElementById('start_date');

        const endDate =
            document.getElementById('end_date');

        const daysBox =
            document.getElementById('daysBox');


        function calculateDays() {

            if (startDate.value && endDate.value) {

                const start =
                    new Date(startDate.value);

                const end =
                    new Date(endDate.value);


                if (end >= start) {

                    const difference =
                        end.getTime() - start.getTime();


                    const days =
                        Math.floor(
                            difference /
                            (1000 * 60 * 60 * 24)
                        ) + 1;


                    daysBox.innerHTML =
                        "Total Leave Days: <strong>"
                        + days +
                        "</strong>";

                } else {

                    daysBox.innerHTML =
                        "End date must be after or equal to start date.";

                }

            } else {

                daysBox.innerHTML =
                    "Select start and end dates to calculate total leave days.";

            }

        }


        startDate.addEventListener(
            'change',
            calculateDays
        );

        endDate.addEventListener(
            'change',
            calculateDays
        );

    </script>

</body>
</html>