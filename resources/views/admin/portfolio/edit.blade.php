<x-admin-layout>
    <x-slot name="header">
        <h1 class="text-2xl md:text-3xl font-black text-white uppercase tracking-widest">
            Update <span class="text-amber-500">Portfolio</span>
        </h1>
    </x-slot>

    <div class="max-w-4xl mx-auto">
        <div class="mb-8">
            <a href="{{ route('admin.portfolio-admin.index') }}" class="text-slate-500 hover:text-amber-500 font-mono text-xs uppercase tracking-widest flex items-center gap-2 mb-2 transition-colors">
                <i data-lucide="arrow-left" class="w-3 h-3"></i> Back to Portfolio
            </a>
            <p class="text-slate-400 font-mono text-[10px] uppercase tracking-widest mt-2">
                PROJECT SERIAL: <span class="text-amber-500">PRJ-{{ str_pad($portfolio->id, 3, '0', STR_PAD_LEFT) }}</span>
            </p>
        </div>

        <form action="{{ route('admin.portfolio-admin.update', $portfolio->id) }}" method="POST" enctype="multipart/form-data" class="bg-slate-900 border border-slate-700 shadow-2xl rounded-sm p-8 md:p-10 relative overflow-hidden">
            <div class="absolute top-0 left-0 w-full h-1.5 opacity-80" style="background-image: repeating-linear-gradient(-45deg, #f59e0b 0, #f59e0b 10px, #0f172a 10px, #0f172a 20px);"></div>
            
            @csrf
            @method('PUT')

            <div class="space-y-6">
                <!-- Project Title -->
                <div>
                    <label class="block text-xs font-bold text-gray-400 uppercase tracking-widest mb-2 flex items-center gap-2">
                        <i data-lucide="type" class="w-4 h-4"></i> Project Title
                    </label>
                    <input type="text" name="title" value="{{ old('title', $portfolio->title) }}" required 
                           class="block w-full bg-slate-950/50 border border-slate-700 text-white focus:border-amber-500 focus:ring-amber-500 rounded-sm shadow-inner transition-colors px-4 py-3">
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <!-- Category Select Dropdown -->
                    <div>
                        <label class="block text-xs font-bold text-gray-400 uppercase tracking-widest mb-2 flex items-center gap-2">
                            <i data-lucide="tags" class="w-4 h-4"></i> Category
                        </label>
                        <select name="category" required 
                                class="block w-full bg-slate-950/50 border border-slate-700 text-white focus:border-amber-500 focus:ring-amber-500 rounded-sm shadow-inner transition-colors px-4 py-3 appearance-none">
                            <option value="" disabled>Select Category</option>
                            <option value="Commercial" {{ (old('category', $portfolio->category) == 'Commercial') ? 'selected' : '' }}>Commercial</option>
                            <option value="Residential" {{ (old('category', $portfolio->category) == 'Residential') ? 'selected' : '' }}>Residential</option>
                            <option value="Industrial" {{ (old('category', $portfolio->category) == 'Industrial') ? 'selected' : '' }}>Industrial</option>
                        </select>
                    </div>

                    <!-- Timeline -->
                    <div>
                        <label class="block text-xs font-bold text-gray-400 uppercase tracking-widest mb-2 flex items-center gap-2">
                            <i data-lucide="clock" class="w-4 h-4"></i> Timeline Allocation
                        </label>
                        <input type="text" name="timeline" value="{{ old('timeline', $portfolio->timeline) }}" required 
                               class="block w-full bg-slate-950/50 border border-slate-700 text-white focus:border-amber-500 focus:ring-amber-500 rounded-sm shadow-inner transition-colors px-4 py-3"
                               placeholder="e.g. 4 Weeks">
                    </div>
                </div>

                <!-- Image Management -->
                <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                    <div class="md:col-span-1">
                        <label class="block text-xs font-bold text-gray-400 uppercase tracking-widest mb-2">Current Image</label>
                        <div class="aspect-square bg-black border border-slate-700 rounded-sm overflow-hidden flex items-center justify-center">
                            @if($portfolio->image)
                                <!-- Using asset() to ensure proper URL generation -->
                                <img src="{{ asset('storage/' . $portfolio->image) }}" class="w-full h-full object-cover opacity-70">
                            @else
                                <div class="text-slate-700 flex flex-col items-center">
                                    <i data-lucide="image-off" class="w-8 h-8 mb-2"></i>
                                    <span class="text-[10px] uppercase font-mono">No File</span>
                                </div>
                            @endif
                        </div>
                    </div>
                    <div class="md:col-span-2">
                        <label class="block text-xs font-bold text-gray-400 uppercase tracking-widest mb-2 flex items-center gap-2">
                            <i data-lucide="image-plus" class="w-4 h-4"></i> Replace Image (Optional)
                        </label>
                        <div class="mt-1 relative flex justify-center px-6 pt-5 pb-6 border-2 border-slate-700 border-dashed rounded-sm bg-slate-950/30 hover:border-amber-500 transition-all cursor-pointer group">
                            <input id="file-upload" name="image" type="file" class="absolute inset-0 w-full h-full opacity-0 cursor-pointer">
                            <div class="space-y-1 text-center pointer-events-none">
                                <i data-lucide="upload-cloud" class="mx-auto h-10 w-10 text-slate-500 group-hover:text-amber-500 transition-colors"></i>
                                <div class="flex text-sm text-slate-400 justify-center">
                                    <span class="font-bold text-amber-500 group-hover:text-white transition-colors">Select new file</span>
                                </div>
                                <p class="text-[10px] text-slate-600 font-mono">PNG, JPG up to 10MB</p>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Execution Log -->
                <div>
                    <label class="block text-xs font-bold text-gray-400 uppercase tracking-widest mb-2 flex items-center gap-2">
                        <i data-lucide="terminal" class="w-4 h-4"></i> Execution Log
                    </label>
                    <textarea name="description" rows="6" required 
                              class="block w-full bg-slate-950/50 border border-slate-700 text-white focus:border-amber-500 focus:ring-amber-500 rounded-sm shadow-inner transition-colors px-4 py-3">{{ old('description', $portfolio->description) }}</textarea>
                </div>
            </div>

            <div class="mt-8 border-t border-slate-800 pt-6 flex justify-end gap-4">
                <a href="{{ route('admin.portfolio-admin.index') }}" class="px-6 py-3 text-sm font-bold text-gray-400 uppercase tracking-widest hover:text-white transition-colors">Discard</a>
                <button type="submit" class="inline-flex justify-center items-center gap-3 rounded-sm bg-amber-500 px-8 py-3 text-sm font-black text-slate-900 shadow-[4px_4px_0px_0px_#475569] hover:shadow-[2px_2px_0px_0px_#475569] hover:translate-x-[2px] hover:translate-y-[2px] transition-all duration-200 uppercase tracking-widest">
                    Update Dossier <i data-lucide="save" class="w-4 h-4"></i>
                </button>
            </div>
        </form>
    </div>
</x-admin-layout>