<button {{ $attributes->merge(['type' => 'submit', 'class' => 'inline-flex items-center justify-center px-6 py-3 bg-white/20 hover:bg-white/30 border border-white/40 rounded-full font-bold text-xs text-white uppercase tracking-widest shadow-[0_8px_32px_0_rgba(31,38,135,0.2)] backdrop-blur-md transform hover:-translate-y-1 hover:shadow-2xl focus:outline-none focus:ring-2 focus:ring-white focus:ring-offset-2 transition duration-300']) }}>
    {{ $slot }}
</button>
