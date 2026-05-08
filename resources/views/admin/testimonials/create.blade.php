<x-admin-layout>
    <x-slot name="header">
        <h1 class="text-2xl md:text-3xl font-black text-white uppercase tracking-widest">
            Record <span class="text-amber-500">Client Review</span>
        </h1>
    </x-slot>

    <div class="max-w-4xl mx-auto">
        <div class="mb-8">
            <a href="{{ route('admin.testimonials-admin.index') }}" class="text-slate-500 hover:text-amber-500 font-mono text-xs uppercase tracking-widest flex items-center gap-2 mb-2 transition-colors">
                <i data-lucide="arrow-left" class="w-3 h-3"></i> Back to Testimonials
            </a>
        </div>

        <form action="/admin/testimonials-admin" method="POST" enctype="multipart/form-data" class="bg-slate-900 border border-slate-700 shadow-2xl rounded-sm p-8 md:p-10 relative overflow-hidden">
            <div class="absolute top-0 left-0 w-full h-1.5 opacity-80" style="background-image: repeating-linear-gradient(-45deg, #f59e0b 0, #f59e0b 10px, #0f172a 10px, #0f172a 20px);"></div>
            
            @csrf

            <div class="space-y-6">
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div>
                        <label class="block text-xs font-bold text-gray-400 uppercase tracking-widest mb-2 flex items-center gap-2">
                            <i data-lucide="user" class="w-4 h-4"></i> Client Name
                        </label>
                        <input type="text" name="client_name" value="{{ old('client_name') }}" required 
                               class="block w-full bg-slate-950/50 border border-slate-700 text-white focus:border-amber-500 focus:ring-amber-500 rounded-sm px-4 py-3">
                    </div>
                    <div>
                        <label class="block text-xs font-bold text-gray-400 uppercase tracking-widest mb-2 flex items-center gap-2">
                            <i data-lucide="map-pin" class="w-4 h-4"></i> Company / Location
                        </label>
                        <input type="text" name="client_company" value="{{ old('client_company') }}" 
                               class="block w-full bg-slate-950/50 border border-slate-700 text-white focus:border-amber-500 focus:ring-amber-500 rounded-sm px-4 py-3">
                    </div>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                    <div>
                        <label class="block text-xs font-bold text-gray-400 uppercase tracking-widest mb-2 flex items-center gap-2">
                            <i data-lucide="star" class="w-4 h-4"></i> Star Rating
                        </label>
                        <select name="rating" class="block w-full bg-slate-950/50 border border-slate-700 text-white focus:border-amber-500 focus:ring-amber-500 rounded-sm px-4 py-3">
                            <option value="5" {{ old('rating') == 5 ? 'selected' : '' }}>5 Stars</option>
                            <option value="4" {{ old('rating') == 4 ? 'selected' : '' }}>4 Stars</option>
                            <option value="3" {{ old('rating') == 3 ? 'selected' : '' }}>3 Stars</option>
                            <option value="2" {{ old('rating') == 2 ? 'selected' : '' }}>2 Stars</option>
                            <option value="1" {{ old('rating') == 1 ? 'selected' : '' }}>1 Star</option>
                        </select>
                    </div>
                    
                    <div>
                        <label class="block text-xs font-bold text-gray-400 uppercase tracking-widest mb-2 flex items-center gap-2">
                            <i data-lucide="briefcase" class="w-4 h-4"></i> Client Position
                        </label>
                        <input type="text" name="client_position" value="{{ old('client_position') }}"
                               class="block w-full bg-slate-950/50 border border-slate-700 text-white focus:border-amber-500 focus:ring-amber-500 rounded-sm px-4 py-3">
                    </div>

                    <div>
                        <label class="block text-xs font-bold text-gray-400 uppercase tracking-widest mb-2 flex items-center gap-2">
                            <i data-lucide="tags" class="w-4 h-4"></i> Category
                        </label>
                        <select name="category" class="block w-full bg-slate-950/50 border border-slate-700 text-white focus:border-amber-500 focus:ring-amber-500 rounded-sm px-4 py-3">
                            <option value="Commercial" {{ old('category') == 'Commercial' ? 'selected' : '' }}>Commercial</option>
                            <option value="Residential" {{ old('category') == 'Residential' ? 'selected' : '' }}>Residential</option>
                        </select>
                    </div>
                </div>

                <div>
                    <label class="block text-xs font-bold text-gray-400 uppercase tracking-widest mb-2 flex items-center gap-2">
                        <i data-lucide="message-square" class="w-4 h-4"></i> Client Quote
                    </label>
                    <textarea name="content" rows="4" required 
                              class="block w-full bg-slate-950/50 border border-slate-700 text-white focus:border-amber-500 focus:ring-amber-500 rounded-sm px-4 py-3">{{ old('content') }}</textarea>
                </div>

                <div class="flex items-center gap-3 bg-slate-950/50 border border-slate-800 p-4 rounded-sm">
                    <input type="checkbox" name="is_featured" id="is_featured" value="1" class="w-4 h-4 text-amber-500 border-slate-700 bg-slate-900 rounded focus:ring-amber-500">
                    <label for="is_featured" class="text-xs font-bold text-gray-400 uppercase tracking-widest cursor-pointer">Feature on Homepage</label>
                </div>
            </div>

            <div class="mt-8 border-t border-slate-800 pt-6 flex justify-end gap-4">
                <button type="submit" class="bg-amber-500 text-slate-900 px-8 py-3 text-sm font-black uppercase tracking-widest rounded-sm hover:bg-amber-400 shadow-[4px_4px_0_0_#475569] transition-all">
                    Save Review <i data-lucide="save" class="w-4 h-4 inline ml-2"></i>
                </button>
            </div>
        </form>
    </div>
</x-admin-layout>