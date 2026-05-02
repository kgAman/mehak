<!-- Notice we use x-admin-layout now instead of x-app-layout! -->
<x-admin-layout>
    
    <div class="space-y-8">

        <!-- QUICK ACTIONS ROW -->
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
            <a href="{{ route('admin.gallery-admin.create') }}" class="group flex items-center p-5 bg-slate-900 border border-slate-700 hover:border-amber-500 rounded-sm transition-all duration-300 hover:shadow-[0_0_15px_rgba(245,158,11,0.2)]">
                <div class="w-12 h-12 bg-slate-950 border border-slate-800 flex items-center justify-center mr-4 group-hover:bg-amber-500 group-hover:border-amber-500 transition-colors">
                    <i data-lucide="upload-cloud" class="w-6 h-6 text-amber-500 group-hover:text-slate-900 transition-colors"></i>
                </div>
                <div>
                    <p class="text-white font-bold text-sm uppercase tracking-wider">Upload Photo</p>
                    <p class="text-slate-500 font-mono text-[10px] uppercase tracking-wider mt-1">Add to site gallery</p>
                </div>
            </a>

            <a href="{{ route('admin.portfolio-admin.create') }}" class="group flex items-center p-5 bg-slate-900 border border-slate-700 hover:border-amber-500 rounded-sm transition-all duration-300 hover:shadow-[0_0_15px_rgba(245,158,11,0.2)]">
                <div class="w-12 h-12 bg-slate-950 border border-slate-800 flex items-center justify-center mr-4 group-hover:bg-amber-500 group-hover:border-amber-500 transition-colors">
                    <i data-lucide="briefcase" class="w-6 h-6 text-amber-500 group-hover:text-slate-900 transition-colors"></i>
                </div>
                <div>
                    <p class="text-white font-bold text-sm uppercase tracking-wider">New Case Study</p>
                    <p class="text-slate-500 font-mono text-[10px] uppercase tracking-wider mt-1">Update Portfolio</p>
                </div>
            </a>

            <a href="{{ route('admin.services-admin.index') }}" class="group flex items-center p-5 bg-slate-900 border border-slate-700 hover:border-amber-500 rounded-sm transition-all duration-300 hover:shadow-[0_0_15px_rgba(245,158,11,0.2)]">
                <div class="w-12 h-12 bg-slate-950 border border-slate-800 flex items-center justify-center mr-4 group-hover:bg-amber-500 group-hover:border-amber-500 transition-colors">
                    <i data-lucide="wrench" class="w-6 h-6 text-amber-500 group-hover:text-slate-900 transition-colors"></i>
                </div>
                <div>
                    <p class="text-white font-bold text-sm uppercase tracking-wider">Edit Services</p>
                    <p class="text-slate-500 font-mono text-[10px] uppercase tracking-wider mt-1">Modify Offerings</p>
                </div>
            </a>
        </div>

        <!-- SPLIT LAYOUT FOR TABLES -->
        <div class="grid grid-cols-1 xl:grid-cols-2 gap-8">
            
            <!-- LATEST BOOKINGS TABLE -->
            <div class="bg-slate-900 border border-slate-700 rounded-sm shadow-xl overflow-hidden">
                <div class="bg-slate-950 px-6 py-4 border-b border-slate-800 flex justify-between items-center">
                    <h3 class="text-lg font-black text-white font-['Montserrat',_sans-serif] uppercase tracking-widest flex items-center gap-2">
                        <i data-lucide="calendar" class="w-5 h-5 text-amber-500"></i> Priority Bookings
                    </h3>
                    <a href="{{ route('bookings.index') }}" class="text-amber-500 hover:text-white font-mono text-xs uppercase tracking-widest transition-colors">View All &rarr;</a>
                </div>
                
                <div class="overflow-x-auto">
                    <table class="w-full text-left border-collapse">
                        <thead>
                            <tr class="bg-slate-800/50 text-slate-400 font-mono text-xs uppercase tracking-wider">
                                <th class="p-4 border-b border-slate-700">Client</th>
                                <th class="p-4 border-b border-slate-700">Service Required</th>
                                <th class="p-4 border-b border-slate-700 text-right">Action</th>
                            </tr>
                        </thead>
                        <tbody class="text-sm divide-y divide-slate-800/50">
                            @forelse($latestBookings ?? [] as $booking)
                            <tr class="hover:bg-slate-800/30 transition-colors">
                                <td class="p-4">
                                    <div class="font-bold text-white">{{ $booking['full_name'] ?? 'N/A' }}</div>
                                    <div class="text-[10px] text-amber-500 font-mono mt-1">{{ \Carbon\Carbon::parse($booking['preferred_date'])->format('M d') }} - {{ $booking['preferred_time'] ?? '' }}</div>
                                </td>
                                <td class="p-4 text-gray-300 font-medium">{{ $booking['service_required'] ?? 'N/A' }}</td>
                                <td class="p-4 text-right">
                                    <a href="{{ route('bookings.show', $booking['id'] ?? 0) }}" class="text-slate-400 hover:text-amber-500 transition-colors inline-block"><i data-lucide="eye" class="w-5 h-5"></i></a>
                                </td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="3" class="p-8 text-center text-slate-500 font-mono text-sm">No active bookings found.</td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>

            <!-- LATEST INQUIRIES FEED -->
            <div class="bg-slate-900 border border-slate-700 rounded-sm shadow-xl overflow-hidden">
                <div class="bg-slate-950 px-6 py-4 border-b border-slate-800 flex justify-between items-center">
                    <h3 class="text-lg font-black text-white font-['Montserrat',_sans-serif] uppercase tracking-widest flex items-center gap-2">
                        <i data-lucide="inbox" class="w-5 h-5 text-amber-500"></i> Recent Inquiries
                    </h3>
                    <a href="{{ route('inquiries.index') }}" class="text-amber-500 hover:text-white font-mono text-xs uppercase tracking-widest transition-colors">View All &rarr;</a>
                </div>
                
                <div class="divide-y divide-slate-800/50">
                    @forelse($latestInquiries ?? [] as $inquiry)
                    <div class="p-6 hover:bg-slate-800/30 transition-colors flex gap-4 items-start group">
                        <div class="w-12 h-12 flex-shrink-0 bg-slate-950 border border-slate-700 rounded-sm overflow-hidden flex items-center justify-center">
                            @if(isset($inquiry['site_photo_path']) && $inquiry['site_photo_path'])
                                <img src="{{ asset('storage/' . $inquiry['site_photo_path']) }}" alt="Photo" class="w-full h-full object-cover">
                            @else
                                <i data-lucide="user" class="w-5 h-5 text-slate-600"></i>
                            @endif
                        </div>

                        <div class="flex-grow w-full">
                            <div class="flex justify-between items-start mb-1">
                                <h4 class="text-white font-bold text-sm">{{ $inquiry['full_name'] ?? 'Unknown' }}</h4>
                                <span class="text-slate-500 font-mono text-[10px] whitespace-nowrap">{{ \Carbon\Carbon::parse($inquiry['created_at'])->diffForHumans() }}</span>
                            </div>
                            <p class="text-gray-400 text-xs line-clamp-1 border-l-2 border-slate-700 pl-2 italic">
                                "{{ $inquiry['project_details'] ?? 'No details provided.' }}"
                            </p>
                        </div>
                    </div>
                    @empty
                    <div class="p-8 text-center text-slate-500 font-mono text-sm">No recent inquiries.</div>
                    @endforelse
                </div>
            </div>

        </div>
    </div>

</x-admin-layout>