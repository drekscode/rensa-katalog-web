<div class="flex grow flex-col gap-y-5 overflow-y-auto bg-[#2d2d2d] px-6 pt-6 pb-4 shadow-xl">
    <div class="flex h-16 shrink-0 items-center border-b border-gray-700/30 pb-3">
        <div class="flex items-center gap-3">
            <div class="h-10 w-10 rounded-lg bg-white p-1 flex items-center justify-center overflow-hidden">
                <img src="{{ Vite::asset('resources/img/RENSA_ID_R_HITAM.png') }}" alt="Rensa Logo" class="h-full w-full object-contain">
            </div>
            <div>
                <h2 class="text-xl font-bold text-white">Rensa</h2>
                <p class="text-xs text-gray-400">Admin Panel</p>
            </div>
        </div>
    </div>
    <nav class="flex flex-1 flex-col">
        <ul role="list" class="flex flex-1 flex-col gap-y-7">
            <li>
                <ul role="list" class="-mx-2 space-y-1">
                    <li>
                        <a href="{{ route('admin.dashboard') }}" 
                           class="group flex gap-x-3 rounded-lg p-2.5 text-sm leading-6 font-medium transition-all duration-200 {{ request()->routeIs('admin.dashboard') ? 'bg-[#8b9b7e] text-white' : 'text-gray-300 hover:text-white hover:bg-gray-700/50' }}">
                            <svg class="h-5 w-5 shrink-0" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M2.25 12l8.954-8.955c.44-.439 1.152-.439 1.591 0L21.75 12M4.5 9.75v10.125c0 .621.504 1.125 1.125 1.125H9.75v-4.875c0-.621.504-1.125 1.125-1.125h2.25c.621 0 1.125.504 1.125 1.125V21h4.125c.621 0 1.125-.504 1.125-1.125V9.75M8.25 21h8.25" />
                            </svg>
                            Dashboard
                        </a>
                    </li>
                    
                    <li>
                        <a href="{{ route('admin.kategori.index') }}" 
                           class="group flex gap-x-3 rounded-lg p-2.5 text-sm leading-6 font-medium transition-all duration-200 {{ request()->routeIs('admin.kategori.*') ? 'bg-[#8b9b7e] text-white' : 'text-gray-300 hover:text-white hover:bg-gray-700/50' }}">
                            <svg class="h-5 w-5 shrink-0" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M9.568 3H5.25A2.25 2.25 0 003 5.25v4.318c0 .597.237 1.17.659 1.591l9.581 9.581c.699.699 1.78.872 2.607.33a18.095 18.095 0 005.223-5.223c.542-.827.369-1.908-.33-2.607L11.16 3.66A2.25 2.25 0 009.568 3z" />
                                <path stroke-linecap="round" stroke-linejoin="round" d="M6 6h.008v.008H6V6z" />
                            </svg>
                            Kategori
                        </a>
                    </li>

                    <li>
                        <a href="{{ route('admin.series.index') }}" 
                           class="group flex gap-x-3 rounded-lg p-2.5 text-sm leading-6 font-medium transition-all duration-200 {{ request()->routeIs('admin.series.*') ? 'bg-[#8b9b7e] text-white' : 'text-gray-300 hover:text-white hover:bg-gray-700/50' }}">
                            <svg class="h-5 w-5 shrink-0" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M6 6.878V6a2.25 2.25 0 012.25-2.25h7.5A2.25 2.25 0 0118 6v.878m-12 0c.235-.083.487-.128.75-.128h10.5c.263 0 .515.045.75.128m-12 0A2.25 2.25 0 004.5 9v.878m13.5-3A2.25 2.25 0 0119.5 9v.878m0 0a2.246 2.246 0 00-.75-.128H5.25c-.263 0-.515.045-.75.128m15 0A2.25 2.25 0 0121 12v6a2.25 2.25 0 01-2.25 2.25H5.25A2.25 2.25 0 013 18v-6c0-.98.626-1.813 1.5-2.122" />
                            </svg>
                            Series
                        </a>
                    </li>

                    <li>
                        <a href="{{ route('admin.product.index') }}" 
                           class="group flex gap-x-3 rounded-lg p-2.5 text-sm leading-6 font-medium transition-all duration-200 {{ request()->routeIs('admin.product.*') ? 'bg-[#8b9b7e] text-white' : 'text-gray-300 hover:text-white hover:bg-gray-700/50' }}">
                            <svg class="h-5 w-5 shrink-0" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M20.25 7.5l-.625 10.632a2.25 2.25 0 01-2.247 2.118H6.622a2.25 2.25 0 01-2.247-2.118L3.75 7.5M10 11.25h4M3.375 7.5h17.25c.621 0 1.125-.504 1.125-1.125v-1.5c0-.621-.504-1.125-1.125-1.125H3.375c-.621 0-1.125.504-1.125 1.125v1.5c0 .621.504 1.125 1.125 1.125z" />
                            </svg>
                            Products
                        </a>
                    </li>

                    <li>
                        <a href="{{ route('admin.rumus.index') }}" 
                           class="group flex gap-x-3 rounded-lg p-2.5 text-sm leading-6 font-medium transition-all duration-200 {{ request()->routeIs('admin.rumus.*') ? 'bg-[#8b9b7e] text-white' : 'text-gray-300 hover:text-white hover:bg-gray-700/50' }}">
                            <svg class="h-5 w-5 shrink-0" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 15.75V18m-7.5-6.75h.008v.008H8.25v-.008zm0 2.25h.008v.008H8.25V13.5zm0 2.25h.008v.008H8.25v-.008zm0 2.25h.008v.008H8.25V18zm2.498-6.75h.007v.008h-.007v-.008zm0 2.25h.007v.008h-.007V13.5zm0 2.25h.007v.008h-.007v-.008zm0 2.25h.007v.008h-.007V18zm2.504-6.75h.008v.008h-.008v-.008zm0 2.25h.008v.008h-.008V13.5zm0 2.25h.008v.008h-.008v-.008zm0 2.25h.008v.008h-.008V18zm2.498-6.75h.008v.008h-.008v-.008zm0 2.25h.008v.008h-.008V13.5zM8.25 6h7.5v2.25h-7.5V6zM12 2.25c-1.892 0-3.758.11-5.593.322C5.307 2.7 4.5 3.65 4.5 4.757V19.5a2.25 2.25 0 002.25 2.25h10.5a2.25 2.25 0 002.25-2.25V4.757c0-1.108-.806-2.057-1.907-2.185A48.507 48.507 0 0012 2.25z" />
                            </svg>
                            Rumus
                        </a>
                    </li>

                    <li>
                        <a href="{{ route('admin.banner.index') }}" 
                           class="group flex gap-x-3 rounded-lg p-2.5 text-sm leading-6 font-medium transition-all duration-200 {{ request()->routeIs('admin.banner.*') ? 'bg-[#8b9b7e] text-white' : 'text-gray-300 hover:text-white hover:bg-gray-700/50' }}">
                            <svg class="h-5 w-5 shrink-0" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M2.25 15.75l5.159-5.159a2.25 2.25 0 013.182 0l5.159 5.159m-1.5-1.5l1.409-1.409a2.25 2.25 0 013.182 0l2.909 2.909m-18 3.75h16.5a1.5 1.5 0 001.5-1.5V6a1.5 1.5 0 00-1.5-1.5H3.75A1.5 1.5 0 002.25 6v12a1.5 1.5 0 001.5 1.5zm10.5-11.25h.008v.008h-.008V8.25zm.375 0a.375.375 0 11-.75 0 .375.375 0 01.75 0z" />
                            </svg>
                            Banners
                        </a>
                    </li>

                    <li>
                        <a href="{{ route('admin.toko.index') }}" 
                           class="group flex gap-x-3 rounded-lg p-2.5 text-sm leading-6 font-medium transition-all duration-200 {{ request()->routeIs('admin.toko.*') ? 'bg-[#8b9b7e] text-white' : 'text-gray-300 hover:text-white hover:bg-gray-700/50' }}">
                            <svg class="h-5 w-5 shrink-0" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M13.5 21v-7.5a.75.75 0 01.75-.75h3a.75.75 0 01.75.75V21m-4.5 0H2.36m11.14 0H18m0 0h3.64m-1.39 0V9.349m-16.5 11.65V9.35m0 0a3.001 3.001 0 003.75-.615A2.993 2.993 0 009.75 9.75c.896 0 1.7-.393 2.25-1.016a2.993 2.993 0 002.25 1.016c.896 0 1.7-.393 2.25-1.016a3.001 3.001 0 003.75.614m-16.5 0a3.004 3.004 0 01-.621-4.72L4.318 3.44A1.5 1.5 0 015.378 3h13.243a1.5 1.5 0 011.06.44l1.19 1.189a3 3 0 01-.621 4.72m-13.5 8.65h3.75a.75.75 0 00.75-.75V13.5a.75.75 0 00-.75-.75H6.75a.75.75 0 00-.75.75v3.75c0 .415.336.75.75.75z" />
                            </svg>
                            Toko
                        </a>
                    </li>

                    <li>
                        <a href="{{ route('admin.artikel.index') }}" 
                           class="group flex gap-x-3 rounded-lg p-2.5 text-sm leading-6 font-medium transition-all duration-200 {{ request()->routeIs('admin.artikel.*') ? 'bg-[#8b9b7e] text-white' : 'text-gray-300 hover:text-white hover:bg-gray-700/50' }}">
                            <svg class="h-5 w-5 shrink-0" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M12 7.5h1.5m-1.5 3h1.5m-7.5 3h7.5m-7.5 3h7.5m3-9h3.375c.621 0 1.125.504 1.125 1.125V18a2.25 2.25 0 01-2.25 2.25M16.5 7.5V18a2.25 2.25 0 002.25 2.25M16.5 7.5V4.875c0-.621-.504-1.125-1.125-1.125H4.125C3.504 3.75 3 4.254 3 4.875V18a2.25 2.25 0 002.25 2.25h13.5M6 7.5h3v3H6v-3z" />
                            </svg>
                            Artikel
                        </a>
                    </li>

                    <li>
                        <a href="{{ route('admin.tutorial-gambar.index') }}" 
                           class="group flex gap-x-3 rounded-lg p-2.5 text-sm leading-6 font-medium transition-all duration-200 {{ request()->routeIs('admin.tutorial-gambar.*') ? 'bg-[#8b9b7e] text-white' : 'text-gray-300 hover:text-white hover:bg-gray-700/50' }}">
                            <svg class="h-5 w-5 shrink-0" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M4.26 10.147a60.436 60.436 0 00-.491 6.347A48.627 48.627 0 0112 20.904a48.627 48.627 0 018.232-4.41 60.46 60.46 0 00-.491-6.347m-15.482 0a50.57 50.57 0 00-2.658-.813A59.905 59.905 0 0112 3.493a59.902 59.902 0 0110.399 5.84c-.896.248-1.783.52-2.658.814m-15.482 0A50.697 50.697 0 0112 13.489a50.702 50.702 0 017.74-3.342M6.75 15a.75.75 0 100-1.5.75.75 0 000 1.5zm0 0v-3.675A55.378 55.378 0 0112 8.443m-7.007 11.55A5.981 5.981 0 006.75 15.75v-1.5" />
                            </svg>
                            Tutorial Gambar
                        </a>
                    </li>

                    <li>
                        <a href="{{ route('admin.tutorial-video.index') }}" 
                           class="group flex gap-x-3 rounded-lg p-2.5 text-sm leading-6 font-medium transition-all duration-200 {{ request()->routeIs('admin.tutorial-video.*') ? 'bg-[#8b9b7e] text-white' : 'text-gray-300 hover:text-white hover:bg-gray-700/50' }}">
                            <svg class="h-5 w-5 shrink-0" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                                <path stroke-linecap="round" stroke-linejoin="round" d="M15.91 11.672a.375.375 0 010 .656l-5.603 3.113a.375.375 0 01-.557-.328V8.887c0-.286.307-.466.557-.327l5.603 3.112z" />
                            </svg>
                            Tutorial Video
                        </a>
                    </li>
                </ul>
            </li>
        </ul>
    </nav>
</div>
