<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Command Center - Property Maintenance</title>

    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400;600;800;900&display=swap" rel="stylesheet">
    <script src="https://unpkg.com/lucide@latest"></script>

    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <style>
        .hazard-tape {
            background-image: repeating-linear-gradient(-45deg, #f59e0b 0, #f59e0b 25px, #0f172a 25px, #0f172a 50px);
            background-size: 70px 70px;
        }
        
        /* Custom scrollbar to match the industrial theme */
        ::-webkit-scrollbar {
            width: 8px;
            height: 8px;
        }
        ::-webkit-scrollbar-track {
            background: #0f172a; 
        }
        ::-webkit-scrollbar-thumb {
            background: #334155; 
            border-radius: 4px;
        }
        ::-webkit-scrollbar-thumb:hover {
            background: #f59e0b; 
        }
    </style>
</head>
<!-- Changed to flex-col to stack the Navbar on top of the body -->
<body class="font-['Montserrat',_sans-serif] bg-[#020617] text-white overflow-hidden h-screen w-screen selection:bg-amber-500 selection:text-slate-900 flex flex-col">

    <!-- ========================================== -->
    <!-- 1. FULL WIDTH TOP APP NAVIGATION           -->
    <!-- ========================================== -->
    <div class="w-full relative z-[60] shadow-[0_10px_30px_rgba(0,0,0,0.8)] border-b border-slate-800">
        @include('layouts.navigation')
    </div>

    <!-- ========================================== -->
    <!-- 2. SPLIT BODY AREA (Sidebar + Content)     -->
    <!-- ========================================== -->
    <div class="flex flex-1 overflow-hidden relative w-full">
        
        <!-- Background Blueprint Grid -->
        <div class="absolute inset-0 opacity-[0.03] pointer-events-none z-0" style="background-image: linear-gradient(#f59e0b 1px, transparent 1px), linear-gradient(90deg, #f59e0b 1px, transparent 1px); background-size: 40px 40px;"></div>

        <!-- ========================================== -->
        <!-- LEFT SIDEBAR                               -->
        <!-- ========================================== -->
        <aside class="w-72 bg-slate-950 border-r border-slate-800 flex-shrink-0 flex flex-col z-20 h-full relative">
            
            <div class="flex-1 overflow-y-auto py-6 px-4 space-y-2 mt-4">
                <p class="px-4 text-xs font-black text-slate-500 uppercase tracking-widest mb-6 flex items-center gap-2">
                    <i data-lucide="server" class="w-4 h-4 text-amber-500"></i> Admin Modules
                </p>

                @php
                    $navItems = [
                        ['name' => 'Dashboard', 'icon' => 'layout-dashboard', 'route' => route('dashboard'), 'active' => request()->routeIs('dashboard')],
                        ['name' => 'Inquiries', 'icon' => 'inbox', 'route' => route('inquiries.index'), 'active' => request()->routeIs('inquiries.*')],
                        ['name' => 'Scheduled Visits', 'icon' => 'calendar-check', 'route' => route('bookings.index'), 'active' => request()->routeIs('bookings.*')],
                        ['name' => 'Portfolio', 'icon' => 'briefcase', 'route' => route('admin.portfolio-admin.index'), 'active' => request()->routeIs('admin.portfolio-admin.*')],
                        ['name' => 'Gallery', 'icon' => 'image', 'route' => route('admin.gallery-admin.index'), 'active' => request()->routeIs('admin.gallery-admin.*')],
                        ['name' => 'Services', 'icon' => 'wrench', 'route' => route('admin.services-admin.index'), 'active' => request()->routeIs('admin.services-admin.*')],
                        ['name' => 'Testimonials', 'icon' => 'message-square-quote', 'route' => route('admin.testimonials-admin.index'), 'active' => request()->routeIs('admin.testimonials-admin.*')],
                    ];
                @endphp

                @foreach($navItems as $item)
                <a href="{{ $item['route'] }}" class="flex items-center justify-between px-4 py-3 rounded-sm text-sm font-bold uppercase tracking-wider transition-all duration-200 group {{ $item['active'] ? 'bg-amber-500/10 text-amber-500 border-l-2 border-amber-500' : 'text-slate-400 hover:bg-slate-900 hover:text-white border-l-2 border-transparent hover:border-slate-700' }}">
                    <div class="flex items-center gap-3">
                        <i data-lucide="{{ $item['icon'] }}" class="w-5 h-5 {{ $item['active'] ? 'text-amber-500' : 'text-slate-500 group-hover:text-amber-500' }} transition-colors"></i>
                        {{ $item['name'] }}
                    </div>
                </a>
                @endforeach
            </div>

            <!-- Optional: Secure Logout at bottom of sidebar -->
            <div class="p-4 border-t border-slate-800 bg-slate-950">
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button type="submit" class="w-full flex items-center justify-center gap-2 px-4 py-3 text-xs font-bold text-slate-500 uppercase tracking-widest hover:text-red-500 hover:bg-red-500/10 rounded-sm transition-all duration-200">
                        <i data-lucide="log-out" class="w-4 h-4"></i> System Disconnect
                    </button>
                </form>
            </div>
        </aside>

        <!-- ========================================== -->
        <!-- MAIN SCROLLABLE CONTENT                    -->
        <!-- ========================================== -->
        <main class="flex-1 flex flex-col relative overflow-y-auto h-full z-10">
            
            <!-- Dynamic Command Center Status Bar -->
            <div class="bg-slate-950/80 backdrop-blur-md border-b border-slate-800 sticky top-0 z-40">
                <div class="h-1.5 w-full hazard-tape opacity-50 border-b border-black"></div>
                <div class="px-8 py-5 flex flex-col md:flex-row justify-between items-start md:items-center gap-4 shadow-lg">
                    <div>
                        <!-- DYNAMIC HEADER SLOT -->
                        @if (isset($header))
                            {{ $header }}
                        @else
                            <h1 class="text-2xl font-black text-white uppercase tracking-widest">
                                Command <span class="text-amber-500">Center</span>
                            </h1>
                        @endif
                        
                        <p class="text-slate-400 font-mono text-[10px] uppercase tracking-widest mt-1 flex items-center gap-2">
                            <span class="w-1.5 h-1.5 rounded-full bg-green-500 shadow-[0_0_8px_#22c55e] animate-pulse"></span>
                            Secure Link Established
                        </p>
                    </div>
                    <div class="hidden md:block text-right">
                        <p class="text-amber-500 font-mono text-xs font-bold">{{ now()->format('l, M j, Y') }}</p>
                        <p class="text-slate-500 font-mono text-[10px] mt-0.5">{{ now()->format('H:i:s T') }}</p>
                    </div>
                </div>
            </div>

            <!-- Injected Page Content -->
            <div class="p-8 relative z-10 w-full max-w-[96rem] mx-auto pb-20">
                {{ $slot }}
            </div>
            
        </main>

    </div>

    <script>
        lucide.createIcons();
    </script>
</body>
</html>