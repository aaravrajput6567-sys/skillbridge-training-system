@props(['active'])

@php
$classes = ($active ?? false)
            ? 'inline-flex items-center px-1 pt-1 border-b-2 border-violet-700 dark:border-violet-400 text-sm font-bold leading-5 text-violet-900 dark:text-white focus:outline-none focus:border-violet-800 dark:focus:border-violet-300 transition duration-300 ease-in-out'
            : 'inline-flex items-center px-1 pt-1 border-b-2 border-transparent text-sm font-medium leading-5 text-white/70 dark:text-gray-400 hover:text-white dark:hover:text-gray-200 hover:border-violet-300 dark:hover:border-violet-600 focus:outline-none focus:text-white dark:focus:text-gray-200 focus:border-violet-300 dark:focus:border-violet-600 transition duration-300 ease-in-out';
@endphp

<a {{ $attributes->merge(['class' => $classes]) }}>
    {{ $slot }}
</a>
