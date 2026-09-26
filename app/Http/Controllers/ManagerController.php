<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Leave;
use Illuminate\Http\Request;

class ManagerController extends Controller
{
    public function dashboard()
    {
        $totalEmployees = User::where('role', 'employee')->count();

        $pendingLeaves = Leave::where('status', 'pending')->count();

        $approvedLeaves = Leave::where('status', 'approved')->count();

        $rejectedLeaves = Leave::where('status', 'rejected')->count();

        $leaveRequests = Leave::with(['user', 'leaveType'])
            ->latest()
            ->get();

        return view('manager.dashboard', compact(
            'totalEmployees',
            'pendingLeaves',
            'approvedLeaves',
            'rejectedLeaves',
            'leaveRequests'
        ));
    }

    public function updateLeaveStatus(Request $request, Leave $leave)
    {
        $validated = $request->validate([
            'status' => 'required|in:approved,rejected',
            'manager_comment' => 'nullable|string|max:1000',
        ]);

        $leave->status = $validated['status'];
        $leave->manager_comment = $validated['manager_comment'] ?? null;
        $leave->save();

        return redirect()
            ->route('manager.dashboard')
            ->with(
                'success',
                'Leave request ' . $validated['status'] . ' successfully.'
            );
    }

    public function employees()
    {
    $employees = User::where('role', 'employee')
        ->withCount([
            'leaves',
            'leaves as pending_leaves_count' => function ($query) {
                $query->where('status', 'pending');
            },
            'leaves as approved_leaves_count' => function ($query) {
                $query->where('status', 'approved');
            },
            'leaves as rejected_leaves_count' => function ($query) {
                $query->where('status', 'rejected');
            },
        ])
        ->latest()
        ->get();

    return view('manager.employees', compact('employees'));
    }

    public function employeeDetails(User $user)
    {
    if ($user->role !== 'employee') {
        abort(404);
    }

    $leaves = Leave::with('leaveType')
        ->where('user_id', $user->id)
        ->latest()
        ->get();

    return view('manager.employee-details', compact(
        'user',
        'leaves'
    ));
    }

    public function leaveTypes()
{
    $leaveTypes = \App\Models\LeaveType::latest()->get();

    return view('manager.leave-types', compact('leaveTypes'));
}

public function storeLeaveType(Request $request)
{
    $validated = $request->validate([
        'name' => 'required|string|max:255',
        'max_days' => 'required|integer|min:1',
        'description' => 'nullable|string|max:1000',
    ]);

    \App\Models\LeaveType::create($validated);

    return redirect()
        ->route('manager.leave-types')
        ->with('success', 'Leave type added successfully.');
}

public function updateLeaveType(Request $request, \App\Models\LeaveType $leaveType)
{
    $validated = $request->validate([
        'name' => 'required|string|max:255',
        'max_days' => 'required|integer|min:1',
        'description' => 'nullable|string|max:1000',
    ]);

    $leaveType->update($validated);

    return redirect()
        ->route('manager.leave-types')
        ->with('success', 'Leave type updated successfully.');
}

public function deleteLeaveType(\App\Models\LeaveType $leaveType)
{
    if ($leaveType->leaves()->exists()) {
        return back()->withErrors([
            'delete' => 'This leave type is already used in leave requests and cannot be deleted.'
        ]);
    }

    $leaveType->delete();

    return redirect()
        ->route('manager.leave-types')
        ->with('success', 'Leave type deleted successfully.');
}
}