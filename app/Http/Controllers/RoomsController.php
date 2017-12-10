<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Room;
use App\Reservation;

class RoomsController extends Controller
{
    public function checkAvailableRooms($client_id, Request $request)
    {
        $dateFrom = $request->input('dateFrom');
        $dateTo = $request->input('dateTo');
        $user = new User();
        $room = new Room();

        $data = [];
        $data['dateFrom'] = $dateFrom;
        $data['dateTo'] = $dateTo;
        $data['rooms']= $room->getAvailableRooms($dateFrom, $dateTo);
        $data['user'] = $user->find($client_id);

        return view('rooms/checkAvailableRooms', $data);
    }

    public function viewRooms()
    {
        $data = [];
        $data['rooms'] = Room::all();
        return view('admin/rooms', $data);
    }
    
    public function DeleteRoom($id){
        $room = [];
        $room = Room::find($id);
        Reservation::where('room_id',$room->id)->delete();
        Room::where('id', $id)->delete();
        return back();
    }

    public function newRoom( Request $request, Room $room )
    {
        $data = [];
        $data['name'] = $request->input('name');
        $data['floor'] = $request->input('floor');
        $data['description'] = $request->input('description');

        if( $request->isMethod('post') )
        {
            $this->validate(
                $request,
                [
                    'name' => 'required',
                    'floor' => 'required',
                    'description' => 'required',
                ]
            );

            $room->insert($data);
            return redirect('admin');
        }
        $data['modify'] = 0;
        return view('admin/form', $data);
    }

    public function show($room_id, Request $request)
    {
        $data = [];
        $data['room_id'] = $room_id;
        $data['modify'] = 1;
        $room_data = Room::find($room_id);
        $data['name'] = $room_data->name;
        $data['floor'] = $room_data->floor;
        $data['description'] = $room_data->description;

        return view('admin/form', $data);
    }

    public function modifyRoom( Request $request, $room_id, Room $room )
    {
        $data = [];
        $data['name'] = $request->input('name');
        $data['floor'] = $request->input('floor');
        $data['description'] = $request->input('description');

        if( $request->isMethod('post') )
        {
            $this->validate(
                $request,
                [
                    'name' => 'required',
                    'floor' => 'required',
                    'description' => 'required',
                ]
            );

            $room_data = Room::find($room_id);
            $room_data->name = $request->input('name');
            $room_data->floor = $request->input('floor');
            $room_data->description = $request->input('description');
            $room_data->save();

            return redirect('admin/');
        }
        return view('admin/form', $data);
    }

}
