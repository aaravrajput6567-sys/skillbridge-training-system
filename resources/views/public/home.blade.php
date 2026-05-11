<x-app-layout>
    <div class="py-24 relative overflow-hidden">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 relative z-10">
            <!-- Decorative background blobs -->
            <div class="absolute top-10 left-20 w-96 h-96 bg-fuchsia-400 rounded-full mix-blend-screen filter blur-3xl opacity-50 animate-blob dark:bg-fuchsia-900 dark:opacity-30"></div>
            <div class="absolute top-20 right-20 w-96 h-96 bg-purple-300 rounded-full mix-blend-screen filter blur-3xl opacity-50 animate-blob animation-delay-2000 dark:bg-purple-800 dark:opacity-30"></div>
            <div class="absolute -bottom-20 left-1/3 w-96 h-96 bg-violet-400 rounded-full mix-blend-screen filter blur-3xl opacity-50 animate-blob animation-delay-4000 dark:bg-violet-900 dark:opacity-30"></div>

            <div class="text-center mb-20 relative z-10 pt-10">
                <h1 class="text-6xl md:text-8xl font-extrabold mb-6 text-white drop-shadow-lg leading-tight tracking-tight">
                    Empower Your Team
                </h1>
                <p class="max-w-3xl mx-auto mb-10 text-2xl text-white/90 font-light leading-relaxed drop-shadow">
                    Manage, track, and optimize your organization's training programs seamlessly. Elevate employee skills and drive success with our intelligent platform.
                </p>
                <div class="flex justify-center gap-6">
                    <a href="{{ route('register') }}" class="bg-white/20 hover:bg-white/30 border border-white/40 text-white font-bold py-4 px-10 rounded-full shadow-[0_8px_32px_0_rgba(31,38,135,0.37)] backdrop-blur-md transform hover:scale-105 transition duration-300 text-lg">
                        Get Started
                    </a>
                    <a href="{{ route('about') }}" class="bg-violet-600/50 hover:bg-violet-600/70 border border-violet-400/50 text-white font-semibold py-4 px-10 rounded-full shadow-[0_8px_32px_0_rgba(31,38,135,0.37)] backdrop-blur-md transform hover:-translate-y-1 transition duration-300 text-lg">
                        Learn More
                    </a>
                </div>
            </div>
            
            <div class="mt-20 grid grid-cols-1 md:grid-cols-3 gap-10 relative z-10">
                <!-- Card 1 -->
                <div class="bg-white/20 dark:bg-slate-900/40 backdrop-blur-xl shadow-[0_8px_32px_0_rgba(31,38,135,0.1)] rounded-3xl p-10 border border-white/30 dark:border-white/10 transform hover:-translate-y-3 hover:shadow-2xl transition duration-500 group">
                    <div class="w-16 h-16 bg-white/30 rounded-2xl flex items-center justify-center mb-8 group-hover:scale-110 group-hover:rotate-3 transition duration-500 backdrop-blur-md shadow-inner">
                        <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 13.255A23.931 23.931 0 0112 15c-3.183 0-6.22-.62-9-1.745M16 6V4a2 2 0 00-2-2h-4a2 2 0 00-2 2v2m4 6h.01M5 20h14a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path></svg>
                    </div>
                    <h3 class="text-3xl font-bold mb-4 text-white group-hover:text-fuchsia-200 transition">Discover Courses</h3>
                    <p class="text-white/80 leading-relaxed text-lg font-light">Browse a wide variety of training programs tailored to your organizational needs. From technical skills to leadership.</p>
                </div>
                <!-- Card 2 -->
                <div class="bg-white/20 dark:bg-slate-900/40 backdrop-blur-xl shadow-[0_8px_32px_0_rgba(31,38,135,0.1)] rounded-3xl p-10 border border-white/30 dark:border-white/10 transform hover:-translate-y-3 hover:shadow-2xl transition duration-500 group">
                    <div class="w-16 h-16 bg-white/30 rounded-2xl flex items-center justify-center mb-8 group-hover:scale-110 group-hover:rotate-3 transition duration-500 backdrop-blur-md shadow-inner">
                        <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z"></path></svg>
                    </div>
                    <h3 class="text-3xl font-bold mb-4 text-white group-hover:text-purple-200 transition">Track Progress</h3>
                    <p class="text-white/80 leading-relaxed text-lg font-light">Monitor attendance, performance, and feedback in real-time. Gain actionable insights into employee development.</p>
                </div>
                <!-- Card 3 -->
                <div class="bg-white/20 dark:bg-slate-900/40 backdrop-blur-xl shadow-[0_8px_32px_0_rgba(31,38,135,0.1)] rounded-3xl p-10 border border-white/30 dark:border-white/10 transform hover:-translate-y-3 hover:shadow-2xl transition duration-500 group">
                    <div class="w-16 h-16 bg-white/30 rounded-2xl flex items-center justify-center mb-8 group-hover:scale-110 group-hover:-rotate-3 transition duration-500 backdrop-blur-md shadow-inner">
                        <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4M7.835 4.697a3.42 3.42 0 001.946-.806 3.42 3.42 0 014.438 0 3.42 3.42 0 001.946.806 3.42 3.42 0 013.138 3.138 3.42 3.42 0 00.806 1.946 3.42 3.42 0 010 4.438 3.42 3.42 0 00-.806 1.946 3.42 3.42 0 01-3.138 3.138 3.42 3.42 0 00-1.946.806 3.42 3.42 0 01-4.438 0 3.42 3.42 0 00-1.946-.806 3.42 3.42 0 01-3.138-3.138 3.42 3.42 0 00-.806-1.946 3.42 3.42 0 010-4.438 3.42 3.42 0 00.806-1.946 3.42 3.42 0 013.138-3.138z"></path></svg>
                    </div>
                    <h3 class="text-3xl font-bold mb-4 text-white group-hover:text-violet-200 transition">Earn Certificates</h3>
                    <p class="text-white/80 leading-relaxed text-lg font-light">Reward successful completions with verifiable digital certificates. Boost morale and maintain a permanent record of achievement.</p>
                </div>
            </div>
        </div>
    </div>

    <style>
        .animate-blob {
            animation: blob 7s infinite;
        }
        .animation-delay-2000 {
            animation-delay: 2s;
        }
        .animation-delay-4000 {
            animation-delay: 4s;
        }
        @keyframes blob {
            0% { transform: translate(0px, 0px) scale(1); }
            33% { transform: translate(30px, -50px) scale(1.1); }
            66% { transform: translate(-20px, 20px) scale(0.9); }
            100% { transform: translate(0px, 0px) scale(1); }
        }
    </style>
</x-app-layout>
