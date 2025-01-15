<?php

namespace App\Repositories;

use App\Models\Booking;

class BookingRepository
{
    public function getAll()
    {
        return Booking::with('models')->get(); // Inclut les modèles associés
    }

    public function findById($id)
    {
        return Booking::with('models')->findOrFail($id);
    }

    public function create(array $data)
    {
        $booking = Booking::create([
            'customer_name' => $data['customer_name'],
            'booking_date' => $data['booking_date'],
        ]);

        if (!empty($data['models'])) {
            $booking->models()->attach($data['models']);
        }

        return $booking;
    }

    public function update($id, array $data)
    {
        $booking = Booking::findOrFail($id);
        $booking->update([
            'customer_name' => $data['customer_name'] ?? $booking->customer_name,
            'booking_date' => $data['booking_date'] ?? $booking->booking_date,
        ]);

        if (!empty($data['models'])) {
            $booking->models()->sync($data['models']);
        }

        return $booking;
    }

    public function delete($id)
    {
        $booking = Booking::findOrFail($id);
        $booking->delete();
        return $booking;
    }
}
