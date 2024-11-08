<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use Illuminate\Http\Request;

class BookingController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $bookings = Booking::with(['user', 'service'])->get();
        return view('admin.booking.booking',compact('bookings'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
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
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }

    


    public function addGooglePhotosLink(Request $request, $invoice)
{
    // Validate the incoming request
    $request->validate([
        'google_photos_link' => 'required|url',
    ]);

    // Find the booking by invoice
    $booking = Booking::where('invoice', $invoice)->first();

    // Only update if the booking exists and is paid
    if ($booking && strtolower($booking->payment) === 'paid') {
        $booking->google_photos_link = $request->google_photos_link;
        $booking->save();
        
        return redirect()->back()->with('status', 'Google Photos link added successfully!');
    }

    return redirect()->back()->with('error', 'Booking not found or not paid.');
}



}