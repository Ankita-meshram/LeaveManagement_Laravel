<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Employee Dashboard</title>

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

        /* Navbar */
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

        .logout-form {
            margin: 0;
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

        /* Main */
        .container {
            width: 90%;
            max-width: 1200px;
            margin: 40px auto;
        }

        /* Welcome */
        .welcome {
            background: #fbf6ee;
            padding: 35px;
            border-radius: 15px;
            margin-bottom: 30px;

            display: flex;
            justify-content: space-between;
            align-items: center;

            box-shadow: 0 5px 20px rgba(75, 46, 34, 0.12);
        }

        .welcome h1 {
            color: #4b2e22;
            font-size: 30px;
            margin-bottom: 10px;
        }

        .welcome p {
            color: #806f62;
            font-size: 16px;
        }

        .apply-btn {
            background: #4b2e22;
            color: white;
            padding: 13px 22px;
            border-radius: 7px;
            text-decoration: none;
            font-weight: bold;
        }

        .apply-btn:hover {
            background: #2f1b14;
        }

        /* Cards */
        .cards {
            display: grid;
            grid-template-columns: repeat(4, 1fr);
            gap: 20px;
            margin-bottom: 35px;
        }

        .card {
            background: #fbf6ee;
            padding: 25px;
            border-radius: 12px;
            box-shadow: 0 5px 20px rgba(75, 46, 34, 0.10);
        }

        .card h3 {
            color: #806f62;
            font-size: 15px;
            margin-bottom: 12px;
        }

        .card .number {
            color: #4b2e22;
            font-size: 32px;
            font-weight: bold;
        }

        /* Recent Requests */
        .recent-section {
            background: #fbf6ee;
            padding: 25px;
            border-radius: 12px;
            box-shadow: 0 5px 20px rgba(75, 46, 34, 0.10);
        }

        .section-title {
            color: #4b2e22;
            font-size: 23px;
            margin-bottom: 20px;
        }

        .table-wrapper {
            overflow-x: auto;
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        th {
            background: #efe1cf;
            color: #4b2e22;
            padding: 13px;
            text-align: left;
            font-size: 14px;
        }

        td {
            padding: 14px 13px;
            border-bottom: 1px solid #eadbca;
            color: #5f4b40;
            font-size: 14px;
        }

        tr:last-child td {
            border-bottom: none;
        }

        .status {
            display: inline-block;
            padding: 6px 12px;
            border-radius: 20px;
            font-size: 12px;
            font-weight: bold;
            text-transform: capitalize;
        }

        .status.approved {
            background: #dcefdc;
            color: #2f6b2f;
        }

        .status.pending {
            background: #fff0c7;
            color: #8a6500;
        }

        .status.rejected {
            background: #f5d6d6;
            color: #8a2f2f;
        }

        .empty {
            text-align: center;
            padding: 25px;
            color: #806f62;
        }

        /* Mobile */
        @media (max-width: 900px) {
            .cards {
                grid-template-columns: repeat(2, 1fr);
            }
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

            .welcome {
                flex-direction: column;
                align-items: flex-start;
                gap: 20px;
            }

            .cards {
                grid-template-columns: 1fr;
            }
        }
    </style>
</head>

<body>

<!-- Navbar -->

<nav class="navbar">

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

        <form method="POST" action="{{ route('logout') }}" class="logout-form">
            @csrf

            <button type="submit" class="logout-btn">
                Logout
            </button>
        </form>

    </div>

</nav>


<!-- Main -->

<div class="container">

    <!-- Welcome -->

    <div class="welcome">

        <div>

            <h1>
                Welcome, {{ auth()->user()->name }}! 👋
            </h1>

            <p>
                Manage your leave requests from your dashboard.
            </p>

        </div>

        <a href="{{ route('employee.apply-leave') }}"
           class="apply-btn">

            + Apply for Leave

        </a>

    </div>


    <!-- Summary Cards -->

    <div class="cards">

        <div class="card">

            <h3>Total Leaves</h3>

            <div class="number">
                {{ $total }}
            </div>

        </div>


        <div class="card">

            <h3>Pending Leaves</h3>

            <div class="number">
                {{ $pending }}
            </div>

        </div>


        <div class="card">

            <h3>Approved Leaves</h3>

            <div class="number">
                {{ $approved }}
            </div>

        </div>


        <div class="card">

            <h3>Rejected Leaves</h3>

            <div class="number">
                {{ $rejected }}
            </div>

        </div>

    </div>


    <!-- Recent Leave Requests -->

    <div class="recent-section">

        <h2 class="section-title">
            Recent Leave Requests
        </h2>

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

                    @forelse($recentLeaves as $leave)

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

                    @empty

                        <tr>

                            <td colspan="5" class="empty">
                                No leave requests found.
                            </td>

                        </tr>

                    @endforelse

                </tbody>

            </table>

        </div>

    </div>

</div>

</body>
</html>