<div class="bg-gray-800 text-white w-64 space-y-6 py-7 px-2 absolute inset-y-0 left-0 transform -translate-x-full md:relative md:translate-x-0 transition duration-200 ease-in-out">
    <a href="{{ route('admin.dashboard' ?? 'dashboard') }}" class="text-white flex items-center space-x-2 px-4">
        <span class="text-2xl font-extrabold">Admin Panel</span>
    </a>

    <nav>
        <a href="{{ route('admin.employees.index') }}" class="block py-2.5 px-4 rounded transition duration-200 hover:bg-gray-700 hover:text-white">
            Manage Employees
        </a>
        <a href="{{ route('admin.trainings.index') }}" class="block py-2.5 px-4 rounded transition duration-200 hover:bg-gray-700 hover:text-white">
            Training Programs
        </a>
        <a href="{{ route('admin.enrollments.index') }}" class="block py-2.5 px-4 rounded transition duration-200 hover:bg-gray-700 hover:text-white">
            Enrollments
        </a>
        <a href="{{ route('admin.attendances.index') }}" class="block py-2.5 px-4 rounded transition duration-200 hover:bg-gray-700 hover:text-white">
            Attendance
        </a>
        <a href="{{ route('admin.feedback.reports') }}" class="block py-2.5 px-4 rounded transition duration-200 hover:bg-gray-700 hover:text-white">
            Feedback Reports
        </a>
        <a href="{{ route('admin.certificates.index') }}" class="block py-2.5 px-4 rounded transition duration-200 hover:bg-gray-700 hover:text-white">
            Certificates
        </a>
    </nav>
</div>
