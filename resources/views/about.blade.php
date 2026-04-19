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

    <div class="relative py-20 overflow-hidden bg-gradient-to-r from-slate-900 via-slate-700 to-slate-900 bg-motion-metal shadow-inner">
        <div class="relative z-10 text-center max-w-4xl mx-auto px-4">
            <h1 class="text-5xl md:text-6xl font-black font-['Montserrat',_sans-serif] text-white uppercase tracking-tighter mb-4 drop-shadow-2xl">
                About <span class="text-amber-500">Us</span>
            </h1>
            <p class="text-lg md:text-xl text-gray-300 font-medium font-['Montserrat',_sans-serif] max-w-2xl mx-auto leading-relaxed drop-shadow-md">
                Your Trusted Property Maintenance Partners
            </p>
        </div>
    </div>

    <div class="h-6 w-full hazard-tape shadow-[0_5px_15px_rgba(0,0,0,0.6)] relative z-20"></div>

    <div class="bg-slate-800 py-24">
        <div class="max-w-[96rem] mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 lg:grid-cols-12 gap-12 items-start">
                
                <div class="lg:col-span-7 relative bg-slate-900 border-2 border-slate-700 p-8 md:p-12 shadow-2xl rounded-sm">
                    
                    <div class="absolute top-4 left-4 w-4 h-4 rounded-full bg-gradient-to-br from-gray-300 to-gray-500 shadow-[inset_0_1px_3px_rgba(0,0,0,0.8)] flex items-center justify-center">
                        <div class="w-full h-[1px] bg-gray-800 rotate-45"></div>
                    </div>
                    <div class="absolute top-4 right-4 w-4 h-4 rounded-full bg-gradient-to-br from-gray-300 to-gray-500 shadow-[inset_0_1px_3px_rgba(0,0,0,0.8)] flex items-center justify-center">
                        <div class="w-full h-[1px] bg-gray-800 -rotate-12"></div>
                    </div>
                    <div class="absolute bottom-4 left-4 w-4 h-4 rounded-full bg-gradient-to-br from-gray-300 to-gray-500 shadow-[inset_0_1px_3px_rgba(0,0,0,0.8)] flex items-center justify-center">
                        <div class="w-full h-[1px] bg-gray-800 rotate-90"></div>
                    </div>
                    <div class="absolute bottom-4 right-4 w-4 h-4 rounded-full bg-gradient-to-br from-gray-300 to-gray-500 shadow-[inset_0_1px_3px_rgba(0,0,0,0.8)] flex items-center justify-center">
                        <div class="w-full h-[1px] bg-gray-800 rotate-[120deg]"></div>
                    </div>

                    <div class="relative z-10">
                        <div class="flex items-center gap-4 mb-8 border-b-2 border-slate-800 pb-6">
                            <div class="p-3 bg-slate-800 border border-slate-700 text-amber-500 shadow-inner">
                                <i data-lucide="building-2" class="w-8 h-8 stroke-[1.5]"></i>
                            </div>
                            <h2 class="text-3xl font-black text-white font-['Montserrat',_sans-serif] uppercase tracking-widest">Our Foundation</h2>
                        </div>
                        
                        <div class="space-y-6 text-gray-400 font-['Montserrat',_sans-serif] leading-relaxed text-lg">
                            <p>
                                Based in <strong class="text-white">Melbourne</strong> and proudly servicing regional areas, we specialize in comprehensive property maintenance. We understand that a property is more than just a structure; it’s an investment, a workspace, and a home.
                            </p>
                            <p>
                                Whether it's a minor hardware repair, a complete room lockup, or securing small unoccupied properties, our experienced team delivers top-tier craftsmanship on every single site. We approach every job with the same level of rigorous attention to detail and structural integrity.
                            </p>
                            <p>
                                Our ultimate goal is to ensure your property is safe, highly functional, and looking its absolute best, built to withstand the test of time.
                            </p>
                        </div>

                        <div class="mt-10 pt-8 border-t-2 border-dashed border-slate-700 flex items-center gap-6">
                            <div class="w-16 h-16 rounded-full border-4 border-amber-500 flex items-center justify-center bg-slate-800 shadow-[0_0_15px_rgba(245,158,11,0.2)] shrink-0">
                                <i data-lucide="shield-check" class="w-8 h-8 text-amber-500"></i>
                            </div>
                            <div>
                                <h4 class="text-white font-black uppercase tracking-widest font-['Montserrat',_sans-serif] mb-1">Licensed & Guaranteed</h4>
                                <p class="text-sm text-gray-500 font-['Montserrat',_sans-serif]">Fully insured for all residential and commercial structural repairs.</p>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="lg:col-span-5 grid grid-cols-1 sm:grid-cols-2 gap-6">
                    
                    <div class="bg-slate-900 border border-slate-700 p-8 shadow-xl border-t-4 border-t-amber-500 hover:-translate-y-1 transition-transform duration-300">
                        <i data-lucide="zap" class="w-10 h-10 text-amber-500 mb-5"></i>
                        <h3 class="text-white font-bold uppercase tracking-widest font-['Montserrat',_sans-serif] mb-3">Quick Turnaround</h3>
                        <p class="text-sm text-gray-400 font-['Montserrat',_sans-serif] leading-relaxed">We respect your timeline, executing projects efficiently without cutting corners.</p>
                    </div>

                    <div class="bg-slate-900 border border-slate-700 p-8 shadow-xl hover:-translate-y-1 transition-transform duration-300 relative overflow-hidden group">
                        <div class="absolute inset-0 bg-slate-800 translate-y-full group-hover:translate-y-0 transition-transform duration-300 -z-10"></div>
                        <i data-lucide="hammer" class="w-10 h-10 text-gray-500 group-hover:text-amber-500 transition-colors mb-5"></i>
                        <h3 class="text-white font-bold uppercase tracking-widest font-['Montserrat',_sans-serif] mb-3">Craftsmanship</h3>
                        <p class="text-sm text-gray-400 font-['Montserrat',_sans-serif] leading-relaxed">Precision tools, premium materials, and experienced hands on every job.</p>
                    </div>

                    <div class="bg-slate-900 border border-slate-700 p-8 shadow-xl hover:-translate-y-1 transition-transform duration-300 relative overflow-hidden group">
                        <div class="absolute inset-0 bg-slate-800 translate-y-full group-hover:translate-y-0 transition-transform duration-300 -z-10"></div>
                        <i data-lucide="hard-hat" class="w-10 h-10 text-gray-500 group-hover:text-amber-500 transition-colors mb-5"></i>
                        <h3 class="text-white font-bold uppercase tracking-widest font-['Montserrat',_sans-serif] mb-3">Safety First</h3>
                        <p class="text-sm text-gray-400 font-['Montserrat',_sans-serif] leading-relaxed">Strict adherence to building codes and OH&S regulations to keep sites secure.</p>
                    </div>

                    <div class="bg-slate-900 border border-slate-700 p-8 shadow-xl border-b-4 border-b-amber-500 hover:-translate-y-1 transition-transform duration-300">
                        <i data-lucide="gem" class="w-10 h-10 text-amber-500 mb-5"></i>
                        <h3 class="text-white font-bold uppercase tracking-widest font-['Montserrat',_sans-serif] mb-3">Reliability</h3>
                        <p class="text-sm text-gray-400 font-['Montserrat',_sans-serif] leading-relaxed">We show up on time, communicate clearly, and deliver exactly what we promise.</p>
                    </div>

                </div>

            </div>
        </div>
    </div>

</x-app-layout>