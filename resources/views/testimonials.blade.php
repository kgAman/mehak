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
        
        /* The industrial cut-corner tag shape */
        .clip-tag {
            clip-path: polygon(
                15px 0, calc(100% - 15px) 0, 
                100% 15px, 100% calc(100% - 15px), 
                calc(100% - 15px) 100%, 15px 100%, 
                0 calc(100% - 15px), 0 15px
            );
        }

        /* The sweeping flashlight reflection */
        .inspection-sweep::after {
            content: '';
            position: absolute;
            top: 0;
            left: -150%;
            width: 50%;
            height: 100%;
            background: linear-gradient(to right, rgba(255,255,255,0) 0%, rgba(255,255,255,0.1) 50%, rgba(255,255,255,0) 100%);
            transform: skewX(-25deg);
            transition: all 0.7s cubic-bezier(0.4, 0, 0.2, 1);
            z-index: 20;
            pointer-events: none;
        }
        .group:hover .inspection-sweep::after {
            left: 200%;
        }
    </style>

    <div class="relative py-20 overflow-hidden bg-gradient-to-r from-slate-900 via-slate-800 to-slate-900 bg-motion-metal shadow-inner">
        <div class="relative z-10 text-center max-w-4xl mx-auto px-4">
            <h1 class="text-5xl md:text-6xl font-black font-['Montserrat',_sans-serif] text-white uppercase tracking-tighter mb-4 drop-shadow-2xl">
                Quality <span class="text-amber-500">Assured</span>
            </h1>
            <p class="text-lg md:text-xl text-gray-400 font-medium font-['Montserrat',_sans-serif] max-w-2xl mx-auto leading-relaxed drop-shadow-md">
                Certified reviews and site reports from our verified clients.
            </p>
        </div>
    </div>

    <div class="h-6 w-full shadow-[0_5px_15px_rgba(0,0,0,0.6)] relative z-20" 
         style="background-image: repeating-linear-gradient(-45deg, #f59e0b 0, #f59e0b 25px, #0f172a 25px, #0f172a 50px); background-size: 70px 70px; animation: slide-tape 2s linear infinite;">
    </div>

    <div class="bg-slate-950 py-16 min-h-screen relative" x-data="{ filter: 'all' }">
        
        <div class="absolute inset-0 opacity-[0.03] pointer-events-none z-0" 
             style="background-image: linear-gradient(#f59e0b 1px, transparent 1px), linear-gradient(90deg, #f59e0b 1px, transparent 1px); background-size: 40px 40px;">
        </div>

        <div class="max-w-[96rem] mx-auto px-4 sm:px-6 lg:px-8 relative z-10">

            <div class="w-full flex flex-row flex-wrap items-center justify-center gap-4 mb-16 border-b border-slate-800 pb-8">
                
                <button @click="filter = 'all'" 
                        :class="filter === 'all' ? 'bg-amber-500 text-slate-900 border-amber-400 shadow-[0_0_15px_rgba(245,158,11,0.5)]' : 'bg-slate-900 text-gray-400 border-slate-700 hover:border-amber-500 hover:text-amber-500'"
                        class="px-8 py-3 font-black font-['Montserrat',_sans-serif] uppercase tracking-widest text-sm border-2 rounded-sm transition-all duration-300 flex items-center gap-2">
                    <i data-lucide="layers" class="w-4 h-4"></i> All Reports
                </button>

                <button @click="filter = 'commercial'" 
                        :class="filter === 'commercial' ? 'bg-amber-500 text-slate-900 border-amber-400 shadow-[0_0_15px_rgba(245,158,11,0.5)]' : 'bg-slate-900 text-gray-400 border-slate-700 hover:border-amber-500 hover:text-amber-500'"
                        class="px-8 py-3 font-black font-['Montserrat',_sans-serif] uppercase tracking-widest text-sm border-2 rounded-sm transition-all duration-300 flex items-center gap-2">
                    <i data-lucide="building-2" class="w-4 h-4"></i> Commercial
                </button>

                <button @click="filter = 'residential'" 
                        :class="filter === 'residential' ? 'bg-amber-500 text-slate-900 border-amber-400 shadow-[0_0_15px_rgba(245,158,11,0.5)]' : 'bg-slate-900 text-gray-400 border-slate-700 hover:border-amber-500 hover:text-amber-500'"
                        class="px-8 py-3 font-black font-['Montserrat',_sans-serif] uppercase tracking-widest text-sm border-2 rounded-sm transition-all duration-300 flex items-center gap-2">
                    <i data-lucide="home" class="w-4 h-4"></i> Residential
                </button>
            </div>

            @php
                // Fetch all testimonials dynamically
                $testimonials = \App\Models\Testimonial::latest()->get();
            @endphp

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8 md:gap-12 lg:pt-8">
                
                @forelse ($testimonials as $index => $review)
                
                <div x-show="filter === 'all' || filter === '{{ strtolower($review->category ?? '') }}'"
                     x-transition:enter="transition ease-out duration-300"
                     x-transition:enter-start="opacity-0 translate-y-8"
                     x-transition:enter-end="opacity-100 translate-y-0"
                     x-transition:leave="transition ease-in duration-200"
                     x-transition:leave-start="opacity-100 scale-100"
                     x-transition:leave-end="opacity-0 scale-95"
                     class="group relative {{ $index % 2 == 1 ? 'lg:mt-12' : '' }}">
                    
                    <div class="absolute -top-6 left-1/2 -translate-x-1/2 w-8 h-12 border-4 border-slate-600 rounded-t-full z-0 group-hover:-translate-y-2 group-hover:border-amber-500 transition-all duration-300"></div>

                    <div class="relative bg-slate-900 p-8 pt-10 shadow-[0_20px_40px_rgba(0,0,0,0.8)] inspection-sweep clip-tag overflow-hidden border-2 border-transparent group-hover:bg-slate-800 transition-colors duration-300">
                        
                        <div class="absolute inset-1 border border-slate-700/50 clip-tag pointer-events-none group-hover:border-amber-500/30 transition-colors duration-500"></div>

                        <div class="absolute top-4 left-1/2 -translate-x-1/2 w-6 h-6 bg-slate-950 rounded-full shadow-[inset_0_4px_8px_rgba(0,0,0,0.9)] border-2 border-slate-700"></div>

                        <div class="absolute top-16 left-4 bottom-8 w-6 opacity-20 pointer-events-none"
                             style="background: repeating-linear-gradient(90deg, #fff, #fff 2px, transparent 2px, transparent 4px, #fff 4px, #fff 5px, transparent 5px, transparent 8px);">
                        </div>

                        <div class="pl-8 relative z-10 flex flex-col h-full min-h-[250px]">
                            
                            <div class="flex justify-between items-start mb-6 border-b border-slate-800 pb-4">
                                <div>
                                    <span class="text-amber-500 font-mono text-xs font-bold tracking-widest block mb-1">SN: TST-{{ str_pad($review->id, 4, '0', STR_PAD_LEFT) }}</span>
                                    <h3 class="text-white font-black font-['Montserrat',_sans-serif] uppercase tracking-widest text-lg">{{ $review->client_name }}</h3>
                                </div>
                                <div class="bg-slate-950 px-2 py-1 border border-slate-800 rounded-sm">
                                    <i data-lucide="{{ strtolower($review->category ?? '') === 'commercial' ? 'building-2' : 'home' }}" class="w-5 h-5 text-gray-500 group-hover:text-amber-500 transition-colors"></i>
                                </div>
                            </div>

                            <div class="flex gap-1 mb-4">
                                @for($i = 0; $i < 5; $i++)
                                    <i data-lucide="star" class="w-4 h-4 {{ $i < $review->rating ? 'text-amber-500 fill-amber-500' : 'text-slate-700' }}"></i>
                                @endfor
                            </div>

                            <p class="text-gray-400 font-['Montserrat',_sans-serif] text-sm leading-relaxed mb-6 group-hover:text-gray-200 transition-colors duration-300 flex-grow">
                                "{{ $review->content }}"
                            </p>

                            <div class="mt-auto pt-4 border-t border-slate-800">
                                <p class="text-slate-500 font-mono text-xs font-bold uppercase tracking-wider block mb-1">{{ $review->client_position ?? 'Client' }}</p>
                                <p class="text-slate-400 font-mono text-xs font-bold uppercase tracking-wider flex items-center gap-2">
                                    <i data-lucide="map-pin" class="w-3 h-3 text-amber-500"></i> {{ $review->client_company ?? 'Not Specified' }}
                                </p>
                            </div>

                        </div>
                        
                        <div class="absolute bottom-6 right-6 flex items-center gap-2">
                            <span class="text-[10px] font-black font-mono text-slate-600 uppercase tracking-widest group-hover:text-green-500 transition-colors">Verified</span>
                            <div class="w-2 h-2 rounded-full bg-slate-700 group-hover:bg-green-500 group-hover:shadow-[0_0_10px_#22c55e] transition-all duration-300"></div>
                        </div>

                    </div>
                </div>
                
                @empty
                <div class="col-span-full py-20 text-center flex flex-col items-center justify-center">
                    <i data-lucide="file-x-2" class="w-16 h-16 text-slate-700 mb-6"></i>
                    <h3 class="text-2xl font-black text-white font-['Montserrat',_sans-serif] uppercase tracking-widest mb-2">No Reports Found</h3>
                    <p class="text-slate-500 font-mono text-sm uppercase tracking-widest">Quality assurance logs are currently empty.</p>
                </div>
                @endforelse

            </div>

        </div>
    </div>
</x-app-layout>