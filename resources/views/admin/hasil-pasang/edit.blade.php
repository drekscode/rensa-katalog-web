@extends('layouts.admin')

@section('title', 'Edit Project')
@section('page-title', 'Edit Project')

@section('content')
<div x-data="{
    images: [
        @foreach($hasilPasang->images as $img)
        {
            id: {{ $img->id }},
            url: '{{ str_starts_with($img->foto, 'data:') || str_starts_with($img->foto, 'http') ? $img->foto : asset('storage/' . $img->foto) }}'
        },
        @endforeach
    ],
    isUploading: false,
    showDeleteModal: false,
    imageIdToDelete: null,
    isDeleting: false,
    confirmDelete(id) {
        this.imageIdToDelete = id;
        this.showDeleteModal = true;
    },
    async executeDelete() {
        if (!this.imageIdToDelete) return;
        this.isDeleting = true;
        try {
            const url = '{{ route('admin.hasil-pasang.delete-image', ':id') }}'.replace(':id', this.imageIdToDelete);
            const response = await fetch(url, {
                method: 'DELETE',
                headers: {
                    'X-CSRF-TOKEN': '{{ csrf_token() }}',
                    'Accept': 'application/json'
                }
            });
            const result = await response.json();
            if (result.success) {
                this.images = this.images.filter(img => img.id !== this.imageIdToDelete);
                this.showDeleteModal = false;
                this.imageIdToDelete = null;
            } else {
                alert('Gagal menghapus gambar: ' + (result.message || 'Error tidak diketahui'));
            }
        } catch (error) {
            console.error(error);
            alert('Terjadi kesalahan saat menghapus gambar');
        } finally {
            this.isDeleting = false;
        }
    },
    async uploadImages(event) {
        const files = Array.from(event.target.files);
        if (files.length === 0) return;
        
        this.isUploading = true;
        
        for (const file of files) {
            const formData = new FormData();
            formData.append('image', file);
            
            try {
                const response = await fetch('{{ route('admin.hasil-pasang.upload-image', $hasilPasang->id) }}', {
                    method: 'POST',
                    headers: {
                        'X-CSRF-TOKEN': '{{ csrf_token() }}',
                        'Accept': 'application/json'
                    },
                    body: formData
                });
                const result = await response.json();
                if (result.success) {
                    this.images.push({
                        id: result.image.id,
                        url: result.image.url
                    });
                } else {
                    alert('Gagal mengunggah ' + file.name + ': ' + (result.message || 'Error tidak diketahui'));
                }
            } catch (error) {
                console.error(error);
                alert('Terjadi kesalahan saat mengunggah ' + file.name);
            }
        }
        
        this.isUploading = false;
        event.target.value = '';
    },
    coverPreview: '{{ $hasilPasang->foto ? (str_starts_with($hasilPasang->foto, 'data:') || str_starts_with($hasilPasang->foto, 'http') ? $hasilPasang->foto : asset('storage/' . $hasilPasang->foto)) : '' }}',
    handleCoverUpload(event) {
        const file = event.target.files[0];
        if (file) {
            this.coverPreview = URL.createObjectURL(file);
        }
    }
}" class="mx-auto max-w-6xl space-y-6">

    <!-- Navigation Header -->
    <div class="flex items-center justify-between bg-white px-5 py-4 rounded-xl border border-gray-200 shadow-sm">
        <div class="flex items-center gap-3">
            <a href="{{ route('admin.hasil-pasang.index') }}" 
               class="inline-flex items-center justify-center p-2 rounded-lg bg-gray-50 border border-gray-200 text-gray-500 hover:text-gray-900 hover:bg-gray-100 transition-all">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M15 19l-7-7 7-7" />
                </svg>
            </a>
            <div>
                <h2 class="text-lg font-bold text-gray-900">Edit Project - {{ $hasilPasang->nama_project }}</h2>
                <p class="text-xs text-gray-500">Edit and configure project details and collage images.</p>
            </div>
        </div>
        <a href="{{ route('admin.hasil-pasang.show', $hasilPasang->id) }}" 
           class="inline-flex items-center gap-1.5 rounded-lg border border-gray-300 bg-white px-4 py-2 text-xs font-semibold text-gray-700 hover:bg-gray-50 transition-all">
            View Details
        </a>
    </div>

    <form action="{{ route('admin.hasil-pasang.update', $hasilPasang->id) }}" method="POST" enctype="multipart/form-data" class="grid grid-cols-1 lg:grid-cols-3 gap-6">
        @csrf
        @method('PUT')

        <!-- Left: Form Inputs & Support Photo Gallery -->
        <div class="lg:col-span-2 space-y-6">
            <div class="overflow-hidden bg-white border border-gray-200 rounded-xl shadow-sm">
                <div class="border-b border-gray-100 bg-gray-50/50 px-6 py-4">
                    <h3 class="text-base font-semibold leading-6 text-gray-900">Project Details</h3>
                    <p class="mt-1 text-sm text-gray-500">Update the primary fields for this project.</p>
                </div>
                <div class="p-6 space-y-6">
                    <!-- Project Name -->
                    <div>
                        <label for="nama_project" class="block text-sm font-semibold text-gray-700">
                            Nama Project <span class="text-red-500">*</span>
                        </label>
                        <div class="mt-2 relative">
                            <input type="text" name="nama_project" id="nama_project" value="{{ old('nama_project', $hasilPasang->nama_project) }}" required
                                   class="block w-full rounded-lg border-0 py-3 px-3 text-gray-900 ring-1 ring-inset {{ $errors->has('nama_project') ? 'ring-red-500 bg-red-50' : 'ring-gray-300' }} placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-[#8b9b7e] sm:text-sm sm:leading-6 transition-all duration-200">
                        </div>
                        @error('nama_project')
                            <p class="mt-2 text-sm text-red-600 flex items-center gap-1">
                                {{ $message }}
                            </p>
                        @enderror
                    </div>

                    <!-- Project ID & Series Row -->
                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-6">
                        <div>
                            <label for="id_project" class="block text-sm font-semibold text-gray-700">
                                ID Project <span class="text-red-500">*</span>
                            </label>
                            <div class="mt-2">
                                <input type="text" name="id_project" id="id_project" value="{{ old('id_project', $hasilPasang->id_project) }}" required
                                       class="block w-full rounded-lg border-0 py-3 px-3 text-gray-900 ring-1 ring-inset {{ $errors->has('id_project') ? 'ring-red-500 bg-red-50' : 'ring-gray-300' }} placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-[#8b9b7e] sm:text-sm sm:leading-6 transition-all duration-200">
                            </div>
                            @error('id_project')
                                <p class="mt-2 text-sm text-red-600">
                                    {{ $message }}
                                </p>
                            @enderror
                        </div>

                        <div>
                            <label for="id_series" class="block text-sm font-semibold text-gray-700">
                                Series <span class="text-red-500">*</span>
                            </label>
                            <div class="mt-2">
                                <select id="id_series" name="id_series" required
                                        class="block w-full rounded-lg border-0 py-3 px-3 text-gray-900 ring-1 ring-inset {{ $errors->has('id_series') ? 'ring-red-500 bg-red-50' : 'ring-gray-300' }} focus:ring-2 focus:ring-inset focus:ring-[#8b9b7e] sm:text-sm sm:leading-6 transition-all">
                                    <option value="">Select Series</option>
                                    @foreach($series as $s)
                                        <option value="{{ $s->id }}" {{ old('id_series', $hasilPasang->id_series) == $s->id ? 'selected' : '' }}>
                                            {{ $s->nama_series }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                            @error('id_series')
                                <p class="mt-2 text-sm text-red-600">
                                    {{ $message }}
                                </p>
                            @enderror
                        </div>
                    </div>

                    <!-- Date Selection -->
                    <div>
                        <label for="tanggal" class="block text-sm font-semibold text-gray-700">
                            Tanggal <span class="text-red-500">*</span>
                        </label>
                        <div class="mt-2">
                            <input type="date" name="tanggal" id="tanggal" value="{{ old('tanggal', $hasilPasang->tanggal) }}" required
                                   class="block w-full rounded-lg border-0 py-3 px-3 text-gray-900 ring-1 ring-inset {{ $errors->has('tanggal') ? 'ring-red-500 bg-red-50' : 'ring-gray-300' }} focus:ring-2 focus:ring-inset focus:ring-[#8b9b7e] sm:text-sm sm:leading-6 transition-all duration-200">
                        </div>
                        @error('tanggal')
                            <p class="mt-2 text-sm text-red-600">
                                {{ $message }}
                            </p>
                        @enderror
                    </div>
                </div>
            </div>

            <!-- Collage Photo Gallery -->
            <div class="bg-white border border-gray-200 rounded-xl shadow-sm p-6">
                <h3 class="text-sm font-bold text-gray-900 uppercase tracking-wider mb-1">Foto Pendukung (Kolase)</h3>
                <p class="text-xs text-gray-500 mb-4">Tambahkan atau hapus foto pendukung untuk galeri kolase project ini secara real-time.</p>
                
                <!-- Gallery Grid -->
                <div class="grid grid-cols-2 sm:grid-cols-3 gap-4 mb-6">
                    <template x-for="img in images" :key="img.id">
                        <div class="relative group aspect-video rounded-xl overflow-hidden border border-gray-200 bg-gray-50 shadow-sm">
                            <img :src="img.url" class="w-full h-full object-cover">
                            
                            <!-- Delete Button Overlay -->
                            <div class="absolute inset-0 bg-black/40 opacity-0 group-hover:opacity-100 transition-opacity duration-200 flex items-center justify-center">
                                <button type="button" @click="confirmDelete(img.id)" 
                                        class="p-2 rounded-full bg-red-600 hover:bg-red-700 text-white shadow-md transition-all duration-200 transform hover:scale-110">
                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                    </svg>
                                </button>
                            </div>
                        </div>
                    </template>
                    
                    <!-- Empty State in Grid if no images -->
                    <template x-if="images.length === 0">
                        <div class="col-span-full py-8 text-center text-gray-400 text-xs bg-gray-50 rounded-xl border border-dashed border-gray-200">
                            Belum ada foto pendukung.
                        </div>
                    </template>
                </div>

                <!-- Dropzone / Upload Section -->
                <div>
                    <div class="relative mt-2 flex justify-center rounded-xl border border-dashed border-gray-300 px-6 py-8 hover:border-[#8b9b7e] transition-all bg-gray-50/50">
                        <div class="text-center">
                            <!-- Spinner/Loading Indicator -->
                            <div x-show="isUploading" class="absolute inset-0 bg-white/80 backdrop-blur-xs flex flex-col items-center justify-center rounded-xl z-10" x-cloak>
                                <svg class="animate-spin h-8 w-8 text-[#8b9b7e] mb-2" fill="none" viewBox="0 0 24 24">
                                    <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                                    <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
                                </svg>
                                <span class="text-xs font-semibold text-gray-600">Mengunggah file...</span>
                            </div>

                            <svg class="mx-auto h-10 w-10 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z" />
                            </svg>
                            <div class="mt-3 flex text-sm leading-6 text-gray-600 justify-center">
                                <label for="images" class="relative cursor-pointer rounded-md bg-white font-semibold text-[#8b9b7e] focus-within:outline-none focus-within:ring-2 focus-within:ring-[#8b9b7e] focus-within:ring-offset-2 hover:text-[#7a8a6f]">
                                    <span>Pilih Gambar</span>
                                    <input type="file" id="images" multiple class="sr-only" @change="uploadImages($event)">
                                </label>
                                <p class="pl-1">atau seret file ke sini</p>
                            </div>
                            <p class="text-xs leading-5 text-gray-500">PNG, JPG, GIF up to 5MB (Bisa memilih beberapa file)</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Right: Cover Image Upload & Primary Actions -->
        <div class="space-y-6">
            <div class="bg-white border border-gray-200 rounded-xl shadow-sm p-6">
                <h3 class="text-sm font-bold text-gray-900 border-b border-gray-100 pb-3 mb-4 uppercase tracking-wider">Cover / Foto Utama</h3>
                
                <div class="space-y-4">
                    <div class="aspect-video w-full rounded-xl overflow-hidden bg-gray-50 border border-gray-200 flex items-center justify-center relative">
                        <template x-if="coverPreview">
                            <img :src="coverPreview" class="w-full h-full object-cover">
                        </template>
                        <template x-if="!coverPreview">
                            <svg class="h-8 w-8 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z" />
                            </svg>
                        </template>
                    </div>

                    <div>
                        <label for="foto" class="relative cursor-pointer rounded-lg bg-white border border-gray-300 px-4 py-2.5 flex items-center justify-center text-sm font-semibold text-gray-700 shadow-sm hover:bg-gray-50 transition-colors">
                            <span>Ganti Foto Utama</span>
                            <input type="file" name="foto" id="foto" class="sr-only" @change="handleCoverUpload($event)">
                        </label>
                    </div>
                </div>
            </div>

            <!-- Publish / Form Controls Card -->
            <div class="bg-white border border-gray-200 rounded-xl shadow-sm p-6 space-y-3">
                <h3 class="text-sm font-bold text-gray-900 border-b border-gray-100 pb-3 uppercase tracking-wider">Aksi Form</h3>
                <button type="submit" 
                        class="w-full rounded-lg bg-[#8b9b7e] py-3 text-sm font-semibold text-white shadow-sm hover:bg-[#7a8a6f] focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-[#8b9b7e] transition-all transform active:scale-[0.98]">
                    Update Project
                </button>
                <button type="submit" name="action" value="save_and_add_another"
                        class="w-full rounded-lg bg-white border border-gray-200 py-3 text-sm font-semibold text-gray-700 shadow-sm hover:bg-gray-50 transition-all transform active:scale-[0.98]">
                    Save and Add Another
                </button>
                <a href="{{ route('admin.hasil-pasang.index') }}" 
                   class="block w-full text-center rounded-lg bg-gray-50 py-3 text-sm font-semibold text-gray-600 hover:bg-gray-100 hover:text-gray-900 transition-colors border border-gray-200">
                    Batal
                </a>
            </div>
        </div>
    </form>

    <!-- Delete Confirmation Modal -->
    <template x-teleport="body">
        <div x-show="showDeleteModal" 
             x-effect="document.body.classList.toggle('overflow-hidden', showDeleteModal)"
             class="fixed inset-0 z-[300] flex items-center justify-center p-4" 
             aria-labelledby="modal-title" 
             role="dialog" 
             aria-modal="true" 
             x-cloak>
            <!-- Background overlay -->
            <div x-show="showDeleteModal" 
                 x-transition:enter="ease-out duration-300"
                 x-transition:enter-start="opacity-0"
                 x-transition:enter-end="opacity-100"
                 x-transition:leave="ease-in duration-200"
                 x-transition:leave-start="opacity-100"
                 x-transition:leave-end="opacity-0"
                 class="fixed inset-0 bg-gray-900/50 backdrop-blur-sm transition-opacity" 
                 @click="showDeleteModal = false"
                 aria-hidden="true"></div>

            <!-- Modal panel -->
            <div x-show="showDeleteModal" 
                 x-transition:enter="ease-out duration-300"
                 x-transition:enter-start="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95"
                 x-transition:enter-end="opacity-100 translate-y-0 sm:scale-100"
                 x-transition:leave="ease-in duration-200"
                 x-transition:leave-start="opacity-100 translate-y-0 sm:scale-100"
                 x-transition:leave-end="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95"
                 class="relative transform overflow-hidden rounded-2xl bg-white text-left shadow-2xl transition-all sm:my-8 sm:w-full sm:max-w-lg border border-gray-100 z-10">
                
                <div class="bg-white px-4 pb-4 pt-5 sm:p-6 sm:pb-4">
                    <div class="sm:flex sm:items-start">
                        <div class="mx-auto flex h-12 w-12 flex-shrink-0 items-center justify-center rounded-full bg-red-100 sm:mx-0 sm:h-10 sm:w-10 border border-red-200">
                            <svg class="h-6 w-6 text-red-600" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M12 9v3.75m-9.303 3.376c-.866 1.5.217 3.374 1.948 3.374h14.71c1.73 0 2.813-1.874 1.948-3.374L13.949 3.378c-.866-1.5-3.032-1.5-3.898 0L2.697 16.126zM12 15.75h.007v.008H12v-.008z" />
                            </svg>
                        </div>
                        <div class="mt-3 text-center sm:ml-4 sm:mt-0 sm:text-left">
                            <h3 class="text-lg font-bold leading-6 text-gray-900" id="modal-title">Hapus Foto Pendukung</h3>
                            <div class="mt-2">
                                <p class="text-sm text-gray-500">Apakah Anda yakin ingin menghapus foto pendukung ini? Tindakan ini akan menghapus file secara permanen dari server dan tidak dapat dibatalkan.</p>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="bg-gray-50 px-4 py-3 sm:flex sm:flex-row-reverse sm:px-6 gap-3">
                    <button type="button" @click="executeDelete()" :disabled="isDeleting"
                            class="inline-flex w-full justify-center rounded-lg bg-red-600 px-4 py-2.5 text-sm font-semibold text-white shadow-sm hover:bg-red-500 sm:w-auto transition-colors disabled:opacity-50">
                        <template x-if="isDeleting">
                            <span>Menghapus...</span>
                        </template>
                        <template x-if="!isDeleting">
                            <span>Hapus Permanen</span>
                        </template>
                    </button>
                    <button type="button" @click="showDeleteModal = false" :disabled="isDeleting"
                            class="mt-3 inline-flex w-full justify-center rounded-lg bg-white px-4 py-2.5 text-sm font-semibold text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 hover:bg-gray-50 sm:mt-0 sm:w-auto transition-colors disabled:opacity-50">
                        Batal
                    </button>
                </div>
            </div>
        </div>
    </template>
</div>
@endsection
