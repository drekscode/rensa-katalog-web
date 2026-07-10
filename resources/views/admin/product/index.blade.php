@extends('layouts.admin')

@section('title', 'Products')
@section('page-title', 'Products')

@section('content')
<div x-data="{ 
    showViewModal: false, 
    selectedItem: {},
    search: '{{ request('search') }}',
    expandedSeries: {},
    openViewModal(item) {
        this.selectedItem = item;
        this.showViewModal = true;
    },
    toggleSeries(seriesKey) {
        this.expandedSeries[seriesKey] = !this.expandedSeries[seriesKey];
    },
    isSeriesExpanded(seriesKey) {
        if (this.expandedSeries[seriesKey] === undefined) {
            return false;
        }
        return this.expandedSeries[seriesKey] === true;
    },
    expandAll() {
        @if(!$products->isEmpty())
            @php
                $seriesKeysForExpand = $products->getCollection()->groupBy(function($product) {
                    return $product->series_id ?? 'unknown';
                })->keys();
            @endphp
            @foreach($seriesKeysForExpand as $seriesKey)
                this.expandedSeries['{{ $seriesKey }}'] = true;
            @endforeach
        @endif
    },
    collapseAll() {
        @if(!$products->isEmpty())
            @php
                $seriesKeysForCollapse = $products->getCollection()->groupBy(function($product) {
                    return $product->series_id ?? 'unknown';
                })->keys();
            @endphp
            @foreach($seriesKeysForCollapse as $seriesKey)
                this.expandedSeries['{{ $seriesKey }}'] = false;
            @endforeach
        @endif
    }
}" class="mx-auto max-w-7xl">
    
    <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4 mb-8">
        <div>
             <h2 class="text-lg font-semibold text-gray-900">Products</h2>
             <p class="text-sm text-gray-500">Manage your product items.</p>
        </div>
        <div class="flex flex-col sm:flex-row gap-3">
             <form action="{{ route('admin.product.index') }}" method="GET" class="relative">
                <div class="pointer-events-none absolute inset-y-0 left-0 flex items-center pl-3">
                    <svg class="h-4 w-4 text-gray-400" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M21 21l-5.197-5.197m0 0A7.5 7.5 0 105.196 5.196a7.5 7.5 0 0010.607 10.607z" />
                    </svg>
                </div>
                <input type="text" 
                       name="search"
                       value="{{ request('search') }}"
                       class="block w-full sm:w-64 rounded-xl border-0 py-2.5 pl-10 pr-3 text-gray-900 ring-1 ring-inset ring-gray-200 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-[#8b9b7e] sm:text-sm sm:leading-6 transition-all" 
                       placeholder="Search products...">
            </form>
            <a href="{{ route('admin.product.create') }}" class="inline-flex items-center justify-center gap-2 rounded-xl bg-[#8b9b7e] px-4 py-2.5 text-sm font-semibold text-white shadow-sm hover:bg-[#7a8a6f] transition-all transform hover:-translate-y-0.5 active:translate-y-0">
                <svg class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                    <path d="M10.75 4.75a.75.75 0 00-1.5 0v4.5h-4.5a.75.75 0 000 1.5h4.5v4.5a.75.75 0 001.5 0v-4.5h4.5a.75.75 0 000-1.5h-4.5v-4.5z" />
                </svg>
                Add Product
            </a>
        </div>
    </div>

    @if($products->isEmpty())
    <!-- Empty State -->
    <div class="relative block w-full rounded-2xl border-2 border-dashed border-gray-300 p-12 text-center hover:border-[#8b9b7e] focus:outline-none focus:ring-2 focus:ring-[#8b9b7e] focus:ring-offset-2 transition-all duration-300 group bg-white/50 max-w-3xl mx-auto">
        <div class="mx-auto flex h-20 w-20 items-center justify-center rounded-full bg-gray-50 group-hover:bg-[#8b9b7e]/10 transition-colors duration-300">
            <svg class="h-10 w-10 text-gray-400 group-hover:text-[#8b9b7e] transition-colors duration-300" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" d="M20.25 7.5l-.625 10.632a2.25 2.25 0 01-2.247 2.118H6.622a2.25 2.25 0 01-2.247-2.118L3.75 7.5M10 11.25h4M3.375 7.5h17.25c.621 0 1.125-.504 1.125-1.125v-1.5c0-.621-.504-1.125-1.125-1.125H3.375c-.621 0-1.125.504-1.125 1.125v1.5c0 .621.504 1.125 1.125 1.125z" />
            </svg>
        </div>
        <h3 class="mt-4 text-lg font-semibold text-gray-900">No Products Found</h3>
        <p class="mt-2 text-sm text-gray-500 max-w-sm mx-auto">Get started by creating a new product item.</p>
        <div class="mt-8">
            <a href="{{ route('admin.product.create') }}" class="inline-flex items-center gap-2 rounded-xl bg-[#8b9b7e] px-6 py-3 text-sm font-semibold text-white shadow-sm hover:bg-[#7a8a6f] focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-[#8b9b7e] transition-all transform hover:-translate-y-0.5 active:translate-y-0">
                <svg class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                    <path d="M10.75 4.75a.75.75 0 00-1.5 0v4.5h-4.5a.75.75 0 000 1.5h4.5v4.5a.75.75 0 001.5 0v-4.5h4.5a.75.75 0 000-1.5h-4.5v-4.5z" />
                </svg>
                Create First Product
            </a>
        </div>
    </div>

    @else
    
    @php
        $groupedProducts = $products->getCollection()->groupBy(function($product) {
            return $product->series_id ?? 'unknown';
        });
        $totalProducts = $groupedProducts->sum(function($seriesProducts) {
            return $seriesProducts->count();
        });
        $activeSeriesCount = $groupedProducts->count();
    @endphp

    <div class="flex items-center justify-between mb-4 pb-4 border-b border-gray-200">
        <div class="text-sm text-gray-600">
            <span class="font-medium">{{ $activeSeriesCount }}</span> series with
            <span class="font-medium">{{ $totalProducts }}</span> products on this page
        </div>
        <div class="flex gap-2">
            <button @click="expandAll()"
                    class="inline-flex items-center gap-1.5 px-3 py-1.5 text-xs font-medium text-gray-700 bg-white rounded-lg border border-gray-300 hover:bg-gray-50 hover:border-[#8b9b7e] hover:text-[#8b9b7e] transition-all">
                <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M3.75 3.75v4.5m0-4.5h4.5m-4.5 0L9 9M3.75 20.25v-4.5m0 4.5h4.5m-4.5 0L9 15M20.25 3.75h-4.5m4.5 0v4.5m0-4.5L15 9m5.25 11.25h-4.5m4.5 0v-4.5m0 4.5L15 15" />
                </svg>
                Expand All
            </button>
            <button @click="collapseAll()"
                    class="inline-flex items-center gap-1.5 px-3 py-1.5 text-xs font-medium text-gray-700 bg-white rounded-lg border border-gray-300 hover:bg-gray-50 hover:border-gray-400 transition-all">
                <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M9 9V4.5M9 9H4.5M9 9L3.75 3.75M9 15v4.5M9 15H4.5M9 15l-5.25 5.25M15 9h4.5M15 9V4.5M15 9l5.25-5.25M15 15h4.5M15 15v4.5m0-4.5l5.25 5.25" />
                </svg>
                Collapse All
            </button>
        </div>
    </div>

    <div class="space-y-4">
        @foreach($groupedProducts as $seriesKey => $seriesProducts)
        @php
            $firstProduct = $seriesProducts->first();
            $seriesName = $firstProduct?->series?->nama_series ?? 'Unknown Series';
        @endphp
        <div class="bg-white rounded-xl shadow-sm shadow-gray-200/50 ring-1 ring-gray-200 overflow-hidden transition-all hover:shadow-md hover:shadow-gray-200/60">
            <div @click="toggleSeries('{{ $seriesKey }}')"
                 class="flex items-center justify-between px-5 py-4 cursor-pointer hover:bg-gray-50 transition-all group">
                <div class="flex items-center gap-3 flex-1">
                    <div class="flex items-center justify-center w-10 h-10 rounded-lg bg-[#8b9b7e]/10 group-hover:bg-[#8b9b7e]/20 transition-colors flex-shrink-0">
                        <svg class="w-5 h-5 text-[#8b9b7e]" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M20.25 7.5l-.625 10.632a2.25 2.25 0 01-2.247 2.118H6.622a2.25 2.25 0 01-2.247-2.118L3.75 7.5M10 11.25h4M3.375 7.5h17.25c.621 0 1.125-.504 1.125-1.125v-1.5c0-.621-.504-1.125-1.125-1.125H3.375c-.621 0-1.125.504-1.125 1.125v1.5c0 .621.504 1.125 1.125 1.125z" />
                        </svg>
                    </div>
                    <div class="flex-1 min-w-0">
                        <h3 class="text-base font-bold text-gray-900 group-hover:text-[#8b9b7e] transition-colors truncate">
                            {{ $seriesName }}
                        </h3>
                        <p class="text-sm text-gray-500 mt-0.5">
                            {{ $seriesProducts->count() }} {{ Str::plural('product', $seriesProducts->count()) }}
                        </p>
                    </div>
                </div>
                <div class="flex items-center gap-2 flex-shrink-0 ml-4">
                    <span class="inline-flex items-center justify-center min-w-[28px] h-7 rounded-lg bg-[#8b9b7e]/10 px-2 text-sm font-semibold text-[#8b9b7e]">
                        {{ $seriesProducts->count() }}
                    </span>
                    <svg class="h-5 w-5 text-gray-400 transition-transform duration-200"
                         :class="{ 'rotate-180': isSeriesExpanded('{{ $seriesKey }}') }"
                         fill="none" viewBox="0 0 24 24" stroke-width="2.5" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M19 9l-7 7-7-7" />
                    </svg>
                </div>
            </div>

            <div x-show="isSeriesExpanded('{{ $seriesKey }}')"
                 x-transition:enter="transition ease-out duration-200"
                 x-transition:enter-start="opacity-0 -translate-y-2"
                 x-transition:enter-end="opacity-100 translate-y-0"
                 x-transition:leave="transition ease-in duration-150"
                 x-transition:leave-start="opacity-100 translate-y-0"
                 x-transition:leave-end="opacity-0 -translate-y-2"
                 class="border-t border-gray-100">
                <div class="p-5 bg-gray-50/30">
                    <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-5 gap-6 auto-rows-fr">
                        @foreach($seriesProducts as $product)
                        <div @click="openViewModal({
                            'id': '{{ $product->id }}',
                            'series': '{{ addslashes($product->series->nama_series ?? '-') }}',
                            'name': '{{ addslashes($product->nama_product) }}',
                            'thumbnail': '{{ $product->thumbnail ? (str_starts_with($product->thumbnail, 'data:') || str_starts_with($product->thumbnail, 'http') ? $product->thumbnail : asset('storage/' . $product->thumbnail)) : '' }}',
                            'big_pic': {{ $product->big_pic ? json_encode(array_values(array_filter(array_map(function($pic) { return is_string($pic) ? (str_starts_with($pic, 'data:') || str_starts_with($pic, 'http') ? $pic : asset('storage/' . $pic)) : null; }, is_array($product->big_pic) ? $product->big_pic : [$product->big_pic])))) : '[]' }}
                        })" class="flex flex-col h-full overflow-hidden bg-white shadow-lg shadow-gray-200/50 ring-1 ring-gray-200 rounded-2xl transition-all hover:shadow-xl hover:shadow-gray-200/60 hover:-translate-y-1 group cursor-pointer">
                            <div class="aspect-square bg-gray-100 relative overflow-hidden group-hover:scale-[1.02] transition-transform duration-500">
                                @if($product->thumbnail)
                                    <img src="{{ str_starts_with($product->thumbnail, 'data:') || str_starts_with($product->thumbnail, 'http') ? $product->thumbnail : asset('storage/' . $product->thumbnail) }}" class="w-full h-full object-cover" loading="lazy" decoding="async">
                                    <div class="absolute inset-0 bg-gradient-to-t from-black/50 to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-300"></div>
                                @else
                                    <div class="w-full h-full flex items-center justify-center bg-gray-50 border-b border-gray-100">
                                        <span class="text-xs text-gray-400 italic">No Thumbnail</span>
                                    </div>
                                @endif
                            </div>

                            <div class="p-4 flex-1 flex flex-col">
                                <div class="mb-1">
                                    <span class="text-[10px] font-bold text-gray-400 uppercase tracking-wider">Product Name</span>
                                </div>
                                <h3 class="text-base font-bold text-gray-900 leading-snug group-hover:text-[#8b9b7e] transition-colors mb-4 line-clamp-2">
                                    {{ $product->nama_product }}
                                </h3>

                                <div class="mt-auto pt-3 border-t border-gray-100 flex items-center justify-between gap-2" @click.stop>
                                    <span class="text-xs font-medium text-gray-400">#{{ $product->id }}</span>

                                    <div class="flex items-center gap-1">
                                        <a href="{{ route('admin.product.edit', $product) }}"
                                        class="inline-flex justify-center items-center p-1.5 rounded-lg bg-gray-50 text-gray-400 hover:bg-[#8b9b7e] hover:text-white transition-all duration-200" title="Edit">
                                            <svg class="h-4 w-4" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" d="M16.862 4.487l1.687-1.688a1.875 1.875 0 112.652 2.652L10.582 16.07a4.5 4.5 0 01-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 011.13-1.897l8.932-8.931zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0115.75 21H5.25A2.25 2.25 0 013 18.75V8.25A2.25 2.25 0 015.25 6H10" />
                                            </svg>
                                        </a>

                                        <button type="button"
                                                @click="$dispatch('confirm-delete', {
                                                    title: 'Delete Product?',
                                                    message: 'Are you sure you want to delete \'{{ addslashes($product->nama_product) }}\'? This will permanently remove it.',
                                                    formId: 'delete-form-{{ $product->id }}'
                                                })"
                                                class="inline-flex justify-center items-center p-1.5 rounded-lg bg-gray-50 text-gray-400 hover:bg-red-500 hover:text-white transition-all duration-200" title="Delete">
                                            <svg class="h-4 w-4" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" d="M14.74 9l-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 01-2.244 2.077H8.084a2.25 2.25 0 01-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 00-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 013.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 00-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 00-7.5 0" />
                                            </svg>
                                        </button>

                                        <form action="{{ route('admin.product.destroy', $product) }}"
                                            method="POST"
                                            id="delete-form-{{ $product->id }}"
                                            class="hidden">
                                            @csrf
                                            @method('DELETE')
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
        @endforeach
    </div>

    <div class="mt-8">
        {{ $products->links() }}
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
                                <h3 class="text-lg font-bold leading-6 text-gray-900" x-text="'Product Details #' + selectedItem.id"></h3>
                                <button @click="showViewModal = false" class="text-gray-400 hover:text-gray-500 transition-colors">
                                    <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                                    </svg>
                                </button>
                            </div>
                            <div class="space-y-4 text-left">
                                     <div>
                                         <label class="block text-xs font-bold text-gray-400 uppercase tracking-wider">Series</label>
                                         <p class="mt-1 text-sm text-gray-900 font-medium" x-text="selectedItem.series"></p>
                                     </div>
                                     <div>
                                         <label class="block text-xs font-bold text-gray-400 uppercase tracking-wider">Nama Product</label>
                                         <p class="mt-1 text-sm text-gray-900 font-medium" x-text="selectedItem.name"></p>
                                     </div>
                                     <div class="grid grid-cols-2 gap-4">
                                         <div>
                                             <label class="block text-xs font-bold text-gray-400 uppercase tracking-wider">Thumbnail</label>
                                             <div class="mt-2 rounded-lg overflow-hidden border border-gray-100 bg-gray-50 aspect-square flex items-center justify-center">
                                                 <template x-if="selectedItem.thumbnail">
                                                     <img :src="selectedItem.thumbnail" 
                                                          @click="$dispatch('open-lightbox', { url: selectedItem.thumbnail })"
                                                          class="w-full h-full object-cover cursor-zoom-in hover:opacity-90 transition-opacity">
                                                 </template>
                                                 <template x-if="!selectedItem.thumbnail">
                                                     <div class="text-gray-400 text-xs">No Image</div>
                                                 </template>
                                             </div>
                                         </div>
                                         <div>
                                             <label class="block text-xs font-bold text-gray-400 uppercase tracking-wider">Big Picture</label>
                                             <div class="mt-2 rounded-lg overflow-hidden border border-gray-100 bg-gray-50 aspect-square flex items-center justify-center">
                                                 <div x-data="{ currentIndex: 0 }" class="relative w-full h-full flex items-center justify-center">
                                                     <template x-if="selectedItem.big_pic && selectedItem.big_pic.length > 0">
                                                         <div class="relative w-full h-full">
                                                             <img :src="selectedItem.big_pic[currentIndex]" 
                                                                  @click="$dispatch('open-lightbox', { url: selectedItem.big_pic[currentIndex] })"
                                                                  class="w-full h-full object-cover cursor-zoom-in hover:opacity-90 transition-opacity">
                                                             <template x-if="selectedItem.big_pic.length > 1">
                                                                 <div>
                                                                     <button @click="currentIndex = (currentIndex > 0) ? currentIndex - 1 : selectedItem.big_pic.length - 1" class="absolute left-2 top-1/2 -translate-y-1/2 bg-black/50 text-white rounded-full p-1.5 hover:bg-black/75 transition-colors">
                                                                         <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"/></svg>
                                                                     </button>
                                                                     <button @click="currentIndex = (currentIndex < selectedItem.big_pic.length - 1) ? currentIndex + 1 : 0" class="absolute right-2 top-1/2 -translate-y-1/2 bg-black/50 text-white rounded-full p-1.5 hover:bg-black/75 transition-colors">
                                                                         <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/></svg>
                                                                     </button>
                                                                     <div class="absolute bottom-3 left-1/2 -translate-x-1/2 flex gap-1.5">
                                                                         <template x-for="(pic, index) in selectedItem.big_pic" :key="index">
                                                                             <div class="w-2 h-2 rounded-full cursor-pointer transition-colors" :class="currentIndex === index ? 'bg-white' : 'bg-white/50'" @click="currentIndex = index"></div>
                                                                         </template>
                                                                     </div>
                                                                 </div>
                                                             </template>
                                                         </div>
                                                     </template>
                                                     <template x-if="!selectedItem.big_pic || selectedItem.big_pic.length === 0">
                                                         <div class="text-gray-400 text-xs">No Image</div>
                                                     </template>
                                                 </div>
                                             </div>
                                         </div>
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
