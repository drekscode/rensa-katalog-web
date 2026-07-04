@extends('layouts.admin')

@section('title', 'Request Survey')
@section('page-title', 'Request Survey')

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
             <h2 class="text-lg font-semibold text-gray-900">Request Survey</h2>
             <p class="text-sm text-gray-500">Manage client survey requests and update execution progress.</p>
        </div>
        <div class="flex flex-col sm:flex-row gap-3">
             <form action="{{ route('admin.survey-request.index') }}" method="GET" class="flex flex-col sm:flex-row gap-3">
                <div class="relative">
                    <div class="pointer-events-none absolute inset-y-0 left-0 flex items-center pl-3">
                        <svg class="h-4 w-4 text-gray-400" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M21 21l-5.197-5.197m0 0A7.5 7.5 0 105.196 5.196a7.5 7.5 0 0010.607 10.607z" />
                        </svg>
                    </div>
                    <input type="text"
                           name="search"
                           value="{{ request('search') }}"
                           class="block w-full sm:w-64 rounded-xl border-0 py-2.5 pl-10 pr-3 text-gray-900 ring-1 ring-inset ring-gray-200 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-[#8b9b7e] sm:text-sm sm:leading-6 transition-all"
                           placeholder="Search requests...">
                </div>
                <select name="status" onchange="this.form.submit()"
                        class="block w-full sm:w-48 rounded-xl border-0 py-2.5 px-3 text-gray-900 ring-1 ring-inset ring-gray-200 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-[#8b9b7e] sm:text-sm sm:leading-6 transition-all">
                    <option value="">All Statuses</option>
                    @foreach(['pending' => 'Pending', 'scheduled' => 'Scheduled', 'completed' => 'Completed', 'cancelled' => 'Cancelled'] as $value => $label)
                        <option value="{{ $value }}" {{ request('status') == $value ? 'selected' : '' }}>{{ $label }}</option>
                    @endforeach
                </select>
            </form>
        </div>
    </div>

    @if($surveyRequests->isEmpty())
    <!-- Empty State -->
    <div class="relative block w-full rounded-2xl border-2 border-dashed border-gray-300 p-12 text-center hover:border-[#8b9b7e] focus:outline-none focus:ring-2 focus:ring-[#8b9b7e] focus:ring-offset-2 transition-all duration-300 group bg-white/50 max-w-3xl mx-auto">
        <div class="mx-auto flex h-20 w-20 items-center justify-center rounded-full bg-gray-50 group-hover:bg-[#8b9b7e]/10 transition-colors duration-300">
            <svg class="h-10 w-10 text-gray-400 group-hover:text-[#8b9b7e] transition-colors duration-300" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
            </svg>
        </div>
        <h3 class="mt-4 text-lg font-semibold text-gray-900">No Requests Found</h3>
        <p class="mt-2 text-sm text-gray-500 max-w-sm mx-auto">Client survey requests will appear here when submitted from the app.</p>
    </div>

    @else

    <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-5 gap-6 auto-rows-fr">
        @foreach($surveyRequests as $request)
        @php
            $firstImage = $request->images->first();
            $imageUrl = $firstImage ? (str_starts_with($firstImage->foto, 'http') || str_starts_with($firstImage->foto, 'data:') ? $firstImage->foto : asset('storage/' . $firstImage->foto)) : '';
            $imagesArray = $request->images->map(fn($img) => str_starts_with($img->foto, 'http') || str_starts_with($img->foto, 'data:') ? $img->foto : asset('storage/' . $img->foto))->toArray();

            $badgeColor = match($request->status) {
                'pending' => 'bg-yellow-50 text-yellow-700 ring-1 ring-inset ring-yellow-600/10',
                'scheduled' => 'bg-blue-50 text-blue-700 ring-1 ring-inset ring-blue-600/10',
                'completed' => 'bg-green-50 text-green-700 ring-1 ring-inset ring-green-600/10',
                'cancelled' => 'bg-red-50 text-red-700 ring-1 ring-inset ring-red-600/10',
            };
        @endphp
        <!-- Content Card -->
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
        })" class="flex flex-col h-full overflow-hidden bg-white shadow-lg shadow-gray-200/50 ring-1 ring-gray-200 rounded-2xl transition-all hover:shadow-xl hover:shadow-gray-200/60 hover:-translate-y-1 group cursor-pointer">
            <!-- Media -->
            <div class="aspect-square bg-gray-100 relative overflow-hidden group-hover:opacity-90 transition-opacity">
                @if($imageUrl)
                    <img src="{{ $imageUrl }}" class="w-full h-full object-cover">
                @else
                    <div class="w-full h-full flex flex-col items-center justify-center bg-gray-50 border-b border-gray-100 text-gray-400">
                        <svg class="h-8 w-8 text-gray-300 mb-1" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M2.25 15.75l5.159-5.159a2.25 2.25 0 013.182 0l5.159 5.159m-1.5-1.5l1.409-1.409a2.25 2.25 0 013.182 0l2.909 2.909m-18 3.75h16.5a1.5 1.5 0 001.5-1.5V6a1.5 1.5 0 00-1.5-1.5H3.75A1.5 1.5 0 002.25 6v12a1.5 1.5 0 001.5 1.5zm10.5-11.25h.008v.008h-.008V8.25zm.375 0a.375.375 0 11-.75 0 .375.375 0 01.75 0z" />
                        </svg>
                        <span class="text-xs text-gray-400 italic">No Image</span>
                    </div>
                @endif
                <div class="absolute top-2 left-2">
                    <span class="inline-flex items-center rounded-lg backdrop-blur-sm px-2 py-1 text-xs font-semibold shadow-sm {{ $badgeColor }}">
                        {{ ucfirst($request->status) }}
                    </span>
                </div>
            </div>

            <!-- Body -->
            <div class="flex-1 px-5 py-5 flex flex-col justify-between">
                <div>
                     <h3 class="text-lg font-bold text-gray-900 leading-snug mb-3 group-hover:text-[#8b9b7e] transition-colors line-clamp-2">
                         {{ $request->nama }}
                     </h3>

                     <div class="space-y-2 mb-2">
                         <div class="flex items-center gap-2">
                             <span class="text-xs font-bold text-gray-400 uppercase tracking-wider min-w-[50px]">Kontak</span>
                             <span class="text-xs text-gray-700 font-medium truncate">{{ $request->kontak }}</span>
                         </div>
                         <div class="flex items-start gap-2">
                             <span class="text-xs font-bold text-gray-400 uppercase tracking-wider min-w-[50px]">Alamat</span>
                             <span class="text-xs text-gray-600 line-clamp-2 leading-relaxed">{{ $request->alamat }}</span>
                         </div>
                     </div>
                </div>
            </div>

            <!-- Actions -->
            <div class="bg-gray-50 px-5 py-3 flex items-center justify-end gap-2 border-t border-gray-100 mt-auto" @click.stop>
                <a href="{{ route('admin.survey-request.show', $request->id) }}"
                   class="inline-flex justify-center items-center p-2 rounded-lg bg-white text-gray-400 shadow-sm ring-1 ring-inset ring-gray-200 hover:bg-gray-50 hover:text-[#8b9b7e] hover:ring-[#8b9b7e]/30 transition-all duration-200" title="View Details">
                    <svg class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M2.036 12.322a1.012 1.012 0 010-.639C3.423 7.51 7.36 4.5 12 4.5c4.638 0 8.573 3.007 9.963 7.178.07.207.07.431 0 .639C20.577 16.49 16.64 19.5 12 19.5c-4.638 0-8.573-3.007-9.963-7.178z" />
                        <path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                    </svg>
                </a>

                <button type="button"
                        @click="$dispatch('confirm-delete', {
                            title: 'Hapus Request Survey?',
                            message: 'Apakah Anda yakin ingin menghapus request survey ini? Data akan dihapus secara permanen.',
                            formId: 'delete-form-{{ $request->id }}'
                        })"
                        class="inline-flex justify-center items-center p-2 rounded-lg bg-white text-gray-400 shadow-sm ring-1 ring-inset ring-gray-200 hover:bg-red-50 hover:text-red-500 hover:ring-red-200 transition-all duration-200" title="Delete">
                    <svg class="h-4 w-4" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
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
        @endforeach
    </div>

    <div class="mt-8">
        {{ $surveyRequests->links() }}
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
                     class="relative transform overflow-hidden rounded-2xl bg-white text-left shadow-2xl transition-all sm:my-8 sm:w-full sm:max-w-2xl">

                    <div class="bg-white px-4 pb-4 pt-5 sm:p-6 sm:pb-4">
                        <div class="w-full text-left">
                            <div class="flex items-center justify-between border-b border-gray-100 pb-3 mb-4">
                                <h3 class="text-lg font-bold leading-6 text-gray-900" x-text="'Detail Survey #' + selectedItem.id"></h3>
                                <button @click="showViewModal = false" class="text-gray-400 hover:text-gray-500 transition-colors">
                                    <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                                    </svg>
                                </button>
                            </div>
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                                <div class="space-y-4">
                                    <div>
                                        <label class="block text-xs font-bold text-gray-400 uppercase tracking-wider">Nama</label>
                                        <p class="mt-1 text-sm text-gray-900 font-medium" x-text="selectedItem.name"></p>
                                    </div>
                                    <div>
                                        <label class="block text-xs font-bold text-gray-400 uppercase tracking-wider">Kontak</label>
                                        <p class="mt-1 text-sm text-gray-900 font-medium" x-text="selectedItem.kontak"></p>
                                    </div>
                                    <div>
                                        <label class="block text-xs font-bold text-gray-400 uppercase tracking-wider">Alamat Survey</label>
                                        <p class="mt-1 text-sm text-gray-650 font-medium" x-text="selectedItem.alamat"></p>
                                    </div>
                                    <div>
                                        <label class="block text-xs font-bold text-gray-400 uppercase tracking-wider">Ruangan yang akan disurvey</label>
                                        <div class="mt-2 text-sm text-gray-600 bg-gray-50 p-4 rounded-xl border border-gray-100 whitespace-pre-wrap leading-relaxed" x-text="selectedItem.ruangan"></div>
                                    </div>
                                </div>
                                <div x-show="selectedItem.images && selectedItem.images.length > 0">
                                    <label class="block text-xs font-bold text-gray-400 uppercase tracking-wider mb-2">Gambar Pendukung</label>
                                    <div class="grid grid-cols-2 gap-3">
                                        <template x-for="(imgUrl, index) in selectedItem.images" :key="index">
                                            <div class="rounded-xl overflow-hidden border border-gray-100 bg-gray-50 aspect-square flex items-center justify-center">
                                                <img :src="imgUrl"
                                                     @click="$dispatch('open-lightbox', { url: imgUrl })"
                                                     class="w-full h-full object-cover cursor-zoom-in hover:opacity-90 transition-opacity">
                                            </div>
                                        </template>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="bg-gray-50/50 px-4 py-4 sm:flex sm:flex-row-reverse sm:px-6 border-t border-gray-100 gap-2">
                        <a :href="'/admin/survey-request/' + selectedItem.id"
                           class="inline-flex w-full justify-center rounded-lg bg-[#8b9b7e] px-4 py-2.5 text-sm font-semibold text-white shadow-sm hover:bg-[#7a8a6f] sm:ml-3 sm:w-auto transition-all transform active:scale-95">
                            View Details
                        </a>
                        <button type="button"
                                class="mt-3 inline-flex w-full justify-center rounded-lg bg-white px-4 py-2.5 text-sm font-semibold text-gray-700 shadow-sm ring-1 ring-inset ring-gray-300 hover:bg-gray-50 sm:mt-0 sm:w-auto transition-all"
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
