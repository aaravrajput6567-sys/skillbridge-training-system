<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-white leading-tight">
            {{ __('My Certificates') }}
        </h2>
    </x-slot>

    <div class="py-12 relative z-10">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            @if($certificates->count() > 0)
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                    @foreach($certificates as $cert)
                        <div class="relative bg-gradient-to-br from-violet-900/60 to-purple-900/60 backdrop-blur-xl rounded-2xl border border-violet-400/30 p-6 shadow-[0_8px_32px_0_rgba(139,92,246,0.2)] overflow-hidden group hover:-translate-y-1 transition duration-300">

                            {{-- Decorative background glow --}}
                            <div class="absolute -top-6 -right-6 w-28 h-28 bg-violet-500/20 rounded-full blur-2xl pointer-events-none"></div>
                            <div class="absolute -bottom-6 -left-6 w-20 h-20 bg-fuchsia-500/20 rounded-full blur-2xl pointer-events-none"></div>

                            {{-- Badge --}}
                            <div class="flex items-center justify-between mb-4">
                                <span class="text-xs font-semibold bg-green-500/20 text-green-300 border border-green-400/30 px-3 py-1 rounded-full tracking-wide uppercase">
                                    ✓ Valid
                                </span>
                                <svg class="w-8 h-8 text-violet-300/70" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M9 12l2 2 4-4M7.835 4.697a3.42 3.42 0 001.946-.806 3.42 3.42 0 014.438 0 3.42 3.42 0 001.946.806 3.42 3.42 0 013.138 3.138 3.42 3.42 0 00.806 1.946 3.42 3.42 0 010 4.438 3.42 3.42 0 00-.806 1.946 3.42 3.42 0 01-3.138 3.138 3.42 3.42 0 00-1.946.806 3.42 3.42 0 01-4.438 0 3.42 3.42 0 00-1.946-.806 3.42 3.42 0 01-3.138-3.138 3.42 3.42 0 00-.806-1.946 3.42 3.42 0 010-4.438 3.42 3.42 0 00.806-1.946 3.42 3.42 0 013.138-3.138z"/>
                                </svg>
                            </div>

                            {{-- Title --}}
                            <h3 class="text-white font-bold text-lg mb-1 leading-snug">
                                {{ $cert->trainingProgram->title ?? 'Training Program' }}
                            </h3>

                            {{-- Category --}}
                            <p class="text-violet-300/70 text-sm mb-4">
                                {{ $cert->trainingProgram->category ?? '' }}
                            </p>

                            {{-- Divider --}}
                            <div class="border-t border-white/10 my-3"></div>

                            {{-- Details --}}
                            <div class="space-y-1.5 text-sm text-white/60">
                                <div class="flex items-center gap-2">
                                    <svg class="w-4 h-4 flex-shrink-0 text-violet-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 6H5a2 2 0 00-2 2v9a2 2 0 002 2h14a2 2 0 002-2V8a2 2 0 00-2-2h-5m-4 0V5a2 2 0 114 0v1m-4 0a2 2 0 104 0m-5 8a2 2 0 100-4 2 2 0 000 4zm0 0c1.306 0 2.417.835 2.83 2M9 14a3.001 3.001 0 00-2.83 2"/>
                                    </svg>
                                    <span class="font-mono tracking-wider text-white/80 text-xs">{{ $cert->certificate_number }}</span>
                                </div>
                                <div class="flex items-center gap-2">
                                    <svg class="w-4 h-4 flex-shrink-0 text-violet-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                                    </svg>
                                    <span>Issued: {{ $cert->issue_date->format('d M Y') }}</span>
                                </div>
                            </div>

                            {{-- Issued to --}}
                            <div class="mt-4 pt-3 border-t border-white/10 flex items-center gap-2">
                                <div class="w-7 h-7 rounded-full bg-violet-500/40 flex items-center justify-center text-white text-xs font-bold flex-shrink-0">
                                    {{ strtoupper(substr(auth()->user()->name, 0, 1)) }}
                                </div>
                                <span class="text-white/70 text-sm truncate">{{ auth()->user()->name }}</span>
                            </div>
                        </div>
                    @endforeach
                </div>

            @else
                {{-- Empty state --}}
                <div class="bg-white/10 dark:bg-slate-900/40 backdrop-blur-xl rounded-2xl border border-white/20 p-12 shadow-xl text-center">
                    <svg class="mx-auto h-14 w-14 text-white/30 mb-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M9 12l2 2 4-4M7.835 4.697a3.42 3.42 0 001.946-.806 3.42 3.42 0 014.438 0 3.42 3.42 0 001.946.806 3.42 3.42 0 013.138 3.138 3.42 3.42 0 00.806 1.946 3.42 3.42 0 010 4.438 3.42 3.42 0 00-.806 1.946 3.42 3.42 0 01-3.138 3.138 3.42 3.42 0 00-1.946.806 3.42 3.42 0 01-4.438 0 3.42 3.42 0 00-1.946-.806 3.42 3.42 0 01-3.138-3.138 3.42 3.42 0 00-.806-1.946 3.42 3.42 0 010-4.438 3.42 3.42 0 00.806-1.946 3.42 3.42 0 013.138-3.138z"/>
                    </svg>
                    <p class="text-xl font-semibold text-white/70 mb-2">No Certificates Yet</p>
                    <p class="text-white/50 mb-7 max-w-sm mx-auto">Complete your enrolled training programs to earn certificates that appear here.</p>
                    <a href="{{ route('employee.trainings.index') }}" class="inline-block bg-violet-600 hover:bg-violet-700 text-white font-bold py-2.5 px-7 rounded-full transition shadow-md">
                        Browse Trainings
                    </a>
                </div>
            @endif

        </div>
    </div>
</x-app-layout>
