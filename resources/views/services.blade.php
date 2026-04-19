<x-app-layout>
    
    <style>
        /* Smooth shifting dark metal background */
        @keyframes motion-gradient {
            0% { background-position: 0% 50%; }
            50% { background-position: 100% 50%; }
            100% { background-position: 0% 50%; }
        }
        .bg-motion-metal {
            background-size: 200% 200%;
            animation: motion-gradient 8s ease infinite;
        }

        /* Moving hazard tape effect */
        @keyframes slide-tape {
            from { background-position: 0 0; }
            to { background-position: 56.57px 0; } /* Matches the diagonal distance of the stripes */
        }
        .hazard-tape {
            background-image: repeating-linear-gradient(
                -45deg, 
                #eab308 0, 
                #eab308 20px, 
                #0f172a 20px, 
                #0f172a 40px
            );
            animation: slide-tape 2s linear infinite;
        }
    </style>

    <div class="relative pt-24 pb-20 overflow-hidden bg-gradient-to-r from-slate-900 via-slate-700 to-slate-900 bg-motion-metal shadow-inner">
        <div class="relative z-10 text-center max-w-4xl mx-auto px-4">
            <h1 class="text-5xl md:text-6xl font-black font-['Montserrat',_sans-serif] text-white uppercase tracking-tighter mb-6 drop-shadow-2xl">
                Comprehensive <span class="text-amber-500">Repair</span> Solutions
            </h1>
            <p class="text-xl md:text-2xl text-gray-300 font-medium font-['Montserrat',_sans-serif] max-w-3xl mx-auto leading-relaxed drop-shadow-md">
                From minor fixes to major structural overhauls, our expert team is equipped and licensed for every job.
            </p>
        </div>
    </div>

    <div class="h-5 w-full hazard-tape shadow-[0_4px_10px_rgba(0,0,0,0.5)] relative z-20"></div>

    <div class="bg-slate-800 py-20">
        <div class="max-w-[96rem] mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 md:grid-cols-2 xl:grid-cols-3 gap-10">

                @php
                    $detailedServices = [
                        ['icon' => 'door-closed', 'title' => 'Doors & Hardware', 'features' => ['Door installation and replacement', 'Lock installation & repairs', 'Hinges, handles, and hardware fitting']],
                        ['icon' => 'hammer', 'title' => 'General Carpentry', 'features' => ['Custom woodwork', 'Repairs and installations', 'Residential & commercial carpentry solutions']],
                        ['icon' => 'tent', 'title' => 'Pergolas & Decking', 'features' => ['Outdoor pergola construction', 'Timber & composite decking', 'Renovation and repair of existing decks']],
                        ['icon' => 'tree-pine', 'title' => 'Landscaping & Fencing', 'features' => ['Garden landscaping', 'Timber and metal fencing', 'Boundary and privacy solutions']],
                        ['icon' => 'shield-alert', 'title' => 'Insurance Repairs', 'features' => ['Damage assessment & restoration', 'Fire, water, and storm damage repair', 'Insurance claim support work']],
                        ['icon' => 'hard-hat', 'title' => 'Framing, Fixing & Lockups', 'features' => ['Structural framing', 'Lock-up stage construction', 'Residential building support']],
                        ['icon' => 'brick-wall', 'title' => 'Walls & Ceiling', 'features' => ['Wall partitioning', 'Ceiling installation and repair', 'Plasterboard & finishing']],
                        ['icon' => 'paint-roller', 'title' => 'Bulkheads & Wall Design', 'features' => ['Decorative bulkheads', 'Modern wall designs', 'Custom interior finishing']],
                        ['icon' => 'layers', 'title' => 'Flooring (Hybrid/Lam)', 'features' => ['Hybrid flooring installation', 'Laminate flooring solutions', 'Floor repairs & upgrades']],
                        ['icon' => 'flame', 'title' => 'Firewall Installation', 'features' => ['Fire-rated wall systems', 'Safety compliance installation', 'Residential & commercial projects']],
                        ['icon' => 'drill', 'title' => 'Damage Repair', 'features' => ['Structural and cosmetic repairs', 'Wear & tear fixes', 'Emergency repair services']],
                        ['icon' => 'home', 'title' => 'Unoccupied Properties', 'features' => ['Maintenance for vacant properties', 'Inspection and repair', 'Secure and upkeep services']],
                    ];
                @endphp

                @foreach ($detailedServices as $service)
                <div x-data="{ broken: false }" 
                     @click="broken = !broken"
                     class="relative bg-slate-900 border-2 border-slate-700 shadow-2xl cursor-pointer overflow-hidden min-h-[400px] flex flex-col justify-center rounded-sm">
                    
                    <div class="absolute top-3 left-3 w-3 h-3 rounded-full bg-gradient-to-br from-gray-300 to-gray-500 shadow-[inset_0_1px_3px_rgba(0,0,0,0.8)] z-0"><div class="w-full h-[1px] bg-gray-800 rotate-[{{ rand(0, 180) }}deg] mt-1"></div></div>
                    <div class="absolute top-3 right-3 w-3 h-3 rounded-full bg-gradient-to-br from-gray-300 to-gray-500 shadow-[inset_0_1px_3px_rgba(0,0,0,0.8)] z-0"><div class="w-full h-[1px] bg-gray-800 rotate-[{{ rand(0, 180) }}deg] mt-1"></div></div>
                    <div class="absolute bottom-3 left-3 w-3 h-3 rounded-full bg-gradient-to-br from-gray-300 to-gray-500 shadow-[inset_0_1px_3px_rgba(0,0,0,0.8)] z-0"><div class="w-full h-[1px] bg-gray-800 rotate-[{{ rand(0, 180) }}deg] mt-1"></div></div>
                    <div class="absolute bottom-3 right-3 w-3 h-3 rounded-full bg-gradient-to-br from-gray-300 to-gray-500 shadow-[inset_0_1px_3px_rgba(0,0,0,0.8)] z-0"><div class="w-full h-[1px] bg-gray-800 rotate-[{{ rand(0, 180) }}deg] mt-1"></div></div>

                    <div class="relative z-10 p-8 transition-all duration-700 ease-out"
                         :class="broken ? 'opacity-100 scale-100' : 'opacity-0 scale-90 pointer-events-none'">
                        
                        <div class="flex items-center gap-4 mb-6 border-b border-slate-700 pb-4">
                            <i data-lucide="{{ $service['icon'] }}" class="w-8 h-8 text-amber-500 shrink-0"></i>
                            <h3 class="text-xl font-bold text-gray-100 uppercase tracking-widest font-['Montserrat',_sans-serif]">
                                {{ $service['title'] }}
                            </h3>
                        </div>

                        <ul class="space-y-4">
                            @foreach($service['features'] as $feature)
                                <li class="flex items-start gap-3 text-gray-400 font-['Montserrat',_sans-serif] text-sm md:text-base leading-relaxed">
                                    <i data-lucide="check-square" class="w-5 h-5 text-amber-500 shrink-0 mt-0.5"></i>
                                    <span>{{ $feature }}</span>
                                </li>
                            @endforeach
                        </ul>
                    </div>


                    <div :class="broken ? 'translate-y-[150%] -translate-x-[20%] -rotate-[20deg] opacity-0' : 'opacity-100'"
                         class="absolute inset-0 z-20 bg-slate-800 flex flex-col items-center justify-center transition-all duration-[800ms] ease-in origin-bottom-left shadow-[inset_-3px_0_15px_rgba(0,0,0,0.6)] hover:bg-slate-700"
                         style="clip-path: polygon(0% 0%, 50% 0%, 42% 15%, 58% 35%, 45% 55%, 62% 75%, 50% 100%, 0% 100%);">
                         
                         <div class="text-amber-500 mb-6 drop-shadow-[0_0_10px_rgba(245,158,11,0.4)]">
                             <i data-lucide="{{ $service['icon'] }}" class="w-20 h-20 stroke-[1.5]"></i>
                         </div>
                         <h3 class="text-2xl font-black text-white uppercase tracking-widest font-['Montserrat',_sans-serif] text-center px-4">
                             {{ $service['title'] }}
                         </h3>
                         <span class="mt-8 text-amber-500 font-bold uppercase tracking-[0.2em] text-xs border-2 border-amber-500/30 rounded-sm px-4 py-2 animate-pulse">
                            Click to Break
                         </span>
                    </div>


                    <div :class="broken ? 'translate-y-[150%] translate-x-[20%] rotate-[20deg] opacity-0' : 'opacity-100'"
                         class="absolute inset-0 z-20 bg-slate-800 flex flex-col items-center justify-center transition-all duration-[800ms] ease-in origin-bottom-right shadow-[inset_3px_0_15px_rgba(0,0,0,0.6)] hover:bg-slate-700"
                         style="clip-path: polygon(50% 0%, 100% 0%, 100% 100%, 50% 100%, 62% 75%, 45% 55%, 58% 35%, 42% 15%);">
                         
                         <div class="text-amber-500 mb-6 drop-shadow-[0_0_10px_rgba(245,158,11,0.4)]">
                             <i data-lucide="{{ $service['icon'] }}" class="w-20 h-20 stroke-[1.5]"></i>
                         </div>
                         <h3 class="text-2xl font-black text-white uppercase tracking-widest font-['Montserrat',_sans-serif] text-center px-4">
                             {{ $service['title'] }}
                         </h3>
                         <span class="mt-8 text-amber-500 font-bold uppercase tracking-[0.2em] text-xs border-2 border-amber-500/30 rounded-sm px-4 py-2 animate-pulse">
                            Click to Break
                         </span>
                    </div>

                </div>
                @endforeach

            </div>

            <div class="mt-20 text-center">
                <div class="inline-block bg-slate-900 border-2 border-slate-700 p-8 shadow-2xl max-w-2xl w-full relative overflow-hidden">
                    <div class="absolute inset-0 opacity-10 pointer-events-none hazard-tape"></div>
                    
                    <h3 class="relative z-10 text-2xl font-black text-white font-['Montserrat',_sans-serif] uppercase tracking-widest mb-4">Ready to start your project?</h3>
                    <p class="relative z-10 text-gray-400 mb-8 font-['Montserrat',_sans-serif]">Contact our team today to discuss your requirements and receive a detailed, no-obligation quote.</p>
                    <a href="{{ route('contact') }}" class="relative z-10 inline-flex justify-center items-center rounded-sm bg-amber-500 px-10 py-4 text-base font-bold font-['Montserrat',_sans-serif] text-slate-900 shadow-[4px_4px_0px_0px_#475569] hover:shadow-[2px_2px_0px_0px_#475569] hover:translate-x-[2px] hover:translate-y-[2px] transition-all duration-200 uppercase tracking-wider">
                        Request a Quote Now
                    </a>
                </div>
            </div>

        </div>
    </div>

</x-app-layout>