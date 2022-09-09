<?php

namespace App\Repositories;

use App\Models\Booking;

class BookingRepository
{
    public function getFromSearch($request)
    {
        if(isset($request->search)) {
            $bookings = Booking::where('title','LIKE',"%{$request->search}%")->get();
        } else {
            $bookings = Booking::all();
        }
        
        if(isset($request->order_by)) {
            switch ($request->order_by) {
                case "title_order":
                    $bookings = $bookings->sortBy('title');
                    break;
                case "start_date_order":
                    $bookings = $bookings->sortBy('start_date');
                    break;
                case "end_date_order":
                    $bookings = $bookings->sortBy('end_date');
                    break;
            }
        }

        return $bookings;
    }

    public function saveNew($attributes) 
    {
        $booking = new Booking();

        $booking->title = $attributes["title"];
        $booking->start_date = $attributes["start_date"];
        $booking->end_date = $attributes["end_date"];
    
        return $booking->save();
    }

    public function deleteFromId($id) 
    {
        $booking = Booking::find($id);

        return $booking->delete();
    }
}