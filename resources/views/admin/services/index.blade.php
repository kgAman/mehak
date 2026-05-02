<x-admin-layout>
    
    <!-- Dynamic Header Slot for the Top Sticky Bar -->
    <x-slot name="header">
        <h1 class="text-2xl md:text-3xl font-black text-white uppercase tracking-widest">
            Manage <span class="text-amber-500">Services</span>
        </h1>
    </x-slot>

    <!-- Page Controls -->
    <div class="flex justify-between items-end mb-8 border-b border-slate-800 pb-4">
        <div>
            <a href="{{ route('dashboard') }}" class="text-slate-500 hover:text-amber-500 font-mono text-xs uppercase tracking-widest flex items-center gap-2 mb-2 transition-colors">
                <i data-lucide="arrow-left" class="w-3 h-3"></i> Back to Command Center
            </a>
        </div>
        
        <!-- Add Service Button wired to create route -->
        <a href="{{ route('admin.services-admin.create') }}" class="bg-amber-500 text-slate-900 px-6 py-2.5 font-black uppercase tracking-widest text-sm rounded-sm hover:bg-amber-400 shadow-[4px_4px_0px_0px_#475569] hover:shadow-[2px_2px_0px_0px_#475569] hover:translate-x-[2px] hover:translate-y-[2px] transition-all flex items-center gap-2">
            <i data-lucide="plus" class="w-4 h-4"></i> Add Service
        </a>
    </div>

    <!-- Data Table -->
    <div class="bg-slate-900 border border-slate-700 rounded-sm shadow-xl overflow-hidden">
        <div class="overflow-x-auto">
            <table class="w-full text-left border-collapse">
                <thead>
                    <tr class="bg-slate-950 text-slate-400 font-mono text-xs uppercase tracking-wider">
                        <th class="p-4 border-b border-slate-800">Icon</th>
                        <th class="p-4 border-b border-slate-800">Service Title</th>
                        <th class="p-4 border-b border-slate-800">Description</th>
                        <th class="p-4 border-b border-slate-800 text-right">Actions</th>
                    </tr>
                </thead>
                <tbody class="text-sm divide-y divide-slate-800/50">
                    
                    @forelse($services as $service)
                    <tr class="hover:bg-slate-800/30 transition-colors group">
                        <td class="p-4">
                            <div class="w-10 h-10 bg-slate-950 border border-slate-800 flex items-center justify-center rounded-sm">
                                <!-- Dynamic Lucide Icon from Database -->
                                <i data-lucide="{{ $service->icon ?? 'wrench' }}" class="w-5 h-5 text-amber-500"></i>
                            </div>
                        </td>
                        <td class="p-4 font-bold text-white uppercase tracking-wider">
                            {{ $service->title }}
                        </td>
                        <!-- FIXED: Changed description to content to match your database -->
                        <td class="p-4 text-slate-400 max-w-md truncate">
                            {{ $service->content }}
                        </td>
                        <td class="p-4 text-right flex justify-end gap-3 items-center h-16">
                            <!-- Edit Action -->
                            <a href="{{ route('admin.services-admin.edit', $service->id) }}" class="text-slate-500 hover:text-amber-500 transition-colors mt-2" title="Edit">
                                <i data-lucide="edit" class="w-5 h-5"></i>
                            </a>
                            
                            <!-- Delete Action -->
                            <form action="{{ route('admin.services-admin.destroy', $service->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this service?');">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="text-slate-500 hover:text-red-500 transition-colors mt-2" title="Delete">
                                    <i data-lucide="trash-2" class="w-5 h-5"></i>
                                </button>
                            </form>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="4" class="p-12 text-center text-slate-500 font-mono text-sm">
                            <div class="flex flex-col items-center justify-center">
                                <i data-lucide="hammer" class="w-12 h-12 text-slate-700 mb-3"></i>
                                <p>No services found in database. Click "Add Service" to create one.</p>
                            </div>
                        </td>
                    </tr>
                    @endforelse
                    
                </tbody>
            </table>
        </div>
        
        <!-- Pagination -->
        @if(method_exists($services, 'links') && $services->hasPages())
        <div class="bg-slate-950 border-t border-slate-800 p-4">
            {{ $services->links() }}
        </div>
        @endif
    </div>

</x-admin-layout>