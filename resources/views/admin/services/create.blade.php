<x-admin-layout>
    <x-slot name="header">
        <h1 class="text-2xl md:text-3xl font-black text-white uppercase tracking-widest">
            Add <span class="text-amber-500">New Service</span>
        </h1>
    </x-slot>

    <div class="max-w-4xl mx-auto">
        <div class="mb-8">
            <a href="{{ route('admin.services-admin.index') }}" class="text-slate-500 hover:text-amber-500 font-mono text-xs uppercase tracking-widest flex items-center gap-2 mb-2 transition-colors">
                <i data-lucide="arrow-left" class="w-3 h-3"></i> Back to Services
            </a>
        </div>

        <form action="{{ route('admin.services-admin.store') }}" method="POST" class="bg-slate-900 border border-slate-700 shadow-2xl rounded-sm p-8 md:p-10 relative overflow-hidden">
            <div class="absolute top-0 left-0 w-full h-1.5 opacity-80" style="background-image: repeating-linear-gradient(-45deg, #f59e0b 0, #f59e0b 10px, #0f172a 10px, #0f172a 20px);"></div>
            
            @csrf

            <div class="space-y-6">
                <div class="grid grid-cols-1 md:grid-cols-4 gap-6">
                    <div class="md:col-span-3">
                        <label class="block text-xs font-bold text-gray-400 uppercase tracking-widest mb-2 flex items-center gap-2">
                            <i data-lucide="type" class="w-4 h-4"></i> Service Title
                        </label>
                        <input type="text" name="title" value="{{ old('title') }}" required 
                               class="block w-full bg-slate-950/50 border border-slate-700 text-white placeholder-gray-600 focus:border-amber-500 focus:ring-amber-500 rounded-sm shadow-inner transition-colors px-4 py-3"
                               placeholder="e.g. Asbestos Removal">
                    </div>
                    
                    <div>
                        <label class="block text-xs font-bold text-gray-400 uppercase tracking-widest mb-2 flex items-center gap-2">
                            <i data-lucide="image" class="w-4 h-4"></i> Lucide Icon
                        </label>
                        <input type="text" name="icon" value="{{ old('icon') }}" required 
                               class="block w-full bg-slate-950/50 border border-slate-700 text-white placeholder-gray-600 focus:border-amber-500 focus:ring-amber-500 rounded-sm shadow-inner transition-colors px-4 py-3 font-mono text-sm"
                               placeholder="e.g. shield-alert">
                    </div>
                </div>

                <div>
                    <label class="block text-xs font-bold text-gray-400 uppercase tracking-widest mb-2 flex items-center gap-2">
                        <i data-lucide="file-text" class="w-4 h-4"></i> Public Description
                    </label>
                    <!-- FIXED: name="content" matches your database column -->
                    <textarea name="content" rows="4" required 
                              class="block w-full bg-slate-950/50 border border-slate-700 text-white placeholder-gray-600 focus:border-amber-500 focus:ring-amber-500 rounded-sm shadow-inner transition-colors px-4 py-3"
                              placeholder="Describe the scope of this service...">{{ old('content') }}</textarea>
                </div>
            </div>

            <div class="mt-8 border-t border-slate-800 pt-6 flex justify-end gap-4">
                <a href="{{ route('admin.services-admin.index') }}" class="px-6 py-3 text-sm font-bold text-gray-400 uppercase tracking-widest hover:text-white transition-colors">Cancel</a>
                <button type="submit" class="inline-flex justify-center items-center gap-3 rounded-sm bg-amber-500 px-8 py-3 text-sm font-black text-slate-900 shadow-[4px_4px_0px_0px_#475569] hover:shadow-[2px_2px_0px_0px_#475569] hover:translate-x-[2px] hover:translate-y-[2px] transition-all duration-200 uppercase tracking-widest">
                    Save Service <i data-lucide="save" class="w-4 h-4"></i>
                </button>
            </div>
        </form>
    </div>
</x-admin-layout>