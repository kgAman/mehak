<div class="bg-slate-950 py-32 relative overflow-hidden border-t-4 border-amber-500" id="testimonials">
    
    <div class="absolute inset-0 z-0 opacity-20" 
         style="background-image: linear-gradient(#1e293b 2px, transparent 2px), linear-gradient(90deg, #1e293b 2px, transparent 2px); background-size: 60px 60px;">
    </div>

    <div class="text-center z-10 mb-20 relative">
        <h2 class="text-4xl md:text-6xl font-black font-['Montserrat',_sans-serif] text-white uppercase tracking-[0.15em] drop-shadow-[0_0_20px_rgba(245,158,11,0.2)]">
            Client <span class="text-amber-500">Feedback</span>
        </h2>
        <div class="flex justify-center items-center gap-4 mt-6">
            <div class="h-[2px] w-12 bg-slate-700"></div>
            <p class="text-amber-500 font-mono tracking-widest uppercase text-sm font-bold flex items-center gap-2">
                <i data-lucide="unlock" class="w-4 h-4"></i> Hover to unlock vaults
            </p>
            <div class="h-[2px] w-12 bg-slate-700"></div>
        </div>
    </div>

    @php
        // Fetch the 3 most recent testimonials from the database. 
        // If you only want to show ones marked as 'featured' in the admin panel, 
        // change this to: \App\Models\Testimonial::where('is_featured', true)->latest()->take(3)->get();
        $testimonials = \App\Models\Testimonial::latest()->take(3)->get();
    @endphp

    <div class="max-w-[96rem] mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">

            @forelse ($testimonials as $review)
            
            <div class="group relative w-full h-96 bg-[#020617] rounded-sm overflow-hidden cursor-pointer shadow-[0_20px_50px_rgba(0,0,0,0.9)] border-2 border-slate-800">
                
                <div class="absolute inset-0 p-8 flex flex-col justify-center opacity-0 scale-90 group-hover:opacity-100 group-hover:scale-100 transition-all duration-[800ms] delay-100 ease-[cubic-bezier(0.85,0,0.15,1)] z-0">
                    
                    <div class="absolute inset-0 opacity-10 pointer-events-none" style="background-image: linear-gradient(#f59e0b 1px, transparent 1px), linear-gradient(90deg, #f59e0b 1px, transparent 1px); background-size: 20px 20px;"></div>
                    
                    <div class="relative z-10">
                        <div class="flex gap-1 mb-6">
                            @for($i = 0; $i < $review->rating; $i++)
                                <i data-lucide="star" class="w-5 h-5 text-amber-500 fill-amber-500 drop-shadow-[0_0_8px_rgba(245,158,11,1)]"></i>
                            @endfor
                        </div>
                        
                        <p class="text-amber-50 font-['Montserrat',_sans-serif] leading-relaxed text-sm md:text-base font-medium drop-shadow-[0_0_5px_rgba(245,158,11,0.5)]">
                            "{{ $review->content }}"
                        </p>

                        <div class="mt-8 pt-6 border-t border-amber-900/50">
                            <h4 class="text-amber-500 font-black font-['Montserrat',_sans-serif] uppercase tracking-widest text-sm drop-shadow-[0_0_5px_rgba(245,158,11,0.8)]">{{ $review->client_name }}</h4>
                            
                            <p class="text-amber-500/60 font-mono text-xs font-bold uppercase tracking-wider mt-1">
                                {{ $review->category ?? 'Client' }} @if($review->client_company) • {{ $review->client_company }} @endif
                            </p>
                        </div>
                    </div>
                </div>


                <div class="absolute top-0 left-0 w-full h-1/2 bg-slate-900 border-b-2 border-slate-950 flex flex-col items-center justify-end transform origin-top transition-transform duration-[600ms] ease-[cubic-bezier(0.85,0,0.15,1)] group-hover:-translate-y-full shadow-[0_10px_30px_rgba(0,0,0,0.9)] z-10">
                    <div class="absolute top-0 left-0 w-full h-2 opacity-50" style="background-image: repeating-linear-gradient(45deg, #f59e0b 0, #f59e0b 10px, #0f172a 10px, #0f172a 20px);"></div>
                    
                    <span class="absolute top-4 left-6 text-slate-700 font-black font-mono text-xl opacity-30">LOG-{{ str_pad($review->id, 2, '0', STR_PAD_LEFT) }}</span>
                    
                    <div class="w-1/3 h-1 bg-slate-950 rounded-t-md mb-0"></div>
                    <div class="w-1/4 h-2 bg-slate-800 rounded-t-md mb-0 border-t border-x border-slate-700"></div>
                </div>

                <div class="absolute bottom-0 left-0 w-full h-1/2 bg-slate-900 border-t-2 border-slate-950 flex flex-col items-center justify-start transform origin-bottom transition-transform duration-[600ms] ease-[cubic-bezier(0.85,0,0.15,1)] group-hover:translate-y-full shadow-[0_-10px_30px_rgba(0,0,0,0.9)] z-10">
                    <div class="w-1/4 h-2 bg-slate-800 rounded-b-md mt-0 border-b border-x border-slate-700"></div>
                    <div class="w-1/3 h-1 bg-slate-950 rounded-b-md mt-0"></div>
                    
                    <span class="absolute bottom-4 text-slate-600 font-black font-mono text-xs uppercase tracking-[0.3em] opacity-40">Classified Record</span>
                </div>

                <div class="absolute top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2 z-20 transition-all duration-[600ms] ease-[cubic-bezier(0.85,0,0.15,1)] group-hover:scale-[2] group-hover:opacity-0 group-hover:rotate-90">
                    
                    <div class="w-24 h-24 rounded-full bg-slate-950 flex items-center justify-center border-4 border-slate-800 shadow-[0_0_30px_rgba(0,0,0,1)]">
                        <div class="w-16 h-16 rounded-full bg-amber-500 shadow-[inset_0_0_15px_rgba(0,0,0,0.5),_0_0_20px_rgba(245,158,11,0.6)] flex items-center justify-center border-2 border-amber-300">
                            <i data-lucide="lock" class="w-6 h-6 text-slate-900 stroke-[2.5]"></i>
                        </div>
                    </div>
                    
                    <div class="absolute top-1/2 -left-12 -translate-y-1/2 w-12 h-2 bg-slate-800 shadow-inner"></div>
                    <div class="absolute top-1/2 -right-12 -translate-y-1/2 w-12 h-2 bg-slate-800 shadow-inner"></div>
                </div>

                <div class="absolute inset-0 border-[8px] border-slate-950 pointer-events-none z-30"></div>
                <div class="absolute top-3 left-3 w-3 h-3 bg-slate-800 rounded-full shadow-inner z-30 border border-slate-950"></div>
                <div class="absolute top-3 right-3 w-3 h-3 bg-slate-800 rounded-full shadow-inner z-30 border border-slate-950"></div>
                <div class="absolute bottom-3 left-3 w-3 h-3 bg-slate-800 rounded-full shadow-inner z-30 border border-slate-950"></div>
                <div class="absolute bottom-3 right-3 w-3 h-3 bg-slate-800 rounded-full shadow-inner z-30 border border-slate-950"></div>

            </div>
            
            @empty
            <div class="col-span-full py-12 text-center flex flex-col items-center justify-center">
                <i data-lucide="message-square-off" class="w-12 h-12 text-slate-600 mb-4"></i>
                <p class="text-slate-400 font-mono text-sm uppercase tracking-widest">No feedback records available yet.</p>
            </div>
            @endforelse

        </div>
    </div>
</div>