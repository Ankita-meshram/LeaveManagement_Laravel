<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">

    <meta name="viewport"
          content="width=device-width, initial-scale=1.0">

    <title>Employee Details</title>

    <style>

        * {
            box-sizing: border-box;
        }

        body {
            margin: 0;
            font-family: Arial, sans-serif;
            background: #E8DCC8;
            color: #1F2A44;
        }

        /* Navbar */

        .navbar {
            background: #1F2A44;
            color: white;
            padding: 18px 45px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            border-bottom: 4px solid #C6A75E;
        }

        .navbar h2 {
            margin: 0;
            font-size: 22px;
        }

        .nav-links {
            display: flex;
            align-items: center;
            gap: 25px;
        }

        .nav-links a {
            color: #E8DCC8;
            text-decoration: none;
            font-size: 15px;
        }

        .nav-links a:hover {
            color: #C6A75E;
        }

        .logout-btn {
            background: #C6A75E;
            border: none;
            color: #1F2A44;
            padding: 9px 18px;
            border-radius: 7px;
            cursor: pointer;
            font-weight: bold;
        }

        /* Container */

        .container {
            max-width: 1200px;
            margin: 40px auto;
            padding: 0 20px;
        }

        /* Back */

        .back-link {
            display: inline-block;
            margin-bottom: 20px;
            color: #1F2A44;
            text-decoration: none;
            font-weight: bold;
        }

        .back-link:hover {
            color: #C6A75E;
        }

        /* Employee Card */

        .employee-card {
            background: #fffaf2;
            border-radius: 14px;
            padding: 28px;
            border: 1px solid rgba(198, 167, 94, 0.45);
            box-shadow: 0 5px 15px rgba(31, 42, 68, 0.10);
            margin-bottom: 30px;
        }

        .employee-card h1 {
            margin: 0 0 8px;
            color: #1F2A44;
            font-size: 28px;
        }

        .employee-email {
            color: #697080;
            margin-bottom: 20px;
        }

        .employee-info {
            display: flex;
            gap: 30px;
            flex-wrap: wrap;
        }

        .info-box {
            background: #E8DCC8;
            padding: 12px 18px;
            border-radius: 8px;
        }

        .info-box strong {
            color: #1F2A44;
        }

        /* Section */

        .section {
            background: #fffaf2;
            border-radius: 14px;
            padding: 25px;
            border: 1px solid rgba(198, 167, 94, 0.45);
            box-shadow: 0 5px 15px rgba(31, 42, 68, 0.10);
        }

        .section h2 {
            margin: 0 0 20px;
            color: #1F2A44;
            font-size: 22px;
        }

        /* Table */

        .table-wrapper {
            overflow-x: auto;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            min-width: 950px;
        }

        th {
            background: #1F2A44;
            color: #E8DCC8;
            padding: 14px;
            text-align: left;
            font-size: 13px;
        }

        td {
            padding: 15px 14px;
            border-bottom: 1px solid #E8DCC8;
            font-size: 14px;
            color: #333d52;
            vertical-align: top;
        }

        tbody tr:hover {
            background: #f7efe2;
        }

        tr:last-child td {
            border-bottom: none;
        }

        /* Status */

        .status {
            display: inline-block;
            padding: 6px 13px;
            border-radius: 20px;
            font-size: 12px;
            font-weight: bold;
            text-transform: capitalize;
        }

        .pending {
            background: #f3e3b8;
            color: #755d20;
        }

        .approved {
            background: #dfe8df;
            color: #315a3a;
        }

        .rejected {
            background: #ead7d3;
            color: #873f35;
        }

        /* Comment */

        .comment {
            color: #5d6575;
            font-size: 13px;
            line-height: 1.5;
            max-width: 220px;
        }

        .no-comment {
            color: #999;
            font-size: 13px;
        }

        /* Empty */

        .empty {
            text-align: center;
            padding: 40px;
            color: #697080;
        }

        /* Responsive */

        @media (max-width: 700px) {

            .navbar {
                padding: 16px 20px;
            }

            .nav-links {
                gap: 12px;
            }

            .container {
                margin-top: 25px;
            }

            .employee-card h1 {
                font-size: 24px;
            }
        }

    </style>

</head>

<body>


    <!-- Navbar -->

    <div class="navbar">

        <h2>
            Leave Management
        </h2>

        <div class="nav-links">

            <a href="{{ route('manager.dashboard') }}">
                Dashboard
            </a>

            <a href="{{ route('manager.employees') }}">
                Employees
            </a>

            <form method="POST"
                  action="{{ route('logout') }}"
                  style="margin: 0;">

                @csrf

                <button type="submit"
                        class="logout-btn">
                    Logout
                </button>

            </form>

        </div>

    </div>


    <!-- Main -->

    <div class="container">


        <a href="{{ route('manager.employees') }}"
           class="back-link">
            ← Back to Employees
        </a>


        <!-- Employee Information -->

        <div class="employee-card">

            <h1>
                {{ $user->name }}
            </h1>

            <div class="employee-email">
                {{ $user->email }}
            </div>


            <div class="employee-info">

                <div class="info-box">

                    <strong>
                        Employee ID:
                    </strong>

                    {{ $user->id }}

                </div>


                <div class="info-box">

                    <strong>
                        Total Leaves:
                    </strong>

                    {{ $leaves->count() }}

                </div>

            </div>

        </div>


        <!-- Leave History -->

        <div class="section">

            <h2>
                Leave History
            </h2>


            <div class="table-wrapper">

                @if($leaves->count() > 0)

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
                                    Manager Comment
                                </th>

                            </tr>

                        </thead>


                        <tbody>

                            @foreach($leaves as $leave)

                                <tr>

                                    <td>
                                        {{ $leave->leaveType->name }}
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
                                            {{ ucfirst($leave->status) }}
                                        </span>

                                    </td>

                                    <td>

                                        @if($leave->manager_comment)

                                            <div class="comment">
                                                {{ $leave->manager_comment }}
                                            </div>

                                        @else

                                            <span class="no-comment">
                                                No comment
                                            </span>

                                        @endif

                                    </td>

                                </tr>

                            @endforeach

                        </tbody>

                    </table>

                @else

                    <div class="empty">
                        This employee has no leave history.
                    </div>

                @endif

            </div>

        </div>

    </div>

</body>

</html>