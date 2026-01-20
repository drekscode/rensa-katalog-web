@extends('layouts.admin')

@section('title', 'Create Kategori')
@section('page-title', 'Create Kategori')

@section('content')
<div class="max-w-3xl">
    <form action="{{ route('admin.kategori.store') }}" method="POST" class="space-y-6">
        @csrf

        <div class="bg-white shadow-sm ring-1 ring-gray-200 rounded-xl">
            <div class="px-4 py-6 sm:p-8">
                <div class="grid max-w-2xl grid-cols-1 gap-x-6 gap-y-8">
                    <div class="col-span-full">
                        <label for="nama_kategori" class="block text-sm font-semibold leading-6 text-gray-900">
                            Nama Kategori <span class="text-red-500">*</span>
                        </label>
                        <div class="mt-2">
                            <input type="text" 
                                   name="nama_kategori" 
                                   id="nama_kategori" 
                                   value="{{ old('nama_kategori') }}"
                                   required
                                   class="block w-full rounded-lg border-0 py-2.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-[#8b9b7e] sm:text-sm sm:leading-6 @error('nama_kategori') ring-red-500 @enderror">
                        </div>
                        @error('nama_kategori')
                            <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="col-span-full">
                        <label for="keunggulan_produk" class="block text-sm font-semibold leading-6 text-gray-900">
                            Keunggulan Produk
                        </label>
                        <div class="mt-2">
                            <textarea name="keunggulan_produk" 
                                      id="keunggulan_produk" 
                                      rows="4"
                                      class="block w-full rounded-lg border-0 py-2.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-[#8b9b7e] sm:text-sm sm:leading-6 @error('keunggulan_produk') ring-red-500 @enderror">{{ old('keunggulan_produk') }}</textarea>
                        </div>
                        @error('keunggulan_produk')
                            <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>
                </div>
            </div>
            <div class="flex items-center justify-end gap-x-4 border-t border-gray-100 px-4 py-4 sm:px-8">
                <a href="{{ route('admin.kategori.index') }}" 
                   class="rounded-lg px-4 py-2.5 text-sm font-semibold text-gray-700 hover:bg-gray-50 transition-colors">
                    Cancel
                </a>
                <button type="submit" 
                        class="rounded-lg bg-[#8b9b7e] px-4 py-2.5 text-sm font-semibold text-white shadow-sm hover:bg-[#7a8a6f] focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-[#8b9b7e] transition-colors">
                    Create Kategori
                </button>
            </div>
        </div>
    </form>
</div>
@endsection
