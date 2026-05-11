<?php

namespace App\Http\Controllers;

use App\Models\Certificate;
use App\Models\Enrollment;
use App\Models\TrainingProgram;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class TrainingProgramController extends Controller
{
    public function index()
    {
        $trainings = TrainingProgram::withCount('enrollments')->latest()->paginate(10);
        return view('admin.trainings.index', compact('trainings'));
    }

    public function create()
    {
        return view('admin.trainings.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'title'        => 'required|string|max:255',
            'description'  => 'required|string',
            'category'     => 'required|string|max:100',
            'trainer_name' => 'required|string|max:100',
            'duration'     => 'required|integer|min:1',
            'capacity'     => 'required|integer|min:1',
            'start_date'   => 'required|date',
            'end_date'     => 'required|date|after_or_equal:start_date',
            'location'     => 'required|string|max:255',
            'status'       => 'required|in:upcoming,ongoing,completed',
        ]);

        TrainingProgram::create($data);
        return redirect()->route('admin.trainings.index')->with('success', 'Training program created successfully!');
    }

    public function edit(TrainingProgram $training)
    {
        return view('admin.trainings.edit', compact('training'));
    }

    public function update(Request $request, TrainingProgram $training)
    {
        $data = $request->validate([
            'title'        => 'required|string|max:255',
            'description'  => 'required|string',
            'category'     => 'required|string|max:100',
            'trainer_name' => 'required|string|max:100',
            'duration'     => 'required|integer|min:1',
            'capacity'     => 'required|integer|min:1',
            'start_date'   => 'required|date',
            'end_date'     => 'required|date|after_or_equal:start_date',
            'location'     => 'required|string|max:255',
            'status'       => 'required|in:upcoming,ongoing,completed',
        ]);

        $training->update($data);

        // When a training is marked completed, auto-complete enrollments & issue certificates
        if ($data['status'] === 'completed') {
            $approvedEnrollments = $training->enrollments()
                ->where('approval_status', 'approved')
                ->get();

            foreach ($approvedEnrollments as $enrollment) {
                // Mark enrollment as completed
                $enrollment->update(['completion_status' => 'completed']);

                // Issue a certificate if one doesn't already exist
                $alreadyHas = Certificate::where('user_id', $enrollment->user_id)
                    ->where('training_program_id', $training->id)
                    ->exists();

                if (!$alreadyHas) {
                    Certificate::create([
                        'user_id'             => $enrollment->user_id,
                        'training_program_id' => $training->id,
                        'certificate_number'  => 'CERT-' . strtoupper(Str::random(8)),
                        'issue_date'          => now()->toDateString(),
                        'status'              => 'valid',
                    ]);
                }
            }
        }

        return redirect()->route('admin.trainings.index')->with('success', 'Training program updated successfully!');
    }

    public function destroy(TrainingProgram $training)
    {
        $training->delete();
        return redirect()->route('admin.trainings.index')->with('success', 'Training program deleted.');
    }

    public function employeeIndex()
    {
        $trainings = TrainingProgram::whereIn('status', ['upcoming', 'ongoing'])->paginate(12);
        return view('employee.trainings.index', compact('trainings'));
    }

    public function employeeShow(TrainingProgram $training)
    {
        return view('employee.trainings.show', compact('training'));
    }
}
