@extends('layouts.admin')

@section('title', 'Edit Series')
@section('page-title', 'Edit Series')

@section('content')
<div class="mx-auto max-w-3xl">
    <form action="{{ route('admin.series.update', $series) }}" method="POST" enctype="multipart/form-data" class="space-y-6">
        @csrf
        @method('PUT')

        <div class="overflow-hidden bg-white shadow-sm ring-1 ring-gray-200 rounded-xl">
             <div class="border-b border-gray-100 bg-gray-50/50 px-4 py-4 sm:px-6">
                <h3 class="text-base font-semibold leading-6 text-gray-900">Series Details</h3>
                <p class="mt-1 text-sm text-gray-500">Update the series information below.</p>
            </div>
            <div class="px-4 py-6 sm:p-8">
                <div class="grid max-w-2xl grid-cols-1 gap-x-6 gap-y-8">
                    <!-- Kategori -->
                    <div class="col-span-full">
                        <label for="kategori_id" class="block text-sm font-medium leading-6 text-gray-900">
                            Kategori <span class="text-red-500">*</span>
                        </label>
                        <div class="mt-2">
                            <select id="kategori_id" name="kategori_id" class="block w-full rounded-lg border-0 py-3 px-3 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 focus:ring-2 focus:ring-inset focus:ring-[#8b9b7e] sm:text-sm sm:leading-6 transition-all duration-200">
                                <option value="">Select Kategori</option>
                                @foreach($kategoris as $kategori)
                                    <option value="{{ $kategori->id }}" {{ old('kategori_id', $series->kategori_id) == $kategori->id ? 'selected' : '' }}>
                                        {{ $kategori->nama_kategori }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                        @error('kategori_id')
                            <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Nama Series -->
                    <div class="col-span-full">
                        <label for="nama_series" class="block text-sm font-medium leading-6 text-gray-900">
                            Nama Series <span class="text-red-500">*</span>
                        </label>
                        <div class="mt-2">
                            <input type="text" name="nama_series" id="nama_series" value="{{ old('nama_series', $series->nama_series) }}" required
                                   class="block w-full rounded-lg border-0 py-3 px-3 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-[#8b9b7e] sm:text-sm sm:leading-6 transition-all duration-200">
                        </div>
                        @error('nama_series')
                            <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Material -->
                    <div class="col-span-full">
                        <label for="material" class="block text-sm font-medium leading-6 text-gray-900">
                            Material
                        </label>
                        <div class="mt-2">
                            <input type="text" name="material" id="material" value="{{ old('material', $series->material) }}"
                                   class="block w-full rounded-lg border-0 py-3 px-3 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-[#8b9b7e] sm:text-sm sm:leading-6 transition-all duration-200">
                        </div>
                        @error('material')
                            <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Files -->
                    <div class="col-span-full">
                        <label for="struktur_img" class="block text-sm font-medium leading-6 text-gray-900">
                            Struktur Image
                        </label>
                        <div class="mt-2 flex items-center gap-x-4">
                            @if($series->struktur_img)
                                <img src="{{ asset('storage/' . $series->struktur_img) }}" class="h-16 w-16 rounded-lg object-cover ring-1 ring-gray-200" alt="Current Image">
                            @endif
                            <input type="file" name="struktur_img" id="struktur_img"
                                   class="block w-full text-sm text-gray-900 file:mr-4 file:py-2.5 file:px-4 file:rounded-lg file:border-0 file:text-sm file:font-semibold file:bg-[#8b9b7e]/10 file:text-[#8b9b7e] hover:file:bg-[#8b9b7e]/20 transition-all duration-200">
                        </div>
                    </div>

                    <div class="col-span-full">
                        <label for="cover_area" class="block text-sm font-medium leading-6 text-gray-900">
                            Cover Area Image
                        </label>
                        <div class="mt-2 flex items-center gap-x-4">
                             @if($series->cover_area)
                                <img src="{{ asset('storage/' . $series->cover_area) }}" class="h-16 w-16 rounded-lg object-cover ring-1 ring-gray-200" alt="Current Image">
                            @endif
                            <input type="file" name="cover_area" id="cover_area"
                                   class="block w-full text-sm text-gray-900 file:mr-4 file:py-2.5 file:px-4 file:rounded-lg file:border-0 file:text-sm file:font-semibold file:bg-[#8b9b7e]/10 file:text-[#8b9b7e] hover:file:bg-[#8b9b7e]/20 transition-all duration-200">
                        </div>
                    </div>

                    <!-- Deskripsi -->
                    <div class="col-span-full">
                        <label for="deskripsi_produk" class="block text-sm font-medium leading-6 text-gray-900">
                            Deskripsi Produk
                        </label>
                        <div class="mt-2">
                            <textarea name="deskripsi_produk" id="deskripsi_produk" rows="5"
                                      class="block w-full rounded-lg border-0 py-3 px-3 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-[#8b9b7e] sm:text-sm sm:leading-6 transition-all duration-200">{{ old('deskripsi_produk', $series->deskripsi_produk) }}</textarea>
                        </div>
                        @error('deskripsi_produk')
                            <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>
                </div>
            </div>
             <div class="flex items-center justify-end gap-x-4 border-t border-gray-100 bg-gray-50/50 px-4 py-4 sm:px-6">
                <a href="{{ route('admin.series.index') }}" 
                   class="rounded-lg px-4 py-2.5 text-sm font-semibold text-gray-700 hover:bg-gray-100 hover:text-gray-900 transition-colors">
                    Cancel
                </a>
                <button type="submit" 
                        class="rounded-lg bg-[#8b9b7e] px-4 py-2.5 text-sm font-semibold text-white shadow-sm hover:bg-[#7a8a6f] focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-[#8b9b7e] transition-all transform active:scale-95">
                    Update Series
                </button>
            </div>
        </div>
    </form>
</div>
@endsection
