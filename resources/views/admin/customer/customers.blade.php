@extends('layout.admin.master')

@section('content')
    @include('layout.admin.header')

    <div class="container mx-auto p-6">
        <h1 class="text-2xl font-bold mb-6">Customers</h1>

        <!-- Table for Customers -->
        <div class="overflow-x-auto bg-white shadow-lg rounded-lg">
            <table class="min-w-full table-auto">
                <thead class="bg-gray-800 text-white">
                    <tr>
                        <th class="px-4 py-2 text-left">Name</th>
                        <th class="px-4 py-2 text-left">Address</th>
                        <th class="px-4 py-2 text-left">Phone</th>
                        <th class="px-4 py-2 text-left">Email</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($customers as $customer)
                        <tr class="border-b">
                            <td class="px-4 py-2">{{ $customer->name }}</td>
                            <td class="px-4 py-2">{{ $customer->address }}</td>
                            <td class="px-4 py-2">{{ $customer->phone ?? '' }}</td>
                            <td class="px-4 py-2">{{ $customer->email }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
