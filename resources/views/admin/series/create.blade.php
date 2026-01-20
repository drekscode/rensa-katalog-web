@extends('layouts.admin')

@section('title', 'Create Series')
@section('page-title', 'Create Series')

@section('content')
<div class="max-w-3xl">
    <form action="{{ route('admin.series.store') }}" method="POST" enctype="multipart/form-data" class="space-y-6">
        @csrf

        <div class="bg-white shadow-sm ring-1 ring-gray-200 rounded-xl">
            <div class="px-4 py-6 sm:p-8">
                <div class="grid max-w-2xl grid-cols-1 gap-x-6 gap-y-8">
                    <!-- Kategori -->
                    <div class="col-span-full">
                        <label for="kategori_id" class="block text-sm font-semibold leading-6 text-gray-900">
                            Kategori <span class="text-red-500">*</span>
                        </label>
                        <div class="mt-2">
                            <select id="kategori_id" name="kategori_id" class="block w-full rounded-lg border-0 py-2.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 focus:ring-2 focus:ring-inset focus:ring-[#8b9b7e] sm:text-sm sm:leading-6">
                                <option value="">Select Kategori</option>
                                @foreach($kategoris as $kategori)
                                    <option value="{{ $kategori->id }}" {{ old('kategori_id') == $kategori->id ? 'selected' : '' }}>
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
                        <label for="nama_series" class="block text-sm font-semibold leading-6 text-gray-900">
                            Nama Series <span class="text-red-500">*</span>
                        </label>
                        <div class="mt-2">
                            <input type="text" name="nama_series" id="nama_series" value="{{ old('nama_series') }}" required
                                   class="block w-full rounded-lg border-0 py-2.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-[#8b9b7e] sm:text-sm sm:leading-6">
                        </div>
                        @error('nama_series')
                            <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Material -->
                    <div class="col-span-full">
                        <label for="material" class="block text-sm font-semibold leading-6 text-gray-900">
                            Material
                        </label>
                        <div class="mt-2">
                            <input type="text" name="material" id="material" value="{{ old('material') }}"
                                   class="block w-full rounded-lg border-0 py-2.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-[#8b9b7e] sm:text-sm sm:leading-6">
                        </div>
                        @error('material')
                            <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Files -->
                    <div class="col-span-full">
                        <label for="struktur_img" class="block text-sm font-semibold leading-6 text-gray-900">
                            Struktur Image
                        </label>
                        <div class="mt-2">
                            <input type="file" name="struktur_img" id="struktur_img"
                                   class="block w-full text-sm text-gray-900 file:mr-4 file:py-2 file:px-4 file:rounded-lg file:border-0 file:text-sm file:font-semibold file:bg-[#8b9b7e]/10 file:text-[#8b9b7e] hover:file:bg-[#8b9b7e]/20">
                        </div>
                        @error('struktur_img')
                            <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="col-span-full">
                        <label for="cover_area" class="block text-sm font-semibold leading-6 text-gray-900">
                            Cover Area Image
                        </label>
                        <div class="mt-2">
                            <input type="file" name="cover_area" id="cover_area"
                                   class="block w-full text-sm text-gray-900 file:mr-4 file:py-2 file:px-4 file:rounded-lg file:border-0 file:text-sm file:font-semibold file:bg-[#8b9b7e]/10 file:text-[#8b9b7e] hover:file:bg-[#8b9b7e]/20">
                        </div>
                        @error('cover_area')
                            <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Deskripsi -->
                    <div class="col-span-full">
                        <label for="deskripsi_produk" class="block text-sm font-semibold leading-6 text-gray-900">
                            Deskripsi Produk
                        </label>
                        <div class="mt-2">
                            <textarea name="deskripsi_produk" id="deskripsi_produk" rows="4"
                                      class="block w-full rounded-lg border-0 py-2.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-[#8b9b7e] sm:text-sm sm:leading-6">{{ old('deskripsi_produk') }}</textarea>
                        </div>
                        @error('deskripsi_produk')
                            <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>
                </div>
            </div>
            <div class="flex items-center justify-end gap-x-4 border-t border-gray-100 px-4 py-4 sm:px-8">
                <a href="{{ route('admin.series.index') }}" 
                   class="rounded-lg px-4 py-2.5 text-sm font-semibold text-gray-700 hover:bg-gray-50 transition-colors">
                    Cancel
                </a>
                <button type="submit" 
                        class="rounded-lg bg-[#8b9b7e] px-4 py-2.5 text-sm font-semibold text-white shadow-sm hover:bg-[#7a8a6f] focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-[#8b9b7e] transition-colors">
                    Create Series
                </button>
            </div>
        </div>
    </form>
</div>
@endsection
