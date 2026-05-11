<x-admin-layout>
    <x-slot name="header">
        <h1 class="text-xl font-bold text-white">Enrollment Management</h1>
    </x-slot>

    {{-- Filter tabs --}}
    <div class="flex gap-2 mb-6">
        @foreach(['all' => 'All', 'pending' => 'Pending', 'approved' => 'Approved', 'rejected' => 'Rejected'] as $val => $label)
            <a href="?status={{ $val }}"
               class="px-4 py-2 rounded-xl text-sm font-medium transition border
                      {{ (request('status', 'all') == $val) ? 'bg-violet-600 border-violet-500 text-white' : 'bg-white/10 border-white/20 text-white/60 hover:text-white hover:bg-white/20' }}">
                {{ $label }}
            </a>
        @endforeach
    </div>

    <div class="bg-white/10 backdrop-blur-xl border border-white/20 rounded-2xl overflow-hidden">
        <div class="overflow-x-auto">
            <table class="w-full text-sm">
                <thead>
                    <tr class="border-b border-white/10 text-white/40 uppercase tracking-widest text-xs">
                        <th class="px-6 py-4 text-left">Employee</th>
                        <th class="px-6 py-4 text-left">Training</th>
                        <th class="px-6 py-4 text-left">Enrolled On</th>
                        <th class="px-6 py-4 text-left">Status</th>
                        <th class="px-6 py-4 text-left">Actions</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-white/5">
                    @forelse($enrollments as $enrollment)
                        <tr class="hover:bg-white/5 transition">
                            <td class="px-6 py-4">
                                <div class="font-medium text-white">{{ $enrollment->user->name ?? '—' }}</div>
                                <div class="text-white/40 text-xs">{{ $enrollment->user->email ?? '' }}</div>
                            </td>
                            <td class="px-6 py-4 text-white/80 max-w-xs">{{ $enrollment->trainingProgram->title ?? '—' }}</td>
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
                            <td class="px-6 py-4">
                                <div class="flex items-center gap-2">
                                    @if($enrollment->approval_status === 'pending')
                                        <form action="{{ route('admin.enrollments.approve', $enrollment) }}" method="POST">
                                            @csrf @method('PATCH')
                                            <button type="submit" class="px-3 py-1 bg-green-500/20 hover:bg-green-500/40 border border-green-400/30 text-green-300 rounded-lg text-xs font-medium transition">Approve</button>
                                        </form>
                                        <form action="{{ route('admin.enrollments.reject', $enrollment) }}" method="POST">
                                            @csrf @method('PATCH')
                                            <button type="submit" class="px-3 py-1 bg-red-500/20 hover:bg-red-500/40 border border-red-400/30 text-red-300 rounded-lg text-xs font-medium transition">Reject</button>
                                        </form>
                                    @else
                                        <span class="text-white/30 text-xs">—</span>
                                    @endif
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr><td colspan="5" class="px-6 py-10 text-center text-white/40">No enrollments found.</td></tr>
                    @endforelse
                </tbody>
            </table>
        </div>
        @if($enrollments->hasPages())
            <div class="px-6 py-4 border-t border-white/10">{{ $enrollments->links() }}</div>
        @endif
    </div>
</x-admin-layout>
