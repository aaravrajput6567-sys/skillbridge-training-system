<?php

namespace App\Http\Controllers;

use App\Models\Enrollment;
use App\Models\TrainingProgram;
use App\Models\User;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $user = auth()->user();

        if ($user->role === 'admin') {
            $stats = [
                'employees'   => User::where('role', 'employee')->count(),
                'trainings'   => TrainingProgram::count(),
                'enrollments' => Enrollment::count(),
                'pending'     => Enrollment::where('approval_status', 'pending')->count(),
            ];
            $recentEnrollments = Enrollment::with(['user', 'trainingProgram'])
                ->latest()
                ->take(5)
                ->get();
            return view('admin.dashboard', compact('stats', 'recentEnrollments'));
        } elseif ($user->role === 'trainer') {
            return view('trainer.dashboard');
        }

        // Employee dashboard — fetch upcoming approved enrollments
        $upcomingSchedule = Enrollment::where('user_id', $user->id)
            ->where('approval_status', 'approved')
            ->whereIn('completion_status', ['enrolled', 'in_progress'])
            ->with(['trainingProgram' => function ($q) {
                $q->whereIn('status', ['upcoming', 'ongoing'])
                  ->orderBy('start_date');
            }])
            ->get()
            ->filter(fn($e) => $e->trainingProgram !== null)
            ->sortBy(fn($e) => $e->trainingProgram->start_date)
            ->values();

        return view('employee.dashboard', compact('upcomingSchedule'));
    }
}
