<x-app-layout>
    
    <style>
        /* Smooth shifting dark metal background */
        .bg-motion-metal {
            background-size: 200% 200%;
            animation: motion-gradient 8s ease infinite;
        }
        @keyframes motion-gradient {
            0% { background-position: 0% 50%; }
            50% { background-position: 100% 50%; }
            100% { background-position: 0% 50%; }
        }

        /* Moving yellow and black hazard tape */
        .hazard-tape {
            background-image: repeating-linear-gradient(
                -45deg, 
                #f59e0b 0,      /* Tailwind amber-500 */
                #f59e0b 25px, 
                #0f172a 25px,   /* Tailwind slate-900 */
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
                Get a <span class="text-amber-500">Free Quote</span>
            </h1>
            <p class="text-lg md:text-xl text-gray-300 font-medium font-['Montserrat',_sans-serif] max-w-2xl mx-auto leading-relaxed drop-shadow-md">
                Fast, reliable estimates for your property maintenance needs.
            </p>
        </div>
    </div>

    <div class="h-6 w-full hazard-tape shadow-[0_5px_15px_rgba(0,0,0,0.6)] relative z-20"></div>

    <div class="bg-slate-800 py-20">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            
            <div class="relative bg-slate-900 border-2 border-slate-700 shadow-2xl p-8 md:p-12 grid grid-cols-1 md:grid-cols-2 gap-12 rounded-sm">
                
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

                <div class="relative z-10 flex flex-col justify-center">
                    <div class="flex items-center gap-4 mb-6">
                        <div class="p-3 bg-slate-800 border border-slate-700 text-amber-500 shadow-inner">
                            <i data-lucide="clipboard-signature" class="w-8 h-8 stroke-[1.5]"></i>
                        </div>
                        <h2 class="text-3xl font-black text-white font-['Montserrat',_sans-serif] uppercase tracking-widest">Contact Us</h2>
                    </div>
                    
                    <p class="text-gray-400 mb-10 font-['Montserrat',_sans-serif] leading-relaxed text-lg">
                        Need a repair, an installation, or a full property check? Fill out the form with your project details, and attach any photos of the area that needs work so we can provide an accurate, honest estimate.
                    </p>

                    <div class="bg-slate-800 border-l-4 border-amber-500 p-6 shadow-inner relative overflow-hidden">
                        <div class="absolute inset-0 opacity-5 pointer-events-none hazard-tape"></div>
                        
                        <div class="relative z-10">
                            <div class="flex items-center gap-3 mb-2">
                                <i data-lucide="map-pin" class="w-5 h-5 text-amber-500"></i>
                                <h4 class="text-white font-bold uppercase tracking-widest font-['Montserrat',_sans-serif]">Service Area</h4>
                            </div>
                            <p class="text-gray-400 font-['Montserrat',_sans-serif] pl-8">Proudly serving Melbourne & Regional Areas.</p>
                        </div>
                    </div>
                    
                    <div class="mt-8 space-y-4 font-['Montserrat',_sans-serif]">
                        <div class="flex items-center gap-3 text-gray-400 hover:text-amber-500 transition-colors">
                            <i data-lucide="phone" class="w-5 h-5"></i>
                            <span class="font-bold tracking-wider">1800 REPAIR (1800 737 247)</span>
                        </div>
                        <div class="flex items-center gap-3 text-gray-400 hover:text-amber-500 transition-colors">
                            <i data-lucide="mail" class="w-5 h-5"></i>
                            <span class="font-bold tracking-wider">info@mehak.au</span>
                        </div>
                    </div>
                </div>

                <div class="relative z-10">
                    <form action="{{ route('contact.submit') }}" method="POST" enctype="multipart/form-data" class="space-y-6">
                        @csrf 
                        
                        <div>
                            <label class="block text-xs font-bold text-gray-400 uppercase tracking-widest font-['Montserrat',_sans-serif] mb-2">Full Name <span class="text-amber-500">*</span></label>
                            <input type="text" name="full_name" required class=" @error('full_name') border-amber-500 focus:border-amber-500 focus:ring-amber-500 @enderror block w-full rounded-sm bg-slate-800 border-slate-600 text-white placeholder-gray-500 focus:border-amber-500 focus:ring-amber-500 shadow-inner transition-colors">
                            <!-- Validation error message -->
                            @error('full_name')
                                <p class="text-amber-500 text-sm mt-1">{{ $message }}</p>
                            @enderror
                        </div>
                        
                        <div>
                            <label class="block text-xs font-bold text-gray-400 uppercase tracking-widest font-['Montserrat',_sans-serif] mb-2">Email Address <span class="text-amber-500">*</span></label>
                            <input type="email" name="email_address" required class=" @error('email_address') border-amber-500 focus:border-amber-500 focus:ring-amber-500 @enderror block w-full rounded-sm bg-slate-800 border-slate-600 text-white placeholder-gray-500 focus:border-amber-500 focus:ring-amber-500 shadow-inner transition-colors">
                            <!-- Validation error message -->
                            @error('email_address')
                                <p class="text-amber-500 text-sm mt-1">{{ $message }}</p>
                            @enderror
                        </div>
                        
                        <div>
                            <label class="block text-xs font-bold text-gray-400 uppercase tracking-widest font-['Montserrat',_sans-serif] mb-2">Service Required <span class="text-amber-500">*</span></label>
                            <select name="service_required" class=" @error('service_required') border-amber-500 focus:border-amber-500 focus:ring-amber-500 @enderror block w-full rounded-sm bg-slate-800 border-slate-600 text-white focus:border-amber-500 focus:ring-amber-500 shadow-inner transition-colors">
                                <option class="bg-slate-800 text-white">General Carpentry</option>
                                <option class="bg-slate-800 text-white">Insurance Repair</option>
                                <option class="bg-slate-800 text-white">Flooring (Hybrid/Laminate)</option>
                                <option class="bg-slate-800 text-white">Doors & Hardware</option>
                                <option class="bg-slate-800 text-white">Other</option>
                            </select>
                            <!-- Validation error message -->
                            @error('service_required')
                                <p class="text-amber-500 text-sm mt-1">{{ $message }}</p>
                            @enderror
                        </div>
                        
                        <div>
                            <label class="block text-xs font-bold text-gray-400 uppercase tracking-widest font-['Montserrat',_sans-serif] mb-2">Project Details <span class="text-amber-500">*</span></label>
                            <textarea name="project_details" rows="4" placeholder="Describe the damage or work required..." class=" @error('project_details') border-amber-500 focus:border-amber-500 focus:ring-amber-500 @enderror block w-full rounded-sm bg-slate-800 border-slate-600 text-white placeholder-gray-500 focus:border-amber-500 focus:ring-amber-500 shadow-inner transition-colors"></textarea>
                            <!-- Validation error message -->
                            @error('project_details')
                                <p class="text-amber-500 text-sm mt-1">{{ $message }}</p>
                            @enderror
                        </div>
                        
                        <div class="relative bg-slate-800 border-2 border-dashed border-slate-600 p-4 rounded-sm hover:border-amber-500 transition-colors group">
                            <label class="block text-xs font-bold text-gray-400 uppercase tracking-widest font-['Montserrat',_sans-serif] mb-3 flex items-center gap-2">
                                <i data-lucide="camera" class="w-4 h-4 text-amber-500"></i> Attach Site Photos (Optional)
                            </label>
                            <input type="file" name="site_photo" accept="image/*" class=" @error('site_photo') border-amber-500 focus:border-amber-500 focus:ring-amber-500 @enderror block w-full text-sm text-gray-400 
                                file:mr-4 file:py-2.5 file:px-4 
                                file:rounded-sm file:border-0 
                                file:text-xs file:font-bold file:uppercase file:tracking-widest 
                                file:bg-slate-700 file:text-amber-500 
                                hover:file:bg-slate-600 file:cursor-pointer cursor-pointer transition-colors">
                            <!-- Validation error message -->
                            @error('site_photo')
                                <p class="text-amber-500 text-sm mt-1">{{ $message }}</p>
                            @enderror
                        </div>
                        
                        <button type="submit" class="w-full inline-flex justify-center items-center gap-3 rounded-sm bg-amber-500 px-8 py-4 text-base font-black font-['Montserrat',_sans-serif] text-slate-900 shadow-[4px_4px_0px_0px_#475569] hover:shadow-[2px_2px_0px_0px_#475569] hover:translate-x-[2px] hover:translate-y-[2px] transition-all duration-200 uppercase tracking-widest mt-4">
                            Submit Inquiry <i data-lucide="send" class="w-5 h-5"></i>
                        </button>
                    </form>
                </div>

            </div>
        </div>
    </div>
</x-app-layout>