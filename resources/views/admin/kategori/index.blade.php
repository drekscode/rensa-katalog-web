@extends('layouts.admin')

@section('title', 'Kategori')
@section('page-title', 'Kategori')

@section('content')
<div x-data="{ 
    showViewModal: false, 
    selectedItem: {},
    search: '{{ request('search') }}',
    openViewModal(item) {
        this.selectedItem = item;
        this.showViewModal = true;
    }
}" class="mx-auto max-w-7xl">
    
    <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4 mb-8">
        <div>
             <h2 class="text-lg font-semibold text-gray-900">Categories</h2>
             <p class="text-sm text-gray-500">Manage the categories for your products.</p>
        </div>
        <div class="flex flex-col sm:flex-row gap-3">
             <form action="{{ route('admin.kategori.index') }}" method="GET" class="relative">
                <div class="pointer-events-none absolute inset-y-0 left-0 flex items-center pl-3">
                    <svg class="h-4 w-4 text-gray-400" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M21 21l-5.197-5.197m0 0A7.5 7.5 0 105.196 5.196a7.5 7.5 0 0010.607 10.607z" />
                    </svg>
                </div>
                <input type="text" 
                       name="search"
                       value="{{ request('search') }}"
                       class="block w-full sm:w-64 rounded-xl border-0 py-2.5 pl-10 pr-3 text-gray-900 ring-1 ring-inset ring-gray-200 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-[#8b9b7e] sm:text-sm sm:leading-6 transition-all" 
                       placeholder="Search categories...">
            </form>
            <a href="{{ route('admin.kategori.create') }}" class="inline-flex items-center justify-center gap-2 rounded-xl bg-[#8b9b7e] px-4 py-2.5 text-sm font-semibold text-white shadow-sm hover:bg-[#7a8a6f] transition-all transform hover:-translate-y-0.5 active:translate-y-0">
                <svg class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                    <path d="M10.75 4.75a.75.75 0 00-1.5 0v4.5h-4.5a.75.75 0 000 1.5h4.5v4.5a.75.75 0 001.5 0v-4.5h4.5a.75.75 0 000-1.5h-4.5v-4.5z" />
                </svg>
                Add Category
            </a>
        </div>
    </div>

    @if($kategoris->isEmpty())
    <!-- Empty State -->
    <div class="relative block w-full rounded-2xl border-2 border-dashed border-gray-300 p-12 text-center hover:border-[#8b9b7e] focus:outline-none focus:ring-2 focus:ring-[#8b9b7e] focus:ring-offset-2 transition-all duration-300 group bg-white/50 max-w-3xl mx-auto">
        <div class="mx-auto flex h-20 w-20 items-center justify-center rounded-full bg-gray-50 group-hover:bg-[#8b9b7e]/10 transition-colors duration-300">
            <svg class="h-10 w-10 text-gray-400 group-hover:text-[#8b9b7e] transition-colors duration-300" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" d="M9.568 3H5.25A2.25 2.25 0 003 5.25v4.318c0 .597.237 1.17.659 1.591l9.581 9.581c.699.699 1.78.872 2.607.33a18.095 18.095 0 005.223-5.223c.542-.827.369-1.908-.33-2.607L11.16 3.66A2.25 2.25 0 009.568 3z" />
            </svg>
        </div>
        <h3 class="mt-4 text-lg font-semibold text-gray-900">No Categories Found</h3>
        <p class="mt-2 text-sm text-gray-500 max-w-sm mx-auto">Get started by creating a new category for your products.</p>
        <div class="mt-8">
            <a href="{{ route('admin.kategori.create') }}" class="inline-flex items-center gap-2 rounded-xl bg-[#8b9b7e] px-6 py-3 text-sm font-semibold text-white shadow-sm hover:bg-[#7a8a6f] focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-[#8b9b7e] transition-all transform hover:-translate-y-0.5 active:translate-y-0">
                <svg class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                    <path d="M10.75 4.75a.75.75 0 00-1.5 0v4.5h-4.5a.75.75 0 000 1.5h4.5v4.5a.75.75 0 001.5 0v-4.5h4.5a.75.75 0 000-1.5h-4.5v-4.5z" />
                </svg>
                Create First Category
            </a>
        </div>
    </div>

    @else
    
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
        @foreach($kategoris as $kategori)
        <!-- Content Card -->
        <div @click="openViewModal({
            'id': '{{ $kategori->id }}',
            'name': '{{ $kategori->nama_kategori }}',
            'keunggulan': '{{ addslashes($kategori->keunggulan_produk) }}',
            'created_at': '{{ $kategori->created_at->format('d M Y H:i') }}'
        })" class="flex flex-col h-full overflow-hidden bg-white shadow-lg shadow-gray-200/50 ring-1 ring-gray-200 rounded-2xl transition-all hover:shadow-xl hover:shadow-gray-200/60 hover:-translate-y-1 group cursor-pointer">
            <!-- Header -->
            <div class="border-b border-gray-100 bg-gray-50/30 px-5 py-4 flex items-center justify-between gap-4">
                <div class="flex items-center gap-2">
                    <span class="text-xs font-medium text-gray-400">#{{ $kategori->id }}</span>
                    <span class="text-xs font-medium text-gray-400">•</span>
                    <span class="text-xs font-medium text-gray-500">{{ $kategori->created_at->format('d M Y') }}</span>
                </div>
            </div>

            <!-- Body -->
            <div class="flex-1 px-6 py-6">
                <h3 class="text-lg font-bold text-gray-900 leading-snug mb-3 group-hover:text-[#8b9b7e] transition-colors">
                    {{ $kategori->nama_kategori }}
                </h3>
                
                @if($kategori->keunggulan_produk)
                <div class="bg-gray-50 rounded-xl p-4 border border-gray-100">
                    <p class="text-xs font-bold text-gray-400 uppercase tracking-wider mb-1">Keunggulan</p>
                    <p class="text-sm text-gray-600 line-clamp-3">
                        {{ $kategori->keunggulan_produk }}
                    </p>
                </div>
                @else
                <div class="bg-gray-50 rounded-xl p-4 border border-gray-100 flex items-center justify-center h-20">
                    <span class="text-xs text-gray-400 italic">No description available</span>
                </div>
                @endif
            </div>

            <!-- Actions -->
            <div class="bg-gray-50 px-5 py-3 flex items-center justify-end gap-2 border-t border-gray-100 mt-auto" @click.stop>

                 <a href="{{ route('admin.kategori.edit', $kategori) }}" 
                   class="inline-flex justify-center items-center p-2 rounded-lg bg-white text-gray-400 shadow-sm ring-1 ring-inset ring-gray-200 hover:bg-gray-50 hover:text-[#8b9b7e] hover:ring-[#8b9b7e]/30 transition-all duration-200" title="Edit">
                    <svg class="h-4 w-4" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
                      <path stroke-linecap="round" stroke-linejoin="round" d="M16.862 4.487l1.687-1.688a1.875 1.875 0 112.652 2.652L10.582 16.07a4.5 4.5 0 01-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 011.13-1.897l8.932-8.931zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0115.75 21H5.25A2.25 2.25 0 013 18.75V8.25A2.25 2.25 0 015.25 6H10" />
                    </svg>
                </a>
                
                <button type="button" 
                        @click="$dispatch('confirm-delete', { 
                            title: 'Delete Category?', 
                            message: 'Are you sure you want to delete \'{{ addslashes($kategori->nama_kategori) }}\'? This will permanently remove it and all related items.',
                            formId: 'delete-form-{{ $kategori->id }}' 
                        })"
                        class="inline-flex justify-center items-center p-2 rounded-lg bg-white text-gray-400 shadow-sm ring-1 ring-inset ring-gray-200 hover:bg-red-50 hover:text-red-500 hover:ring-red-200 transition-all duration-200" title="Delete">
                    <svg class="h-4 w-4" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
                      <path stroke-linecap="round" stroke-linejoin="round" d="M14.74 9l-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 01-2.244 2.077H8.084a2.25 2.25 0 01-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 00-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 013.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 00-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 00-7.5 0" />
                    </svg>
                </button>
                
                <form action="{{ route('admin.kategori.destroy', $kategori) }}" 
                      method="POST" 
                      id="delete-form-{{ $kategori->id }}"
                      class="hidden">
                    @csrf
                    @method('DELETE')
                </form>
            </div>
        </div>
        @endforeach
    </div>

    <div class="mt-8">
        {{ $kategoris->links() }}
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
                        <div class="w-full">
                            <div class="flex items-center justify-between border-b border-gray-100 pb-3 mb-4">
                                <h3 class="text-lg font-bold leading-6 text-gray-900" x-text="'Category Details #' + selectedItem.id"></h3>
                                <button @click="showViewModal = false" class="text-gray-400 hover:text-gray-500 transition-colors">
                                    <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                                    </svg>
                                </button>
                            </div>
                            <div class="space-y-4 text-left">
                                <div>
                                    <label class="block text-xs font-bold text-gray-400 uppercase tracking-wider">Nama Kategori</label>
                                    <p class="mt-1 text-sm text-gray-900 font-medium" x-text="selectedItem.name"></p>
                                </div>
                                <div>
                                    <label class="block text-xs font-bold text-gray-400 uppercase tracking-wider">Keunggulan Produk</label>
                                    <div class="mt-2 text-sm text-gray-600 bg-gray-50 p-4 rounded-xl border border-gray-100 min-h-[80px] whitespace-pre-wrap" x-text="selectedItem.keunggulan"></div>
                                </div>
                                <div>
                                    <label class="block text-xs font-bold text-gray-400 uppercase tracking-wider">Created At</label>
                                    <p class="mt-1 text-sm text-gray-900 font-medium" x-text="selectedItem.created_at"></p>
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
