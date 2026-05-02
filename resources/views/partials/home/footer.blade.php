<footer class="bg-slate-950 relative border-t-4 border-amber-500 overflow-hidden">
    
    <div class="max-w-[96rem] mx-auto px-4 sm:px-6 lg:px-8 py-24 relative z-10">
        <div class="grid grid-cols-1 md:grid-cols-3 gap-12 text-center md:text-left">
            
            <div class="flex flex-col items-center md:items-start">
                <a href="{{ route('home') }}" class="flex items-center gap-3 group mb-6">
                    <div class="w-10 h-10 bg-amber-500 flex items-center justify-center shadow-[inset_0_-2px_4px_rgba(0,0,0,0.4)] transition-colors shrink-0">
                        <span class="text-slate-900 font-black text-2xl leading-none">H</span>
                    </div>
                    <div class="flex flex-col text-left">
                        <span class="text-white font-extrabold text-xl tracking-widest uppercase leading-tight">Hare Krishna <span class="text-amber-500">Homes</span></span>
                        <span class="text-[10px] text-slate-400 tracking-[0.2em] uppercase font-bold mt-0.5">Private Limited</span>
                    </div>
                </a>
                <p class="text-gray-500 font-['Montserrat',_sans-serif] text-sm leading-relaxed max-w-xs">
                    Professional, reliable, and high-quality property maintenance, carpentry, and repair services across Melbourne.
                </p>
            </div>

            <div class="flex flex-col items-center md:items-start font-['Montserrat',_sans-serif]">
                <h3 class="text-white font-black uppercase tracking-widest mb-6">Quick Links</h3>
                <ul class="space-y-4">
                    <li><a href="{{ route('services') }}" class="text-gray-400 hover:text-amber-500 transition-colors uppercase text-sm font-bold tracking-wider">Our Services</a></li>
                    <li><a href="{{ route('about') }}" class="text-gray-400 hover:text-amber-500 transition-colors uppercase text-sm font-bold tracking-wider">About Us</a></li>
                    <li><a href="{{ route('booking') }}" class="text-gray-400 hover:text-amber-500 transition-colors uppercase text-sm font-bold tracking-wider">Book Inspection</a></li>
                    <li><a href="{{ route('contact') }}" class="text-gray-400 hover:text-amber-500 transition-colors uppercase text-sm font-bold tracking-wider">Get a Quote</a></li>
                </ul>
            </div>

            <div class="flex flex-col items-center md:items-start font-['Montserrat',_sans-serif]">
                <h3 class="text-white font-black uppercase tracking-widest mb-6">Contact</h3>
                <ul class="space-y-4 mb-8">
                    <li class="flex items-center gap-3 text-gray-400">
                        <i data-lucide="phone" class="w-5 h-5 text-amber-500 shrink-0"></i> +61 406 819 972
                    </li>
                    <li class="flex items-center gap-3 text-gray-400">
                        <i data-lucide="mail" class="w-5 h-5 text-amber-500 shrink-0"></i> info@mehak.au
                    </li>
                    <li class="flex items-start gap-3 text-gray-400 text-left">
                        <i data-lucide="map-pin" class="w-5 h-5 text-amber-500 shrink-0 mt-0.5"></i> 
                        <span>52 Mainview Boulevard,<br>Truganina 3029 VIC</span>
                    </li>
                </ul>
            </div>

        </div>

        <div class="mt-20 pt-8 border-t border-slate-800 flex flex-col md:flex-row justify-between items-center gap-4">
            <p class="text-slate-600 font-['Montserrat',_sans-serif] text-sm font-bold uppercase tracking-widest text-center md:text-left">
                &copy; {{ date('Y') }} Hare Krishna Homes Private Limited. All rights reserved.
            </p>
            <div class="flex gap-6">
                <a href="{{ route('login') }}" class="text-slate-700 hover:text-amber-500 transition-colors">
                    <i data-lucide="lock" class="w-4 h-4"></i>
                </a>
            </div>
        </div>
    </div>
</footer>