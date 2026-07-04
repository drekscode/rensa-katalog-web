@extends('layouts.admin')

@section('title', 'Survey Request Detail')
@section('page-title', 'Survey Request Detail')

@section('content')
<div class="mx-auto max-w-6xl space-y-8 px-4 sm:px-6 lg:px-8 py-8">
    <!-- Header with Quick Action Controls (Double Bezel Card) -->
    <div class="p-2 bg-gray-100/70 border border-gray-200/50 rounded-[28px] shadow-sm">
        <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-6 bg-white p-6 rounded-[20px] border border-gray-100 shadow-[inset_0_1px_1px_rgba(255,255,255,0.8)]">
            <div class="flex items-center gap-4">
                <a href="{{ route('admin.survey-request.index') }}"
                   class="inline-flex items-center justify-center w-10 h-10 rounded-xl bg-gray-50 border border-gray-200 text-gray-500 hover:text-gray-900 hover:bg-gray-100 transition-all duration-300">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M15 19l-7-7 7-7" />
                    </svg>
                </a>
                <div>
                    <div class="flex items-center gap-2">
                        <span class="text-[10px] text-gray-400 font-bold uppercase tracking-[0.2em]">Survey Request #{{ $surveyRequest->id }}</span>
                    </div>
                    <h2 class="text-2xl font-extrabold text-gray-900 mt-1 leading-tight">{{ $surveyRequest->nama }}</h2>
                </div>
            </div>
            <div class="flex gap-3">
                @php
                    $badgeColor = match($surveyRequest->status) {
                        'pending' => 'bg-yellow-50 text-yellow-800 ring-1 ring-inset ring-yellow-600/15',
                        'scheduled' => 'bg-blue-50 text-blue-800 ring-1 ring-inset ring-blue-600/15',
                        'completed' => 'bg-green-50 text-green-800 ring-1 ring-inset ring-green-600/15',
                        'cancelled' => 'bg-red-50 text-red-800 ring-1 ring-inset ring-red-600/15',
                    };
                @endphp
                <span class="inline-flex items-center rounded-xl px-4 py-2.5 text-xs font-bold uppercase tracking-[0.15em] {{ $badgeColor }}">
                    Status: {{ $surveyRequest->status }}
                </span>
            </div>
        </div>
    </div>

    @if(session('success'))
        <div class="p-4 bg-green-50 border border-green-200 text-green-700 rounded-xl text-sm font-semibold">
            {{ session('success') }}
        </div>
    @endif

    <!-- Main Content Layout (3 Columns Grid) -->
    <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">

        <!-- Left Column: Specs Details -->
        <div class="space-y-8">
            <!-- Details Sheet (Double Bezel) -->
            <div class="p-2 bg-gray-100/70 border border-gray-200/50 rounded-[28px] shadow-sm">
                <div class="bg-white rounded-[20px] border border-gray-100 shadow-[inset_0_1px_1px_rgba(255,255,255,0.8)] p-6 space-y-6">
                    <h3 class="text-xs font-bold text-gray-400 uppercase tracking-[0.2em] border-b border-gray-100 pb-3 flex items-center gap-2">
                        <svg class="w-4 h-4 text-gray-500" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10" />
                        </svg>
                        Informasi Survey
                    </h3>

                    <div class="space-y-5 text-sm">
                        <!-- Client Name -->
                        <div class="flex items-start gap-3">
                            <div class="w-8 h-8 rounded-lg bg-gray-50 text-gray-500 flex items-center justify-center flex-shrink-0">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                                </svg>
                            </div>
                            <div>
                                <span class="text-[10px] text-gray-400 font-bold uppercase tracking-wider block">Client Name</span>
                                <span class="text-sm font-bold text-gray-805">{{ $surveyRequest->nama }}</span>
                            </div>
                        </div>

                        <!-- Contact Number -->
                        <div class="flex items-center gap-3">
                            <div class="w-8 h-8 rounded-lg bg-gray-50 text-gray-550 flex items-center justify-center flex-shrink-0">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.94.725l.548 2.2a1 1 0 01-.321.988l-1.305.98a10.582 10.582 0 004.872 4.872l.98-1.305a1 1 0 01.988-.321l2.2.548a1 1 0 01.725.94V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z" />
                                </svg>
                            </div>
                            <div>
                                <span class="text-[10px] text-gray-400 font-bold uppercase tracking-wider block">Contact Number</span>
                                <span class="text-sm font-bold text-gray-805">{{ $surveyRequest->kontak }}</span>
                            </div>
                        </div>

                        <!-- DP Survey -->
                        <div class="flex items-center gap-3">
                            <div class="w-8 h-8 rounded-lg bg-[#8b9b7e]/10 text-[#8b9b7e] flex items-center justify-center flex-shrink-0">
                                <span class="text-xs font-bold">Rp</span>
                            </div>
                            <div>
                                <span class="text-[10px] text-gray-400 font-bold uppercase tracking-wider block">DP Survey</span>
                                <span class="text-sm font-bold text-gray-805">Rp {{ number_format($surveyRequest->dp_survey, 0, ',', '.') }}</span>
                            </div>
                        </div>

                        <!-- Date -->
                        <div class="flex items-center gap-3">
                            <div class="w-8 h-8 rounded-lg bg-amber-50 text-amber-600 flex items-center justify-center flex-shrink-0">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                                </svg>
                            </div>
                            <div>
                                <span class="text-[10px] text-gray-400 font-bold uppercase tracking-wider block">Request Date</span>
                                <span class="text-sm font-bold text-gray-805">{{ $surveyRequest->created_at->translatedFormat('d F Y H:i') }}</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Address and Room description (Double Bezel) -->
            <div class="p-2 bg-gray-100/70 border border-gray-200/50 rounded-[28px] shadow-sm">
                <div class="bg-white rounded-[20px] border border-gray-100 shadow-[inset_0_1px_1px_rgba(255,255,255,0.8)] p-6 space-y-6">
                    <div>
                        <span class="text-xs font-bold text-gray-400 uppercase tracking-[0.2em] block mb-2">Survey Address</span>
                        <p class="text-sm text-gray-700 whitespace-pre-line leading-relaxed font-medium">{{ $surveyRequest->alamat }}</p>
                    </div>
                    <div class="border-t border-gray-100 pt-4">
                        <span class="text-xs font-bold text-gray-400 uppercase tracking-[0.2em] block mb-3">Room Description</span>
                        <div class="text-xs text-gray-700 whitespace-pre-line bg-gray-50 p-4 rounded-xl border border-gray-100 leading-relaxed font-medium">{{ $surveyRequest->ruangan }}</div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Right Column: Images Grid & Status Control -->
        <div class="lg:col-span-2 space-y-8">
            <!-- Status Update Controller (Double Bezel) -->
            <div class="p-2 bg-gray-100/70 border border-gray-200/50 rounded-[28px] shadow-sm">
                <div class="bg-white rounded-[20px] border border-gray-100 shadow-[inset_0_1px_1px_rgba(255,255,255,0.8)] p-6 space-y-4">
                    <h3 class="text-xs font-bold text-gray-400 uppercase tracking-[0.2em] border-b border-gray-100 pb-3">
                        Status Control
                    </h3>
                    <form action="{{ route('admin.survey-request.update', $surveyRequest->id) }}" method="POST" class="space-y-4">
                        @csrf
                        @method('PUT')
                        <div>
                            <label for="status" class="text-xs font-bold text-gray-400 uppercase tracking-wider block mb-2">Change Status</label>
                            <select name="status" id="status" class="block w-full rounded-xl border-0 py-2.5 px-3 text-gray-900 ring-1 ring-inset ring-gray-200 focus:ring-2 focus:ring-inset focus:ring-[#8b9b7e] sm:text-sm sm:leading-6">
                                @foreach(['pending' => 'Pending', 'scheduled' => 'Scheduled', 'completed' => 'Completed', 'cancelled' => 'Cancelled'] as $value => $label)
                                    <option value="{{ $value }}" {{ $surveyRequest->status == $value ? 'selected' : '' }}>{{ $label }}</option>
                                @endforeach
                            </select>
                        </div>
                        <button type="submit" class="w-full inline-flex items-center justify-center gap-2 rounded-xl bg-[#8b9b7e] px-4 py-3 text-sm font-bold text-white shadow-sm hover:bg-[#7a8a6f] transition-all transform active:scale-98">
                            Update Status
                        </button>
                    </form>
                </div>
            </div>

            <!-- Supporting Images (Double Bezel) -->
            <div class="p-2 bg-gray-100/70 border border-gray-200/50 rounded-[28px] shadow-sm">
                <div class="bg-white rounded-[20px] border border-gray-100 shadow-[inset_0_1px_1px_rgba(255,255,255,0.8)] p-6">
                    <div class="flex items-center justify-between border-b border-gray-100 pb-3 mb-6">
                        <h3 class="text-xs font-bold text-gray-400 uppercase tracking-[0.2em]">
                            Supporting Images
                        </h3>
                        <span class="text-xs font-bold text-[#8b9b7e] bg-[#8b9b7e]/10 px-2.5 py-1 rounded-full uppercase tracking-wider">
                            {{ $surveyRequest->images->count() }} Images
                        </span>
                    </div>

                    @if($surveyRequest->images->isNotEmpty())
                        <!-- Bento Grid Collage for Supporting Images -->
                        <div x-data class="grid grid-cols-2 gap-3 auto-rows-[130px] sm:auto-rows-[160px]">
                            @foreach($surveyRequest->images as $index => $img)
                                @php
                                    $imgUrl = asset('storage/' . $img->foto);
                                    $spanClass = 'col-span-1 row-span-1';
                                    if ($index === 0) {
                                        $spanClass = 'col-span-2 row-span-2';
                                    }
                                @endphp
                                <!-- Double Bezel Image Container -->
                                <div class="p-1 bg-gray-50 border border-gray-200/50 rounded-2xl shadow-sm hover:border-[#8b9b7e]/30 transition-all duration-500 ease-[cubic-bezier(0.32,0.72,0,1)] group {{ $spanClass }}">
                                    <div class="rounded-xl overflow-hidden bg-white w-full h-full relative cursor-zoom-in">
                                        <img src="{{ $imgUrl }}"
                                             @click="$dispatch('open-lightbox', { url: '{{ $imgUrl }}' })"
                                             class="w-full h-full object-cover hover:scale-102 transition duration-500">
                                        <div class="absolute inset-0 bg-black/10 group-hover:bg-black/0 transition-colors pointer-events-none"></div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    @else
                        <div class="flex flex-col items-center justify-center py-12 bg-gray-50/50 rounded-xl border border-dashed border-gray-200">
                            <svg class="h-10 w-10 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z" />
                            </svg>
                            <p class="mt-2 text-xs text-gray-400 font-bold uppercase tracking-wider">No supporting images.</p>
                        </div>
                    @endif
                </div>
            </div>

            <!-- Danger Zone (Double Bezel) -->
            <div class="p-2 bg-gray-100/70 border border-gray-200/50 rounded-[28px] shadow-sm">
                <div class="bg-white rounded-[20px] border border-gray-100 shadow-[inset_0_1px_1px_rgba(255,255,255,0.8)] p-6 space-y-4">
                    <h3 class="text-sm font-bold text-red-600 border-b border-red-50 pb-2">Danger Zone</h3>
                    <p class="text-xs text-gray-500 leading-relaxed font-medium">Deleting this survey request will permanently remove it and all uploaded images from the server.</p>
                    <button type="button"
                            @click="$dispatch('confirm-delete', {
                                title: 'Delete Survey Request?',
                                message: 'Are you sure you want to delete \'{{ addslashes($surveyRequest->nama) }}\'\'s request? This action cannot be undone.',
                                formId: 'delete-form-{{ $surveyRequest->id }}'
                            })"
                            class="w-full inline-flex justify-center items-center px-4 py-3 rounded-xl border border-red-200 bg-red-50 text-red-600 hover:bg-red-100 transition text-sm font-bold">
                        Delete Request
                    </button>
                    <form action="{{ route('admin.survey-request.destroy', $surveyRequest->id) }}"
                          method="POST"
                          id="delete-form-{{ $surveyRequest->id }}"
                          class="hidden">
                        @csrf
                        @method('DELETE')
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
