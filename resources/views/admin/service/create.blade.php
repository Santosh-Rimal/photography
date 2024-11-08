@extends('layout.admin.master')

@section('content')
    <div class="container mx-auto p-6">
        <h1 class="text-2xl font-bold mb-4">Create Service</h1>

        <form class="space-y-4" action="{{ route('services.store') }}" method="POST" enctype="multipart/form-data">
            @csrf

            <!-- Service Name -->
            <div>
                <label class="block text-sm font-medium" for="name">Service Name</label>
                <input class="w-full border rounded px-3 py-2 @error('name') border-red-500 @enderror" id="name"
                    type="text" name="name" value="{{ old('name') }}" required>
                @error('name')
                    <div class="text-red-500 text-xs mt-1">{{ $message }}</div>
                @enderror
            </div>

            <!-- Description -->
            <div>
                <label class="block text-sm font-medium" for="description">Description</label>
                <textarea class="w-full border rounded px-3 py-2 @error('description') border-red-500 @enderror" id="description"
                    name="description" required>{{ old('description') }}</textarea>
                @error('description')
                    <div class="text-red-500 text-xs mt-1">{{ $message }}</div>
                @enderror
            </div>

            <!-- Package -->
            <div>
                <label class="block text-sm font-medium" for="package">Package</label>
                <input class="w-full border rounded px-3 py-2 @error('package') border-red-500 @enderror" id="package"
                    type="text" name="package" value="{{ old('package') }}" required>
                @error('package')
                    <div class="text-red-500 text-xs mt-1">{{ $message }}</div>
                @enderror
            </div>

            <!-- Price -->
            <div>
                <label class="block text-sm font-medium" for="price">Price</label>
                <input class="w-full border rounded px-3 py-2 @error('price') border-red-500 @enderror" id="price"
                    type="number" name="price" value="{{ old('price') }}" required>
                @error('price')
                    <div class="text-red-500 text-xs mt-1">{{ $message }}</div>
                @enderror
            </div>

            <!-- Service Image -->
            <div>
                <label class="block text-sm font-medium" for="image">Service Image</label>
                <input class="w-full border rounded px-3 py-2 @error('image') border-red-500 @enderror" type="file"
                    name="image">
                @error('image')
                    <div class="text-red-500 text-xs mt-1">{{ $message }}</div>
                @enderror
            </div>

            <div class="flex justify-between items-center">
                <a class="bg-gray-500 text-white px-4 py-2 rounded" href="{{ route('services.index') }}">Back</a>
                <button class="bg-blue-500 text-white px-4 py-2 rounded" type="submit">Save</button>
            </div>
        </form>
    </div>
@endsection
