<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-white leading-tight">
            {{ __('Profile') }}
        </h2>
    </x-slot>

    <div class="py-12 relative z-10">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <div class="p-6 sm:p-8 bg-white/10 dark:bg-slate-900/40 backdrop-blur-xl shadow-[0_8px_32px_0_rgba(31,38,135,0.1)] sm:rounded-2xl border border-white/20 dark:border-white/10">
                <div class="max-w-xl">
                    @include('profile.partials.update-profile-information-form')
                </div>
            </div>

            <div class="p-6 sm:p-8 bg-white/10 dark:bg-slate-900/40 backdrop-blur-xl shadow-[0_8px_32px_0_rgba(31,38,135,0.1)] sm:rounded-2xl border border-white/20 dark:border-white/10">
                <div class="max-w-xl">
                    @include('profile.partials.update-password-form')
                </div>
            </div>

            <div class="p-6 sm:p-8 bg-white/10 dark:bg-slate-900/40 backdrop-blur-xl shadow-[0_8px_32px_0_rgba(31,38,135,0.1)] sm:rounded-2xl border border-white/20 dark:border-white/10">
                <div class="max-w-xl">
                    @include('profile.partials.delete-user-form')
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
