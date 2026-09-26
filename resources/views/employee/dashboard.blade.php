<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Employee Dashboard | Leave Management</title>

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
            white-space: nowrap;
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
            max-width: 1100px;
            margin: 45px auto;
            padding: 0 20px;
        }

        /* ================= WELCOME ================= */

        .welcome {
            margin-bottom: 28px;
        }

        .welcome h1 {
            font-size: 32px;
            color: #4b2e22;
            margin-bottom: 8px;
        }

        .welcome p {
            color: #6d5143;
            font-size: 16px;
        }

        /* ================= STAT CARDS ================= */

        .cards {
            display: grid;
            grid-template-columns: repeat(4, 1fr);
            gap: 20px;
            margin-bottom: 30px;
        }

        .card {
            background: #fbf6ee;
            padding: 24px;
            border-radius: 14px;
            box-shadow: 0 5px 20px rgba(75, 46, 34, 0.12);
            border: 1px solid #eadbc9;
        }

        .card h3 {
            color: #6d5143;
            font-size: 15px;
            margin-bottom: 12px;
        }

        .number {
            font-size: 32px;
            font-weight: bold;
            color: #4b2e22;
        }

        /* ================= ACTION BUTTONS ================= */

        .actions {
            display: flex;
            gap: 12px;
            margin-bottom: 30px;
        }

        .btn {
            display: inline-block;
            padding: 12px 20px;
            border-radius: 7px;
            text-decoration: none;
            font-weight: bold;
            background: #4b2e22;
            color: white;
        }

        .btn:hover {
            background: #2f1b14;
        }

        /* ================= RECENT LEAVES ================= */

        .section {
            background: #fbf6ee;
            padding: 30px;
            border-radius: 14px;
            box-shadow: 0 5px 20px rgba(75, 46, 34, 0.12);
        }

        .section h2 {
            color: #4b2e22;
            margin-bottom: 18px;
            font-size: 22px;
        }

        /* ================= TABLE ================= */

        .table-wrapper {
            width: 100%;
            overflow-x: auto;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            min-width: 650px;
        }

        th,
        td {
            padding: 13px 12px;
            border-bottom: 1px solid #dfcfbd;
            text-align: left;
        }

        th {
            background: #4b2e22;
            color: white;
            font-size: 14px;
        }

        td {
            background: #fffdf9;
            color: #4a3429;
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

        /* ================= EMPTY ================= */

        .empty {
            color: #776257;
            text-align: center;
            padding: 30px;
        }

        /* ================= MOBILE ================= */

        @media (max-width: 850px) {

            .cards {
                grid-template-columns: repeat(2, 1fr);
            }

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
        }

        @media (max-width: 550px) {

            .cards {
                grid-template-columns: 1fr;
            }

            .actions {
                flex-direction: column;
            }

            .btn {
                text-align: center;
            }

            .section {
                padding: 20px;
            }

            .welcome h1 {
                font-size: 27px;
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

            <a href="{{ route('profile.edit') }}">
                Profile
            </a>

            <form method="POST" action="{{ route('logout') }}" style="display: inline;">
                @csrf

                <button type="submit" class="logout-btn">
                    Logout
                </button>
            </form>

        </div>

    </div>


    <!-- ================= MAIN CONTENT ================= -->

    <div class="container">

        <div class="welcome">

            <h1>
                Welcome, {{ auth()->user()->name }} 👋
            </h1>

            <p>
                Manage your leave requests from your dashboard.
            </p>

        </div>


        <!-- ================= STATISTICS ================= -->

        <div class="cards">

            <div class="card">

                <h3>Total Leaves</h3>

                <div class="number">
                    {{ $totalLeaves }}
                </div>

            </div>


            <div class="card">

                <h3>Pending</h3>

                <div class="number">
                    {{ $pendingLeaves }}
                </div>

            </div>


            <div class="card">

                <h3>Approved</h3>

                <div class="number">
                    {{ $approvedLeaves }}
                </div>

            </div>


            <div class="card">

                <h3>Rejected</h3>

                <div class="number">
                    {{ $rejectedLeaves }}
                </div>

            </div>

        </div>


        <!-- ================= ACTIONS ================= -->

        <div class="actions">

            <a href="{{ route('employee.apply-leave') }}" class="btn">
                + Apply for Leave
            </a>

            <a href="{{ route('employee.leaves') }}" class="btn">
                View My Leaves
            </a>

        </div>


        <!-- ================= RECENT LEAVES ================= -->

        <div class="section">

            <h2>
                Recent Leave Requests
            </h2>

            @if($recentLeaves->count() > 0)

                <div class="table-wrapper">

                    <table>

                        <thead>

                            <tr>
                                <th>Leave Type</th>
                                <th>Start Date</th>
                                <th>End Date</th>
                                <th>Days</th>
                                <th>Status</th>
                            </tr>

                        </thead>

                        <tbody>

                            @foreach($recentLeaves as $leave)

                                <tr>

                                    <td>
                                        {{ $leave->leaveType->name ?? 'N/A' }}
                                    </td>

                                    <td>
                                        {{ \Carbon\Carbon::parse($leave->start_date)->format('d M Y') }}
                                    </td>

                                    <td>
                                        {{ \Carbon\Carbon::parse($leave->end_date)->format('d M Y') }}
                                    </td>

                                    <td>
                                        {{ $leave->days }}
                                    </td>

                                    <td>
                                        <span class="status {{ $leave->status }}">
                                            {{ $leave->status }}
                                        </span>
                                    </td>

                                </tr>

                            @endforeach

                        </tbody>

                    </table>

                </div>

            @else

                <div class="empty">
                    No leave requests found.
                </div>

            @endif

        </div>

    </div>

</body>

</html>