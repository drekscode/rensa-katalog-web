@extends('layouts.admin')

@section('title', 'Detail Request Survey')
@section('page-title', 'Detail Request Survey')

@section('content')
<div class="mx-auto max-w-6xl space-y-6">
    <!-- Header with Quick Action Controls -->
    <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4 bg-white p-6 rounded-xl border border-gray-200 shadow-sm">
        <div class="flex items-center gap-4">
            <a href="{{ route('admin.survey-request.index') }}"
               class="inline-flex items-center justify-center w-10 h-10 rounded-lg bg-gray-50 border border-gray-200 text-gray-500 hover:text-gray-900 hover:bg-gray-100 transition-all">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M15 19l-7-7 7-7" />
                </svg>
            </a>
            <div>
                <div class="flex items-center gap-2">
                    <span class="text-xs text-gray-500 font-semibold">Request Survey #{{ $surveyRequest->id }}</span>
                </div>
                <h2 class="text-xl font-bold text-gray-900 mt-1 leading-tight">{{ $surveyRequest->nama }}</h2>
            </div>
        </div>
        <div class="flex gap-3">
            @php
                $badgeColor = match($surveyRequest->status) {
                    'pending' => 'bg-yellow-50 text-yellow-700 ring-1 ring-inset ring-yellow-600/10',
                    'scheduled' => 'bg-blue-50 text-blue-700 ring-1 ring-inset ring-blue-600/10',
                    'completed' => 'bg-green-50 text-green-700 ring-1 ring-inset ring-green-600/10',
                    'cancelled' => 'bg-red-50 text-red-700 ring-1 ring-inset ring-red-600/10',
                };
            @endphp
            <span class="inline-flex items-center rounded-lg px-3 py-2 text-sm font-semibold {{ $badgeColor }}">
                Status: {{ ucfirst($surveyRequest->status) }}
            </span>
        </div>
    </div>

    @if(session('success'))
        <div class="p-4 bg-green-50 border border-green-200 text-green-700 rounded-xl text-sm font-semibold">
            {{ session('success') }}
        </div>
    @endif

    <!-- Main Content Layout (3 Columns Grid) -->
    <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">

        <!-- Left Column: Specs Details -->
        <div class="space-y-6">
            @php
                $totalPhotos = $surveyRequest->images->count();
            @endphp
            <!-- Details Sheet -->
            <div class="bg-white border border-gray-200 rounded-xl shadow-sm p-6 space-y-5">
                <h3 class="text-xs font-bold text-gray-400 uppercase tracking-wider border-b border-gray-100 pb-3 flex items-center gap-2">
                    <svg class="w-4 h-4 text-gray-500" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10" />
                    </svg>
                    Informasi Survey
                </h3>

                <div class="space-y-4 text-sm">
                    <!-- Client Name -->
                    <div class="flex items-start gap-3">
                        <div class="w-8 h-8 rounded bg-gray-50 text-gray-500 flex items-center justify-center flex-shrink-0">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                            </svg>
                        </div>
                        <div>
                            <span class="text-[10px] text-gray-400 font-bold uppercase tracking-wider block">Nama</span>
                            <span class="text-sm font-bold text-gray-800">{{ $surveyRequest->nama }}</span>
                        </div>
                    </div>

                    <!-- Contact Number -->
                    <div class="flex items-center gap-3">
                        <div class="w-8 h-8 rounded bg-gray-50 text-gray-550 flex items-center justify-center flex-shrink-0">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.94.725l.548 2.2a1 1 0 01-.321.988l-1.305.98a10.582 10.582 0 004.872 4.872l.98-1.305a1 1 0 01.988-.321l2.2.548a1 1 0 01.725.94V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z" />
                            </svg>
                        </div>
                        <div>
                            <span class="text-[10px] text-gray-400 font-bold uppercase tracking-wider block">Kontak</span>
                            <span class="text-sm font-bold text-gray-800">{{ $surveyRequest->kontak }}</span>
                        </div>
                    </div>

                    <!-- DP Survey -->
                    <div class="flex items-center gap-3">
                        <div class="w-8 h-8 rounded bg-[#8b9b7e]/10 text-[#8b9b7e] flex items-center justify-center flex-shrink-0">
                            <span class="text-xs font-bold">Rp</span>
                        </div>
                        <div>
                            <span class="text-[10px] text-gray-400 font-bold uppercase tracking-wider block">DP Survey</span>
                            <span class="text-sm font-bold text-gray-800">Rp {{ number_format($surveyRequest->dp_survey, 0, ',', '.') }}</span>
                        </div>
                    </div>

                    <!-- Date -->
                    <div class="flex items-center gap-3">
                        <div class="w-8 h-8 rounded bg-amber-50 text-amber-600 flex items-center justify-center flex-shrink-0">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                            </svg>
                        </div>
                        <div>
                            <span class="text-[10px] text-gray-400 font-bold uppercase tracking-wider block">Tanggal Request</span>
                            <span class="text-sm font-bold text-gray-800">{{ $surveyRequest->created_at->translatedFormat('d F Y H:i') }}</span>
                        </div>
                    </div>

                    <!-- Total Foto -->
                    <div class="flex items-center gap-3">
                        <div class="w-8 h-8 rounded bg-blue-50 text-blue-600 flex-shrink-0 flex items-center justify-center">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M2.25 15.75l5.159-5.159a2.25 2.25 0 013.182 0l5.159 5.159m-1.5-1.5l1.409-1.409a2.25 2.25 0 013.182 0l2.909 2.909m-18 3.75h16.5a1.5 1.5 0 001.5-1.5V6a1.5 1.5 0 00-1.5-1.5H3.75A1.5 1.5 0 002.25 6v12a1.5 1.5 0 001.5 1.5z" />
                            </svg>
                        </div>
                        <div>
                            <span class="text-[10px] text-gray-400 font-bold uppercase tracking-wider block">Total Foto</span>
                            <span class="text-sm font-bold text-gray-800">{{ $totalPhotos }} Gambar</span>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Address and Room description -->
            <div class="bg-white border border-gray-200 rounded-xl shadow-sm p-6 space-y-4">
                <div>
                    <span class="text-xs font-bold text-gray-400 uppercase tracking-wider block mb-1">Alamat Survey</span>
                    <p class="text-sm text-gray-700 whitespace-pre-line leading-relaxed">{{ $surveyRequest->alamat }}</p>
                </div>
                <div class="border-t border-gray-100 pt-4">
                    <span class="text-xs font-bold text-gray-400 uppercase tracking-wider block mb-2">Ruangan yang akan disurvey</span>
                    <div class="text-sm text-gray-700 whitespace-pre-line bg-gray-50 p-4 rounded-xl border border-gray-100 leading-relaxed">{{ $surveyRequest->ruangan }}</div>
                </div>
            </div>
        </div>

        <!-- Right Column: Images Grid & Status Control -->
        <div class="lg:col-span-2 space-y-6">
            <!-- Status Update Controller -->
            <div class="bg-white border border-gray-200 rounded-xl shadow-sm p-6 space-y-4">
                <h3 class="text-xs font-bold text-gray-400 uppercase tracking-wider border-b border-gray-100 pb-3">
                    Status Control
                </h3>
                <form action="{{ route('admin.survey-request.update', $surveyRequest->id) }}" method="POST" class="space-y-4">
                    @csrf
                    @method('PUT')
                    <div>
                        <label for="status" class="text-xs font-bold text-gray-400 uppercase tracking-wider block mb-1.5">Change Status</label>
                        <select name="status" id="status" class="block w-full rounded-xl border-0 py-2.5 px-3 text-gray-900 ring-1 ring-inset ring-gray-200 focus:ring-2 focus:ring-inset focus:ring-[#8b9b7e] sm:text-sm sm:leading-6">
                            @foreach(['pending' => 'Pending', 'scheduled' => 'Scheduled', 'completed' => 'Completed', 'cancelled' => 'Cancelled'] as $value => $label)
                                <option value="{{ $value }}" {{ $surveyRequest->status == $value ? 'selected' : '' }}>{{ $label }}</option>
                            @endforeach
                        </select>
                    </div>
                    <button type="submit" class="w-full inline-flex items-center justify-center gap-2 rounded-xl bg-[#8b9b7e] px-4 py-2.5 text-sm font-semibold text-white shadow-sm hover:bg-[#7a8a6f] transition-all transform active:scale-98">
                        Update Status
                    </button>
                </form>
            </div>

            <!-- Supporting Images -->
            <div class="bg-white border border-gray-200 rounded-xl shadow-sm p-6">
                <div class="flex items-center justify-between border-b border-gray-100 pb-3 mb-5">
                    <h3 class="text-xs font-bold text-gray-400 uppercase tracking-wider">
                        Gambar Pendukung Survey
                    </h3>
                    <span class="text-xs font-semibold text-[#8b9b7e] bg-[#8b9b7e]/10 px-2.5 py-1 rounded-full">
                        {{ $totalPhotos }} Foto
                    </span>
                </div>

                @php
                    $allImages = $surveyRequest->images->pluck('foto')
                        ->filter()
                        ->map(function($img) {
                            return str_starts_with($img, 'http') || str_starts_with($img, 'data:') ? $img : asset('storage/' . $img);
                        });
                @endphp

                @if($allImages->isNotEmpty())
                    <!-- Asymmetrical Bento-Grid Collage -->
                    <div x-data class="grid grid-cols-2 sm:grid-cols-3 gap-3 auto-rows-[110px] sm:auto-rows-[140px] md:auto-rows-[160px]">
                        @foreach($allImages as $index => $imgUrl)
                            @php
                                $spanClass = 'col-span-1 row-span-1';
                                if ($index === 0 || $index === 5) {
                                    $spanClass = 'col-span-2 row-span-2';
                                } elseif ($index === 3 || $index === 7) {
                                    $spanClass = 'col-span-1 row-span-2';
                                }
                            @endphp
                            <div class="relative rounded-xl overflow-hidden border border-gray-200 bg-gray-50 shadow-sm group hover:shadow-md transition-all duration-300 {{ $spanClass }}">
                                <img src="{{ $imgUrl }}"
                                     @click="$dispatch('open-lightbox', { url: '{{ $imgUrl }}' })"
                                     class="w-full h-full object-cover cursor-zoom-in hover:scale-105 transition-transform duration-500">
                                <div class="absolute inset-0 bg-black/10 group-hover:bg-black/0 transition-colors pointer-events-none"></div>
                                <div class="absolute bottom-2.5 left-2.5 bg-black/60 backdrop-blur-md text-white/90 text-[10px] font-bold px-2 py-0.5 rounded-full opacity-0 group-hover:opacity-100 transition-opacity duration-300">
                                    Foto #{{ $index + 1 }}
                                </div>
                            </div>
                        @endforeach
                    </div>
                @else
                    <div class="flex flex-col items-center justify-center py-12 bg-gray-50 rounded-xl border border-dashed border-gray-200">
                        <svg class="h-10 w-10 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z" />
                        </svg>
                        <p class="mt-2 text-sm text-gray-500 font-semibold">Tidak ada foto.</p>
                    </div>
                @endif
            </div>

            <!-- Danger Zone -->
            <div class="bg-white border border-gray-200 rounded-xl shadow-sm p-6 space-y-4">
                <h3 class="text-sm font-bold text-red-650 border-b border-red-50 pb-2">Danger Zone</h3>
                <p class="text-xs text-gray-500 leading-relaxed">Menghapus request survey ini akan menghapus data tersebut dan semua gambar pendukungnya secara permanen dari server.</p>
                <button type="button"
                        @click="$dispatch('confirm-delete', {
                            title: 'Hapus Request Survey?',
                            message: 'Apakah Anda yakin ingin menghapus request survey ini? Tindakan ini tidak dapat dibatalkan.',
                            formId: 'delete-form-{{ $surveyRequest->id }}'
                        })"
                        class="w-full inline-flex justify-center items-center px-4 py-2.5 rounded-xl border border-red-200 bg-red-50 text-red-600 hover:bg-red-100 transition text-sm font-semibold">
                    Hapus Request
                </button>
                <form action="{{ route('admin.survey-request.destroy', $surveyRequest->id) }}"
                      method="POST"
                      id="delete-form-{{ $surveyRequest->id }}"
                      class="hidden">
                    @csrf
                    @method('DELETE')
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
