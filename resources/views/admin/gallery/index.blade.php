<x-admin-layout>
    <x-slot name="header">
        <h1 class="text-2xl md:text-3xl font-black text-white uppercase tracking-widest">
            Manage <span class="text-amber-500">Gallery</span>
        </h1>
    </x-slot>

    <div class="max-w-[96rem] mx-auto">
        
        <!-- Page Header / Controls -->
        <div class="flex justify-between items-end mb-8 border-b border-slate-800 pb-4">
            <div>
                <a href="{{ route('dashboard') }}" class="text-slate-500 hover:text-amber-500 font-mono text-xs uppercase tracking-widest flex items-center gap-2 mb-2 transition-colors">
                    <i data-lucide="arrow-left" class="w-3 h-3"></i> Back to Command Center
                </a>
            </div>
            
            <a href="{{ route('admin.gallery-admin.create') }}" class="bg-amber-500 text-slate-900 px-6 py-2.5 font-black uppercase tracking-widest text-sm rounded-sm hover:bg-amber-400 shadow-[4px_4px_0px_0px_#475569] hover:shadow-[2px_2px_0px_0px_#475569] hover:translate-x-[2px] hover:translate-y-[2px] transition-all flex items-center gap-2">
                <i data-lucide="upload-cloud" class="w-4 h-4"></i> Upload Photo
            </a>
        </div>

        <!-- Image Grid -->
        <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">
            @forelse($galleries as $image)
                <div class="group relative aspect-square bg-slate-900 border-2 border-slate-700 rounded-sm overflow-hidden shadow-xl">
                    
                    <!-- 
                      IMAGE SOURCE FIX: 
                      Using $image->image instead of $image->image_path. 
                      Change this if your database column is named differently!
                    -->
                    <img src="{{ asset('storage/' . $image->image) }}" 
                         alt="{{ $image->title }}"
                         class="w-full h-full object-cover opacity-70 group-hover:opacity-100 group-hover:scale-105 transition-all duration-500">
                    
                    <!-- Hover Overlay -->
                    <div class="absolute inset-0 bg-slate-950/80 opacity-0 group-hover:opacity-100 transition-opacity duration-300 flex flex-col items-center justify-center gap-4 backdrop-blur-sm">
                        <p class="text-amber-500 font-mono text-xs font-bold uppercase tracking-widest text-center px-4">
                            {{ $image->category ?? 'General' }}
                        </p>
                        
                        <div class="flex gap-3">
                            <!-- View Original -->
                            <a href="{{ asset('storage/' . $image->image) }}" target="_blank" title="View Image" class="bg-slate-800 text-white p-2 rounded-sm border border-slate-700 hover:border-green-500 hover:text-green-500 transition-colors">
                                <i data-lucide="eye" class="w-4 h-4"></i>
                            </a>

                            <!-- ADDED: Edit Button -->
                            <a href="{{ route('admin.gallery-admin.edit', $image->id) }}" title="Edit Details" class="bg-slate-800 text-white p-2 rounded-sm border border-slate-700 hover:border-amber-500 hover:text-amber-500 transition-colors">
                                <i data-lucide="edit" class="w-4 h-4"></i>
                            </a>

                            <!-- Delete Form -->
                            <form action="{{ route('admin.gallery-admin.destroy', $image->id) }}" method="POST" onsubmit="return confirm('Delete this image permanently?')">
                                @csrf
                                @method('DELETE')
                                <button type="submit" title="Delete Image" class="bg-red-500/10 text-red-500 p-2 rounded-sm border border-red-500/30 hover:bg-red-500 hover:text-white transition-colors">
                                    <i data-lucide="trash-2" class="w-4 h-4"></i>
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            @empty
                <div class="col-span-full py-20 text-center border-2 border-dashed border-slate-800 rounded-sm">
                    <i data-lucide="image" class="w-12 h-12 text-slate-700 mx-auto mb-4"></i>
                    <p class="text-slate-500 font-mono text-xs uppercase tracking-widest">Gallery Archive Empty</p>
                </div>
            @endforelse
        </div>

        <!-- Pagination -->
        @if(method_exists($galleries, 'links'))
            <div class="mt-12">
                {{ $galleries->links() }}
            </div>
        @endif
    </div>
</x-admin-layout>