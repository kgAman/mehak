<x-admin-layout>
    <x-slot name="header">
        <h1 class="text-2xl md:text-3xl font-black text-white uppercase tracking-widest">
            Upload <span class="text-amber-500">Site Photo</span>
        </h1>
    </x-slot>

    <div class="max-w-4xl mx-auto">
        <div class="mb-8">
            <a href="{{ route('admin.gallery-admin.index') }}" class="text-slate-500 hover:text-amber-500 font-mono text-xs uppercase tracking-widest flex items-center gap-2 mb-2 transition-colors">
                <i data-lucide="arrow-left" class="w-3 h-3"></i> Back to Gallery
            </a>
        </div>

        <form action="{{ route('admin.gallery-admin.store') }}" method="POST" enctype="multipart/form-data" class="bg-slate-900 border border-slate-700 shadow-2xl rounded-sm p-8 md:p-10 relative overflow-hidden">
            <div class="absolute top-0 left-0 w-full h-1.5 opacity-80" style="background-image: repeating-linear-gradient(-45deg, #f59e0b 0, #f59e0b 10px, #0f172a 10px, #0f172a 20px);"></div>
            
            @csrf

            <div class="space-y-6">
                <div>
                    <label class="block text-xs font-bold text-gray-400 uppercase tracking-widest mb-2 flex items-center gap-2">
                        <i data-lucide="type" class="w-4 h-4"></i> Photo Title / Location
                    </label>
                    <input type="text" name="title" value="{{ old('title') }}" required 
                           class="block w-full bg-slate-950/50 border border-slate-700 text-white focus:border-amber-500 focus:ring-amber-500 rounded-sm px-4 py-3"
                           placeholder="e.g. Richmond Subframe Repair">
                </div>

                <div>
                    <label class="block text-xs font-bold text-gray-400 uppercase tracking-widest mb-2 flex items-center gap-2">
                        <i data-lucide="tags" class="w-4 h-4"></i> Project Category
                    </label>
                    <select name="category" class="block w-full bg-slate-950/50 border border-slate-700 text-white focus:border-amber-500 focus:ring-amber-500 rounded-sm px-4 py-3">
                        <option value="Commercial" {{ old('category') == 'Commercial' ? 'selected' : '' }}>Commercial</option>
                        <option value="Residential" {{ old('category') == 'Residential' ? 'selected' : '' }}>Residential</option>
                    </select>
                </div>

                <!-- Visual File Upload Zone -->
                <div>
                    <label class="block text-xs font-bold text-gray-400 uppercase tracking-widest mb-2 flex items-center gap-2">
                        <i data-lucide="image-plus" class="w-4 h-4"></i> High-Res Image File
                    </label>
                    <div class="mt-1 relative flex justify-center px-6 pt-5 pb-6 border-2 border-slate-700 border-dashed rounded-sm bg-slate-950/30 hover:bg-slate-950/50 hover:border-amber-500 transition-all cursor-pointer h-64">
                        
                        <!-- File Input -->
                        <input id="file-upload" name="image" type="file" accept="image/*" required class="absolute inset-0 w-full h-full opacity-0 cursor-pointer z-20" onchange="previewImage(event)">
                        
                        <!-- Default Upload Prompt -->
                        <div id="upload-prompt" class="space-y-1 text-center pointer-events-none relative z-10 flex flex-col items-center justify-center h-full">
                            <i data-lucide="upload-cloud" class="mx-auto h-12 w-12 text-slate-500 mb-2"></i>
                            <div class="flex text-sm text-slate-400 justify-center">
                                <span class="font-bold text-amber-500">Select a file</span>
                                <p class="pl-1">or drag and drop</p>
                            </div>
                            <p class="text-xs text-slate-500 font-mono mt-2">PNG, JPG, WEBP</p>
                        </div>

                        <!-- Image Preview Container (Hidden by default) -->
                        <div id="image-preview-container" class="hidden absolute inset-0 w-full h-full z-10 p-2 bg-slate-950 flex items-center justify-center">
                            <img id="image-preview" class="max-w-full max-h-full object-contain rounded-sm" />
                        </div>
                    </div>
                    @error('image') <span class="text-red-500 text-xs mt-1 font-bold">{{ $message }}</span> @enderror
                </div>
            </div>

            <div class="mt-8 border-t border-slate-800 pt-6 flex justify-end gap-4">
                <a href="{{ route('admin.gallery-admin.index') }}" class="px-6 py-3 text-sm font-bold text-gray-400 uppercase tracking-widest hover:text-white transition-colors">Cancel</a>
                <button type="submit" class="inline-flex justify-center items-center gap-3 rounded-sm bg-amber-500 px-8 py-3 text-sm font-black text-slate-900 shadow-[4px_4px_0px_0px_#475569] hover:translate-x-[2px] hover:translate-y-[2px] transition-all uppercase tracking-widest">
                    Upload Image <i data-lucide="upload" class="w-4 h-4"></i>
                </button>
            </div>
        </form>
    </div>

    <!-- Script to handle Image Preview -->
    <script>
        function previewImage(event) {
            const input = event.target;
            if (input.files && input.files[0]) {
                const reader = new FileReader();
                reader.onload = function(e) {
                    // Set the source of the image tag
                    document.getElementById('image-preview').src = e.target.result;
                    // Hide the upload cloud text
                    document.getElementById('upload-prompt').classList.add('hidden');
                    // Show the image preview container
                    document.getElementById('image-preview-container').classList.remove('hidden');
                }
                reader.readAsDataURL(input.files[0]);
            }
        }
    </script>
</x-admin-layout>