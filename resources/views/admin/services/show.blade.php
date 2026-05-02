<x-admin-layout>
    <div class="bg-[#020617] min-h-screen py-10 relative">
        <div class="absolute inset-0 opacity-[0.03] pointer-events-none" style="background-image: linear-gradient(#f59e0b 1px, transparent 1px), linear-gradient(90deg, #f59e0b 1px, transparent 1px); background-size: 40px 40px;"></div>

        <div class="max-w-3xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
            
            <div class="flex justify-between items-end mb-8">
                <div>
                    <a href="#" class="text-slate-500 hover:text-amber-500 font-mono text-xs uppercase tracking-widest flex items-center gap-2 mb-2 transition-colors">
                        <i data-lucide="arrow-left" class="w-3 h-3"></i> Back to Services
                    </a>
                    <h1 class="text-3xl font-black font-['Montserrat',_sans-serif] text-white uppercase tracking-widest">
                        Service <span class="text-amber-500">Details</span>
                    </h1>
                </div>
                
                <a href="#" class="bg-amber-500 text-slate-900 px-6 py-2.5 font-black uppercase tracking-widest text-sm rounded-sm hover:bg-amber-400 shadow-[4px_4px_0px_0px_#475569] hover:shadow-[2px_2px_0px_0px_#475569] hover:translate-x-[2px] hover:translate-y-[2px] transition-all flex items-center gap-2">
                    <i data-lucide="edit" class="w-4 h-4"></i> Edit Service
                </a>
            </div>

            <!-- Service Info Card -->
            <div class="bg-slate-900 border border-slate-700 shadow-2xl rounded-sm p-8 md:p-12 relative overflow-hidden">
                <div class="absolute top-0 left-0 w-full h-1.5 opacity-80" style="background-image: repeating-linear-gradient(-45deg, #f59e0b 0, #f59e0b 10px, #0f172a 10px, #0f172a 20px);"></div>
                
                <!-- Center Icon Display -->
                <div class="flex flex-col items-center justify-center mb-10 text-center">
                    <div class="w-24 h-24 bg-slate-950 border-2 border-amber-500 rounded-sm flex items-center justify-center mb-6 shadow-[0_0_30px_rgba(245,158,11,0.2)]">
                        <!-- Update the icon name dynamically here -->
                        <i data-lucide="hammer" class="w-12 h-12 text-amber-500"></i>
                    </div>
                    <p class="text-slate-500 font-mono text-xs uppercase tracking-widest mb-2">Display Icon: <span class="text-amber-500">hammer</span></p>
                    <h2 class="text-4xl font-black text-white font-['Montserrat',_sans-serif] uppercase tracking-wider">Carpentry & Structural</h2>
                </div>

                <div class="border-t border-slate-800 pt-8">
                    <p class="text-slate-500 font-mono text-xs uppercase tracking-widest mb-3 flex items-center gap-2">
                        <i data-lucide="file-text" class="w-4 h-4"></i> Public Description
                    </p>
                    <div class="bg-slate-950/50 border border-slate-800 rounded-sm p-6 shadow-inner">
                        <p class="text-gray-300 leading-relaxed font-['Montserrat',_sans-serif] text-lg text-center italic">
                            "Load-bearing wall removal, framing, sub-floor repairs, and custom builds built to withstand industrial wear and tear."
                        </p>
                    </div>
                </div>

            </div>

        </div>
    </div>
</x-admin-layout>