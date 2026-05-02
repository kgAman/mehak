<x-admin-layout>
    <!-- Dynamic Header Slot -->
    <x-slot name="header">
        <h1 class="text-2xl md:text-3xl font-black text-white uppercase tracking-widest">
            Review <span class="text-amber-500">Record</span>
        </h1>
    </x-slot>

    <div class="max-w-2xl mx-auto">
        
        <!-- Controls -->
        <div class="flex justify-between items-end mb-8">
            <div>
                <a href="{{ route('admin.testimonials-admin.index') }}" class="text-slate-500 hover:text-amber-500 font-mono text-xs uppercase tracking-widest flex items-center gap-2 mb-2 transition-colors">
                    <i data-lucide="arrow-left" class="w-3 h-3"></i> Back to Testimonials
                </a>
            </div>
            
            <div class="flex gap-3">
                <a href="{{ route('admin.testimonials-admin.edit', $testimonial->id) }}" class="bg-slate-800 text-white px-4 py-2.5 font-bold uppercase tracking-widest text-xs rounded-sm border border-slate-700 hover:border-amber-500 hover:text-amber-500 transition-all flex items-center gap-2">
                    <i data-lucide="edit" class="w-4 h-4"></i>
                </a>
                <form action="{{ route('admin.testimonials-admin.destroy', $testimonial->id) }}" method="POST" onsubmit="return confirm('Permanently delete this review record?');">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="bg-red-500/10 text-red-500 px-4 py-2.5 font-bold uppercase tracking-widest text-xs rounded-sm border border-red-500/30 hover:bg-red-500 hover:text-white transition-all">
                        <i data-lucide="trash-2" class="w-4 h-4"></i>
                    </button>
                </form>
            </div>
        </div>

        <!-- The Review Card -->
        <div class="bg-slate-900 border-2 border-slate-700 shadow-2xl rounded-sm p-8 md:p-10 relative overflow-hidden text-center">
            
            <!-- Quote Icon -->
            <div class="absolute top-4 right-4 w-12 h-12 bg-amber-500/10 border border-amber-500/30 rounded-full flex items-center justify-center">
                <i data-lucide="quote" class="w-5 h-5 text-amber-500"></i>
            </div>

            <!-- Dynamic Star Rating -->
            <div class="flex justify-center gap-1 mb-6 mt-4">
                @for($i = 1; $i <= 5; $i++)
                    <i data-lucide="star" class="w-6 h-6 {{ $i <= ($testimonial->rating ?? 5) ? 'text-amber-500 fill-amber-500' : 'text-slate-700' }}"></i>
                @endfor
            </div>

            <!-- Dynamic Content -->
            <p class="text-white font-['Montserrat',_sans-serif] text-xl leading-relaxed italic mb-8 border-b border-slate-800 pb-8">
                "{{ $testimonial->content }}"
            </p>

            <div>
                <h4 class="text-amber-500 font-black font-['Montserrat',_sans-serif] text-lg uppercase tracking-widest">
                    {{ $testimonial->client_name }}
                </h4>
                <p class="text-slate-500 font-mono text-xs uppercase tracking-widest mt-1">
                    {{ $testimonial->project_scope ?? 'Facility Maintenance' }}
                </p>
                <div class="mt-4 inline-block px-3 py-1 bg-slate-950 border border-slate-800 rounded-sm text-[10px] font-bold text-slate-400 uppercase tracking-widest">
                    Type: {{ $testimonial->client_type ?? 'Commercial' }}
                </div>
            </div>

        </div>
    </div>
</x-admin-layout>