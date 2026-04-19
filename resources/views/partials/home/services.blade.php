<div class="bg-slate-900 py-20 relative border-t-8 border-slate-800">
    
    <div class="text-center mb-16">
        <div class="inline-flex relative items-center justify-center bg-slate-800/80 backdrop-blur-sm border-2 border-slate-600 px-10 py-4 rounded-sm shadow-2xl">
            
            <div class="absolute left-3 w-3 h-3 rounded-full bg-gradient-to-br from-gray-300 to-gray-500 shadow-[inset_0_1px_3px_rgba(0,0,0,0.8)] flex items-center justify-center">
                <div class="w-full h-[1px] bg-gray-800 rotate-45"></div>
            </div>
            <div class="absolute right-3 w-3 h-3 rounded-full bg-gradient-to-br from-gray-300 to-gray-500 shadow-[inset_0_1px_3px_rgba(0,0,0,0.8)] flex items-center justify-center">
                <div class="w-full h-[1px] bg-gray-800 -rotate-12"></div>
            </div>

            <h2 class="text-3xl md:text-4xl font-black font-['Montserrat',_sans-serif] text-amber-500 uppercase tracking-[0.2em] drop-shadow-md flex items-center gap-4">
                <i data-lucide="wrench" class="w-8 h-8 text-gray-400"></i> Our Services
            </h2>
        </div>
    </div>

    <div class="max-w-[96rem] mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-6">

            @php
                $services = [
                    ['icon' => 'door-closed', 'title' => 'Doors & Hardware'],
                    ['icon' => 'hammer', 'title' => 'General Carpentry'],
                    ['icon' => 'tent', 'title' => 'Pergolas & Decking'],
                    ['icon' => 'tree-pine', 'title' => 'Landscaping & Fencing'],
                    ['icon' => 'shield-alert', 'title' => 'Insurance Repairs'],
                    ['icon' => 'hard-hat', 'title' => 'Framing, Fixing & Lockups'],
                    ['icon' => 'brick-wall', 'title' => 'Walls & Ceiling'],
                    ['icon' => 'paint-roller', 'title' => 'Bulkheads & Wall Design'],
                    ['icon' => 'layers', 'title' => 'Flooring (Hybrid & Laminate)'],
                    ['icon' => 'flame', 'title' => 'Firewall Installation'],
                    ['icon' => 'drill', 'title' => 'Damage Repair'],
                    ['icon' => 'home', 'title' => 'Small Unoccupied Properties'],
                ];
            @endphp

            @foreach ($services as $service)
            <div class="relative bg-slate-800 border-2 border-slate-700 p-6 rounded-sm shadow-xl overflow-hidden group hover:-translate-y-1 hover:border-amber-500/50 transition-all duration-300 hover:shadow-2xl hover:shadow-amber-500/10 cursor-pointer">
                
                <div class="absolute top-2 left-2 w-2.5 h-2.5 rounded-full bg-gradient-to-br from-gray-300 to-gray-500 shadow-[inset_0_1px_2px_rgba(0,0,0,0.8)] flex items-center justify-center">
                    <div class="w-full h-[1px] bg-gray-800 rotate-[{{ rand(0, 180) }}deg]"></div>
                </div>
                <div class="absolute top-2 right-2 w-2.5 h-2.5 rounded-full bg-gradient-to-br from-gray-300 to-gray-500 shadow-[inset_0_1px_2px_rgba(0,0,0,0.8)] flex items-center justify-center">
                    <div class="w-full h-[1px] bg-gray-800 rotate-[{{ rand(0, 180) }}deg]"></div>
                </div>
                <div class="absolute bottom-2 left-2 w-2.5 h-2.5 rounded-full bg-gradient-to-br from-gray-300 to-gray-500 shadow-[inset_0_1px_2px_rgba(0,0,0,0.8)] flex items-center justify-center">
                    <div class="w-full h-[1px] bg-gray-800 rotate-[{{ rand(0, 180) }}deg]"></div>
                </div>
                <div class="absolute bottom-2 right-2 w-2.5 h-2.5 rounded-full bg-gradient-to-br from-gray-300 to-gray-500 shadow-[inset_0_1px_2px_rgba(0,0,0,0.8)] flex items-center justify-center">
                    <div class="w-full h-[1px] bg-gray-800 rotate-[{{ rand(0, 180) }}deg]"></div>
                </div>

                <div class="relative z-10 flex flex-col items-center justify-center text-center h-full pt-4 pb-2">
                    <div class="mb-5 text-amber-500 drop-shadow-[0_0_8px_rgba(245,158,11,0.3)] group-hover:scale-110 group-hover:-translate-y-1 transition-transform duration-300 flex justify-center">
                        <i data-lucide="{{ $service['icon'] }}" class="w-12 h-12 stroke-[1.5]"></i>
                    </div>
                    
                    <div class="w-12 h-1 mx-auto mb-4 bg-[repeating-linear-gradient(45deg,#f59e0b,#f59e0b_4px,#0f172a_4px,#0f172a_8px)] opacity-70 group-hover:opacity-100 transition-opacity"></div>
                    
                    <h3 class="text-gray-100 font-bold font-['Montserrat',_sans-serif] text-[15px] leading-snug tracking-wider uppercase group-hover:text-amber-400 transition-colors">
                        {{ $service['title'] }}
                    </h3>
                </div>
            </div>
            @endforeach

        </div>
        
        <div class="mt-16 text-center">
            <a href="{{ route('services') }}" class="inline-flex items-center gap-3 text-amber-500 font-bold uppercase tracking-widest hover:text-white transition-colors group">
                View Full Service Details 
                <span class="bg-amber-500 text-slate-900 w-8 h-8 flex items-center justify-center rounded-sm group-hover:bg-white group-hover:translate-x-2 transition-all">
                    <i data-lucide="arrow-right" class="w-5 h-5"></i>
                </span>
            </a>
        </div>
    </div>
</div>