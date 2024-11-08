@extends('layout.customer.master')

@section('content')
    @include('layout.customer.header')

    <div class="container mx-auto p-6">
        <h1 class="text-3xl font-semibold mb-6 text-center">All Bookings</h1>

        <div class="bg-white shadow-lg rounded-lg p-6">
            @if ($bookings->isEmpty())
                <p class="text-center text-gray-700">No bookings found.</p>
            @else
                @foreach ($bookings as $booking)
                    <div class="mb-6 bg-gray-50 shadow-md rounded-lg p-4">
                        <h2 class="text-xl font-semibold text-gray-800 mb-2">
                            <a class="text-blue-500"
                                href="{{ route('bookingdetails', $booking->invoice) }}">{{ $booking->service->name }}</a>
                        </h2>
                        <p class="text-gray-700">Booking ID: {{ $booking->id }}</p>
                        <p class="text-gray-700">Venue: {{ $booking->venue }}</p>
                        <p class="text-gray-700">Booking Date: {{ \Carbon\Carbon::parse($booking->date)->format('M d, Y') }}
                        </p>
                        <p class="text-gray-700">Payment Status: {{ ucfirst($booking->payment) }}</p>

                        <div class="mt-4">
                            <a class="text-green-500" href="{{ route('showservice', $booking->id) }}">View Details</a>
                        </div>
                    </div>
                @endforeach
            @endif
        </div>
    </div>
@endsection
