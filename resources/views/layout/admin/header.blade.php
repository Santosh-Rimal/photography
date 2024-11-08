<nav class="bg-gray-800 p-4">
    <div class="container mx-auto flex justify-between items-center">
        <!-- Logo or Title -->
        <a class="text-white text-lg font-bold" href="{{ route('dashboard') }}">Admin Dashboard</a>

        <!-- Navigation Links -->
        <ul class="flex space-x-4">
            <li>
                <a class="text-gray-300 hover:text-white p-2" href="{{ route('services.index') }}">Services</a>
            </li>
            <li>
                <a class="text-gray-300 hover:text-white p-2" href="{{ route('bookings.index') }}">Bookings</a>
            </li>
            <li>
                <a class="text-gray-300 hover:text-white p-2" href="{{ route('customers.index') }}">Customers</a>
            </li>
            <li>
                <a class="text-gray-300 hover:text-white p-2" href="{{ route('myworks.index') }}">My Work</a>
            </li>
        </ul>
    </div>
</nav>
