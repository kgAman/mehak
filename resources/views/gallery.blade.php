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

        <div class="max-w-[96rem] mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
            
            <div class="relative bg-slate-900 border-2 border-slate-700 shadow-2xl p-8 md:p-12 rounded-sm">
                
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

                <div class="flex items-center gap-4 mb-10 border-b border-slate-800 pb-6">
                    <div class="p-3 bg-slate-800 border border-slate-700 text-amber-500 shadow-inner">
                        <i data-lucide="image" class="w-8 h-8 stroke-[1.5]"></i>
                    </div>
                    <h2 class="text-3xl font-black text-white font-['Montserrat',_sans-serif] uppercase tracking-widest">Project Gallery</h2>
                </div>

                @php
                    $galleryItems = [
                        ['image' => 'https://images.unsplash.com/photo-1503387762-592deb58ef4e?q=80&w=1000&auto=format&fit=crop', 'title' => 'Structural Framing', 'location' => 'Richmond'],
                        ['image' => 'https://images.unsplash.com/photo-1581094794329-c8112a89af12?q=80&w=1000&auto=format&fit=crop', 'title' => 'Custom Cabinetry', 'location' => 'South Yarra'],
                        ['image' => 'https://images.unsplash.com/photo-1600585154340-be6161a56a0c?q=80&w=1000&auto=format&fit=crop', 'title' => 'Decking Restoration', 'location' => 'St Kilda'],
                        ['image' => 'https://images.unsplash.com/photo-1504307651254-35680f356dfd?q=80&w=1000&auto=format&fit=crop', 'title' => 'Heritage Renovation', 'location' => 'Carlton'],
                        ['image' => 'https://images.unsplash.com/photo-1541888081631-f18c8f000b21?q=80&w=1000&auto=format&fit=crop', 'title' => 'Commercial Fitout', 'location' => 'CBD'],
                        ['image' => 'https://images.unsplash.com/photo-1513694203232-719a280e022f?q=80&w=1000&auto=format&fit=crop', 'title' => 'Kitchen Overhaul', 'location' => 'Fitzroy'],
                        ['image' => 'https://images.unsplash.com/photo-1531834685032-c34bf0d84c77?q=80&w=1000&auto=format&fit=crop', 'title' => 'Roofing & Trusses', 'location' => 'Brunswick'],
                        ['image' => 'https://images.unsplash.com/photo-1505691938895-1758d7feb511?q=80&w=1000&auto=format&fit=crop', 'title' => 'Feature Walls', 'location' => 'Toorak']
                    ];
                @endphp

                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
                    @foreach ($galleryItems as $index => $item)
                    
                    <div class="relative w-full aspect-square bg-slate-800 border-2 border-slate-700 p-2 shadow-xl overflow-hidden group cursor-pointer transition-transform duration-300 hover:-translate-y-2 hover:shadow-[0_20px_40px_rgba(0,0,0,0.6)]">
                        
                        <div class="absolute top-0 left-0 h-1 bg-amber-500 shadow-[0_0_15px_#f59e0b] w-0 group-hover:w-full transition-all duration-500 ease-out z-30"></div>
                        <div class="absolute bottom-0 right-0 h-1 bg-amber-500 shadow-[0_0_15px_#f59e0b] w-0 group-hover:w-full transition-all duration-500 ease-out z-30"></div>
                        <div class="absolute top-0 right-0 w-1 bg-amber-500 shadow-[0_0_15px_#f59e0b] h-0 group-hover:h-full transition-all duration-500 ease-out z-30"></div>
                        <div class="absolute bottom-0 left-0 w-1 bg-amber-500 shadow-[0_0_15px_#f59e0b] h-0 group-hover:h-full transition-all duration-500 ease-out z-30"></div>

                        <div class="relative w-full h-full bg-black overflow-hidden border border-slate-800">
                            
                            <img src="{{ $item['image'] }}" alt="{{ $item['title'] }} Repaired" 
                                 class="absolute inset-0 w-full h-full object-cover transform scale-110 group-hover:scale-100 transition-transform duration-700 ease-out z-0" />
                            
                            <img src="{{ $item['image'] }}" alt="{{ $item['title'] }} Blueprint" 
                                 class="absolute inset-0 w-full h-full object-cover grayscale brightness-50 contrast-150 sepia-[0.5] hue-rotate-[180deg] z-10 transition-opacity duration-500 ease-in-out group-hover:opacity-0" />

                            <div class="absolute inset-0 z-10 pointer-events-none opacity-20 group-hover:opacity-0 transition-opacity duration-300" 
                                 style="background: repeating-linear-gradient(0deg, transparent, transparent 2px, rgba(255,255,255,0.1) 2px, rgba(255,255,255,0.1) 4px);"></div>

                            <div class="absolute bottom-0 left-0 right-0 bg-slate-900/90 backdrop-blur-md border-t-2 border-amber-500 p-4 transform translate-y-full group-hover:translate-y-0 transition-transform duration-500 ease-out z-20">
                                <h4 class="text-white font-black font-['Montserrat',_sans-serif] uppercase tracking-widest text-sm">{{ $item['title'] }}</h4>
                                <p class="text-amber-500 font-['Montserrat',_sans-serif] text-xs font-bold uppercase tracking-wider flex items-center gap-1 mt-1">
                                    <i data-lucide="map-pin" class="w-3 h-3"></i> {{ $item['location'] }}
                                </p>
                            </div>

                        </div>

                        <div class="absolute top-1 left-1 w-1.5 h-1.5 bg-slate-600 rounded-full shadow-inner z-40"></div>
                        <div class="absolute top-1 right-1 w-1.5 h-1.5 bg-slate-600 rounded-full shadow-inner z-40"></div>
                        <div class="absolute bottom-1 left-1 w-1.5 h-1.5 bg-slate-600 rounded-full shadow-inner z-40"></div>
                        <div class="absolute bottom-1 right-1 w-1.5 h-1.5 bg-slate-600 rounded-full shadow-inner z-40"></div>

                    </div>
                    @endforeach
                </div>

            </div>
        </div>
    </div>
</x-app-layout>