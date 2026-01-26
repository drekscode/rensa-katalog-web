@extends('layouts.admin')

@section('title', 'Tutorial Video')
@section('page-title', 'Tutorial Video')

@section('content')
<div x-data="{ 
    showViewModal: false, 
    selectedItem: {},
    search: '{{ request('search') }}',
    openViewModal(item) {
        this.selectedItem = item;
        this.showViewModal = true;
    },
    getEmbedUrl(url) {
        if (!url) return null;
        let videoId = null;
        // YouTube Long URL
        let match = url.match(/[?&]v=([^&]+)/);
        if (match) videoId = match[1];
        // YouTube Short URL
        if (!videoId) {
            match = url.match(/youtu\.be\/([^?]+)/);
            if (match) videoId = match[1];
        }
        // YouTube Embed URL
        if (!videoId) {
            match = url.match(/youtube\.com\/embed\/([^?]+)/);
            if (match) videoId = match[1];
        }
        if (videoId) return 'https://www.youtube-nocookie.com/embed/' + videoId;
        return null;
    }
}" class="mx-auto max-w-7xl">
    
    <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4 mb-8">
        <div>
             <h2 class="text-lg font-semibold text-gray-900">Tutorial Videos</h2>
             <p class="text-sm text-gray-500">Manage video-based tutorials.</p>
        </div>
        <div class="flex flex-col sm:flex-row gap-3">
             <form action="{{ route('admin.tutorial-video.index') }}" method="GET" class="relative">
                <div class="pointer-events-none absolute inset-y-0 left-0 flex items-center pl-3">
                    <svg class="h-4 w-4 text-gray-400" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M21 21l-5.197-5.197m0 0A7.5 7.5 0 105.196 5.196a7.5 7.5 0 0010.607 10.607z" />
                    </svg>
                </div>
                <input type="text" 
                       name="search"
                       value="{{ request('search') }}"
                       class="block w-full sm:w-64 rounded-xl border-0 py-2.5 pl-10 pr-3 text-gray-900 ring-1 ring-inset ring-gray-200 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-[#8b9b7e] sm:text-sm sm:leading-6 transition-all" 
                       placeholder="Search videos...">
            </form>
            <a href="{{ route('admin.tutorial-video.create') }}" class="inline-flex items-center justify-center gap-2 rounded-xl bg-[#8b9b7e] px-4 py-2.5 text-sm font-semibold text-white shadow-sm hover:bg-[#7a8a6f] transition-all transform hover:-translate-y-0.5 active:translate-y-0">
                <svg class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                    <path d="M10.75 4.75a.75.75 0 00-1.5 0v4.5h-4.5a.75.75 0 000 1.5h4.5v4.5a.75.75 0 001.5 0v-4.5h4.5a.75.75 0 000-1.5h-4.5v-4.5z" />
                </svg>
                Add Tutorial
            </a>
        </div>
    </div>

    @if($tutorial_videos->isEmpty())
    <!-- Empty State -->
    <div class="relative block w-full rounded-2xl border-2 border-dashed border-gray-300 p-12 text-center hover:border-[#8b9b7e] focus:outline-none focus:ring-2 focus:ring-[#8b9b7e] focus:ring-offset-2 transition-all duration-300 group bg-white/50 max-w-3xl mx-auto">
        <div class="mx-auto flex h-20 w-20 items-center justify-center rounded-full bg-gray-50 group-hover:bg-[#8b9b7e]/10 transition-colors duration-300">
            <svg class="h-10 w-10 text-gray-400 group-hover:text-[#8b9b7e] transition-colors duration-300" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" d="M15.91 11.672a.375.375 0 010 .656l-5.603 3.113a.375.375 0 01-.557-.328V8.887c0-.286.307-.466.557-.327l5.603 3.112z" />
                <path stroke-linecap="round" stroke-linejoin="round" d="M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
            </svg>
        </div>
        <h3 class="mt-4 text-lg font-semibold text-gray-900">No Videos Found</h3>
        <p class="mt-2 text-sm text-gray-500 max-w-sm mx-auto">Get started by creating a new video tutorial.</p>
        <div class="mt-8">
            <a href="{{ route('admin.tutorial-video.create') }}" class="inline-flex items-center gap-2 rounded-xl bg-[#8b9b7e] px-6 py-3 text-sm font-semibold text-white shadow-sm hover:bg-[#7a8a6f] focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-[#8b9b7e] transition-all transform hover:-translate-y-0.5 active:translate-y-0">
                <svg class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                    <path d="M10.75 4.75a.75.75 0 00-1.5 0v4.5h-4.5a.75.75 0 000 1.5h4.5v4.5a.75.75 0 001.5 0v-4.5h4.5a.75.75 0 000-1.5h-4.5v-4.5z" />
                </svg>
                Create First Video
            </a>
        </div>
    </div>

    @else
    
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
        @foreach($tutorial_videos as $tv)
        <!-- Content Card -->
        <div @click="openViewModal({
            'id': '{{ $tv->id }}',
            'kategori': '{{ $tv->kategori->nama_kategori ?? '-' }}',
            'link': '{{ $tv->link }}'
        })" class="flex flex-col h-full overflow-hidden bg-white shadow-lg shadow-gray-200/50 ring-1 ring-gray-200 rounded-2xl transition-all hover:shadow-xl hover:shadow-gray-200/60 hover:-translate-y-1 group cursor-pointer">
             <!-- Media with YouTube Thumbnail -->
            <div class="aspect-video bg-gradient-to-br from-gray-900 to-gray-800 relative overflow-hidden group-hover:opacity-95 transition-opacity">
                @php
                    $videoId = null;
                    // Extract YouTube video ID
                    if (preg_match('/(?:youtube\.com\/(?:[^\/]+\/.+\/|(?:v|e(?:mbed)?)\/|.*[?&]v=)|youtu\.be\/)([^"&?\/\s]{11})/i', $tv->link, $matches)) {
                        $videoId = $matches[1];
                    }
                @endphp
                
                @if($videoId)
                    <!-- YouTube Thumbnail -->
                    <img src="https://img.youtube.com/vi/{{ $videoId }}/maxresdefault.jpg" 
                         alt="Video thumbnail" 
                         class="w-full h-full object-cover"
                         onerror="this.src='https://img.youtube.com/vi/{{ $videoId }}/hqdefault.jpg'">
                    
                    <!-- Play Button Overlay -->
                    <div class="absolute inset-0 flex items-center justify-center bg-gradient-to-t from-black/60 via-black/20 to-transparent group-hover:from-black/70 group-hover:via-black/30 transition-all duration-300">
                        <div class="flex items-center justify-center h-16 w-16 rounded-full bg-red-600 hover:bg-red-700 shadow-2xl ring-4 ring-white/30 transition-all duration-300 group-hover:scale-110">
                            <svg class="h-7 w-7 text-white ml-1" fill="currentColor" viewBox="0 0 20 20">
                                <path d="M6.3 2.841A1.5 1.5 0 004 4.11V15.89a1.5 1.5 0 002.3 1.269l9.344-5.89a1.5 1.5 0 000-2.538L6.3 2.84z" />
                            </svg>
                        </div>
                    </div>
                    
                    <!-- YouTube Badge -->
                    <div class="absolute top-3 left-3">
                        <span class="inline-flex items-center gap-1.5 rounded-lg bg-red-600 px-2.5 py-1 text-xs font-bold text-white shadow-lg">
                            <svg class="h-3.5 w-3.5" fill="currentColor" viewBox="0 0 24 24">
                                <path d="M23.498 6.186a3.016 3.016 0 0 0-2.122-2.136C19.505 3.545 12 3.545 12 3.545s-7.505 0-9.377.505A3.017 3.017 0 0 0 .502 6.186C0 8.07 0 12 0 12s0 3.93.502 5.814a3.016 3.016 0 0 0 2.122 2.136c1.871.505 9.376.505 9.376.505s7.505 0 9.377-.505a3.015 3.015 0 0 0 2.122-2.136C24 15.93 24 12 24 12s0-3.93-.502-5.814zM9.545 15.568V8.432L15.818 12l-6.273 3.568z"/>
                            </svg>
                            YouTube
                        </span>
                    </div>
                @else
                    <!-- Fallback for non-YouTube links -->
                    <div class="w-full h-full flex items-center justify-center">
                        <svg class="h-16 w-16 text-white opacity-50 group-hover:opacity-100 transition-opacity" fill="currentColor" viewBox="0 0 24 24">
                            <path d="M8 5v14l11-7z" />
                        </svg>
                    </div>
                @endif
                
                <!-- Category Badge (moved to top right) -->
                <div class="absolute top-3 right-3">
                    <span class="inline-flex items-center rounded-lg bg-white/95 backdrop-blur-sm px-3 py-1.5 text-xs font-bold text-gray-800 shadow-lg border border-gray-200/50">
                        {{ $tv->kategori->nama_kategori ?? 'Unknown' }}
                    </span>
                </div>
            </div>

            <!-- Body -->
            <div class="flex-1 px-6 py-6">
                <div class="flex items-center gap-1 mb-2 text-xs text-blue-600">
                     <svg class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M13.19 8.688a4.5 4.5 0 011.242 7.244l-4.5 4.5a4.5 4.5 0 01-6.364-6.364l1.757-1.757m13.35-.622l1.757-1.757a4.5 4.5 0 00-6.364-6.364l-4.5 4.5a4.5 4.5 0 001.242 7.244" />
                    </svg>
                    <span class="font-bold uppercase tracking-wider text-gray-400">Video Link</span>
                </div>
                
                <a href="{{ $tv->link }}" target="_blank" @click.stop class="text-sm font-medium text-gray-900 hover:text-blue-600 hover:underline break-all line-clamp-2">
                    {{ $tv->link }}
                </a>
            </div>

            <!-- Actions -->
            <div class="bg-gray-50 px-5 py-3 flex items-center justify-end gap-2 border-t border-gray-100 mt-auto" @click.stop>

                 <a href="{{ route('admin.tutorial-video.edit', $tv) }}" 
                   class="inline-flex justify-center items-center p-2 rounded-lg bg-white text-gray-400 shadow-sm ring-1 ring-inset ring-gray-200 hover:bg-gray-50 hover:text-[#8b9b7e] hover:ring-[#8b9b7e]/30 transition-all duration-200" title="Edit">
                    <svg class="h-4 w-4" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
                      <path stroke-linecap="round" stroke-linejoin="round" d="M16.862 4.487l1.687-1.688a1.875 1.875 0 112.652 2.652L10.582 16.07a4.5 4.5 0 01-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 011.13-1.897l8.932-8.931zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0115.75 21H5.25A2.25 2.25 0 013 18.75V8.25A2.25 2.25 0 015.25 6H10" />
                    </svg>
                </a>
                
                <button type="button" 
                        @click="$dispatch('confirm-delete', { 
                            title: 'Delete Video?', 
                            message: 'Are you sure you want to delete this tutorial video? This action cannot be undone.',
                            formId: 'delete-form-{{ $tv->id }}' 
                        })"
                        class="inline-flex justify-center items-center p-2 rounded-lg bg-white text-gray-400 shadow-sm ring-1 ring-inset ring-gray-200 hover:bg-red-50 hover:text-red-500 hover:ring-red-200 transition-all duration-200" title="Delete">
                    <svg class="h-4 w-4" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
                      <path stroke-linecap="round" stroke-linejoin="round" d="M14.74 9l-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 01-2.244 2.077H8.084a2.25 2.25 0 01-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 00-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 013.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 00-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 00-7.5 0" />
                    </svg>
                </button>
                
                <form action="{{ route('admin.tutorial-video.destroy', $tv) }}" 
                      method="POST" 
                      id="delete-form-{{ $tv->id }}"
                      class="hidden">
                    @csrf
                    @method('DELETE')
                </form>
            </div>
        </div>
        @endforeach
    </div>

    <div class="mt-8">
        {{ $tutorial_videos->links() }}
    </div>

    @endif

    <!-- Enhanced View Modal -->
    <template x-teleport="body">
        <div x-show="showViewModal" 
             class="fixed inset-0 z-[100] overflow-y-auto" 
             style="display: none;"
             x-show="showViewModal">
            <div class="flex min-h-full items-center justify-center p-4">
                <div x-show="showViewModal"
                     x-transition:enter="transition ease-out duration-300"
                     x-transition:enter-start="opacity-0"
                     x-transition:enter-end="opacity-100"
                     x-transition:leave="transition ease-in duration-200"
                     x-transition:leave-start="opacity-100"
                     x-transition:leave-end="opacity-0"
                     class="fixed inset-0 bg-gray-900/80 backdrop-blur-md transition-opacity" 
                     @click="showViewModal = false"></div>

                <div x-show="showViewModal"
                     x-transition:enter="transition ease-out duration-300"
                     x-transition:enter-start="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95"
                     x-transition:enter-end="opacity-100 translate-y-0 sm:scale-100"
                     x-transition:leave="transition ease-in duration-200"
                     x-transition:leave-start="opacity-100 translate-y-0 sm:scale-100"
                     x-transition:leave-end="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95"
                     class="relative transform overflow-hidden rounded-2xl bg-white shadow-2xl transition-all w-full max-w-4xl"
                     x-data="{ playing: false, copied: false }">
                    
                    <!-- Header -->
                    <div class="relative bg-gradient-to-r from-[#8b9b7e] to-[#7a8a6f] px-6 py-4">
                        <div class="flex items-center justify-between">
                            <div class="flex items-center gap-3">
                                <div class="flex h-10 w-10 items-center justify-center rounded-lg bg-white/20 backdrop-blur-sm">
                                    <svg class="h-6 w-6 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M15.91 11.672a.375.375 0 010 .656l-5.603 3.113a.375.375 0 01-.557-.328V8.887c0-.286.307-.466.557-.327l5.603 3.112z" />
                                    </svg>
                                </div>
                                <div>
                                    <h3 class="text-lg font-bold text-white">Video Tutorial</h3>
                                    <p class="text-sm text-white/80" x-text="'#' + selectedItem.id"></p>
                                </div>
                            </div>
                            <button @click="showViewModal = false" class="rounded-lg p-2 text-white/80 hover:text-white hover:bg-white/20 transition-all">
                                <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                                </svg>
                            </button>
                        </div>
                    </div>

                    <div class="bg-white">
                        <!-- Video Player Section -->
                        <div class="relative bg-black">
                            <template x-if="!playing && getEmbedUrl(selectedItem.link)">
                                <!-- Thumbnail with Play Button -->
                                <div @click="playing = true" class="relative aspect-video bg-gradient-to-br from-gray-900 to-gray-800 cursor-pointer group">
                                    <img :src="'https://img.youtube.com/vi/' + selectedItem.link.match(/(?:youtube\.com\/(?:[^\/]+\/.+\/|(?:v|e(?:mbed)?)\/|.*[?&]v=)|youtu\.be\/)([^\"&?\/\s]{11})/i)?.[1] + '/maxresdefault.jpg'" 
                                         alt="Video thumbnail" 
                                         class="w-full h-full object-cover"
                                         onerror="this.style.display='none'">
                                    <div class="absolute inset-0 flex items-center justify-center bg-gradient-to-t from-black/70 via-black/40 to-transparent group-hover:from-black/80 group-hover:via-black/50 transition-all duration-300">
                                        <div class="flex flex-col items-center gap-3">
                                            <div class="flex items-center justify-center h-20 w-20 rounded-full bg-red-600 hover:bg-red-700 shadow-2xl ring-4 ring-white/50 transition-all duration-300 group-hover:scale-110">
                                                <svg class="h-9 w-9 text-white ml-1" fill="currentColor" viewBox="0 0 20 20">
                                                    <path d="M6.3 2.841A1.5 1.5 0 004 4.11V15.89a1.5 1.5 0 002.3 1.269l9.344-5.89a1.5 1.5 0 000-2.538L6.3 2.84z" />
                                                </svg>
                                            </div>
                                            <span class="text-white font-semibold text-sm">Click to Play</span>
                                        </div>
                                    </div>
                                </div>
                            </template>

                            <template x-if="playing || !getEmbedUrl(selectedItem.link)">
                                <div class="rounded-lg overflow-hidden border-4 border-black bg-black aspect-video flex items-center justify-center relative">
                                    <template x-if="getEmbedUrl(selectedItem.link)">
                                        <iframe :src="getEmbedUrl(selectedItem.link) + '?autoplay=1'" 
                                                class="w-full h-full absolute inset-0" 
                                                frameborder="0" 
                                                allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" 
                                                referrerpolicy="strict-origin-when-cross-origin" 
                                                allowfullscreen></iframe>
                                    </template>
                                    <template x-if="!getEmbedUrl(selectedItem.link)">
                                        <div class="w-full h-full flex flex-col gap-3 items-center justify-center text-white p-6 text-center">
                                            <div class="flex h-16 w-16 items-center justify-center rounded-full bg-white/10">
                                                <svg class="h-8 w-8 opacity-50" fill="currentColor" viewBox="0 0 24 24">
                                                    <path d="M8 5v14l11-7z" />
                                                </svg>
                                            </div>
                                            <p class="text-sm text-gray-300">Preview not available for this link format.</p>
                                            <a :href="selectedItem.link" target="_blank" class="inline-flex items-center gap-2 rounded-lg bg-white/20 hover:bg-white/30 px-4 py-2 text-sm font-semibold transition-all">
                                                <svg class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                                    <path stroke-linecap="round" stroke-linejoin="round" d="M13.5 6H5.25A2.25 2.25 0 003 8.25v10.5A2.25 2.25 0 005.25 21h10.5A2.25 2.25 0 0018 18.75V10.5m-10.5 6L21 3m0 0h-5.25M21 3v5.25" />
                                                </svg>
                                                Open Video Link
                                            </a>
                                        </div>
                                    </template>
                                </div>
                            </template>
                        </div>

                        <!-- Information & Actions -->
                        <div class="p-6">
                            <!-- Category Badge -->
                            <div class="mb-4">
                                <span class="inline-flex items-center gap-1.5 rounded-lg bg-purple-100 px-3 py-1.5 text-sm font-bold text-purple-700">
                                    <svg class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M3.75 6A2.25 2.25 0 016 3.75h2.25A2.25 2.25 0 0110.5 6v2.25a2.25 2.25 0 01-2.25 2.25H6a2.25 2.25 0 01-2.25-2.25V6zM3.75 15.75A2.25 2.25 0 016 13.5h2.25a2.25 2.25 0 012.25 2.25V18a2.25 2.25 0 01-2.25 2.25H6A2.25 2.25 0 013.75 18v-2.25zM13.5 6a2.25 2.25 0 012.25-2.25H18A2.25 2.25 0 0120.25 6v2.25A2.25 2.25 0 0118 10.5h-2.25a2.25 2.25 0 01-2.25-2.25V6zM13.5 15.75a2.25 2.25 0 012.25-2.25H18a2.25 2.25 0 012.25 2.25V18A2.25 2.25 0 0118 20.25h-2.25A2.25 2.25 0 0113.5 18v-2.25z" />
                                    </svg>
                                    <span x-text="selectedItem.kategori"></span>
                                </span>
                            </div>

                            <!-- Video Link -->
                            <div class="mb-4">
                                <label class="block text-xs font-bold text-gray-500 uppercase tracking-wider mb-2">Video URL</label>
                                <div class="flex items-center gap-2">
                                    <a :href="selectedItem.link" target="_blank" class="flex-1 text-sm text-blue-600 font-medium hover:underline break-all bg-blue-50 px-3 py-2 rounded-lg border border-blue-100" x-text="selectedItem.link"></a>
                                    
                                    <!-- Animated Copy Button -->
                                    <div class="relative flex-shrink-0">
                                        <button @click="navigator.clipboard.writeText(selectedItem.link); copied = true; setTimeout(() => copied = false, 2000)" 
                                                class="p-2 rounded-lg transition-all duration-300 transform"
                                                :class="copied ? 'bg-green-100 text-green-600 scale-110' : 'bg-gray-100 hover:bg-gray-200 text-gray-600'"
                                                :title="copied ? 'Copied!' : 'Copy link'">
                                            <!-- Clipboard Icon (default) -->
                                            <svg x-show="!copied" class="h-5 w-5 transition-all" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                                <path stroke-linecap="round" stroke-linejoin="round" d="M8 16H6a2 2 0 01-2-2V6a2 2 0 012-2h8a2 2 0 012 2v2m-6 12h8a2 2 0 002-2v-8a2 2 0 00-2-2h-8a2 2 0 00-2 2v8a2 2 0 002 2z" />
                                            </svg>
                                            <!-- Checkmark Icon (copied) -->
                                            <svg x-show="copied" style="display: none;" class="h-5 w-5 transition-all" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5">
                                                <path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7" />
                                            </svg>
                                        </button>
                                        
                                        <!-- Tooltip -->
                                        <div x-show="copied" 
                                             x-transition:enter="transition ease-out duration-200"
                                             x-transition:enter-start="opacity-0 -translate-y-1"
                                             x-transition:enter-end="opacity-100 translate-y-0"
                                             x-transition:leave="transition ease-in duration-150"
                                             x-transition:leave-start="opacity-100 translate-y-0"
                                             x-transition:leave-end="opacity-0 -translate-y-1"
                                             style="display: none;"
                                             class="absolute -top-10 left-1/2 -translate-x-1/2 px-3 py-1.5 bg-gray-900 text-white text-xs font-semibold rounded-lg shadow-lg whitespace-nowrap">
                                            Copied!
                                            <div class="absolute left-1/2 -translate-x-1/2 -bottom-1 w-2 h-2 bg-gray-900 rotate-45"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Quick Actions -->
                            <div class="flex flex-wrap gap-3 pt-4 border-t border-gray-100">
                                <a :href="selectedItem.link" target="_blank" class="inline-flex items-center gap-2 rounded-lg bg-red-600 hover:bg-red-700 px-4 py-2.5 text-sm font-semibold text-white shadow-sm transition-all">
                                    <svg class="h-4 w-4" fill="currentColor" viewBox="0 0 24 24">
                                        <path d="M23.498 6.186a3.016 3.016 0 0 0-2.122-2.136C19.505 3.545 12 3.545 12 3.545s-7.505 0-9.377.505A3.017 3.017 0 0 0 .502 6.186C0 8.07 0 12 0 12s0 3.93.502 5.814a3.016 3.016 0 0 0 2.122 2.136c1.871.505 9.376.505 9.376.505s7.505 0 9.377-.505a3.015 3.015 0 0 0 2.122-2.136C24 15.93 24 12 24 12s0-3.93-.502-5.814zM9.545 15.568V8.432L15.818 12l-6.273 3.568z"/>
                                    </svg>
                                    Watch on YouTube
                                </a>
                                <button @click="playing = !playing" x-show="getEmbedUrl(selectedItem.link)" class="inline-flex items-center gap-2 rounded-lg bg-gray-100 hover:bg-gray-200 px-4 py-2.5 text-sm font-semibold text-gray-700 transition-all">
                                    <svg class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2" x-show="!playing">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M5.25 5.653c0-.856.917-1.398 1.667-.986l11.54 6.348a1.125 1.125 0 010 1.971l-11.54 6.347a1.125 1.125 0 01-1.667-.985V5.653z" />
                                    </svg>
                                    <svg class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2" x-show="playing" style="display: none;">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 5.25v13.5m-7.5-13.5v13.5" />
                                    </svg>
                                    <span x-text="playing ? 'Stop' : 'Play'"></span>
                                </button>
                            </div>
                        </div>
                    </div>

                    <!-- Footer -->
                    <div class="bg-gray-50 px-6 py-4 flex justify-end border-t border-gray-100">
                        <button type="button" 
                                class="inline-flex items-center gap-2 rounded-lg bg-white hover:bg-gray-50 px-5 py-2.5 text-sm font-semibold text-gray-700 shadow-sm ring-1 ring-inset ring-gray-200 hover:ring-gray-300 transition-all" 
                                @click="showViewModal = false; playing = false;">
                            <svg class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                            </svg>
                            Close
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </template>
</div>
@endsection
