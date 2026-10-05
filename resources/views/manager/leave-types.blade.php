<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">

    <meta name="viewport"
          content="width=device-width, initial-scale=1.0">

    <title>Leave Types - Manager</title>

    <style>

        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
        }

        body {
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

        .brand {
            font-size: 22px;
            font-weight: bold;
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
            color: #1F2A44;
            border: none;
            padding: 9px 16px;
            border-radius: 6px;
            font-weight: bold;
            cursor: pointer;
        }

        .logout-btn:hover {
            background: #b39552;
        }

        /* Main */

        .container {
            max-width: 1150px;
            margin: 40px auto;
            padding: 0 20px;
        }

        .page-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 25px;
        }

        .page-header h1 {
            font-size: 30px;
            color: #1F2A44;
        }

        .page-header p {
            margin-top: 7px;
            color: #697080;
        }

        /* Add */

        .add-btn {
            background: #1F2A44;
            color: white;
            text-decoration: none;
            padding: 12px 20px;
            border-radius: 7px;
            font-weight: bold;
            cursor: pointer;
            border: none;
        }

        .add-btn:hover {
            background: #C6A75E;
            color: #1F2A44;
        }

        /* Alerts */

        .success {
            background: #e2f0df;
            color: #285b32;
            padding: 13px 16px;
            border-radius: 7px;
            margin-bottom: 20px;
        }

        .error {
            background: #f6dddd;
            color: #8b2d2d;
            padding: 13px 16px;
            border-radius: 7px;
            margin-bottom: 20px;
        }

        .error ul {
            padding-left: 20px;
        }

        /* Card */

        .card {
            background: #FFFAF2;
            border-radius: 12px;
            padding: 25px;
            box-shadow: 0 5px 18px rgba(31, 42, 68, 0.12);
            border: 1px solid rgba(198, 167, 94, 0.45);
        }

        .card h2 {
            margin-bottom: 20px;
            color: #1F2A44;
        }

        /* Table */

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
            padding: 14px;
            text-align: left;
            font-size: 14px;
        }

        td {
            padding: 15px 14px;
            border-bottom: 1px solid #e1d7c7;
            color: #3e4655;
            vertical-align: top;
        }

        tr:last-child td {
            border-bottom: none;
        }

        .leave-name {
            font-weight: bold;
            color: #1F2A44;
        }

        .description {
            color: #697080;
            max-width: 300px;
            line-height: 1.5;
        }

        .days {
            display: inline-block;
            background: #f0e4c9;
            color: #6d5620;
            padding: 6px 10px;
            border-radius: 20px;
            font-weight: bold;
        }

        /* Actions */

        .actions {
            display: flex;
            gap: 8px;
            flex-wrap: wrap;
        }

        .edit-btn {
            background: #C6A75E;
            color: #1F2A44;
            border: none;
            padding: 8px 13px;
            border-radius: 6px;
            cursor: pointer;
            font-weight: bold;
        }

        .delete-btn {
            background: #f0d4d1;
            color: #8b3029;
            border: none;
            padding: 8px 13px;
            border-radius: 6px;
            cursor: pointer;
            font-weight: bold;
        }

        /* Form */

        .form-section {
            background: #f7f0e5;
            padding: 22px;
            border-radius: 10px;
            margin-bottom: 30px;
            border-left: 4px solid #C6A75E;
        }

        .form-section h2 {
            margin-bottom: 18px;
            color: #1F2A44;
        }

        .form-grid {
            display: grid;
            grid-template-columns: 1fr 180px;
            gap: 18px;
        }

        .form-group {
            margin-bottom: 16px;
        }

        .form-group.full {
            grid-column: 1 / -1;
        }

        label {
            display: block;
            margin-bottom: 7px;
            font-weight: bold;
            color: #1F2A44;
        }

        input,
        textarea {
            width: 100%;
            padding: 11px 13px;
            border: 1px solid #d2c4ad;
            border-radius: 6px;
            background: white;
            font-size: 14px;
            color: #1F2A44;
        }

        textarea {
            min-height: 90px;
            resize: vertical;
        }

        input:focus,
        textarea:focus {
            outline: none;
            border-color: #C6A75E;
        }

        .form-buttons {
            display: flex;
            gap: 10px;
            margin-top: 5px;
        }

        .save-btn {
            background: #1F2A44;
            color: white;
            border: none;
            padding: 11px 20px;
            border-radius: 6px;
            cursor: pointer;
            font-weight: bold;
        }

        .cancel-btn {
            background: #ddd3c3;
            color: #1F2A44;
            border: none;
            padding: 11px 20px;
            border-radius: 6px;
            cursor: pointer;
            font-weight: bold;
        }

        /* Empty */

        .empty {
            text-align: center;
            padding: 40px 20px;
            color: #697080;
        }

        /* Responsive */

        @media (max-width: 768px) {

            .navbar {
                padding: 15px 20px;
                flex-direction: column;
                gap: 15px;
            }

            .nav-links {
                flex-wrap: wrap;
                justify-content: center;
            }

            .page-header {
                flex-direction: column;
                align-items: flex-start;
                gap: 15px;
            }

            .form-grid {
                grid-template-columns: 1fr;
            }

        }

    </style>

</head>

<body>


<!-- Navbar -->

<nav class="navbar">

    <div class="brand">
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
              style="margin: 0;">

            @csrf

            <button type="submit"
                    class="logout-btn">

                Logout

            </button>

        </form>

    </div>

</nav>


<div class="container">


    <!-- Header -->

    <div class="page-header">

        <div>

            <h1>
                Leave Types
            </h1>

            <p>
                Manage available leave types and their maximum allowed days.
            </p>

        </div>

        <button class="add-btn"
                onclick="showAddForm()">

            + Add Leave Type

        </button>

    </div>


    <!-- Success -->

    @if(session('success'))

        <div class="success">
            {{ session('success') }}
        </div>

    @endif


    <!-- Errors -->

    @if($errors->any())

        <div class="error">

            <ul>

                @foreach($errors->all() as $error)

                    <li>
                        {{ $error }}
                    </li>

                @endforeach

            </ul>

        </div>

    @endif


    <!-- Add Form -->

    <div class="form-section"
         id="addForm"
         style="display: none;">

        <h2>
            Add Leave Type
        </h2>

        <form method="POST"
              action="{{ route('manager.leave-types.store') }}">

            @csrf

            <div class="form-grid">

                <div class="form-group">

                    <label>
                        Leave Type Name
                    </label>

                    <input
                        type="text"
                        name="name"
                        placeholder="Example: Sick Leave"
                        required
                    >

                </div>


                <div class="form-group">

                    <label>
                        Maximum Days
                    </label>

                    <input
                        type="number"
                        name="max_days"
                        min="1"
                        placeholder="Example: 5"
                        required
                    >

                </div>


                <div class="form-group full">

                    <label>
                        Description
                    </label>

                    <textarea
                        name="description"
                        placeholder="Enter leave type description..."
                    ></textarea>

                </div>

            </div>


            <div class="form-buttons">

                <button type="submit"
                        class="save-btn">

                    Save Leave Type

                </button>

                <button type="button"
                        class="cancel-btn"
                        onclick="hideAddForm()">

                    Cancel

                </button>

            </div>

        </form>

    </div>


    <!-- Table -->

    <div class="card">

        <h2>
            Available Leave Types
        </h2>

        <div class="table-wrapper">

            <table>

                <thead>

                    <tr>

                        <th>#</th>
                        <th>Leave Type</th>
                        <th>Maximum Days</th>
                        <th>Description</th>
                        <th>Actions</th>

                    </tr>

                </thead>

                <tbody>

                    @forelse($leaveTypes as $leaveType)

                        <tr>

                            <td>
                                {{ $loop->iteration }}
                            </td>

                            <td>

                                <div class="leave-name">

                                    {{ $leaveType->name }}

                                </div>

                            </td>

                            <td>

                                <span class="days">

                                    {{ $leaveType->max_days }} days

                                </span>

                            </td>

                            <td>

                                <div class="description">

                                    {{ $leaveType->description ?: 'No description available.' }}

                                </div>

                            </td>

                            <td>

                                <div class="actions">

                                    <button
                                        type="button"
                                        class="edit-btn"
                                        onclick="showEditForm(
                                            {{ $leaveType->id }},
                                            @js($leaveType->name),
                                            {{ $leaveType->max_days }},
                                            @js($leaveType->description)
                                        )"
                                    >

                                        Edit

                                    </button>


                                    <form
                                        method="POST"
                                        action="{{ route('manager.leave-types.delete', $leaveType) }}"
                                        onsubmit="return confirm('Are you sure you want to delete this leave type?');"
                                    >

                                        @csrf

                                        @method('DELETE')

                                        <button
                                            type="submit"
                                            class="delete-btn"
                                        >

                                            Delete

                                        </button>

                                    </form>

                                </div>

                            </td>

                        </tr>

                    @empty

                        <tr>

                            <td colspan="5">

                                <div class="empty">

                                    No leave types available.

                                </div>

                            </td>

                        </tr>

                    @endforelse

                </tbody>

            </table>

        </div>

    </div>


    <!-- Edit Form -->

    <div class="form-section"
         id="editForm"
         style="display: none; margin-top: 30px;">

        <h2>
            Edit Leave Type
        </h2>

        <form method="POST"
              id="editLeaveTypeForm">

            @csrf

            @method('PUT')

            <div class="form-grid">

                <div class="form-group">

                    <label>
                        Leave Type Name
                    </label>

                    <input
                        type="text"
                        id="editName"
                        name="name"
                        required
                    >

                </div>


                <div class="form-group">

                    <label>
                        Maximum Days
                    </label>

                    <input
                        type="number"
                        id="editMaxDays"
                        name="max_days"
                        min="1"
                        required
                    >

                </div>


                <div class="form-group full">

                    <label>
                        Description
                    </label>

                    <textarea
                        id="editDescription"
                        name="description"
                    ></textarea>

                </div>

            </div>


            <div class="form-buttons">

                <button type="submit"
                        class="save-btn">

                    Update Leave Type

                </button>

                <button type="button"
                        class="cancel-btn"
                        onclick="hideEditForm()">

                    Cancel

                </button>

            </div>

        </form>

    </div>

</div>


<script>

    function showAddForm() {

        document.getElementById('addForm').style.display = 'block';

        document.getElementById('editForm').style.display = 'none';

        window.scrollTo({
            top: document.getElementById('addForm').offsetTop - 20,
            behavior: 'smooth'
        });

    }


    function hideAddForm() {

        document.getElementById('addForm').style.display = 'none';

    }


    function showEditForm(id, name, maxDays, description) {

        document.getElementById('editForm').style.display = 'block';

        document.getElementById('addForm').style.display = 'none';

        document.getElementById('editName').value = name;

        document.getElementById('editMaxDays').value = maxDays;

        document.getElementById('editDescription').value =
            description || '';

        document.getElementById('editLeaveTypeForm').action =
            `/manager/leave-types/${id}`;

        window.scrollTo({
            top: document.getElementById('editForm').offsetTop - 20,
            behavior: 'smooth'
        });

    }


    function hideEditForm() {

        document.getElementById('editForm').style.display = 'none';

    }

</script>

</body>
</html>