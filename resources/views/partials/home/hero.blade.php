<div class="relative h-[85vh] flex items-center justify-center overflow-hidden">
    
    <video autoplay loop muted playsinline class="absolute z-0 w-auto min-w-full min-h-full max-w-none object-cover scale-105">
        <source src="{{ asset('repair-hero-video.mp4') }}" type="video/mp4">
        Your browser does not support the video tag.
    </video>

    <div class="absolute z-10 inset-0 bg-gradient-to-b from-slate-900/60 via-slate-900/70 to-slate-900/95"></div>

    <div class="relative z-20 text-center px-4 sm:px-6 lg:px-8 max-w-5xl mx-auto flex flex-col items-center">
        
        <div class="w-24 h-1.5 bg-amber-500 mb-8 rounded-full shadow-[0_0_15px_rgba(245,158,11,0.5)]"></div>

        <div class="relative inline-block">
            
            <div class="absolute -top-4 -right-8 md:-top-6 md:-right-12 flex items-start gap-2 opacity-90 drop-shadow-xl hidden sm:flex">
                <div class="w-7 h-7 rounded-full bg-gradient-to-br from-gray-300 to-gray-500 shadow-[inset_0_2px_5px_rgba(0,0,0,0.8),_0_2px_4px_rgba(0,0,0,0.5)] flex items-center justify-center">
                    <div class="w-[90%] h-[2px] bg-slate-800 rotate-45 shadow-[0_1px_0_rgba(255,255,255,0.3)]"></div>
                </div>
                <div class="w-5 h-5 mt-5 rounded-full bg-gradient-to-br from-gray-300 to-gray-600 shadow-[inset_0_1px_4px_rgba(0,0,0,0.8),_0_2px_4px_rgba(0,0,0,0.5)] flex items-center justify-center">
                    <div class="w-[90%] h-[1.5px] bg-slate-800 -rotate-12 shadow-[0_1px_0_rgba(255,255,255,0.3)]"></div>
                </div>
            </div>

            <h1 class="text-6xl sm:text-7xl md:text-8xl font-extrabold font-['Montserrat',_sans-serif] text-white tracking-tighter mb-6 uppercase drop-shadow-lg leading-tight">
                Expert Property <br class="hidden sm:block"/> 
                Maintenance & <span class="text-amber-500 drop-shadow-[0_2px_10px_rgba(245,158,11,0.4)]">Repair</span>
            </h1>
        </div>
        
        <p class="mt-4 text-xl sm:text-2xl md:text-3xl font-['Montserrat',_sans-serif] text-gray-300 font-light leading-relaxed mb-12 max-w-4xl mx-auto drop-shadow-md">
            Professional, reliable, and high-quality carpentry, landscaping, and repair services across <strong class="text-white font-semibold">Melbourne</strong> and Regional areas.
        </p>
        
        <div class="flex flex-col sm:flex-row justify-center gap-6 w-full sm:w-auto">
            
            <a href="{{ route('contact') }}" class="inline-flex justify-center items-center rounded-md border border-transparent bg-amber-500 px-10 py-5 text-lg font-bold font-['Montserrat',_sans-serif] text-slate-900 shadow-lg hover:bg-amber-400 hover:-translate-y-1 hover:shadow-xl hover:shadow-amber-500/30 transition-all duration-300 uppercase tracking-wider w-full sm:w-auto">
                Get a Free Quote
            </a>
            
            <a href="{{ route('services') }}" class="inline-flex justify-center items-center rounded-md border-2 border-gray-300/50 bg-white/5 backdrop-blur-sm px-10 py-5 text-lg font-bold font-['Montserrat',_sans-serif] text-white shadow-sm hover:bg-white hover:text-slate-900 hover:border-white hover:-translate-y-1 hover:shadow-xl transition-all duration-300 uppercase tracking-wider w-full sm:w-auto">
                Explore Services
            </a>
            
        </div>
    </div>
</div>