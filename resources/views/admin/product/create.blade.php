@extends('layouts.admin')

@section('title', 'Create Product')
@section('page-title', 'Create Product')

@section('content')
<div class="max-w-3xl">
    <form action="{{ route('admin.product.store') }}" method="POST" enctype="multipart/form-data" class="space-y-6">
        @csrf

        <div class="bg-white shadow-sm ring-1 ring-gray-200 rounded-xl">
            <div class="px-4 py-6 sm:p-8">
                <div class="grid max-w-2xl grid-cols-1 gap-x-6 gap-y-8">
                    <!-- Series -->
                    <div class="col-span-full">
                        <label for="series_id" class="block text-sm font-semibold leading-6 text-gray-900">
                            Series <span class="text-red-500">*</span>
                        </label>
                        <div class="mt-2">
                            <select id="series_id" name="series_id" class="block w-full rounded-lg border-0 py-2.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 focus:ring-2 focus:ring-inset focus:ring-[#8b9b7e] sm:text-sm sm:leading-6">
                                <option value="">Select Series</option>
                                @foreach($series as $serie)
                                    <option value="{{ $serie->id }}" {{ old('series_id') == $serie->id ? 'selected' : '' }}>
                                        {{ $serie->nama_series }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                        @error('series_id')
                            <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Nama Product -->
                    <div class="col-span-full">
                        <label for="nama_product" class="block text-sm font-semibold leading-6 text-gray-900">
                            Nama Product <span class="text-red-500">*</span>
                        </label>
                        <div class="mt-2">
                            <input type="text" name="nama_product" id="nama_product" value="{{ old('nama_product') }}" required
                                   class="block w-full rounded-lg border-0 py-2.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-[#8b9b7e] sm:text-sm sm:leading-6">
                        </div>
                        @error('nama_product')
                            <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Thumbnail -->
                    <div class="col-span-full">
                        <label for="thumbnail" class="block text-sm font-semibold leading-6 text-gray-900">
                            Thumbnail
                        </label>
                        <div class="mt-2">
                            <input type="file" name="thumbnail" id="thumbnail"
                                   class="block w-full text-sm text-gray-900 file:mr-4 file:py-2 file:px-4 file:rounded-lg file:border-0 file:text-sm file:font-semibold file:bg-[#8b9b7e]/10 file:text-[#8b9b7e] hover:file:bg-[#8b9b7e]/20">
                        </div>
                        @error('thumbnail')
                            <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Big Pic -->
                    <div class="col-span-full">
                        <label for="big_pic" class="block text-sm font-semibold leading-6 text-gray-900">
                            Big Picture
                        </label>
                        <div class="mt-2">
                            <input type="file" name="big_pic" id="big_pic"
                                   class="block w-full text-sm text-gray-900 file:mr-4 file:py-2 file:px-4 file:rounded-lg file:border-0 file:text-sm file:font-semibold file:bg-[#8b9b7e]/10 file:text-[#8b9b7e] hover:file:bg-[#8b9b7e]/20">
                        </div>
                        @error('big_pic')
                            <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>
                </div>
            </div>
            <div class="flex items-center justify-end gap-x-4 border-t border-gray-100 px-4 py-4 sm:px-8">
                <a href="{{ route('admin.product.index') }}" 
                   class="rounded-lg px-4 py-2.5 text-sm font-semibold text-gray-700 hover:bg-gray-50 transition-colors">
                    Cancel
                </a>
                <button type="submit" 
                        class="rounded-lg bg-[#8b9b7e] px-4 py-2.5 text-sm font-semibold text-white shadow-sm hover:bg-[#7a8a6f] focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-[#8b9b7e] transition-colors">
                    Create Product
                </button>
            </div>
        </div>
    </form>
</div>
@endsection
