@extends('layout.customer.master')

@section('content')
    @include('layout.customer.header')

    <div class="container mx-auto p-6">

        @if (session('success'))
            <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-6">
                {{ session('success') }}
            </div>
        @endif
        <!-- Main Service Details -->
        <div class="bg-white shadow-lg rounded-lg p-6 mb-8">
            <img class="w-full h-64 object-cover rounded-lg mb-6" src="{{ $service->image }}" alt="{{ $service->name }}">
            <h1 class="text-2xl font-bold mb-4">{{ $service->name }}</h1>
            <p class="text-gray-700 mb-4">{{ $service->description }}</p>
            <p class="text-lg font-semibold text-gray-800">Package: {{ $service->package }}</p>
            <p class="text-lg font-semibold text-gray-800">Price: ${{ number_format($service->price, 2) }}</p>

            <!-- Book Service Button -->
            <div class="mt-6">
                <a class="bg-green-500 text-white px-4 py-2 rounded-md" href="{{ route('bookservice', $service->id) }}">Book
                    Service</a>
            </div>
        </div>

        <!-- Related Services Section -->
        <h2 class="text-2xl font-semibold mb-6">Related Services</h2>
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
            @foreach ($relatedServices as $relatedService)
                <div class="bg-white shadow-md rounded-lg p-4">
                    <img class="w-full h-32 object-cover rounded-lg mb-2" src="{{ $relatedService->image }}"
                        alt="{{ $relatedService->name }}">
                    <h3 class="text-lg font-semibold mb-1">{{ $relatedService->name }}</h3>
                    <p class="text-gray-600 text-sm mb-2">{{ Str::limit($relatedService->description, 50) }}</p>
                    <p class="text-sm font-semibold text-gray-800">Price: ${{ number_format($relatedService->price, 2) }}
                    </p>

                    <!-- View Button for Related Service -->
                    <div class="mt-3">
                        <a class="bg-blue-500 text-white text-sm px-3 py-1 rounded-md"
                            href="{{ route('showservice', $relatedService->id) }}">View Service</a>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection
