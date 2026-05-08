<x-admin-layout>
    <div class="bg-[#020617] min-h-screen py-10 relative">
        <div class="absolute inset-0 opacity-[0.03] pointer-events-none" style="background-image: linear-gradient(#f59e0b 1px, transparent 1px), linear-gradient(90deg, #f59e0b 1px, transparent 1px); background-size: 40px 40px;"></div>

        <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
            
            <div class="mb-8">
                <a href="{{ route('admin.portfolio-admin.index') }}" class="text-slate-500 hover:text-amber-500 font-mono text-xs uppercase tracking-widest flex items-center gap-2 mb-2 transition-colors">
                    <i data-lucide="arrow-left" class="w-3 h-3"></i> Back to Portfolio
                </a>
                <h1 class="text-3xl font-black font-['Montserrat',_sans-serif] text-white uppercase tracking-widest">
                    Create <span class="text-amber-500">New Entry</span>
                </h1>
            </div>

            <form action="{{ route('admin.portfolio-admin.store') }}" method="POST" enctype="multipart/form-data" class="bg-slate-900 border border-slate-700 shadow-2xl rounded-sm p-8 md:p-10 relative overflow-hidden">
                <div class="absolute top-0 left-0 w-full h-1.5 opacity-80" style="background-image: repeating-linear-gradient(-45deg, #f59e0b 0, #f59e0b 10px, #0f172a 10px, #0f172a 20px);"></div>
                
                @csrf

                <div class="space-y-6">
                    
                    <div>
                        <label class="block text-xs font-bold text-gray-400 uppercase tracking-widest mb-2 flex items-center gap-2">
                            <i data-lucide="type" class="w-4 h-4"></i> Project Title
                        </label>
                        <input type="text" name="title" required 
                               class="block w-full bg-slate-950/50 border border-slate-700 text-white placeholder-gray-600 focus:border-amber-500 focus:ring-amber-500 rounded-sm shadow-inner transition-colors px-4 py-3"
                               placeholder="e.g. CBD Commercial Fitout">
                    </div>

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div>
                            <label class="block text-xs font-bold text-gray-400 uppercase tracking-widest mb-2 flex items-center gap-2">
                                <i data-lucide="tags" class="w-4 h-4"></i> Category
                            </label>
                            <select name="category" class="block w-full bg-slate-950/50 border border-slate-700 text-white focus:border-amber-500 focus:ring-amber-500 rounded-sm shadow-inner transition-colors px-4 py-3">
                                <option value="Commercial">Commercial</option>
                                <option value="Residential">Residential</option>
                                <option value="Industrial">Industrial</option>
                            </select>
                        </div>
                        
                        <div>
                            <label class="block text-xs font-bold text-gray-400 uppercase tracking-widest mb-2 flex items-center gap-2">
                                <i data-lucide="activity" class="w-4 h-4"></i> Status
                            </label>
                            <select name="status" class="block w-full bg-slate-950/50 border border-slate-700 text-white focus:border-amber-500 focus:ring-amber-500 rounded-sm shadow-inner transition-colors px-4 py-3">
                                <option value="Completed">Completed</option>
                                <option value="In Progress">In Progress</option>
                            </select>
                        </div>

                        <div>
                            <label class="block text-xs font-bold text-gray-400 uppercase tracking-widest mb-2 flex items-center gap-2">
                                <i data-lucide="clock" class="w-4 h-4"></i> Timeline
                            </label>
                            <input type="text" name="timeline" 
                                   class="block w-full bg-slate-950/50 border border-slate-700 text-white placeholder-gray-600 focus:border-amber-500 focus:ring-amber-500 rounded-sm shadow-inner transition-colors px-4 py-3"
                                   placeholder="e.g. 4 Weeks">
                        </div>

                        <div>
                            <label class="block text-xs font-bold text-gray-400 uppercase tracking-widest mb-2 flex items-center gap-2">
                                <i data-lucide="users" class="w-4 h-4"></i> Allocated Crew
                            </label>
                            <input type="text" name="crew" 
                                   class="block w-full bg-slate-950/50 border border-slate-700 text-white placeholder-gray-600 focus:border-amber-500 focus:ring-amber-500 rounded-sm shadow-inner transition-colors px-4 py-3"
                                   placeholder="e.g. 3 Specialists">
                        </div>
                    </div>

                    <div>
                        <label class="block text-xs font-bold text-gray-400 uppercase tracking-widest mb-2 flex items-center gap-2">
                            <i data-lucide="image-plus" class="w-4 h-4"></i> Project Image
                        </label>
                        <input type="file" name="image" required
                               class="block w-full text-sm text-slate-400 file:mr-4 file:py-3 file:px-4 file:rounded-sm file:border-0 file:text-sm file:font-bold file:uppercase file:tracking-widest file:bg-amber-500 file:text-slate-900 hover:file:bg-amber-400 cursor-pointer border border-slate-700 bg-slate-950/50 rounded-sm">
                    </div>

                    <div>
                        <label class="block text-xs font-bold text-gray-400 uppercase tracking-widest mb-2 flex items-center gap-2">
                            <i data-lucide="file-text" class="w-4 h-4"></i> Execution Log (Description)
                        </label>
                        <textarea name="description" rows="5" required 
                                  class="block w-full bg-slate-950/50 border border-slate-700 text-white placeholder-gray-600 focus:border-amber-500 focus:ring-amber-500 rounded-sm shadow-inner transition-colors px-4 py-3"
                                  placeholder="Enter project details, scope of work, and results..."></textarea>
                    </div>

                </div>

                <div class="mt-8 border-t border-slate-800 pt-6 flex justify-end gap-4">
                    <a href="{{ route('admin.portfolio-admin.index') }}" class="px-6 py-3 text-sm font-bold text-gray-400 uppercase tracking-widest hover:text-white transition-colors">Cancel</a>
                    <button type="submit" class="inline-flex justify-center items-center gap-3 rounded-sm bg-amber-500 px-8 py-3 text-sm font-black text-slate-900 shadow-[4px_4px_0px_0px_#475569] hover:shadow-[2px_2px_0px_0px_#475569] hover:translate-x-[2px] hover:translate-y-[2px] transition-all duration-200 uppercase tracking-widest">
                        Save Record <i data-lucide="save" class="w-4 h-4"></i>
                    </button>
                </div>
            </form>

        </div>
    </div>
</x-admin-layout>