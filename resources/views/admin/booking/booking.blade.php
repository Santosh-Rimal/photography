@extends('layout.admin.master')

@section('content')
    @include('layout.admin.header')

    <div class="container mx-auto p-6">
        <h1 class="text-2xl font-bold mb-6">Bookings</h1>

        <!-- Table for Bookings -->
        <div class="overflow-x-auto bg-white shadow-lg rounded-lg">
            <table class="min-w-full table-auto">
                <thead class="bg-gray-800 text-white">
                    <tr>
                        <th class="px-4 py-2 text-left">Booking ID</th>
                        <th class="px-4 py-2 text-left">Customer Name</th>
                        <th class="px-4 py-2 text-left">Service</th>
                        <th class="px-4 py-2 text-left">Address</th>
                        <th class="px-4 py-2 text-left">Venue</th>
                        <th class="px-4 py-2 text-left">Payment Status</th>
                        <th class="px-4 py-2 text-left">Add Photos Link</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($bookings as $booking)
                        <tr class="border-b">
                            <td class="px-4 py-2">{{ $booking->id }}</td>
                            <td class="px-4 py-2">{{ $booking->user->name }}</td>
                            <td class="px-4 py-2">{{ $booking->service->name }}</td>
                            <td class="px-4 py-2">{{ $booking->address }}</td>
                            <td class="px-4 py-2">{{ $booking->venue }}</td>
                            <td class="px-4 py-2">{{ ucfirst($booking->payment) }}</td>
                            <td class="px-4 py-2">
                                @if ($booking->payment === 'paid')
                                    @if ($booking->google_photos_link)
                                        <span class="text-green-600">Link Uploaded</span>
                                    @else
                                        <form action="{{ route('admin.addGooglePhotosLink', $booking->invoice) }}"
                                            method="POST">
                                            @csrf
                                            <input class="border p-1 rounded" type="url" name="google_photos_link"
                                                placeholder="Enter Google Photos link" required>
                                            <button class="ml-2 px-4 py-1 bg-blue-500 text-white rounded" type="submit">
                                                Add Link
                                            </button>
                                        </form>
                                    @endif
                                @else
                                    <span class="text-gray-500">Not Paid</span>
                                @endif
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td class="px-4 py-2 text-center" colspan="7">No bookings found.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
@endsection
