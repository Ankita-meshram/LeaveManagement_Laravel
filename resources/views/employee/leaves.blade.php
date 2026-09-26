<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>My Leaves | Leave Management</title>

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
            max-width: 1200px;
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
            padding: 30px;
            border-radius: 14px;

            box-shadow:
                0 5px 20px rgba(75, 46, 34, 0.12);
        }

        /* ================= SUCCESS ================= */

        .success {
            background: #e5f3e8;
            color: #28613a;
            padding: 12px 15px;
            border-radius: 7px;
            margin-bottom: 20px;
        }

        /* ================= ERROR ================= */

        .error {
            background: #fce8e6;
            color: #a33a2b;
            padding: 12px 15px;
            border-radius: 7px;
            margin-bottom: 20px;
        }

        /* ================= BUTTON ================= */

        .apply-btn {
            display: inline-block;

            background: #4b2e22;
            color: white;

            padding: 11px 18px;

            text-decoration: none;

            border-radius: 7px;

            font-weight: bold;

            margin-bottom: 20px;
        }

        .apply-btn:hover {
            background: #2f1b14;
        }

        /* ================= TABLE ================= */

        .table-wrapper {
            width: 100%;
            overflow-x: auto;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 5px;
            min-width: 850px;
        }

        th,
        td {
            padding: 14px 12px;
            border-bottom: 1px solid #dfcfbd;
            text-align: left;
        }

        th {
            background: #4b2e22;
            color: white;
            font-size: 14px;
        }

        td {
            color: #4a3429;
            background: #fffdf9;
        }

        tr:hover td {
            background: #f8efe4;
        }

        /* ================= STATUS ================= */

        .status {
            display: inline-block;

            padding: 6px 11px;

            border-radius: 15px;

            font-size: 13px;

            font-weight: bold;

            text-transform: capitalize;
        }

        .pending {
            background: #f8dfb2;
            color: #76520a;
        }

        .approved {
            background: #dceedd;
            color: #28613a;
        }

        .rejected {
            background: #f4d5d2;
            color: #9b3025;
        }

        /* ================= CANCEL ================= */

        .cancel-btn {
            background: #8b3e32;
            color: white;

            border: none;

            padding: 7px 13px;

            border-radius: 6px;

            cursor: pointer;

            font-weight: bold;
        }

        .cancel-btn:hover {
            background: #6f2f27;
        }

        .not-available {
            color: #8b7568;
        }

        /* ================= EMPTY ================= */

        .empty {
            text-align: center;
            padding: 40px 20px;
            color: #776257;
        }

        .empty p {
            margin-bottom: 20px;
        }

        /* ================= MOBILE ================= */

        @media (max-width: 700px) {

            .navbar {
                padding: 15px 20px;

                flex-direction: column;

                gap: 15px;
            }

            .nav-links {
                flex-wrap: wrap;
                justify-content: center;
                gap: 12px;
            }

            .card {
                padding: 20px;
            }

            .heading h1 {
                font-size: 28px;
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

            <h1>My Leaves</h1>

            <p>
                View and manage your leave requests.
            </p>

        </div>


        <div class="card">

            <!-- SUCCESS MESSAGE -->

            @if(session('success'))

                <div class="success">
                    {{ session('success') }}
                </div>

            @endif


            <!-- ERROR MESSAGE -->

            @if($errors->any())

                <div class="error">

                    @foreach($errors->all() as $error)

                        <div>
                            {{ $error }}
                        </div>

                    @endforeach

                </div>

            @endif


            <!-- APPLY BUTTON -->

            <a
                href="{{ route('employee.apply-leave') }}"
                class="apply-btn"
            >
                + Apply for Leave
            </a>


            @if($leaves->count() > 0)

                <div class="table-wrapper">

                    <table>

                        <thead>

                            <tr>

                                <th>
                                    Leave Type
                                </th>

                                <th>
                                    Start Date
                                </th>

                                <th>
                                    End Date
                                </th>

                                <th>
                                    Days
                                </th>

                                <th>
                                    Reason
                                </th>

                                <th>
                                    Status
                                </th>

                                <th>
                                    Action
                                </th>

                            </tr>

                        </thead>


                        <tbody>

                            @foreach($leaves as $leave)

                                <tr>

                                    <!-- Leave Type -->

                                    <td>
                                        {{ $leave->leaveType->name ?? 'N/A' }}
                                    </td>


                                    <!-- Start Date -->

                                    <td>
                                        {{ \Carbon\Carbon::parse($leave->start_date)->format('d M Y') }}
                                    </td>


                                    <!-- End Date -->

                                    <td>
                                        {{ \Carbon\Carbon::parse($leave->end_date)->format('d M Y') }}
                                    </td>


                                    <!-- Days -->

                                    <td>
                                        {{ $leave->days }}
                                    </td>


                                    <!-- Reason -->

                                    <td>
                                        {{ $leave->reason }}
                                    </td>


                                    <!-- Status -->

                                    <td>

                                        <span class="status {{ $leave->status }}">
                                            {{ $leave->status }}
                                        </span>

                                    </td>


                                    <!-- Action -->

                                    <td>

                                        @if($leave->status === 'pending')

                                            <form
                                                method="POST"
                                                action="{{ route('employee.leave.cancel', $leave->id) }}"
                                            >

                                                @csrf

                                                @method('DELETE')

                                                <button
                                                    type="submit"
                                                    class="cancel-btn"
                                                    onclick="return confirm('Are you sure you want to cancel this leave?')"
                                                >
                                                    Cancel
                                                </button>

                                            </form>

                                        @else

                                            <span class="not-available">
                                                -
                                            </span>

                                        @endif

                                    </td>

                                </tr>

                            @endforeach

                        </tbody>

                    </table>

                </div>

            @else

                <div class="empty">

                    <p>
                        You have not applied for any leave yet.
                    </p>

                    <a
                        href="{{ route('employee.apply-leave') }}"
                        class="apply-btn"
                    >
                        Apply Your First Leave
                    </a>

                </div>

            @endif

        </div>

    </div>

</body>
</html>