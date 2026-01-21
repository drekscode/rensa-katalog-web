@extends('layouts.admin')

@section('title', 'Create Product')
@section('page-title', 'Create Product')

@section('content')
<div class="mx-auto max-w-3xl">
    <form action="{{ route('admin.product.store') }}" method="POST" enctype="multipart/form-data" class="space-y-6">
        @csrf

        <div class="overflow-hidden bg-white shadow-sm ring-1 ring-gray-200 rounded-xl">
             <div class="border-b border-gray-100 bg-gray-50/50 px-4 py-4 sm:px-6">
                <h3 class="text-base font-semibold leading-6 text-gray-900">Product Details</h3>
                <p class="mt-1 text-sm text-gray-500">Enter the product information below.</p>
            </div>
            <div class="px-4 py-6 sm:p-8">
                <div class="grid max-w-2xl grid-cols-1 gap-x-6 gap-y-8">
                    <!-- Series -->
                    <div class="col-span-full">
                        <label for="series_id" class="block text-sm font-medium leading-6 text-gray-900">
                            Series <span class="text-red-500">*</span>
                        </label>
                        <div class="mt-2 relative">
                            <select id="series_id" name="series_id" required
                                    class="block w-full rounded-lg border-0 py-3 px-3 text-gray-900 shadow-sm ring-1 ring-inset {{ $errors->has('series_id') ? 'ring-red-500 bg-red-50' : 'ring-gray-300' }} focus:ring-2 focus:ring-inset focus:ring-[#8b9b7e] sm:text-sm sm:leading-6 transition-all duration-200">
                                <option value="">Select Series</option>
                                @foreach($series as $serie)
                                    <option value="{{ $serie->id }}" {{ old('series_id') == $serie->id ? 'selected' : '' }}>
                                        {{ $serie->nama_series }}
                                    </option>
                                @endforeach
                            </select>
                            @error('series_id')
                                <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center pr-10">
                                    <svg class="h-5 w-5 text-red-500" viewBox="0 0 20 20" fill="currentColor">
                                        <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-8-5a.75.75 0 01.75.75v4.5a.75.75 0 01-1.5 0v-4.5A.75.75 0 0110 5zm0 10a1 1 0 100-2 1 1 0 000 2z" clip-rule="evenodd" />
                                    </svg>
                                </div>
                            @enderror
                        </div>
                        @error('series_id')
                            <p class="mt-2 text-sm text-red-600 flex items-center gap-1">
                                <svg class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 9v3.75m9-.75a9 9 0 11-18 0 9 9 0 0118 0zm-9 3.75h.008v.008H12v-.008z" />
                                </svg>
                                {{ $message }}
                            </p>
                        @enderror
                    </div>

                    <!-- Nama Product -->
                    <div class="col-span-full">
                        <label for="nama_product" class="block text-sm font-medium leading-6 text-gray-900">
                            Nama Product <span class="text-red-500">*</span>
                        </label>
                        <div class="mt-2 relative">
                            <input type="text" name="nama_product" id="nama_product" value="{{ old('nama_product') }}" required
                                   class="block w-full rounded-lg border-0 py-3 px-3 text-gray-900 shadow-sm ring-1 ring-inset {{ $errors->has('nama_product') ? 'ring-red-500 bg-red-50' : 'ring-gray-300' }} placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-[#8b9b7e] sm:text-sm sm:leading-6 transition-all duration-200">
                            @error('nama_product')
                                <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center pr-3">
                                    <svg class="h-5 w-5 text-red-500" viewBox="0 0 20 20" fill="currentColor">
                                        <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-8-5a.75.75 0 01.75.75v4.5a.75.75 0 01-1.5 0v-4.5A.75.75 0 0110 5zm0 10a1 1 0 100-2 1 1 0 000 2z" clip-rule="evenodd" />
                                    </svg>
                                </div>
                            @enderror
                        </div>
                        @error('nama_product')
                            <p class="mt-2 text-sm text-red-600 flex items-center gap-1">
                                <svg class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 9v3.75m9-.75a9 9 0 11-18 0 9 9 0 0118 0zm-9 3.75h.008v.008H12v-.008z" />
                                </svg>
                                {{ $message }}
                            </p>
                        @enderror
                    </div>

                    <!-- Thumbnail -->
                    <div class="col-span-full">
                        <label for="thumbnail" class="block text-sm font-medium leading-6 text-gray-900">
                            Thumbnail
                        </label>
                        <div class="mt-2">
                            <input type="file" name="thumbnail" id="thumbnail"
                                   class="block w-full text-sm text-gray-900 file:mr-4 file:py-2.5 file:px-4 file:rounded-lg file:border-0 file:text-sm file:font-semibold {{ $errors->has('thumbnail') ? 'file:bg-red-50 file:text-red-600' : 'file:bg-[#8b9b7e]/10 file:text-[#8b9b7e]' }} hover:file:bg-[#8b9b7e]/20 transition-all duration-200">
                        </div>
                        @error('thumbnail')
                            <p class="mt-2 text-sm text-red-600 flex items-center gap-1">
                                <svg class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 9v3.75m9-.75a9 9 0 11-18 0 9 9 0 0118 0zm-9 3.75h.008v.008H12v-.008z" />
                                </svg>
                                {{ $message }}
                            </p>
                        @enderror
                    </div>

                    <!-- Big Pic -->
                    <div class="col-span-full">
                        <label for="big_pic" class="block text-sm font-medium leading-6 text-gray-900">
                            Big Picture
                        </label>
                        <div class="mt-2">
                            <input type="file" name="big_pic" id="big_pic"
                                   class="block w-full text-sm text-gray-900 file:mr-4 file:py-2.5 file:px-4 file:rounded-lg file:border-0 file:text-sm file:font-semibold {{ $errors->has('big_pic') ? 'file:bg-red-50 file:text-red-600' : 'file:bg-[#8b9b7e]/10 file:text-[#8b9b7e]' }} hover:file:bg-[#8b9b7e]/20 transition-all duration-200">
                        </div>
                        @error('big_pic')
                            <p class="mt-2 text-sm text-red-600 flex items-center gap-1">
                                <svg class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 9v3.75m9-.75a9 9 0 11-18 0 9 9 0 0118 0zm-9 3.75h.008v.008H12v-.008z" />
                                </svg>
                                {{ $message }}
                            </p>
                        @enderror
                    </div>
                </div>
            </div>
             <div class="flex items-center justify-end gap-x-4 border-t border-gray-100 bg-gray-50/50 px-4 py-4 sm:px-6">
                <a href="{{ route('admin.product.index') }}" 
                   class="rounded-lg px-4 py-2.5 text-sm font-semibold text-gray-700 hover:bg-gray-100 hover:text-gray-900 transition-colors">
                    Cancel
                </a>
                <button type="submit" name="action" value="save_and_add_another"
                        class="rounded-lg bg-white px-4 py-2.5 text-sm font-semibold text-gray-700 shadow-sm ring-1 ring-inset ring-gray-300 hover:bg-gray-50 transition-all transform active:scale-95">
                    Save and Add Another
                </button>
                <button type="submit" 
                        class="rounded-lg bg-[#8b9b7e] px-4 py-2.5 text-sm font-semibold text-white shadow-sm hover:bg-[#7a8a6f] focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-[#8b9b7e] transition-all transform active:scale-95">
                    Create Product
                </button>
            </div>
        </div>
    </form>
</div>
@endsection
