<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\TrainingProgram;
use App\Models\Enrollment;
use App\Models\Attendance;
use Illuminate\Http\Request;
use App\Http\Resources\TrainingProgramResource;
use App\Http\Resources\EmployeeResource;
use App\Http\Resources\EnrollmentResource;
use App\Http\Resources\AttendanceResource;

class ApiController extends Controller
{
    public function getTrainings()
    {
        return TrainingProgramResource::collection(TrainingProgram::all());
    }

    public function getTraining($id)
    {
        $training = TrainingProgram::findOrFail($id);
        return new TrainingProgramResource($training);
    }

    public function storeTraining(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'duration' => 'nullable|integer',
            'capacity' => 'nullable|integer',
        ]);
        $training = TrainingProgram::create($validated);
        return new TrainingProgramResource($training);
    }

    public function updateTraining(Request $request, $id)
    {
        $training = TrainingProgram::findOrFail($id);
        $training->update($request->all());
        return new TrainingProgramResource($training);
    }

    public function deleteTraining($id)
    {
        TrainingProgram::destroy($id);
        return response()->json(['message' => 'Deleted successfully']);
    }

    public function getEmployees()
    {
        return EmployeeResource::collection(User::where('role', 'employee')->get());
    }

    public function storeEmployee(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:8',
        ]);
        $validated['password'] = bcrypt($validated['password']);
        $validated['role'] = 'employee';
        $user = User::create($validated);
        return new EmployeeResource($user);
    }

    public function getEnrollments()
    {
        return EnrollmentResource::collection(Enrollment::all());
    }

    public function storeEnrollment(Request $request)
    {
        $enrollment = Enrollment::create($request->all());
        return new EnrollmentResource($enrollment);
    }

    public function getAttendance()
    {
        return AttendanceResource::collection(Attendance::all());
    }

    public function storeAttendance(Request $request)
    {
        $attendance = Attendance::create($request->all());
        return new AttendanceResource($attendance);
    }
}
