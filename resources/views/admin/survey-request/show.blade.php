@extends('layouts.admin')

@section('title', 'Survey Request Detail')
@section('page-title', 'Survey Request Detail')

@section('content')
<div class="mx-auto max-w-4xl">
    <div class="flex items-center justify-between mb-8">
        <div>
            <h2 class="text-lg font-semibold text-gray-900">Survey Request Detail</h2>
            <p class="text-sm text-gray-500">Review request details, verify uploaded images, and update status.</p>
        </div>
        <a href="{{ route('admin.survey-request.index') }}" class="inline-flex items-center justify-center gap-2 rounded-xl bg-white border border-gray-300 px-4 py-2.5 text-sm font-semibold text-gray-700 shadow-sm hover:bg-gray-50 transition-all transform hover:-translate-y-0.5 active:translate-y-0">
            Back to List
        </a>
    </div>

    @if(session('success'))
        <div class="mb-6 p-4 bg-green-50/50 border border-green-200 text-green-700 rounded-xl text-sm font-semibold">
            {{ session('success') }}
        </div>
    @endif

    <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
        <!-- Survey Details Info -->
        <div class="md:col-span-2 space-y-6">
            <div class="bg-white rounded-xl shadow-lg shadow-gray-200/50 ring-1 ring-gray-200 p-6 space-y-6">
                <h3 class="text-lg font-bold text-gray-900 border-b border-gray-100 pb-3">Client & Room Information</h3>

                <div class="grid grid-cols-1 sm:grid-cols-2 gap-6">
                    <div>
                        <span class="text-xs font-bold text-gray-400 uppercase tracking-wider">Client Name</span>
                        <p class="text-sm font-semibold text-gray-950 mt-1">{{ $surveyRequest->nama }}</p>
                    </div>
                    <div>
                        <span class="text-xs font-bold text-gray-400 uppercase tracking-wider">Contact Number</span>
                        <p class="text-sm font-semibold text-gray-955 mt-1">{{ $surveyRequest->kontak }}</p>
                    </div>
                </div>

                <div>
                    <span class="text-xs font-bold text-gray-400 uppercase tracking-wider">Survey Address</span>
                    <p class="text-sm text-gray-700 mt-1 whitespace-pre-line leading-relaxed">{{ $surveyRequest->alamat }}</p>
                </div>

                <div>
                    <span class="text-xs font-bold text-gray-400 uppercase tracking-wider">Room Description</span>
                    <div class="text-sm text-gray-700 mt-2 whitespace-pre-line bg-gray-50 p-4 rounded-xl border border-gray-100 leading-relaxed">{{ $surveyRequest->ruangan }}</div>
                </div>
            </div>

            <!-- Supporting Images Gallery -->
            <div class="bg-white rounded-xl shadow-lg shadow-gray-200/50 ring-1 ring-gray-200 p-6">
                <h3 class="text-lg font-bold text-gray-900 border-b border-gray-100 pb-3 mb-6">Supporting Images</h3>
                @if($surveyRequest->images->isNotEmpty())
                    <div class="grid grid-cols-2 gap-4">
                        @foreach($surveyRequest->images as $img)
                            <div class="relative group aspect-square rounded-xl overflow-hidden bg-gray-50 border border-gray-200 hover:border-[#8b9b7e] transition cursor-zoom-in"
                                 @click="$dispatch('open-lightbox', { url: '{{ asset('storage/' . $img->foto) }}' })">
                                <img src="{{ asset('storage/' . $img->foto) }}" alt="Supporting image" class="h-full w-full object-cover group-hover:scale-102 transition duration-300">
                                <div class="absolute inset-0 bg-black/40 opacity-0 group-hover:opacity-100 flex items-center justify-center text-white text-xs font-semibold transition">
                                    Click to Expand
                                </div>
                            </div>
                        @endforeach
                    </div>
                @else
                    <p class="text-sm text-gray-400 text-center py-8 bg-gray-50/50 border border-dashed border-gray-200 rounded-xl">No supporting images uploaded.</p>
                @endif
            </div>
        </div>

        <!-- Request Status Sidebar Control -->
        <div class="space-y-6">
            <div class="bg-white rounded-xl shadow-lg shadow-gray-200/50 ring-1 ring-gray-200 p-6 space-y-6">
                <h3 class="text-lg font-bold text-gray-900 border-b border-gray-100 pb-3">Status Management</h3>

                <div>
                    <span class="text-xs font-bold text-gray-400 uppercase tracking-wider">DP Survey</span>
                    <p class="text-xl font-bold text-gray-950 mt-1">Rp {{ number_format($surveyRequest->dp_survey, 0, ',', '.') }}</p>
                </div>

                <form action="{{ route('admin.survey-request.update', $surveyRequest->id) }}" method="POST" class="space-y-4 pt-2">
                    @csrf
                    @method('PUT')
                    <div>
                        <label for="status" class="text-xs font-bold text-gray-400 uppercase tracking-wider">Change Status</label>
                        <select name="status" id="status" class="block w-full rounded-xl border-0 py-2.5 px-3 text-gray-900 ring-1 ring-inset ring-gray-200 focus:ring-2 focus:ring-inset focus:ring-[#8b9b7e] sm:text-sm sm:leading-6 mt-2">
                            @foreach(['pending' => 'Pending', 'scheduled' => 'Scheduled', 'completed' => 'Completed', 'cancelled' => 'Cancelled'] as $value => $label)
                                <option value="{{ $value }}" {{ $surveyRequest->status == $value ? 'selected' : '' }}>{{ $label }}</option>
                            @endforeach
                        </select>
                    </div>
                    <button type="submit" class="w-full inline-flex items-center justify-center gap-2 rounded-xl bg-[#8b9b7e] px-4 py-2.5 text-sm font-semibold text-white shadow-sm hover:bg-[#7a8a6f] transition-all transform active:scale-98">
                        Update Status
                    </button>
                </form>
            </div>

            <div class="bg-white rounded-xl shadow-lg shadow-gray-200/50 ring-1 ring-gray-200 p-6">
                <h3 class="text-sm font-bold text-red-600 border-b border-red-50 pb-2">Danger Zone</h3>
                <p class="text-xs text-gray-500 my-4 leading-relaxed">Deleting this survey request will permanently remove it and all uploaded images from the server.</p>
                <button type="button"
                        @click="$dispatch('confirm-delete', {
                            title: 'Delete Survey Request?',
                            message: 'Are you sure you want to delete \'{{ addslashes($surveyRequest->nama) }}\'\'s request? This action cannot be undone.',
                            formId: 'delete-form-{{ $surveyRequest->id }}'
                        })"
                        class="w-full inline-flex justify-center items-center px-4 py-2.5 rounded-xl border border-red-200 bg-red-50 text-red-600 hover:bg-red-100 transition text-sm font-semibold">
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
@endsection
