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

        /* Forces the browser's native calendar/clock popups into dark mode */
        .dark-picker { color-scheme: dark; }
    </style>

    <div class="relative py-20 overflow-hidden bg-gradient-to-r from-slate-900 via-slate-700 to-slate-900 bg-motion-metal shadow-inner">
        <div class="relative z-10 text-center max-w-4xl mx-auto px-4">
            <h1 class="text-5xl md:text-6xl font-black font-['Montserrat',_sans-serif] text-white uppercase tracking-tighter mb-4 drop-shadow-2xl">
                Book <span class="text-amber-500">Inspection</span>
            </h1>
            <p class="text-lg md:text-xl text-gray-300 font-medium font-['Montserrat',_sans-serif] max-w-2xl mx-auto leading-relaxed drop-shadow-md">
                Select your preferred date and time for a site visit.
            </p>
        </div>
    </div>

    <div class="h-6 w-full hazard-tape shadow-[0_5px_15px_rgba(0,0,0,0.6)] relative z-20"></div>

    <div class="bg-slate-800 py-20">
        <div class="max-w-5xl mx-auto px-4 sm:px-6 lg:px-8">
            
            <div class="relative bg-slate-900 border-2 border-slate-700 p-8 md:p-12 shadow-2xl rounded-sm">
                
                <div class="absolute top-4 left-4 w-4 h-4 rounded-full bg-gradient-to-br from-gray-300 to-gray-500 shadow-[inset_0_1px_3px_rgba(0,0,0,0.8)]"><div class="w-full h-[1px] bg-gray-800 rotate-45 mt-1.5"></div></div>
                <div class="absolute top-4 right-4 w-4 h-4 rounded-full bg-gradient-to-br from-gray-300 to-gray-500 shadow-[inset_0_1px_3px_rgba(0,0,0,0.8)]"><div class="w-full h-[1px] bg-gray-800 -rotate-12 mt-1.5"></div></div>
                <div class="absolute bottom-4 left-4 w-4 h-4 rounded-full bg-gradient-to-br from-gray-300 to-gray-500 shadow-[inset_0_1px_3px_rgba(0,0,0,0.8)]"><div class="w-full h-[1px] bg-gray-800 rotate-90 mt-1.5"></div></div>
                <div class="absolute bottom-4 right-4 w-4 h-4 rounded-full bg-gradient-to-br from-gray-300 to-gray-500 shadow-[inset_0_1px_3px_rgba(0,0,0,0.8)]"><div class="w-full h-[1px] bg-gray-800 rotate-[120deg] mt-1.5"></div></div>

                <div class="relative z-10 flex items-center gap-4 mb-10 border-b-2 border-slate-800 pb-6">
                    <div class="p-3 bg-slate-800 border border-slate-700 text-amber-500 shadow-inner">
                        <i data-lucide="calendar-check" class="w-8 h-8 stroke-[1.5]"></i>
                    </div>
                    <div>
                        <h2 class="text-3xl font-black text-white font-['Montserrat',_sans-serif] uppercase tracking-widest">Schedule Visit</h2>
                        <p class="text-gray-400 text-sm font-['Montserrat',_sans-serif] mt-1">Our team will confirm your exact time slot via phone.</p>
                    </div>
                </div>

                <form action="{{ route('booking.submit') }}" method="POST" class="relative z-10 space-y-8">
                    @csrf 
                    
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-10">
                        
                        <div class="space-y-6">
                            <h3 class="text-amber-500 font-bold uppercase tracking-widest text-sm border-b border-slate-700 pb-2 flex items-center gap-2">
                                <i data-lucide="user" class="w-4 h-4"></i> 1. Contact Info
                            </h3>

                            <div>
                                <label class="block text-xs font-bold text-gray-400 uppercase tracking-widest font-['Montserrat',_sans-serif] mb-2">Full Name</label>
                                <input type="text" name="full_name" required class=" @error('full_name') border-amber-500 focus:border-amber-500 focus:ring-amber-500 @enderror block w-full rounded-sm bg-slate-800 border-slate-600 text-white placeholder-gray-500 focus:border-amber-500 focus:ring-amber-500 shadow-inner transition-colors">
                                <!-- Validation error message -->
                                @error('full_name')
                                    <p class="text-amber-500 text-sm mt-1">{{ $message }}</p>
                                @enderror
                            </div>
                            
                            <div>
                                <label class="block text-xs font-bold text-gray-400 uppercase tracking-widest font-['Montserrat',_sans-serif] mb-2">Phone Number</label>
                                <input type="tel" name="phone_number" required class=" @error('phone_number') border-amber-500 focus:border-amber-500 focus:ring-amber-500 @enderror block w-full rounded-sm bg-slate-800 border-slate-600 text-white placeholder-gray-500 focus:border-amber-500 focus:ring-amber-500 shadow-inner transition-colors">
                                <!-- Validation error message -->
                                @error('phone_number')
                                    <p class="text-amber-500 text-sm mt-1">{{ $message }}</p>
                                @enderror
                            </div>

                            <div>
                                <label class="block text-xs font-bold text-gray-400 uppercase tracking-widest font-['Montserrat',_sans-serif] mb-2">Email Address</label>
                                <input type="email" name="email_address" required class=" @error('email_address') border-amber-500 focus:border-amber-500 focus:ring-amber-500 @enderror block w-full rounded-sm bg-slate-800 border-slate-600 text-white placeholder-gray-500 focus:border-amber-500 focus:ring-amber-500 shadow-inner transition-colors">
                                <!-- Validation error message -->
                                @error('email_address')
                                    <p class="text-amber-500 text-sm mt-1">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>

                        <div class="space-y-6">
                            <h3 class="text-amber-500 font-bold uppercase tracking-widest text-sm border-b border-slate-700 pb-2 flex items-center gap-2">
                                <i data-lucide="map-pin" class="w-4 h-4"></i> 2. Project Details
                            </h3>

                            <div>
                                <label class="block text-xs font-bold text-gray-400 uppercase tracking-widest font-['Montserrat',_sans-serif] mb-2">Property Location / Suburb</label>
                                <input type="text" name="property_location" required class=" @error('property_location') border-amber-500 focus:border-amber-500 focus:ring-amber-500 @enderror block w-full rounded-sm bg-slate-800 border-slate-600 text-white placeholder-gray-500 focus:border-amber-500 focus:ring-amber-500 shadow-inner transition-colors">
                                <!-- Validation error message -->
                                @error('property_location')
                                    <p class="text-amber-500 text-sm mt-1">{{ $message }}</p>
                                @enderror
                            </div>
                            
                            <div class="grid grid-cols-2 gap-4">
                                <div>
                                    <label class="block text-xs font-bold text-gray-400 uppercase tracking-widest font-['Montserrat',_sans-serif] mb-2">Preferred Date</label>
                                    <input type="date" name="preferred_date" required class=" @error('preferred_date') border-amber-500 focus:border-amber-500 focus:ring-amber-500 @enderror dark-picker block w-full rounded-sm bg-slate-800 border-slate-600 text-white focus:border-amber-500 focus:ring-amber-500 shadow-inner transition-colors">
                                    <!-- Validation error message -->
                                    @error('preferred_date')
                                        <p class="text-amber-500 text-sm mt-1">{{ $message }}</p>
                                    @enderror
                                </div>
                                <div>
                                    <label class="block text-xs font-bold text-gray-400 uppercase tracking-widest font-['Montserrat',_sans-serif] mb-2">Preferred Time</label>
                                    <input type="time" name="preferred_time" required class=" @error('preferred_time') border-amber-500 focus:border-amber-500 focus:ring-amber-500 @enderror dark-picker block w-full rounded-sm bg-slate-800 border-slate-600 text-white focus:border-amber-500 focus:ring-amber-500 shadow-inner transition-colors">
                                    <!-- Validation error message -->
                                    @error('preferred_time')
                                        <p class="text-amber-500 text-sm mt-1">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>

                            <div>
                                <label class="block text-xs font-bold text-gray-400 uppercase tracking-widest font-['Montserrat',_sans-serif] mb-2">Service Required</label>
                                <select name="service_required" class=" @error('service_required') border-amber-500 focus:border-amber-500 focus:ring-amber-500 @enderror block w-full rounded-sm bg-slate-800 border-slate-600 text-white focus:border-amber-500 focus:ring-amber-500 shadow-inner transition-colors">
                                    <option class="bg-slate-800 text-white">General Consultation</option>
                                    <option class="bg-slate-800 text-white">Damage & Insurance Repair</option>
                                    <option class="bg-slate-800 text-white">Carpentry & Structural</option>
                                    <option class="bg-slate-800 text-white">Other Maintenance</option>
                                </select>
                                <!-- Validation error message -->
                                @error('service_required')
                                    <p class="text-amber-500 text-sm mt-1">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>

                    </div>

                    <div class="pt-4 border-t border-slate-800">
                        <label class="block text-xs font-bold text-gray-400 uppercase tracking-widest font-['Montserrat',_sans-serif] mb-2">Brief Details (Optional)</label>
                        <textarea name="brief_details" rows="3" placeholder="Any specific instructions for the site visit?" class=" @error('brief_details') border-amber-500 focus:border-amber-500 focus:ring-amber-500 @enderror block w-full rounded-sm bg-slate-800 border-slate-600 text-white placeholder-gray-500 focus:border-amber-500 focus:ring-amber-500 shadow-inner transition-colors"></textarea>
                        <!-- Validation error message -->
                        @error('brief_details')
                            <p class="text-amber-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    
                    </div>
                    
                    <button type="submit" class="w-full inline-flex justify-center items-center gap-3 rounded-sm bg-amber-500 px-8 py-4 text-lg font-black font-['Montserrat',_sans-serif] text-slate-900 shadow-[4px_4px_0px_0px_#475569] hover:shadow-[2px_2px_0px_0px_#475569] hover:translate-x-[2px] hover:translate-y-[2px] transition-all duration-200 uppercase tracking-widest mt-6">
                        Confirm Booking Request <i data-lucide="check-circle" class="w-6 h-6"></i>
                    </button>
                </form>

            </div>
            
        </div>
    </div>
</x-app-layout>