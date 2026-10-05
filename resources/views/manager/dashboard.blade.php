<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Manager Dashboard</title>

    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: Arial, sans-serif;
        }

        body {
            background: #E8DCC8;
            color: #1F2A44;
        }

        /* Navbar */
        .navbar {
            background: #1F2A44;
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
            color: #C6A75E;
        }

        .logout-form {
            margin: 0;
        }

        .logout-btn {
            background: #C6A75E;
            color: #1F2A44;
            border: none;
            padding: 9px 18px;
            border-radius: 6px;
            cursor: pointer;
            font-weight: bold;
        }

        .logout-btn:hover {
            background: #b8954d;
        }

        /* Main */
        .container {
            width: 90%;
            max-width: 1250px;
            margin: 40px auto;
        }

        /* Alerts */
        .alert {
            padding: 14px 18px;
            border-radius: 8px;
            margin-bottom: 20px;
            font-size: 14px;
        }

        .success {
            background: #dcefdc;
            color: #2f6b2f;
        }

        .error {
            background: #f5d6d6;
            color: #8a2f2f;
        }

        /* Welcome */
        .welcome {
            background: #FFFAF2;
            padding: 35px;
            border-radius: 15px;
            margin-bottom: 30px;
            box-shadow: 0 5px 20px rgba(31, 42, 68, 0.12);
        }

        .welcome h1 {
            color: #1F2A44;
            font-size: 30px;
            margin-bottom: 10px;
        }

        .welcome p {
            color: #6d665d;
            font-size: 16px;
        }

        /* Cards */
        .cards {
            display: grid;
            grid-template-columns: repeat(4, 1fr);
            gap: 20px;
            margin-bottom: 35px;
        }

        .card {
            background: #FFFAF2;
            padding: 25px;
            border-radius: 12px;
            box-shadow: 0 5px 20px rgba(31, 42, 68, 0.10);
        }

        .card h3 {
            color: #6d665d;
            font-size: 15px;
            margin-bottom: 12px;
        }

        .card .number {
            color: #1F2A44;
            font-size: 32px;
            font-weight: bold;
        }

        /* Leave Requests */
        .panel {
            background: #FFFAF2;
            padding: 28px;
            border-radius: 12px;
            box-shadow: 0 5px 20px rgba(31, 42, 68, 0.10);
        }

        .panel h2 {
            color: #1F2A44;
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
            background: #1F2A44;
            color: white;
            padding: 13px;
            text-align: left;
            font-size: 14px;
        }

        td {
            padding: 14px 13px;
            border-bottom: 1px solid #E8DCC8;
            color: #4f4a43;
            font-size: 14px;
            vertical-align: top;
        }

        tr:last-child td {
            border-bottom: none;
        }

        /* Status */
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

        /* Action buttons */
        .action-box {
            display: flex;
            flex-direction: column;
            gap: 8px;
            min-width: 180px;
        }

        .comment-box {
            width: 100%;
            padding: 8px;
            border: 1px solid #d6c8b5;
            border-radius: 5px;
            resize: vertical;
            font-family: Arial, sans-serif;
            font-size: 12px;
            background: #fffdf8;
        }

        .approve-btn,
        .reject-btn {
            border: none;
            padding: 8px 12px;
            border-radius: 5px;
            cursor: pointer;
            font-weight: bold;
            font-size: 12px;
        }

        .approve-btn {
            background: #1F2A44;
            color: white;
        }

        .approve-btn:hover {
            background: #2d3b5d;
        }

        .reject-btn {
            background: #C6A75E;
            color: #1F2A44;
        }

        .reject-btn:hover {
            background: #b8954d;
        }

        .no-action {
            color: #777;
            font-size: 13px;
        }

        .manager-comment {
            margin-top: 6px;
            font-size: 12px;
            color: #6d665d;
        }

        .empty {
            text-align: center;
            padding: 25px;
            color: #777;
        }

        /* Mobile */
        @media (max-width: 1000px) {
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

            .cards {
                grid-template-columns: 1fr;
            }

            .welcome {
                padding: 25px;
            }

            .welcome h1 {
                font-size: 24px;
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

        <a href="{{ route('manager.dashboard') }}">
            Dashboard
        </a>

        <a href="{{ route('manager.employees') }}">
            Employees
        </a>

        <a href="{{ route('manager.leave-types') }}">
            Leave Types
        </a>

        <a href="{{ route('profile.edit') }}">
            Profile
        </a>

        <form method="POST"
              action="{{ route('logout') }}"
              class="logout-form">

            @csrf

            <button type="submit" class="logout-btn">
                Logout
            </button>

        </form>

    </div>

</nav>


<!-- Main -->

<div class="container">

    <!-- Alerts -->

    @if(session('success'))
        <div class="alert success">
            {{ session('success') }}
        </div>
    @endif

    @if($errors->any())
        <div class="alert error">
            {{ $errors->first() }}
        </div>
    @endif


    <!-- Welcome -->

    <div class="welcome">

        <h1>
            Welcome, {{ auth()->user()->name }}
        </h1>

        <p>
            You are logged in as Manager.
        </p>

    </div>


    <!-- Summary Cards -->

    <div class="cards">

        <div class="card">
            <h3>Total Employees</h3>

            <div class="number">
                {{ $totalEmployees }}
            </div>
        </div>


        <div class="card">
            <h3>Pending Leaves</h3>

            <div class="number">
                {{ $pendingLeaves }}
            </div>
        </div>


        <div class="card">
            <h3>Approved Leaves</h3>

            <div class="number">
                {{ $approvedLeaves }}
            </div>
        </div>


        <div class="card">
            <h3>Rejected Leaves</h3>

            <div class="number">
                {{ $rejectedLeaves }}
            </div>
        </div>

    </div>


    <!-- Leave Requests -->

    <div class="panel">

        <h2>
            Leave Requests
        </h2>

        <div class="table-wrapper">

            <table>

                <thead>

                    <tr>
                        <th>Employee</th>
                        <th>Leave Type</th>
                        <th>Start Date</th>
                        <th>End Date</th>
                        <th>Days</th>
                        <th>Reason</th>
                        <th>Status</th>
                        <th>Action</th>
                    </tr>

                </thead>

                <tbody>

                    @forelse($leaveRequests as $leave)

                        <tr>

                            <td>
                                {{ $leave->user->name ?? 'N/A' }}
                            </td>

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
                                {{ $leave->reason }}
                            </td>

                            <td>

                                <span class="status {{ $leave->status }}">
                                    {{ $leave->status }}
                                </span>

                                @if($leave->manager_comment)
                                    <div class="manager-comment">
                                        <strong>Comment:</strong>
                                        {{ $leave->manager_comment }}
                                    </div>
                                @endif

                            </td>

                            <td>

                                @if($leave->status === 'pending')

                                    <div class="action-box">

                                        <!-- Approve -->

                                        <form method="POST"
                                              action="{{ route('manager.leave.status', $leave) }}">

                                            @csrf

                                            <input type="hidden"
                                                   name="status"
                                                   value="approved">

                                            <textarea
                                                name="manager_comment"
                                                class="comment-box"
                                                rows="2"
                                                placeholder="Manager comment..."></textarea>

                                            <button type="submit"
                                                    class="approve-btn">
                                                Approve
                                            </button>

                                        </form>


                                        <!-- Reject -->

                                        <form method="POST"
                                              action="{{ route('manager.leave.status', $leave) }}">

                                            @csrf

                                            <input type="hidden"
                                                   name="status"
                                                   value="rejected">

                                            <input type="hidden"
                                                   name="manager_comment"
                                                   value="Leave rejected by manager.">

                                            <button type="submit"
                                                    class="reject-btn">
                                                Reject
                                            </button>

                                        </form>

                                    </div>

                                @else

                                    <span class="no-action">
                                        No action required
                                    </span>

                                @endif

                            </td>

                        </tr>

                    @empty

                        <tr>

                            <td colspan="8" class="empty">
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