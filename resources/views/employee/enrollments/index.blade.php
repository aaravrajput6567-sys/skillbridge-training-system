<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-white leading-tight">
            {{ __('My Enrollments') }}
        </h2>
    </x-slot>

    <div class="py-12 relative z-10">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white/10 dark:bg-slate-900/40 backdrop-blur-xl overflow-hidden shadow-xl sm:rounded-2xl border border-white/20 p-6">
                
                @if($enrollments->count() > 0)
                    <div class="overflow-x-auto">
                        <table class="w-full text-left border-collapse">
                            <thead>
                                <tr class="text-white/80 border-b border-white/20">
                                    <th class="py-4 px-6 font-semibold">Training Program</th>
                                    <th class="py-4 px-6 font-semibold">Date Enrolled</th>
                                    <th class="py-4 px-6 font-semibold">Status</th>
                                    <th class="py-4 px-6 font-semibold">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($enrollments as $enrollment)
                                    <tr class="border-b border-white/10 hover:bg-white/5 transition">
                                        <td class="py-4 px-6 text-white font-medium">
                                            {{ $enrollment->trainingProgram->title }}
                                        </td>
                                        <td class="py-4 px-6 text-white/70">
                                            {{ \Carbon\Carbon::parse($enrollment->enrollment_date)->format('M d, Y') }}
                                        </td>
                                        <td class="py-4 px-6">
                                            @if($enrollment->approval_status == 'pending')
                                                <span class="px-3 py-1 rounded-full text-xs font-medium bg-yellow-500/20 text-yellow-300 border border-yellow-500/30">Pending Approval</span>
                                            @elseif($enrollment->approval_status == 'approved')
                                                <span class="px-3 py-1 rounded-full text-xs font-medium bg-green-500/20 text-green-300 border border-green-500/30">Approved</span>
                                            @else
                                                <span class="px-3 py-1 rounded-full text-xs font-medium bg-red-500/20 text-red-300 border border-red-500/30">{{ ucfirst($enrollment->approval_status) }}</span>
                                            @endif
                                        </td>
                                        <td class="py-4 px-6">
                                            <a href="{{ route('employee.trainings.show', $enrollment->training_program_id) }}" class="inline-flex items-center gap-1.5 text-violet-300 hover:text-white text-sm font-medium transition">
                                                View Details
                                                <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/></svg>
                                            </a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <div class="mt-6">
                        {{ $enrollments->links() }}
                    </div>
                @else
                    <div class="text-center py-10">
                        <svg class="mx-auto h-12 w-12 text-white/40 mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-6 9l2 2 4-4"></path></svg>
                        <p class="text-xl text-white/70 mb-4">You have not enrolled in any trainings yet.</p>
                        <a href="{{ route('employee.trainings.index') }}" class="inline-block bg-violet-600 hover:bg-violet-700 text-white font-bold py-2 px-6 rounded-full transition shadow-md">
                            Browse Trainings
                        </a>
                    </div>
                @endif

            </div>
        </div>
    </div>
</x-app-layout>
