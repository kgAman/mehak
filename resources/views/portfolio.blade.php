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

        /* The angled cut for the technical data panel */
        .clip-panel {
            clip-path: polygon(0 0, 100% 0, 100% calc(100% - 30px), calc(100% - 30px) 100%, 0 100%);
        }
    </style>

    <div class="relative py-24 overflow-hidden bg-gradient-to-r from-slate-900 via-slate-800 to-slate-900 bg-motion-metal shadow-inner">
        <div class="relative z-10 text-center max-w-5xl mx-auto px-4">
            <h1 class="text-5xl md:text-7xl font-black font-['Montserrat',_sans-serif] text-white uppercase tracking-tighter mb-4 drop-shadow-2xl">
                Case <span class="text-amber-500">Studies</span>
            </h1>
            <p class="text-lg md:text-xl text-gray-400 font-medium font-['Montserrat',_sans-serif] max-w-2xl mx-auto leading-relaxed drop-shadow-md">
                Declassified project blueprints, execution logs, and final results.
            </p>
        </div>
        <div class="absolute inset-0 opacity-10 pointer-events-none" style="background-image: linear-gradient(#f59e0b 1px, transparent 1px), linear-gradient(90deg, #f59e0b 1px, transparent 1px); background-size: 30px 30px;"></div>
    </div>

    <div class="h-6 w-full hazard-tape shadow-[0_5px_15px_rgba(0,0,0,0.6)] relative z-20"></div>

    <div class="bg-[#020617] py-24 min-h-screen relative">
        
        <div class="max-w-[96rem] mx-auto px-4 sm:px-6 lg:px-8 relative z-10 space-y-24">

            @php
                // Fetch projects dynamically. 
                // Note: Change \App\Models\Portfolio to \App\Models\Gallery if you are using the gallery table instead!
                $projects = \App\Models\Portfolio::latest()->get();
            @endphp

            @forelse ($projects as $project)
            <div class="group flex flex-col lg:flex-row bg-slate-900 border-2 border-slate-700 shadow-[0_30px_60px_rgba(0,0,0,0.8)] relative overflow-hidden clip-panel transition-transform duration-500 hover:-translate-y-2">
                
                <div class="absolute top-0 right-0 w-64 h-64 bg-amber-500/5 rounded-full blur-3xl pointer-events-none group-hover:bg-amber-500/10 transition-colors duration-700"></div>

                <div class="w-full lg:w-1/2 relative aspect-video lg:aspect-auto border-b-2 lg:border-b-0 lg:border-r-2 border-slate-700 overflow-hidden bg-black">
                    
                    <img src="{{ asset('storage/' . $project->image) }}" class="absolute inset-0 w-full h-full object-cover opacity-30 group-hover:opacity-100 group-hover:scale-105 transition-all duration-[1000ms] ease-out z-0">
                    
                    <img src="{{ asset('storage/' . $project->image) }}" class="absolute inset-0 w-full h-full object-cover grayscale brightness-[0.3] contrast-200 sepia-[0.8] hue-rotate-[190deg] group-hover:opacity-0 transition-opacity duration-[800ms] z-10">

                    <div class="absolute inset-10 border border-amber-500/30 z-20 pointer-events-none flex items-center justify-center">
                        <div class="w-8 h-8 border-t-2 border-l-2 border-amber-500 absolute top-0 left-0 -mt-1 -ml-1"></div>
                        <div class="w-8 h-8 border-t-2 border-r-2 border-amber-500 absolute top-0 right-0 -mt-1 -mr-1"></div>
                        <div class="w-8 h-8 border-b-2 border-l-2 border-amber-500 absolute bottom-0 left-0 -mb-1 -ml-1"></div>
                        <div class="w-8 h-8 border-b-2 border-r-2 border-amber-500 absolute bottom-0 right-0 -mb-1 -mr-1"></div>
                        <div class="w-4 h-4 border border-amber-500/50 rounded-full flex items-center justify-center group-hover:scale-150 group-hover:opacity-0 transition-all duration-700">
                            <div class="w-1 h-1 bg-amber-500 rounded-full"></div>
                        </div>
                    </div>

                    <div class="absolute top-0 left-0 w-full h-1 bg-amber-400 shadow-[0_0_20px_10px_rgba(245,158,11,0.5)] z-30 transform -translate-y-full group-hover:translate-y-[800px] transition-transform duration-[1500ms] ease-linear"></div>

                    <div class="absolute bottom-6 left-1/2 -translate-x-1/2 bg-slate-950/80 backdrop-blur-sm border border-amber-500/50 px-4 py-2 text-amber-500 font-mono text-xs tracking-widest uppercase z-30 group-hover:opacity-0 transition-opacity duration-300">
                        Hover to render
                    </div>
                </div>

                <div class="w-full lg:w-1/2 p-8 md:p-12 flex flex-col justify-center relative">
                    
                    <div class="flex justify-between items-center mb-4">
                        <span class="text-amber-500 font-mono text-sm font-bold tracking-widest border border-amber-500/30 bg-amber-500/10 px-3 py-1 rounded-sm">
                            <i data-lucide="folder-lock" class="w-4 h-4 inline-block mr-2 -mt-1"></i>PRJ-{{ str_pad($project->id, 4, '0', STR_PAD_LEFT) }}
                        </span>
                        <span class="text-green-500 font-mono text-sm font-bold tracking-widest flex items-center gap-2">
                            <div class="w-2 h-2 rounded-full bg-green-500 shadow-[0_0_8px_#22c55e] animate-pulse"></div>
                            {{ $project->status ?? 'Completed' }}
                        </span>
                    </div>

                    <h3 class="text-3xl md:text-4xl font-black text-white font-['Montserrat',_sans-serif] uppercase tracking-wide leading-tight mb-2">
                        {{ $project->title ?? 'Classified Project' }}
                    </h3>
                    <p class="text-slate-400 font-mono text-xs uppercase tracking-widest mb-8">
                        // Category: {{ $project->category ?? 'General Construction' }}
                    </p>

                    <div class="grid grid-cols-2 gap-4 mb-8">
                        <div class="bg-slate-950 border border-slate-800 p-4 rounded-sm border-l-2 border-l-slate-600 group-hover:border-l-amber-500 transition-colors duration-500">
                            <p class="text-slate-500 font-mono text-xs uppercase tracking-wider mb-1">Timeline</p>
                            <p class="text-white font-bold font-['Montserrat',_sans-serif]">{{ $project->timeline ?? 'TBD' }}</p>
                        </div>
                        <div class="bg-slate-950 border border-slate-800 p-4 rounded-sm border-l-2 border-l-slate-600 group-hover:border-l-amber-500 transition-colors duration-500 delay-75">
                            <p class="text-slate-500 font-mono text-xs uppercase tracking-wider mb-1">Allocated Crew</p>
                            <p class="text-white font-bold font-['Montserrat',_sans-serif]">{{ $project->crew ?? 'Standard Team' }}</p>
                        </div>
                    </div>

                    <div>
                        <p class="text-slate-500 font-mono text-xs uppercase tracking-wider mb-2 flex items-center gap-2">
                            <i data-lucide="terminal" class="w-4 h-4"></i> Execution Log
                        </p>
                        <p class="text-gray-300 leading-relaxed font-['Montserrat',_sans-serif] text-sm md:text-base border-l-2 border-slate-700 pl-4">
                            {{ $project->description ?? 'Execution logs and technical schematics for this project are currently pending upload.' }}
                        </p>
                    </div>

                    <div class="mt-10">
                        <a href="#" class="inline-flex items-center gap-3 bg-transparent border-2 border-amber-500 text-amber-500 hover:bg-amber-500 hover:text-slate-900 px-8 py-3.5 font-black font-['Montserrat',_sans-serif] uppercase tracking-widest text-sm transition-all duration-300 group/btn">
                            View Full Schematic 
                            <i data-lucide="arrow-right" class="w-4 h-4 transform group-hover/btn:translate-x-1 transition-transform"></i>
                        </a>
                    </div>

                    <div class="absolute top-4 right-4 w-2 h-2 bg-slate-700 rounded-full shadow-inner"></div>
                    <div class="absolute bottom-4 right-8 w-2 h-2 bg-slate-700 rounded-full shadow-inner"></div>
                </div>
            </div>
            @empty
            <div class="text-center py-24 bg-slate-900 border-2 border-slate-700 shadow-xl clip-panel">
                <i data-lucide="folder-lock" class="w-16 h-16 text-slate-600 mx-auto mb-4"></i>
                <h3 class="text-2xl font-black text-white font-['Montserrat',_sans-serif] uppercase tracking-widest mb-2">No Records Found</h3>
                <p class="text-slate-500 font-mono">Case studies are currently classified or pending upload.</p>
            </div>
            @endforelse

        </div>
    </div>
</x-app-layout>