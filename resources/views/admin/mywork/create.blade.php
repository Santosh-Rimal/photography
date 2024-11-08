@extends('layout.admin.master')

@section('content')
    @include('layout.admin.header')

    <div class="container mx-auto p-6">
        <div class="flex justify-between items-center mb-6">
            <h1 class="text-2xl font-bold">Add New Work</h1>
            <!-- Back Button -->
            <a class="text-blue-500 underline hover:text-blue-700" href="{{ route('myworks.index') }}">Back to My Work</a>
        </div>

        <form action="{{ route('myworks.store') }}" method="POST">
            @csrf
            <div class="mb-4">
                <label class="block text-gray-700" for="name">Work Name</label>
                <input class="w-full p-2 border border-gray-300 rounded" id="name" type="text" name="name"
                    required>
                @error('name')
                    <div class="text-red-500 text-sm mt-1">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-4">
                <label class="block text-gray-700" for="description">Description</label>
                <textarea class="w-full p-2 border border-gray-300 rounded" id="description" name="description" rows="4"></textarea>
                @error('description')
                    <div class="text-red-500 text-sm mt-1">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-4">
                <label class="block text-gray-700" for="image_url">Image URL</label>
                <input class="w-full p-2 border border-gray-300 rounded" id="image_url" type="url" name="image_url">
                @error('image_url')
                    <div class="text-red-500 text-sm mt-1">{{ $message }}</div>
                @enderror
            </div>

            <button class="bg-blue-500 text-white px-4 py-2 rounded" type="submit">Add Work</button>
            <!-- Back Button Below Form -->
            <a class="text-blue-500 underline hover:text-blue-700 ml-4" href="{{ route('myworks.index') }}">Back to My
                Work</a>
        </form>
    </div>
@endsection
