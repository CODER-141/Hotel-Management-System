<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Hotel HMS') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600,700&display=swap" rel="stylesheet" />
    <script src="https://cdn.tailwindcss.com"></script>

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <style>
        .active-tab {
            color: #2563eb;
            border-bottom: 2px solid #2563eb;
        }
    </style>
</head>

<body class="font-sans antialiased text-gray-900 bg-white">
    <div class="min-h-screen flex flex-col">
        <!-- Navigation -->
        <!-- Navigation -->
        @include('layouts.header')

        <main class="flex-grow">


            <!-- Hero Banner Section -->
            <div class="relative w-full h-[500px] mb-8">
                @php
                    $heroBg = asset('images/test.jpg');
                @endphp
                {{-- Background Image --}}
                <div class="absolute inset-0">
                    <img src="{{ $heroBg }}" class="w-full h-full object-cover">
                    {{-- Overlay --}}
                    <div class="absolute inset-0 bg-black/40"></div>
                </div>

                {{-- Hero Content --}}
                <div class="absolute inset-0 flex flex-col items-center justify-center text-center text-white px-4">
                    <h1 class="text-4xl md:text-5xl font-extrabold mb-4">Book your stay with Zadok</h1>
                    <p class="text-lg md:text-xl font-medium">Relax in comfort with rooms and facilities all in one
                        place.</p>
                </div>

                {{-- Search Bar Container --}}
                <div class="absolute bottom-[-30px] left-0 right-0 flex justify-center px-4">
                    <div
                        class="bg-white rounded-full shadow-xl py-3 px-6 flex flex-col md:flex-row items-center gap-4 md:gap-8 max-w-5xl w-full border border-gray-100">

                        {{-- Field: Location --}}
                        <div
                            class="flex flex-col flex-1 w-full border-b md:border-b-0 md:border-r border-gray-200 pb-2 md:pb-0 md:pr-4">
                            <label class="text-xs font-bold text-gray-800 uppercase tracking-wide">Location</label>
                            <input type="text" placeholder="Where are you going?"
                                class="w-full text-sm text-gray-600 outline-none placeholder-gray-400 border-none focus:ring-0 p-0 m-0">
                        </div>

                        {{-- Field: Check-in --}}
                        <div
                            class="flex flex-col flex-1 w-full border-b md:border-b-0 md:border-r border-gray-200 pb-2 md:pb-0 md:pr-4">
                            <label class="text-xs font-bold text-gray-800 uppercase tracking-wide">Check-in</label>
                            <input type="text" placeholder="Add date"
                                class="w-full text-sm text-gray-600 outline-none placeholder-gray-400 border-none focus:ring-0 p-0 m-0">
                        </div>

                        {{-- Field: Check-out --}}
                        <div
                            class="flex flex-col flex-1 w-full border-b md:border-b-0 md:border-r border-gray-200 pb-2 md:pb-0 md:pr-4">
                            <label class="text-xs font-bold text-gray-800 uppercase tracking-wide">Check-out</label>
                            <input type="text" placeholder="Add date"
                                class="w-full text-sm text-gray-600 outline-none placeholder-gray-400 border-none focus:ring-0 p-0 m-0">
                        </div>

                        {{-- Field: Guests --}}
                        <div class="flex flex-col flex-1 w-full pb-2 md:pb-0">
                            <label class="text-xs font-bold text-gray-800 uppercase tracking-wide">Guests</label>
                            <input type="text" placeholder="Number of guests"
                                class="w-full text-sm text-gray-600 outline-none placeholder-gray-400 border-none focus:ring-0 p-0 m-0">
                        </div>

                        {{-- Search Button --}}
                        <button
                            class="bg-blue-600 text-white p-3 rounded-full hover:bg-blue-700 transition shadow-lg shrink-0">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                            </svg>
                        </button>
                    </div>
                </div>
            </div>

            <!-- Spacer for floating search bar -->
            <div class="h-12 mb-8"></div>

            <!-- Tabs -->
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 mb-6 border-b border-gray-200">
                <div class="flex gap-8 text-sm font-medium text-gray-500">
                    <a href="#overview" class="pb-3 active-tab cursor-pointer">Overview</a>
                    <a href="#rooms" class="pb-3 hover:text-gray-900 cursor-pointer">Rooms</a>
                    <a href="#amenities" class="pb-3 hover:text-gray-900 cursor-pointer">Amenities</a>
                    <a href="#dining" class="pb-3 hover:text-gray-900 cursor-pointer">Dining</a> {{-- Added for
                    restaurant --}}
                    <a href="#policies" class="pb-3 hover:text-gray-900 cursor-pointer">Policies</a>
                </div>
            </div>



            <!-- Rooms Section -->
            <div id="rooms" class="bg-gray-50 py-12">
                <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                    <h2 class="text-2xl font-bold text-gray-900 mb-6">Available Rooms</h2>
                    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                        @foreach($rooms as $room)
                            <div
                                class="bg-white rounded-lg overflow-hidden border border-gray-100 shadow-sm hover:shadow-md transition">
                                <div class="relative h-48">
                                    <img src="{{ $room->image_url }}" class="w-full h-full object-cover">
                                    <div
                                        class="absolute top-2 right-2 bg-white/90 px-2 py-1 rounded text-xs font-bold text-gray-800">
                                        {{ $room->size }} ft²
                                    </div>
                                </div>
                                <div class="p-4">
                                    <h3 class="font-bold text-lg text-gray-900">Room {{ $room->number }}</h3>
                                    <p class="text-sm text-gray-500 mt-1 line-clamp-2">{{ $room->description }}</p>
                                    <div class="mt-4 flex items-center justify-between">
                                        <div>
                                            <span class="text-xl font-bold text-gray-900">${{ $room->price }}</span>
                                            <span class="text-xs text-gray-500">/ night</span>
                                        </div>
                                        <a href="{{ route('booking.show', $room->id) }}"
                                            class="text-blue-600 text-sm font-medium hover:underline">View Details</a>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>

            <!-- Dining Section -->
            <div id="dining" class="bg-white py-12">
                <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                    <h2 class="text-2xl font-bold text-gray-900 mb-6">Dining & Attractions</h2>
                    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
                        @foreach($menuItems as $item)
                            <div class="bg-white rounded-lg border border-gray-100 p-4 hover:shadow-md transition group">
                                <div class="flex items-center gap-4">
                                    <div
                                        class="h-12 w-12 rounded-full bg-orange-100 overflow-hidden flex items-center justify-center text-orange-600 font-bold shrink-0 shadow-sm border border-gray-50">
                                        @php
                                            $imageData = json_decode($item->image ?? '[]');
                                            $imageName = is_array($imageData) ? ($imageData[0] ?? null) : $item->image;
                                        @endphp
                                        @if($imageName)
                                            <img src="{{ asset('images/menus/' . $imageName) }}"
                                                class="w-full h-full object-cover" alt="{{ $item->name }}">
                                        @else
                                            {{ substr($item->name, 0, 1) }}
                                        @endif
                                    </div>
                                    <div class="flex-grow">
                                        <h4 class="font-bold text-gray-900 line-clamp-1">{{ $item->name }}</h4>
                                        <p class="text-sm text-gray-500">${{ $item->price }}</p>
                                    </div>
                                </div>
                                <div class="mt-4">
                                    <button onclick="openOrderModal()"
                                        class="w-full py-2 rounded-lg bg-gray-50 text-gray-900 text-sm font-medium group-hover:bg-blue-600 group-hover:text-white transition">
                                        Order Now
                                    </button>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>

        </main>

        <footer class="bg-white border-t border-gray-100 py-12">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center text-gray-400 text-sm">
                &copy; {{ date('Y') }} Zadok-Enterprises. All rights reserved.
            </div>
        </footer>
    </div>

    {{-- ORDER MODAL (Preserved) --}}
    <div id="orderModal" class="fixed inset-0 z-50 hidden overflow-y-auto" aria-labelledby="modal-title" role="dialog"
        aria-modal="true">
        <div class="flex items-end justify-center min-h-screen pt-4 px-4 pb-20 text-center sm:block sm:p-0">
            <div class="fixed inset-0 bg-gray-500 bg-opacity-75 transition-opacity" aria-hidden="true"
                onclick="closeOrderModal()"></div>
            <span class="hidden sm:inline-block sm:align-middle sm:h-screen" aria-hidden="true">&#8203;</span>
            <div
                class="inline-block align-bottom bg-white rounded-lg text-left overflow-hidden shadow-xl transform transition-all sm:my-8 sm:align-middle sm:max-w-3xl sm:w-full">
                <div class="bg-white px-4 pt-5 pb-4 sm:p-6 sm:pb-4">
                    <div class="flex justify-between items-center mb-4">
                        <h3 class="text-lg leading-6 font-medium text-gray-900" id="modal-title">Place Your Order</h3>
                        <button onclick="closeOrderModal()" class="text-gray-400 hover:text-gray-500">
                            <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M6 18L18 6M6 6l12 12" />
                            </svg>
                        </button>
                    </div>

                    <form id="orderForm" method="POST" action="{{ route('order.place') }}">
                        @csrf
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-4">
                            <div>
                                <label class="block text-sm font-medium text-gray-700">Your Name</label>
                                <input type="text" name="name" value="{{ Auth::check() ? Auth::user()->name : '' }}"
                                    class="mt-1 block w-full rounded border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500"
                                    placeholder="Enter your name" required>
                            </div>
                            <div>
                                <label class="block text-sm font-medium text-gray-700">Room Number</label>
                                <select name="room_number"
                                    class="mt-1 block w-full rounded border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500"
                                    required>
                                    <option value="">Select Room</option>
                                    @foreach($rooms as $room)
                                        <option value="{{ $room->id }}">{{ $room->number }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-4">
                            <div>
                                <label class="block text-sm font-medium text-gray-700">Order Type</label>
                                <select name="order_type"
                                    class="mt-1 block w-full rounded border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500">
                                    <option value="Room">Room Service</option>
                                    <option value="Dine In">Dine In</option>
                                    <option value="Take Away">Take Away</option>
                                </select>
                            </div>
                            <div>
                                <label class="block text-sm font-medium text-gray-700">Booking ID (Optional)</label>
                                <input type="text" name="booking_id"
                                    class="mt-1 block w-full rounded border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500">
                            </div>
                        </div>

                        <div class="bg-gray-50 p-4 rounded-lg mb-4">
                            <table class="min-w-full divide-y divide-gray-200">
                                <thead>
                                    <tr>
                                        <th class="px-2 py-2 text-left text-xs font-medium text-gray-500 uppercase">Item
                                        </th>
                                        <th class="px-2 py-2 text-left text-xs font-medium text-gray-500 uppercase">Qty
                                        </th>
                                        <th class="px-2 py-2 text-left text-xs font-medium text-gray-500 uppercase">
                                            Price</th>
                                        <th class="px-2 py-2"></th>
                                    </tr>
                                </thead>
                                <tbody id="orderItems">
                                    <tr>
                                        <td class="px-2 py-2">
                                            <select name="menu[]"
                                                class="menu-select block w-full rounded border-gray-300 text-sm focus:ring-blue-500 focus:border-blue-500"
                                                required onchange="updatePrice(this)">
                                                <option value="" data-price="0">Select Item</option>
                                                @foreach($menuItems as $mItem)
                                                    <option value="{{ $mItem->id }}" data-price="{{ $mItem->price }}">
                                                        {{ $mItem->name }}</option>
                                                @endforeach
                                            </select>
                                        </td>
                                        <td class="px-2 py-2">
                                            <input type="number" name="quantity[]" value="1" min="1"
                                                class="qty-input block w-16 rounded border-gray-300 text-sm focus:ring-blue-500 focus:border-blue-500"
                                                onchange="calculateTotal()">
                                        </td>
                                        <td class="px-2 py-2">
                                            <span class="text-gray-700 font-medium item-price">0.00</span>
                                            <input type="hidden" name="price[]" class="price-hidden" value="0">
                                        </td>
                                        <td class="px-2 py-2 text-right">
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                            <button type="button" onclick="addItemRow()"
                                class="mt-2 text-sm text-blue-600 hover:text-blue-800 font-medium">+ Add Item</button>
                        </div>

                        <div class="flex justify-between items-center pt-4 border-t">
                            <div class="text-xl font-bold text-gray-900">Total: $<span id="grandTotal">0.00</span></div>
                            <input type="hidden" name="total_price" id="totalPriceInput" value="0">
                            <div class="flex gap-3">
                                <button type="button"
                                    class="bg-white border border-gray-300 text-gray-700 px-4 py-2 rounded font-medium hover:bg-gray-50"
                                    onclick="closeOrderModal()">Cancel</button>
                                <button type="submit"
                                    class="bg-blue-600 text-white px-6 py-2 rounded font-medium hover:bg-blue-700 shadow-sm">Confirm
                                    Order</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script>
        function openOrderModal() { document.getElementById('orderModal').classList.remove('hidden'); }
        function closeOrderModal() { document.getElementById('orderModal').classList.add('hidden'); }

        function updatePrice(select) {
            const price = select.options[select.selectedIndex].dataset.price;
            const row = select.closest('tr');
            row.querySelector('.item-price').textContent = price;
            row.querySelector('.price-hidden').value = price;
            calculateTotal();
        }

        function calculateTotal() {
            let total = 0;
            document.querySelectorAll('#orderItems tr').forEach(row => {
                const price = parseFloat(row.querySelector('.price-hidden').value) || 0;
                const qty = parseInt(row.querySelector('.qty-input').value) || 1;
                total += price * qty;
            });
            document.getElementById('grandTotal').textContent = total.toFixed(2);
            document.getElementById('totalPriceInput').value = total.toFixed(2);
        }

        function addItemRow() {
            const row = document.querySelector('#orderItems tr').cloneNode(true);
            row.querySelector('select').value = "";
            row.querySelector('.qty-input').value = 1;
            row.querySelector('.item-price').textContent = "0.00";
            row.querySelector('.price-hidden').value = 0;

            const removeCell = row.querySelectorAll('td')[3];
            removeCell.innerHTML = '<button type="button" class="text-red-500 hover:text-red-700" onclick="this.closest(\'tr\').remove(); calculateTotal()">X</button>';

            document.getElementById('orderItems').appendChild(row);
        }
    </script>
</body>

</html>