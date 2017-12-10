@extends('layouts.admin-master')
@section('content')
    <div class="row">
        <div class="medium-7 large-8 columns">
            <h4>Reservations</h4>
            <div class="medium-4  columns"><a class="button hollow success" href="{{ route('new_room') }}">ADD NEW ROOM</a></div>
            <table class="stack">
                <thead>
                <tr>
                    <th width="200">Room Number</th>
                    <th width="200">Floor</th>
                    <th width="200">Description</th>
                    <th width="200">Action</th>
                </tr>
                </thead>
                <tbody>
                @foreach( $rooms as $room )
                    <tr>
                        <td>{{ $room->name }}</td>
                        <td>{{ $room->floor }}</td>
                        <td>{{ $room->description }}</td>
                        <td>
                            <a class="hollow button" href="{{ route('show_room', ['id' => $room->id ]) }}">EDIT</a>
                            <a class="hollow button warning" href="{{ route('delete_room', ['id' => $room->id ]) }}">DELETE</a>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
    </div>
    </div>
@endsection
