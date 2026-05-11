<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-white leading-tight">
            {{ __('Training Details') }}
        </h2>
    </x-slot>

    <div class="py-12 relative z-10">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white/10 dark:bg-slate-900/40 backdrop-blur-xl overflow-hidden shadow-xl sm:rounded-2xl border border-white/20">

                @php
                    $categoryStyles = [
                        'HR'            => ['gradient' => 'from-pink-500 to-rose-600',     'icon' => '<path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0z"/>'],
                        'Compliance'    => ['gradient' => 'from-amber-500 to-orange-600',  'icon' => '<path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"/>'],
                        'IT & Security' => ['gradient' => 'from-cyan-500 to-blue-600',    'icon' => '<path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"/>'],
                        'Soft Skills'   => ['gradient' => 'from-emerald-500 to-teal-600', 'icon' => '<path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.2" d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z"/>'],
                        'Leadership'    => ['gradient' => 'from-violet-500 to-purple-600', 'icon' => '<path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.2" d="M11.049 2.927c.3-.921 1.603-.921 1.902 0l1.519 4.674a1 1 0 00.95.69h4.915c.969 0 1.371 1.24.588 1.81l-3.976 2.888a1 1 0 00-.363 1.118l1.518 4.674c.3.922-.755 1.688-1.538 1.118l-3.976-2.888a1 1 0 00-1.176 0l-3.976 2.888c-.783.57-1.838-.197-1.538-1.118l1.518-4.674a1 1 0 00-.363-1.118l-3.976-2.888c-.784-.57-.38-1.81.588-1.81h4.914a1 1 0 00.951-.69l1.519-4.674z"/>'],
                        'Management'    => ['gradient' => 'from-indigo-500 to-blue-700',  'icon' => '<path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.2" d="M9 17V7m0 10a2 2 0 01-2 2H5a2 2 0 01-2-2V7a2 2 0 012-2h2a2 2 0 012 2m0 10a2 2 0 002 2h2a2 2 0 002-2M9 7a2 2 0 012-2h2a2 2 0 012 2m0 10V7m0 10a2 2 0 002 2h2a2 2 0 002-2V7a2 2 0 00-2-2h-2a2 2 0 00-2 2"/>'],
                        'Technical'     => ['gradient' => 'from-slate-600 to-gray-800',   'icon' => '<path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.2" d="M10 20l4-16m4 4l4 4-4 4M6 16l-4-4 4-4"/>'],
                        'Wellness'      => ['gradient' => 'from-lime-500 to-green-600',   'icon' => '<path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.2" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z"/>'],
                        'default'       => ['gradient' => 'from-violet-500 to-fuchsia-600','icon' => '<path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"/>'],
                    ];
                    $style = $categoryStyles[$training->category] ?? $categoryStyles['default'];
                @endphp

                {{-- Gradient Icon Banner --}}
                <div class="relative h-64 bg-gradient-to-br {{ $style['gradient'] }} flex flex-col items-center justify-center overflow-hidden">
                    <div class="absolute inset-0 opacity-10" style="background-image: radial-gradient(circle at 20% 50%, white 1px, transparent 1px), radial-gradient(circle at 80% 20%, white 1px, transparent 1px); background-size: 40px 40px;"></div>
                    <svg class="w-28 h-28 text-white/80 drop-shadow-2xl mb-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        {!! $style['icon'] !!}
                    </svg>
                    <span class="text-sm font-semibold bg-black/25 text-white/90 backdrop-blur-sm px-3 py-1 rounded-full uppercase tracking-widest">{{ $training->category }}</span>
                </div>

                <div class="p-8">
                    <h1 class="text-3xl font-extrabold text-white mb-4">{{ $training->title }}</h1>

                    <div class="flex flex-wrap gap-4 mb-6">
                        <span class="inline-flex items-center px-3 py-1 rounded-full text-sm font-medium bg-violet-600/50 text-violet-100 border border-violet-400/30">
                            <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                            {{ $training->duration }} hours
                        </span>
                        <span class="inline-flex items-center px-3 py-1 rounded-full text-sm font-medium bg-fuchsia-600/50 text-fuchsia-100 border border-fuchsia-400/30">
                            <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/></svg>
                            Trainer: {{ $training->trainer_name ?? 'TBD' }}
                        </span>
                        <span class="inline-flex items-center px-3 py-1 rounded-full text-sm font-medium bg-blue-600/50 text-blue-100 border border-blue-400/30">
                            <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                            Status: {{ ucfirst($training->status) }}
                        </span>
                    </div>

                    <div class="prose prose-invert max-w-none text-white/80 mb-8">
                        <h3 class="text-xl font-semibold text-white mb-2">Description</h3>
                        <p class="whitespace-pre-line leading-relaxed">{{ $training->description }}</p>
                    </div>

                    <div class="mt-8 pt-8 border-t border-white/10 flex justify-between items-center">
                        <a href="{{ route('employee.trainings.index') }}" class="text-violet-300 hover:text-white transition">
                            &larr; Back to Trainings
                        </a>

                        <form action="{{ route('employee.enroll', $training->id) }}" method="POST">
                            @csrf
                            <button type="submit" class="bg-violet-600 hover:bg-violet-700 border border-violet-400/40 text-white font-bold py-3 px-8 rounded-full shadow-lg transform hover:-translate-y-1 transition duration-300">
                                Enroll Now
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
