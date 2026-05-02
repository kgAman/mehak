<nav x-data="{ open: false }" class="bg-slate-900 border-t-4 border-amber-500 border-b-2 border-slate-700 shadow-xl font-['Montserrat',_sans-serif] relative z-50">
    <div class="max-w-[96rem] mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between h-20"> 
            <div class="flex items-center">
                
                <!-- UPDATED COMPANY LOGO & NAME -->
                <div class="shrink-0 flex items-center border-r border-slate-700 pr-4 mr-4 lg:pr-6 lg:mr-6 h-12">
                    <a href="{{ route('home') }}" class="flex items-center gap-3 group">
                        <div class="w-10 h-10 bg-amber-500 flex items-center justify-center shadow-[inset_0_-2px_4px_rgba(0,0,0,0.4)] group-hover:bg-amber-400 transition-colors">
                            <span class="text-slate-900 font-black text-2xl leading-none">H</span>
                        </div>
                        <div class="flex flex-col justify-center">
                            <span class="text-white font-extrabold text-sm lg:text-lg tracking-widest uppercase leading-tight">Hare Krishna <span class="text-amber-500">Homes</span></span>
                            <span class="text-[9px] lg:text-[10px] text-slate-400 tracking-[0.2em] uppercase font-bold mt-0.5">Private Limited</span>
                        </div>
                    </a>
                </div>

                <div class="hidden lg:flex space-x-3 xl:space-x-6 h-full items-center">
                    @php
                        $navClasses = "relative h-full flex items-center px-1 text-xs xl:text-sm font-bold uppercase tracking-widest transition-colors duration-200 border-b-4 border-transparent hover:text-amber-500 hover:border-amber-500/50";
                        $activeClasses = "text-amber-500 border-b-4 border-amber-500";
                        $inactiveClasses = "text-gray-300";
                    @endphp

                    <a href="{{ route('home') }}" class="{{ $navClasses }} {{ request()->routeIs('home') ? $activeClasses : $inactiveClasses }}">Home</a>
                    <a href="{{ route('about') }}" class="{{ $navClasses }} {{ request()->routeIs('about') ? $activeClasses : $inactiveClasses }}">About</a>
                    <a href="{{ route('services') }}" class="{{ $navClasses }} {{ request()->routeIs('services') ? $activeClasses : $inactiveClasses }}">Services</a>
                    <a href="{{ route('portfolio') }}" class="{{ $navClasses }} {{ request()->routeIs('portfolio') ? $activeClasses : $inactiveClasses }}">Portfolio</a>
                    <a href="{{ route('gallery') }}" class="{{ $navClasses }} {{ request()->routeIs('gallery') ? $activeClasses : $inactiveClasses }}">Gallery</a>
                    <a href="{{ route('testimonials') }}" class="{{ $navClasses }} {{ request()->routeIs('testimonials') ? $activeClasses : $inactiveClasses }}">Testimonials</a>
                    <a href="{{ route('contact') }}" class="{{ $navClasses }} {{ request()->routeIs('contact') ? $activeClasses : $inactiveClasses }}">Contact</a>
                </div>
            </div>

            <div class="hidden lg:flex items-center space-x-6">
                <a href="{{ route('booking') }}" class="bg-amber-500 text-slate-900 px-6 py-2.5 font-black text-sm uppercase tracking-widest shadow-[4px_4px_0px_0px_#475569] hover:shadow-[2px_2px_0px_0px_#475569] hover:translate-x-[2px] hover:translate-y-[2px] transition-all duration-200 flex items-center gap-2">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="square" stroke-linejoin="miter" stroke-width="3" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path></svg>
                    Book Now
                </a>
            </div>

            <div class="-me-2 flex items-center lg:hidden">
                <button @click="open = ! open" class="inline-flex items-center justify-center p-3 rounded-sm text-gray-400 hover:text-amber-500 hover:bg-slate-800 focus:outline-none transition duration-150 ease-in-out">
                    <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                        <path :class="{'hidden': open, 'inline-flex': ! open }" class="inline-flex" stroke-linecap="square" stroke-linejoin="miter" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                        <path :class="{'hidden': ! open, 'inline-flex': open }" class="hidden" stroke-linecap="square" stroke-linejoin="miter" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
        </div>
    </div>

    <div :class="{'block': open, 'hidden': ! open}" class="hidden lg:hidden bg-slate-900 border-t border-slate-800 absolute w-full z-40 shadow-2xl">
        <div class="pt-2 pb-3 space-y-1">
            @php
                $mobileNavClasses = "block pl-3 pr-4 py-3 border-l-4 text-base font-bold uppercase tracking-widest transition duration-150 ease-in-out";
                $mobileActive = "border-amber-500 text-amber-500 bg-slate-800/50";
                $mobileInactive = "border-transparent text-gray-400 hover:text-gray-200 hover:bg-slate-800 hover:border-slate-600";
            @endphp

            <a href="{{ route('home') }}" class="{{ $mobileNavClasses }} {{ request()->routeIs('home') ? $mobileActive : $mobileInactive }}">Home</a>
            <a href="{{ route('about') }}" class="{{ $mobileNavClasses }} {{ request()->routeIs('about') ? $mobileActive : $mobileInactive }}">About</a>
            <a href="{{ route('services') }}" class="{{ $mobileNavClasses }} {{ request()->routeIs('services') ? $mobileActive : $mobileInactive }}">Services</a>
            <a href="{{ route('portfolio') }}" class="{{ $mobileNavClasses }} {{ request()->routeIs('portfolio') ? $mobileActive : $mobileInactive }}">Portfolio</a>
            <a href="{{ route('gallery') }}" class="{{ $mobileNavClasses }} {{ request()->routeIs('gallery') ? $mobileActive : $mobileInactive }}">Gallery</a>
            <a href="{{ route('testimonials') }}" class="{{ $mobileNavClasses }} {{ request()->routeIs('testimonials') ? $mobileActive : $mobileInactive }}">Testimonials</a>
            <a href="{{ route('contact') }}" class="{{ $mobileNavClasses }} {{ request()->routeIs('contact') ? $mobileActive : $mobileInactive }}">Contact</a>
            
            <a href="{{ route('booking') }}" class="block mx-4 my-4 bg-amber-500 text-slate-900 text-center py-3 font-black uppercase tracking-widest shadow-[4px_4px_0px_0px_#475569]">
                Book Now
            </a>
        </div>
    </div>
</nav>