<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Book Room {{ $room->number }} - Zadok</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600,700&display=swap" rel="stylesheet" />
    <script src="https://cdn.tailwindcss.com"></script>

    <style>
        body {
            font-family: 'Figtree', sans-serif;
        }
    </style>
</head>

<body class="bg-gray-50 antialiased">
    <!-- Header -->
    <!-- Header -->
    <div class="sticky top-0 z-50">
        @include('layouts.header')
    </div>

    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
        <!-- Back Button -->
        <a href="{{ route('home') }}" class="inline-flex items-center gap-2 text-gray-600 hover:text-gray-900 mb-6">
            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7" />
            </svg>
            <span class="text-sm font-medium">Back</span>
        </a>

        <div class="grid grid-cols-1 lg:grid-cols-2 gap-8">
            <!-- Left Column - Booking Form -->
            <div class="bg-white rounded-2xl border border-gray-100 p-6 lg:p-8 shadow-sm">
                <h1 class="text-2xl font-bold text-gray-900 mb-6">Book Hotel Room {{ $room->number }}</h1>

                <form method="POST" action="{{ route('booking.store') }}" class="space-y-6">
                    @csrf
                    <input type="hidden" name="room_id" value="{{ $room->id }}">

                    <!-- Step 1: Property Amenities -->
                    <div>
                        <h3 class="text-sm font-bold text-gray-900 mb-3">Step 1:</h3>
                        <p class="text-sm font-semibold text-gray-900 mb-3">Property amenities</p>
                        <div class="grid grid-cols-2 gap-3 text-sm text-gray-600">
                            <div class="flex items-center gap-2">
                                <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20">
                                    <path d="M10 2a8 8 0 100 16 8 8 0 000-16zm1 11H9v-2h2v2zm0-4H9V5h2v4z" />
                                </svg>
                                Free Wifi
                            </div>
                            <div class="flex items-center gap-2">
                                <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20">
                                    <path d="M10 2a8 8 0 100 16 8 8 0 000-16zm1 11H9v-2h2v2zm0-4H9V5h2v4z" />
                                </svg>
                                Free parking
                            </div>
                            <div class="flex items-center gap-2">
                                <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20">
                                    <path d="M10 2a8 8 0 100 16 8 8 0 000-16zm1 11H9v-2h2v2zm0-4H9V5h2v4z" />
                                </svg>
                                Key card access
                            </div>
                            <div class="flex items-center gap-2">
                                <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20">
                                    <path d="M10 2a8 8 0 100 16 8 8 0 000-16zm1 11H9v-2h2v2zm0-4H9V5h2v4z" />
                                </svg>
                                Air conditioning
                            </div>
                        </div>
                        <p class="text-xs text-gray-400 mt-2">Breakfast included</p>
                    </div>

                    <!-- Bed Option -->
                    <!-- <div>
                        <label class="block text-sm font-semibold text-gray-900 mb-2">Choose bed option</label>
                        <select name="bed_option"
                            class="w-full px-4 py-3 border border-gray-200 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 text-sm">
                            <option>2 separate beds</option>
                            <option>1 king bed</option>
                            <option>1 queen bed</option>
                        </select>
                    </div> -->

                    <!-- Step 2: Personal Data -->
                    <div>
                        <h3 class="text-sm font-bold text-gray-900 mb-3">Step 2: Personal data</h3>

                        <div class="space-y-4">
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-1">First and Last name</label>
                                <input type="text" name="name" value="{{ Auth::user()->name ?? '' }}"
                                    placeholder="e.g. Maria Lost" required
                                    class="w-full px-4 py-3 border border-gray-200 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 text-sm">
                            </div>

                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-1">Email address</label>
                                <input type="email" name="email" value="{{ Auth::user()->email ?? '' }}"
                                    placeholder="email@email.com" required
                                    class="w-full px-4 py-3 border border-gray-200 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 text-sm">
                            </div>

                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-1">Phone number</label>
                                <input type="tel" name="phone" value="{{ Auth::user()->phone ?? '' }}"
                                    placeholder="+23 001 234 567" required
                                    class="w-full px-4 py-3 border border-gray-200 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 text-sm">
                            </div>
                        </div>
                    </div>

                    <!-- Check-in/Check-out Dates -->
                    <div class="grid grid-cols-2 gap-4">
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-1">Check-in</label>
                            <input type="date" name="checkin" required
                                class="w-full px-4 py-3 border border-gray-200 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 text-sm">
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-1">Check-out</label>
                            <input type="date" name="checkout" required
                                class="w-full px-4 py-3 border border-gray-200 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 text-sm">
                        </div>
                    </div>

                    <!-- Submit Button -->
                    <button type="submit"
                        class="w-full bg-blue-600 text-white py-3 rounded-lg font-semibold hover:bg-blue-700 transition">
                        Continue to Payment
                    </button>
                </form>
            </div>

            <!-- Right Column - Hotel Details & Price Summary -->
            <div class="space-y-6">
                <!-- Hotel Image -->
                <div class="bg-white rounded-2xl overflow-hidden border border-gray-100 shadow-sm">
                    <img src="{{ $room->image_url }}" alt="Room {{ $room->number }}" class="w-full h-64 object-cover">
                </div>

                <!-- Hotel Details -->
                <div class="bg-white rounded-2xl border border-gray-100 p-6 shadow-sm">
                    <h2 class="text-xl font-bold text-gray-900 mb-1">Room {{ $room->number }} ***</h2>
                    <p class="text-sm text-gray-500 mb-4">{{ $room->size }}m² hotel room</p>

                    <div class="space-y-3 mb-4">
                        <div class="flex justify-between text-sm">
                            <span class="text-gray-600">Check-in</span>
                            <span class="font-medium text-gray-900" id="display-checkin">Select date</span>
                        </div>
                        <div class="flex justify-between text-sm">
                            <span class="text-gray-600">Check-out</span>
                            <span class="font-medium text-gray-900" id="display-checkout">Select date</span>
                        </div>
                    </div>

                    <div class="border-t border-gray-100 pt-4">
                        <p class="text-sm font-semibold text-gray-900 mb-2">{{ $room->description }}</p>

                        <div class="space-y-2 text-sm">
                            <div class="flex justify-between">
                                <span class="text-gray-600">Price per night</span>
                                <span class="font-medium text-gray-900">${{ $room->price }}</span>
                            </div>
                            <div class="flex justify-between">
                                <span class="text-gray-600" id="nights-label">1 night</span>
                                <span class="font-medium text-gray-900" id="subtotal">${{ $room->price }}</span>
                            </div>
                            @if($room->discount > 0)
                                <div class="flex justify-between text-green-600">
                                    <span>Discount ({{ $room->discount }}%)</span>
                                    <span id="discount-amount">-$0</span>
                                </div>
                            @endif
                            <div class="flex justify-between text-sm pt-2 border-t border-gray-100">
                                <!-- <span class="text-gray-600">City tax</span>
                                <span class="font-medium text-gray-900">$10</span> -->
                            </div>
                            <div class="flex justify-between text-sm">
                                <!-- <span class="text-gray-600">Service fee</span>
                                <span class="font-medium text-gray-900">$5</span> -->
                            </div>
                        </div>

                        <div
                            class="flex justify-between text-lg font-bold text-gray-900 mt-4 pt-4 border-t-2 border-gray-200">
                            <span>TOTAL</span>
                            <span id="total-price">${{ $room->price + 15 }}</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        // Update price calculation when dates change
        const checkinInput = document.querySelector('input[name="checkin"]');
        const checkoutInput = document.querySelector('input[name="checkout"]');
        const pricePerNight = {{ $room->price }};
        const discount = {{ $room->discount ?? 0 }};

        function updatePrices() {
            if (checkinInput.value && checkoutInput.value) {
                const checkin = new Date(checkinInput.value);
                const checkout = new Date(checkoutInput.value);
                const nights = Math.ceil((checkout - checkin) / (1000 * 60 * 60 * 24));

                if (nights > 0) {
                    document.getElementById('display-checkin').textContent = checkin.toLocaleDateString();
                    document.getElementById('display-checkout').textContent = checkout.toLocaleDateString();
                    document.getElementById('nights-label').textContent = nights + ' night' + (nights > 1 ? 's' : '');

                    const subtotal = pricePerNight * nights;
                    document.getElementById('subtotal').textContent = '$' + subtotal;

                    const discountAmount = subtotal * (discount / 100);
                    if (discount > 0) {
                        document.getElementById('discount-amount').textContent = '-$' + discountAmount.toFixed(2);
                    }

                    const total = subtotal - discountAmount + 15; // +15 for taxes and fees
                    document.getElementById('total-price').textContent = '$' + total.toFixed(2);
                }
            }
        }

        checkinInput.addEventListener('change', updatePrices);
        checkoutInput.addEventListener('change', updatePrices);
    </script>
</body>

</html>