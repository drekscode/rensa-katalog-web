@extends('layouts.admin')

@section('content')
<div class="px-4 sm:px-6 lg:px-8">
    <div class="sm:flex sm:items-center">
        <div class="sm:flex-auto">
            <h1 class="text-2xl font-bold tracking-tight text-white">Survey Requests</h1>
            <p class="mt-2 text-sm text-gray-400">Manage client survey requests and update execution progress.</p>
        </div>
    </div>

    <!-- Filter & Search -->
    <div class="mt-6 flex flex-col md:flex-row gap-4 justify-between items-center bg-[#252525] p-4 rounded-xl border border-white/5">
        <form method="GET" action="{{ route('admin.survey-request.index') }}" class="w-full flex flex-col sm:flex-row gap-3">
            <div class="flex-1">
                <input type="text" name="search" value="{{ request('search') }}" placeholder="Search by name, contact, or address..."
                       class="w-full bg-[#1e1e1e] border border-gray-700/50 rounded-xl px-4 py-2.5 text-sm text-white placeholder-gray-500 focus:outline-none focus:ring-2 focus:ring-[#8b9b7e]">
            </div>
            <div class="w-full sm:w-48">
                <select name="status" onchange="this.form.submit()"
                        class="w-full bg-[#1e1e1e] border border-gray-700/50 rounded-xl px-4 py-2.5 text-sm text-white focus:outline-none focus:ring-2 focus:ring-[#8b9b7e]">
                    <option value="">All Statuses</option>
                    @foreach(['pending' => 'Pending', 'scheduled' => 'Scheduled', 'completed' => 'Completed', 'cancelled' => 'Cancelled'] as $value => $label)
                        <option value="{{ $value }}" {{ request('status') == $value ? 'selected' : '' }}>{{ $label }}</option>
                    @endforeach
                </select>
            </div>
            <button type="submit" class="bg-gradient-to-r from-[#8b9b7e] to-[#7a8a6f] text-white rounded-xl px-5 py-2.5 text-sm font-semibold hover:shadow-lg transition">
                Search
            </button>
            @if(request()->filled('search') || request()->filled('status'))
                <a href="{{ route('admin.survey-request.index') }}" class="inline-flex justify-center items-center bg-gray-800 text-gray-300 rounded-xl px-5 py-2.5 text-sm font-semibold hover:bg-gray-700">
                    Reset
                </a>
            @endif
        </form>
    </div>

    <!-- Table -->
    <div class="mt-6 bg-[#252525] rounded-xl border border-white/5 overflow-hidden">
        <div class="overflow-x-auto">
            <table class="w-full border-collapse text-left">
                <thead>
                    <tr class="border-b border-white/5 bg-[#2d2d2d] text-xs font-semibold uppercase tracking-wider text-gray-400">
                        <th class="px-6 py-4">Client Name</th>
                        <th class="px-6 py-4">Contact</th>
                        <th class="px-6 py-4">Address</th>
                        <th class="px-6 py-4">DP Survey</th>
                        <th class="px-6 py-4">Status</th>
                        <th class="px-6 py-4">Date</th>
                        <th class="px-6 py-4 text-right">Actions</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-white/5 text-sm text-gray-300">
                    @forelse($surveyRequests as $request)
                        <tr class="hover:bg-white/5 transition-colors">
                            <td class="px-6 py-4 font-semibold text-white">{{ $request->nama }}</td>
                            <td class="px-6 py-4">{{ $request->kontak }}</td>
                            <td class="px-6 py-4 max-w-xs truncate">{{ $request->alamat }}</td>
                            <td class="px-6 py-4">Rp {{ number_format($request->dp_survey, 0, ',', '.') }}</td>
                            <td class="px-6 py-4">
                                @php
                                    $badgeColor = match($request->status) {
                                        'pending' => 'bg-yellow-500/10 text-yellow-400 border border-yellow-500/20',
                                        'scheduled' => 'bg-blue-500/10 text-blue-400 border border-blue-500/20',
                                        'completed' => 'bg-green-500/10 text-green-400 border border-green-500/20',
                                        'cancelled' => 'bg-red-500/10 text-red-400 border border-red-500/20',
                                    };
                                @endphp
                                <span class="inline-flex items-center rounded-md px-2 py-1 text-xs font-medium {{ $badgeColor }}">
                                    {{ ucfirst($request->status) }}
                                </span>
                            </td>
                            <td class="px-6 py-4">{{ $request->created_at->format('d M Y H:i') }}</td>
                            <td class="px-6 py-4 text-right">
                                <div class="flex justify-end gap-3">
                                    <a href="{{ route('admin.survey-request.show', $request->id) }}" class="text-[#8b9b7e] hover:text-white transition text-xs font-semibold">
                                        View Details
                                    </a>
                                    <form action="{{ route('admin.survey-request.destroy', $request->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this survey request?');" class="inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="text-red-500 hover:text-red-400 transition text-xs font-semibold">
                                            Delete
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="7" class="px-6 py-8 text-center text-gray-500">No survey requests found.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
        @if($surveyRequests->hasPages())
            <div class="px-6 py-4 border-t border-white/5">
                {{ $surveyRequests->links() }}
            </div>
        @endif
    </div>
</div>
@endsection
