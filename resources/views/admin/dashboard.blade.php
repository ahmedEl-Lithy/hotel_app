@extends('layouts.admin-master')
@section('content')

    <div class="row">
        <div class="medium-5 large-5 columns">
            <h4>Clients</h4>
            <table class="stack">
                <thead>
                <tr>
                    <th width="200">Name</th>
                    <th width="200">Email</th>
                    <th width="200">Action</th>
                </tr>
                </thead>
                <tbody>
                @foreach( $users as $user )
                    <tr>
                        <td>{{ $user->first_name }} {{ $user->last_name }}</td>
                        <td>{{ $user->email }}</td>
                        <td>
                            <a class="hollow button" href="{{ route('show_client_reservation', ['client_id' => $user->id ]) }}">SHOW RESERVATION</a>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
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
                        <td>{{ $reservation->user->name }} {{ $reservation->user->last_name }}</td>
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
