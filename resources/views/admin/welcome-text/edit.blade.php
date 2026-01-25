@extends('layouts.admin')

@section('title', 'Manage Welcome Text')
@section('page-title', 'Manage Welcome Text')

@section('content')
<div class="mx-auto max-w-3xl">
    <form action="{{ route('admin.welcome-text.update', $welcomeText) }}" method="POST" class="space-y-6">
        @csrf
        @method('PUT')

        <div class="overflow-hidden bg-white shadow-sm ring-1 ring-gray-200 rounded-xl">
             <div class="border-b border-gray-100 bg-gray-50/50 px-4 py-4 sm:px-6">
                <h3 class="text-base font-semibold leading-6 text-gray-900">Manage Welcome Text</h3>
                <p class="mt-1 text-sm text-gray-500">Update the welcome text greeting and title below.</p>
            </div>
            <div class="px-4 py-6 sm:p-8">
                <div class="grid max-w-2xl grid-cols-1 gap-x-6 gap-y-8">
                    <!-- Greeting -->
                    <div class="col-span-full">
                        <label for="greeting" class="block text-sm font-medium leading-6 text-gray-900">
                            Greeting (e.g. "Welcome, Sobat Rensa")
                        </label>
                        <div class="mt-2 relative">
                            <input type="text" name="greeting" id="greeting" value="{{ old('greeting', $welcomeText->greeting) }}"
                                   class="block w-full rounded-lg border-0 py-3 px-3 text-gray-900 shadow-sm ring-1 ring-inset {{ $errors->has('greeting') ? 'ring-red-500 bg-red-50' : 'ring-gray-300' }} placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-[#8b9b7e] sm:text-sm sm:leading-6 transition-all duration-200">
                        </div>
                        @error('greeting')
                            <p class="mt-2 text-sm text-red-600 flex items-center gap-1">
                                <svg class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 9v3.75m9-.75a9 9 0 11-18 0 9 9 0 0118 0zm-9 3.75h.008v.008H12v-.008z" />
                                </svg>
                                {{ $message }}
                            </p>
                        @enderror
                    </div>

                    <!-- Title -->
                    <div class="col-span-full">
                        <label for="title" class="block text-sm font-medium leading-6 text-gray-900">
                            Title / Main Text <span class="text-red-500">*</span>
                        </label>
                        <div class="mt-2 relative">
                            <textarea name="title" id="title" rows="3" required
                                   class="block w-full rounded-lg border-0 py-3 px-3 text-gray-900 shadow-sm ring-1 ring-inset {{ $errors->has('title') ? 'ring-red-500 bg-red-50' : 'ring-gray-300' }} placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-[#8b9b7e] sm:text-sm sm:leading-6 transition-all duration-200">{{ old('title', $welcomeText->title) }}</textarea>
                        </div>
                        @error('title')
                            <p class="mt-2 text-sm text-red-600 flex items-center gap-1">
                                <svg class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 9v3.75m9-.75a9 9 0 11-18 0 9 9 0 0118 0zm-9 3.75h.008v.008H12v-.008z" />
                                </svg>
                                {{ $message }}
                            </p>
                        @enderror
                    </div>

                    <!-- Is Active -->
                    <div class="col-span-full">
                        <div class="relative flex items-start">
                            <div class="flex h-6 items-center">
                                <input id="is_active" name="is_active" type="checkbox" value="1" {{ old('is_active', $welcomeText->is_active) ? 'checked' : '' }}
                                       class="h-4 w-4 rounded border-gray-300 text-[#8b9b7e] focus:ring-[#8b9b7e]">
                            </div>
                            <div class="ml-3 text-sm leading-6">
                                <label for="is_active" class="font-medium text-gray-900">Active</label>
                                <p class="text-gray-500">Enable or disable this welcome text.</p>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
             <div class="flex items-center justify-end gap-x-4 border-t border-gray-100 bg-gray-50/50 px-4 py-4 sm:px-6">
                <a href="{{ route('admin.welcome-text.index') }}" 
                   class="rounded-lg px-4 py-2.5 text-sm font-semibold text-gray-700 hover:bg-gray-100 hover:text-gray-900 transition-colors">
                    Cancel
                </a>
                <button type="submit" 
                        class="rounded-lg bg-[#8b9b7e] px-4 py-2.5 text-sm font-semibold text-white shadow-sm hover:bg-[#7a8a6f] focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-[#8b9b7e] transition-all transform active:scale-95">
                    Save Changes
                </button>
            </div>
        </div>
    </form>
</div>
@endsection
