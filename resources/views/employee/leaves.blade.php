<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Leave History</title>

    <style>
        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
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
            max-width: 1200px;
            margin: 40px auto;
        }

        .header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 25px;
        }

        .header h1 {
            color: #4b2e22;
            font-size: 30px;
        }

        .apply-btn {
            background: #4b2e22;
            color: white;
            padding: 12px 20px;
            border-radius: 7px;
            text-decoration: none;
            font-weight: bold;
        }

        .message {
            background: #e4f2df;
            color: #285c28;
            padding: 14px 18px;
            border-radius: 7px;
            margin-bottom: 20px;
        }

        .error {
            background: #f8dddd;
            color: #8b2525;
            padding: 14px 18px;
            border-radius: 7px;
            margin-bottom: 20px;
        }

        .table-box {
            background: #fbf6ee;
            border-radius: 12px;
            padding: 25px;
            box-shadow: 0 5px 20px rgba(75, 46, 34, 0.12);
            overflow-x: auto;
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        th {
            background: #4b2e22;
            color: white;
            padding: 15px;
            text-align: left;
        }

        td {
            padding: 15px;
            border-bottom: 1px solid #e0d2c0;
            vertical-align: middle;
        }

        tr:hover {
            background: #f7efe3;
        }

        .status {
            padding: 6px 12px;
            border-radius: 20px;
            font-size: 13px;
            font-weight: bold;
            text-transform: capitalize;
        }

        .pending {
            background: #fff0c9;
            color: #8a6500;
        }

        .approved {
            background: #dcefd8;
            color: #286328;
        }

        .rejected {
            background: #f6d8d8;
            color: #8b2525;
        }

        .cancel-btn {
            background: #8b5e3c;
            color: white;
            border: none;
            padding: 8px 13px;
            border-radius: 5px;
            cursor: pointer;
        }

        .cancel-btn:hover {
            background: #4b2e22;
        }

        .empty {
            text-align: center;
            padding: 40px;
            color: #806f62;
        }

        @media (max-width: 700px) {
            .navbar {
                padding: 15px 20px;
            }

            .container {
                width: 95%;
            }

            .header {
                flex-direction: column;
                align-items: flex-start;
                gap: 15px;
            }

            th, td {
                padding: 10px;
                font-size: 13px;
            }
        }
    </style>
</head>

<body>

<nav class="navbar">
    <div class="logo">LEAVE MANAGEMENT</div>

    <div class="nav-links">
        <a href="{{ route('employee.dashboard') }}">Dashboard</a>
        <a href="{{ route('employee.apply-leave') }}">Apply Leave</a>

        <form method="POST" action="{{ route('logout') }}">
            @csrf
            <button type="submit" class="logout-btn">Logout</button>
        </form>
    </div>
</nav>

<div class="container">

    <div class="header">
        <h1>My Leave History</h1>

        <a href="{{ route('employee.apply-leave') }}" class="apply-btn">
            + Apply Leave
        </a>
    </div>

    @if(session('success'))
        <div class="message">
            {{ session('success') }}
        </div>
    @endif

    @if($errors->has('cancel'))
        <div class="error">
            {{ $errors->first('cancel') }}
        </div>
    @endif

    <div class="table-box">

        @if($leaves->count() > 0)

            <table>
                <thead>
                    <tr>
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

                    @foreach($leaves as $leave)

                        <tr>
                            <td>
                                {{ $leave->leaveType->name }}
                            </td>

                            <td>
                                {{ $leave->start_date->format('d M Y') }}
                            </td>

                            <td>
                                {{ $leave->end_date->format('d M Y') }}
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
                            </td>

                            <td>

                                @if($leave->status === 'pending')

                                    <form method="POST"
                                          action="{{ route('employee.leave.cancel', $leave) }}"
                                          onsubmit="return confirm('Are you sure you want to cancel this leave?');">

                                        @csrf
                                        @method('DELETE')

                                        <button type="submit" class="cancel-btn">
                                            Cancel
                                        </button>

                                    </form>

                                @else

                                    <span style="color:#806f62;">—</span>

                                @endif

                            </td>
                        </tr>

                    @endforeach

                </tbody>
            </table>

        @else

            <div class="empty">
                <h3>No Leave Applications Yet</h3>
                <p>You have not applied for any leave.</p>
                <br>

                <a href="{{ route('employee.apply-leave') }}"
                   class="apply-btn">
                    Apply for Leave
                </a>
            </div>

        @endif

    </div>

</div>

</body>
</html>