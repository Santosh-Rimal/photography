<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Service extends Model
{
    use HasFactory;
    protected $fillable = ['name', 'description', 'package', 'price','image'];

    public function bookings(): HasMany
    {
        return $this->hasMany(Booking::class);
    }
}