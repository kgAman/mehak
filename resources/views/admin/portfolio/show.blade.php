<x-admin-layout>
    
    <!-- Dynamic Header Slot for the Top Sticky Bar -->
    <x-slot name="header">
        <h1 class="text-2xl md:text-3xl font-black text-white uppercase tracking-widest">
            Project <span class="text-amber-500">Dossier</span>
        </h1>
    </x-slot>

    <!-- Page Header & Controls -->
    <div class="flex justify-between items-end mb-8">
        <div>
            <a href="{{ route('admin.portfolio-admin.index') }}" class="text-slate-500 hover:text-amber-500 font-mono text-xs uppercase tracking-widest flex items-center gap-2 mb-2 transition-colors">
                <i data-lucide="arrow-left" class="w-3 h-3"></i> Back to Portfolio
            </a>
        </div>
        
        <!-- Action Buttons -->
        <div class="flex gap-3">
            <!-- Edit Button wired to edit route -->
            <a href="{{ route('admin.portfolio-admin.edit', $portfolio->id) }}" class="bg-slate-800 text-white px-6 py-2.5 font-bold uppercase tracking-widest text-xs rounded-sm border border-slate-700 hover:border-amber-500 hover:text-amber-500 transition-all flex items-center gap-2">
                <i data-lucide="edit" class="w-4 h-4"></i> Edit Record
            </a>
            
            <!-- Delete Form wired to destroy route -->
            <form action="{{ route('admin.portfolio-admin.destroy', $portfolio->id) }}" method="POST" onsubmit="return confirm('WARNING: Are you sure you want to permanently delete this project? This action cannot be undone.');">
                @csrf
                @method('DELETE')
                <button type="submit" class="bg-red-500/10 text-red-500 px-4 py-2.5 font-bold uppercase tracking-widest text-xs rounded-sm border border-red-500/30 hover:bg-red-500 hover:text-white transition-all">
                    <i data-lucide="trash-2" class="w-4 h-4"></i>
                </button>
            </form>
        </div>
    </div>

    <!-- The Dossier Card -->
    <div class="bg-slate-900 border-2 border-slate-700 shadow-2xl rounded-sm relative overflow-hidden flex flex-col md:flex-row">
        
        <!-- Left Side: Image Scanner -->
        <div class="w-full md:w-1/2 relative bg-black aspect-square md:aspect-auto border-b md:border-b-0 md:border-r border-slate-800 group">
            
            <!-- Dynamically check for image, otherwise fallback to placeholder -->
            @if($portfolio->image)
                <img src="{{ asset('storage/' . $portfolio->image) }}" alt="{{ $portfolio->title }}" class="w-full h-full object-cover opacity-60 group-hover:opacity-100 transition-opacity duration-500">
            @else
                <img src="https://images.unsplash.com/photo-1541888081631-f18c8f000b21?q=80&w=800&auto=format&fit=crop" alt="Placeholder" class="w-full h-full object-cover opacity-30">
                <div class="absolute inset-0 flex items-center justify-center pointer-events-none">
                    <span class="text-slate-500 font-mono text-xs uppercase tracking-widest bg-slate-950/80 px-4 py-2 rounded-sm border border-slate-800">No Image Uploaded</span>
                </div>
            @endif
            
            <!-- HUD Crosshairs -->
            <div class="absolute inset-8 border border-amber-500/30 pointer-events-none flex items-center justify-center">
                <div class="w-6 h-6 border-t-2 border-l-2 border-amber-500 absolute top-0 left-0"></div>
                <div class="w-6 h-6 border-t-2 border-r-2 border-amber-500 absolute top-0 right-0"></div>
                <div class="w-6 h-6 border-b-2 border-l-2 border-amber-500 absolute bottom-0 left-0"></div>
                <div class="w-6 h-6 border-b-2 border-r-2 border-amber-500 absolute bottom-0 right-0"></div>
                <div class="w-1 h-1 bg-amber-500 rounded-full"></div>
            </div>
        </div>

        <!-- Right Side: Tech Specs -->
        <div class="w-full md:w-1/2 p-8 md:p-10 flex flex-col justify-center relative">
            <div class="absolute top-0 right-0 w-48 h-48 bg-amber-500/5 rounded-full blur-3xl pointer-events-none"></div>

            <div class="flex justify-between items-center mb-4">
                <span class="text-amber-500 font-mono text-sm font-bold tracking-widest border border-amber-500/30 bg-amber-500/10 px-3 py-1 rounded-sm">
                    <i data-lucide="folder-lock" class="w-4 h-4 inline-block mr-2 -mt-1"></i>PRJ-{{ str_pad($portfolio->id, 3, '0', STR_PAD_LEFT) }}
                </span>
                <span class="text-green-500 font-mono text-xs font-bold tracking-widest flex items-center gap-2">
                    <div class="w-2 h-2 rounded-full bg-green-500 shadow-[0_0_8px_#22c55e] animate-pulse"></div>
                    Published
                </span>
            </div>

            <!-- Dynamic Title -->
            <h3 class="text-3xl font-black text-white font-['Montserrat',_sans-serif] uppercase tracking-wide leading-tight mb-2">
                {{ $portfolio->title }}
            </h3>
            
            <!-- Dynamic Category -->
            <p class="text-slate-400 font-mono text-xs uppercase tracking-widest mb-8 border-b border-slate-800 pb-4">
                // Category: {{ ucfirst($portfolio->category) ?? 'Uncategorized' }}
            </p>

            <!-- Dynamic Timeline -->
            <div class="mb-8">
                <p class="text-slate-500 font-mono text-xs uppercase tracking-wider mb-2 flex items-center gap-2">
                    <i data-lucide="clock" class="w-4 h-4"></i> Timeline Allocation
                </p>
                <p class="text-white font-bold font-['Montserrat',_sans-serif] border-l-2 border-amber-500 pl-4 bg-slate-950/50 py-2 rounded-r-sm">
                    {{ $portfolio->timeline ?? 'Timeline unspecified' }}
                </p>
            </div>

            <!-- Dynamic Description/Log -->
            <div>
                <p class="text-slate-500 font-mono text-xs uppercase tracking-wider mb-2 flex items-center gap-2">
                    <i data-lucide="terminal" class="w-4 h-4"></i> Execution Log
                </p>
                <p class="text-gray-300 leading-relaxed font-['Montserrat',_sans-serif] text-sm border-l-2 border-slate-700 pl-4 whitespace-pre-wrap">{{ $portfolio->description }}</p>
            </div>
        </div>

    </div>

</x-admin-layout>