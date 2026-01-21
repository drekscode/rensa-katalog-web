<!DOCTYPE html>
<html lang="en" class="h-full">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Server Error - Rensa Katalog</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&family=Playfair+Display:wght@400;500;600;700&display=swap" rel="stylesheet">
    <style>
        body { font-family: 'Inter', sans-serif; }
        .font-primary { font-family: 'Playfair Display', serif; }
        .text-brand { color: #8b9b7e; }
        .bg-brand { background-color: #8b9b7e; }
        .hover-bg-brand-dark:hover { background-color: #7a8a6f; }
        .border-brand { border-color: #8b9b7e; }
    </style>
</head>
<body class="h-full bg-gray-50 flex items-center justify-center py-12 px-4 sm:px-6 lg:px-8">
    <div class="max-w-md w-full text-center space-y-8">
        <div>
            <div class="mx-auto h-24 w-24 bg-red-50 rounded-full flex items-center justify-center mb-6">
                <svg class="h-12 w-12 text-red-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                </svg>
            </div>
            <h1 class="text-9xl font-bold text-gray-200 font-primary">500</h1>
            <h2 class="mt-4 text-3xl font-extrabold text-gray-900 tracking-tight font-primary">Internal Server Error</h2>
            <p class="mt-2 text-base text-gray-500">Oops, something went wrong on our servers.</p>
        </div>
        <div class="mt-8 flex justify-center gap-4">
            <a href="{{ route('admin.dashboard') }}" class="inline-flex items-center px-4 py-2 border border-transparent text-sm font-medium rounded-lg text-white bg-brand hover:bg-[#7a8a6f] focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-[#8b9b7e] shadow-sm transition-all hover:scale-105">
                <svg class="mr-2 -ml-1 h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6" />
                </svg>
                Return to Dashboard
            </a>
        </div>
    </div>
</body>
</html>
