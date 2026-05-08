<div class="bg-slate-950 py-24 relative border-t-2 border-slate-800" id="project-gallery">
        
        <div class="absolute inset-0 opacity-[0.02] pointer-events-none z-0" 
            style="background-image: linear-gradient(#f59e0b 1px, transparent 1px), linear-gradient(90deg, #f59e0b 1px, transparent 1px); background-size: 40px 40px;">
        </div>

        <div class="text-center z-10 mb-16 relative">
            <h2 class="text-3xl md:text-5xl font-black font-['Montserrat',_sans-serif] text-white uppercase tracking-[0.15em] drop-shadow-md flex justify-center items-center gap-4">
                <i data-lucide="image" class="w-8 h-8 md:w-10 md:h-10 text-amber-500"></i> Project Gallery
            </h2>
            <p class="text-gray-400 mt-4 font-['Montserrat',_sans-serif] tracking-widest uppercase text-xs font-bold flex justify-center items-center gap-2">
                <i data-lucide="mouse-pointer-click" class="w-4 h-4 text-amber-500"></i> Hover to reveal completed projects
            </p>
        </div>

        @php
            // Dynamically fetch the 6 most recent, active images from your database
            $topGalleries = \App\Models\Gallery::where('is_active', true)
                                ->orderBy('created_at', 'desc')
                                ->take(6)
                                ->get();
        @endphp

        <div class="max-w-[96rem] mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">

                @forelse ($topGalleries as $gallery)
                
                <div class="relative w-full aspect-[4/3] bg-slate-900 border-2 border-slate-700 p-2 shadow-xl overflow-hidden group cursor-pointer transition-transform duration-300 hover:-translate-y-2 hover:shadow-[0_20px_40px_rgba(0,0,0,0.6)]">
                    
                    <div class="absolute top-0 left-0 h-1 bg-amber-500 shadow-[0_0_15px_#f59e0b] w-0 group-hover:w-full transition-all duration-500 ease-out z-30"></div>
                    <div class="absolute bottom-0 right-0 h-1 bg-amber-500 shadow-[0_0_15px_#f59e0b] w-0 group-hover:w-full transition-all duration-500 ease-out z-30"></div>
                    <div class="absolute top-0 right-0 w-1 bg-amber-500 shadow-[0_0_15px_#f59e0b] h-0 group-hover:h-full transition-all duration-500 ease-out z-30"></div>
                    <div class="absolute bottom-0 left-0 w-1 bg-amber-500 shadow-[0_0_15px_#f59e0b] h-0 group-hover:h-full transition-all duration-500 ease-out z-30"></div>

                    <div class="relative w-full h-full bg-black overflow-hidden border border-slate-800">
                        
                        <img src="{{ asset('storage/' . $gallery->image) }}" alt="{{ $gallery->title ?? $gallery->category }} Repaired" 
                            class="absolute inset-0 w-full h-full object-cover transform scale-110 group-hover:scale-100 transition-transform duration-700 ease-out z-0" />
                        
                        <img src="{{ asset('storage/' . $gallery->image) }}" alt="{{ $gallery->title ?? $gallery->category }} Blueprint" 
                            class="absolute inset-0 w-full h-full object-cover grayscale brightness-50 contrast-150 sepia-[0.5] hue-rotate-[180deg] z-10 transition-opacity duration-500 ease-in-out group-hover:opacity-0" />

                        <div class="absolute inset-0 z-10 pointer-events-none opacity-20 group-hover:opacity-0 transition-opacity duration-300" 
                            style="background: repeating-linear-gradient(0deg, transparent, transparent 2px, rgba(255,255,255,0.1) 2px, rgba(255,255,255,0.1) 4px);"></div>

                        <div class="absolute bottom-0 left-0 right-0 bg-slate-900/90 backdrop-blur-md border-t-2 border-amber-500 p-4 transform translate-y-full group-hover:translate-y-0 transition-transform duration-500 ease-out z-20">
                            <h4 class="text-white font-black font-['Montserrat',_sans-serif] uppercase tracking-widest text-base">{{ $gallery->title ?? 'Site Project' }}</h4>
                            
                            <p class="text-amber-500 font-['Montserrat',_sans-serif] text-xs font-bold uppercase tracking-wider flex items-center gap-2 mt-1">
                                <i data-lucide="tag" class="w-3 h-3"></i> {{ $gallery->category }}
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
                    <p class="text-slate-400 font-mono text-sm uppercase tracking-widest">More projects coming soon!</p>
                </div>
                @endforelse

            </div>
            
            @if(count($topGalleries) >= 6)
            <div class="mt-16 text-center">
                <a href="{{ route('gallery') }}" class="inline-flex items-center gap-3 bg-slate-900 border-2 border-slate-700 text-white px-8 py-4 font-black font-['Montserrat',_sans-serif] uppercase tracking-widest text-sm hover:border-amber-500 hover:text-amber-500 transition-colors rounded-sm shadow-xl">
                    View Full Gallery <i data-lucide="arrow-right" class="w-4 h-4"></i>
                </a>
            </div>
            @endif

        </div>
    </div>