<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Tripster Dashboard') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600,700&display=swap" rel="stylesheet" />
    <script src="https://cdn.tailwindcss.com"></script>

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <style>
        body { font-family: 'Figtree', sans-serif; }
        .sidebar-item-active {
            color: #2563eb;
            background-color: #f8fafc;
            border-left: 3px solid #2563eb;
        }
    </style>
</head>
<body class="bg-[#f9fafb] text-gray-900 antialiased">
    <div class="min-h-screen flex flex-col">
        <!-- Top Navigation -->
        <!-- Top Navigation -->
        <div class="sticky top-0 z-40">
            @include('layouts.header')
        </div>

        <div class="flex flex-1">
            <!-- Sidebar -->
            <aside class="w-64 bg-white border-r border-gray-100 hidden lg:flex flex-col pt-8 pb-4">
                <div class="px-6 mb-8">
                    <h3 class="text-lg font-bold">Profile settings</h3>
                </div>
                <nav class="flex-1 flex flex-col gap-1">
                    <a href="#" class="flex items-center gap-3 px-6 py-3 text-sm font-medium sidebar-item-active">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" /></svg>
                        Personal details
                    </a>
                    <a href="#" class="flex items-center gap-3 px-6 py-3 text-sm font-medium text-gray-500 hover:bg-gray-50 transition">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 10h18M7 15h1m4 0h1m-7 4h12a2 2 0 002-2V7a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z" /></svg>
                        Payment information
                    </a>
                    <a href="#" class="flex items-center gap-3 px-6 py-3 text-sm font-medium text-gray-500 hover:bg-gray-50 transition">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z" /></svg>
                        Safety
                    </a>
                    <a href="#" class="flex items-center gap-3 px-6 py-3 text-sm font-medium text-gray-500 hover:bg-gray-50 transition">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z" /><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" /></svg>
                        Preferences
                    </a>
                    <a href="#" class="flex items-center gap-3 px-6 py-3 text-sm font-medium text-gray-500 hover:bg-gray-50 transition">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9" /></svg>
                        Notifications
                    </a>
                    <a href="#" class="flex items-center gap-3 px-6 py-3 text-sm font-medium text-gray-500 hover:bg-gray-50 transition">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M18 9v3m0 0v3m0-3h3m-3 0h-3m-2-5a4 4 0 11-8 0 4 4 0 018 0zM3 20a6 6 0 0112 0v1H3v-1z" /></svg>
                        Add other passengers
                    </a>
                </nav>
                <div class="px-6 py-8 border-t border-gray-100">
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button type="submit" class="flex items-center gap-3 text-sm font-medium text-gray-600 hover:text-red-600 transition group">
                            <svg class="w-5 h-5 group-hover:text-red-600 transition" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1" /></svg>
                            Log out
                        </button>
                    </form>
                </div>
            </aside>

            <!-- Main Content -->
            <main class="flex-1 p-8 md:p-12 lg:p-16">
                <div class="max-w-4xl mx-auto flex flex-col md:flex-row gap-8">
                    <div class="flex-1">
                        <h1 class="text-2xl font-bold text-gray-900 mb-2">Personal details</h1>
                        <p class="text-sm text-gray-500 mb-8">Update your personal information and profile appearance.</p>

                        <form method="post" action="{{ route('profile.update') }}" enctype="multipart/form-data" class="space-y-8">
                            @csrf
                            @method('patch')

                            <!-- Profile Header with Cover & Avatar -->
                            <div class="relative group">
                                <!-- Cover Image -->
                                <div class="h-48 w-full rounded-2xl overflow-hidden bg-gray-200 relative">
                                    @if(Auth::user()->cover_image)
                                        <img id="cover_preview" src="{{ asset('images/covers/' . Auth::user()->cover_image) }}" class="w-full h-full object-cover">
                                    @else
                                        <!-- Need a placeholder img tag to be targetable by JS if no cover exists initially, 
                                             OR I can dynamically create it. simpler to just having an img tag. -->
                                         <img id="cover_preview" src="https://placehold.co/1200x400/4f46e5/ffffff?text=Cover+Image" class="w-full h-full object-cover"> 
                                         <!-- Wait, the previous code had a div placeholder if no image. I'll replace it with an img placeholder so JS works easily -->
                                    @endif
                                    
                                    <label for="cover_upload" class="absolute top-4 right-4 bg-white/20 hover:bg-white/40 backdrop-blur-md px-3 py-1.5 rounded-lg text-white text-xs font-medium cursor-pointer transition">
                                        Change Cover
                                        <input type="file" id="cover_upload" name="cover_image" class="hidden" onchange="previewImage(this, 'cover_preview')">
                                    </label>
                                </div>

                                <!-- Profile Image container overlapping cover -->
                                <div class="absolute -bottom-10 left-8 flex items-end">
                                    <div class="relative">
                                        <div class="h-24 w-24 rounded-full overflow-hidden border-4 border-white shadow-md bg-white">
                                            @if(Auth::user()->image)
                                                <img id="profile_preview" src="{{ asset('images/profiles/' . Auth::user()->image) }}" class="w-full h-full object-cover">
                                            @else
                                                <img id="profile_preview" src="https://ui-avatars.com/api/?name={{ urlencode(Auth::user()->name) }}&background=EBF4FF&color=1E40AF&size=128" class="w-full h-full object-cover">
                                            @endif
                                        </div>
                                        <label for="profile_upload" class="absolute bottom-0 right-0 bg-blue-600 text-white p-1.5 rounded-full shadow-lg cursor-pointer hover:bg-blue-700 transition border-2 border-white">
                                            <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z" /></svg>
                                            <input type="file" id="profile_upload" name="image" class="hidden" onchange="previewImage(this, 'profile_preview')">
                                        </label>
                                    </div>
                                </div>
                            </div>
                            
                            <script>
                                function previewImage(input, imgId) {
                                    if (input.files && input.files[0]) {
                                        var reader = new FileReader();
                                        reader.onload = function(e) {
                                            if(imgId === 'cover_preview') {
                                                // Handle cover preview specifically if it's a div bg or img tag
                                                // In my code above, I used an img tag but need to give it an ID.
                                                // Let's fix the ID in the previous chunk or here.
                                                // Wait, I need to check how I replaced the cover image part. 
                                                // I replaced lines 99 to... wait.
                                                // I will target the img tag directly.
                                                let img = document.getElementById(imgId);
                                                if(img) img.src = e.target.result;
                                            } else {
                                                document.getElementById(imgId).src = e.target.result;
                                            }
                                        }
                                        reader.readAsDataURL(input.files[0]);
                                    }
                                }
                            </script>

                            <!-- Spacer for the overlapping avatar -->
                            <div class="h-6"></div>

                            <!-- Form Fields -->
                            <div class="space-y-5">
                                <div class="grid grid-cols-1 md:grid-cols-2 gap-5">
                                    <!-- Full Name -->
                                    <div class="space-y-1">
                                        <label class="text-sm font-medium text-gray-700">Full Name</label>
                                        <input type="text" name="name" value="{{ old('name', Auth::user()->name) }}" 
                                            class="w-full rounded-lg border-gray-200 focus:border-blue-500 focus:ring-blue-500 text-sm py-2.5">
                                        @error('name') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
                                    </div>

                                    <!-- Email -->
                                    <div class="space-y-1">
                                        <label class="text-sm font-medium text-gray-700">Email Address</label>
                                        <input type="email" name="email" value="{{ old('email', Auth::user()->email) }}" 
                                            class="w-full rounded-lg border-gray-200 focus:border-blue-500 focus:ring-blue-500 text-sm py-2.5">
                                        @error('email') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
                                    </div>

                                    <!-- Location -->
                                    <div class="space-y-1">
                                        <label class="text-sm font-medium text-gray-700">Location</label>
                                        <input type="text" name="address" value="{{ old('address', Auth::user()->address) }}" placeholder="e.g. New York, USA"
                                            class="w-full rounded-lg border-gray-200 focus:border-blue-500 focus:ring-blue-500 text-sm py-2.5">
                                    </div>

                                    <!-- Nationality -->
                                    <div class="space-y-1">
                                        <label class="text-sm font-medium text-gray-700">Nationality</label>
                                        <select name="nationality" class="w-full rounded-lg border-gray-200 focus:border-blue-500 focus:ring-blue-500 text-sm py-2.5">
                                            <option value="">Select Nationality</option>
                                            <option value="American" {{ Auth::user()->nationality == 'American' ? 'selected' : '' }}>American</option>
                                            <option value="British" {{ Auth::user()->nationality == 'British' ? 'selected' : '' }}>British</option>
                                            <option value="Sri Lankan" {{ Auth::user()->nationality == 'Sri Lankan' ? 'selected' : '' }}>Sri Lankan</option>
                                            <option value="Australian" {{ Auth::user()->nationality == 'Australian' ? 'selected' : '' }}>Australian</option>
                                            <option value="Other" {{ Auth::user()->nationality == 'Other' ? 'selected' : '' }}>Other</option>
                                        </select>
                                    </div>

                                    <!-- Date of Birth -->
                                    <div class="space-y-1">
                                        <label class="text-sm font-medium text-gray-700">Date of Birth</label>
                                        <input type="date" name="dob" value="{{ old('dob', Auth::user()->dob) }}"
                                            class="w-full rounded-lg border-gray-200 focus:border-blue-500 focus:ring-blue-500 text-sm py-2.5">
                                    </div>

                                    <!-- Phone Number -->
                                    <div class="space-y-1">
                                        <label class="text-sm font-medium text-gray-700">Phone Number</label>
                                        <input type="text" name="mobile_number" value="{{ old('mobile_number', Auth::user()->mobile_number) }}" placeholder="+1 234 567 890"
                                            class="w-full rounded-lg border-gray-200 focus:border-blue-500 focus:ring-blue-500 text-sm py-2.5">
                                    </div>
                                </div>

                                <div class="pt-4 flex justify-end">
                                    <button type="submit" class="bg-blue-600 text-white px-6 py-2.5 rounded-lg text-sm font-semibold hover:bg-blue-700 transition shadow-sm">
                                        Save Changes
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>

                    <!-- Right Sidebar Card -->
                    <div class="md:w-72 pt-12">
                        <div class="bg-white rounded-2xl border border-gray-100 p-6 shadow-sm">
                            <div class="bg-gray-50 w-12 h-12 rounded-lg flex items-center justify-center mb-6">
                                <svg class="w-6 h-6 text-gray-900" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                                </svg>
                            </div>
                            <h4 class="font-bold text-gray-900 mb-2">Pssst!</h4>
                            <p class="text-xs text-gray-500 mb-6 leading-relaxed">Do you want to get secret offers and best prices for amazing stays?</p>
                            <p class="text-xs text-gray-500 mb-6">Sign up to join our Travel Club!</p>
                            <button class="w-full py-2 border border-gray-200 rounded-full text-sm font-semibold text-gray-900 hover:bg-gray-50 transition">
                                Sign up now
                            </button>
                        </div>
                    </div>
                </div>
            </main>
        </div>
    </div>
</body>
</html>