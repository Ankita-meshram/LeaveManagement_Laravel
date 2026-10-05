<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Leave;
use App\Models\LeaveType;
use Illuminate\Http\Request;

class ManagerController extends Controller
{
    // Manager Dashboard
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

    // Employee List
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

    // Employee Details
    public function employeeDetails(User $user)
    {
        $leaves = Leave::with('leaveType')
            ->where('user_id', $user->id)
            ->latest()
            ->get();

        return view('manager.employee-details', compact(
            'user',
            'leaves'
        ));
    }

    // Leave Types
    public function leaveTypes()
    {
        $leaveTypes = LeaveType::latest()->get();

        return view('manager.leave-types', compact('leaveTypes'));
    }

    // Store Leave Type
    public function storeLeaveType(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'max_days' => 'required|integer|min:1',
        ]);

        LeaveType::create($validated);

        return back()->with(
            'success',
            'Leave type added successfully.'
        );
    }

    // Update Leave Type
    public function updateLeaveType(
        Request $request,
        LeaveType $leaveType
    ) {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'max_days' => 'required|integer|min:1',
        ]);

        $leaveType->update($validated);

        return back()->with(
            'success',
            'Leave type updated successfully.'
        );
    }

    // Delete Leave Type
    public function deleteLeaveType(LeaveType $leaveType)
    {
        $leaveType->delete();

        return back()->with(
            'success',
            'Leave type deleted successfully.'
        );
    }

    // Approve / Reject Leave
    public function updateLeaveStatus(
        Request $request,
        Leave $leave
    ) {
        $validated = $request->validate([
            'status' => 'required|in:approved,rejected',
            'manager_comment' => 'nullable|string|max:1000',
        ]);

        $leave->update([
            'status' => $validated['status'],
            'manager_comment' => $validated['manager_comment'] ?? null,
        ]);

        return back()->with(
            'success',
            'Leave status updated successfully.'
        );
    }
}