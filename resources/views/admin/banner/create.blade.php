@extends('layouts.admin')

@section('title', 'Add Banner')
@section('page-title', 'Add Banner')

@section('content')
<div class="max-w-3xl">
    <form action="{{ route('admin.banner.store') }}" method="POST" enctype="multipart/form-data" class="space-y-6">
        @csrf

        <div class="bg-white shadow-sm ring-1 ring-gray-200 rounded-xl">
            <div class="px-4 py-6 sm:p-8">
                <div class="grid max-w-2xl grid-cols-1 gap-x-6 gap-y-8">
                    <!-- Banner Image -->
                    <div class="col-span-full">
                        <label for="banner_image" class="block text-sm font-semibold leading-6 text-gray-900">
                            Banner Image <span class="text-red-500">*</span>
                        </label>
                        <div class="mt-2">
                            <input type="file" name="banner_image" id="banner_image" required
                                   class="block w-full text-sm text-gray-900 file:mr-4 file:py-2 file:px-4 file:rounded-lg file:border-0 file:text-sm file:font-semibold file:bg-[#8b9b7e]/10 file:text-[#8b9b7e] hover:file:bg-[#8b9b7e]/20">
                        </div>
                        @error('banner_image')
                            <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Order (Urutan) -->
                    <div class="col-span-full">
                        <label for="urutan" class="block text-sm font-semibold leading-6 text-gray-900">
                            Display Order (Optional)
                        </label>
                        <div class="mt-2">
                            <input type="number" name="urutan" id="urutan" value="{{ old('urutan') }}"
                                   class="block w-full rounded-lg border-0 py-2.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-[#8b9b7e] sm:text-sm sm:leading-6">
                        </div>
                        @error('urutan')
                            <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Link -->
                    <div class="col-span-full">
                        <label for="link" class="block text-sm font-semibold leading-6 text-gray-900">
                            Link (Optional)
                        </label>
                        <div class="mt-2">
                            <input type="text" name="link" id="link" value="{{ old('link') }}"
                                   class="block w-full rounded-lg border-0 py-2.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-[#8b9b7e] sm:text-sm sm:leading-6">
                        </div>
                        @error('link')
                            <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>
                </div>
            </div>
            <div class="flex items-center justify-end gap-x-4 border-t border-gray-100 px-4 py-4 sm:px-8">
                <a href="{{ route('admin.banner.index') }}" 
                   class="rounded-lg px-4 py-2.5 text-sm font-semibold text-gray-700 hover:bg-gray-50 transition-colors">
                    Cancel
                </a>
                <button type="submit" 
                        class="rounded-lg bg-[#8b9b7e] px-4 py-2.5 text-sm font-semibold text-white shadow-sm hover:bg-[#7a8a6f] focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-[#8b9b7e] transition-colors">
                    Add Banner
                </button>
            </div>
        </div>
    </form>
</div>
@endsection
