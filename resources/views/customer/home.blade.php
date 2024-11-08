@extends('layout.customer.master')
@section('content')
    <!-- Navbar -->
    @include('layout.customer.header')
    <!-- Hero Section -->
    <section class="bg-cover bg-center h-screen text-center text-white" id="home"
        style="background-image: url('https://via.placeholder.com/1920x1080');">
        <div class="flex justify-center items-center h-full bg-black bg-opacity-50">
            <div class="px-4">
                <h1 class="text-5xl font-extrabold mb-4">Welcome to Our Booking Platform</h1>
                <p class="text-lg mb-6">Book venues for meetings, events, and more!</p>
                <a class="bg-green-500 text-white px-6 py-3 rounded-full text-xl font-semibold hover:bg-green-600"
                    href="#services">Explore Services</a>
            </div>
        </div>
    </section>

    <!-- Services Section -->
    <section class="py-20 bg-white" id="services">
        <div class="container mx-auto text-center">
            <h2 class="text-4xl font-bold mb-8">Our Services</h2>
            <div class="grid md:grid-cols-3 sm:grid-cols-1 gap-12">
                <div class="bg-gray-100 p-6 rounded-lg shadow-md">
                    <img class="rounded-lg mb-4 mx-auto" src="https://via.placeholder.com/150" alt="Conference Rooms">
                    <h3 class="text-2xl font-semibold mb-2">Conference Rooms</h3>
                    <p class="text-gray-600">Perfect for small meetings and workshops.</p>
                </div>
                <div class="bg-gray-100 p-6 rounded-lg shadow-md">
                    <img class="rounded-lg mb-4 mx-auto" src="https://via.placeholder.com/150" alt="Event Venues">
                    <h3 class="text-2xl font-semibold mb-2">Event Venues</h3>
                    <p class="text-gray-600">Spacious venues for large events and parties.</p>
                </div>
                <div class="bg-gray-100 p-6 rounded-lg shadow-md">
                    <img class="rounded-lg mb-4 mx-auto" src="https://via.placeholder.com/150" alt="Banquet Halls">
                    <h3 class="text-2xl font-semibold mb-2">Banquet Halls</h3>
                    <p class="text-gray-600">Host your grand celebrations with style.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Contact Section -->
    <section class="bg-gray-800 text-white py-20" id="contact">
        <div class="container mx-auto text-center">
            <h2 class="text-4xl font-bold mb-4">Contact Us</h2>
            <p class="text-lg mb-6">Have any questions? Get in touch with us today!</p>
            <a class="bg-green-500 text-white px-6 py-3 rounded-full text-xl font-semibold hover:bg-green-600"
                href="mailto:info@bookingplatform.com">Contact Us</a>
        </div>
    </section>
@endsection
