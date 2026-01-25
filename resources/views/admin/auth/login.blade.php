<!DOCTYPE html>
<html lang="en" class="h-full">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="icon" href="{{ asset('RENSA_ID_R_PUTIH.png') }}" media="(prefers-color-scheme: dark)" type="image/png">
    <link rel="icon" href="{{ asset('RENSA_ID_R_HITAM.png') }}" media="(prefers-color-scheme: light)" type="image/png">
    <title>Login - Rensa Katalog Admin</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="h-full bg-[#faf9f6] overflow-hidden antialiased font-sans">
    <!-- Animated Background Elements -->
    <div class="fixed inset-0 -z-10 overflow-hidden">
        <div class="absolute -top-[20%] -left-[10%] w-[50%] h-[50%] rounded-full bg-[#8b9b7e]/20 blur-[100px] animate-blob"></div>
        <div class="absolute top-[40%] -right-[10%] w-[50%] h-[50%] rounded-full bg-[#8b9b7e]/20 blur-[100px] animate-blob animation-delay-2000"></div>
        <div class="absolute -bottom-[20%] left-[20%] w-[50%] h-[50%] rounded-full bg-gray-200/50 blur-[100px] animate-blob animation-delay-4000"></div>
    </div>

    <!-- Main Container -->
    <div class="min-h-full flex items-center justify-center py-12 px-4 sm:px-6 lg:px-8">
        <div class="max-w-md w-full space-y-8 relative z-10">
            <!-- Logo and Header -->
            <div class="text-center animate-fade-in-down">
                <div class="flex justify-center mb-6">
                    <div class="h-28 w-28 rounded-3xl bg-[#8b9b7e] shadow-[0_8px_32px_rgba(31,38,135,0.15)] border border-[#8b9b7e]/50 flex items-center justify-center transform hover:scale-110 hover:rotate-3 transition-all duration-500 p-4 ring-4 ring-[#8b9b7e]/20">
                        <img src="{{ asset('RENSA_ID_R_PUTIH.png') }}" alt="Rensa Logo" class="h-full w-full object-contain filter drop-shadow-md">
                    </div>
                </div>
                <h2 class="text-4xl font-extrabold text-[#2d2d2d] tracking-tight mb-2">
                    Rensa Katalog
                </h2>
                <div class="inline-flex items-center gap-2 px-3 py-1 rounded-full bg-white/40 border border-white/50 backdrop-blur-sm text-sm font-medium text-gray-600 shadow-sm">
                    <span class="w-1.5 h-1.5 rounded-full bg-[#8b9b7e] animate-pulse"></span>
                    Admin Panel Access
                </div>
            </div>

            <!-- Login Form Card -->
            <div class="bg-white/70 backdrop-blur-xl rounded-3xl shadow-[0_8px_32px_rgba(0,0,0,0.05)] p-8 sm:p-10 space-y-6 border border-white/60 animate-fade-in-up relative overflow-hidden group">
                
                <!-- Decorative Top Line -->
                <div class="absolute top-0 left-0 w-full h-1 bg-gradient-to-r from-transparent via-[#8b9b7e] to-transparent opacity-50"></div>

                @if($errors->any())
                    <div class="rounded-xl bg-red-50/80 border border-red-200/80 p-4 backdrop-blur-sm animate-shake">
                        <div class="flex">
                            <div class="flex-shrink-0">
                                <svg class="h-5 w-5 text-red-500" viewBox="0 0 20 20" fill="currentColor">
                                    <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zM8.28 7.22a.75.75 0 00-1.06 1.06L8.94 10l-1.72 1.72a.75.75 0 101.06 1.06L10 11.06l1.72 1.72a.75.75 0 101.06-1.06L11.06 10l1.72-1.72a.75.75 0 00-1.06-1.06L10 8.94 8.28 7.22z" clip-rule="evenodd" />
                                </svg>
                            </div>
                            <div class="ml-3">
                                <h3 class="text-sm font-medium text-red-800">
                                    {{ $errors->first() }}
                                </h3>
                            </div>
                        </div>
                    </div>
                @endif

                <form method="POST" action="{{ route('admin.login.post') }}" class="space-y-6">
                    @csrf
                    
                    <!-- Email Field -->
                    <div class="space-y-1">
                        <label for="email" class="block text-sm font-semibold text-gray-700 ml-1">
                            Email Address
                        </label>
                        <div class="relative group/input">
                            <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none transition-colors duration-300">
                                <svg class="h-5 w-5 text-gray-400 group-focus-within/input:text-[#8b9b7e]" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M21.75 6.75v10.5a2.25 2.25 0 01-2.25 2.25h-15a2.25 2.25 0 01-2.25-2.25V6.75m19.5 0A2.25 2.25 0 0019.5 4.5h-15a2.25 2.25 0 00-2.25 2.25m19.5 0v.243a2.25 2.25 0 01-1.07 1.916l-7.5 4.615a2.25 2.25 0 01-2.36 0L3.32 8.91a2.25 2.25 0 01-1.07-1.916V6.75" />
                                </svg>
                            </div>
                            <input 
                                id="email" 
                                name="email" 
                                type="email" 
                                required 
                                class="block w-full pl-12 pr-4 py-3.5 border border-gray-200/80 rounded-xl text-gray-900 placeholder-gray-400 bg-white/50 focus:bg-white focus:outline-none focus:ring-4 focus:ring-[#8b9b7e]/10 focus:border-[#8b9b7e] transition-all duration-300 shadow-sm"
                                placeholder="name@company.com"
                                value="{{ old('email') }}"
                            >
                        </div>
                    </div>

                    <!-- Password Field -->
                    <div class="space-y-1">
                        <label for="password" class="block text-sm font-semibold text-gray-700 ml-1">
                            Password
                        </label>
                        <div class="relative group/input">
                            <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none">
                                <svg class="h-5 w-5 text-gray-400 group-focus-within/input:text-[#8b9b7e] transition-colors duration-300" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M16.5 10.5V6.75a4.5 4.5 0 10-9 0v3.75m-.75 11.25h10.5a2.25 2.25 0 002.25-2.25v-6.75a2.25 2.25 0 00-2.25-2.25H6.75a2.25 2.25 0 00-2.25 2.25v6.75a2.25 2.25 0 002.25 2.25z" />
                                </svg>
                            </div>
                            <input 
                                id="password" 
                                name="password" 
                                type="password" 
                                required 
                                class="block w-full pl-12 pr-4 py-3.5 border border-gray-200/80 rounded-xl text-gray-900 placeholder-gray-400 bg-white/50 focus:bg-white focus:outline-none focus:ring-4 focus:ring-[#8b9b7e]/10 focus:border-[#8b9b7e] transition-all duration-300 shadow-sm"
                                placeholder="••••••••"
                            >
                        </div>
                    </div>

                    <!-- Submit Button -->
                    <div class="pt-4">
                        <button 
                            type="submit" 
                            class="group relative w-full flex justify-center py-3.5 px-4 border border-transparent text-sm font-bold uppercase tracking-wider rounded-xl text-white bg-[#8b9b7e] hover:bg-[#7a8a6f] focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-[#8b9b7e] transition-all duration-300 transform hover:-translate-y-0.5 shadow-lg hover:shadow-[#8b9b7e]/40 overflow-hidden"
                        >
                            <span class="absolute right-0 inset-y-0 flex items-center pr-5 opacity-0 group-hover:opacity-100 group-hover:translate-x-0 translate-x-4 transition-all duration-300">
                                <svg class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3" />
                                </svg>
                            </span>
                            <span class="relative group-hover:-translate-x-3 transition-transform duration-300">Sign In to Dashboard</span>
                        </button>
                    </div>
                </form>

                <!-- Footer Info -->
                <div class="text-center pt-2">
                    <p class="text-xs text-gray-400 font-medium tracking-wide flex items-center justify-center gap-1.5">
                        <svg class="h-3.5 w-3.5" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M9 12.75L11.25 15 15 9.75m-3-7.036A11.959 11.959 0 013.598 6 11.99 11.99 0 003 9.749c0 5.592 3.824 10.29 9 11.623 5.176-1.332 9-6.03 9-11.622 0-1.31-.21-2.571-.598-3.751h-.152c-3.196 0-6.1-1.248-8.25-3.285z" />
                        </svg>
                        SECURED ADMIN ACCESS
                    </p>
                </div>
            </div>

            <!-- Version Info -->
            <p class="text-center text-xs text-gray-400 animate-fade-in font-medium">
                &copy; {{ date('Y') }} Rensa Katalog. All rights reserved.
            </p>
        </div>
    </div>

    <!-- Custom Animations -->
    <style>
        @keyframes blob {
            0% { transform: translate(0px, 0px) scale(1); }
            33% { transform: translate(30px, -50px) scale(1.1); }
            66% { transform: translate(-20px, 20px) scale(0.9); }
            100% { transform: translate(0px, 0px) scale(1); }
        }
        .animate-blob {
            animation: blob 7s infinite;
        }
        .animation-delay-2000 {
            animation-delay: 2s;
        }
        .animation-delay-4000 {
            animation-delay: 4s;
        }
        
        @keyframes fade-in-down {
            0% { opacity: 0; transform: translateY(-20px); }
            100% { opacity: 1; transform: translateY(0); }
        }
        .animate-fade-in-down {
            animation: fade-in-down 0.8s ease-out forwards;
        }

        @keyframes fade-in-up {
            0% { opacity: 0; transform: translateY(20px); }
            100% { opacity: 1; transform: translateY(0); }
        }
        .animate-fade-in-up {
            animation: fade-in-up 0.8s ease-out 0.2s forwards;
            opacity: 0;
        }
        
        @keyframes shake {
            0%, 100% { transform: translateX(0); }
            10%, 30%, 50%, 70%, 90% { transform: translateX(-4px); }
            20%, 40%, 60%, 80% { transform: translateX(4px); }
        }
        .animate-shake {
            animation: shake 0.5s cubic-bezier(.36,.07,.19,.97) both;
        }
        
        .animate-fade-in {
            animation: fade-in 1s ease-out 0.6s forwards;
            opacity: 0;
        }
        @keyframes fade-in {
            0% { opacity: 0; }
            100% { opacity: 1; }
        }
    </style>
</body>
</html>
