<x-mail::message>
# Enrollment Confirmation

Hello {{ $enrollment->user->name }},

You have successfully enrolled in the training program: **{{ $enrollment->trainingProgram->title }}**.

**Start Date:** {{ $enrollment->trainingProgram->start_date }}
**End Date:** {{ $enrollment->trainingProgram->end_date }}

<x-mail::button :url="route('employee.enrollments.index')">
View My Enrollments
</x-mail::button>

Thanks,<br>
{{ config('app.name') }}
</x-mail::message>
