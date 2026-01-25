@extends('layouts.admin')

@section('title', 'Manage Welcome Text')
@section('page-title', 'Manage Welcome Text')

@section('content')
<div x-data="{ 
    showViewModal: false, 
    selectedItem: {},
    openViewModal(item) {
        this.selectedItem = item;
        this.showViewModal = true;
    }
}" class="mx-auto max-w-7xl">
    
    <div class="flex items-center justify-between mb-8">
        <div>
             <h2 class="text-lg font-semibold text-gray-900">Configured Messages</h2>
             <p class="text-sm text-gray-500">The application will display one of these messages at random.</p>
        </div>
        <a href="{{ route('admin.welcome-text.create') }}" class="inline-flex items-center gap-2 rounded-xl bg-[#8b9b7e] px-4 py-2.5 text-sm font-semibold text-white shadow-sm hover:bg-[#7a8a6f] transition-all transform hover:-translate-y-0.5 active:translate-y-0">
            <svg class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                <path d="M10.75 4.75a.75.75 0 00-1.5 0v4.5h-4.5a.75.75 0 000 1.5h4.5v4.5a.75.75 0 001.5 0v-4.5h4.5a.75.75 0 000-1.5h-4.5v-4.5z" />
            </svg>
            Add New Message
        </a>
    </div>

    @if($welcomeTexts->isEmpty())
    <!-- Empty State -->
    <div class="relative block w-full rounded-2xl border-2 border-dashed border-gray-300 p-12 text-center hover:border-[#8b9b7e] focus:outline-none focus:ring-2 focus:ring-[#8b9b7e] focus:ring-offset-2 transition-all duration-300 group bg-white/50 max-w-3xl mx-auto">
        <div class="mx-auto flex h-20 w-20 items-center justify-center rounded-full bg-gray-50 group-hover:bg-[#8b9b7e]/10 transition-colors duration-300">
            <svg class="h-10 w-10 text-gray-400 group-hover:text-[#8b9b7e] transition-colors duration-300" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M12 9v6m3-3H9m12 0a9 9 0 11-18 0 9 9 0 0118 0z" />
            </svg>
        </div>
        <h3 class="mt-4 text-lg font-semibold text-gray-900">No Welcome Texts Configured</h3>
        <p class="mt-2 text-sm text-gray-500 max-w-sm mx-auto">Enhance your user's first impression by adding personalized greetings and headlines.</p>
        <div class="mt-8">
            <a href="{{ route('admin.welcome-text.create') }}" class="inline-flex items-center gap-2 rounded-xl bg-[#8b9b7e] px-6 py-3 text-sm font-semibold text-white shadow-sm hover:bg-[#7a8a6f] focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-[#8b9b7e] transition-all transform hover:-translate-y-0.5 active:translate-y-0">
                <svg class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                    <path d="M10.75 4.75a.75.75 0 00-1.5 0v4.5h-4.5a.75.75 0 000 1.5h4.5v4.5a.75.75 0 001.5 0v-4.5h4.5a.75.75 0 000-1.5h-4.5v-4.5z" />
                </svg>
                Create First Message
            </a>
        </div>
    </div>

    @else
    
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
        @foreach($welcomeTexts as $welcomeText)
        <!-- Content Card -->
        <div @click="openViewModal({
            'id': '{{ $welcomeText->id }}',
            'greeting': '{{ addslashes($welcomeText->greeting) }}',
            'title': '{{ addslashes($welcomeText->title) }}',
            'active': {{ $welcomeText->is_active ? 'true' : 'false' }},
            'created_at': '{{ $welcomeText->created_at->format('d M Y H:i') }}'
        })" class="flex flex-col h-full overflow-hidden bg-white shadow-lg shadow-gray-200/50 ring-1 ring-gray-200 rounded-2xl transition-all hover:shadow-xl hover:shadow-gray-200/60 hover:-translate-y-1 group cursor-pointer">
            <!-- Header -->
            <div class="border-b border-gray-100 bg-gray-50/30 px-5 py-4 flex items-center justify-between gap-4">
                <div class="flex items-center gap-2">
                    <span class="text-xs font-medium text-gray-400">#{{ $welcomeText->id }}</span>
                </div>
                <div>
                    <form action="{{ route('admin.welcome-text.toggle-status', $welcomeText) }}" method="POST" class="inline" @click.stop>
                        @csrf
                        @method('PATCH')
                        <button type="submit" 
                                class="inline-flex items-center gap-1.5 rounded-full px-2.5 py-0.5 text-xs font-semibold ring-1 ring-inset transition-all duration-200 cursor-pointer hover:ring-opacity-100 ring-opacity-50 {{ $welcomeText->is_active ? 'bg-green-50 text-green-700 ring-green-600/20 hover:bg-green-100' : 'bg-gray-50 text-gray-600 ring-gray-500/10 hover:bg-gray-100' }}"
                                title="Click to {{ $welcomeText->is_active ? 'deactivate' : 'activate' }}">
                            <span class="relative flex h-1.5 w-1.5">
                              <span class="animate-ping absolute inline-flex h-full w-full rounded-full {{ $welcomeText->is_active ? 'bg-green-400 opacity-75' : 'bg-gray-400 opacity-0' }}"></span>
                              <span class="relative inline-flex rounded-full h-1.5 w-1.5 {{ $welcomeText->is_active ? 'bg-green-500' : 'bg-gray-500' }}"></span>
                            </span>
                            {{ $welcomeText->is_active ? 'Active' : 'Inactive' }}
                        </button>
                    </form>
                </div>
            </div>

            <!-- Body -->
            <div class="flex-1 px-6 py-6 group">
                <div class="bg-gray-50/50 rounded-xl border border-gray-100 p-5 relative overflow-hidden h-full">
                    <!-- Decorative Quotes -->
                    <div class="absolute top-2 left-2 text-gray-200 text-5xl font-serif select-none pointer-events-none opacity-40">“</div>
                    
                    <div class="relative z-10 space-y-4 pl-1">
                        <div>
                            <p class="text-sm font-bold text-[#8b9b7e] uppercase tracking-wider mb-1 text-[10px]">Greeting</p>
                            <p class="text-lg font-medium text-gray-600 italic font-serif line-clamp-1">"{{ $welcomeText->greeting ?? '-' }}"</p>
                        </div>
                        
                        <div class="w-8 h-px bg-gray-200"></div>

                        <div>
                            <p class="text-sm font-bold text-[#8b9b7e] uppercase tracking-wider mb-1 text-[10px]">Headline</p>
                            <p class="text-xl font-bold text-gray-900 leading-snug line-clamp-3">
                                {{ $welcomeText->title ?? '-' }}
                            </p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Actions -->
            <div class="bg-gray-50 px-5 py-3 flex items-center justify-between gap-3 border-t border-gray-100 mt-auto" @click.stop>
                 <span class="text-xs text-gray-400 font-medium">{{ $welcomeText->created_at->diffForHumans() }}</span>
                 
                 <div class="flex items-center gap-2">
                     <a href="{{ route('admin.welcome-text.edit', $welcomeText) }}" 
                       class="inline-flex justify-center items-center p-2 rounded-lg bg-white text-gray-400 shadow-sm ring-1 ring-inset ring-gray-200 hover:bg-gray-50 hover:text-[#8b9b7e] transition-all duration-200" title="Edit">
                        <svg class="h-4 w-4" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                          <path stroke-linecap="round" stroke-linejoin="round" d="M16.862 4.487l1.687-1.688a1.875 1.875 0 112.652 2.652L10.582 16.07a4.5 4.5 0 01-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 011.13-1.897l8.932-8.931zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0115.75 21H5.25A2.25 2.25 0 013 18.75V8.25A2.25 2.25 0 015.25 6H10" />
                        </svg>
                    </a>
                    
                    <button type="button" 
                            @click="$dispatch('confirm-delete', { 
                                title: 'Delete Message?', 
                                message: 'Are you sure you want to delete this welcome message?',
                                formId: 'delete-form-{{ $welcomeText->id }}' 
                            })"
                            class="inline-flex justify-center items-center p-2 rounded-lg bg-white text-gray-400 shadow-sm ring-1 ring-inset ring-gray-200 hover:bg-red-50 hover:text-red-500 hover:ring-red-200 transition-all duration-200" title="Delete">
                        <svg class="h-4 w-4" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                          <path stroke-linecap="round" stroke-linejoin="round" d="M14.74 9l-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 01-2.244 2.077H8.084a2.25 2.25 0 01-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 00-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 013.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 00-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 00-7.5 0" />
                        </svg>
                    </button>
                    
                    <form action="{{ route('admin.welcome-text.destroy', $welcomeText) }}" 
                          method="POST" 
                          id="delete-form-{{ $welcomeText->id }}"
                          class="hidden">
                        @csrf
                        @method('DELETE')
                    </form>
                 </div>
            </div>
        </div>
        @endforeach
    </div>

    <div class="mt-8">
        {{ $welcomeTexts->links() }}
    </div>

    @endif

    <!-- View Modal -->
    <template x-teleport="body">
        <div x-show="showViewModal" 
             class="fixed inset-0 z-[100] overflow-y-auto" 
             style="display: none;"
             x-show="showViewModal">
            <div class="flex min-h-full items-end justify-center p-4 text-center sm:items-center sm:p-0">
                <div x-show="showViewModal"
                     x-transition:enter="transition ease-out duration-300"
                     x-transition:enter-start="opacity-0"
                     x-transition:enter-end="opacity-100"
                     x-transition:leave="transition ease-in duration-200"
                     x-transition:leave-start="opacity-100"
                     x-transition:leave-end="opacity-0"
                     class="fixed inset-0 bg-gray-500/75 backdrop-blur-sm transition-opacity" 
                     @click="showViewModal = false"></div>

                <div x-show="showViewModal"
                     x-transition:enter="transition ease-out duration-300"
                     x-transition:enter-start="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95"
                     x-transition:enter-end="opacity-100 translate-y-0 sm:scale-100"
                     x-transition:leave="transition ease-in duration-200"
                     x-transition:leave-start="opacity-100 translate-y-0 sm:scale-100"
                     x-transition:leave-end="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95"
                     class="relative transform overflow-hidden rounded-2xl bg-white text-left shadow-2xl transition-all sm:my-8 sm:w-full sm:max-w-lg">
                    
                    <div class="bg-white px-4 pb-4 pt-5 sm:p-6 sm:pb-4">
                        <div class="w-full text-left">
                            <div class="flex items-center justify-between border-b border-gray-100 pb-3 mb-4">
                                <h3 class="text-lg font-bold leading-6 text-gray-900" x-text="'Message Details #' + selectedItem.id"></h3>
                                <div class="flex items-center gap-2">
                                    <span class="inline-flex items-center gap-1.5 rounded-full px-2 py-0.5 text-xs font-semibold ring-1 ring-inset"
                                          :class="selectedItem.active ? 'bg-green-50 text-green-700 ring-green-600/20' : 'bg-gray-50 text-gray-600 ring-gray-500/10'">
                                          <span class="relative flex h-1.5 w-1.5">
                                            <span class="animate-ping absolute inline-flex h-full w-full rounded-full opacity-75" :class="selectedItem.active ? 'bg-green-400' : 'bg-gray-400'"></span>
                                            <span class="relative inline-flex rounded-full h-1.5 w-1.5" :class="selectedItem.active ? 'bg-green-500' : 'bg-gray-500'"></span>
                                          </span>
                                          <span x-text="selectedItem.active ? 'Active' : 'Inactive'"></span>
                                    </span>
                                    <button @click="showViewModal = false" class="text-gray-400 hover:text-gray-500 transition-colors">
                                        <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                                        </svg>
                                    </button>
                                </div>
                            </div>
                            <div class="space-y-6">
                                <div class="relative">
                                     <div class="absolute top-0 left-0 text-gray-200 text-6xl font-serif select-none pointer-events-none opacity-40 -translate-x-2 -translate-y-4">“</div>
                                     <div class="relative z-10 space-y-4">
                                        <div>
                                            <label class="block text-xs font-bold text-[#8b9b7e] uppercase tracking-wider mb-1">Greeting</label>
                                            <p class="text-xl font-medium text-gray-600 italic font-serif" x-text="'&quot;' + selectedItem.greeting + '&quot;'"></p>
                                        </div>
                                        
                                        <div class="w-12 h-px bg-gray-200"></div>

                                        <div>
                                            <label class="block text-xs font-bold text-[#8b9b7e] uppercase tracking-wider mb-2">Headline</label>
                                            <p class="text-2xl font-bold text-gray-900 leading-snug" x-text="selectedItem.title"></p>
                                        </div>
                                     </div>
                                </div>
                                
                                <div class="pt-4 border-t border-gray-50">
                                    <label class="block text-xs font-bold text-gray-400 uppercase tracking-wider">Created At</label>
                                    <p class="mt-1 text-sm text-gray-600 font-medium" x-text="selectedItem.created_at"></p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="bg-gray-50/50 px-4 py-4 sm:flex sm:flex-row-reverse sm:px-6 border-t border-gray-100">
                        <button type="button" 
                                class="inline-flex w-full justify-center rounded-lg bg-[#8b9b7e] px-4 py-2.5 text-sm font-semibold text-white shadow-sm hover:bg-[#7a8a6f] sm:ml-3 sm:w-auto transition-all transform active:scale-95" 
                                @click="showViewModal = false">
                            Close
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </template>

</div>
@endsection
