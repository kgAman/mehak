<x-app-layout>
    
    <style>
        .bg-motion-metal {
            background-size: 200% 200%;
            animation: motion-gradient 8s ease infinite;
        }
        @keyframes motion-gradient {
            0% { background-position: 0% 50%; }
            50% { background-position: 100% 50%; }
            100% { background-position: 0% 50%; }
        }

        .hazard-tape {
            background-image: repeating-linear-gradient(
                -45deg, 
                #f59e0b 0, 
                #f59e0b 25px, 
                #0f172a 25px, 
                #0f172a 50px
            );
            background-size: 70px 70px;
            animation: slide-tape 2s linear infinite;
        }
        @keyframes slide-tape {
            from { background-position: 0 0; }
            to { background-position: 70px 0; } 
        }
    </style>

    <div class="h-6 w-full hazard-tape shadow-[0_5px_15px_rgba(0,0,0,0.6)] relative z-20"></div>

    <div class="bg-slate-800 py-20 min-h-screen">
        
        <div class="absolute inset-0 opacity-[0.02] pointer-events-none z-0" 
             style="background-image: linear-gradient(#f59e0b 1px, transparent 1px), linear-gradient(90deg, #f59e0b 1px, transparent 1px); background-size: 40px 40px;">
        </div>

        <div class="max-w-[96rem] mx-auto px-4 sm:px-6 lg:px-8 relative z-10" x-data="{ filter: 'all' }">
            
            <div class="relative bg-slate-900 border-2 border-slate-700 shadow-2xl p-8 md:p-12 rounded-sm">
                
                <div class="absolute top-4 left-4 w-4 h-4 rounded-full bg-gradient-to-br from-gray-300 to-gray-500 shadow-[inset_0_1px_3px_rgba(0,0,0,0.8)] flex items-center justify-center"><div class="w-full h-[1px] bg-gray-800 rotate-45"></div></div>
                <div class="absolute top-4 right-4 w-4 h-4 rounded-full bg-gradient-to-br from-gray-300 to-gray-500 shadow-[inset_0_1px_3px_rgba(0,0,0,0.8)] flex items-center justify-center"><div class="w-full h-[1px] bg-gray-800 -rotate-12"></div></div>
                <div class="absolute bottom-4 left-4 w-4 h-4 rounded-full bg-gradient-to-br from-gray-300 to-gray-500 shadow-[inset_0_1px_3px_rgba(0,0,0,0.8)] flex items-center justify-center"><div class="w-full h-[1px] bg-gray-800 rotate-90"></div></div>
                <div class="absolute bottom-4 right-4 w-4 h-4 rounded-full bg-gradient-to-br from-gray-300 to-gray-500 shadow-[inset_0_1px_3px_rgba(0,0,0,0.8)] flex items-center justify-center"><div class="w-full h-[1px] bg-gray-800 rotate-[120deg]"></div></div>

                <div class="flex items-center gap-4 mb-10 border-b border-slate-800 pb-6">
                    <div class="p-3 bg-slate-800 border border-slate-700 text-amber-500 shadow-inner">
                        <i data-lucide="image" class="w-8 h-8 stroke-[1.5]"></i>
                    </div>
                    <h2 class="text-3xl font-black text-white font-['Montserrat',_sans-serif] uppercase tracking-widest">Project Gallery</h2>
                </div>

                @php
                    // Get all unique categories currently in your database
                    $uniqueCategories = $galleries->pluck('category')->unique();
                @endphp

                <div class="w-full flex flex-wrap justify-center gap-4 mb-12 border-b border-slate-800 pb-8">
                    <button @click="filter = 'all'" 
                            :class="filter === 'all' ? 'bg-amber-500 text-slate-900 border-amber-400 shadow-[0_0_15px_rgba(245,158,11,0.5)]' : 'bg-slate-900 text-gray-400 border-slate-700 hover:border-amber-500 hover:text-amber-500'"
                            class="px-8 py-3 font-black font-['Montserrat',_sans-serif] uppercase tracking-widest text-xs border-2 rounded-sm transition-all duration-300 flex items-center gap-2">
                        <i data-lucide="layers" class="w-4 h-4"></i> All Projects
                    </button>

                    @foreach($uniqueCategories as $category)
                    <button @click="filter = '{{ $category }}'" 
                            :class="filter === '{{ $category }}' ? 'bg-amber-500 text-slate-900 border-amber-400 shadow-[0_0_15px_rgba(245,158,11,0.5)]' : 'bg-slate-900 text-gray-400 border-slate-700 hover:border-amber-500 hover:text-amber-500'"
                            class="px-8 py-3 font-black font-['Montserrat',_sans-serif] uppercase tracking-widest text-xs border-2 rounded-sm transition-all duration-300 flex items-center gap-2">
                        <i data-lucide="tag" class="w-4 h-4"></i> {{ $category }}
                    </button>
                    @endforeach
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
                    @forelse ($galleries as $gallery)
                    
                    <div x-show="filter === 'all' || filter === '{{ $gallery->category }}'"
                         x-transition:enter="transition ease-out duration-300"
                         x-transition:enter-start="opacity-0 transform scale-90"
                         x-transition:enter-end="opacity-100 transform scale-100"
                         x-transition:leave="transition ease-in duration-200"
                         x-transition:leave-start="opacity-100 transform scale-100"
                         x-transition:leave-end="opacity-0 transform scale-90"
                         class="relative w-full aspect-square bg-slate-800 border-2 border-slate-700 p-2 shadow-xl overflow-hidden group cursor-pointer transition-transform duration-300 hover:-translate-y-2 hover:shadow-[0_20px_40px_rgba(0,0,0,0.6)]">
                        
                        <div class="absolute top-0 left-0 h-1 bg-amber-500 shadow-[0_0_15px_#f59e0b] w-0 group-hover:w-full transition-all duration-500 ease-out z-30"></div>
                        <div class="absolute bottom-0 right-0 h-1 bg-amber-500 shadow-[0_0_15px_#f59e0b] w-0 group-hover:w-full transition-all duration-500 ease-out z-30"></div>
                        <div class="absolute top-0 right-0 w-1 bg-amber-500 shadow-[0_0_15px_#f59e0b] h-0 group-hover:h-full transition-all duration-500 ease-out z-30"></div>
                        <div class="absolute bottom-0 left-0 w-1 bg-amber-500 shadow-[0_0_15px_#f59e0b] h-0 group-hover:h-full transition-all duration-500 ease-out z-30"></div>

                        <div class="relative w-full h-full bg-black overflow-hidden border border-slate-800">
                            
                            <img src="{{ asset('storage/' . $gallery->image) }}" alt="{{ $gallery->title ?? $gallery->category }}" 
                                 class="absolute inset-0 w-full h-full object-cover transform scale-110 group-hover:scale-100 transition-transform duration-700 ease-out z-0" />
                            
                            <img src="{{ asset('storage/' . $gallery->image) }}" alt="{{ $gallery->title ?? $gallery->category }} Blueprint" 
                                 class="absolute inset-0 w-full h-full object-cover grayscale brightness-50 contrast-150 sepia-[0.5] hue-rotate-[180deg] z-10 transition-opacity duration-500 ease-in-out group-hover:opacity-0" />

                            <div class="absolute inset-0 z-10 pointer-events-none opacity-20 group-hover:opacity-0 transition-opacity duration-300" 
                                 style="background: repeating-linear-gradient(0deg, transparent, transparent 2px, rgba(255,255,255,0.1) 2px, rgba(255,255,255,0.1) 4px);"></div>

                            <div class="absolute bottom-0 left-0 right-0 bg-slate-900/90 backdrop-blur-md border-t-2 border-amber-500 p-4 transform translate-y-full group-hover:translate-y-0 transition-transform duration-500 ease-out z-20">
                                <h4 class="text-white font-black font-['Montserrat',_sans-serif] uppercase tracking-widest text-sm">{{ $gallery->title ?? 'Site Project' }}</h4>
                                
                                <p class="text-amber-500 font-['Montserrat',_sans-serif] text-[10px] font-bold uppercase tracking-wider flex items-center justify-between mt-1">
                                    <span class="flex items-center gap-1"><i data-lucide="tag" class="w-3 h-3"></i> {{ $gallery->category }}</span>
                                    <i data-lucide="wrench" class="w-4 h-4 text-slate-500"></i>
                                </p>
                            </div>

                        </div>

                        <div class="absolute top-1 left-1 w-1.5 h-1.5 bg-slate-600 rounded-full shadow-inner z-40"></div>
                        <div class="absolute top-1 right-1 w-1.5 h-1.5 bg-slate-600 rounded-full shadow-inner z-40"></div>
                        <div class="absolute bottom-1 left-1 w-1.5 h-1.5 bg-slate-600 rounded-full shadow-inner z-40"></div>
                        <div class="absolute bottom-1 right-1 w-1.5 h-1.5 bg-slate-600 rounded-full shadow-inner z-40"></div>

                    </div>
                    
                    @empty
                    <div class="col-span-full py-12 text-center flex flex-col items-center justify-center">
                        <i data-lucide="image-off" class="w-12 h-12 text-slate-600 mb-4"></i>
                        <p class="text-slate-400 font-mono text-sm uppercase tracking-widest">No gallery images found.</p>
                    </div>
                    @endforelse
                </div>

            </div>
        </div>
    </div>
</x-app-layout>