<?php

namespace App\Http\Controllers;

use App\Models\Enrollment;
use App\Models\TrainingProgram;
use App\Models\User;
use Illuminate\Http\Request;

class EmployeeController extends Controller
{
    public function index()
    {
        $employees = User::where('role', 'employee')->with('enrollments')->latest()->paginate(15);
        return view('admin.employees.index', compact('employees'));
    }

    public function destroy(User $employee)
    {
        $employee->delete();
        return redirect()->route('admin.employees.index')->with('success', 'Employee removed successfully.');
    }
}
