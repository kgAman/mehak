<x-admin-layout>
    
    <!-- Page Header -->
    <div class="flex justify-between items-end mb-8 border-b border-slate-800 pb-4">
        <div>
            <a href="{{ route('dashboard') }}" class="text-slate-500 hover:text-amber-500 font-mono text-xs uppercase tracking-widest flex items-center gap-2 mb-2 transition-colors">
                <i data-lucide="arrow-left" class="w-3 h-3"></i> Back to Command Center
            </a>
            <h1 class="text-3xl font-black font-['Montserrat',_sans-serif] text-white uppercase tracking-widest">
                Scheduled <span class="text-amber-500">Visits</span>
            </h1>
        </div>
        
        <!-- Stats Badge -->
        <div class="bg-slate-900 border border-slate-700 px-4 py-2 rounded-sm flex items-center gap-3">
            <i data-lucide="calendar-check" class="w-4 h-4 text-amber-500"></i>
            <span class="text-white font-mono text-xs uppercase tracking-widest font-bold">Total Records: {{ $bookings->total() ?? $bookings->count() }}</span>
        </div>
    </div>

    <!-- Data Table -->
    <div class="bg-slate-900 border border-slate-700 rounded-sm shadow-xl overflow-hidden">
        <div class="overflow-x-auto">
            <table class="w-full text-left border-collapse">
                <thead>
                    <tr class="bg-slate-950 text-slate-400 font-mono text-xs uppercase tracking-wider">
                        <th class="p-4 border-b border-slate-800">Client Details</th>
                        <th class="p-4 border-b border-slate-800">Location</th>
                        <th class="p-4 border-b border-slate-800">Scheduled Date/Time</th>
                        <th class="p-4 border-b border-slate-800">Status</th>
                        <th class="p-4 border-b border-slate-800 text-right">Actions</th>
                    </tr>
                </thead>
                <tbody class="text-sm divide-y divide-slate-800/50">
                    
                    @forelse($bookings as $booking)
                    <tr class="hover:bg-slate-800/30 transition-colors group">
                        <td class="p-4">
                            <div class="font-bold text-white">{{ $booking->full_name }}</div>
                            <div class="text-xs text-slate-500 font-mono mt-1">
                                {{ $booking->email_address }} <br> 
                                {{ $booking->phone_number }}
                            </div>
                        </td>
                        <td class="p-4 text-slate-300 font-medium">
                            {{ $booking->property_location ?? 'No location provided' }}
                        </td>
                        <td class="p-4">
                            <div class="text-amber-500 font-mono text-xs">
                                {{ \Carbon\Carbon::parse($booking->preferred_date)->format('M d, Y') }}
                            </div>
                            <div class="text-slate-400 font-mono text-xs mt-1">
                                {{ $booking->preferred_time ?? 'TBD' }}
                            </div>
                        </td>
                        <td class="p-4">
                            <!-- Dynamic Status Badge -->
                            <span class="px-2 py-1 text-[10px] font-black uppercase tracking-widest rounded-sm border 
                                {{ strtolower($booking->status) === 'pending' ? 'bg-amber-500/10 text-amber-500 border-amber-500/30' : '' }}
                                {{ strtolower($booking->status) === 'confirmed' ? 'bg-green-500/10 text-green-500 border-green-500/30' : '' }}
                                {{ strtolower($booking->status) === 'completed' ? 'bg-blue-500/10 text-blue-500 border-blue-500/30' : '' }}
                                {{ strtolower($booking->status) === 'cancelled' ? 'bg-red-500/10 text-red-500 border-red-500/30' : '' }}">
                                {{ $booking->status }}
                            </span>
                        </td>
                        <td class="p-4 text-right">
                            <a href="{{ route('bookings.show', $booking->id) }}" class="inline-flex items-center gap-2 text-slate-400 hover:text-amber-500 text-xs font-bold uppercase tracking-widest transition-colors">
                                Open Log <i data-lucide="chevron-right" class="w-4 h-4"></i>
                            </a>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="5" class="p-12 text-center">
                            <div class="flex flex-col items-center justify-center">
                                <i data-lucide="calendar-x" class="w-12 h-12 text-slate-700 mb-3"></i>
                                <p class="text-slate-500 font-mono text-sm uppercase tracking-widest">No scheduled visits found.</p>
                            </div>
                        </td>
                    </tr>
                    @endforelse
                    
                </tbody>
            </table>
        </div>

        <!-- Pagination (If you use paginate() in your controller) -->
        @if(method_exists($bookings, 'links'))
        <div class="bg-slate-950 border-t border-slate-800 p-4">
            {{ $bookings->links() }}
        </div>
        @endif
    </div>

</x-admin-layout>