<x-admin-layout>
    <div class="bg-[#020617] min-h-screen py-10 relative">
        <div class="absolute inset-0 opacity-[0.03] pointer-events-none" style="background-image: linear-gradient(#f59e0b 1px, transparent 1px), linear-gradient(90deg, #f59e0b 1px, transparent 1px); background-size: 40px 40px;"></div>

        <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
            
            <div class="flex justify-between items-end mb-8">
                <div>
                    <a href="{{ route('admin.inquiries-admin.index') }}" class="text-slate-500 hover:text-amber-500 font-mono text-xs uppercase tracking-widest flex items-center gap-2 mb-2 transition-colors">
                        <i data-lucide="arrow-left" class="w-3 h-3"></i> Back to Inquiries
                    </a>
                    <h1 class="text-3xl font-black font-['Montserrat',_sans-serif] text-white uppercase tracking-widest">
                        Inquiry <span class="text-amber-500">Dossier</span>
                    </h1>
                </div>
                
                <div class="flex gap-3">
                    <a href="mailto:{{ $inquiry->email_address }}?subject=RE: Inquiry regarding {{ $inquiry->service_required }}" class="bg-slate-800 text-white px-6 py-2.5 font-bold uppercase tracking-widest text-xs rounded-sm border border-slate-700 hover:border-amber-500 hover:text-amber-500 transition-all flex items-center gap-2">
                        <i data-lucide="reply" class="w-4 h-4"></i> Reply
                    </a>
                    <form action="{{ route('admin.inquiries-admin.destroy', $inquiry->id) }}" method="POST" onsubmit="return confirm('Permanently delete this dossier?');">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="bg-red-500/10 text-red-500 px-4 py-2.5 font-bold uppercase tracking-widest text-xs rounded-sm border border-red-500/30 hover:bg-red-500 hover:text-white transition-all">
                            <i data-lucide="trash-2" class="w-4 h-4"></i>
                        </button>
                    </form>
                </div>
            </div>

            <div class="bg-slate-900 border-2 border-slate-700 shadow-2xl rounded-sm relative overflow-hidden">
                
                <div class="bg-slate-950 px-8 py-6 border-b border-slate-800 flex flex-col md:flex-row md:items-center justify-between gap-4">
                    <div>
                        <p class="text-slate-500 font-mono text-xs uppercase tracking-widest mb-1">Sender Profile</p>
                        <h2 class="text-2xl font-black text-white font-['Montserrat',_sans-serif]">{{ $inquiry->full_name }}</h2>
                        <p class="text-amber-500 font-mono text-sm mt-1 flex items-center gap-2">
                            <i data-lucide="mail" class="w-4 h-4"></i> {{ $inquiry->email_address }}
                        </p>
                    </div>
                    <div class="text-left md:text-right border-t md:border-t-0 border-slate-800 pt-4 md:pt-0">
                        <p class="text-slate-500 font-mono text-xs uppercase tracking-widest mb-1">Timestamp</p>
                        <p class="text-white font-mono text-sm">{{ $inquiry->created_at->format('M d, Y - H:i') }} EST</p>
                    </div>
                </div>

                <div class="p-8 space-y-8">
                    <div>
                        <p class="text-slate-500 font-mono text-xs uppercase tracking-widest mb-2">Requested Service</p>
                        <span class="inline-flex items-center gap-2 px-4 py-2 bg-slate-950 border border-slate-700 rounded-sm text-white font-bold text-sm">
                            <i data-lucide="wrench" class="w-4 h-4 text-amber-500"></i> {{ $inquiry->service_required }}
                        </span>
                    </div>

                    <div>
                        <p class="text-slate-500 font-mono text-xs uppercase tracking-widest mb-3 flex items-center gap-2">
                            <i data-lucide="terminal" class="w-4 h-4"></i> Transmission Log
                        </p>
                        <div class="bg-slate-950/50 border border-slate-800 rounded-sm p-6 shadow-inner">
                            <p class="text-gray-300 leading-relaxed font-['Montserrat',_sans-serif] whitespace-pre-wrap">{{ $inquiry->project_details }}</p>
                        </div>
                    </div>

                    @if($inquiry->site_photo_path)
                    <div>
                        <p class="text-slate-500 font-mono text-xs uppercase tracking-widest mb-3">Site Photos</p>
                        <div class="w-full md:w-1/2 aspect-video bg-black border-2 border-slate-800 rounded-sm overflow-hidden relative group">
                            <a href="{{ asset('storage/' . $inquiry->site_photo_path) }}" target="_blank" class="block h-full w-full">
                                <img src="{{ asset('storage/' . $inquiry->site_photo_path) }}" class="w-full h-full object-cover opacity-60 group-hover:opacity-100 transition-opacity">
                                <div class="absolute inset-0 flex items-center justify-center opacity-0 group-hover:opacity-100 transition-opacity pointer-events-none">
                                    <span class="bg-slate-900/80 text-white text-[10px] font-bold px-3 py-1 border border-slate-700 uppercase tracking-tighter">View Full Size Image</span>
                                </div>
                            </a>
                        </div>
                    </div>
                    @else
                    <div>
                        <p class="text-slate-500 font-mono text-xs uppercase tracking-widest mb-3 text-slate-700">No Site Photos Attached</p>
                    </div>
                    @endif
                </div>

            </div>

        </div>
    </div>
</x-admin-layout>
