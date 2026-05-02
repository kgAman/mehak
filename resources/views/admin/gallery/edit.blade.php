<x-admin-layout>
    <x-slot name="header">
        <h1 class="text-2xl md:text-3xl font-black text-white uppercase tracking-widest">
            Update <span class="text-amber-500">Image Data</span>
        </h1>
    </x-slot>

    <div class="max-w-4xl mx-auto">
        
        <div class="mb-8">
            <a href="{{ route('admin.gallery-admin.index') }}" class="text-slate-500 hover:text-amber-500 font-mono text-xs uppercase tracking-widest flex items-center gap-2 mb-2 transition-colors">
                <i data-lucide="arrow-left" class="w-3 h-3"></i> Back to Gallery
            </a>
        </div>

        <!-- FIXED: Action points to 'update' route with the record ID -->
        <form action="{{ route('admin.gallery-admin.update', $gallery->id) }}" method="POST" enctype="multipart/form-data" class="bg-slate-900 border border-slate-700 shadow-2xl rounded-sm p-8 md:p-10 relative overflow-hidden">
            <div class="absolute top-0 left-0 w-full h-1.5 opacity-80" style="background-image: repeating-linear-gradient(-45deg, #f59e0b 0, #f59e0b 10px, #0f172a 10px, #0f172a 20px);"></div>
            
            @csrf
            @method('PUT')

            <div class="flex flex-col md:flex-row gap-8">
                <!-- Current Image / Replace Image Zone -->
                <div class="w-full md:w-1/3">
                    <label class="block text-slate-500 font-mono text-xs uppercase tracking-widest mb-2">
                        Current Image (Click to change)
                    </label>
                    <div class="relative w-full aspect-square bg-black border-2 border-slate-700 hover:border-amber-500 transition-colors rounded-sm overflow-hidden group cursor-pointer">
                        
                        <!-- Dynamic Image Source -->
                        <img id="image-preview" src="{{ asset('storage/' . $gallery->image) }}" class="w-full h-full object-cover opacity-80 group-hover:opacity-40 transition-opacity">
                        
                        <!-- Hover Overlay to indicate clickability -->
                        <div class="absolute inset-0 flex flex-col items-center justify-center opacity-0 group-hover:opacity-100 transition-opacity pointer-events-none">
                            <i data-lucide="upload" class="w-8 h-8 text-white mb-2"></i>
                            <span class="text-xs font-bold text-white uppercase tracking-widest">Replace Photo</span>
                        </div>

                        <!-- Hidden File Input covering the image -->
                        <input type="file" name="image" accept="image/*" class="absolute inset-0 w-full h-full opacity-0 cursor-pointer" onchange="previewNewImage(event)">
                    </div>
                    @error('image') <p class="text-red-500 text-xs mt-1 font-bold">{{ $message }}</p> @enderror
                </div>

                <!-- Edit Fields -->
                <div class="w-full md:w-2/3 space-y-6">
                    <div>
                        <label class="block text-xs font-bold text-gray-400 uppercase tracking-widest mb-2 flex items-center gap-2">
                            <i data-lucide="type" class="w-4 h-4"></i> Photo Title / Location
                        </label>
                        <!-- Dynamic Value -->
                        <input type="text" name="title" value="{{ old('title', $gallery->title) }}" required 
                               class="block w-full bg-slate-950/50 border border-slate-700 text-white focus:border-amber-500 focus:ring-amber-500 rounded-sm shadow-inner transition-colors px-4 py-3">
                        @error('title') <p class="text-red-500 text-xs mt-1 font-bold">{{ $message }}</p> @enderror
                    </div>

                    <div>
                        <label class="block text-xs font-bold text-gray-400 uppercase tracking-widest mb-2 flex items-center gap-2">
                            <i data-lucide="tags" class="w-4 h-4"></i> Project Category
                        </label>
                        <!-- FIXED: name="category" to match your DB. Dynamic selected states -->
                        <select name="category" class="block w-full bg-slate-950/50 border border-slate-700 text-white focus:border-amber-500 focus:ring-amber-500 rounded-sm shadow-inner transition-colors px-4 py-3">
                            <option value="Commercial" {{ old('category', $gallery->category) == 'Commercial' ? 'selected' : '' }}>Commercial</option>
                            <option value="Residential" {{ old('category', $gallery->category) == 'Residential' ? 'selected' : '' }}>Residential</option>
                        </select>
                        @error('category') <p class="text-red-500 text-xs mt-1 font-bold">{{ $message }}</p> @enderror
                    </div>
                </div>
            </div>

            <div class="mt-8 border-t border-slate-800 pt-6 flex justify-end gap-4">
                <a href="{{ route('admin.gallery-admin.index') }}" class="px-6 py-3 text-sm font-bold text-gray-400 uppercase tracking-widest hover:text-white transition-colors">Discard</a>
                <button type="submit" class="inline-flex justify-center items-center gap-3 rounded-sm bg-amber-500 px-8 py-3 text-sm font-black text-slate-900 shadow-[4px_4px_0px_0px_#475569] hover:translate-x-[2px] hover:translate-y-[2px] transition-all duration-200 uppercase tracking-widest">
                    Save Changes <i data-lucide="save" class="w-4 h-4"></i>
                </button>
            </div>
        </form>
    </div>

    <!-- Script to swap out the image preview if they upload a new one -->
    <script>
        function previewNewImage(event) {
            const input = event.target;
            if (input.files && input.files[0]) {
                const reader = new FileReader();
                reader.onload = function(e) {
                    document.getElementById('image-preview').src = e.target.result;
                }
                reader.readAsDataURL(input.files[0]);
            }
        }
    </script>
</x-admin-layout>