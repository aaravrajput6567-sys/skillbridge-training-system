@props(['disabled' => false])

<input @disabled($disabled) {{ $attributes->merge(['class' => 'bg-white/20 dark:bg-slate-900/50 border-white/30 dark:border-white/20 focus:border-white focus:ring-white rounded-xl shadow-inner text-white placeholder-white/50 transition duration-300']) }}>
