<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\TrainingProgramController;
use App\Http\Controllers\EnrollmentController;
use App\Http\Controllers\AttendanceController;
use App\Http\Controllers\FeedbackController;
use App\Http\Controllers\CertificateController;
use App\Http\Controllers\MaterialController;
use Illuminate\Support\Facades\Route;

// Localization route
Route::get('/lang/{locale}', function ($locale) {
    session()->put('locale', $locale);
    $cookie = cookie('locale', $locale, 60 * 24 * 365); // Store for 1 year
    return redirect()->back()->withCookie($cookie);
})->name('lang.switch');

// Basic Routes
Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/about', [HomeController::class, 'about'])->name('about');
Route::get('/contact', [HomeController::class, 'contact'])->name('contact');
Route::post('/contact', [HomeController::class, 'sendContact'])->name('contact.send');

// Authenticated User Routes (Dashboard & Profile)
Route::middleware('auth')->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// Admin Protected Routes
Route::middleware(['auth', 'admin'])->prefix('admin')->name('admin.')->group(function () {
    Route::resource('employees', EmployeeController::class)->only(['index', 'destroy']);
    Route::resource('trainings', TrainingProgramController::class);
    Route::get('/enrollments', [EnrollmentController::class, 'adminIndex'])->name('enrollments.index');
    Route::patch('/enrollments/{enrollment}/approve', [EnrollmentController::class, 'approve'])->name('enrollments.approve');
    Route::patch('/enrollments/{enrollment}/reject', [EnrollmentController::class, 'reject'])->name('enrollments.reject');
    Route::resource('attendances', AttendanceController::class)->except(['create', 'store', 'show', 'destroy']);
    Route::get('/feedback-reports', [FeedbackController::class, 'reports'])->name('feedback.reports');
    Route::resource('certificates', CertificateController::class)->only(['index', 'create', 'store', 'destroy']);
});

// Employee Protected Routes
Route::middleware(['auth', 'employee'])->prefix('employee')->name('employee.')->group(function () {
    Route::get('/trainings', [TrainingProgramController::class, 'employeeIndex'])->name('trainings.index');
    
    Route::get('/trainings/{training}', [TrainingProgramController::class, 'employeeShow'])
        ->name('trainings.show');
        
    Route::post('/trainings/{id}/enroll', [EnrollmentController::class, 'store'])->name('enroll');
    Route::get('/my-enrollments', [EnrollmentController::class, 'employeeIndex'])->name('enrollments.index');
    Route::resource('feedback', FeedbackController::class)->only(['create', 'store', 'index']);
    Route::get('/my-certificates', [CertificateController::class, 'employeeIndex'])->name('certificates.index');
    Route::get('/materials/{id}/download', [MaterialController::class, 'download'])->name('materials.download');
});

// Trainer Protected Routes
Route::middleware(['auth', 'trainer'])->prefix('trainer')->name('trainer.')->group(function () {
    Route::get('/assigned-trainings', [TrainingProgramController::class, 'trainerIndex'])->name('trainings.index');
    Route::resource('attendances', AttendanceController::class)->only(['index', 'store', 'update']);
    Route::resource('materials', MaterialController::class)->only(['store', 'destroy']);
});

require __DIR__.'/auth.php';
