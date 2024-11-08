@extends('layout.admin.master')

@section('content')
    <div class="container mx-auto p-6">
        <div class="flex justify-between items-center mb-6">
            <h1 class="text-2xl font-bold">My Work</h1>

            <!-- Button to Create New Work -->
            <a class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600" href="{{ route('myworks.create') }}">
                Add New Work
            </a>
        </div>

        <!-- Success Message -->
        @if (session('success'))
            <div class="bg-green-500 text-white p-3 rounded mb-4">
                {{ session('success') }}
            </div>
        @endif

        <!-- Works Table -->
        <table class="min-w-full table-auto border-collapse">
            <thead>
                <tr>
                    <th class="px-4 py-2 border">Work Name</th>
                    <th class="px-4 py-2 border">Description</th>
                    <th class="px-4 py-2 border">Image</th>
                    <th class="px-4 py-2 border">Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($works as $work)
                    <tr>
                        <td class="px-4 py-2 border">{{ $work->name }}</td>
                        <td class="px-4 py-2 border">{{ $work->description }}</td>
                        <td class="px-4 py-2 border">
                            @if ($work->image_url)
                                <img class="w-20 h-20 object-cover" src="{{ $work->image_url }}" alt="{{ $work->name }}">
                            @else
                                No Image
                            @endif
                        </td>
                        <td class="px-4 py-2 border">
                            <!-- Edit Button -->
                            <a class="text-blue-500 hover:text-blue-700" href="{{ route('myworks.edit', $work->id) }}">
                                Edit
                            </a>

                            <!-- Delete Form -->
                            <form class="inline-block ml-2" action="{{ route('myworks.destroy', $work->id) }}"
                                method="POST" onsubmit="return confirm('Are you sure you want to delete this work?');">
                                @csrf
                                @method('DELETE')
                                <button class="text-red-500 hover:text-red-700" type="submit">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
