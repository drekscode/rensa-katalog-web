@extends('layouts.admin')

@section('title', 'Create Artikel')
@section('page-title', 'Create Artikel')

@section('content')
<div class="max-w-3xl">
    <form action="{{ route('admin.artikel.store') }}" method="POST" enctype="multipart/form-data" class="space-y-6">
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

                    <!-- Date -->
                    <div class="col-span-full">
                        <label for="date" class="block text-sm font-semibold leading-6 text-gray-900">
                            Date
                        </label>
                        <div class="mt-2">
                            <input type="date" name="date" id="date" value="{{ old('date') }}"
                                   class="block w-full rounded-lg border-0 py-2.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-[#8b9b7e] sm:text-sm sm:leading-6">
                        </div>
                        @error('date')
                            <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Hastag Kategori -->
                    <div class="col-span-full">
                        <label for="hastag_kategori" class="block text-sm font-semibold leading-6 text-gray-900">
                            Hashtag Kategori
                        </label>
                        <div class="mt-2">
                            <input type="text" name="hastag_kategori" id="hastag_kategori" value="{{ old('hastag_kategori') }}"
                                   class="block w-full rounded-lg border-0 py-2.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-[#8b9b7e] sm:text-sm sm:leading-6">
                        </div>
                        @error('hastag_kategori')
                            <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Foto -->
                    <div class="col-span-full">
                        <label for="foto" class="block text-sm font-semibold leading-6 text-gray-900">
                            Foto
                        </label>
                        <div class="mt-2">
                            <input type="file" name="foto" id="foto"
                                   class="block w-full text-sm text-gray-900 file:mr-4 file:py-2 file:px-4 file:rounded-lg file:border-0 file:text-sm file:font-semibold file:bg-[#8b9b7e]/10 file:text-[#8b9b7e] hover:file:bg-[#8b9b7e]/20">
                        </div>
                        @error('foto')
                            <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Deskripsi -->
                    <div class="col-span-full">
                        <label for="deskripsi" class="block text-sm font-semibold leading-6 text-gray-900">
                            Deskripsi
                        </label>
                        <div class="mt-2">
                            <textarea name="deskripsi" id="deskripsi" rows="4"
                                      class="block w-full rounded-lg border-0 py-2.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-[#8b9b7e] sm:text-sm sm:leading-6">{{ old('deskripsi') }}</textarea>
                        </div>
                        @error('deskripsi')
                            <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>
                </div>
            </div>
            <div class="flex items-center justify-end gap-x-4 border-t border-gray-100 px-4 py-4 sm:px-8">
                <a href="{{ route('admin.artikel.index') }}" 
                   class="rounded-lg px-4 py-2.5 text-sm font-semibold text-gray-700 hover:bg-gray-50 transition-colors">
                    Cancel
                </a>
                <button type="submit" 
                        class="rounded-lg bg-[#8b9b7e] px-4 py-2.5 text-sm font-semibold text-white shadow-sm hover:bg-[#7a8a6f] focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-[#8b9b7e] transition-colors">
                    Create Artikel
                </button>
            </div>
        </div>
    </form>
</div>
@endsection
