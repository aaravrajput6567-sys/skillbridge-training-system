<x-app-layout>

    <div class="py-16 relative">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8 relative z-10">
            <div class="bg-white/20 dark:bg-slate-900/40 backdrop-blur-xl overflow-hidden shadow-[0_8px_32px_0_rgba(31,38,135,0.1)] sm:rounded-3xl p-10 md:p-16 border border-white/30 dark:border-white/10">
                <div class="mb-10 text-center">
                    <h3 class="text-4xl font-extrabold mb-4 text-white drop-shadow-md tracking-tight">Get in Touch</h3>
                    <p class="text-white/80 text-lg font-light">Have questions about our training programs? We're here to help.</p>
                </div>
                
                <form action="{{ route('contact.send') }}" method="POST" class="space-y-6">
                    @csrf
                    <div>
                        <x-input-label for="name" :value="__('Name')" class="text-white font-medium" />
                        <x-text-input id="name" class="block mt-2 w-full bg-white/20 dark:bg-slate-900/50 border-white/30 dark:border-white/20 focus:border-white focus:ring-white rounded-xl shadow-inner transition duration-300 text-white placeholder-white/50" type="text" name="name" required autofocus placeholder="John Doe" />
                    </div>
                    <div>
                        <x-input-label for="email" :value="__('Email')" class="text-white font-medium" />
                        <x-text-input id="email" class="block mt-2 w-full bg-white/20 dark:bg-slate-900/50 border-white/30 dark:border-white/20 focus:border-white focus:ring-white rounded-xl shadow-inner transition duration-300 text-white placeholder-white/50" type="email" name="email" required placeholder="john@example.com" />
                    </div>
                    <div>
                        <x-input-label for="message" :value="__('Message')" class="text-white font-medium" />
                        <textarea id="message" name="message" class="block mt-2 w-full bg-white/20 dark:bg-slate-900/50 border-white/30 dark:border-white/20 focus:border-white dark:focus:border-white focus:ring-white dark:focus:ring-white rounded-xl shadow-inner transition duration-300 text-white dark:text-white placeholder-white/50" rows="5" required placeholder="How can we help you?"></textarea>
                    </div>
                    <div class="flex items-center justify-end pt-4">
                        <button type="submit" class="bg-white/30 hover:bg-white/40 text-white border border-white/40 font-bold py-3 px-8 rounded-full shadow-[0_8px_32px_0_rgba(31,38,135,0.2)] transform hover:-translate-y-1 hover:shadow-2xl transition duration-300 backdrop-blur-md">
                            {{ __('Send Message') }}
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
