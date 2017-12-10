<?php
namespace App\Http\Controllers;
use App\User as User;
use App\Room as Room;
use App\Reservation as Reservation;

use Illuminate\Http\Request;

class ReservationsController extends Controller
{
    public function bookRoom($client_id, $room_id, $date_in, $date_out)
    {
        $reservation = new Reservation();
        $user_instance = new User();
        $room_instance = new Room();

        $user = $user_instance->find($client_id);
        $room = $room_instance->find($room_id);
        $reservation->date_in = $date_in;
        $reservation->date_out = $date_out;

        $reservation->room()->associate($room);
        $reservation->user()->associate($user);
        if( $room_instance->isRoomBooked( $room_id, $date_in, $date_out ) )
        {
            abort(405, 'Trying to book an already booked room');
        }
        $reservation->save();

        return redirect()->route('clients');
    }

    public function reservations()
    {
        $data = [];
        $data['reservations'] = Reservation::all();
        return view('admin/reservations', $data);
    }

    public function showReservation($client_id)
    {
        $data = [];
        $data['reservations'] = Reservation::all()->where('client_id',$client_id);

        return view('client/reservations', $data);
    }

    public function clientReservations($client_id)
    {
        $data = [];
        $data['reservations'] = Reservation::all()->where('client_id',$client_id);

        return view('admin/client_reservation', $data);
    }
    public function DeleteReservation($id){
        $data = Reservation::where('id',$id)->delete();
        return back();
    }
}
