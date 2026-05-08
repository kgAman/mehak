<x-admin-layout>
    <x-slot name="header">
        <h1 class="text-2xl md:text-3xl font-black text-white uppercase tracking-widest">
            Update <span class="text-amber-500">Testimonial</span>
        </h1>
    </x-slot>

    <div class="max-w-4xl mx-auto">
        <div class="mb-8">
            <a href="{{ route('admin.testimonials-admin.index') }}" class="text-slate-500 hover:text-amber-500 font-mono text-xs uppercase tracking-widest flex items-center gap-2 mb-2 transition-colors">
                <i data-lucide="arrow-left" class="w-3 h-3"></i> Back to Testimonials
            </a>
            <p class="text-slate-400 font-mono text-[10px] uppercase tracking-widest mt-2">
                RECORD ID: <span class="text-amber-500">TST-{{ str_pad($testimonial->id, 4, '0', STR_PAD_LEFT) }}</span>
            </p>
        </div>

        <form action="{{ route('admin.testimonials-admin.update', $testimonial->id) }}" method="POST" enctype="multipart/form-data" class="bg-slate-900 border border-slate-700 shadow-2xl rounded-sm p-8 md:p-10 relative overflow-hidden">
            <div class="absolute top-0 left-0 w-full h-1.5 opacity-80" style="background-image: repeating-linear-gradient(-45deg, #f59e0b 0, #f59e0b 10px, #0f172a 10px, #0f172a 20px);"></div>
            
            @csrf
            @method('PUT')

            <div class="space-y-6">
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div>
                        <label class="block text-xs font-bold text-gray-400 uppercase tracking-widest mb-2 flex items-center gap-2">
                            <i data-lucide="user" class="w-4 h-4"></i> Client Name
                        </label>
                        <input type="text" name="client_name" value="{{ old('client_name', $testimonial->client_name) }}" required 
                               class="block w-full bg-slate-950/50 border border-slate-700 text-white focus:border-amber-500 focus:ring-amber-500 rounded-sm shadow-inner transition-colors px-4 py-3">
                    </div>

                    <div>
                        <label class="block text-xs font-bold text-gray-400 uppercase tracking-widest mb-2 flex items-center gap-2">
                            <i data-lucide="map-pin" class="w-4 h-4"></i> Company / Location
                        </label>
                        <input type="text" name="client_company" value="{{ old('client_company', $testimonial->client_company) }}" 
                               class="block w-full bg-slate-950/50 border border-slate-700 text-white focus:border-amber-500 focus:ring-amber-500 rounded-sm shadow-inner transition-colors px-4 py-3">
                    </div>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                    <div>
                        <label class="block text-xs font-bold text-gray-400 uppercase tracking-widest mb-2 flex items-center gap-2">
                            <i data-lucide="star" class="w-4 h-4"></i> Star Rating
                        </label>
                        <select name="rating" class="block w-full bg-slate-950/50 border border-slate-700 text-white focus:border-amber-500 focus:ring-amber-500 rounded-sm shadow-inner transition-colors px-4 py-3">
                            @for($i = 5; $i >= 1; $i--)
                                <option value="{{ $i }}" {{ old('rating', $testimonial->rating) == $i ? 'selected' : '' }}>{{ $i }} Stars</option>
                            @endfor
                        </select>
                    </div>

                    <div>
                        <label class="block text-xs font-bold text-gray-400 uppercase tracking-widest mb-2 flex items-center gap-2">
                            <i data-lucide="briefcase" class="w-4 h-4"></i> Client Position / Type
                        </label>
                        <input type="text" name="client_position" value="{{ old('client_position', $testimonial->client_position) }}"
                               class="block w-full bg-slate-950/50 border border-slate-700 text-white focus:border-amber-500 focus:ring-amber-500 rounded-sm shadow-inner transition-colors px-4 py-3">
                    </div>

                    <div>
                        <label class="block text-xs font-bold text-gray-400 uppercase tracking-widest mb-2 flex items-center gap-2">
                            <i data-lucide="tags" class="w-4 h-4"></i> Category
                        </label>
                        <select name="category" class="block w-full bg-slate-950/50 border border-slate-700 text-white focus:border-amber-500 focus:ring-amber-500 rounded-sm shadow-inner transition-colors px-4 py-3">
                            <option value="Commercial" {{ old('category', $testimonial->category) == 'Commercial' ? 'selected' : '' }}>Commercial</option>
                            <option value="Residential" {{ old('category', $testimonial->category) == 'Residential' ? 'selected' : '' }}>Residential</option>
                        </select>
                    </div>
                </div>

                <div class="flex items-center gap-3 bg-slate-950/50 border border-slate-800 p-4 rounded-sm">
                    <input type="checkbox" name="is_featured" id="is_featured" value="1" {{ old('is_featured', $testimonial->is_featured) ? 'checked' : '' }} class="w-4 h-4 text-amber-500 rounded border-slate-700 bg-slate-900 focus:ring-amber-500">
                    <label for="is_featured" class="text-xs font-bold text-gray-400 uppercase tracking-widest cursor-pointer">
                        Feature this review on the homepage
                    </label>
                </div>

                <div>
                    <label class="block text-xs font-bold text-gray-400 uppercase tracking-widest mb-2 flex items-center gap-2">
                        <i data-lucide="message-square" class="w-4 h-4"></i> Client Quote
                    </label>
                    <textarea name="content" rows="6" required 
                              class="block w-full bg-slate-950/50 border border-slate-700 text-white focus:border-amber-500 focus:ring-amber-500 rounded-sm shadow-inner transition-colors px-4 py-3">{{ old('content', $testimonial->content) }}</textarea>
                </div>
            </div>

            <div class="mt-8 border-t border-slate-800 pt-6 flex justify-end gap-4">
                <a href="{{ route('admin.testimonials-admin.index') }}" class="px-6 py-3 text-sm font-bold text-gray-400 uppercase tracking-widest hover:text-white transition-colors">Discard</a>
                <button type="submit" class="inline-flex justify-center items-center gap-3 rounded-sm bg-amber-500 px-8 py-3 text-sm font-black text-slate-900 shadow-[4px_4px_0px_0px_#475569] hover:shadow-[2px_2px_0px_0px_#475569] hover:translate-x-[2px] hover:translate-y-[2px] transition-all duration-200 uppercase tracking-widest">
                    Update Record <i data-lucide="save" class="w-4 h-4"></i>
                </button>
            </div>
        </form>
    </div>
</x-admin-layout>