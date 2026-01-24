@extends('layouts.admin')

@section('title', 'Edit Artikel')
@section('page-title', 'Edit Artikel')

@section('content')
<div class="mx-auto max-w-3xl">
    <form action="{{ route('admin.artikel.update', $artikel) }}" method="POST" enctype="multipart/form-data" class="space-y-6">
        @csrf
        @method('PUT')

        <div class="overflow-hidden bg-white shadow-sm ring-1 ring-gray-200 rounded-xl">
             <div class="border-b border-gray-100 bg-gray-50/50 px-4 py-4 sm:px-6">
                <h3 class="text-base font-semibold leading-6 text-gray-900">Artikel Details</h3>
                <p class="mt-1 text-sm text-gray-500">Update the article information below.</p>
            </div>
            <div class="px-4 py-6 sm:p-8">
                <div class="grid max-w-2xl grid-cols-1 gap-x-6 gap-y-8">
                    <!-- Judul -->
                    <div class="col-span-full">
                        <label for="judul" class="block text-sm font-medium leading-6 text-gray-900">
                            Judul Artikel <span class="text-red-500">*</span>
                        </label>
                        <div class="mt-2 relative">
                            <input type="text" name="judul" id="judul" value="{{ old('judul', $artikel->judul) }}" required
                                   class="block w-full rounded-lg border-0 py-3 px-3 text-gray-900 shadow-sm ring-1 ring-inset {{ $errors->has('judul') ? 'ring-red-500 bg-red-50' : 'ring-gray-300' }} placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-[#8b9b7e] sm:text-sm sm:leading-6 transition-all duration-200">
                            @error('judul')
                                <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center pr-3">
                                    <svg class="h-5 w-5 text-red-500" viewBox="0 0 20 20" fill="currentColor">
                                        <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-8-5a.75.75 0 01.75.75v4.5a.75.75 0 01-1.5 0v-4.5A.75.75 0 0110 5zm0 10a1 1 0 100-2 1 1 0 000 2z" clip-rule="evenodd" />
                                    </svg>
                                </div>
                            @enderror
                        </div>
                        @error('judul')
                            <p class="mt-2 text-sm text-red-600 flex items-center gap-1">
                                <svg class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 9v3.75m9-.75a9 9 0 11-18 0 9 9 0 0118 0zm-9 3.75h.008v.008H12v-.008z" />
                                </svg>
                                {{ $message }}
                            </p>
                        @enderror
                    </div>

                    <!-- Kategori -->
                    <div class="col-span-full">
                        <label for="kategori_id" class="block text-sm font-medium leading-6 text-gray-900">
                            Kategori <span class="text-red-500">*</span>
                        </label>
                        <div class="mt-2 relative">
                            <select id="kategori_id" name="kategori_id" required
                                    class="block w-full rounded-lg border-0 py-3 px-3 text-gray-900 shadow-sm ring-1 ring-inset {{ $errors->has('kategori_id') ? 'ring-red-500 bg-red-50' : 'ring-gray-300' }} focus:ring-2 focus:ring-inset focus:ring-[#8b9b7e] sm:text-sm sm:leading-6 transition-all duration-200">
                                <option value="">Select Kategori</option>
                                @foreach($kategoris as $kategori)
                                    <option value="{{ $kategori->id }}" {{ old('kategori_id', $artikel->kategori_id) == $kategori->id ? 'selected' : '' }}>
                                        {{ $kategori->nama_kategori }}
                                    </option>
                                @endforeach
                            </select>
                            @error('kategori_id')
                                <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center pr-10">
                                    <svg class="h-5 w-5 text-red-500" viewBox="0 0 20 20" fill="currentColor">
                                        <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-8-5a.75.75 0 01.75.75v4.5a.75.75 0 01-1.5 0v-4.5A.75.75 0 0110 5zm0 10a1 1 0 100-2 1 1 0 000 2z" clip-rule="evenodd" />
                                    </svg>
                                </div>
                            @enderror
                        </div>
                        @error('kategori_id')
                            <p class="mt-2 text-sm text-red-600 flex items-center gap-1">
                                <svg class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 9v3.75m9-.75a9 9 0 11-18 0 9 9 0 0118 0zm-9 3.75h.008v.008H12v-.008z" />
                                </svg>
                                {{ $message }}
                            </p>
                        @enderror
                    </div>

                    <!-- Date -->
                    <div class="col-span-full">
                        <label for="date" class="block text-sm font-medium leading-6 text-gray-900">
                            Date
                        </label>
                        <div class="mt-2 relative">
                            <input type="date" name="date" id="date" value="{{ old('date', $artikel->date ? \Carbon\Carbon::parse($artikel->date)->format('Y-m-d') : '') }}"
                                   class="block w-full rounded-lg border-0 py-3 px-3 text-gray-900 shadow-sm ring-1 ring-inset {{ $errors->has('date') ? 'ring-red-500 bg-red-50' : 'ring-gray-300' }} placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-[#8b9b7e] sm:text-sm sm:leading-6 transition-all duration-200">
                        </div>
                        @error('date')
                            <p class="mt-2 text-sm text-red-600 flex items-center gap-1">
                                <svg class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 9v3.75m9-.75a9 9 0 11-18 0 9 9 0 0118 0zm-9 3.75h.008v.008H12v-.008z" />
                                </svg>
                                {{ $message }}
                            </p>
                        @enderror
                    </div>

                    <!-- Hastag Kategori -->
                    <div class="col-span-full">
                        <label for="hastag_kategori" class="block text-sm font-medium leading-6 text-gray-900">
                            Hashtag Kategori
                        </label>
                        <div class="mt-2 relative">
                            <input type="text" name="hastag_kategori" id="hastag_kategori" value="{{ old('hastag_kategori', $artikel->hastag_kategori) }}"
                                   class="block w-full rounded-lg border-0 py-3 px-3 text-gray-900 shadow-sm ring-1 ring-inset {{ $errors->has('hastag_kategori') ? 'ring-red-500 bg-red-50' : 'ring-gray-300' }} placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-[#8b9b7e] sm:text-sm sm:leading-6 transition-all duration-200">
                        </div>
                        @error('hastag_kategori')
                            <p class="mt-2 text-sm text-red-600 flex items-center gap-1">
                                <svg class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 9v3.75m9-.75a9 9 0 11-18 0 9 9 0 0118 0zm-9 3.75h.008v.008H12v-.008z" />
                                </svg>
                                {{ $message }}
                            </p>
                        @enderror
                    </div>

                    <!-- Foto -->
                    <div class="col-span-full">
                        <label for="foto" class="block text-sm font-medium leading-6 text-gray-900">
                            Foto
                        </label>
                         <div class="mt-2 flex items-center gap-x-4">
                            @if($artikel->foto)
                                <img src="{{ $artikel->foto }}" class="h-24 w-auto rounded-lg object-cover ring-1 ring-gray-200" alt="Current Foto">
                            @endif
                            <div class="relative flex-grow">
                                <input type="file" name="foto" id="foto"
                                       class="block w-full text-sm text-gray-900 file:mr-4 file:py-2.5 file:px-4 file:rounded-lg file:border-0 file:text-sm file:font-semibold {{ $errors->has('foto') ? 'file:bg-red-50 file:text-red-600' : 'file:bg-[#8b9b7e]/10 file:text-[#8b9b7e]' }} hover:file:bg-[#8b9b7e]/20 transition-all duration-200">
                            </div>
                        </div>
                        @error('foto')
                            <p class="mt-2 text-sm text-red-600 flex items-center gap-1">
                                <svg class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 9v3.75m9-.75a9 9 0 11-18 0 9 9 0 0118 0zm-9 3.75h.008v.008H12v-.008z" />
                                </svg>
                                {{ $message }}
                            </p>
                        @enderror
                    </div>

                    <!-- Deskripsi -->
                    <div class="col-span-full">
                        <label for="deskripsi" class="block text-sm font-medium leading-6 text-gray-900">
                            Deskripsi
                        </label>
                        <div class="mt-2 relative">
                            <textarea name="deskripsi" id="deskripsi" rows="5"
                                      class="block w-full rounded-lg border-0 py-3 px-3 text-gray-900 shadow-sm ring-1 ring-inset {{ $errors->has('deskripsi') ? 'ring-red-500 bg-red-50' : 'ring-gray-300' }} placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-[#8b9b7e] sm:text-sm sm:leading-6 transition-all duration-200">{{ old('deskripsi', $artikel->deskripsi) }}</textarea>
                        </div>
                        @error('deskripsi')
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
                <a href="{{ route('admin.artikel.index') }}" 
                   class="rounded-lg px-4 py-2.5 text-sm font-semibold text-gray-700 hover:bg-gray-100 hover:text-gray-900 transition-colors">
                    Cancel
                </a>
                <button type="submit" name="action" value="save_and_add_another"
                        class="rounded-lg bg-white px-4 py-2.5 text-sm font-semibold text-gray-700 shadow-sm ring-1 ring-inset ring-gray-300 hover:bg-gray-50 transition-all transform active:scale-95">
                    Save and Add Another
                </button>
                <button type="submit" 
                        class="rounded-lg bg-[#8b9b7e] px-4 py-2.5 text-sm font-semibold text-white shadow-sm hover:bg-[#7a8a6f] focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-[#8b9b7e] transition-all transform active:scale-95">
                    Update Artikel
                </button>
            </div>
        </div>
    </form>
</div>
@endsection
