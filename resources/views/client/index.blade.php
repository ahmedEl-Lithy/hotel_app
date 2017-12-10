@extends('layouts.master')

@section('content')
<div class="row">
      <div class="medium-12 large-12 columns">
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
                  <a class="hollow button" href="{{ route('show_client', ['client_id' => $user->id ]) }}">EDIT</a>
                  <a class="hollow button warning" href="{{ route('check_room', ['client_id' => $user->id ]) }}">BOOK A ROOM</a>
                </td>
              </tr>
          @endforeach
          </tbody>
        </table>
      </div>
    </div>
@endsection