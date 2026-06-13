@extends('layouts.admin')

@section('title', 'Create Tutorial Gambar')
@section('page-title', 'Create Tutorial Gambar')

@section('content')
<div class="mx-auto max-w-4xl" x-data="tutorialForm()">
    <form action="{{ route('admin.tutorial-gambar.store') }}" method="POST" enctype="multipart/form-data" class="space-y-6">
        @csrf

        <!-- Common Category Selection -->
        <div class="overflow-hidden bg-white shadow-sm ring-1 ring-gray-200 rounded-xl">
            <div class="border-b border-gray-100 bg-gray-50/50 px-4 py-4 sm:px-6">
                <h3 class="text-base font-semibold leading-6 text-gray-900">1. Select Category</h3>
                <p class="mt-1 text-sm text-gray-500">Choose the category for these tutorial steps.</p>
            </div>
            <div class="px-4 py-6 sm:p-8">
                <div class="max-w-xl">
                    <label for="kategori_id" class="block text-sm font-medium leading-6 text-gray-900">
                        Kategori <span class="text-red-500">*</span>
                    </label>
                    <div class="mt-2 relative">
                        <select id="kategori_id" name="kategori_id" required
                                class="block w-full rounded-lg border-0 py-3 px-3 text-gray-900 shadow-sm ring-1 ring-inset {{ $errors->has('kategori_id') ? 'ring-red-500 bg-red-50' : 'ring-gray-300' }} focus:ring-2 focus:ring-inset focus:ring-[#8b9b7e] sm:text-sm sm:leading-6 transition-all duration-200">
                            <option value="">Select Kategori</option>
                            @foreach($kategoris as $kategori)
                                <option value="{{ $kategori->id }}" {{ old('kategori_id') == $kategori->id ? 'selected' : '' }}>
                                    {{ $kategori->nama_kategori }}
                                </option>
                            @endforeach
                        </select>
                        @error('kategori_id')
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
        </div>

        <!-- Dynamic Steps Section -->
        <div class="overflow-hidden bg-white shadow-sm ring-1 ring-gray-200 rounded-xl">
            <div class="border-b border-gray-100 bg-gray-50/50 px-4 py-4 sm:px-6 flex items-center justify-between">
                <div>
                    <h3 class="text-base font-semibold leading-6 text-gray-900">2. Tutorial Steps</h3>
                    <p class="mt-1 text-sm text-gray-500">Add steps for this tutorial. Auto-order is enabled by default.</p>
                </div>
                <button type="button" @click="addStep()"
                        class="inline-flex items-center gap-1.5 rounded-lg bg-[#8b9b7e]/10 px-3 py-2 text-sm font-semibold text-[#8b9b7e] hover:bg-[#8b9b7e]/20 transition-all">
                    <svg class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M12 4.5v15m7.5-7.5h-15" />
                    </svg>
                    Add Step
                </button>
            </div>
            
            <div class="px-4 py-6 sm:p-8 space-y-6">
                <template x-for="(step, index) in steps" :key="step.id">
                    <div class="relative rounded-xl border border-gray-200 bg-gray-50/30 p-4 transition-all hover:bg-white hover:shadow-md hover:border-gray-300 group">
                        <!-- Step Header -->
                        <div class="absolute top-4 left-4 flex items-center justify-center w-8 h-8 rounded-full bg-[#8b9b7e] text-white font-bold text-sm shadow-sm z-10">
                            <span x-text="index + 1"></span>
                        </div>

                        <div class="absolute top-2 right-2 opacity-100 sm:opacity-0 group-hover:opacity-100 transition-opacity">
                            <button type="button" @click="removeStep(index)" 
                                    class="p-1.5 text-gray-400 hover:text-red-500 hover:bg-red-50 rounded-lg transition-colors"
                                    title="Remove Step"
                                    x-show="steps.length > 1">
                                <svg class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                                </svg>
                            </button>
                        </div>

                        <div class="ml-12 grid grid-cols-1 md:grid-cols-2 gap-6">
                            <!-- Left Column: Image -->
                            <div class="space-y-4">
                                <div>
                                    <label class="block text-xs font-bold text-gray-500 uppercase tracking-wider mb-2">Image <span class="text-red-500">*</span></label>
                                    <div class="relative group/image">
                                        <div class="aspect-video w-full rounded-lg border-2 border-dashed border-gray-300 bg-white flex items-center justify-center overflow-hidden hover:border-[#8b9b7e] transition-colors relative">
                                            <template x-if="step.imagePreview">
                                                <img :src="step.imagePreview" class="w-full h-full object-cover">
                                            </template>
                                            <template x-if="!step.imagePreview">
                                                <div class="text-center p-4">
                                                    <svg class="mx-auto h-8 w-8 text-gray-400" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                                                        <path stroke-linecap="round" stroke-linejoin="round" d="M2.25 15.75l5.159-5.159a2.25 2.25 0 013.182 0l5.159 5.159m-1.5-1.5l1.409-1.409a2.25 2.25 0 013.182 0l2.909 2.909m-18 3.75h16.5a1.5 1.5 0 001.5-1.5V6a1.5 1.5 0 00-1.5-1.5H3.75A1.5 1.5 0 002.25 6v12a1.5 1.5 0 001.5 1.5zm10.5-11.25h.008v.008h-.008V8.25zm.375 0a.375.375 0 11-.75 0 .375.375 0 01.75 0z" />
                                                    </svg>
                                                    <p class="mt-1 text-xs text-gray-500">Click to upload</p>
                                                    <p class="mt-1 text-[10px] text-gray-400">PNG, JPG, GIF, WEBP up to 2MB</p>
                                                </div>
                                            </template>
                                            <input type="file" 
                                                   :name="'items[' + index + '][gambar]'" 
                                                   required
                                                   accept="image/*"
                                                   @change="handleImageUpload($event, index)"
                                                   class="absolute inset-0 w-full h-full opacity-0 cursor-pointer">
                                        </div>
                                    </div>
                                    <!-- Error for Image -->
                                    @foreach($errors->get('items.*.gambar') as $key => $message)
                                        <template x-if="'items.' + index + '.gambar' === '{{ $key }}'">
                                            <p class="mt-1 text-xs text-red-600">{{ $message[0] }}</p>
                                        </template>
                                    @endforeach
                                </div>
                            </div>

                            <!-- Right Column: Details -->
                            <div class="space-y-4">
                                <!-- Judul -->
                                <div>
                                    <label class="block text-xs font-bold text-gray-500 uppercase tracking-wider mb-1">Title <span class="text-red-500">*</span></label>
                                    <input type="text" 
                                           :name="'items[' + index + '][judul]'" 
                                           x-model="step.judul"
                                           placeholder="e.g. Step 1: Preparation"
                                           required
                                           class="block w-full rounded-lg border-0 py-2 px-3 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-[#8b9b7e] sm:text-sm sm:leading-6">
                                </div>

                                <!-- Deskripsi -->
                                <div>
                                    <label class="block text-xs font-bold text-gray-500 uppercase tracking-wider mb-1">Description</label>
                                    <textarea :name="'items[' + index + '][deskripsi]'" 
                                              x-model="step.deskripsi"
                                              rows="3"
                                              placeholder="Explain this step..."
                                              class="block w-full rounded-lg border-0 py-2 px-3 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-[#8b9b7e] sm:text-sm sm:leading-6"></textarea>
                                </div>

                                <!-- Urutan -->
                                <div>
                                    <label class="block text-xs font-bold text-gray-500 uppercase tracking-wider mb-1">Order</label>
                                    <div class="relative">
                                        <input type="number" 
                                               :name="'items[' + index + '][urutan]'" 
                                               x-model="step.urutan"
                                               min="1"
                                               placeholder="Auto"
                                               class="block w-full rounded-lg border-0 py-2 px-3 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-[#8b9b7e] sm:text-sm sm:leading-6">
                                    </div>
                                    <p class="mt-1 text-[10px] text-gray-400">Leave empty for auto-order</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </template>
            </div>
            
            <!-- Empty State / Add Button Backup -->
            <div x-show="steps.length === 0" class="px-4 py-8 text-center" style="display: none;">
                <button type="button" @click="addStep()" class="text-sm font-semibold text-[#8b9b7e] hover:underline">Add your first step</button>
            </div>
        </div>

        <!-- Action Buttons -->
        <div class="flex items-center justify-end gap-x-4 border-t border-gray-100 bg-white shadow-sm ring-1 ring-gray-200 rounded-xl px-4 py-4 sm:px-6 sticky bottom-4 z-20">
            <a href="{{ route('admin.tutorial-gambar.index') }}" 
               class="rounded-lg px-4 py-2.5 text-sm font-semibold text-gray-700 hover:bg-gray-100 hover:text-gray-900 transition-colors">
                Cancel
            </a>
            <button type="submit" name="action" value="save_and_add_another"
                    class="rounded-lg bg-white px-4 py-2.5 text-sm font-semibold text-gray-700 shadow-sm ring-1 ring-inset ring-gray-300 hover:bg-gray-50 transition-all transform active:scale-95">
                Save & Add More
            </button>
            <button type="submit" 
                    class="rounded-lg bg-[#8b9b7e] px-4 py-2.5 text-sm font-semibold text-white shadow-sm hover:bg-[#7a8a6f] focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-[#8b9b7e] transition-all transform active:scale-95">
                Save All Steps
            </button>
        </div>
    </form>
</div>

@push('scripts')
<script>
    document.addEventListener('alpine:init', () => {
        Alpine.data('tutorialForm', () => ({
            steps: [
                { id: Date.now(), judul: '', deskripsi: '', urutan: '', imagePreview: null }
            ],
            
            addStep() {
                this.steps.push({
                    id: Date.now(),
                    judul: '',
                    deskripsi: '',
                    urutan: '',
                    imagePreview: null
                });
            },
            
            removeStep(index) {
                if (this.steps.length > 1) {
                    this.steps.splice(index, 1);
                }
            },
            
            handleImageUpload(event, index) {
                const file = event.target.files[0];
                if (file) {
                    const reader = new FileReader();
                    reader.onload = (e) => {
                        this.steps[index].imagePreview = e.target.result;
                    };
                    reader.readAsDataURL(file);
                }
            }
        }));
    });
</script>
@endpush
@endsection
