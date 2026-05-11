<x-admin-layout>
    <x-slot name="header">
        <h1 class="text-xl font-bold text-white">Admin Dashboard</h1>
    </x-slot>

    {{-- Stats --}}
    <div class="grid grid-cols-2 lg:grid-cols-4 gap-6 mb-8">
        @php
            $cards = [
                ['label' => 'Total Employees',    'value' => $stats['employees'],   'gradient' => 'from-pink-500 to-rose-600',     'icon' => '<path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0z"/>'],
                ['label' => 'Training Programs',  'value' => $stats['trainings'],   'gradient' => 'from-violet-500 to-purple-600', 'icon' => '<path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"/>'],
                ['label' => 'Total Enrollments',  'value' => $stats['enrollments'], 'gradient' => 'from-cyan-500 to-blue-600',    'icon' => '<path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-6 9l2 2 4-4"/>'],
                ['label' => 'Pending Approvals',  'value' => $stats['pending'],     'gradient' => 'from-amber-500 to-orange-600', 'icon' => '<path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/>'],
            ];
        @endphp

        @foreach($cards as $card)
            <div class="bg-white/10 backdrop-blur-xl border border-white/20 rounded-2xl p-6 flex items-center gap-4 hover:-translate-y-1 transition duration-300">
                <div class="w-12 h-12 rounded-xl bg-gradient-to-br {{ $card['gradient'] }} flex items-center justify-center flex-shrink-0 shadow-lg">
                    <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        {!! $card['icon'] !!}
                    </svg>
                </div>
                <div>
                    <p class="text-white/60 text-xs font-medium uppercase tracking-widest">{{ $card['label'] }}</p>
                    <p class="text-3xl font-extrabold text-white">{{ $card['value'] }}</p>
                </div>
            </div>
        @endforeach
    </div>

    {{-- Quick Links --}}
    <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-8">
        <a href="{{ route('admin.trainings.create') }}" class="group bg-white/10 hover:bg-violet-600/40 border border-white/20 hover:border-violet-400/50 backdrop-blur-xl rounded-2xl p-6 flex items-center gap-4 transition duration-300">
            <div class="w-10 h-10 rounded-xl bg-violet-500/40 group-hover:bg-violet-500/60 flex items-center justify-center">
                <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/></svg>
            </div>
            <div>
                <p class="text-white font-semibold">Add Training</p>
                <p class="text-white/50 text-xs">Create new program</p>
            </div>
        </a>
        <a href="{{ route('admin.enrollments.index') }}" class="group bg-white/10 hover:bg-amber-600/30 border border-white/20 hover:border-amber-400/50 backdrop-blur-xl rounded-2xl p-6 flex items-center gap-4 transition duration-300">
            <div class="w-10 h-10 rounded-xl bg-amber-500/40 group-hover:bg-amber-500/60 flex items-center justify-center">
                <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
            </div>
            <div>
                <p class="text-white font-semibold">Review Enrollments</p>
                <p class="text-white/50 text-xs">Approve or reject</p>
            </div>
        </a>
        <a href="{{ route('admin.employees.index') }}" class="group bg-white/10 hover:bg-pink-600/30 border border-white/20 hover:border-pink-400/50 backdrop-blur-xl rounded-2xl p-6 flex items-center gap-4 transition duration-300">
            <div class="w-10 h-10 rounded-xl bg-pink-500/40 group-hover:bg-pink-500/60 flex items-center justify-center">
                <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0z"/></svg>
            </div>
            <div>
                <p class="text-white font-semibold">Manage Employees</p>
                <p class="text-white/50 text-xs">View all employees</p>
            </div>
        </a>
    </div>

    {{-- Recent Enrollments --}}
    <div class="bg-white/10 backdrop-blur-xl border border-white/20 rounded-2xl overflow-hidden">
        <div class="px-6 py-4 border-b border-white/10 flex items-center justify-between">
            <h2 class="text-white font-bold text-lg">Recent Enrollments</h2>
            <a href="{{ route('admin.enrollments.index') }}" class="text-violet-300 hover:text-white text-sm transition">View all &rarr;</a>
        </div>
        <div class="overflow-x-auto">
            <table class="w-full text-sm">
                <thead>
                    <tr class="border-b border-white/10 text-white/40 uppercase tracking-widest text-xs">
                        <th class="px-6 py-3 text-left">Employee</th>
                        <th class="px-6 py-3 text-left">Training</th>
                        <th class="px-6 py-3 text-left">Date</th>
                        <th class="px-6 py-3 text-left">Status</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-white/5">
                    @forelse($recentEnrollments as $enrollment)
                        <tr class="hover:bg-white/5 transition">
                            <td class="px-6 py-4 text-white font-medium">{{ $enrollment->user->name ?? '—' }}</td>
                            <td class="px-6 py-4 text-white/70">{{ $enrollment->trainingProgram->title ?? '—' }}</td>
                            <td class="px-6 py-4 text-white/50">{{ $enrollment->enrollment_date?->format('d M Y') ?? '—' }}</td>
                            <td class="px-6 py-4">
                                @php
                                    $color = match($enrollment->approval_status) {
                                        'approved' => 'bg-green-500/20 text-green-300 border-green-400/30',
                                        'rejected' => 'bg-red-500/20 text-red-300 border-red-400/30',
                                        default    => 'bg-amber-500/20 text-amber-300 border-amber-400/30',
                                    };
                                @endphp
                                <span class="px-2.5 py-1 rounded-full text-xs font-semibold border {{ $color }}">
                                    {{ ucfirst($enrollment->approval_status) }}
                                </span>
                            </td>
                        </tr>
                    @empty
                        <tr><td colspan="4" class="px-6 py-8 text-center text-white/40">No enrollments yet.</td></tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</x-admin-layout>
