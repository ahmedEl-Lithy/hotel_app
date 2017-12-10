@extends('layouts.admin-master')
@section('content')
    <div class="row">
        <div class="medium-6 large-7 columns">
                <h4>Reservations</h4>
                <table class="stack">
                    <thead>
                    <tr>
                        <th width="200">Client Name</th>
                        <th width="200">Room Number</th>
                        <th width="200">Date In</th>
                        <th width="200">Date Out</th>
                        <th width="200">Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach( $reservations as $reservation )
                        <tr>
                            <td>{{ $reservation->user->first_name }} {{ $reservation->user->last_name }}</td>
                            <td>{{ $reservation->room->name }}</td>
                            <td>{{ $reservation->date_in }}</td>
                            <td>{{ $reservation->date_out }}</td>
                            <td>
                                <a class="hollow button warning" href="{{ route('delete_reservation', ['id' => $reservation->id ]) }}">Delete</a>
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
