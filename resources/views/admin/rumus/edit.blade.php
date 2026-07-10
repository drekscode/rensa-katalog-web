@extends('layouts.admin')

@section('title', 'Edit Rumus')
@section('page-title', 'Edit Rumus')

@section('content')
<div class="mx-auto max-w-3xl" x-data="{ 
    selectedRumus: '{{ old('rumus', $rumus->rumus) }}',
    selectedKategori: '{{ old('kategori_id', $rumus->kategori_id) }}',
    allowedRumusMap: {{ Js::from($allowedRumusMap) }},
    allRumus: ['Rumus Batang', 'Rumus Box', 'Rumus M2'],
    rumusLabel(val) {
        return val === 'Rumus M2' ? 'Rumus M²' : val;
    },
    get allowedRumus() {
        if (!this.selectedKategori) return [];
        return this.allowedRumusMap[this.selectedKategori] || this.allRumus;
    },
    isAllowed(rumus) {
        return this.allowedRumus.includes(rumus);
    }
}">
    <form action="{{ route('admin.rumus.update', ['rumus' => $rumus->id]) }}" method="POST" class="space-y-6">
        @csrf
        @method('PUT')

        <div class="overflow-hidden bg-white shadow-sm ring-1 ring-gray-200 rounded-xl">
             <div class="border-b border-gray-100 bg-gray-50/50 px-4 py-4 sm:px-6">
                <h3 class="text-base font-semibold leading-6 text-gray-900">Rumus Details</h3>
                <p class="mt-1 text-sm text-gray-500">Update the formula information below.</p>
            </div>
            <div class="px-4 py-6 sm:p-8">
                <div class="grid max-w-2xl grid-cols-1 gap-x-6 gap-y-8">
                    <!-- Kategori -->
                    <div class="col-span-full">
                        <label for="kategori_id" class="block text-sm font-medium leading-6 text-gray-900">
                            Kategori <span class="text-red-500">*</span>
                        </label>
                        <div class="mt-2 relative">
                            <select id="kategori_id" name="kategori_id" required
                                    x-model="selectedKategori"
                                    @change="selectedRumus = ''"
                                    class="block w-full rounded-lg border-0 py-3 px-3 text-gray-900 shadow-sm ring-1 ring-inset {{ $errors->has('kategori_id') ? 'ring-red-500 bg-red-50' : 'ring-gray-300' }} focus:ring-2 focus:ring-inset focus:ring-[#8b9b7e] sm:text-sm sm:leading-6 transition-all duration-200">
                                <option value="">Select Kategori</option>
                                @foreach($kategoris as $kategori)
                                    <option value="{{ $kategori->id }}" {{ old('kategori_id', $rumus->kategori_id) == $kategori->id ? 'selected' : '' }}>
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

                    <!-- Rumus -->
                    <div class="col-span-full">
                        <label class="block text-sm font-medium leading-6 text-gray-900">
                            Rumus <span class="text-red-500">*</span>
                        </label>

                        <!-- Hint: select kategori first -->
                        <div x-show="!selectedKategori" class="mt-3 rounded-lg border border-dashed border-gray-300 px-4 py-3 text-sm text-gray-400 text-center">
                            Pilih kategori terlebih dahulu untuk melihat rumus yang tersedia.
                        </div>

                        <div x-show="selectedKategori" x-cloak class="mt-3 grid grid-cols-1 sm:grid-cols-3 gap-3">
                            @foreach(['Rumus Batang', 'Rumus Box', 'Rumus M2'] as $rumusOption)
                                <label x-show="isAllowed('{{ $rumusOption }}')"
                                       class="relative flex items-center gap-3 rounded-lg border px-4 py-3 cursor-pointer transition-all"
                                       :class="selectedRumus === '{{ $rumusOption }}' ? 'border-[#8b9b7e] bg-[#8b9b7e]/10 ring-1 ring-[#8b9b7e]' : 'border-gray-300 bg-white hover:border-[#8b9b7e]/50'">
                                    <input type="radio"
                                           name="rumus"
                                           value="{{ $rumusOption }}"
                                           class="h-4 w-4 rounded border-gray-300 text-[#8b9b7e] focus:ring-[#8b9b7e]"
                                           x-model="selectedRumus"
                                           @if($loop->first) required @endif>
                                    <span class="text-sm font-medium text-gray-800" x-text="rumusLabel('{{ $rumusOption }}')"></span>
                                </label>
                            @endforeach
                        </div>
                        @error('rumus')
                            <p class="mt-2 text-sm text-red-600 flex items-center gap-1">
                                <svg class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 9v3.75m9-.75a9 9 0 11-18 0 9 9 0 0118 0zm-9 3.75h.008v.008H12v-.008z" />
                                </svg>
                                {{ $message }}
                            </p>
                        @enderror
                    </div>

                    <!-- Panjang & Lebar (Rumus Batang & Rumus Box) -->
                    <div class="col-span-full" x-show="selectedRumus === 'Rumus Batang' || selectedRumus === 'Rumus Box'" x-cloak>
                        <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                            <div>
                                <label for="panjang" class="block text-sm font-medium leading-6 text-gray-900">
                                    Panjang <span class="text-red-500">*</span>
                                </label>
                                <div class="mt-2 relative">
                                    <input type="number" step="0.01" min="0" name="panjang" id="panjang" value="{{ old('panjang', $rumus->panjang) }}"
                                           :required="selectedRumus === 'Rumus Batang' || selectedRumus === 'Rumus Box'"
                                           class="block w-full rounded-lg border-0 py-3 px-3 text-gray-900 shadow-sm ring-1 ring-inset {{ $errors->has('panjang') ? 'ring-red-500 bg-red-50' : 'ring-gray-300' }} placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-[#8b9b7e] sm:text-sm sm:leading-6 transition-all duration-200">
                                </div>
                                <p class="mt-1 text-xs text-gray-500">Satuan: meter</p>
                                @error('panjang')
                                    <p class="mt-2 text-sm text-red-600 flex items-center gap-1">
                                        <svg class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M12 9v3.75m9-.75a9 9 0 11-18 0 9 9 0 0118 0zm-9 3.75h.008v.008H12v-.008z" />
                                        </svg>
                                        {{ $message }}
                                    </p>
                                @enderror
                            </div>

                            <div>
                                <label for="lebar" class="block text-sm font-medium leading-6 text-gray-900">
                                    Lebar <span class="text-red-500">*</span>
                                </label>
                                <div class="mt-2 relative">
                                    <input type="number" step="0.01" min="0" name="lebar" id="lebar" value="{{ old('lebar', $rumus->lebar) }}"
                                           :required="selectedRumus === 'Rumus Batang' || selectedRumus === 'Rumus Box'"
                                           class="block w-full rounded-lg border-0 py-3 px-3 text-gray-900 shadow-sm ring-1 ring-inset {{ $errors->has('lebar') ? 'ring-red-500 bg-red-50' : 'ring-gray-300' }} placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-[#8b9b7e] sm:text-sm sm:leading-6 transition-all duration-200">
                                </div>
                                <p class="mt-1 text-xs text-gray-500">Satuan: meter</p>
                                @error('lebar')
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

                    <!-- Lembar (Rumus Box Only) -->
                    <div class="col-span-full" x-show="selectedRumus === 'Rumus Box'" x-cloak>
                        <label for="lembar" class="block text-sm font-medium leading-6 text-gray-900">
                            Lembar <span class="text-red-500">*</span>
                        </label>
                        <div class="mt-2 relative">
                            <input type="number" step="1" min="1" name="lembar" id="lembar" value="{{ old('lembar', $rumus->lembar) }}"
                                   :required="selectedRumus === 'Rumus Box'"
                                   class="block w-full rounded-lg border-0 py-3 px-3 text-gray-900 shadow-sm ring-1 ring-inset {{ $errors->has('lembar') ? 'ring-red-500 bg-red-50' : 'ring-gray-300' }} placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-[#8b9b7e] sm:text-sm sm:leading-6 transition-all duration-200">
                        </div>
                        <p class="mt-1 text-xs text-gray-500">Satuan: pcs</p>
                        @error('lembar')
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
                <a href="{{ route('admin.rumus.index') }}" 
                   class="rounded-lg px-4 py-2.5 text-sm font-semibold text-gray-700 hover:bg-gray-100 hover:text-gray-900 transition-colors">
                    Cancel
                </a>
                <button type="submit" name="action" value="save_and_add_another"
                        class="rounded-lg bg-white px-4 py-2.5 text-sm font-semibold text-gray-700 shadow-sm ring-1 ring-inset ring-gray-300 hover:bg-gray-50 transition-all transform active:scale-95">
                    Save and Add Another
                </button>
                <button type="submit" 
                        class="rounded-lg bg-[#8b9b7e] px-4 py-2.5 text-sm font-semibold text-white shadow-sm hover:bg-[#7a8a6f] focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-[#8b9b7e] transition-all transform active:scale-95">
                    Update Rumus
                </button>
            </div>
        </div>
    </form>
</div>
@endsection
