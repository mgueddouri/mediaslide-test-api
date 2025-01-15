<?php

namespace App\Http\Controllers;

use App\Services\BookingService;
use Illuminate\Http\Request;

class BookingController extends Controller
{
    protected $bookingService;

    public function __construct(BookingService $bookingService)
    {
        $this->bookingService = $bookingService;
    }

    public function index()
    {
        return response()->json($this->bookingService->getAllBookings(), 200);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'customer_name' => 'required|string|max:255',
            'booking_date' => 'required|date',
            'models' => 'required|array',
            'models.*' => 'exists:models,id', // Vérifie que chaque ID de modèle existe
        ]);

        $booking = $this->bookingService->createBooking($validated);

        return response()->json($booking->load('models'), 201);
    }

    public function show($id)
    {
        return response()->json($this->bookingService->getBookingById($id), 200);
    }

    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'customer_name' => 'sometimes|string|max:255',
            'booking_date' => 'sometimes|date',
            'models' => 'sometimes|array',
            'models.*' => 'exists:models,id',
        ]);

        $booking = $this->bookingService->updateBooking($id, $validated);

        return response()->json($booking->load('models'), 200);
    }

    public function destroy($id)
    {
        $this->bookingService->deleteBooking($id);
        return response()->json(null, 204);
    }
}
