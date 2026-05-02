<x-admin-layout>
    
    <!-- Page Header -->
    <div class="flex justify-between items-end mb-8 border-b border-slate-800 pb-4">
        <div>
            <a href="{{ route('dashboard') }}" class="text-slate-500 hover:text-amber-500 font-mono text-xs uppercase tracking-widest flex items-center gap-2 mb-2 transition-colors">
                <i data-lucide="arrow-left" class="w-3 h-3"></i> Back to Command Center
            </a>
            <h1 class="text-3xl font-black font-['Montserrat',_sans-serif] text-white uppercase tracking-widest">
                Client <span class="text-amber-500">Inquiries</span>
            </h1>
        </div>
        
        <!-- Stats Badge -->
        <div class="bg-slate-900 border border-slate-700 px-4 py-2 rounded-sm flex items-center gap-3">
            <i data-lucide="inbox" class="w-4 h-4 text-amber-500"></i>
            <span class="text-white font-mono text-xs uppercase tracking-widest font-bold">Total Records: {{ $inquiries->count() ?? 0 }}</span>
        </div>
    </div>

    <!-- Data Table -->
    <div class="bg-slate-900 border border-slate-700 rounded-sm shadow-xl overflow-hidden">
        <div class="overflow-x-auto">
            <table class="w-full text-left border-collapse">
                <thead>
                    <tr class="bg-slate-950 text-slate-400 font-mono text-xs uppercase tracking-wider">
                        <th class="p-4 border-b border-slate-800">Client Details</th>
                        <th class="p-4 border-b border-slate-800">Service Requested</th>
                        <th class="p-4 border-b border-slate-800">Date Received</th>
                        <th class="p-4 border-b border-slate-800 text-right">Actions</th>
                    </tr>
                </thead>
                <tbody class="text-sm divide-y divide-slate-800/50">
                    
                    @forelse($inquiries as $inquiry)
                    <tr class="hover:bg-slate-800/30 transition-colors group">
                        <td class="p-4">
                            <div class="font-bold text-white">{{ $inquiry->full_name }}</div>
                            <div class="text-xs text-slate-500 font-mono mt-1">{{ $inquiry->email_address }}</div>
                        </td>
                        <td class="p-4">
                            <span class="inline-block px-2 py-1 bg-slate-950 border border-slate-800 text-amber-500 text-[10px] font-black uppercase tracking-widest rounded-sm">
                                {{ $inquiry->service_required ?? 'General Inquiry' }}
                            </span>
                        </td>
                        <td class="p-4">
                            <div class="text-slate-300 font-mono text-xs">{{ \Carbon\Carbon::parse($inquiry->created_at)->format('M d, Y') }}</div>
                            <div class="text-slate-500 font-mono text-[10px] mt-1 uppercase tracking-widest">{{ \Carbon\Carbon::parse($inquiry->created_at)->diffForHumans() }}</div>
                        </td>
                        <td class="p-4 text-right flex justify-end gap-3 items-center h-16">
                            <!-- View Dossier Button -->
                            <a href="{{ route('inquiries.show', $inquiry->id) }}" class="inline-flex items-center gap-2 text-slate-400 hover:text-amber-500 text-xs font-bold uppercase tracking-widest transition-colors mt-2">
                                Open Log <i data-lucide="chevron-right" class="w-4 h-4"></i>
                            </a>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="4" class="p-12 text-center">
                            <div class="flex flex-col items-center justify-center">
                                <i data-lucide="inbox" class="w-12 h-12 text-slate-700 mb-3"></i>
                                <p class="text-slate-500 font-mono text-sm uppercase tracking-widest">No inquiries found in the database.</p>
                            </div>
                        </td>
                    </tr>
                    @endforelse
                    
                </tbody>
            </table>
        </div>
        
        <!-- Pagination (If you are using it in your Controller) -->
        @if(method_exists($inquiries, 'links'))
        <div class="bg-slate-950 border-t border-slate-800 p-4">
            {{ $inquiries->links() }}
        </div>
        @endif
    </div>

</x-admin-layout>