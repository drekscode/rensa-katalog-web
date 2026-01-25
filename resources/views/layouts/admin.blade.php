<!DOCTYPE html>
<html lang="en" class="h-full bg-[#faf9f6]">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="icon" href="{{ asset('RENSA_ID_R_PUTIH.png') }}" media="(prefers-color-scheme: dark)" type="image/png">
    <link rel="icon" href="{{ asset('RENSA_ID_R_HITAM.png') }}" media="(prefers-color-scheme: light)" type="image/png">
    <title>@yield('title', 'Admin Panel') - Rensa Katalog</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
    <style>
        .card-hover {
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
        }
        
        .card-hover:hover {
            transform: translateY(-2px);
            box-shadow: 0 10px 20px -5px rgba(0, 0, 0, 0.1);
        }
    </style>
</head>
<body class="h-full">
    <div x-data="{ sidebarOpen: false }" class="min-h-full">
        <!-- Mobile sidebar -->
        <div x-show="sidebarOpen" class="relative z-50 lg:hidden" x-cloak>
            <div x-show="sidebarOpen" 
                 x-transition:enter="transition-opacity ease-linear duration-300"
                 x-transition:enter-start="opacity-0"
                 x-transition:enter-end="opacity-100"
                 x-transition:leave="transition-opacity ease-linear duration-300"
                 x-transition:leave-start="opacity-100"
                 x-transition:leave-end="opacity-0"
                 class="fixed inset-0 bg-gray-900/80 backdrop-blur-sm"></div>

            <div class="fixed inset-0 flex">
                <div x-show="sidebarOpen"
                     x-transition:enter="transition ease-in-out duration-300 transform"
                     x-transition:enter-start="-translate-x-full"
                     x-transition:enter-end="translate-x-0"
                     x-transition:leave="transition ease-in-out duration-300 transform"
                     x-transition:leave-start="translate-x-0"
                     x-transition:leave-end="-translate-x-full"
                     class="relative mr-16 flex w-full max-w-xs flex-1">
                    <div class="absolute left-full top-0 flex w-16 justify-center pt-5">
                        <button @click="sidebarOpen = false" type="button" class="-m-2.5 p-2.5">
                            <span class="sr-only">Close sidebar</span>
                            <svg class="h-6 w-6 text-white" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                            </svg>
                        </button>
                    </div>
                    @include('layouts.partials.sidebar')
                </div>
            </div>
        </div>

        <!-- Desktop sidebar -->
        <div class="hidden lg:fixed lg:inset-y-0 lg:z-50 lg:flex lg:w-72 lg:flex-col">
            @include('layouts.partials.sidebar')
        </div>

        <div class="lg:pl-72">
            <!-- Top bar -->
            <div class="sticky top-0 z-40 flex h-16 shrink-0 items-center gap-x-4 bg-white border-b border-gray-200 shadow-sm px-4 sm:gap-x-6 sm:px-6 lg:px-8">
                <button @click="sidebarOpen = true" type="button" class="-m-2.5 p-2.5 text-gray-700 lg:hidden hover:text-[#8b9b7e] transition-colors">
                    <span class="sr-only">Open sidebar</span>
                    <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25h16.5" />
                    </svg>
                </button>

                <div class="h-6 w-px bg-gray-200 lg:hidden"></div>

                <div class="flex flex-1 gap-x-4 self-stretch lg:gap-x-6">
                    <div class="flex flex-1 items-center">
                        <h1 class="text-xl font-bold text-gray-800">
                            @yield('page-title', 'Dashboard')
                        </h1>
                    </div>
                    <div class="flex items-center gap-x-4 lg:gap-x-6">
                        <!-- User menu -->
                        <div x-data="{ open: false }" class="relative">
                            <button @click="open = !open" type="button" class="-m-1.5 flex items-center p-1.5 hover:bg-gray-50 rounded-lg transition-all duration-200">
                                <span class="sr-only">Open user menu</span>
                                <div class="h-9 w-9 rounded-lg bg-[#8b9b7e] flex items-center justify-center shadow-md">
                                    <span class="text-sm font-bold text-white">{{ substr(auth()->user()->name ?? 'A', 0, 1) }}</span>
                                </div>
                                <span class="hidden lg:flex lg:items-center">
                                    <span class="ml-3 text-sm font-semibold leading-6 text-gray-900">{{ auth()->user()->name ?? 'Admin' }}</span>
                                    <svg class="ml-2 h-5 w-5 text-gray-400" viewBox="0 0 20 20" fill="currentColor">
                                        <path fill-rule="evenodd" d="M5.23 7.21a.75.75 0 011.06.02L10 11.168l3.71-3.938a.75.75 0 111.08 1.04l-4.25 4.5a.75.75 0 01-1.08 0l-4.25-4.5a.75.75 0 01.02-1.06z" clip-rule="evenodd" />
                                    </svg>
                                </span>
                            </button>

                            <div x-show="open" 
                                 @click.away="open = false"
                                 x-transition:enter="transition ease-out duration-100"
                                 x-transition:enter-start="transform opacity-0 scale-95"
                                 x-transition:enter-end="transform opacity-100 scale-100"
                                 x-transition:leave="transition ease-in duration-75"
                                 x-transition:leave-start="transform opacity-100 scale-100"
                                 x-transition:leave-end="transform opacity-0 scale-95"
                                 class="absolute right-0 z-10 mt-2.5 w-48 origin-top-right rounded-xl bg-white shadow-xl ring-1 ring-gray-900/5 py-2"
                                 x-cloak>
                                <div class="px-3 py-2 border-b border-gray-200">
                                    <p class="text-sm font-medium text-gray-900">{{ auth()->user()->name ?? 'Admin' }}</p>
                                    <p class="text-xs text-gray-500">{{ auth()->user()->email ?? '' }}</p>
                                </div>
                                <form method="POST" action="{{ route('admin.logout') }}" class="mt-1">
                                    @csrf
                                    <button type="submit" class="w-full text-left px-3 py-2 text-sm leading-6 text-red-600 hover:bg-red-50 rounded-lg transition-colors flex items-center gap-2">
                                        <svg class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 9V5.25A2.25 2.25 0 0013.5 3h-6a2.25 2.25 0 00-2.25 2.25v13.5A2.25 2.25 0 007.5 21h6a2.25 2.25 0 002.25-2.25V15M12 9l-3 3m0 0l3 3m-3-3h12.75" />
                                        </svg>
                                        Logout
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Main content -->
            <main class="py-10">
                <div class="px-4 sm:px-6 lg:px-8">


                    @yield('content')
                </div>
            </main>
        </div>
    </div>

    <style>
        [x-cloak] { display: none !important; }
    </style>

    <!-- Global Image Lightbox -->
    <div x-data="{ 
            isOpen: false, 
            imageUrl: '', 
            scale: 1,
            init() {
                window.addEventListener('open-lightbox', (e) => {
                    this.imageUrl = e.detail.url;
                    this.isOpen = true;
                    this.scale = 1;
                });
            },
            zoomIn() { this.scale = Math.min(this.scale + 0.5, 4); },
            zoomOut() { this.scale = Math.max(this.scale - 0.5, 0.5); },
            reset() { this.scale = 1; },
            toggleZoom() {
                this.scale = this.scale === 1 ? 2 : 1;
            }
         }" 
         x-show="isOpen" 
         class="fixed inset-0 z-[200] flex items-center justify-center bg-black/90 backdrop-blur-sm"
         x-transition:enter="transition ease-out duration-300"
         x-transition:enter-start="opacity-0"
         x-transition:enter-end="opacity-100"
         x-transition:leave="transition ease-in duration-200"
         x-transition:leave-start="opacity-100"
         x-transition:leave-end="opacity-0"
         @keydown.escape.window="isOpen = false"
         x-cloak>
        
        <!-- Controls -->
        <div class="absolute top-5 right-5 flex items-center gap-4 z-[210]">
            <div class="flex items-center bg-white/10 backdrop-blur-md rounded-lg p-1 border border-white/20">
                <button @click="zoomOut()" class="p-2 text-white hover:bg-white/10 rounded-md transition-colors">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0zM13 10H7" /></svg>
                </button>
                <button @click="reset()" class="px-3 text-white hover:bg-white/10 rounded-md transition-colors text-sm font-medium" x-text="Math.round(scale * 100) + '%'"></button>
                <button @click="zoomIn()" class="p-2 text-white hover:bg-white/10 rounded-md transition-colors">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0zM10 7v3m0 0v3m0-3h3m-3 0H7" /></svg>
                </button>
            </div>
            <button @click="isOpen = false" class="p-2 text-white hover:bg-white/10 rounded-full transition-colors bg-white/10 backdrop-blur-md border border-white/20">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" /></svg>
            </button>
        </div>

        <!-- Image Container -->
        <div class="w-full h-full overflow-auto flex items-center justify-center p-10 cursor-zoom-out" @click.self="isOpen = false">
            <img :src="imageUrl" 
                 :style="`transform: scale(${scale}); transition: transform 0.2s ease-out; cursor: ${scale === 1 ? 'zoom-in' : 'zoom-out'}`"
                 class="max-w-none shadow-2xl rounded-lg origin-center"
                 @click.stop="toggleZoom()">
        </div>
    </div>

    <!-- Global Delete Confirmation Modal -->
    <div x-data="{ 
            isOpen: false, 
            title: '', 
            message: '', 
            formId: '',
            init() {
                window.addEventListener('confirm-delete', (e) => {
                    this.title = e.detail.title || 'Confirm Delete';
                    this.message = e.detail.message || 'Are you sure you want to delete this item? This action cannot be undone.';
                    this.formId = e.detail.formId;
                    this.isOpen = true;
                });
            },
            confirm() {
                if (this.formId) {
                    document.getElementById(this.formId).submit();
                }
                this.isOpen = false;
            }
         }" 
         x-show="isOpen" 
         class="fixed inset-0 z-[300] overflow-y-auto" 
         x-cloak>
        <div class="flex min-h-full items-end justify-center p-4 text-center sm:items-center sm:p-0">
            <div x-show="isOpen" 
                 x-transition:enter="transition ease-out duration-300"
                 x-transition:enter-start="opacity-0"
                 x-transition:enter-end="opacity-100"
                 x-transition:leave="transition ease-in duration-200"
                 x-transition:leave-start="opacity-100"
                 x-transition:leave-end="opacity-0"
                 class="fixed inset-0 bg-gray-900/50 backdrop-blur-sm transition-opacity" 
                 @click="isOpen = false"></div>

            <div x-show="isOpen"
                 x-transition:enter="transition ease-out duration-300"
                 x-transition:enter-start="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95"
                 x-transition:enter-end="opacity-100 translate-y-0 sm:scale-100"
                 x-transition:leave="transition ease-in duration-200"
                 x-transition:leave-start="opacity-100 translate-y-0 sm:scale-100"
                 x-transition:leave-end="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95"
                 class="relative transform overflow-hidden rounded-2xl bg-white text-left shadow-2xl transition-all sm:my-8 sm:w-full sm:max-w-lg">
                <div class="bg-white px-4 pb-4 pt-5 sm:p-6 sm:pb-4">
                    <div class="sm:flex sm:items-start">
                        <div class="mx-auto flex h-12 w-12 flex-shrink-0 items-center justify-center rounded-full bg-red-100 sm:mx-0 sm:h-10 sm:w-10 border border-red-200">
                            <svg class="h-6 w-6 text-red-600" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M12 9v3.75m-9.303 3.376c-.866 1.5.217 3.374 1.948 3.374h14.71c1.73 0 2.813-1.874 1.948-3.374L13.949 3.378c-.866-1.5-3.032-1.5-3.898 0L2.697 16.126zM12 15.75h.007v.008H12v-.008z" />
                            </svg>
                        </div>
                        <div class="mt-3 text-center sm:ml-4 sm:mt-0 sm:text-left">
                            <h3 class="text-lg font-bold leading-6 text-gray-900" x-text="title"></h3>
                            <div class="mt-2">
                                <p class="text-sm text-gray-500" x-text="message"></p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="bg-gray-50 px-4 py-3 sm:flex sm:flex-row-reverse sm:px-6 gap-3">
                    <button type="button" 
                            class="inline-flex w-full justify-center rounded-lg bg-red-600 px-4 py-2.5 text-sm font-semibold text-white shadow-sm hover:bg-red-500 sm:w-auto transition-colors" 
                            @click="confirm()">
                        Delete
                    </button>
                    <button type="button" 
                            class="mt-3 inline-flex w-full justify-center rounded-lg bg-white px-4 py-2.5 text-sm font-semibold text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 hover:bg-gray-50 sm:mt-0 sm:w-auto transition-colors" 
                            @click="isOpen = false">
                        Cancel
                    </button>
                </div>
            </div>
        </div>
    </div>

    <!-- Toast Notifications (Bottom Right) -->
    <div class="fixed bottom-6 right-6 z-[400] flex flex-col gap-3 pointer-events-none">
        @if(session('success'))
            <div x-data="{ show: true }" 
                 x-show="show"
                 x-init="setTimeout(() => show = false, 5000)"
                 x-transition:enter="transform ease-out duration-300 transition"
                 x-transition:enter-start="translate-y-2 opacity-0 sm:translate-y-0 sm:translate-x-2"
                 x-transition:enter-end="translate-y-0 opacity-100 sm:translate-x-0"
                 x-transition:leave="transition ease-in duration-200"
                 x-transition:leave-start="opacity-100"
                 x-transition:leave-end="opacity-0 translate-x-4"
                 class="pointer-events-auto w-full max-w-sm overflow-hidden bg-white/90 backdrop-blur-md rounded-xl shadow-[0_8px_30px_rgb(0,0,0,0.08)] ring-1 ring-black/5 border-l-4 border-[#8b9b7e] flex items-stretch cursor-pointer hover:bg-white transition-colors"
                 @click="show = false">
                <div class="flex-shrink-0 flex items-center justify-center w-12 bg-green-50">
                    <svg class="h-6 w-6 text-[#8b9b7e]" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M9 12.75L11.25 15 15 9.75M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                    </svg>
                </div>
                <div class="p-4 flex-1">
                    <div class="flex items-start">
                        <div class="flex-1">
                            <h3 class="text-sm font-semibold text-gray-900">Success!</h3>
                            <p class="mt-1 text-sm text-gray-500">{{ session('success') }}</p>
                        </div>
                        <button class="ml-4 inline-flex flex-shrink-0 text-gray-400 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2">
                            <span class="sr-only">Close</span>
                            <svg class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                            </svg>
                        </button>
                    </div>
                </div>
            </div>
        @endif

        @if(session('error'))
            <div x-data="{ show: true }" 
                 x-show="show"
                 x-init="setTimeout(() => show = false, 5000)"
                 x-transition:enter="transform ease-out duration-300 transition"
                 x-transition:enter-start="translate-y-2 opacity-0 sm:translate-y-0 sm:translate-x-2"
                 x-transition:enter-end="translate-y-0 opacity-100 sm:translate-x-0"
                 x-transition:leave="transition ease-in duration-200"
                 x-transition:leave-start="opacity-100"
                 x-transition:leave-end="opacity-0 translate-x-4"
                 class="pointer-events-auto w-full max-w-sm overflow-hidden bg-white/90 backdrop-blur-md rounded-xl shadow-[0_8px_30px_rgb(0,0,0,0.08)] ring-1 ring-black/5 border-l-4 border-red-500 flex items-stretch cursor-pointer hover:bg-white transition-colors"
                 @click="show = false">
                <div class="flex-shrink-0 flex items-center justify-center w-12 bg-red-50">
                    <svg class="h-6 w-6 text-red-500" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M12 9v3.75m9-.75a9 9 0 11-18 0 9 9 0 0118 0zm-9 3.75h.008v.008H12v-.008z" />
                    </svg>
                </div>
                <div class="p-4 flex-1">
                    <div class="flex items-start">
                        <div class="flex-1">
                            <h3 class="text-sm font-semibold text-gray-900">Error</h3>
                            <p class="mt-1 text-sm text-gray-500">{{ session('error') }}</p>
                        </div>
                        <button class="ml-4 inline-flex flex-shrink-0 text-gray-400 focus:outline-none focus:ring-2 focus:ring-red-500 focus:ring-offset-2">
                            <span class="sr-only">Close</span>
                            <svg class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                            </svg>
                        </button>
                    </div>
                </div>
            </div>
        @endif
    </div>
</body>
</html>
