<x-admin-layout>
    <x-slot name="header">
        <h1 class="text-xl font-bold text-white">Employee Management</h1>
    </x-slot>

    <div class="bg-white/10 backdrop-blur-xl border border-white/20 rounded-2xl overflow-hidden">
        <div class="px-6 py-4 border-b border-white/10 flex items-center justify-between">
            <p class="text-white/50 text-sm">{{ $employees->total() }} registered employees</p>
        </div>
        <div class="overflow-x-auto">
            <table class="w-full text-sm">
                <thead>
                    <tr class="border-b border-white/10 text-white/40 uppercase tracking-widest text-xs">
                        <th class="px-6 py-4 text-left">#</th>
                        <th class="px-6 py-4 text-left">Name</th>
                        <th class="px-6 py-4 text-left">Email</th>
                        <th class="px-6 py-4 text-left">Joined</th>
                        <th class="px-6 py-4 text-left">Enrollments</th>
                        <th class="px-6 py-4 text-left">Actions</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-white/5">
                    @forelse($employees as $employee)
                        <tr class="hover:bg-white/5 transition">
                            <td class="px-6 py-4 text-white/40">{{ $employee->id }}</td>
                            <td class="px-6 py-4">
                                <div class="flex items-center gap-3">
                                    <div class="w-8 h-8 rounded-full bg-violet-600/60 flex items-center justify-center text-white text-xs font-bold flex-shrink-0">
                                        {{ strtoupper(substr($employee->name, 0, 1)) }}
                                    </div>
                                    <span class="text-white font-medium">{{ $employee->name }}</span>
                                </div>
                            </td>
                            <td class="px-6 py-4 text-white/60">{{ $employee->email }}</td>
                            <td class="px-6 py-4 text-white/50">{{ $employee->created_at->format('d M Y') }}</td>
                            <td class="px-6 py-4 text-white/60">{{ $employee->enrollments->count() }}</td>
                            <td class="px-6 py-4">
                                <form action="{{ route('admin.employees.destroy', $employee) }}" method="POST" onsubmit="return confirm('Remove this employee?')">
                                    @csrf @method('DELETE')
                                    <button type="submit" class="text-red-400 hover:text-red-200 text-xs font-medium transition">Remove</button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr><td colspan="6" class="px-6 py-10 text-center text-white/40">No employees registered yet.</td></tr>
                    @endforelse
                </tbody>
            </table>
        </div>
        @if($employees->hasPages())
            <div class="px-6 py-4 border-t border-white/10">{{ $employees->links() }}</div>
        @endif
    </div>
</x-admin-layout>
