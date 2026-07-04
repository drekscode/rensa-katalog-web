@extends('layouts.admin')

@section('content')
<div class="px-4 sm:px-6 lg:px-8 max-w-4xl mx-auto">
    <div class="flex items-center justify-between">
        <div>
            <h1 class="text-2xl font-bold tracking-tight text-white">Survey Request Detail</h1>
            <p class="mt-2 text-sm text-gray-400">Review request details, verify uploaded images, and update status.</p>
        </div>
        <a href="{{ route('admin.survey-request.index') }}" class="bg-gray-800 text-gray-300 rounded-xl px-4 py-2 text-sm font-semibold hover:bg-gray-700 transition">
            Back to List
        </a>
    </div>

    @if(session('success'))
        <div class="mt-4 p-4 bg-green-500/10 border border-green-500/20 text-green-400 rounded-xl text-sm">
            {{ session('success') }}
        </div>
    @endif

    <div class="mt-6 grid grid-cols-1 md:grid-cols-3 gap-6">
        <!-- Survey Details Info -->
        <div class="md:col-span-2 space-y-6">
            <div class="bg-[#252525] rounded-xl border border-white/5 p-6 space-y-4">
                <h3 class="text-lg font-bold text-white border-b border-white/5 pb-3">Client & Room Information</h3>

                <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                    <div>
                        <span class="text-xs text-gray-500 uppercase tracking-wider">Client Name</span>
                        <p class="text-sm font-semibold text-white mt-1">{{ $surveyRequest->nama }}</p>
                    </div>
                    <div>
                        <span class="text-xs text-gray-500 uppercase tracking-wider">Contact Number</span>
                        <p class="text-sm font-semibold text-white mt-1">{{ $surveyRequest->kontak }}</p>
                    </div>
                </div>

                <div>
                    <span class="text-xs text-gray-500 uppercase tracking-wider">Survey Address</span>
                    <p class="text-sm text-gray-300 mt-1 whitespace-pre-line">{{ $surveyRequest->alamat }}</p>
                </div>

                <div>
                    <span class="text-xs text-gray-500 uppercase tracking-wider">Room Description</span>
                    <p class="text-sm text-gray-300 mt-1 whitespace-pre-line bg-[#1e1e1e] p-3 rounded-lg border border-white/5">{{ $surveyRequest->ruangan }}</p>
                </div>
            </div>

            <!-- Supporting Images Gallery -->
            <div class="bg-[#252525] rounded-xl border border-white/5 p-6">
                <h3 class="text-lg font-bold text-white border-b border-white/5 pb-3 mb-4">Supporting Images</h3>
                @if($surveyRequest->images->isNotEmpty())
                    <div class="grid grid-cols-2 gap-4">
                        @foreach($surveyRequest->images as $img)
                            <div class="relative group aspect-square rounded-lg overflow-hidden bg-black/20 border border-white/5 hover:border-white/10 transition">
                                <img src="{{ asset('storage/' . $img->foto) }}" alt="Supporting image" class="h-full w-full object-cover">
                                <a href="{{ asset('storage/' . $img->foto) }}" target="_blank" class="absolute inset-0 bg-black/50 opacity-0 group-hover:opacity-100 flex items-center justify-center text-white text-xs font-semibold transition">
                                    Open Fullscreen
                                </a>
                            </div>
                        @endforeach
                    </div>
                @else
                    <p class="text-sm text-gray-500 text-center py-6">No supporting images uploaded.</p>
                @endif
            </div>
        </div>

        <!-- Request Status Sidebar Control -->
        <div class="space-y-6">
            <div class="bg-[#252525] rounded-xl border border-white/5 p-6 space-y-4">
                <h3 class="text-lg font-bold text-white border-b border-white/5 pb-3">Status Management</h3>

                <div>
                    <span class="text-xs text-gray-500 uppercase tracking-wider">DP Survey</span>
                    <p class="text-lg font-bold text-white mt-1">Rp {{ number_format($surveyRequest->dp_survey, 0, ',', '.') }}</p>
                </div>

                <form action="{{ route('admin.survey-request.update', $surveyRequest->id) }}" method="POST" class="space-y-4 pt-2">
                    @csrf
                    @method('PUT')
                    <div>
                        <label for="status" class="text-xs text-gray-500 uppercase tracking-wider">Change Status</label>
                        <select name="status" id="status" class="w-full bg-[#1e1e1e] border border-gray-700/50 rounded-xl px-4 py-2.5 text-sm text-white focus:outline-none focus:ring-2 focus:ring-[#8b9b7e] mt-1.5">
                            @foreach(['pending' => 'Pending', 'scheduled' => 'Scheduled', 'completed' => 'Completed', 'cancelled' => 'Cancelled'] as $value => $label)
                                <option value="{{ $value }}" {{ $surveyRequest->status == $value ? 'selected' : '' }}>{{ $label }}</option>
                            @endforeach
                        </select>
                    </div>
                    <button type="submit" class="w-full bg-gradient-to-r from-[#8b9b7e] to-[#7a8a6f] text-white rounded-xl py-2.5 text-sm font-semibold hover:shadow-lg transition">
                        Update Status
                    </button>
                </form>
            </div>

            <div class="bg-[#252525] rounded-xl border border-white/5 p-6">
                <h3 class="text-sm font-bold text-red-500 pb-2">Danger Zone</h3>
                <p class="text-xs text-gray-400 mb-4">Deleting this survey request will permanently remove it and all uploaded images from the server.</p>
                <form action="{{ route('admin.survey-request.destroy', $surveyRequest->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to permanently delete this survey request?');">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="w-full bg-red-500/10 border border-red-500/20 text-red-500 rounded-xl py-2.5 text-sm font-semibold hover:bg-red-500 hover:text-white transition">
                        Delete Request
                    </button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
