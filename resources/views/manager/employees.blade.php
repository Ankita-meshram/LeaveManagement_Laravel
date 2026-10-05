<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">

    <meta name="viewport"
          content="width=device-width, initial-scale=1.0">

    <title>Employees - Manager</title>

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

        .logout-btn:hover {
            background: #b39552;
        }

        /* Container */

        .container {
            max-width: 1200px;
            margin: 40px auto;
            padding: 0 20px;
        }

        .page-header {
            margin-bottom: 30px;
        }

        .page-header h1 {
            margin: 0 0 8px;
            font-size: 30px;
            color: #1F2A44;
        }

        .page-header p {
            margin: 0;
            color: #5d6575;
        }

        /* Card */

        .section {
            background: #fffaf2;
            border-radius: 14px;
            padding: 25px;
            box-shadow: 0 5px 15px rgba(31, 42, 68, 0.10);
            border: 1px solid rgba(198, 167, 94, 0.45);
        }

        .section-header {
            margin-bottom: 20px;
            padding-bottom: 15px;
            border-bottom: 1px solid #E8DCC8;
        }

        .section-header h2 {
            margin: 0;
            font-size: 22px;
            color: #1F2A44;
        }

        /* Table */

        .table-wrapper {
            overflow-x: auto;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            min-width: 850px;
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
        }

        tbody tr:hover {
            background: #f7efe2;
        }

        tr:last-child td {
            border-bottom: none;
        }

        /* Employee */

        .employee-name {
            font-weight: bold;
            color: #1F2A44;
        }

        .employee-email {
            color: #697080;
            font-size: 13px;
            margin-top: 4px;
        }

        /* Count */

        .count {
            display: inline-block;
            min-width: 30px;
            text-align: center;
            padding: 5px 9px;
            border-radius: 15px;
            font-weight: bold;
            font-size: 12px;
        }

        .total {
            background: #E8DCC8;
            color: #1F2A44;
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

        /* View Details */

        .view-btn {
            display: inline-block;
            background: #C6A75E;
            color: #1F2A44;
            text-decoration: none;
            padding: 8px 14px;
            border-radius: 6px;
            font-size: 13px;
            font-weight: bold;
        }

        .view-btn:hover {
            background: #b39552;
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
                flex-wrap: wrap;
                justify-content: center;
            }

            .container {
                margin-top: 25px;
            }

            .page-header h1 {
                font-size: 25px;
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

        <a href="{{ route('manager.leave-types') }}">
            Leave Types
        </a>

        <a href="{{ route('profile.edit') }}">
            Profile
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

    <div class="page-header">

        <h1>
            Employees
        </h1>

        <p>
            View employee information and their leave summary.
        </p>

    </div>


    <div class="section">

        <div class="section-header">

            <h2>
                All Employees
            </h2>

        </div>


        <div class="table-wrapper">

            @if($employees->count() > 0)

                <table>

                    <thead>

                        <tr>

                            <th>
                                Employee
                            </th>

                            <th>
                                Total Leaves
                            </th>

                            <th>
                                Pending
                            </th>

                            <th>
                                Approved
                            </th>

                            <th>
                                Rejected
                            </th>

                            <th>
                                Action
                            </th>

                        </tr>

                    </thead>


                    <tbody>

                        @foreach($employees as $employee)

                            <tr>

                                <td>

                                    <div class="employee-name">
                                        {{ $employee->name }}
                                    </div>

                                    <div class="employee-email">
                                        {{ $employee->email }}
                                    </div>

                                </td>


                                <td>

                                    <span class="count total">
                                        {{ $employee->leaves_count ?? 0 }}
                                    </span>

                                </td>


                                <td>

                                    <span class="count pending">
                                        {{ $employee->pending_leaves_count ?? 0 }}
                                    </span>

                                </td>


                                <td>

                                    <span class="count approved">
                                        {{ $employee->approved_leaves_count ?? 0 }}
                                    </span>

                                </td>


                                <td>

                                    <span class="count rejected">
                                        {{ $employee->rejected_leaves_count ?? 0 }}
                                    </span>

                                </td>


                                <td>

                                    <a href="{{ route('manager.employee.details', $employee->id) }}"
                                       class="view-btn">

                                        View Details

                                    </a>

                                </td>

                            </tr>

                        @endforeach

                    </tbody>

                </table>

            @else

                <div class="empty">

                    No employees found.

                </div>

            @endif

        </div>

    </div>

</div>

</body>
</html>