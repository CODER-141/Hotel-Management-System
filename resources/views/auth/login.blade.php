<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Login - Zadok Hotel</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600,700&display=swap" rel="stylesheet" />
    <script src="https://cdn.tailwindcss.com"></script>

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="font-sans antialiased text-gray-900 bg-white">
    <div class="min-h-screen flex">
        <!-- Left Side: Image & Branding (Hidden on mobile) -->
        <div class="hidden lg:flex lg:w-1/2 relative">
            <img src="{{ asset('images/test01.jpg') }}" class="absolute inset-0 w-full h-full object-cover"
                alt="Luxury Hotel">
            <div class="absolute inset-0 bg-black/40"></div>
            <div class="absolute inset-0 flex flex-col items-center justify-center text-white p-12 text-center">
                <a href="{{ route('home') }}" class="text-5xl font-extrabold mb-6 tracking-tight">Zadok</a>
                <p class="text-xl font-medium max-w-md">Experience unparalleled luxury and seamless stay management.</p>
                <div class="mt-12 flex gap-4">
                    <div class="w-12 h-1 bg-white/30 rounded"></div>
                    <div class="w-12 h-1 bg-white rounded"></div>
                    <div class="w-12 h-1 bg-white/30 rounded"></div>
                </div>
            </div>
        </div>

        <!-- Right Side: Login Form -->
        <div class="w-full lg:w-1/2 flex items-center justify-center p-8 sm:p-12 lg:p-24 bg-white">
            <div class="w-full max-w-md">
                {{-- Mobile Logo --}}
                <div class="lg:hidden text-center mb-8">
                    <a href="{{ route('home') }}" class="text-3xl font-bold text-gray-900">Zadok</a>
                </div>

                <div class="mb-10 text-center lg:text-left">
                    <h2 class="text-3xl font-bold text-gray-900 mb-2">Welcome Back</h2>
                    <p class="text-gray-500">Please enter your details to sign in to your account.</p>
                </div>

                <!-- Session Status -->
                <x-auth-session-status class="mb-6" :status="session('status')" />

                <form method="POST" action="{{ route('login') }}" class="space-y-6">
                    @csrf

                    <!-- Email Address -->
                    <div>
                        <label for="email" class="block text-sm font-semibold text-gray-700 mb-1">Email Address</label>
                        <input id="email" type="email" name="email" value="{{ old('email') }}" required autofocus
                            autocomplete="username"
                            class="w-full px-4 py-3 rounded-xl border border-gray-200 focus:border-blue-500 focus:ring-4 focus:ring-blue-500/10 transition outline-none">
                        <x-input-error :messages="$errors->get('email')" class="mt-2" />
                    </div>

                    <!-- Password -->
                    <div>
                        <div class="flex justify-between mb-1">
                            <label for="password" class="block text-sm font-semibold text-gray-700">Password</label>
                            @if (Route::has('password.request'))
                                <a class="text-sm font-semibold text-blue-600 hover:text-blue-500 transition"
                                    href="{{ route('password.request') }}">
                                    Forgot password?
                                </a>
                            @endif
                        </div>
                        <input id="password" type="password" name="password" required autocomplete="current-password"
                            class="w-full px-4 py-3 rounded-xl border border-gray-200 focus:border-blue-500 focus:ring-4 focus:ring-blue-500/10 transition outline-none">
                        <x-input-error :messages="$errors->get('password')" class="mt-2" />
                    </div>

                    <!-- Remember Me -->
                    <div class="flex items-center">
                        <input id="remember_me" type="checkbox" name="remember"
                            class="w-4 h-4 text-blue-600 border-gray-300 rounded focus:ring-blue-500 transition">
                        <label for="remember_me" class="ms-2 text-sm text-gray-600">Remember me for 30 days</label>
                    </div>

                    <div>
                        <button type="submit"
                            class="w-full bg-blue-600 text-white py-3.5 rounded-xl font-bold text-lg hover:bg-blue-700 focus:ring-4 focus:ring-blue-100 transition shadow-lg shadow-blue-500/20">
                            Sign In
                        </button>
                    </div>
                </form>

                <div class="mt-10 text-center">
                    <p class="text-gray-500 text-sm">
                        Don't have an account?
                        <a href="{{ route('register') }}"
                            class="text-blue-600 font-bold hover:text-blue-500 transition">Create an account</a>
                    </p>
                </div>
            </div>
        </div>
    </div>
</body>

</html>