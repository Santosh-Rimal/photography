<?php

namespace App\Http\Controllers;

use App\Models\Mywork;
use Illuminate\Http\Request;

class MyworkController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
       $works = Mywork::get(); // You can paginate if needed
        return view('admin.mywork.mywork', compact('works'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.mywork.create');
    }

    /**
     * Store a newly created resource in storage.
     */
   public function store(Request $request)
    {
        // Validate the input
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'image_url' => 'nullable|url',
        ]);

        // Create a new work entry
        Mywork::create($validated);

        // Redirect to the index page with a success message
        return redirect()->route('myworks.index')->with('success', 'Work added successfully!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
{
    // Find the work by its ID or fail if not found
    $work = Mywork::findOrFail($id);

    // Return the edit view with the work object
    return view('admin.mywork.edit', compact('work'));
}

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
{
    // Validate the incoming request data
    $validated = $request->validate([
        'name' => 'required|string|max:255',
        'description' => 'nullable|string',
        'image_url' => 'nullable|url',
    ]);

    // Find the work entry by its ID or fail if not found
    $work = Mywork::findOrFail($id);

    // Update the work with the validated data
    $work->update($validated);

    // Redirect back to the index page with a success message
    return redirect()->route('myworks.index')->with('success', 'Work updated successfully!');
}

    /**
     * Remove the specified resource from storage.
     */
     public function destroy(Mywork $mywork)
{
    $mywork->delete();

    return redirect()->route('myworks.index')->with('success', 'Service deleted successfully.');
}
}