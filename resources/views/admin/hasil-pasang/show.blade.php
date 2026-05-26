@extends('layouts.admin')

@section('title', 'Detail Project - ' . $hasilPasang->nama_project)
@section('page-title', 'Detail Project')

@section('content')
<div class="mx-auto max-w-6xl space-y-6">
    <!-- Header with Quick Action Controls -->
    <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4 bg-white p-6 rounded-xl border border-gray-200 shadow-sm">
        <div class="flex items-center gap-4">
            <a href="{{ route('admin.hasil-pasang.index') }}" 
               class="inline-flex items-center justify-center w-10 h-10 rounded-lg bg-gray-50 border border-gray-200 text-gray-500 hover:text-gray-900 hover:bg-gray-100 transition-all">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M15 19l-7-7 7-7" />
                </svg>
            </a>
            <div>
                <div class="flex items-center gap-2">
                    <span class="text-xs text-gray-500 font-semibold">{{ $hasilPasang->id_project }}</span>
                </div>
                <h2 class="text-xl font-bold text-gray-900 mt-1 leading-tight">{{ $hasilPasang->nama_project }}</h2>
            </div>
        </div>
        <div class="flex gap-3">
            <a href="{{ route('admin.hasil-pasang.edit', $hasilPasang->id) }}" 
               class="inline-flex items-center gap-2 rounded-lg bg-[#8b9b7e] px-4 py-2.5 text-sm font-semibold text-white shadow-sm hover:bg-[#7a8a6f] transition-all transform hover:-translate-y-0.5 active:translate-y-0">
                <svg class="h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M16.862 4.487l1.687-1.688a1.875 1.875 0 112.652 2.652L10.582 16.07a4.5 4.5 0 01-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 011.13-1.897l8.932-8.931zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0115.75 21H5.25A2.25 2.25 0 013 18.75V8.25A2.25 2.25 0 015.25 6H10" />
                </svg>
                Edit Project
            </a>
        </div>
    </div>

    <!-- Main Content Layout (3 Columns Grid) -->
    <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
        
        <!-- Left Column: Specs Details -->
        <div class="space-y-6">
            @php
                $supportPhotos = $hasilPasang->images->pluck('foto')->filter();
                $totalPhotos = ($hasilPasang->foto ? 1 : 0) + $supportPhotos->count();
            @endphp
            <!-- Details Sheet -->
            <div class="bg-white border border-gray-200 rounded-xl shadow-sm p-6 space-y-5">
                <h3 class="text-xs font-bold text-gray-400 uppercase tracking-wider border-b border-gray-100 pb-3 flex items-center gap-2">
                    <svg class="w-4 h-4 text-gray-500" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10" />
                    </svg>
                    Informasi Project
                </h3>
                
                <div class="space-y-4 text-sm">
                    <!-- Nama Project -->
                    <div class="flex items-start gap-3">
                        <div class="w-8 h-8 rounded bg-gray-50 text-gray-500 flex items-center justify-center flex-shrink-0">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4" />
                            </svg>
                        </div>
                        <div>
                            <span class="text-[10px] text-gray-400 font-bold uppercase tracking-wider block">Nama Project</span>
                            <span class="text-sm font-bold text-gray-800" style="word-break: break-all;">{{ $hasilPasang->nama_project }}</span>
                        </div>
                    </div>

                    <!-- ID Project -->
                    <div class="flex items-center gap-3">
                        <div class="w-8 h-8 rounded bg-gray-50 text-gray-550 flex items-center justify-center flex-shrink-0">
                            <span class="text-xs font-black">#</span>
                        </div>
                        <div>
                            <span class="text-[10px] text-gray-400 font-bold uppercase tracking-wider block">ID Project</span>
                            <span class="text-sm font-bold text-gray-800">{{ $hasilPasang->id_project }}</span>
                        </div>
                    </div>

                    <!-- Series -->
                    <div class="flex items-center gap-3">
                        <div class="w-8 h-8 rounded bg-[#8b9b7e]/10 text-[#8b9b7e] flex items-center justify-center flex-shrink-0">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M9.568 3H5.25A2.25 2.25 0 003 5.25v4.318c0 .597.237 1.17.659 1.591l9.581 9.581a1.5 1.5 0 002.122 0l4.75-4.75a1.5 1.5 0 000-2.122L10.828 3.758A2.25 2.25 0 009.568 3z" />
                            </svg>
                        </div>
                        <div>
                            <span class="text-[10px] text-gray-400 font-bold uppercase tracking-wider block">Series</span>
                            <span class="text-sm font-bold text-gray-800">{{ $hasilPasang->series->nama_series ?? '-' }}</span>
                        </div>
                    </div>

                    <!-- Tanggal Pasang -->
                    <div class="flex items-center gap-3">
                        <div class="w-8 h-8 rounded bg-amber-50 text-amber-600 flex items-center justify-center flex-shrink-0">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                            </svg>
                        </div>
                        <div>
                            <span class="text-[10px] text-gray-400 font-bold uppercase tracking-wider block">Tanggal Pasang</span>
                            <span class="text-sm font-bold text-gray-800">{{ \Carbon\Carbon::parse($hasilPasang->tanggal)->translatedFormat('d F Y') }}</span>
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
        </div>

        <!-- Right Column: Images Bento Grid -->
        <div class="lg:col-span-2 space-y-6">
            <div class="bg-white border border-gray-200 rounded-xl shadow-sm p-6">
                <div class="flex items-center justify-between border-b border-gray-100 pb-3 mb-5">
                    <h3 class="text-xs font-bold text-gray-400 uppercase tracking-wider">
                        Foto & Kolase Hasil Pasang
                    </h3>
                    <span class="text-xs font-semibold text-[#8b9b7e] bg-[#8b9b7e]/10 px-2.5 py-1 rounded-full">
                        {{ $totalPhotos }} Foto
                    </span>
                </div>

                @php
                    $allImages = collect([$hasilPasang->foto])
                        ->concat($hasilPasang->images->pluck('foto'))
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
        </div>
    </div>
</div>
@endsection
