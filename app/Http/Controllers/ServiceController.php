<?php

namespace App\Http\Controllers;

use File;
use App\Models\Service;
use Illuminate\Http\Request;

class ServiceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $services = Service::all();
        return view('admin.service.service', compact('services'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.service.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $input = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'package' => 'required|string|max:255',
            'price' => 'required|numeric|min:0',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        // Upload image if present
        $input['image'] = $this->fileUpload($request, 'image');

        // Create a new service
        Service::create($input);

        return redirect()->route('services.index')->with('success', 'Service created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        // Implementation can go here if needed
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Service $service)
    {
        return view('admin.service.edit', compact('service'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Service $service)
    {
        // Validate the updated data
        $input = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'package' => 'required|string|max:255',
            'price' => 'required|numeric|min:0',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        // Check if there is a new image uploaded
        if ($request->hasFile('image')) {
            // Remove old image
            $this->removeFile($service->image);

            // Upload new image and store its name
            $input['image'] = $this->fileUpload($request, 'image');
        }

        // Update the service
        $service->update($input);

        return redirect()->route('services.index')->with('success', 'Service updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Service $service)
    {
        // Delete associated image file
        $this->removeFile($service->image);

        // Delete the service from the database
        $service->delete();

        return redirect()->route('services.index')->with('success', 'Service deleted successfully.');
    }

    /**
     * Handle file upload and return the image name.
     */
    private function fileUpload($request, $name)
    {
        $imageName = '';
        if ($image = $request->file($name)) {
            // Define destination path
            $destinationPath = public_path() . '/admin/assets/img/service';

            // Generate unique file name
            $imageName = date('YmdHis') . '-' . $name . '-' . $image->getClientOriginalName();

            // Move image to the destination folder
            $image->move($destinationPath, $imageName);
        }

        return $imageName; // Return the image name for saving in the database
    }

    /**
     * Remove the file from the server.
     */
    private function removeFile($file)
    {
        $path = public_path() . '/admin/assets/img/service/' . $file;
        if (File::exists($path)) {
            File::delete($path); // Delete the file if it exists
        }
    }
}