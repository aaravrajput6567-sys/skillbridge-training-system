<x-admin-layout>
    <x-slot name="header">
        <div class="flex items-center justify-between w-full">
            <h1 class="text-xl font-bold text-white">Training Programs</h1>
            <a href="{{ route('admin.trainings.create') }}" class="flex items-center gap-2 bg-violet-600 hover:bg-violet-700 text-white text-sm font-semibold px-4 py-2 rounded-xl transition">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/></svg>
                Add Training
            </a>
        </div>
    </x-slot>

    <div class="bg-white/10 backdrop-blur-xl border border-white/20 rounded-2xl overflow-hidden">
        <div class="overflow-x-auto">
            <table class="w-full text-sm">
                <thead>
                    <tr class="border-b border-white/10 text-white/40 uppercase tracking-widest text-xs">
                        <th class="px-6 py-4 text-left">#</th>
                        <th class="px-6 py-4 text-left">Title</th>
                        <th class="px-6 py-4 text-left">Category</th>
                        <th class="px-6 py-4 text-left">Trainer</th>
                        <th class="px-6 py-4 text-left">Duration</th>
                        <th class="px-6 py-4 text-left">Status</th>
                        <th class="px-6 py-4 text-left">Enrolled</th>
                        <th class="px-6 py-4 text-left">Actions</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-white/5">
                    @forelse($trainings as $training)
                        <tr class="hover:bg-white/5 transition">
                            <td class="px-6 py-4 text-white/40">{{ $training->id }}</td>
                            <td class="px-6 py-4 text-white font-medium max-w-xs truncate">{{ $training->title }}</td>
                            <td class="px-6 py-4 text-white/70">{{ $training->category }}</td>
                            <td class="px-6 py-4 text-white/70">{{ $training->trainer_name }}</td>
                            <td class="px-6 py-4 text-white/70">{{ $training->duration }}h</td>
                            <td class="px-6 py-4">
                                @php
                                    $color = match($training->status) {
                                        'ongoing'   => 'bg-green-500/20 text-green-300 border-green-400/30',
                                        'completed' => 'bg-slate-500/20 text-slate-300 border-slate-400/30',
                                        default     => 'bg-violet-500/20 text-violet-300 border-violet-400/30',
                                    };
                                @endphp
                                <span class="px-2.5 py-1 rounded-full text-xs font-semibold border {{ $color }}">{{ ucfirst($training->status) }}</span>
                            </td>
                            <td class="px-6 py-4 text-white/70">{{ $training->enrollments_count }}</td>
                            <td class="px-6 py-4">
                                <div class="flex items-center gap-3">
                                    <a href="{{ route('admin.trainings.edit', $training) }}" class="text-violet-300 hover:text-white transition text-xs font-medium">Edit</a>
                                    <form action="{{ route('admin.trainings.destroy', $training) }}" method="POST" onsubmit="return confirm('Delete this training?')">
                                        @csrf @method('DELETE')
                                        <button type="submit" class="text-red-400 hover:text-red-200 transition text-xs font-medium">Delete</button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr><td colspan="8" class="px-6 py-10 text-center text-white/40">No training programs found.</td></tr>
                    @endforelse
                </tbody>
            </table>
        </div>
        @if($trainings->hasPages())
            <div class="px-6 py-4 border-t border-white/10">
                {{ $trainings->links() }}
            </div>
        @endif
    </div>
</x-admin-layout>
