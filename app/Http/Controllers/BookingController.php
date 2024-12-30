<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Response;
use App\Models\Booking;
use Illuminate\View\View;

class BookingController extends Controller
{
    
   /**
     * Display a listing of the resource. (GET) 
     */
    public function index() : View
    {
       
            $bookings = Booking::all();
            return view ('bookings.index')->with('bookings', $bookings);
      
    }

    /**
     * Show the form for creating a new resource. (GET)
     */
    public function create(): View
    {
        return view('bookings.create');
    }

    /**
     * Store a newly created resource in storage. (POST)
     */
    public function store(Request $request): RedirectResponse
    {
        $input = $request->all();
        Booking::create($input);
        return redirect('bookings')->with('flash_message', 'Booking Addedd!');
    }

    /**
     * Display the specified resource. (GET)
     */
    public function show(string $id): View
    {   
        $booking = Booking::find($id);
        return view('bookings.show')->with('booking', $booking);
    }

    /**
     * Show the form for editing the specified resource.(GET)
     */
    public function edit(string $id): View
    {
        $booking = Booking::find($id);
        return view('bookings.edit')->with('bookings', $booking);
    }

    /**
     * Update the specified resource in storage.(PUT)
     */
    public function update(Request $request, string $id): RedirectResponse
    {
        $booking = Booking::find($id);
        $input = $request->all();
        $booking->update($input);
        return redirect('bookings')->with('flash_message', 'Booking Updated!'); 
    }

    /**
     * Remove the specified resource from storage.(DELETE)
     */
    public function destroy(string $id): RedirectResponse
    {
        Booking::destroy($id);
        return redirect('bookings')->with('flash_message', 'Booking deleted!'); 
    }
}
