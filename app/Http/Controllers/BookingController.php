<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Rooms;

class BookingController extends Controller
{
    public function show($id)
    {
        $room = Rooms::findOrFail($id);
        return view('booking.show', compact('room'));
    }

    public function store(Request $request)
    {
        // Validation and booking logic here
        // For now, redirect back with a success message
        return redirect()->route('home')->with('success', 'Booking request submitted successfully!');
    }
}
