<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use App\Models\Service;
use Illuminate\Http\Request;

class FserviceController extends Controller
{
    public function index(){
    $services=Service::get();
    return view('customer.service',compact('services'));
    }


    public function show(Service $service)
{
    // Fetch related services (you could customize this to use a category or tag-based relation if available)
    $relatedServices = Service::where('id', '!=', $service->id)
                              ->inRandomOrder()
                              ->take(4)
                              ->get();

    return view('customer.singleservice', compact('service', 'relatedServices'));
}

    public function bookForm(Service $service)
    {
          $invoice = $this->unvoicegenerator(6);
          
         return view('customer.bookingservice', compact('service', 'invoice'));
    }




    public function storeBooking(Request $request, $serviceId)
    {
        // Validate the form input data
        $validated = $request->validate([
            'address' => 'required|string|max:255',
            'venue' => 'required|string|max:255',
            'date' => 'required|date|after_or_equal:today', // Ensure the date is not in the past
            'number' => 'required|numeric',
            'payment' => 'required|string|max:255',
        ]);

        // Find the service by its ID
        $service = Service::findOrFail($serviceId);

        // Check if the service is already booked for the selected date
        $existingBooking = Booking::where('service_id', $service->id)
            ->where('date', $request->date)
            ->first();

        if ($existingBooking) {
            // If there is an existing booking for the selected date, show an error
            return redirect()->back()->withErrors(['date' => 'This service is already booked for the selected date. Please choose another date.']);
        }

        // Create a new booking entry in the database
        Booking::create([
            'user_id' => auth()->id(), // Assuming the user is logged in
            'service_id' => $service->id,
            'address' => $request->address,
            'venue' => $request->venue,
            'date' => $request->date,
            'number' => $request->number,
            'payment' => 'paid',
            'invoice' => $request->invoice,
        ]);

        // Redirect back with success message
        return redirect()->route('showservice', $service->id)->with('success', 'Your booking was successful!');
    }



     private function unvoicegenerator($length = 6)
    {
        $characters = '0123456789';  // Allowed characters (digits only)
        $invoice = '';
        $charactersLength = strlen($characters);

        // Loop to generate OTP of the desired length
        for ($i = 0; $i < $length; $i++) {
            $randomIndex = mt_rand(0, $charactersLength - 1);
            $invoice .= $characters[$randomIndex];
        }

        return $invoice;
    }

    public function showbook()
    {
        $bookings = Booking::with('service')->where('user_id', auth()->id())->get();

        return view('customer.mybooking', compact('bookings'));
    }
    public function bookingdetails($invoice)
    {
       $booking = Booking::with(['service','user'])->where('invoice', $invoice)->first();
        return view('customer.bookingdetail', compact('booking'));
    }

   public function esewaPayment($invoice)
{
    $booking = Booking::where('invoice', $invoice)->with(['user', 'service'])->first();

    if (!$booking) {
        // Handle case where booking is not found
        abort(404, 'Booking not found');
    }

    $product_code = 'EPAYTEST';
    $secret_key = '8gBm/:&EnhH.1/q';

    // Construct the message for HMAC calculation
    $message = "total_amount={$booking->service->price},transaction_uuid={$invoice},product_code={$product_code}";

    // Generate the HMAC SHA256 hash
    $signature = hash_hmac('sha256', $message, $secret_key, true);

    // Base64 encode the signature
    $base64_signature = base64_encode($signature);

    return view('customer.esewaform', compact('booking', 'invoice', 'product_code', 'base64_signature'));
}


}