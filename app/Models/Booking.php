<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Booking extends Model
{
     use HasFactory;

   // In the Booking model
protected $fillable = [
    'user_id', 'service_id', 'address','invoice', 'venue', 'date', 'number', 'payment', 'google_photos_link',
];


   public function service()
    {
        return $this->belongsTo(Service::class); // Each booking belongs to one service
    }

    // Define the relationship to the User model (for customer)
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}