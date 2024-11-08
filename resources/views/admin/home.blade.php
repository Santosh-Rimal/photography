@extends('layout.admin.master')

@section('content')
    @include('layout.admin.header')

    <div class="container mx-auto p-6">
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">
            <!-- Total Services Box -->
            <div class="bg-blue-500 text-white p-6 rounded-lg shadow-lg">
                <h2 class="text-lg font-bold">Total Services</h2>
                <p class="text-4xl font-semibold">{{ $service ?? '550' }}</p> <!-- Replace with dynamic data if needed -->
            </div>

            <!-- Total Bookings Box -->
            <div class="bg-green-500 text-white p-6 rounded-lg shadow-lg">
                <h2 class="text-lg font-bold">Total Bookings</h2>
                <p class="text-4xl font-semibold">{{ $totalbooking ?? '230' }}</p> <!-- Dynamic total bookings -->
            </div>

            <!-- Total Pending Bookings Box -->
            <div class="bg-yellow-500 text-white p-6 rounded-lg shadow-lg">
                <h2 class="text-lg font-bold">Pending Bookings</h2>
                <p class="text-4xl font-semibold">{{ $pendingbooking ?? '0' }}</p> <!-- Dynamic pending bookings -->
            </div>

            <!-- Total Paid Bookings Box -->
            <div class="bg-purple-500 text-white p-6 rounded-lg shadow-lg">
                <h2 class="text-lg font-bold">Paid Bookings</h2>
                <p class="text-4xl font-semibold">{{ $paidbooking ?? '0' }}</p> <!-- Dynamic paid bookings -->
            </div>

            <!-- Total Cancelled Bookings Box -->
            <div class="bg-red-500 text-white p-6 rounded-lg shadow-lg">
                <h2 class="text-lg font-bold">Cancelled Bookings</h2>
                <p class="text-4xl font-semibold">{{ $cancelbooking ?? '0' }}</p> <!-- Dynamic cancelled bookings -->
            </div>
        </div>
    </div>

    @push('script')
        <script>
            document.getElementById('menu-toggle').addEventListener('click', function() {
                var menu = document.getElementById('mobile-menu');
                menu.classList.toggle('hidden');
            });
        </script>
    @endpush
@endsection
