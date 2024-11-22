<?php

namespace App\Http\Controllers;

use App\Models\Reservation;
use Illuminate\Http\Request;

class ReservationController extends Controller
{
    public function index()
    {
        $reservations = Reservation::with('user')->get();

        return view('reservations.index', compact('reservations'));
    }

    public function create()
    {
        return view('reservations.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'user_id' => 'required|exists:users,id',
            'table' => 'required|string|max:255',
            'reservation_date' => 'required|date|after_or_equal:today',
            'guest_count' => 'required|integer|min:1',
        ]);

        $reservation = Reservation::create($request->all());

        return redirect()->route('reservations.show', $reservation);
    }

    public function show(Reservation $reservation)
    {
        return view('reservations.show', compact('reservation'));
    }

    public function edit(Reservation $reservation)
    {
        return view('reservations.edit', compact('reservation'));
    }

    public function update(Request $request, Reservation $reservation)
    {
        $request->validate([
            'user_id' => 'required|exists:users,id',
            'table' => 'required|string|max:255',
            'reservation_date' => 'required|date|after_or_equal:today',
            'guest_count' => 'required|integer|min:1',
        ]);

        $reservation->update($request->all());

        return redirect()->route('reservations.show', $reservation);
    }

    public function destroy(Reservation $reservation)
    {
        $reservation->delete();

        return redirect()->route('reservations.index');
    }

}
