@extends('layouts.admin')

@section('title', 'Edit Banner')
@section('page-title', 'Edit Banner')

@section('content')
<div class="mx-auto max-w-3xl">
    <form action="{{ route('admin.banner.update', $banner) }}" method="POST" enctype="multipart/form-data" class="space-y-6">
        @csrf
        @method('PUT')

        <div class="overflow-hidden bg-white shadow-sm ring-1 ring-gray-200 rounded-xl">
             <div class="border-b border-gray-100 bg-gray-50/50 px-4 py-4 sm:px-6">
                <h3 class="text-base font-semibold leading-6 text-gray-900">Banner Details</h3>
                <p class="mt-1 text-sm text-gray-500">Update the banner image and link below.</p>
            </div>
            <div class="px-4 py-6 sm:p-8">
                <div class="grid max-w-2xl grid-cols-1 gap-x-6 gap-y-8">
                    <!-- Banner Image -->
                    <div class="col-span-full">
                        <label for="banner_image" class="block text-sm font-medium leading-6 text-gray-900">
                            Banner Image
                        </label>
                        <div class="mt-2 flex items-center gap-x-4">
                            @if($banner->banner_image)
                                <img src="{{ asset('storage/' . $banner->banner_image) }}" class="h-24 w-auto rounded-lg object-cover ring-1 ring-gray-200" alt="Current Banner">
                            @endif
                            <input type="file" name="banner_image" id="banner_image"
                                   class="block w-full text-sm text-gray-900 file:mr-4 file:py-2.5 file:px-4 file:rounded-lg file:border-0 file:text-sm file:font-semibold file:bg-[#8b9b7e]/10 file:text-[#8b9b7e] hover:file:bg-[#8b9b7e]/20 transition-all duration-200">
                        </div>
                        @error('banner_image')
                            <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Order (Urutan) -->
                    <div class="col-span-full">
                        <label for="urutan" class="block text-sm font-medium leading-6 text-gray-900">
                            Display Order (Optional)
                        </label>
                        <div class="mt-2">
                            <input type="number" name="urutan" id="urutan" value="{{ old('urutan', $banner->urutan) }}"
                                   class="block w-full rounded-lg border-0 py-3 px-3 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-[#8b9b7e] sm:text-sm sm:leading-6 transition-all duration-200">
                        </div>
                        @error('urutan')
                            <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Link -->
                    <div class="col-span-full">
                        <label for="link" class="block text-sm font-medium leading-6 text-gray-900">
                            Link (Optional)
                        </label>
                        <div class="mt-2">
                            <input type="text" name="link" id="link" value="{{ old('link', $banner->link) }}"
                                   class="block w-full rounded-lg border-0 py-3 px-3 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-[#8b9b7e] sm:text-sm sm:leading-6 transition-all duration-200">
                        </div>
                        @error('link')
                            <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>
                </div>
            </div>
             <div class="flex items-center justify-end gap-x-4 border-t border-gray-100 bg-gray-50/50 px-4 py-4 sm:px-6">
                <a href="{{ route('admin.banner.index') }}" 
                   class="rounded-lg px-4 py-2.5 text-sm font-semibold text-gray-700 hover:bg-gray-100 hover:text-gray-900 transition-colors">
                    Cancel
                </a>
                <button type="submit" 
                        class="rounded-lg bg-[#8b9b7e] px-4 py-2.5 text-sm font-semibold text-white shadow-sm hover:bg-[#7a8a6f] focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-[#8b9b7e] transition-all transform active:scale-95">
                    Update Banner
                </button>
            </div>
        </div>
    </form>
</div>
@endsection
