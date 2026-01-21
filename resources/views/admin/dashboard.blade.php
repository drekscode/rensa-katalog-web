@extends('layouts.admin')

@section('title', 'Dashboard')
@section('page-title', 'Dashboard Overview')

@section('content')
<div class="space-y-8 animate-in fade-in duration-500">
    <!-- Alerts Section -->
    @if($empty_kategoris->count() > 0)
    <div class="rounded-xl bg-amber-50 border border-amber-100 p-4 mb-6">
        <div class="flex">
            <div class="flex-shrink-0">
                <svg class="h-5 w-5 text-amber-400" viewBox="0 0 20 20" fill="currentColor">
                    <path fill-rule="evenodd" d="M8.257 3.099c.765-1.36 2.722-1.36 3.486 0l5.58 9.92c.75 1.334-.213 2.98-1.742 2.98H4.42c-1.53 0-2.493-1.646-1.743-2.98l5.58-9.92zM11 13a1 1 0 11-2 0 1 1 0 012 0zm-1-8a1 1 0 00-1 1v3a1 1 0 002 0V6a1 1 0 00-1-1z" clip-rule="evenodd" />
                </svg>
            </div>
            <div class="ml-3">
                <h3 class="text-sm font-medium text-amber-800">Attention Needed: Empty Categories</h3>
                <div class="mt-2 text-sm text-amber-700">
                    <p>The following categories have no series assigned. Consider adding content or removing them.</p>
                    <ul role="list" class="list-disc pl-5 space-y-1 mt-2">
                        @foreach($empty_kategoris as $kategori)
                            <li>
                                <span class="font-semibold">{{ $kategori->nama_kategori }}</span>
                                <a href="{{ route('admin.kategori.edit', $kategori) }}" class="ml-2 text-amber-600 hover:text-amber-900 underline">Manage</a>
                            </li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
    </div>
    @endif

    <!-- Header Summary Section -->
    <div class="grid grid-cols-1 gap-6 sm:grid-cols-2 lg:grid-cols-4">
        <!-- Products Summary -->
        <div class="relative overflow-hidden bg-white rounded-2xl shadow-sm border border-gray-100 p-6 group hover:shadow-md transition-all duration-300">
            <div class="absolute top-0 right-0 -mr-4 -mt-4 h-24 w-24 rounded-full bg-[#8b9b7e]/5 transition-all group-hover:bg-[#8b9b7e]/10"></div>
            <div class="relative flex items-center justify-between">
                <div>
                    <p class="text-xs font-semibold uppercase tracking-wider text-gray-400">Total Products</p>
                    <h3 class="mt-1 text-3xl font-extrabold text-gray-900 group-hover:text-[#8b9b7e] transition-colors">{{ $stats['products'] }}</h3>
                </div>
                <div class="h-12 w-12 rounded-xl bg-[#8b9b7e]/10 flex items-center justify-center text-[#8b9b7e]">
                    <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4" />
                    </svg>
                </div>
            </div>
            <div class="mt-4 flex items-center text-xs text-green-600 font-medium">
                <svg class="h-4 w-4 mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7h8m0 0v8m0-8l-8 8-4-4-6 6" />
                </svg>
                Active Catalog
            </div>
        </div>

        <!-- Articles Summary -->
        <div class="relative overflow-hidden bg-white rounded-2xl shadow-sm border border-gray-100 p-6 group hover:shadow-md transition-all duration-300">
            <div class="absolute top-0 right-0 -mr-4 -mt-4 h-24 w-24 rounded-full bg-[#8b9b7e]/5 transition-all group-hover:bg-[#8b9b7e]/10"></div>
            <div class="relative flex items-center justify-between">
                <div>
                    <p class="text-xs font-semibold uppercase tracking-wider text-gray-400">Total Articles</p>
                    <h3 class="mt-1 text-3xl font-extrabold text-gray-900 group-hover:text-[#8b9b7e] transition-colors">{{ $stats['artikel'] }}</h3>
                </div>
                <div class="h-12 w-12 rounded-xl bg-blue-50 flex items-center justify-center text-blue-600">
                    <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 20H5a2 2 0 01-2-2V6a2 2 0 012-2h10l4 4v10a2 2 0 01-2 2z" />
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 2v4a2 2 0 002 2h4" />
                    </svg>
                </div>
            </div>
            <div class="mt-4 flex items-center text-xs text-blue-600 font-medium">
                <svg class="h-4 w-4 mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                </svg>
                Published Content
            </div>
        </div>

        <!-- Stores Summary -->
        <div class="relative overflow-hidden bg-white rounded-2xl shadow-sm border border-gray-100 p-6 group hover:shadow-md transition-all duration-300">
            <div class="absolute top-0 right-0 -mr-4 -mt-4 h-24 w-24 rounded-full bg-[#8b9b7e]/5 transition-all group-hover:bg-[#8b9b7e]/10"></div>
            <div class="relative flex items-center justify-between">
                <div>
                    <p class="text-xs font-semibold uppercase tracking-wider text-gray-400">Total Toko</p>
                    <h3 class="mt-1 text-3xl font-extrabold text-gray-900 group-hover:text-[#8b9b7e] transition-colors">{{ $stats['toko'] }}</h3>
                </div>
                <div class="h-12 w-12 rounded-xl bg-orange-50 flex items-center justify-center text-orange-600">
                    <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
                    </svg>
                </div>
            </div>
            <div class="mt-4 flex items-center text-xs text-orange-600 font-medium">
                <svg class="h-4 w-4 mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 20l-5.447-2.724A1 1 0 013 16.382V5.618a1 1 0 011.447-.894L9 7m0 13l6-3m-6 3V7m6 10l4.553 2.276A1 1 0 0021 18.382V7.618a1 1 0 00-.553-.894L15 4m0 13V4m0 0L9 7" />
                </svg>
                Distribution Network
            </div>
        </div>

        <!-- Tutorials Summary -->
        <div class="relative overflow-hidden bg-white rounded-2xl shadow-sm border border-gray-100 p-6 group hover:shadow-md transition-all duration-300">
            <div class="absolute top-0 right-0 -mr-4 -mt-4 h-24 w-24 rounded-full bg-[#8b9b7e]/5 transition-all group-hover:bg-[#8b9b7e]/10"></div>
            <div class="relative flex items-center justify-between">
                <div>
                    <p class="text-xs font-semibold uppercase tracking-wider text-gray-400">Total Tutorials</p>
                    <h3 class="mt-1 text-3xl font-extrabold text-gray-900 group-hover:text-[#8b9b7e] transition-colors">{{ $stats['tutorial_gambar'] + $stats['tutorial_video'] }}</h3>
                </div>
                <div class="h-12 w-12 rounded-xl bg-purple-50 flex items-center justify-center text-purple-600">
                    <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253" />
                    </svg>
                </div>
            </div>
            <div class="mt-4 flex items-center text-xs text-purple-600 font-medium">
                {{ $stats['tutorial_gambar'] }} Images • {{ $stats['tutorial_video'] }} Videos
            </div>
        </div>
    </div>

    <!-- Middle Section: Categories Chart & Quick Links -->
    <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
        <!-- Distribution Chart -->
        <div class="lg:col-span-2 bg-white rounded-2xl shadow-sm border border-gray-100 p-6">
            <div class="flex items-center justify-between mb-6">
                <h3 class="text-lg font-bold text-gray-800">Resource Distribution</h3>
                <span class="px-3 py-1 bg-gray-50 text-xs font-medium text-gray-500 rounded-full border border-gray-100">by Kategori</span>
            </div>
            <div class="relative h-64">
                <canvas id="distributionChart"></canvas>
            </div>
        </div>

        <!-- Quick Access Grid -->
        <div class="bg-white rounded-2xl shadow-sm border border-gray-100 p-6">
            <h3 class="text-lg font-bold text-gray-800 mb-6 font-primary">Quick Navigation</h3>
            <div class="grid grid-cols-2 gap-4">
                <a href="{{ route('admin.product.create') }}" class="flex flex-col items-center justify-center p-4 rounded-xl border border-gray-50 bg-gray-50/50 hover:bg-[#8b9b7e]/10 hover:border-[#8b9b7e]/20 transition-all duration-200 group text-center">
                    <div class="h-10 w-10 rounded-lg bg-white flex items-center justify-center shadow-sm group-hover:scale-110 transition-transform mb-3">
                        <svg class="h-6 w-6 text-[#8b9b7e]" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path d="M12 4v16m8-8H4" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/></svg>
                    </div>
                    <span class="text-xs font-semibold text-gray-600">New Product</span>
                </a>
                <a href="{{ route('admin.artikel.create') }}" class="flex flex-col items-center justify-center p-4 rounded-xl border border-gray-50 bg-gray-50/50 hover:bg-[#8b9b7e]/10 hover:border-[#8b9b7e]/20 transition-all duration-200 group text-center">
                    <div class="h-10 w-10 rounded-lg bg-white flex items-center justify-center shadow-sm group-hover:scale-110 transition-transform mb-3">
                        <svg class="h-6 w-6 text-[#8b9b7e]" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/></svg>
                    </div>
                    <span class="text-xs font-semibold text-gray-600">New Article</span>
                </a>
                <a href="{{ route('admin.banner.index') }}" class="flex flex-col items-center justify-center p-4 rounded-xl border border-gray-50 bg-gray-50/50 hover:bg-[#8b9b7e]/10 hover:border-[#8b9b7e]/20 transition-all duration-200 group text-center">
                    <div class="h-10 w-10 rounded-lg bg-white flex items-center justify-center shadow-sm group-hover:scale-110 transition-transform mb-3">
                        <svg class="h-6 w-6 text-[#8b9b7e]" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/></svg>
                    </div>
                    <span class="text-xs font-semibold text-gray-600">Banners</span>
                </a>
                <a href="{{ route('admin.toko.index') }}" class="flex flex-col items-center justify-center p-4 rounded-xl border border-gray-50 bg-gray-50/50 hover:bg-[#8b9b7e]/10 hover:border-[#8b9b7e]/20 transition-all duration-200 group text-center">
                    <div class="h-10 w-10 rounded-lg bg-white flex items-center justify-center shadow-sm group-hover:scale-110 transition-transform mb-3">
                        <svg class="h-6 w-6 text-[#8b9b7e]" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/></svg>
                    </div>
                    <span class="text-xs font-semibold text-gray-600">Store Finder</span>
                </a>
            </div>
            <div class="mt-6 pt-6 border-t border-gray-50">
                <div class="flex items-center justify-between text-xs mb-2">
                    <span class="text-gray-500">Storage Usage</span>
                    <span class="font-bold text-gray-700">{{ $storagePercentage }}%</span>
                </div>
                <div class="w-full bg-gray-100 rounded-full h-1.5 overflow-hidden">
                    <div class="bg-[#8b9b7e] h-full rounded-full transition-all duration-500" style="width: {{ $storagePercentage }}%"></div>
                </div>
            </div>
        </div>
    </div>

    <!-- Lower Section: Recent Items -->
    <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
        <!-- Recent Products -->
        <div class="bg-white rounded-2xl shadow-sm border border-gray-100 overflow-hidden">
            <div class="px-6 py-5 border-b border-gray-50 flex items-center justify-between bg-gray-50/30">
                <h3 class="text-lg font-bold text-gray-800">New Additions</h3>
                <a href="{{ route('admin.product.index') }}" class="text-sm font-semibold text-[#8b9b7e] hover:underline transition-all">See All</a>
            </div>
            <div class="divide-y divide-gray-50">
                @forelse($latest_products as $product)
                <div class="px-6 py-4 hover:bg-gray-50/50 transition-all flex items-center gap-4 group">
                    <div class="h-12 w-12 rounded-lg bg-gray-100 flex-shrink-0 border border-gray-200 overflow-hidden">
                         @if($product->image_url)
                            <img src="{{ $product->image_url }}" alt="{{ $product->name }}" class="h-full w-full object-cover">
                         @else
                            <div class="h-full w-full flex items-center justify-center text-gray-400">
                                <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z" stroke-width="2"/></svg>
                            </div>
                         @endif
                    </div>
                    <div class="flex-1 min-w-0">
                        <p class="text-sm font-bold text-gray-900 truncate group-hover:text-[#8b9b7e] transition-colors">{{ $product->nama_product }}</p>
                        <p class="text-xs text-gray-500">{{ $product->series->nama_series ?? '-' }} • {{ $product->series->kategori->nama_kategori ?? '-' }}</p>
                    </div>
                    <div class="text-right">
                        <span class="inline-flex items-center px-2 py-1 rounded-md bg-green-50 text-[10px] font-bold text-green-700 uppercase tracking-tight">Active</span>
                    </div>
                </div>
                @empty
                 <div class="px-6 py-10 text-center text-gray-400 text-sm">No recent products</div>
                @endforelse
            </div>
        </div>

        <!-- Recent Articles -->
        <div class="bg-white rounded-2xl shadow-sm border border-gray-100 overflow-hidden">
            <div class="px-6 py-5 border-b border-gray-50 flex items-center justify-between bg-gray-50/30">
                <h3 class="text-lg font-bold text-gray-800">Article Updates</h3>
                <a href="{{ route('admin.artikel.index') }}" class="text-sm font-semibold text-[#8b9b7e] hover:underline transition-all">Manage</a>
            </div>
            <div class="divide-y divide-gray-50">
                @forelse($latest_artikels as $art)
                <div class="px-6 py-4 hover:bg-gray-50/50 transition-all flex items-center gap-4 group">
                    <div class="h-12 w-12 rounded-full bg-[#8b9b7e]/10 flex-shrink-0 flex items-center justify-center text-[#8b9b7e] font-primary">
                        {{ substr($art->judul, 0, 1) }}
                    </div>
                    <div class="flex-1 min-w-0">
                        <p class="text-sm font-bold text-gray-900 truncate group-hover:text-[#8b9b7e] transition-colors">{{ $art->judul }}</p>
                        <p class="text-xs text-gray-500">{{ $art->kategori->nama_kategori ?? 'Uncategorized' }} • {{ \Carbon\Carbon::parse($art->date)->diffForHumans() }}</p>
                    </div>
                    <a href="{{ route('admin.artikel.edit', $art) }}" class="opacity-0 group-hover:opacity-100 p-2 text-gray-400 hover:text-[#8b9b7e] transition-all">
                        <svg class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path d="M12 5v.01M12 12v.01M12 19v.01M12 6a1 1 0 110-2 1 1 0 010 2zm0 7a1 1 0 110-2 1 1 0 010 2zm0 7a1 1 0 110-2 1 1 0 010 2z" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/></svg>
                    </a>
                </div>
                @empty
                 <div class="px-6 py-10 text-center text-gray-400 text-sm">No recent articles</div>
                @endforelse
            </div>
        </div>

        <!-- Recent Tutorials -->
        <div class="bg-white rounded-2xl shadow-sm border border-gray-100 overflow-hidden">
            <div class="px-6 py-5 border-b border-gray-50 flex items-center justify-between bg-gray-50/30">
                <h3 class="text-lg font-bold text-gray-800">Media Updates</h3>
                <div class="flex gap-2">
                    <a href="{{ route('admin.tutorial-gambar.index') }}" class="text-sm font-semibold text-[#8b9b7e] hover:underline transition-all">Img</a>
                    <span class="text-gray-300">|</span>
                    <a href="{{ route('admin.tutorial-video.index') }}" class="text-sm font-semibold text-[#8b9b7e] hover:underline transition-all">Vid</a>
                </div>
            </div>
            <div class="divide-y divide-gray-50">
                @forelse($recent_tutorials as $tut)
                <div class="px-6 py-4 hover:bg-gray-50/50 transition-all flex items-center gap-4 group">
                    <div class="h-12 w-12 rounded-lg bg-purple-50 flex-shrink-0 flex items-center justify-center text-purple-600">
                        @if(isset($tut->link))
                             <!-- Video Icon -->
                             <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14.752 11.168l-3.197-2.132A1 1 0 0010 9.87v4.263a1 1 0 001.555.832l3.197-2.132a1 1 0 000-1.664z" />
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                             </svg>
                        @else
                             <!-- Image Icon -->
                             <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z" />
                             </svg>
                        @endif
                    </div>
                    <div class="flex-1 min-w-0">
                        <p class="text-sm font-bold text-gray-900 truncate group-hover:text-[#8b9b7e] transition-colors">
                            {{ $tut->judul ?? 'Video Tutorial' }}
                        </p>
                        <p class="text-xs text-gray-500">{{ $tut->kategori->nama_kategori ?? 'Uncategorized' }} • {{ $tut->created_at->diffForHumans() }}</p>
                    </div>
                </div>
                @empty
                 <div class="px-6 py-10 text-center text-gray-400 text-sm">No recent media</div>
                @endforelse
            </div>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const ctx = document.getElementById('distributionChart').getContext('2d');
        const data = @json($kategori_data);
        
        new Chart(ctx, {
            type: 'bar',
            data: {
                labels: data.map(item => item.name),
                datasets: [{
                    label: 'Series Count',
                    data: data.map(item => item.count),
                    backgroundColor: '#8b9b7e90',
                    borderColor: '#8b9b7e',
                    borderWidth: 2,
                    borderRadius: 8,
                    barThickness: 32,
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                plugins: {
                    legend: {
                        display: false
                    },
                    tooltip: {
                        backgroundColor: '#2d2d2d',
                        titleFont: { size: 14, weight: 'bold' },
                        bodyFont: { size: 13 },
                        padding: 12,
                        cornerRadius: 8,
                        displayColors: false
                    }
                },
                scales: {
                    y: {
                        beginAtZero: true,
                        grid: {
                            color: '#f3f4f6',
                            drawBorder: false
                        },
                        ticks: {
                            precision: 0,
                            color: '#9ca3af',
                            font: { size: 11, weight: '600' }
                        }
                    },
                    x: {
                        grid: {
                            display: false
                        },
                        ticks: {
                            color: '#6b7280',
                            font: { size: 11, weight: '600' }
                        }
                    }
                }
            }
        });
    });
</script>
@endsection
