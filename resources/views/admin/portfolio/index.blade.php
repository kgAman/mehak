<x-admin-layout>
    
    <!-- Dynamic Header Slot for the Top Sticky Bar -->
    <x-slot name="header">
        <h1 class="text-2xl md:text-3xl font-black text-white uppercase tracking-widest">
            Manage <span class="text-amber-500">Portfolio</span>
        </h1>
    </x-slot>

    <!-- Page Controls -->
    <div class="flex justify-between items-end mb-8 border-b border-slate-800 pb-4">
        <div>
            <a href="{{ route('dashboard') }}" class="text-slate-500 hover:text-amber-500 font-mono text-xs uppercase tracking-widest flex items-center gap-2 mb-2 transition-colors">
                <i data-lucide="arrow-left" class="w-3 h-3"></i> Back to Command Center
            </a>
        </div>
        
        <!-- Add New Button wired to the Create Route -->
        <a href="{{ route('admin.portfolio-admin.create') }}" class="bg-amber-500 text-slate-900 px-6 py-2.5 font-black uppercase tracking-widest text-sm rounded-sm hover:bg-amber-400 shadow-[4px_4px_0px_0px_#475569] hover:shadow-[2px_2px_0px_0px_#475569] hover:translate-x-[2px] hover:translate-y-[2px] transition-all flex items-center gap-2">
            <i data-lucide="plus" class="w-4 h-4"></i> New Entry
        </a>
    </div>

    <!-- Data Table -->
    <div class="bg-slate-900 border border-slate-700 rounded-sm shadow-xl overflow-hidden">
        <div class="overflow-x-auto">
            <table class="w-full text-left border-collapse">
                <thead>
                    <tr class="bg-slate-950 text-slate-400 font-mono text-xs uppercase tracking-wider">
                        <th class="p-4 border-b border-slate-800">ID / Serial</th>
                        <th class="p-4 border-b border-slate-800">Project Title</th>
                        <th class="p-4 border-b border-slate-800">Category</th>
                        <th class="p-4 border-b border-slate-800">Date Added</th>
                        <th class="p-4 border-b border-slate-800 text-right">Actions</th>
                    </tr>
                </thead>
                <tbody class="text-sm divide-y divide-slate-800/50">
                    
                    @forelse($portfolios as $portfolio)
                    <tr class="hover:bg-slate-800/30 transition-colors group">
                        <!-- Format ID to look like PRJ-001 -->
                        <td class="p-4 text-amber-500 font-mono text-xs">PRJ-{{ str_pad($portfolio->id, 3, '0', STR_PAD_LEFT) }}</td>
                        <td class="p-4 font-bold text-white">{{ $portfolio->title }}</td>
                        <td class="p-4 text-slate-400 capitalize">{{ $portfolio->category ?? 'General' }}</td>
                        <td class="p-4 text-slate-400 font-mono text-xs">{{ $portfolio->created_at->format('M d, Y') }}</td>
                        
                        <td class="p-4 text-right flex justify-end gap-3">
                            <!-- View Button -->
                            <a href="{{ route('admin.portfolio-admin.show', $portfolio->id) }}" class="text-slate-500 hover:text-blue-500 transition-colors" title="View">
                                <i data-lucide="eye" class="w-5 h-5"></i>
                            </a>
                            <!-- Edit Button -->
                            <a href="{{ route('admin.portfolio-admin.edit', $portfolio->id) }}" class="text-slate-500 hover:text-amber-500 transition-colors" title="Edit">
                                <i data-lucide="edit" class="w-5 h-5"></i>
                            </a>
                            <!-- Delete Form -->
                            <form action="{{ route('admin.portfolio-admin.destroy', $portfolio->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to permanently delete this project?');">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="text-slate-500 hover:text-red-500 transition-colors" title="Delete">
                                    <i data-lucide="trash-2" class="w-5 h-5"></i>
                                </button>
                            </form>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="5" class="p-12 text-center text-slate-500 font-mono text-sm">
                            <div class="flex flex-col items-center justify-center">
                                <i data-lucide="folder-open" class="w-12 h-12 text-slate-700 mb-3"></i>
                                <p>No portfolio entries found. Click "New Entry" to add one.</p>
                            </div>
                        </td>
                    </tr>
                    @endforelse
                    
                </tbody>
            </table>
        </div>
        
        <!-- Pagination -->
        @if(method_exists($portfolios, 'links') && $portfolios->hasPages())
        <div class="bg-slate-950 border-t border-slate-800 p-4">
            {{ $portfolios->links() }}
        </div>
        @endif
    </div>

</x-admin-layout>