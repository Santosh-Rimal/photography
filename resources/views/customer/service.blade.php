@extends('layout.customer.master')

@section('content')
    @include('layout.customer.header')

    <div class="container mx-auto p-6">
        <h1 class="text-3xl font-semibold mb-8 text-center">Our Services</h1>

        <!-- Grid container for services -->
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-6">
            @foreach ($services as $service)
                <div class="bg-white shadow-lg rounded-lg p-4">
                    <img class="w-full h-48 object-cover rounded-lg mb-4" src="{{ $service->image }}"
                        alt="{{ $service->name }}">
                    <h3 class="text-xl font-semibold mb-2">{{ $service->name }}</h3>
                    <p class="text-gray-600 mb-4">{{ Str::limit($service->description, 100) }}</p>
                    <p class="font-semibold text-lg text-gray-800">Price: ${{ number_format($service->price, 2) }}</p>

                    <!-- Buttons for View and Book Service -->
                    <div class="mt-4 flex justify-between">
                        <a class="bg-blue-500 text-white px-4 py-2 rounded-md text-center"
                            href="{{ route('showservice', $service->id) }}">View</a>
                        {{-- <a class="bg-green-500 text-white px-4 py-2 rounded-md text-center"
                            href="{{ route('services.book', $service->id) }}">Book Service</a> --}}
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection
