@extends('layout.customer.master')

@section('content')
    @include('layout.customer.header')

    <div class="container mx-auto p-6">
        <h1 class="text-3xl font-semibold mb-6 text-center">Booking Details</h1>

        <div class="bg-white shadow-lg rounded-lg p-6">
            <p class="text-lg font-semibold text-gray-800 mb-4">Service: {{ $booking->service->name }}</p>
            <img class="w-full h-64 object-cover rounded-lg mb-6" src="{{ $booking->service->image }}"
                alt="{{ $booking->service->name }}">

            <p class="text-gray-700 mb-4">{{ $booking->service->description }}</p>
            <p class="text-lg font-semibold text-gray-800 mb-4">Price: ${{ number_format($booking->service->price, 2) }}</p>

            <div class="mb-4">
                <label class="block text-gray-700 font-semibold mb-2">Address</label>
                <p class="text-gray-700">{{ $booking->address }}</p>
            </div>

            <div class="mb-4">
                <label class="block text-gray-700 font-semibold mb-2">Venue</label>
                <p class="text-gray-700">{{ $booking->venue }}</p>
            </div>

            <div class="mb-4">
                <label class="block text-gray-700 font-semibold mb-2">Booking Date</label>
                <p class="text-gray-700">{{ \Carbon\Carbon::parse($booking->date)->format('M d, Y') }}</p>
            </div>

            <div class="mb-4">
                <label class="block text-gray-700 font-semibold mb-2">Phone Number</label>
                <p class="text-gray-700">{{ $booking->number }}</p>
            </div>

            <div class="mb-4">
                <label class="block text-gray-700 font-semibold mb-2">Payment Status</label>
                <p class="text-gray-700">{{ ucfirst($booking->payment) }}</p>
            </div>

            @if ($booking->payment == 'pending')
                <!-- Payment Button for Pending Payments -->
                <div class="mb-4">
                    <label class="block text-gray-700 font-semibold mb-2">Pay to Confirm Booking</label>
                    <a class="text-green-500" href="{{ route('esewa', $booking->invoice) }}">Pay with
                        eSewa</a>
                </div>
            @else
                <!-- Payment Confirmed and Google Photos Link -->
                <div class="mb-4">
                    <p class="text-green-500 font-semibold">Payment Confirmed</p>
                </div>

                @if ($booking->google_photos_link)
                    <div class="mb-4">
                        <label class="block text-gray-700 font-semibold mb-2">View Your Photos</label>
                        <a class="text-blue-500" href="{{ $booking->google_photos_link }}" target="_blank">
                            Click here to view your photos on Google Photos
                        </a>
                    </div>
                @endif
            @endif

            <a class="text-green-500" href="{{ route('showservice', $booking->service->id) }}">Back to Service Details</a>
        </div>
    </div>
@endsection
