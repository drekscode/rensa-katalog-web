@extends('layouts.admin')

@section('title', 'Dashboard')
@section('page-title', 'Dashboard Overview')

@section('content')
<div class="space-y-6 sm:space-y-8">
    <!-- Enhanced Alerts Section with Premium Styling -->
    @if($empty_kategoris->count() > 0)
    <div class="relative overflow-hidden rounded-2xl bg-gradient-to-br from-amber-50 to-orange-50/50 border border-amber-200/60 p-5 sm:p-6 shadow-[0_4px_16px_rgba(251,191,36,0.12)] backdrop-blur-sm animate-fade-in">
        <!-- Decorative Elements -->
        <div class="absolute top-0 right-0 -mr-8 -mt-8 h-32 w-32 rounded-full bg-gradient-to-br from-amber-300/20 to-transparent"></div>
        <div class="absolute bottom-0 left-0 -ml-8 -mb-8 h-24 w-24 rounded-full bg-gradient-to-tr from-orange-300/20 to-transparent"></div>
        
        <div class="flex items-start gap-4 relative z-10">
            <div class="flex-shrink-0">
                <div class="flex h-10 w-10 sm:h-12 sm:w-12 items-center justify-center rounded-xl bg-gradient-to-br from-amber-400 to-orange-500 shadow-lg shadow-amber-500/30 animate-pulse-glow">
                    <svg class="h-5 w-5 sm:h-6 sm:w-6 text-white" viewBox="0 0 20 20" fill="currentColor">
                        <path fill-rule="evenodd" d="M8.257 3.099c.765-1.36 2.722-1.36 3.486 0l5.58 9.92c.75 1.334-.213 2.98-1.742 2.98H4.42c-1.53 0-2.493-1.646-1.743-2.98l5.58-9.92zM11 13a1 1 0 11-2 0 1 1 0 012 0zm-1-8a1 1 0 00-1 1v3a1 1 0 002 0V6a1 1 0 00-1-1z" clip-rule="evenodd" />
                    </svg>
                </div>
            </div>
            <div class="flex-1 min-w-0">
                <h3 class="text-sm sm:text-base font-bold bg-gradient-to-r from-amber-900 to-orange-800 bg-clip-text text-transparent">
                    ⚡ Attention Needed: Empty Categories
                </h3>
                <div class="mt-3 text-sm text-amber-800">
                    <p class="font-medium">The following categories have no series assigned. Consider adding content or removing them.</p>
                    <ul role="list" class="mt-4 space-y-2">
                        @foreach($empty_kategoris as $kategori)
                            <li class="flex items-center gap-3 p-2 rounded-lg bg-white/60 hover:bg-white/80 transition-colors duration-200 group">
                                <span class="flex h-2 w-2 flex-shrink-0">
                                    <span class="relative inline-flex rounded-full h-2 w-2 bg-amber-500"></span>
                                </span>
                                <span class="font-semibold text-gray-900 flex-1">{{ $kategori->nama_kategori }}</span>
                                <a href="{{ route('admin.kategori.edit', $kategori) }}" 
                                   class="inline-flex items-center gap-1 px-3 py-1 text-xs font-semibold text-amber-700 bg-amber-100 hover:bg-amber-200 rounded-lg transition-all duration-200 group-hover:scale-105">
                                    <svg class="h-3 w-3" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                                    </svg>
                                    Manage
                                </a>
                            </li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
    </div>
    @endif

    <!-- Enhanced Header Summary Section with Gradient Cards -->
    <div class="grid grid-cols-1 gap-4 sm:gap-6 sm:grid-cols-2 lg:grid-cols-4">
        <!-- Products Summary with Gradient -->
        <div class="relative overflow-hidden bg-gradient-to-br from-white to-gray-50/50 rounded-2xl shadow-[0_4px_16px_rgba(139,155,126,0.08)] border border-gray-100/60 p-5 sm:p-6 group hover:shadow-[0_8px_24px_rgba(139,155,126,0.15)] transition-all duration-300 backdrop-blur-sm">
            <div class="absolute top-0 right-0 -mr-4 -mt-4 h-24 w-24 rounded-full bg-gradient-to-br from-[#8b9b7e]/10 to-transparent transition-all duration-500 group-hover:scale-125"></div>
            <div class="absolute inset-0 bg-gradient-to-br from-[#8b9b7e]/0 via-[#8b9b7e]/0 to-[#8b9b7e]/5 opacity-0 group-hover:opacity-100 transition-opacity duration-500"></div>
            <div class="relative flex items-center justify-between">
                <div>
                    <p class="text-xs font-bold uppercase tracking-wider text-gray-400">Total Products</p>
                    <h3 x-data="animatedCounter({{ $stats['products'] }})" x-text="current" class="mt-1 text-2xl sm:text-3xl font-extrabold bg-gradient-to-br from-gray-900 to-gray-700 bg-clip-text text-transparent group-hover:from-[#8b9b7e] group-hover:to-[#7a8a6f] transition-all duration-300">
                        {{ $stats['products'] }}
                    </h3>
                </div>
                <div class="h-12 w-12 sm:h-14 sm:w-14 rounded-xl bg-gradient-to-br from-[#8b9b7e]/20 to-[#8b9b7e]/5 flex items-center justify-center text-[#8b9b7e] group-hover:scale-110 transition-transform duration-300 shadow-lg shadow-[#8b9b7e]/10">
                    <svg class="h-6 w-6 sm:h-7 sm:w-7" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4" />
                    </svg>
                </div>
            </div>
            <div class="relative mt-4 flex items-center text-xs text-green-600 font-semibold">
                <svg class="h-4 w-4 mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M13 7h8m0 0v8m0-8l-8 8-4-4-6 6" />
                </svg>
                Active Catalog
            </div>
        </div>

        <!-- Articles Summary with Gradient -->
        <div class="relative overflow-hidden bg-gradient-to-br from-white to-blue-50/30 rounded-2xl shadow-[0_4px_16px_rgba(59,130,246,0.08)] border border-blue-100/60 p-5 sm:p-6 group hover:shadow-[0_8px_24px_rgba(59,130,246,0.15)] transition-all duration-300">
            <div class="absolute top-0 right-0 -mr-4 -mt-4 h-24 w-24 rounded-full bg-gradient-to-br from-blue-400/10 to-transparent transition-all duration-500 group-hover:scale-125"></div>
            <div class="absolute inset-0 bg-gradient-to-br from-blue-500/0 via-blue-500/0 to-blue-500/5 opacity-0 group-hover:opacity-100 transition-opacity duration-500"></div>
            <div class="relative flex items-center justify-between">
                <div>
                    <p class="text-xs font-bold uppercase tracking-wider text-gray-400">Total Articles</p>
                    <h3 x-data="animatedCounter({{ $stats['artikel'] }})" x-text="current" class="mt-1 text-2xl sm:text-3xl font-extrabold bg-gradient-to-br from-gray-900 to-gray-700 bg-clip-text text-transparent group-hover:from-blue-600 group-hover:to-blue-500 transition-all duration-300">
                        {{ $stats['artikel'] }}
                    </h3>
                </div>
                <div class="h-12 w-12 sm:h-14 sm:w-14 rounded-xl bg-gradient-to-br from-blue-100 to-blue-50 flex items-center justify-center text-blue-600 group-hover:scale-110 transition-transform duration-300 shadow-lg shadow-blue-500/10">
                    <svg class="h-6 w-6 sm:h-7 sm:w-7" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M19 20H5a2 2 0 01-2-2V6a2 2 0 012-2h10l4 4v10a2 2 0 01-2 2z" />
                        <path stroke-linecap="round" stroke-linejoin="round" d="M14 2v4a2 2 0 002 2h4" />
                    </svg>
                </div>
            </div>
            <div class="relative mt-4 flex items-center text-xs text-blue-600 font-semibold">
                <svg class="h-4 w-4 mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7" />
                </svg>
                Published Content
            </div>
        </div>

        <!-- Stores Summary with Gradient -->
        <div class="relative overflow-hidden bg-gradient-to-br from-white to-orange-50/30 rounded-2xl shadow-[0_4px_16px_rgba(249,115,22,0.08)] border border-orange-100/60 p-5 sm:p-6 group hover:shadow-[0_8px_24px_rgba(249,115,22,0.15)] transition-all duration-300">
            <div class="absolute top-0 right-0 -mr-4 -mt-4 h-24 w-24 rounded-full bg-gradient-to-br from-orange-400/10 to-transparent transition-all duration-500 group-hover:scale-125"></div>
            <div class="absolute inset-0 bg-gradient-to-br from-orange-500/0 via-orange-500/0 to-orange-500/5 opacity-0 group-hover:opacity-100 transition-opacity duration-500"></div>
            <div class="relative flex items-center justify-between">
                <div>
                    <p class="text-xs font-bold uppercase tracking-wider text-gray-400">Total Toko</p>
                    <h3 x-data="animatedCounter({{ $stats['toko'] }})" x-text="current" class="mt-1 text-2xl sm:text-3xl font-extrabold bg-gradient-to-br from-gray-900 to-gray-700 bg-clip-text text-transparent group-hover:from-orange-600 group-hover:to-orange-500 transition-all duration-300">
                        {{ $stats['toko'] }}
                    </h3>
                </div>
                <div class="h-12 w-12 sm:h-14 sm:w-14 rounded-xl bg-gradient-to-br from-orange-100 to-orange-50 flex items-center justify-center text-orange-600 group-hover:scale-110 transition-transform duration-300 shadow-lg shadow-orange-500/10">
                    <svg class="h-6 w-6 sm:h-7 sm:w-7" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
                        <path stroke-linecap="round" stroke-linejoin="round" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
                    </svg>
                </div>
            </div>
            <div class="relative mt-4 flex items-center text-xs text-orange-600 font-semibold">
                <svg class="h-4 w-4 mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M9 20l-5.447-2.724A1 1 0 013 16.382V5.618a1 1 0 011.447-.894L9 7m0 13l6-3m-6 3V7m6 10l4.553 2.276A1 1 0 0021 18.382V7.618a1 1 0 00-.553-.894L15 4m0 13V4m0 0L9 7" />
                </svg>
                Distribution Network
            </div>
        </div>

        <!-- Tutorials Summary with Gradient -->
        <div class="relative overflow-hidden bg-gradient-to-br from-white to-purple-50/30 rounded-2xl shadow-[0_4px_16px_rgba(168,85,247,0.08)] border border-purple-100/60 p-5 sm:p-6 group hover:shadow-[0_8px_24px_rgba(168,85,247,0.15)] transition-all duration-300">
            <div class="absolute top-0 right-0 -mr-4 -mt-4 h-24 w-24 rounded-full bg-gradient-to-br from-purple-400/10 to-transparent transition-all duration-500 group-hover:scale-125"></div>
            <div class="absolute inset-0 bg-gradient-to-br from-purple-500/0 via-purple-500/0 to-purple-500/5 opacity-0 group-hover:opacity-100 transition-opacity duration-500"></div>
            <div class="relative flex items-center justify-between">
                <div>
                    <p class="text-xs font-bold uppercase tracking-wider text-gray-400">Total Tutorials</p>
                    <h3 x-data="animatedCounter({{ $stats['tutorial_gambar'] + $stats['tutorial_video'] }})" x-text="current" class="mt-1 text-2xl sm:text-3xl font-extrabold bg-gradient-to-br from-gray-900 to-gray-700 bg-clip-text text-transparent group-hover:from-purple-600 group-hover:to-purple-500 transition-all duration-300">
                        {{ $stats['tutorial_gambar'] + $stats['tutorial_video'] }}
                    </h3>
                </div>
                <div class="h-12 w-12 sm:h-14 sm:w-14 rounded-xl bg-gradient-to-br from-purple-100 to-purple-50 flex items-center justify-center text-purple-600 group-hover:scale-110 transition-transform duration-300 shadow-lg shadow-purple-500/10">
                    <svg class="h-6 w-6 sm:h-7 sm:w-7" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253" />
                    </svg>
                </div>
            </div>
            <div class="relative mt-4 flex items-center text-xs text-purple-600 font-semibold">
                {{ $stats['tutorial_gambar'] }} Images • {{ $stats['tutorial_video'] }} Videos
            </div>
        </div>
    </div>

    <!-- Enhanced Middle Section: Chart & Quick Links with Premium Design -->
    <div class="grid grid-cols-1 lg:grid-cols-3 gap-6 sm:gap-8">
        <!-- Enhanced Distribution Chart Card -->
        <div class="lg:col-span-2 relative overflow-hidden bg-gradient-to-br from-white to-gray-50/50 rounded-2xl shadow-[0_4px_16px_rgba(0,0,0,0.06)] border border-gray-100/60 p-6 sm:p-8 group">
            <!-- Decorative Background Elements -->
            <div class="absolute top-0 right-0 -mr-12 -mt-12 h-48 w-48 rounded-full bg-gradient-to-br from-[#8b9b7e]/10 to-transparent group-hover:scale-110 transition-transform duration-700"></div>
            <div class="absolute bottom-0 left-0 h-2 w-full bg-gradient-to-r from-transparent via-[#8b9b7e]/20 to-transparent"></div>
            
            <div class="relative z-10">
                <!-- Header with Icon and Badge -->
                <div class="flex items-center justify-between mb-6 sm:mb-8">
                    <div class="flex items-center gap-3">
                        <div class="flex h-10 w-10 sm:h-12 sm:w-12 items-center justify-center rounded-xl bg-gradient-to-br from-[#8b9b7e]/20 to-[#8b9b7e]/5 group-hover:scale-110 transition-transform duration-300">
                            <svg class="h-5 w-5 sm:h-6 sm:w-6 text-[#8b9b7e]" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z" />
                            </svg>
                        </div>
                        <div>
                            <h3 class="text-lg sm:text-xl font-bold bg-gradient-to-r from-gray-900 to-gray-700 bg-clip-text text-transparent">Resource Distribution</h3>
                            <p class="text-xs text-gray-500 mt-0.5">Series per category</p>
                        </div>
                    </div>
                    <div class="flex items-center gap-2 px-3 py-1.5 bg-gradient-to-r from-[#8b9b7e]/10 to-[#8b9b7e]/5 text-xs font-bold text-[#8b9b7e] rounded-full border border-[#8b9b7e]/20 shadow-sm">
                        <span class="h-1.5 w-1.5 rounded-full bg-[#8b9b7e] animate-pulse"></span>
                        Live Data
                    </div>
                </div>
                
                <!-- Chart Container with Enhanced Visual -->
                <div class="relative h-64 sm:h-72 bg-gradient-to-br from-white/80 to-gray-50/40 rounded-xl p-4 border border-gray-100/40">
                    <canvas id="distributionChart"></canvas>
                </div>
            </div>
        </div>

        <!-- Enhanced Quick Access Grid -->
        <div class="relative overflow-hidden bg-gradient-to-br from-white to-purple-50/20 rounded-2xl shadow-[0_4px_16px_rgba(0,0,0,0.06)] border border-gray-100/60 p-6 sm:p-8">
            <!-- Decorative Elements -->
            <div class="absolute top-0 right-0 -mr-8 -mt-8 h-32 w-32 rounded-full bg-gradient-to-br from-purple-300/10 to-transparent"></div>
            
            <div class="relative z-10">
                <!-- Header -->
                <div class="flex items-center gap-3 mb-6">
                    <div class="flex h-10 w-10 items-center justify-center rounded-xl bg-gradient-to-br from-purple-100 to-purple-50">
                        <svg class="h-5 w-5 text-purple-600" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M13 10V3L4 14h7v7l9-11h-7z" />
                        </svg>
                    </div>
                    <h3 class="text-lg font-bold bg-gradient-to-r from-gray-900 to-gray-700 bg-clip-text text-transparent">Quick Actions</h3>
                </div>
                
                <!-- Quick Action Cards Grid -->
                <div class="grid grid-cols-2 gap-3 sm:gap-4">
                    <a href="{{ route('admin.product.create') }}" class="group relative overflow-hidden flex flex-col items-center justify-center p-4 sm:p-5 rounded-xl bg-gradient-to-br from-white to-gray-50/50 hover:from-[#8b9b7e]/10 hover:to-[#8b9b7e]/5 border border-gray-100 hover:border-[#8b9b7e]/30 transition-all duration-300 shadow-sm hover:shadow-md hover:-translate-y-1">
                        <div class="absolute inset-0 bg-gradient-to-br from-[#8b9b7e]/0 to-[#8b9b7e]/5 opacity-0 group-hover:opacity-100 transition-opacity duration-300"></div>
                        <div class="relative z-10 flex h-12 w-12 sm:h-14 sm:w-14 items-center justify-center rounded-xl bg-gradient-to-br from-[#8b9b7e]/20 to-[#8b9b7e]/5 shadow-lg shadow-[#8b9b7e]/10 group-hover:scale-110 transition-transform duration-300 mb-3">
                            <svg class="h-6 w-6 sm:h-7 sm:w-7 text-[#8b9b7e]" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5">
                                <path d="M12 4v16m8-8H4" stroke-linecap="round" stroke-linejoin="round"/>
                            </svg>
                        </div>
                        <span class="relative z-10 text-xs sm:text-sm font-bold text-gray-700 group-hover:text-[#8b9b7e] transition-colors text-center">New Product</span>
                    </a>
                    
                    <a href="{{ route('admin.artikel.create') }}" class="group relative overflow-hidden flex flex-col items-center justify-center p-4 sm:p-5 rounded-xl bg-gradient-to-br from-white to-gray-50/50 hover:from-blue-50/50 hover:to-blue-50/20 border border-gray-100 hover:border-blue-200/50 transition-all duration-300 shadow-sm hover:shadow-md hover:-translate-y-1">
                        <div class="absolute inset-0 bg-gradient-to-br from-blue-500/0 to-blue-500/5 opacity-0 group-hover:opacity-100 transition-opacity duration-300"></div>
                        <div class="relative z-10 flex h-12 w-12 sm:h-14 sm:w-14 items-center justify-center rounded-xl bg-gradient-to-br from-blue-100 to-blue-50 shadow-lg shadow-blue-500/10 group-hover:scale-110 transition-transform duration-300 mb-3">
                            <svg class="h-6 w-6 sm:h-7 sm:w-7 text-blue-600" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                <path d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" stroke-linecap="round" stroke-linejoin="round"/>
                            </svg>
                        </div>
                        <span class="relative z-10 text-xs sm:text-sm font-bold text-gray-700 group-hover:text-blue-600 transition-colors text-center">New Article</span>
                    </a>
                    
                    <a href="{{ route('admin.banner.index') }}" class="group relative overflow-hidden flex flex-col items-center justify-center p-4 sm:p-5 rounded-xl bg-gradient-to-br from-white to-gray-50/50 hover:from-purple-50/50 hover:to-purple-50/20 border border-gray-100 hover:border-purple-200/50 transition-all duration-300 shadow-sm hover:shadow-md hover:-translate-y-1">
                        <div class="absolute inset-0 bg-gradient-to-br from-purple-500/0 to-purple-500/5 opacity-0 group-hover:opacity-100 transition-opacity duration-300"></div>
                        <div class="relative z-10 flex h-12 w-12 sm:h-14 sm:w-14 items-center justify-center rounded-xl bg-gradient-to-br from-purple-100 to-purple-50 shadow-lg shadow-purple-500/10 group-hover:scale-110 transition-transform duration-300 mb-3">
                            <svg class="h-6 w-6 sm:h-7 sm:w-7 text-purple-600" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                <path d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z" stroke-linecap="round" stroke-linejoin="round"/>
                            </svg>
                        </div>
                        <span class="relative z-10 text-xs sm:text-sm font-bold text-gray-700 group-hover:text-purple-600 transition-colors text-center">Banners</span>
                    </a>
                    
                    <a href="{{ route('admin.toko.index') }}" class="group relative overflow-hidden flex flex-col items-center justify-center p-4 sm:p-5 rounded-xl bg-gradient-to-br from-white to-gray-50/50 hover:from-orange-50/50 hover:to-orange-50/20 border border-gray-100 hover:border-orange-200/50 transition-all duration-300 shadow-sm hover:shadow-md hover:-translate-y-1">
                        <div class="absolute inset-0 bg-gradient-to-br from-orange-500/0 to-orange-500/5 opacity-0 group-hover:opacity-100 transition-opacity duration-300"></div>
                        <div class="relative z-10 flex h-12 w-12 sm:h-14 sm:w-14 items-center justify-center rounded-xl bg-gradient-to-br from-orange-100 to-orange-50 shadow-lg shadow-orange-500/10 group-hover:scale-110 transition-transform duration-300 mb-3">
                            <svg class="h-6 w-6 sm:h-7 sm:w-7 text-orange-600" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                <path d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" stroke-linecap="round" stroke-linejoin="round"/>
                            </svg>
                        </div>
                        <span class="relative z-10 text-xs sm:text-sm font-bold text-gray-700 group-hover:text-orange-600 transition-colors text-center">Store Finder</span>
                    </a>
                </div>
                
                <!-- Enhanced Storage Info -->
                <div class="mt-6 sm:mt-8 pt-6 border-t border-gray-200/60">
                    <div class="flex items-center justify-between text-xs mb-2">
                        <div class="flex items-center gap-2">
                            <svg class="h-4 w-4 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M5 19a2 2 0 01-2-2V7a2 2 0 012-2h4l2 2h4a2 2 0 012 2v1M5 19h14a2 2 0 002-2v-5a2 2 0 00-2-2H9a2 2 0 00-2 2v5a2 2 0 01-2 2z" />
                            </svg>
                            <span class="text-gray-600 font-medium">Storage Usage</span>
                        </div>
                        <span class="font-bold bg-gradient-to-r from-[#8b9b7e] to-[#7a8a6f] bg-clip-text text-transparent">{{ $storagePercentage }}%</span>
                    </div>
                    <div class="relative w-full bg-gray-100 rounded-full h-2 overflow-hidden shadow-inner">
                        <div class="absolute inset-0 bg-gradient-to-r from-gray-100 to-gray-50"></div>
                        <div class="relative bg-gradient-to-r from-[#8b9b7e] to-[#7a8a6f] h-full rounded-full transition-all duration-500 shadow-lg shadow-[#8b9b7e]/20" style="width: {{ $storagePercentage }}%"></div>
                    </div>
                    <p class="text-xs text-gray-500 mt-2 flex items-center gap-1">
                        <svg class="h-3 w-3" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                        Optimized for performance
                    </p>
                </div>
            </div>
        </div>
    </div>

    <!-- Enhanced Recent Activity Section -->
    <div class="grid grid-cols-1 lg:grid-cols-3 gap-6 sm:gap-8">
        <!-- New Additions (Recent Products) -->
        <div class="relative overflow-hidden bg-gradient-to-br from-white to-gray-50/50 rounded-2xl shadow-[0_4px_16px_rgba(0,0,0,0.06)] border border-gray-100/60">
            <!-- Decorative Element -->
            <div class="absolute top-0 right-0 -mr-8 -mt-8 h-24 w-24 rounded-full bg-gradient-to-br from-[#8b9b7e]/10 to-transparent"></div>
            
            <!-- Header -->
            <div class="relative px-5 sm:px-6 py-4 sm:py-5 border-b border-gray-100/60 flex items-center justify-between bg-gradient-to-r from-gray-50/50 to-transparent backdrop-blur-sm">
                <div class="flex items-center gap-2.5">
                    <div class="flex h-8 w-8 items-center justify-center rounded-lg bg-gradient-to-br from-[#8b9b7e]/20 to-[#8b9b7e]/5">
                        <svg class="h-4 w-4 text-[#8b9b7e]" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4" />
                        </svg>
                    </div>
                    <h3 class="text-base sm:text-lg font-bold bg-gradient-to-r from-gray-900 to-gray-700 bg-clip-text text-transparent">New Additions</h3>
                </div>
                <a href="{{ route('admin.product.index') }}" class="text-xs sm:text-sm font-bold text-[#8b9b7e] hover:text-[#7a8a6f] transition-colors">See All</a>
            </div>
            
            <!-- Product List -->
            <div class="divide-y divide-gray-100/60">
                @forelse($latest_products as $product)
                <div class="px-5 sm:px-6 py-3.5 sm:py-4 hover:bg-gradient-to-r hover:from-[#8b9b7e]/5 hover:to-transparent transition-all flex items-center gap-3 sm:gap-4 group cursor-pointer">
                    <!-- Product Image/Icon -->
                    <div class="relative h-12 w-12 rounded-xl bg-gradient-to-br from-gray-100 to-gray-50 flex-shrink-0 border border-gray-200/60 overflow-hidden shadow-sm group-hover:shadow-md group-hover:scale-105 transition-all duration-300">
                        @if($product->thumbnail)
                            <img src="{{ $product->thumbnail }}" alt="{{ $product->nama_product }}" class="h-full w-full object-cover">
                        @else
                            <div class="h-full w-full flex items-center justify-center text-gray-400">
                                <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z" />
                                </svg>
                            </div>
                        @endif
                        <!-- Gradient Overlay -->
                        <div class="absolute inset-0 bg-gradient-to-t from-black/10 to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-300"></div>
                    </div>
                    
                    <!-- Product Info -->
                    <div class="flex-1 min-w-0">
                        <p class="text-sm font-bold text-gray-900 truncate group-hover:text-[#8b9b7e] transition-colors duration-200">{{ $product->nama_product }}</p>
                        <p class="text-xs text-gray-500 mt-0.5">
                            <span class="font-medium">{{ $product->series->nama_series ?? '-' }}</span>
                            <span class="mx-1 text-gray-300">•</span>
                            <span>{{ $product->series->kategori->nama_kategori ?? '-' }}</span>
                        </p>
                    </div>
                    
                    <!-- Status Badge -->
                    <div class="flex-shrink-0">
                        <span class="inline-flex items-center gap-1 px-2.5 py-1 rounded-lg bg-gradient-to-r from-green-50 to-emerald-50 text-[10px] font-bold text-green-700 uppercase tracking-wider border border-green-200/60 shadow-sm">
                            <span class="h-1.5 w-1.5 rounded-full bg-green-500"></span>
                            Active
                        </span>
                    </div>
                </div>
                @empty
                <div class="px-6 py-12 text-center">
                    <div class="inline-flex h-12 w-12 items-center justify-center rounded-full bg-gray-100 mb-3">
                        <svg class="h-6 w-6 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 13V6a2 2 0 00-2-2H6a2 2 0 00-2 2v7m16 0v5a2 2 0 01-2 2H6a2 2 0 01-2-2v-5m16 0h-2.586a1 1 0 00-.707.293l-2.414 2.414a1 1 0 01-.707.293h-3.172a1 1 0 01-.707-.293l-2.414-2.414A1 1 0 006.586 13H4" />
                        </svg>
                    </div>
                    <p class="text-sm font-medium text-gray-400">No recent products</p>
                </div>
                @endforelse
            </div>
        </div>

        <!-- Article Updates -->
        <div class="relative overflow-hidden bg-gradient-to-br from-white to-blue-50/20 rounded-2xl shadow-[0_4px_16px_rgba(59,130,246,0.06)] border border-blue-100/60">
            <!-- Decorative Element -->
            <div class="absolute top-0 right-0 -mr-8 -mt-8 h-24 w-24 rounded-full bg-gradient-to-br from-blue-400/10 to-transparent"></div>
            
            <!-- Header -->
            <div class="relative px-5 sm:px-6 py-4 sm:py-5 border-b border-blue-100/40 flex items-center justify-between bg-gradient-to-r from-blue-50/30 to-transparent backdrop-blur-sm">
                <div class="flex items-center gap-2.5">
                    <div class="flex h-8 w-8 items-center justify-center rounded-lg bg-gradient-to-br from-blue-100 to-blue-50">
                        <svg class="h-4 w-4 text-blue-600" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                        </svg>
                    </div>
                    <h3 class="text-base sm:text-lg font-bold bg-gradient-to-r from-gray-900 to-gray-700 bg-clip-text text-transparent">Article Updates</h3>
                </div>
                <a href="{{ route('admin.artikel.index') }}" class="text-xs sm:text-sm font-bold text-blue-600 hover:text-blue-700 transition-colors">Manage</a>
            </div>
            
            <!-- Article List -->
            <div class="divide-y divide-blue-100/40">
                @forelse($latest_artikels as $art)
                <div class="px-5 sm:px-6 py-3.5 sm:py-4 hover:bg-gradient-to-r hover:from-blue-50/40 hover:to-transparent transition-all flex items-center gap-3 sm:gap-4 group cursor-pointer">
                    <!-- Article Image/Avatar -->
                    <div class="relative h-12 w-12 rounded-xl bg-gradient-to-br from-blue-100 to-blue-50 flex-shrink-0 border border-blue-200/40 overflow-hidden shadow-sm group-hover:shadow-md group-hover:scale-105 transition-all duration-300">
                        @if(isset($art->foto) && $art->foto)
                            <img src="{{ $art->foto }}" alt="{{ $art->judul }}" class="h-full w-full object-cover">
                            <!-- Gradient Overlay -->
                            <div class="absolute inset-0 bg-gradient-to-t from-blue-900/20 to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-300"></div>
                        @else
                            <!-- Fallback Letter Avatar -->
                            <div class="h-full w-full flex items-center justify-center text-blue-600 font-bold text-lg">
                                {{ strtoupper(substr($art->judul, 0, 1)) }}
                            </div>
                        @endif
                    </div>
                    
                    <!-- Article Info -->
                    <div class="flex-1 min-w-0">
                        <p class="text-sm font-bold text-gray-900 truncate group-hover:text-blue-600 transition-colors duration-200">{{ $art->judul }}</p>
                        <p class="text-xs text-gray-500 mt-0.5">
                            <span class="font-medium">{{ $art->kategori->nama_kategori ?? 'Uncategorized' }}</span>
                            <span class="mx-1 text-gray-300">•</span>
                            <span>{{ \Carbon\Carbon::parse($art->date)->diffForHumans() }}</span>
                        </p>
                    </div>
                    
                    <!-- Edit Button -->
                    <a href="{{ route('admin.artikel.edit', $art) }}" class="opacity-0 group-hover:opacity-100 p-2 rounded-lg text-gray-400 hover:text-blue-600 hover:bg-blue-50 transition-all duration-200">
                        <svg class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z" />
                        </svg>
                    </a>
                </div>
                @empty
                <div class="px-6 py-12 text-center">
                    <div class="inline-flex h-12 w-12 items-center justify-center rounded-full bg-blue-50 mb-3">
                        <svg class="h-6 w-6 text-blue-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                        </svg>
                    </div>
                    <p class="text-sm font-medium text-gray-400">No recent articles</p>
                </div>
                @endforelse
            </div>
        </div>

        <!-- Media Updates (Tutorials) -->
        <div class="relative overflow-hidden bg-gradient-to-br from-white to-purple-50/20 rounded-2xl shadow-[0_4px_16px_rgba(168,85,247,0.06)] border border-purple-100/60">
            <!-- Decorative Element -->
            <div class="absolute top-0 right-0 -mr-8 -mt-8 h-24 w-24 rounded-full bg-gradient-to-br from-purple-400/10 to-transparent"></div>
            
            <!-- Header -->
            <div class="relative px-5 sm:px-6 py-4 sm:py-5 border-b border-purple-100/40 flex items-center justify-between bg-gradient-to-r from-purple-50/30 to-transparent backdrop-blur-sm">
                <div class="flex items-center gap-2.5">
                    <div class="flex h-8 w-8 items-center justify-center rounded-lg bg-gradient-to-br from-purple-100 to-purple-50">
                        <svg class="h-4 w-4 text-purple-600" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M15 10l4.553-2.276A1 1 0 0121 8.618v6.764a1 1 0 01-1.447.894L15 14M5 18h8a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v8a2 2 0 002 2z" />
                        </svg>
                    </div>
                    <h3 class="text-base sm:text-lg font-bold bg-gradient-to-r from-gray-900 to-gray-700 bg-clip-text text-transparent">Media Updates</h3>
                </div>
                <div class="flex gap-2 items-center">
                    <a href="{{ route('admin.tutorial-gambar.index') }}" class="text-xs sm:text-sm font-bold text-purple-600 hover:text-purple-700 transition-colors">Img</a>
                    <span class="text-gray-300">|</span>
                    <a href="{{ route('admin.tutorial-video.index') }}" class="text-xs sm:text-sm font-bold text-purple-600 hover:text-purple-700 transition-colors">Vid</a>
                </div>
            </div>
            
            <!-- Tutorial List -->
            <div class="divide-y divide-purple-100/40">
                @forelse($recent_tutorials as $tut)
                <div class="px-5 sm:px-6 py-3.5 sm:py-4 hover:bg-gradient-to-r hover:from-purple-50/40 hover:to-transparent transition-all flex items-center gap-3 sm:gap-4 group cursor-pointer">
                    <!-- Tutorial Image/Thumbnail -->
                    <div class="relative h-12 w-12 rounded-xl bg-gradient-to-br from-purple-100 to-purple-50 flex-shrink-0 border border-purple-200/40 overflow-hidden shadow-sm group-hover:shadow-md group-hover:scale-105 transition-all duration-300">
                        @if(isset($tut->gambar) && $tut->gambar)
                            <!-- Show actual image/thumbnail -->
                            <img src="{{ $tut->gambar }}" alt="{{ $tut->judul }}" class="h-full w-full object-cover">
                            
                            <!-- Video Play Icon Overlay (if it's a video) -->
                            @if(isset($tut->link))
                            <div class="absolute inset-0 flex items-center justify-center bg-gradient-to-t from-black/50 via-black/30 to-transparent group-hover:from-black/60 group-hover:via-black/40 transition-all duration-300">
                                <div class="flex items-center justify-center h-7 w-7 rounded-full bg-red-600 hover:bg-red-700 shadow-xl ring-2 ring-white/50 transition-all duration-300 group-hover:scale-110">
                                    <svg class="h-3.5 w-3.5 text-white ml-0.5" fill="currentColor" viewBox="0 0 20 20">
                                        <path d="M6.3 2.841A1.5 1.5 0 004 4.11V15.89a1.5 1.5 0 002.3 1.269l9.344-5.89a1.5 1.5 0 000-2.538L6.3 2.84z" />
                                    </svg>
                                </div>
                            </div>
                            @else
                            <!-- Image overlay on hover -->
                            <div class="absolute inset-0 bg-gradient-to-t from-purple-900/30 to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-300"></div>
                            @endif
                        @elseif(isset($tut->link) && $tut->link)
                            <!-- YouTube Thumbnail Extraction -->
                            @php
                                $videoId = null;
                                // Extract YouTube video ID
                                if (preg_match('/(?:youtube\.com\/(?:[^\/]+\/.+\/|(?:v|e(?:mbed)?)\/|.*[?&]v=)|youtu\.be\/)([^"&?\/\s]{11})/i', $tut->link, $matches)) {
                                    $videoId = $matches[1];
                                }
                            @endphp
                            
                            @if($videoId)
                                <!-- YouTube Thumbnail -->
                                <img src="https://img.youtube.com/vi/{{ $videoId }}/mqdefault.jpg" alt="{{ $tut->judul }}" class="h-full w-full object-cover">
                                <div class="absolute inset-0 flex items-center justify-center bg-gradient-to-t from-black/50 via-black/30 to-transparent group-hover:from-black/60 group-hover:via-black/40 transition-all duration-300">
                                    <div class="flex items-center justify-center h-7 w-7 rounded-full bg-red-600 hover:bg-red-700 shadow-xl ring-2 ring-white/50 transition-all duration-300 group-hover:scale-110">
                                        <svg class="h-3.5 w-3.5 text-white ml-0.5" fill="currentColor" viewBox="0 0 20 20">
                                            <path d="M6.3 2.841A1.5 1.5 0 004 4.11V15.89a1.5 1.5 0 002.3 1.269l9.344-5.89a1.5 1.5 0 000-2.538L6.3 2.84z" />
                                        </svg>
                                    </div>
                                </div>
                                <!-- YouTube Branding Badge -->
                                <div class="absolute top-0.5 right-0.5 px-1 py-0.5 bg-red-600 rounded text-[8px] font-bold text-white shadow-sm">
                                    YT
                                </div>
                            @else
                                <!-- Generic Video Icon Fallback -->
                                <div class="h-full w-full flex items-center justify-center text-purple-600 bg-gradient-to-br from-purple-100 to-purple-50">
                                    <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M14.752 11.168l-3.197-2.132A1 1 0 0010 9.87v4.263a1 1 0 001.555.832l3.197-2.132a1 1 0 000-1.664z" />
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                                    </svg>
                                </div>
                            @endif
                        @else
                            <!-- Fallback: Icon based on type -->
                            <div class="h-full w-full flex items-center justify-center text-purple-600">
                                <!-- Image Icon -->
                                <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z" />
                                </svg>
                            </div>
                        @endif
                    </div>
                    
                    <!-- Tutorial Info -->
                    <div class="flex-1 min-w-0">
                        <p class="text-sm font-bold text-gray-900 truncate group-hover:text-purple-600 transition-colors duration-200">
                            {{ $tut->judul ?? 'Video Tutorial' }}
                        </p>
                        <p class="text-xs text-gray-500 mt-0.5">
                            <span class="font-medium">{{ $tut->kategori->nama_kategori ?? 'Uncategorized' }}</span>
                            <span class="mx-1 text-gray-300">•</span>
                            <span>{{ $tut->created_at->diffForHumans() }}</span>
                        </p>
                    </div>
                    
                    <!-- Media Type Badge -->
                    <div class="flex-shrink-0">
                        <span class="inline-flex items-center gap-1 px-2.5 py-1 rounded-lg bg-gradient-to-r from-purple-50 to-purple-50/50 text-[10px] font-bold text-purple-700 uppercase tracking-wider border border-purple-200/60 shadow-sm">
                            <svg class="h-3 w-3" fill="currentColor" viewBox="0 0 20 20">
                                @if(isset($tut->link))
                                <path d="M2 6a2 2 0 012-2h6a2 2 0 012 2v8a2 2 0 01-2 2H4a2 2 0 01-2-2V6zM14.553 7.106A1 1 0 0014 8v4a1 1 0 00.553.894l2 1A1 1 0 0018 13V7a1 1 0 00-1.447-.894l-2 1z" />
                                @else
                                <path fill-rule="evenodd" d="M4 3a2 2 0 00-2 2v10a2 2 0 002 2h12a2 2 0 002-2V5a2 2 0 00-2-2H4zm12 12H4l4-8 3 6 2-4 3 6z" clip-rule="evenodd" />
                                @endif
                            </svg>
                            {{ isset($tut->link) ? 'Video' : 'Image' }}
                        </span>
                    </div>
                </div>
                @empty
                <div class="px-6 py-12 text-center">
                    <div class="inline-flex h-12 w-12 items-center justify-center rounded-full bg-purple-50 mb-3">
                        <svg class="h-6 w-6 text-purple-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 10l4.553-2.276A1 1 0 0121 8.618v6.764a1 1 0 01-1.447.894L15 14M5 18h8a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v8a2 2 0 002 2z" />
                        </svg>
                    </div>
                    <p class="text-sm font-medium text-gray-400">No recent media</p>
                </div>
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

    document.addEventListener('alpine:init', () => {
        Alpine.data('animatedCounter', (target, duration = 2000) => ({
            current: 0,
            target: target,
            time: duration,
            init() {
                let start = 0;
                const step = (timestamp) => {
                    if (!start) start = timestamp;
                    const progress = Math.min((timestamp - start) / this.time, 1);
                    this.current = Math.floor(progress * this.target);
                    if (progress < 1) {
                        window.requestAnimationFrame(step);
                    }
                };
                window.requestAnimationFrame(step);
            }
        }));
    });
</script>
@endsection
