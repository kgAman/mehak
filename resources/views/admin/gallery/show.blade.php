<x-admin-layout>
    <div class="bg-[#020617] min-h-screen py-10 relative">
        <div class="absolute inset-0 opacity-[0.03] pointer-events-none" style="background-image: linear-gradient(#f59e0b 1px, transparent 1px), linear-gradient(90deg, #f59e0b 1px, transparent 1px); background-size: 40px 40px;"></div>

        <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
            
            <div class="flex justify-between items-end mb-8">
                <div>
                    <a href="#" class="text-slate-500 hover:text-amber-500 font-mono text-xs uppercase tracking-widest flex items-center gap-2 mb-2 transition-colors">
                        <i data-lucide="arrow-left" class="w-3 h-3"></i> Back to Inquiries
                    </a>
                    <h1 class="text-3xl font-black font-['Montserrat',_sans-serif] text-white uppercase tracking-widest">
                        Inquiry <span class="text-amber-500">Dossier</span>
                    </h1>
                </div>
                
                <!-- Action Buttons -->
                <div class="flex gap-3">
                    <a href="mailto:client@email.com" class="bg-slate-800 text-white px-6 py-2.5 font-bold uppercase tracking-widest text-xs rounded-sm border border-slate-700 hover:border-amber-500 hover:text-amber-500 transition-all flex items-center gap-2">
                        <i data-lucide="reply" class="w-4 h-4"></i> Reply
                    </a>
                    <form action="#" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="bg-red-500/10 text-red-500 px-4 py-2.5 font-bold uppercase tracking-widest text-xs rounded-sm border border-red-500/30 hover:bg-red-500 hover:text-white transition-all">
                            <i data-lucide="trash-2" class="w-4 h-4"></i>
                        </button>
                    </form>
                </div>
            </div>

            <!-- The Dossier Card -->
            <div class="bg-slate-900 border-2 border-slate-700 shadow-2xl rounded-sm relative overflow-hidden">
                
                <!-- Header Plate -->
                <div class="bg-slate-950 px-8 py-6 border-b border-slate-800 flex flex-col md:flex-row md:items-center justify-between gap-4">
                    <div>
                        <p class="text-slate-500 font-mono text-xs uppercase tracking-widest mb-1">Sender Profile</p>
                        <h2 class="text-2xl font-black text-white font-['Montserrat',_sans-serif]">Marcus Fowler</h2>
                        <p class="text-amber-500 font-mono text-sm mt-1 flex items-center gap-2">
                            <i data-lucide="mail" class="w-4 h-4"></i> marcus@example.com
                        </p>
                    </div>
                    <div class="text-left md:text-right border-t md:border-t-0 border-slate-800 pt-4 md:pt-0">
                        <p class="text-slate-500 font-mono text-xs uppercase tracking-widest mb-1">Timestamp</p>
                        <p class="text-white font-mono text-sm">Oct 24, 2026 - 14:30 EST</p>
                    </div>
                </div>

                <!-- Main Content -->
                <div class="p-8 space-y-8">
                    <!-- Service Tag -->
                    <div>
                        <p class="text-slate-500 font-mono text-xs uppercase tracking-widest mb-2">Requested Service</p>
                        <span class="inline-flex items-center gap-2 px-4 py-2 bg-slate-950 border border-slate-700 rounded-sm text-white font-bold text-sm">
                            <i data-lucide="hammer" class="w-4 h-4 text-amber-500"></i> Structural Framing
                        </span>
                    </div>

                    <!-- The Message Log -->
                    <div>
                        <p class="text-slate-500 font-mono text-xs uppercase tracking-widest mb-3 flex items-center gap-2">
                            <i data-lucide="terminal" class="w-4 h-4"></i> Transmission Log
                        </p>
                        <div class="bg-slate-950/50 border border-slate-800 rounded-sm p-6 shadow-inner">
                            <p class="text-gray-300 leading-relaxed font-['Montserrat',_sans-serif] whitespace-pre-wrap">Hello, our office lobby suffered some water damage over the weekend and we need an emergency quote on ripping out the compromised structural framing and replacing it. Please let me know how soon a site manager can inspect it.</p>
                        </div>
                    </div>

                    <!-- Attached Images (If Any) -->
                    <div>
                        <p class="text-slate-500 font-mono text-xs uppercase tracking-widest mb-3">Site Photos</p>
                        <div class="w-full md:w-1/2 aspect-video bg-black border-2 border-slate-800 rounded-sm overflow-hidden relative group">
                            <!-- Placeholder for actual image -->
                            <img src="https://images.unsplash.com/photo-1541888081631-f18c8f000b21?q=80&w=800&auto=format&fit=crop" class="w-full h-full object-cover opacity-60 group-hover:opacity-100 transition-opacity">
                        </div>
                    </div>
                </div>

            </div>

        </div>
    </div>
</x-admin-layout>