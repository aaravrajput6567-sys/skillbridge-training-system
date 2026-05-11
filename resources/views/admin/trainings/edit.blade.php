<x-admin-layout>
    <x-slot name="header">
        <div class="flex items-center gap-3">
            <a href="{{ route('admin.trainings.index') }}" class="text-white/50 hover:text-white transition">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"/></svg>
            </a>
            <h1 class="text-xl font-bold text-white">Edit Training</h1>
        </div>
    </x-slot>

    <div class="max-w-3xl mx-auto">
        <div class="bg-white/10 backdrop-blur-xl border border-white/20 rounded-2xl p-8">
            <form action="{{ route('admin.trainings.update', $training) }}" method="POST" class="space-y-6">
                @csrf @method('PUT')

                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div class="md:col-span-2">
                        <label class="block text-white/80 text-sm font-medium mb-1.5">Title <span class="text-red-400">*</span></label>
                        <input type="text" name="title" value="{{ old('title', $training->title) }}" required
                            class="w-full bg-white/10 border border-white/20 text-white placeholder-white/30 rounded-xl px-4 py-2.5 focus:outline-none focus:ring-2 focus:ring-violet-500 transition">
                        @error('title')<p class="text-red-400 text-xs mt-1">{{ $message }}</p>@enderror
                    </div>

                    <div class="md:col-span-2">
                        <label class="block text-white/80 text-sm font-medium mb-1.5">Description <span class="text-red-400">*</span></label>
                        <textarea name="description" rows="4" required
                            class="w-full bg-white/10 border border-white/20 text-white placeholder-white/30 rounded-xl px-4 py-2.5 focus:outline-none focus:ring-2 focus:ring-violet-500 transition">{{ old('description', $training->description) }}</textarea>
                        @error('description')<p class="text-red-400 text-xs mt-1">{{ $message }}</p>@enderror
                    </div>

                    <div>
                        <label class="block text-white/80 text-sm font-medium mb-1.5">Category</label>
                        <select name="category" required class="w-full bg-white/10 border border-white/20 text-white rounded-xl px-4 py-2.5 focus:outline-none focus:ring-2 focus:ring-violet-500 transition">
                            @foreach(['HR','Compliance','IT & Security','Soft Skills','Leadership','Management','Technical','Wellness'] as $cat)
                                <option value="{{ $cat }}" class="bg-violet-950 text-white" {{ old('category', $training->category) == $cat ? 'selected' : '' }}>{{ $cat }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div>
                        <label class="block text-white/80 text-sm font-medium mb-1.5">Trainer Name</label>
                        <input type="text" name="trainer_name" value="{{ old('trainer_name', $training->trainer_name) }}" required
                            class="w-full bg-white/10 border border-white/20 text-white placeholder-white/30 rounded-xl px-4 py-2.5 focus:outline-none focus:ring-2 focus:ring-violet-500 transition">
                    </div>

                    <div>
                        <label class="block text-white/80 text-sm font-medium mb-1.5">Duration (hours)</label>
                        <input type="number" name="duration" value="{{ old('duration', $training->duration) }}" min="1" required
                            class="w-full bg-white/10 border border-white/20 text-white placeholder-white/30 rounded-xl px-4 py-2.5 focus:outline-none focus:ring-2 focus:ring-violet-500 transition">
                    </div>

                    <div>
                        <label class="block text-white/80 text-sm font-medium mb-1.5">Capacity</label>
                        <input type="number" name="capacity" value="{{ old('capacity', $training->capacity) }}" min="1" required
                            class="w-full bg-white/10 border border-white/20 text-white placeholder-white/30 rounded-xl px-4 py-2.5 focus:outline-none focus:ring-2 focus:ring-violet-500 transition">
                    </div>

                    <div>
                        <label class="block text-white/80 text-sm font-medium mb-1.5">Start Date</label>
                        <input type="date" name="start_date" value="{{ old('start_date', $training->start_date?->format('Y-m-d')) }}" required
                            class="w-full bg-white/10 border border-white/20 text-white rounded-xl px-4 py-2.5 focus:outline-none focus:ring-2 focus:ring-violet-500 transition">
                    </div>

                    <div>
                        <label class="block text-white/80 text-sm font-medium mb-1.5">End Date</label>
                        <input type="date" name="end_date" value="{{ old('end_date', $training->end_date?->format('Y-m-d')) }}" required
                            class="w-full bg-white/10 border border-white/20 text-white rounded-xl px-4 py-2.5 focus:outline-none focus:ring-2 focus:ring-violet-500 transition">
                    </div>

                    <div>
                        <label class="block text-white/80 text-sm font-medium mb-1.5">Location</label>
                        <input type="text" name="location" value="{{ old('location', $training->location) }}" required
                            class="w-full bg-white/10 border border-white/20 text-white placeholder-white/30 rounded-xl px-4 py-2.5 focus:outline-none focus:ring-2 focus:ring-violet-500 transition">
                    </div>

                    <div>
                        <label class="block text-white/80 text-sm font-medium mb-1.5">Status</label>
                        <select name="status" required class="w-full bg-white/10 border border-white/20 text-white rounded-xl px-4 py-2.5 focus:outline-none focus:ring-2 focus:ring-violet-500 transition">
                            @foreach(['upcoming','ongoing','completed'] as $s)
                                <option value="{{ $s }}" class="bg-violet-950 text-white" {{ old('status', $training->status) == $s ? 'selected' : '' }}>{{ ucfirst($s) }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <div class="flex justify-end gap-3 pt-4 border-t border-white/10">
                    <a href="{{ route('admin.trainings.index') }}" class="px-5 py-2.5 rounded-xl border border-white/20 text-white/70 hover:text-white hover:bg-white/10 transition text-sm font-medium">Cancel</a>
                    <button type="submit" class="px-6 py-2.5 bg-violet-600 hover:bg-violet-700 text-white rounded-xl text-sm font-semibold transition shadow-lg">Save Changes</button>
                </div>
            </form>
        </div>
    </div>
</x-admin-layout>
