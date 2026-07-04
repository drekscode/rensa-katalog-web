@extends('layouts.admin')

@section('title', 'Survey Requests')
@section('page-title', 'Survey Requests')

@section('content')
<div x-data="{
    showViewModal: false,
    selectedItem: {},
    search: '{{ request('search') }}',
    openViewModal(item) {
        this.selectedItem = item;
        this.showViewModal = true;
    }
}" class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8 py-8">

    <!-- Header Section -->
    <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-6 mb-12">
        <div class="space-y-1">
             <span class="inline-flex items-center rounded-full bg-[#8b9b7e]/10 px-2.5 py-0.5 text-[10px] font-bold uppercase tracking-[0.2em] text-[#8b9b7e]">
                 Overview
             </span>
             <h2 class="text-3xl font-extrabold tracking-tight text-gray-900">Survey Requests</h2>
             <p class="text-sm text-gray-500">Manage client survey requests and update execution progress.</p>
        </div>
        <div class="flex flex-col sm:flex-row gap-4 items-stretch sm:items-center">
             <!-- Search form wrapped in Double-Bezel -->
             <div class="p-1 bg-gray-100/80 border border-gray-200/50 rounded-2xl shadow-sm">
                 <form action="{{ route('admin.survey-request.index') }}" method="GET" class="relative flex items-center">
                    <div class="pointer-events-none absolute inset-y-0 left-0 flex items-center pl-3.5">
                        <svg class="h-4 w-4 text-gray-400" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M21 21l-5.197-5.197m0 0A7.5 7.5 0 105.196 5.196a7.5 7.5 0 0010.607 10.607z" />
                        </svg>
                    </div>
                    <input type="text"
                           name="search"
                           value="{{ request('search') }}"
                           class="block w-full sm:w-64 rounded-xl border-0 py-2 pl-10 pr-3 text-gray-900 bg-white placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-[#8b9b7e] text-sm leading-6 transition-all duration-300"
                           placeholder="Search requests...">
                </form>
             </div>

             <!-- Status Filter wrapped in Double-Bezel -->
             <div class="p-1 bg-gray-100/80 border border-gray-200/50 rounded-2xl shadow-sm">
                <form action="{{ route('admin.survey-request.index') }}" method="GET">
                    @if(request('search'))
                        <input type="hidden" name="search" value="{{ request('search') }}">
                    @endif
                    <select name="status" onchange="this.form.submit()"
                            class="block w-full rounded-xl border-0 py-2 px-3 text-gray-900 bg-white focus:ring-2 focus:ring-inset focus:ring-[#8b9b7e] text-sm leading-6 transition-all duration-300">
                        <option value="">All Statuses</option>
                        @foreach(['pending' => 'Pending', 'scheduled' => 'Scheduled', 'completed' => 'Completed', 'cancelled' => 'Cancelled'] as $value => $label)
                            <option value="{{ $value }}" {{ request('status') == $value ? 'selected' : '' }}>{{ $label }}</option>
                        @endforeach
                    </select>
                </form>
             </div>
        </div>
    </div>

    @if($surveyRequests->isEmpty())
    <!-- Empty State -->
    <div class="relative block w-full rounded-3xl border-2 border-dashed border-gray-300/80 p-16 text-center hover:border-[#8b9b7e] focus:outline-none transition-all duration-500 group bg-white/40 max-w-3xl mx-auto shadow-sm">
        <div class="mx-auto flex h-20 w-20 items-center justify-center rounded-2xl bg-gray-50 group-hover:bg-[#8b9b7e]/10 transition-colors duration-500">
            <svg class="h-10 w-10 text-gray-400 group-hover:text-[#8b9b7e] transition-colors duration-500" fill="none" viewBox="0 0 24 24" stroke-width="1.25" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
            </svg>
        </div>
        <h3 class="mt-6 text-lg font-bold text-gray-900">No Requests Found</h3>
        <p class="mt-2 text-sm text-gray-500 max-w-sm mx-auto">Client survey requests will appear here when submitted from the app.</p>
    </div>

    @else

    <!-- Card Grid -->
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 xl:grid-cols-5 gap-8">
        @foreach($surveyRequests as $request)
        @php
            $firstImage = $request->images->first();
            $imageUrl = $firstImage ? (str_starts_with($firstImage->foto, 'http') || str_starts_with($firstImage->foto, 'data:') ? $firstImage->foto : asset('storage/' . $firstImage->foto)) : '';
            $imagesArray = $request->images->map(fn($img) => str_starts_with($img->foto, 'http') || str_starts_with($img->foto, 'data:') ? $img->foto : asset('storage/' . $img->foto))->toArray();
        @endphp

        <!-- Double-Bezel Card Outer Shell -->
        <div class="p-2 rounded-[28px] bg-gray-100/70 border border-gray-200/50 shadow-sm shadow-gray-100/30 group hover:border-[#8b9b7e]/30 hover:bg-gray-100 transition-all duration-700 ease-[cubic-bezier(0.32,0.72,0,1)] hover:-translate-y-1">
            <!-- Double-Bezel Card Inner Core -->
            <div @click="openViewModal({
                'id': '{{ $request->id }}',
                'name': '{{ addslashes($request->nama) }}',
                'kontak': '{{ $request->kontak }}',
                'alamat': '{{ addslashes($request->alamat) }}',
                'ruangan': '{{ addslashes($request->ruangan) }}',
                'status': '{{ $request->status }}',
                'dp_survey': 'Rp {{ number_format($request->dp_survey, 0, ",", ".") }}',
                'date': '{{ $request->created_at->format("d M Y H:i") }}',
                'image': '{{ $imageUrl }}',
                'images': {{ json_encode($imagesArray) }}
            })" class="flex flex-col h-full overflow-hidden bg-white rounded-[20px] border border-gray-100 shadow-[inset_0_1px_1px_rgba(255,255,255,0.8)] cursor-pointer">

                <!-- Media/Thumbnail Header -->
                <div class="aspect-video w-full bg-gray-50 overflow-hidden relative border-b border-gray-100">
                    @if($imageUrl)
                        <img src="{{ $imageUrl }}" class="w-full h-full object-cover transition-transform duration-700 ease-[cubic-bezier(0.32,0.72,0,1)] group-hover:scale-105">
                    @else
                        <div class="absolute inset-0 flex flex-col items-center justify-center bg-gray-50/50 text-gray-400 group-hover:text-[#8b9b7e] transition-colors duration-500">
                            <svg class="h-8 w-8 text-gray-300 mb-1" fill="none" viewBox="0 0 24 24" stroke-width="1.25" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M2.25 15.75l5.159-5.159a2.25 2.25 0 013.182 0l5.159 5.159m-1.5-1.5l1.409-1.409a2.25 2.25 0 013.182 0l2.909 2.909m-18 3.75h16.5a1.5 1.5 0 001.5-1.5V6a1.5 1.5 0 00-1.5-1.5H3.75A1.5 1.5 0 002.25 6v12a1.5 1.5 0 001.5 1.5zm10.5-11.25h.008v.008h-.008V8.25zm.375 0a.375.375 0 11-.75 0 .375.375 0 01.75 0z" />
                            </svg>
                            <span class="text-[9px] uppercase tracking-[0.2em] font-bold text-gray-400">No Photo</span>
                        </div>
                    @endif

                    <!-- Floating Badge -->
                    <div class="absolute top-3 right-3">
                        @php
                            $badgeColor = match($request->status) {
                                'pending' => 'bg-yellow-50/90 text-yellow-800 border border-yellow-200/50',
                                'scheduled' => 'bg-blue-50/90 text-blue-800 border border-blue-200/50',
                                'completed' => 'bg-green-50/90 text-green-800 border border-green-200/50',
                                'cancelled' => 'bg-red-50/90 text-red-800 border border-red-200/50',
                            };
                        @endphp
                        <span class="inline-flex items-center rounded-lg backdrop-blur-md px-2 py-0.5 text-[9px] font-bold uppercase tracking-[0.15em] shadow-sm {{ $badgeColor }}">
                            {{ $request->status }}
                        </span>
                    </div>
                </div>

                <!-- Card Body -->
                <div class="flex-1 px-5 py-5 flex flex-col justify-between">
                    <div>
                        <h3 class="text-base font-bold text-gray-900 leading-snug mb-3 group-hover:text-[#8b9b7e] transition-colors duration-300 line-clamp-2">
                            {{ $request->nama }}
                        </h3>

                        <div class="space-y-2.5 mb-4">
                            <div class="flex items-start gap-2.5 text-xs text-gray-500">
                                <svg class="h-4 w-4 text-gray-400 mt-0.5 flex-shrink-0" fill="none" viewBox="0 0 24 24" stroke-width="1.25" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M15 10.5a3 3 0 11-6 0 3 3 0 016 0z" />
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 10.5c0 7.142-7.5 11.25-7.5 11.25S4.5 17.642 4.5 10.5a7.5 7.5 0 1115 0z" />
                                </svg>
                                <p class="line-clamp-2 leading-relaxed">{{ $request->alamat }}</p>
                            </div>
                            <div class="flex items-center gap-2.5 text-xs text-gray-500">
                                <svg class="h-4 w-4 text-gray-400 flex-shrink-0" fill="none" viewBox="0 0 24 24" stroke-width="1.25" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M2.25 6.75c0 8.284 6.716 15 15 15h2.25a2.25 2.25 0 002.25-2.25v-1.372c0-.516-.351-.966-.852-1.091l-4.423-1.106c-.44-.11-.902.055-1.173.417l-.97 1.293c-.282.376-.769.542-1.21.38a12.035 12.035 0 01-7.143-7.143c-.162-.441.004-.928.38-1.21l1.293-.97c.363-.271.527-.734.417-1.173L6.963 3.102a1.125 1.125 0 00-1.091-.852H4.5A2.25 2.25 0 002.25 4.5v2.25z" />
                                </svg>
                                <p class="truncate">{{ $request->kontak }}</p>
                            </div>
                        </div>
                    </div>

                    <!-- Card Footer Details -->
                    <div class="mt-auto pt-3 border-t border-gray-100 flex items-center justify-between gap-2 text-[10px] text-gray-400 font-bold uppercase tracking-wider">
                        <span>DP: Rp {{ number_format($request->dp_survey, 0, ',', '.') }}</span>
                        <span>{{ $request->created_at->format('d M Y') }}</span>
                    </div>
                </div>

                <!-- Card Hover Action Overlay -->
                <div class="bg-gray-50 px-5 py-3.5 flex items-center justify-end gap-2 border-t border-gray-100 mt-auto" @click.stop>
                    <a href="{{ route('admin.survey-request.show', $request->id) }}"
                       class="inline-flex justify-center items-center p-2 rounded-xl bg-white text-gray-400 shadow-sm ring-1 ring-inset ring-gray-200/80 hover:bg-[#8b9b7e]/10 hover:text-[#8b9b7e] hover:ring-[#8b9b7e]/30 transition-all duration-300 group/btn" title="View Details">
                        <svg class="h-4 w-4 transform group-hover/btn:scale-110 transition-transform" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M2.036 12.322a1.012 1.012 0 010-.639C3.423 7.51 7.36 4.5 12 4.5c4.638 0 8.573 3.007 9.963 7.178.07.207.07.431 0 .639C20.577 16.49 16.64 19.5 12 19.5c-4.638 0-8.573-3.007-9.963-7.178z" />
                            <path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                        </svg>
                    </a>

                    <button type="button"
                            @click="$dispatch('confirm-delete', {
                                title: 'Delete Survey Request?',
                                message: 'Are you sure you want to delete \'{{ addslashes($request->nama) }}\'\'s survey request? This will permanently remove it.',
                                formId: 'delete-form-{{ $request->id }}'
                            })"
                            class="inline-flex justify-center items-center p-2 rounded-xl bg-white text-gray-400 shadow-sm ring-1 ring-inset ring-gray-200/80 hover:bg-red-50 hover:text-red-500 hover:ring-red-200 transition-all duration-300 group/btn" title="Delete">
                        <svg class="h-4 w-4 transform group-hover/btn:scale-110 transition-transform" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                          <path stroke-linecap="round" stroke-linejoin="round" d="M14.74 9l-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 01-2.244 2.077H8.084a2.25 2.25 0 01-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 00-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 013.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 00-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 00-7.5 0" />
                        </svg>
                    </button>

                    <form action="{{ route('admin.survey-request.destroy', $request->id) }}"
                          method="POST"
                          id="delete-form-{{ $request->id }}"
                          class="hidden">
                        @csrf
                        @method('DELETE')
                    </form>
                </div>
            </div>
        </div>
        @endforeach
    </div>

    <!-- Pagination Wrapper in Double-Bezel -->
    <div class="mt-12 p-1.5 bg-white border border-gray-200/50 rounded-2xl shadow-sm max-w-max mx-auto">
        {{ $surveyRequests->links() }}
    </div>

    @endif

    <!-- View Modal (Alpine Quick View) -->
    <template x-teleport="body">
        <div x-show="showViewModal"
             class="fixed inset-0 z-[100] overflow-y-auto"
             style="display: none;">
            <div class="flex min-h-full items-end justify-center p-4 text-center sm:items-center sm:p-0">
                <!-- Overlay with backdrop blur -->
                <div x-show="showViewModal"
                     x-transition:enter="transition ease-out duration-500"
                     x-transition:enter-start="opacity-0"
                     x-transition:enter-end="opacity-100"
                     x-transition:leave="transition ease-in duration-300"
                     x-transition:leave-start="opacity-100"
                     x-transition:leave-end="opacity-0"
                     class="fixed inset-0 bg-gray-900/60 backdrop-blur-md transition-opacity"
                     @click="showViewModal = false"></div>

                <!-- Modal Window in Double-Bezel Architecture -->
                <div x-show="showViewModal"
                     x-transition:enter="transition ease-out duration-700 cubic-bezier(0.32,0.72,0,1)"
                     x-transition:enter-start="opacity-0 translate-y-8 sm:translate-y-0 sm:scale-95"
                     x-transition:enter-end="opacity-100 translate-y-0 sm:scale-100"
                     x-transition:leave="transition ease-in duration-450"
                     x-transition:leave-start="opacity-100 translate-y-0 sm:scale-100"
                     x-transition:leave-end="opacity-0 translate-y-8 sm:translate-y-0 sm:scale-95"
                     class="relative transform overflow-hidden rounded-[32px] bg-gray-100 p-2 text-left shadow-2xl transition-all sm:my-8 sm:w-full sm:max-w-2xl border border-gray-200/60">

                    <!-- Inner Core -->
                    <div class="bg-white rounded-[24px] px-6 pb-6 pt-7 border border-gray-100 shadow-[inset_0_1px_1px_rgba(255,255,255,0.8)]">
                        <div class="w-full text-left">
                            <div class="flex items-center justify-between border-b border-gray-100 pb-4 mb-6">
                                <div class="space-y-0.5">
                                    <span class="text-[9px] uppercase tracking-[0.2em] font-bold text-gray-400" x-text="'Survey Details #' + selectedItem.id"></span>
                                    <h3 class="text-xl font-extrabold text-gray-950" x-text="selectedItem.name"></h3>
                                </div>
                                <button @click="showViewModal = false" class="text-gray-400 hover:text-gray-600 transition-colors p-1.5 hover:bg-gray-50 rounded-xl">
                                    <svg class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                                    </svg>
                                </button>
                            </div>
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                                <div class="space-y-5">
                                    <div>
                                        <span class="text-[10px] text-gray-400 font-bold uppercase tracking-wider block">Client Name</span>
                                        <p class="mt-1 text-sm text-gray-900 font-semibold" x-text="selectedItem.name"></p>
                                    </div>
                                    <div>
                                        <span class="text-[10px] text-gray-400 font-bold uppercase tracking-wider block">Contact Number</span>
                                        <p class="mt-1 text-sm text-gray-900 font-semibold" x-text="selectedItem.kontak"></p>
                                    </div>
                                    <div>
                                        <span class="text-[10px] text-gray-400 font-bold uppercase tracking-wider block">Address</span>
                                        <p class="mt-1 text-sm text-gray-600 leading-relaxed font-medium" x-text="selectedItem.alamat"></p>
                                    </div>
                                    <div>
                                        <span class="text-[10px] text-gray-400 font-bold uppercase tracking-wider block">Room Description</span>
                                        <div class="mt-2 text-xs text-gray-600 bg-gray-50 p-4 rounded-xl border border-gray-100 whitespace-pre-wrap leading-relaxed max-h-[140px] overflow-y-auto" x-text="selectedItem.ruangan"></div>
                                    </div>
                                </div>
                                <div>
                                    <span class="text-[10px] text-gray-400 font-bold uppercase tracking-wider block mb-3">Supporting Images</span>
                                    <div class="grid grid-cols-2 gap-3" x-show="selectedItem.images && selectedItem.images.length > 0">
                                        <template x-for="(imgUrl, index) in selectedItem.images" :key="index">
                                            <!-- Double-Bezel Image Shell -->
                                            <div class="p-1 rounded-2xl bg-gray-100 border border-gray-200/50 shadow-sm hover:border-[#8b9b7e]/30 transition-all duration-300">
                                                <div class="rounded-xl overflow-hidden bg-white aspect-square flex items-center justify-center">
                                                    <img :src="imgUrl"
                                                         @click="$dispatch('open-lightbox', { url: imgUrl })"
                                                         class="w-full h-full object-cover cursor-zoom-in hover:opacity-90 transition-opacity duration-300">
                                                </div>
                                            </div>
                                        </template>
                                    </div>
                                    <div class="flex flex-col items-center justify-center p-8 bg-gray-50/50 border border-dashed border-gray-200 rounded-2xl text-gray-400" x-show="!selectedItem.images || selectedItem.images.length === 0">
                                        <svg class="h-8 w-8 text-gray-300 mb-1" fill="none" viewBox="0 0 24 24" stroke-width="1.25" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M2.25 15.75l5.159-5.159a2.25 2.25 0 013.182 0l5.159 5.159m-1.5-1.5l1.409-1.409a2.25 2.25 0 013.182 0l2.909 2.909m-18 3.75h16.5a1.5 1.5 0 001.5-1.5V6a1.5 1.5 0 00-1.5-1.5H3.75A1.5 1.5 0 002.25 6v12a1.5 1.5 0 001.5 1.5zm10.5-11.25h.008v.008h-.008V8.25zm.375 0a.375.375 0 11-.75 0 .375.375 0 01.75 0z" />
                                        </svg>
                                        <span class="text-[9px] uppercase tracking-[0.2em] font-bold">No Images</span>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Footer Actions -->
                        <div class="mt-8 pt-5 border-t border-gray-100 flex flex-col sm:flex-row-reverse gap-3">
                            <a :href="'/admin/survey-request/' + selectedItem.id"
                               class="inline-flex justify-center items-center rounded-xl bg-[#8b9b7e] px-5 py-3 text-sm font-bold text-white shadow-sm hover:bg-[#7a8a6f] sm:w-auto transition-all transform active:scale-95">
                                Manage Request
                            </a>
                            <button type="button"
                                    class="inline-flex justify-center rounded-xl bg-white px-5 py-3 text-sm font-bold text-gray-700 shadow-sm ring-1 ring-inset ring-gray-300 hover:bg-gray-50 sm:w-auto transition-all"
                                    @click="showViewModal = false">
                                Close
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </template>
</div>
@endsection
