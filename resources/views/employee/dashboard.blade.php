<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-white leading-tight">
            {{ __('Employee Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12 relative z-10">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">

            {{-- Stats Cards --}}
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                <div class="bg-white/10 dark:bg-slate-900/40 backdrop-blur-xl rounded-2xl border border-white/20 dark:border-white/10 p-6 shadow-[0_8px_32px_0_rgba(31,38,135,0.1)] transform hover:-translate-y-1 transition duration-300 group">
                    <div class="flex items-center justify-between mb-4">
                        <div class="text-white/70 text-sm font-medium">My Enrollments</div>
                        <div class="w-10 h-10 bg-violet-500/30 rounded-xl flex items-center justify-center">
                            <svg class="w-5 h-5 text-violet-200" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2"></path></svg>
                        </div>
                    </div>
                    <div class="text-4xl font-extrabold text-white">{{ auth()->user()->enrollments()->count() }}</div>
                </div>

                <div class="bg-white/10 dark:bg-slate-900/40 backdrop-blur-xl rounded-2xl border border-white/20 dark:border-white/10 p-6 shadow-[0_8px_32px_0_rgba(31,38,135,0.1)] transform hover:-translate-y-1 transition duration-300 group">
                    <div class="flex items-center justify-between mb-4">
                        <div class="text-white/70 text-sm font-medium">Completed Trainings</div>
                        <div class="w-10 h-10 bg-fuchsia-500/30 rounded-xl flex items-center justify-center">
                            <svg class="w-5 h-5 text-fuchsia-200" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                        </div>
                    </div>
                    <div class="text-4xl font-extrabold text-white">{{ auth()->user()->enrollments()->where('completion_status', 'completed')->count() }}</div>
                </div>

                <div class="bg-white/10 dark:bg-slate-900/40 backdrop-blur-xl rounded-2xl border border-white/20 dark:border-white/10 p-6 shadow-[0_8px_32px_0_rgba(31,38,135,0.1)] transform hover:-translate-y-1 transition duration-300 group">
                    <div class="flex items-center justify-between mb-4">
                        <div class="text-white/70 text-sm font-medium">Certificates Earned</div>
                        <div class="w-10 h-10 bg-purple-500/30 rounded-xl flex items-center justify-center">
                            <svg class="w-5 h-5 text-purple-200" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4M7.835 4.697a3.42 3.42 0 001.946-.806 3.42 3.42 0 014.438 0 3.42 3.42 0 001.946.806 3.42 3.42 0 013.138 3.138 3.42 3.42 0 00.806 1.946 3.42 3.42 0 010 4.438 3.42 3.42 0 00-.806 1.946 3.42 3.42 0 01-3.138 3.138 3.42 3.42 0 00-1.946.806 3.42 3.42 0 01-4.438 0 3.42 3.42 0 00-1.946-.806 3.42 3.42 0 01-3.138-3.138 3.42 3.42 0 00-.806-1.946 3.42 3.42 0 010-4.438 3.42 3.42 0 00.806-1.946 3.42 3.42 0 013.138-3.138z"></path></svg>
                        </div>
                    </div>
                    <div class="text-4xl font-extrabold text-white">{{ auth()->user()->certificates()->where('status', 'valid')->count() }}</div>
                </div>
            </div>

            {{-- Quick Actions --}}
            <div class="bg-white/10 dark:bg-slate-900/40 backdrop-blur-xl rounded-2xl border border-white/20 dark:border-white/10 p-6 shadow-[0_8px_32px_0_rgba(31,38,135,0.1)]">
                <h3 class="text-white font-semibold text-sm uppercase tracking-widest mb-4 opacity-70">Quick Actions</h3>
                <div class="flex flex-wrap gap-4">
                    <a href="{{ route('employee.trainings.index') }}" class="flex items-center gap-2 bg-violet-600/60 hover:bg-violet-600/80 border border-violet-400/40 text-white font-semibold py-2.5 px-5 rounded-full shadow-md backdrop-blur-sm transition duration-300 hover:-translate-y-0.5">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path></svg>
                        Browse Trainings
                    </a>
                    <a href="{{ route('employee.enrollments.index') }}" class="flex items-center gap-2 bg-white/20 hover:bg-white/30 border border-white/30 text-white font-semibold py-2.5 px-5 rounded-full shadow-md backdrop-blur-sm transition duration-300 hover:-translate-y-0.5">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2"></path></svg>
                        My Enrollments
                    </a>
                    <a href="{{ route('employee.certificates.index') }}" class="flex items-center gap-2 bg-white/20 hover:bg-white/30 border border-white/30 text-white font-semibold py-2.5 px-5 rounded-full shadow-md backdrop-blur-sm transition duration-300 hover:-translate-y-0.5">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4M7.835 4.697a3.42 3.42 0 001.946-.806 3.42 3.42 0 014.438 0 3.42 3.42 0 001.946.806 3.42 3.42 0 013.138 3.138z"></path></svg>
                        My Certificates
                    </a>
                </div>
            </div>

            {{-- Upcoming Schedule --}}
            <div class="bg-white/10 dark:bg-slate-900/40 backdrop-blur-xl rounded-2xl border border-white/20 dark:border-white/10 p-6 shadow-[0_8px_32px_0_rgba(31,38,135,0.1)]">
                <h3 class="text-white font-bold text-lg mb-4">Upcoming Schedule</h3>

                @if($upcomingSchedule->isEmpty())
                    <div class="flex items-center gap-3 text-white/60">
                        <svg class="w-5 h-5 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path></svg>
                        <p>You have no upcoming training sessions.</p>
                    </div>
                @else
                    <div class="space-y-3">
                        @foreach($upcomingSchedule as $enrollment)
                            @php $training = $enrollment->trainingProgram; @endphp
                            <div class="flex items-center gap-4 bg-white/5 hover:bg-white/10 border border-white/10 rounded-xl p-4 transition duration-200">

                                {{-- Date block — show today for ongoing, start_date for upcoming --}}
                                @php $displayDate = $training->status === 'ongoing' ? now() : \Carbon\Carbon::parse($training->start_date); @endphp
                                <div class="flex-shrink-0 w-14 h-14 rounded-xl bg-violet-500/20 border border-violet-400/30 flex flex-col items-center justify-center text-center">
                                    <span class="text-violet-300 text-xs font-semibold uppercase leading-none">
                                        {{ $displayDate->format('M') }}
                                    </span>
                                    <span class="text-white font-extrabold text-xl leading-none">
                                        {{ $displayDate->format('d') }}
                                    </span>
                                </div>

                                {{-- Details --}}
                                <div class="flex-1 min-w-0">
                                    <div class="flex flex-wrap items-center gap-2 mb-1">
                                        <span class="text-white font-semibold">{{ $training->title }}</span>
                                        <span class="text-xs px-2 py-0.5 rounded-full font-medium {{ $training->status === 'ongoing' ? 'bg-green-500/20 text-green-300 border border-green-400/30' : 'bg-blue-500/20 text-blue-300 border border-blue-400/30' }}">
                                            {{ ucfirst($training->status) }}
                                        </span>
                                    </div>
                                    <div class="flex flex-wrap gap-x-4 gap-y-1 text-white/50 text-xs">
                                        <span class="flex items-center gap-1">
                                            <svg class="w-3.5 h-3.5 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/></svg>
                                            {{ $displayDate->format('d M Y') }}
                                            @if($training->end_date)
                                                &rarr; {{ \Carbon\Carbon::parse($training->end_date)->format('d M Y') }}
                                            @endif
                                        </span>
                                        @if($training->location)
                                            <span class="flex items-center gap-1">
                                                <svg class="w-3.5 h-3.5 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/></svg>
                                                {{ $training->location }}
                                            </span>
                                        @endif
                                        @if($training->trainer_name)
                                            <span class="flex items-center gap-1">
                                                <svg class="w-3.5 h-3.5 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/></svg>
                                                {{ $training->trainer_name }}
                                            </span>
                                        @endif
                                        @if($training->duration)
                                            <span class="flex items-center gap-1">
                                                <svg class="w-3.5 h-3.5 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                                                {{ $training->duration }}h
                                            </span>
                                        @endif
                                    </div>
                                </div>

                                {{-- View link --}}
                                <a href="{{ route('employee.trainings.show', $training) }}"
                                   class="flex-shrink-0 text-xs font-semibold text-violet-300 hover:text-white border border-violet-400/30 hover:border-white/40 px-3 py-1.5 rounded-full transition duration-200 whitespace-nowrap">
                                    View &rarr;
                                </a>
                            </div>
                        @endforeach
                    </div>
                @endif
            </div>

        </div>
    </div>
</x-app-layout>

