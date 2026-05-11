<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-white leading-tight">
            {{ __('Browse Trainings') }}
        </h2>
    </x-slot>

    <div class="py-12 relative z-10">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white/10 dark:bg-slate-900/40 backdrop-blur-xl overflow-hidden shadow-xl sm:rounded-2xl border border-white/20 p-6">

                @php
                    $categoryStyles = [
                        'HR'            => ['gradient' => 'from-pink-500 to-rose-600',     'icon' => '<path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0z"/>'],
                        'Compliance'    => ['gradient' => 'from-amber-500 to-orange-600',  'icon' => '<path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"/>'],
                        'IT & Security' => ['gradient' => 'from-cyan-500 to-blue-600',    'icon' => '<path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"/>'],
                        'Soft Skills'   => ['gradient' => 'from-emerald-500 to-teal-600', 'icon' => '<path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z"/>'],
                        'Leadership'    => ['gradient' => 'from-violet-500 to-purple-600', 'icon' => '<path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M11.049 2.927c.3-.921 1.603-.921 1.902 0l1.519 4.674a1 1 0 00.95.69h4.915c.969 0 1.371 1.24.588 1.81l-3.976 2.888a1 1 0 00-.363 1.118l1.518 4.674c.3.922-.755 1.688-1.538 1.118l-3.976-2.888a1 1 0 00-1.176 0l-3.976 2.888c-.783.57-1.838-.197-1.538-1.118l1.518-4.674a1 1 0 00-.363-1.118l-3.976-2.888c-.784-.57-.38-1.81.588-1.81h4.914a1 1 0 00.951-.69l1.519-4.674z"/>'],
                        'Management'    => ['gradient' => 'from-indigo-500 to-blue-700',  'icon' => '<path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M9 17V7m0 10a2 2 0 01-2 2H5a2 2 0 01-2-2V7a2 2 0 012-2h2a2 2 0 012 2m0 10a2 2 0 002 2h2a2 2 0 002-2M9 7a2 2 0 012-2h2a2 2 0 012 2m0 10V7m0 10a2 2 0 002 2h2a2 2 0 002-2V7a2 2 0 00-2-2h-2a2 2 0 00-2 2"/>'],
                        'Technical'     => ['gradient' => 'from-slate-600 to-gray-800',   'icon' => '<path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M10 20l4-16m4 4l4 4-4 4M6 16l-4-4 4-4"/>'],
                        'Wellness'      => ['gradient' => 'from-lime-500 to-green-600',   'icon' => '<path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z"/>'],
                        'default'       => ['gradient' => 'from-violet-500 to-fuchsia-600','icon' => '<path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"/>'],
                    ];
                @endphp

                @if($trainings->count() > 0)
                    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                        @foreach($trainings as $training)
                            @php
                                $style = $categoryStyles[$training->category] ?? $categoryStyles['default'];
                            @endphp
                            <div class="bg-white/10 dark:bg-slate-800/60 rounded-2xl overflow-hidden border border-white/10 flex flex-col transition transform hover:-translate-y-1 hover:shadow-2xl hover:border-white/30 group">

                                {{-- Category Icon Banner --}}
                                <div class="relative h-48 bg-gradient-to-br {{ $style['gradient'] }} flex items-center justify-center overflow-hidden">
                                    <div class="absolute inset-0 opacity-10" style="background-image: radial-gradient(circle at 20% 50%, white 1px, transparent 1px), radial-gradient(circle at 80% 20%, white 1px, transparent 1px); background-size: 30px 30px;"></div>
                                    <svg class="w-14 h-14 text-white/80 drop-shadow-xl" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        {!! $style['icon'] !!}
                                    </svg>
                                    <div class="absolute bottom-3 right-3">
                                        <span class="text-xs font-semibold bg-black/25 text-white/90 backdrop-blur-sm px-2.5 py-1 rounded-full">{{ $training->category }}</span>
                                    </div>
                                </div>

                                <div class="p-5 flex flex-col flex-grow">
                                    <h3 class="text-lg font-bold text-white mb-2 group-hover:text-violet-200 transition">{{ $training->title }}</h3>
                                    <p class="text-white/60 text-sm mb-4 line-clamp-3">{{ $training->description }}</p>

                                    <div class="mt-auto space-y-2 text-sm text-white/70 mb-4">
                                        <div class="flex items-center gap-2">
                                            <svg class="w-4 h-4 text-violet-300 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                                            <span>{{ $training->duration }} hours</span>
                                        </div>
                                        <div class="flex items-center gap-2">
                                            <svg class="w-4 h-4 text-violet-300 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/></svg>
                                            <span>{{ $training->trainer_name ?? 'TBD' }}</span>
                                        </div>
                                    </div>

                                    <a href="{{ route('employee.trainings.show', $training->id) }}" class="block w-full text-center bg-white/10 hover:bg-violet-600 border border-white/20 hover:border-violet-500 text-white font-semibold py-2.5 px-4 rounded-xl shadow-md transition duration-300">
                                        View Details &rarr;
                                    </a>
                                </div>
                            </div>
                        @endforeach
                    </div>

                    <div class="mt-6">
                        {{ $trainings->links() }}
                    </div>
                @else
                    <div class="text-center py-10">
                        <svg class="mx-auto h-12 w-12 text-white/40 mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9.172 16.172a4 4 0 015.656 0M9 10h.01M15 10h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                        <p class="text-xl text-white/70">No upcoming or ongoing trainings available at the moment.</p>
                    </div>
                @endif

            </div>
        </div>
    </div>
</x-app-layout>
