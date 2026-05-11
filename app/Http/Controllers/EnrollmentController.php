<?php

namespace App\Http\Controllers;

use App\Models\Enrollment;
use Illuminate\Http\Request;
use App\Mail\EnrollmentConfirmation;
use Illuminate\Support\Facades\Mail;

class EnrollmentController extends Controller
{
    public function employeeIndex()
    {
        $enrollments = Enrollment::where('user_id', auth()->id())->with('trainingProgram')->paginate(10);
        return view('employee.enrollments.index', compact('enrollments'));
    }

    public function adminIndex()
    {
        $query = Enrollment::with(['user', 'trainingProgram'])->latest();

        if (request('status') && request('status') !== 'all') {
            $query->where('approval_status', request('status'));
        }

        $enrollments = $query->paginate(15);
        return view('admin.enrollments.index', compact('enrollments'));
    }

    public function store(Request $request, $training_id)
    {
        // Simple validation
        $exists = Enrollment::where('user_id', auth()->id())->where('training_program_id', $training_id)->exists();
        if ($exists) {
            return redirect()->back()->with('error', 'You are already enrolled in this training.');
        }

        $enrollment = Enrollment::create([
            'user_id' => auth()->id(),
            'training_program_id' => $training_id,
            'enrollment_date' => now(),
            'approval_status' => 'pending',
        ]);

        // Send Email — wrapped in try/catch in case SMTP is not configured
        try {
            Mail::to(auth()->user()->email)->send(new EnrollmentConfirmation($enrollment));
        } catch (\Exception $e) {
            // Mail failed silently — enrollment still succeeds
        }

        return redirect()->route('employee.enrollments.index')->with('success', 'Enrollment successful! You are now pending approval.');
    }

    public function approve(Request $request, Enrollment $enrollment)
    {
        $enrollment->update(['approval_status' => 'approved']);
        return redirect()->back()->with('success', 'Enrollment approved.');
    }

    public function reject(Enrollment $enrollment)
    {
        $enrollment->update(['approval_status' => 'rejected']);
        return redirect()->back()->with('success', 'Enrollment rejected.');
    }
}
