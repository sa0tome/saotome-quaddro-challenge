<?php

namespace App\Http\Controllers;


use Exception;
use Illuminate\Http\Request;
use App\Http\Requests\StoreBookingRequest;
use App\Repositories\BookingRepository;

class BookingController extends Controller
{
    private $bookingRepository;

    public function __construct()
    {
        $this->bookingRepository = new BookingRepository;
    }

    public function index(Request $request)
    {
        $bookings = $this->bookingRepository->getFromSearch($request);

        return view('booking.index',[
            'bookings' => $bookings
        ]);
    }

    public function create()
    {
        return view('booking.create');
    }

    public function store(StoreBookingRequest $request)
    {
        $validated = $request->validated();

        try {
            $this->bookingRepository->saveNew($validated);

            return redirect('/');
        } catch (\Throwable $th) {
            throw new Exception($th->getMessage(), 1);
        }
    }

    public function destroy($id)
    {
        try {
            $this->bookingRepository->deleteFromId($id);
            
            return redirect('/');
        } catch (\Throwable $th) {
            throw new Exception($th->getMessage(), 1);
        }
    }
}

