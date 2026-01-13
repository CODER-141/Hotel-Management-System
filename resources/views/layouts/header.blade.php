<nav class="bg-white border-b border-gray-100 py-4">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 flex justify-between items-center">
        <div class="flex items-center gap-8">
            <a href="{{ route('home') }}" class="text-2xl font-bold text-gray-900">
                Zadok
            </a>
            <div class="hidden md:flex gap-6 text-sm font-medium text-gray-600">
                <a href="#" class="hover:text-gray-900">Properties</a>
                <a href="#" class="hover:text-gray-900">Attractions</a>
                <a href="#" class="hover:text-gray-900">Popular</a>
            </div>
        </div>
        <div class="flex items-center gap-4">
            @auth
                <div class="flex items-center gap-4">
                    <a href="{{ Auth::user()->type == 1 ? route('platform.main') : route('dashboard') }}"
                        class="text-sm font-medium text-blue-600 hover:text-blue-500">
                        {{ Auth::user()->name }}
                    </a>

                    @if(request()->routeIs('dashboard'))
                        <!-- On dashboard, show user image -->
                        <div class="h-10 w-10 rounded-full overflow-hidden border border-gray-200">
                            @if(Auth::user()->image)
                                <img src="{{ asset('images/profiles/' . Auth::user()->image) }}" class="w-full h-full object-cover">
                            @else
                                <img src="https://ui-avatars.com/api/?name={{ urlencode(Auth::user()->name) }}&background=EBF4FF&color=1E40AF"
                                    class="w-full h-full object-cover">
                            @endif
                        </div>
                    @else
                        <!-- On other pages, show Logout button -->
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <button type="submit"
                                class="bg-blue-600 text-white px-5 py-2 rounded-full text-sm font-semibold hover:bg-blue-700 transition">
                                Log out
                            </button>
                        </form>
                    @endif
                </div>
            @else
                <a href="{{ route('login') }}"
                    class="text-sm font-medium text-gray-600 hover:text-gray-900 border-r border-gray-200 pr-4">
                    Log in
                </a>
                <a href="{{ route('register') }}"
                    class="bg-blue-600 text-white px-5 py-2 rounded-full text-sm font-semibold hover:bg-blue-700 transition">
                    Sign up
                </a>
            @endauth
        </div>
    </div>
</nav>