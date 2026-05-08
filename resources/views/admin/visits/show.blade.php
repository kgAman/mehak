<x-admin-layout>
    <div class="bg-[#020617] min-h-screen py-10 relative">
        <div class="absolute inset-0 opacity-[0.03] pointer-events-none" style="background-image: linear-gradient(#f59e0b 1px, transparent 1px), linear-gradient(90deg, #f59e0b 1px, transparent 1px); background-size: 40px 40px;"></div>

        <div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
            
            <div class="flex justify-between items-end mb-8">
                <div>
                    <a href="{{ route('admin.visits.index') }}" class="text-slate-500 hover:text-amber-500 font-mono text-xs uppercase tracking-widest flex items-center gap-2 mb-2 transition-colors">
                        <i data-lucide="arrow-left" class="w-3 h-3"></i> Back to All Visits
                    </a>
                    <h1 class="text-3xl font-black font-['Montserrat',_sans-serif] text-white uppercase tracking-widest">
                        Visit <span class="text-amber-500">Dossier</span>
                    </h1>
                </div>
                
                <div class="flex gap-3">
                    <a href="mailto:{{ $visit->email_address }}?subject=Update regarding your site visit" class="bg-slate-800 text-white px-6 py-2.5 font-bold uppercase tracking-widest text-xs rounded-sm border border-slate-700 hover:border-amber-500 hover:text-amber-500 transition-all flex items-center gap-2 shadow-lg">
                        <i data-lucide="mail" class="w-4 h-4"></i> Contact Client
                    </a>
                </div>
            </div>

            <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
                
                <div class="lg:col-span-2 space-y-8">
                    <div class="bg-slate-900 border-2 border-slate-700 shadow-2xl rounded-sm overflow-hidden">
                        <div class="bg-slate-950 px-8 py-6 border-b border-slate-800">
                            <p class="text-slate-500 font-mono text-xs uppercase tracking-widest mb-1">Lead Information</p>
                            <h2 class="text-3xl font-black text-white font-['Montserrat',_sans-serif]">{{ $visit->full_name }}</h2>
                            <div class="flex flex-wrap gap-4 mt-3">
                                <span class="text-amber-500 font-mono text-sm flex items-center gap-2">
                                    <i data-lucide="mail" class="w-4 h-4"></i> {{ $visit->email_address }}
                                </span>
                                <span class="text-slate-400 font-mono text-sm flex items-center gap-2">
                                    <i data-lucide="phone" class="w-4 h-4 text-amber-500"></i> {{ $visit->phone_number }}
                                </span>
                            </div>
                        </div>

                        <div class="p-8 space-y-8">
                            <div>
                                <p class="text-slate-500 font-mono text-xs uppercase tracking-widest mb-3 flex items-center gap-2">
                                    <i data-lucide="map-pin" class="w-4 h-4 text-amber-500"></i> Deployment Location
                                </p>
                                <div class="bg-slate-950 border border-slate-800 p-4 rounded-sm">
                                    <p class="text-white font-bold text-lg font-['Montserrat',_sans-serif]">{{ $visit->property_location }}</p>
                                </div>
                            </div>

                            <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                                <div>
                                    <p class="text-slate-500 font-mono text-xs uppercase tracking-widest mb-2">Target Service</p>
                                    <span class="inline-flex items-center gap-2 px-4 py-2 bg-slate-950 border border-slate-700 rounded-sm text-white font-bold text-sm">
                                        <i data-lucide="wrench" class="w-4 h-4 text-amber-500"></i> {{ $visit->service_required }}
                                    </span>
                                </div>
                                <div>
                                    <p class="text-slate-500 font-mono text-xs uppercase tracking-widest mb-2">Window Scheduled</p>
                                    <div class="text-white font-mono">
                                        <span class="text-amber-500">{{ $visit->preferred_date->format('l, M d, Y') }}</span>
                                        <span class="text-slate-500 mx-2">@</span>
                                        <span>{{ \Carbon\Carbon::parse($visit->preferred_time)->format('H:i') }}</span>
                                    </div>
                                </div>
                            </div>

                            <div>
                                <p class="text-slate-500 font-mono text-xs uppercase tracking-widest mb-3 flex items-center gap-2">
                                    <i data-lucide="terminal" class="w-4 h-4"></i> Brief Details / Instructions
                                </p>
                                <div class="bg-slate-950/50 border border-slate-800 rounded-sm p-6 shadow-inner">
                                    <p class="text-gray-300 leading-relaxed font-['Montserrat',_sans-serif] whitespace-pre-wrap">{{ $visit->brief_details ?? 'No additional tactical details provided by client.' }}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="space-y-6">
                    <div class="bg-slate-900 border-2 border-slate-700 shadow-2xl rounded-sm p-6 relative overflow-hidden">
                        <div class="absolute top-0 left-0 w-full h-1 bg-amber-500"></div>
                        
                        <h3 class="text-white font-black uppercase tracking-widest text-sm mb-6 flex items-center gap-2">
                            <i data-lucide="activity" class="w-4 h-4 text-amber-500"></i> Status Management
                        </h3>

                        <form action="{{ route('admin.visits.updateStatus', $visit->id) }}" method="POST" class="space-y-4">
                            @csrf
                            <div>
                                <label class="block text-[10px] font-bold text-slate-500 uppercase tracking-[0.2em] mb-3">Operational Status</label>
                                <select name="status" class="w-full bg-slate-950 border-slate-700 text-white rounded-sm focus:ring-amber-500 focus:border-amber-500 font-mono text-sm">
                                    <option value="pending" {{ $visit->status == 'pending' ? 'selected' : '' }}>PENDING</option>
                                    <option value="confirmed" {{ $visit->status == 'confirmed' ? 'selected' : '' }}>CONFIRMED</option>
                                    <option value="completed" {{ $visit->status == 'completed' ? 'selected' : '' }}>COMPLETED</option>
                                    <option value="cancelled" {{ $visit->status == 'cancelled' ? 'selected' : '' }}>CANCELLED</option>
                                </select>
                            </div>

                            <button type="submit" class="w-full bg-amber-500 text-slate-900 font-black uppercase tracking-widest text-xs py-3 rounded-sm hover:bg-amber-400 transition-all shadow-[4px_4px_0px_0px_#475569]">
                                Update Status
                            </button>
                        </form>
                    </div>

                    <div class="bg-slate-900/50 border border-slate-800 rounded-sm p-6">
                        <div class="space-y-4">
                            <div>
                                <p class="text-[10px] text-slate-500 uppercase tracking-widest">Entry Created</p>
                                <p class="text-slate-300 font-mono text-xs">{{ $visit->created_at->format('M d, Y - H:i:s') }}</p>
                            </div>
                            <div>
                                <p class="text-[10px] text-slate-500 uppercase tracking-widest">Dossier ID</p>
                                <p class="text-slate-300 font-mono text-xs">VIS-{{ str_pad($visit->id, 5, '0', STR_PAD_LEFT) }}</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</x-admin-layout>