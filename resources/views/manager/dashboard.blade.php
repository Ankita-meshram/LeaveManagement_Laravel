<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Manager Dashboard</title>

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

        /* =========================
           NAVBAR
        ========================== */

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
            letter-spacing: 0.5px;
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
            font-weight: 500;
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
            transition: 0.2s;
        }

        .logout-btn:hover {
            background: #b39552;
        }


        /* =========================
           MAIN CONTAINER
        ========================== */

        .container {
            max-width: 1200px;
            margin: 40px auto;
            padding: 0 20px;
        }


        /* =========================
           SUCCESS MESSAGE
        ========================== */

        .success-message {
            background: #dfe8df;
            color: #315a3a;
            padding: 12px 16px;
            border-radius: 8px;
            margin-bottom: 20px;
            border-left: 4px solid #C6A75E;
        }


        /* =========================
           ERROR MESSAGE
        ========================== */

        .error-message {
            background: #ead7d3;
            color: #873f35;
            padding: 12px 16px;
            border-radius: 8px;
            margin-bottom: 20px;
            border-left: 4px solid #873f35;
        }


        /* =========================
           WELCOME
        ========================== */

        .welcome {
            margin-bottom: 30px;
        }

        .welcome h1 {
            margin: 0 0 8px;
            font-size: 30px;
            color: #1F2A44;
        }

        .welcome p {
            color: #5d6575;
            margin: 0;
            font-size: 15px;
        }


        /* =========================
           STATISTICS
        ========================== */

        .stats {
            display: grid;
            grid-template-columns: repeat(4, 1fr);
            gap: 20px;
            margin-bottom: 35px;
        }

        .stat-card {
            background: #fffaf2;
            border-radius: 14px;
            padding: 25px;
            border: 1px solid rgba(198, 167, 94, 0.45);
            box-shadow: 0 5px 15px rgba(31, 42, 68, 0.10);
            position: relative;
            overflow: hidden;
        }

        .stat-card::before {
            content: "";
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 5px;
            background: #C6A75E;
        }

        .stat-card h3 {
            margin: 0 0 12px;
            font-size: 14px;
            color: #5d6575;
            font-weight: 600;
        }

        .stat-number {
            font-size: 34px;
            font-weight: bold;
            color: #1F2A44;
        }


        /* =========================
           LEAVE REQUEST SECTION
        ========================== */

        .section {
            background: #fffaf2;
            border-radius: 14px;
            padding: 25px;
            box-shadow: 0 5px 15px rgba(31, 42, 68, 0.10);
            border: 1px solid rgba(198, 167, 94, 0.45);
        }

        .section-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 20px;
            padding-bottom: 15px;
            border-bottom: 1px solid #E8DCC8;
        }

        .section-header h2 {
            margin: 0;
            font-size: 22px;
            color: #1F2A44;
        }


        /* =========================
           TABLE
        ========================== */

        .table-wrapper {
            overflow-x: auto;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            min-width: 1000px;
        }

        th {
            background: #1F2A44;
            color: #E8DCC8;
            padding: 14px 13px;
            text-align: left;
            font-size: 13px;
            letter-spacing: 0.2px;
        }

        th:first-child {
            border-radius: 7px 0 0 7px;
        }

        th:last-child {
            border-radius: 0 7px 7px 0;
        }

        td {
            padding: 15px 13px;
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


        /* =========================
           STATUS
        ========================== */

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


        /* =========================
           ACTION AREA
        ========================== */

        .comment-box {
            width: 180px;
            padding: 8px;
            border: 1px solid #C6A75E;
            border-radius: 6px;
            margin-bottom: 8px;
            resize: vertical;
            font-family: Arial, sans-serif;
        }

        .approve-btn {
            background: #C6A75E;
            color: #1F2A44;
            border: none;
            padding: 7px 12px;
            border-radius: 6px;
            cursor: pointer;
            font-weight: bold;
        }

        .approve-btn:hover {
            background: #b39552;
        }

        .reject-btn {
            background: #1F2A44;
            color: #E8DCC8;
            border: none;
            padding: 7px 12px;
            border-radius: 6px;
            cursor: pointer;
            font-weight: bold;
        }

        .reject-btn:hover {
            background: #2b3857;
        }


        /* =========================
           COMMENT
        ========================== */

        .manager-comment {
            margin-top: 8px;
            font-size: 13px;
            color: #1F2A44;
            line-height: 1.5;
        }


        /* =========================
           EMPTY
        ========================== */

        .empty {
            text-align: center;
            padding: 40px;
            color: #697080;
        }


        /* =========================
           RESPONSIVE
        ========================== */

        @media (max-width: 900px) {

            .stats {
                grid-template-columns: repeat(2, 1fr);
            }

            .navbar {
                padding: 16px 20px;
            }

            .nav-links {
                gap: 12px;
            }
        }


        @media (max-width: 650px) {

            .stats {
                grid-template-columns: 1fr;
            }

            .navbar {
                flex-direction: column;
                gap: 15px;
            }

            .nav-links {
                flex-wrap: wrap;
                justify-content: center;
            }

            .welcome h1 {
                font-size: 25px;
            }

            .container {
                margin-top: 25px;
            }
        }

    </style>

</head>


<body>


    <!-- =========================
         NAVBAR
    ========================== -->

    <div class="navbar">

        <h2>Leave Management</h2>

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

                <button type="submit" class="logout-btn">
                    Logout
                </button>

            </form>

        </div>

    </div>


    <!-- =========================
         MAIN CONTAINER
    ========================== -->

    <div class="container">


        <!-- SUCCESS MESSAGE -->

        @if(session('success'))

            <div class="success-message">
                {{ session('success') }}
            </div>

        @endif


        <!-- ERROR MESSAGE -->

        @if($errors->any())

            <div class="error-message">

                @foreach($errors->all() as $error)

                    <div>{{ $error }}</div>

                @endforeach

            </div>

        @endif


        <!-- =========================
             WELCOME
        ========================== -->

        <div class="welcome">

            <h1>
                Welcome, {{ auth()->user()->name }}
            </h1>

            <p>
                You are logged in as Manager.
            </p>

        </div>


        <!-- =========================
             STATISTICS
        ========================== -->

        <div class="stats">


            <!-- Total Employees -->

            <div class="stat-card">

                <h3>
                    Total Employees
                </h3>

                <div class="stat-number">
                    {{ $totalEmployees }}
                </div>

            </div>


            <!-- Pending Leaves -->

            <div class="stat-card">

                <h3>
                    Pending Leaves
                </h3>

                <div class="stat-number">
                    {{ $pendingLeaves }}
                </div>

            </div>


            <!-- Approved Leaves -->

            <div class="stat-card">

                <h3>
                    Approved Leaves
                </h3>

                <div class="stat-number">
                    {{ $approvedLeaves }}
                </div>

            </div>


            <!-- Rejected Leaves -->

            <div class="stat-card">

                <h3>
                    Rejected Leaves
                </h3>

                <div class="stat-number">
                    {{ $rejectedLeaves }}
                </div>

            </div>

        </div>


        <!-- =========================
             LEAVE REQUESTS
        ========================== -->

        <div class="section">

            <div class="section-header">

                <h2>
                    Leave Requests
                </h2>

            </div>


            <div class="table-wrapper">


                @if($leaveRequests->count() > 0)

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


                            @foreach($leaveRequests as $leave)

                                <tr>


                                    <!-- Employee -->

                                    <td>
                                        {{ $leave->user->name }}
                                    </td>


                                    <!-- Leave Type -->

                                    <td>
                                        {{ $leave->leaveType->name }}
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
                                            {{ ucfirst($leave->status) }}
                                        </span>

                                    </td>


                                    <!-- Action -->

                                    <td>


                                        @if($leave->status === 'pending')


                                            <!-- APPROVE FORM -->

                                            <form method="POST"
                                                  action="{{ route('manager.leave.status', $leave->id) }}">

                                                @csrf

                                                <textarea
                                                    name="manager_comment"
                                                    class="comment-box"
                                                    placeholder="Manager comment..."
                                                    rows="2"></textarea>

                                                <input type="hidden"
                                                       name="status"
                                                       value="approved">

                                                <br>

                                                <button type="submit"
                                                        class="approve-btn">

                                                    Approve

                                                </button>

                                            </form>


                                            <!-- REJECT FORM -->

                                            <form method="POST"
                                                  action="{{ route('manager.leave.status', $leave->id) }}"
                                                  style="margin-top: 8px;">

                                                @csrf

                                                <input type="hidden"
                                                       name="status"
                                                       value="rejected">

                                                <input type="hidden"
                                                       name="manager_comment"
                                                       value="Leave request rejected by manager.">

                                                <button type="submit"
                                                        class="reject-btn">

                                                    Reject

                                                </button>

                                            </form>


                                        @else


                                            <span style="color: #697080; font-size: 13px;">
                                                No action required
                                            </span>


                                            @if($leave->manager_comment)

                                                <div class="manager-comment">

                                                    <strong>Comment:</strong><br>

                                                    {{ $leave->manager_comment }}

                                                </div>

                                            @endif


                                        @endif


                                    </td>


                                </tr>

                            @endforeach


                        </tbody>

                    </table>


                @else

                    <div class="empty">

                        No leave requests found.

                    </div>

                @endif


            </div>

        </div>


    </div>


</body>

</html>