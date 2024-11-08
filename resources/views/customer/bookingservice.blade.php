@extends('layout.customer.master')

@section('content')
    @include('layout.customer.header')

    <div class="container mx-auto p-6">
        <h1 class="text-3xl font-semibold mb-6 text-center">Book Service: {{ $service->name }}</h1>

        <div class="bg-white shadow-lg rounded-lg p-6">
            <img class="w-full h-64 object-cover rounded-lg mb-6" src="{{ $service->image }}" alt="{{ $service->name }}">
            <p class="text-gray-700 mb-4">{{ $service->description }}</p>
            <p class="text-lg font-semibold text-gray-800 mb-4">Price: ${{ number_format($service->price, 2) }}</p>

            <!-- Displaying Success Message -->
            @if (session('success'))
                <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-6">
                    {{ session('success') }}
                </div>
            @endif

            <!-- Displaying Validation Errors -->
            @if ($errors->any())
                <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded mb-6">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <!-- Booking Form -->
            <form action="{{ route('storeBooking', $service->id) }}" method="POST">
                @csrf

                <!-- Address -->
                <div class="mb-4">
                    <label class="block text-gray-700 font-semibold mb-2" for="address">Address</label>
                    <input class="w-full border border-gray-300 p-2 rounded-md" id="address" type="text" name="address"
                        value="{{ old('address') }}" required placeholder="Enter your address">
                </div>

                <!-- Venue -->
                <div class="mb-4">
                    <label class="block text-gray-700 font-semibold mb-2" for="venue">Venue</label>
                    <input class="w-full border border-gray-300 p-2 rounded-md" id="venue" type="text" name="venue"
                        value="{{ old('venue') }}" required placeholder="Enter the venue location">
                </div>

                <!-- Booking Date -->
                <div class="mb-4">
                    <label class="block text-gray-700 font-semibold mb-2" for="date">Booking Date</label>
                    <input class="w-full border border-gray-300 p-2 rounded-md" id="date" type="date" name="date"
                        value="{{ old('date') }}" required>
                </div>

                <!-- Phone number -->
                <div class="mb-4">
                    <label class="block text-gray-700 font-semibold mb-2" for="number">Phone Number</label>
                    <input class="w-full border border-gray-300 p-2 rounded-md" id="number" type="number" name="number"
                        value="{{ old('number') }}" required placeholder="Enter your phone number">

                    <input class="w-full border border-gray-300 p-2 rounded-md" id="invoice" type="hidden" name="invoice"
                        value="{{ $invoice }}">
                </div>

                <!-- Payment Status (Hidden Field) -->
                <input type="hidden" name="payment" value="pending">

                <!-- Confirm Booking Button -->
                <button class="bg-green-500 text-white px-4 py-2 rounded-md" type="submit">Confirm Booking</button>
            </form>
        </div>
    </div>
@endsection
