@extends('layouts.master')

@section('content')
<div class="row">
      <div class="medium-12 large-12 columns">
        <h4>Profile</h4>
        <table class="stack">
          <thead>
            <tr>
              <th width="200">Name</th>
              <th width="200">Email</th>
              <th width="200">Action</th>
            </tr>
          </thead>
          <tbody>
              <tr>
                  <td>{{ $first_name }} {{ $last_name }}</td>
                  <td>{{ $email }}</td>
                  <td>
                      <a class="hollow button" href="{{ route('show_client', ['client_id' => $id ]) }}">EDIT INFO</a>
                      <a class="hollow button warning" href="{{ route('check_room', ['client_id' => $id ]) }}">BOOK A ROOM</a>
                      <a class="hollow button warning" href="{{ route('show_reservations', ['client_id' => $id ]) }}">SHOW RESERVATION</a>
                  </td>
              </tr>
          </tbody>
        </table>
      </div>
    </div>
@endsection