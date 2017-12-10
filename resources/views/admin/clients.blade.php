@extends('layouts.admin-master')
@section('content')

    <div class="row">
        <div class="medium-6 large-7 columns">
            <h4>Clients</h4>
            <table class="stack">
                <thead>
                <tr>
                    <th width="200">Name</th>
                    <th width="200">Email</th>
                    <th width="200">Reservations</th>
                    <th width="200">Action</th>
                </tr>
                </thead>
                <tbody>
                @foreach( $users as $user )
                    <tr>
                        <td>{{ $user->first_name }} {{ $user->last_name }}</td>
                        <td>{{ $user->email }}</td>
                        <td>
                            {{ $user->email }}
                        </td>
                        <td>
                            <a class="hollow button warning" href="{{ route('show_client_reservation', ['client_id' => $user->id ]) }}">SHOW RESERVATION</a>
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
