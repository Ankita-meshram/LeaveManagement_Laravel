<?php

namespace App\Http\Controllers;

use App\Models\Leave;
use App\Models\LeaveType;
use Illuminate\Http\Request;
use Carbon\Carbon;

class LeaveController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Employee Dashboard
    |--------------------------------------------------------------------------
    */

    public function dashboard()
    {
        $userId = auth()->id();

        $totalLeaves = Leave::where('user_id', $userId)
            ->count();

        $pendingLeaves = Leave::where('user_id', $userId)
            ->where('status', 'pending')
            ->count();

        $approvedLeaves = Leave::where('user_id', $userId)
            ->where('status', 'approved')
            ->count();

        $rejectedLeaves = Leave::where('user_id', $userId)
            ->where('status', 'rejected')
            ->count();

        $recentLeaves = Leave::with('leaveType')
            ->where('user_id', $userId)
            ->latest()
            ->take(5)
            ->get();

        return view('employee.dashboard', compact(
            'totalLeaves',
            'pendingLeaves',
            'approvedLeaves',
            'rejectedLeaves',
            'recentLeaves'
        ));
    }


    /*
    |--------------------------------------------------------------------------
    | Apply Leave Page
    |--------------------------------------------------------------------------
    */

    public function create()
    {
        $leaveTypes = LeaveType::all();

        return view('employee.apply-leave', compact('leaveTypes'));
    }


    /*
    |--------------------------------------------------------------------------
    | Store Leave
    |--------------------------------------------------------------------------
    */

    public function store(Request $request)
    {
        $validated = $request->validate([
            'leave_type_id' => 'required|exists:leave_types,id',
            'start_date' => 'required|date',
            'end_date' => 'required|date|after_or_equal:start_date',
            'reason' => 'required|string|max:1000',
        ]);

        $startDate = Carbon::parse($validated['start_date']);
        $endDate = Carbon::parse($validated['end_date']);

        $days = $startDate->diffInDays($endDate) + 1;

        $leaveType = LeaveType::findOrFail(
            $validated['leave_type_id']
        );

        /*
        |--------------------------------------------------------------------------
        | Maximum Leave Days Check
        |--------------------------------------------------------------------------
        */

        if ($days > $leaveType->max_days) {

            return back()
                ->withInput()
                ->withErrors([
                    'end_date' =>
                        "Maximum {$leaveType->max_days} days are allowed for {$leaveType->name}."
                ]);
        }


        /*
        |--------------------------------------------------------------------------
        | Overlapping Leave Check
        |--------------------------------------------------------------------------
        */

        $overlap = Leave::where('user_id', auth()->id())
            ->whereIn('status', ['pending', 'approved'])
            ->whereDate(
                'start_date',
                '<=',
                $validated['end_date']
            )
            ->whereDate(
                'end_date',
                '>=',
                $validated['start_date']
            )
            ->exists();

        if ($overlap) {

            return back()
                ->withInput()
                ->withErrors([
                    'start_date' =>
                        'You already have a pending or approved leave during these dates.'
                ]);
        }


        /*
        |--------------------------------------------------------------------------
        | Create Leave
        |--------------------------------------------------------------------------
        */

        Leave::create([
            'user_id' => auth()->id(),
            'leave_type_id' => $validated['leave_type_id'],
            'start_date' => $validated['start_date'],
            'end_date' => $validated['end_date'],
            'days' => $days,
            'reason' => $validated['reason'],
            'status' => 'pending',
        ]);


        return redirect()
            ->route('employee.leaves')
            ->with(
                'success',
                'Leave application submitted successfully.'
            );
    }


    /*
    |--------------------------------------------------------------------------
    | My Leaves
    |--------------------------------------------------------------------------
    */

    public function index()
    {
        $leaves = Leave::with('leaveType')
            ->where('user_id', auth()->id())
            ->latest()
            ->get();

        return view(
            'employee.leaves',
            compact('leaves')
        );
    }


    /*
    |--------------------------------------------------------------------------
    | Cancel Leave
    |--------------------------------------------------------------------------
    */

    public function cancel(Leave $leave)
    {
        /*
        |--------------------------------------------------------------------------
        | Security Check
        |--------------------------------------------------------------------------
        */

        if ($leave->user_id !== auth()->id()) {
            abort(403);
        }


        /*
        |--------------------------------------------------------------------------
        | Only Pending Leave Can Be Cancelled
        |--------------------------------------------------------------------------
        */

        if ($leave->status !== 'pending') {

            return back()
                ->withErrors([
                    'cancel' =>
                        'Only pending leaves can be cancelled.'
                ]);
        }


        /*
        |--------------------------------------------------------------------------
        | Delete Leave
        |--------------------------------------------------------------------------
        */

        $leave->delete();

        return back()
            ->with(
                'success',
                'Leave cancelled successfully.'
            );
    }
}