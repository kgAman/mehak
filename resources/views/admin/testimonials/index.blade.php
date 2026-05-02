<x-admin-layout>
    <div class="bg-[#020617] min-h-screen py-10 relative">
        <div class="absolute inset-0 opacity-[0.03] pointer-events-none" style="background-image: linear-gradient(#f59e0b 1px, transparent 1px), linear-gradient(90deg, #f59e0b 1px, transparent 1px); background-size: 40px 40px;"></div>

        <div class="max-w-[96rem] mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
            
            <div class="flex justify-between items-end mb-8 border-b border-slate-800 pb-4">
                <div>
                    <a href="{{ route('dashboard') }}" class="text-slate-500 hover:text-amber-500 font-mono text-xs uppercase tracking-widest flex items-center gap-2 mb-2 transition-colors">
                        <i data-lucide="arrow-left" class="w-3 h-3"></i> Back to Command Center
                    </a>
                    <h1 class="text-3xl font-black font-['Montserrat',_sans-serif] text-white uppercase tracking-widest">
                        Client <span class="text-amber-500">Testimonials</span>
                    </h1>
                </div>
                
                <a href="{{ route('admin.testimonials-admin.create') }}" class="bg-amber-500 text-slate-900 px-6 py-2.5 font-black uppercase tracking-widest text-sm rounded-sm hover:bg-amber-400 shadow-[4px_4px_0px_0px_#475569] transition-all flex items-center gap-2">
    <i data-lucide="plus" class="w-4 h-4"></i> Add Review
</a>
            </div>

            <div class="bg-slate-900 border border-slate-700 rounded-sm shadow-xl overflow-hidden">
                <div class="overflow-x-auto">
                    <table class="w-full text-left border-collapse">
                        <thead>
                            <tr class="bg-slate-950 text-slate-400 font-mono text-xs uppercase tracking-wider">
                                <th class="p-4 border-b border-slate-800">Client / Location</th>
                                <th class="p-4 border-b border-slate-800">Rating</th>
                                <th class="p-4 border-b border-slate-800">Snippet</th>
                                <th class="p-4 border-b border-slate-800">Type</th>
                                <th class="p-4 border-b border-slate-800 text-right">Actions</th>
                            </tr>
                        </thead>
  <tbody class="text-sm divide-y divide-slate-800/50">
    {{-- CORRECT: Loop through the PLURAL $testimonials and use the SINGULAR $testimonial inside --}}
    @forelse($testimonials as $testimonial)
        <tr class="hover:bg-slate-800/30 transition-colors group">
            <td class="p-4">
                <div class="flex items-center gap-3">
                    @if($testimonial->client_image)
                        <img src="{{ asset('storage/' . $testimonial->client_image) }}" class="w-10 h-10 rounded-full border border-slate-700 object-cover">
                    @else
                        <div class="w-10 h-10 rounded-full bg-slate-800 border border-slate-700 flex items-center justify-center">
                            <i data-lucide="user" class="w-5 h-5 text-slate-500"></i>
                        </div>
                    @endif
                    <div>
                        <div class="font-bold text-white">{{ $testimonial->client_name }}</div>
                        <div class="text-[10px] text-slate-500 uppercase tracking-widest">{{ $testimonial->client_company }}</div>
                    </div>
                </div>
            </td>
            
            <td class="p-4 text-slate-400 max-w-xs truncate">
                "{{ $testimonial->content }}"
            </td>

            <td class="p-4">
                <div class="flex gap-1">
                    @for($i = 1; $i <= 5; $i++)
                        <i data-lucide="star" class="w-3 h-3 {{ $i <= $testimonial->rating ? 'text-amber-500 fill-amber-500' : 'text-slate-700' }}"></i>
                    @endfor
                </div>
            </td>

            <td class="p-4 text-right flex justify-end gap-3">
                <a href="{{ route('admin.testimonials-admin.show', $testimonial->id) }}" class="text-slate-500 hover:text-blue-500 transition-colors">
                    <i data-lucide="eye" class="w-5 h-5"></i>
                </a>
                <a href="{{ route('admin.testimonials-admin.edit', $testimonial->id) }}" class="text-slate-500 hover:text-amber-500 transition-colors">
                    <i data-lucide="edit" class="w-5 h-5"></i>
                </a>
                <form action="{{ route('admin.testimonials-admin.destroy', $testimonial->id) }}" method="POST" onsubmit="return confirm('Delete this review?');">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="text-slate-500 hover:text-red-500 transition-colors">
                        <i data-lucide="trash-2" class="w-5 h-5"></i>
                    </button>
                </form>
            </td>
        </tr>
    @empty
        <tr>
            <td colspan="4" class="p-12 text-center text-slate-500 font-mono text-xs uppercase tracking-widest">
                No testimonial records found.
            </td>
        </tr>
    @endforelse
</tbody>
                    </table>
                </div>
            </div>

        </div>
    </div>
</x-admin-layout>