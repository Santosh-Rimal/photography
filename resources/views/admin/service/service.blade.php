@extends('layout.admin.master')

@section('content')
    <div class="container mx-auto p-6">
        <h1 class="text-2xl font-bold mb-4">Services List</h1>

        @if (session('success'))
            <div class="bg-green-500 text-white p-3 rounded mb-4">
                {{ session('success') }}
            </div>
        @endif

        <div class="flex justify-end mb-4">
            <a class="bg-blue-500 text-white px-4 py-2 rounded" href="{{ route('services.create') }}">Add New Service</a>
        </div>

        <table class="min-w-full table-auto border-collapse">
            <thead>
                <tr>
                    <th class="px-4 py-2 border">Service Name</th>
                    <th class="px-4 py-2 border">Description</th>
                    <th class="px-4 py-2 border">Package</th>
                    <th class="px-4 py-2 border">Price</th>
                    <th class="px-4 py-2 border">Image</th> <!-- New column -->
                    <th class="px-4 py-2 border">Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($services as $service)
                    <tr>
                        <td class="px-4 py-2 border">{{ $service->name }}</td>
                        <td class="px-4 py-2 border">{{ $service->description }}</td>
                        <td class="px-4 py-2 border">{{ $service->package }}</td>
                        <td class="px-4 py-2 border">${{ $service->price }}</td>

                        <!-- Display image or a placeholder if no image -->
                        <td class="px-4 py-2 border">
                            @if ($service->image)
                                <a data-fancybox data-src="{{ asset('admin/assets/img/service/' . $service->image) }}"
                                    data-caption="Hello world">
                                    <img class="w-16 h-16 object-cover"
                                        src="{{ asset('admin/assets/img/service/' . $service->image) }}" alt="No Image">
                                </a>
                            @else
                                No image
                            @endif
                        </td>

                        <td class="px-4 py-2 border">
                            <a class="text-blue-500" href="{{ route('services.edit', $service->id) }}">Edit</a>
                            <form class="inline-block ml-2" action="{{ route('services.destroy', $service->id) }}"
                                method="POST">
                                @csrf
                                @method('DELETE')
                                <button class="text-red-500" type="submit">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
