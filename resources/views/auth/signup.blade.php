@extends('layouts.master')

@section('content')
    <form action="{{ route('signup') }}" method="post">
        <div class="input-group">
            <label for="first_name">First Name</label>
            <input type="text" id="first_name" name="first_name">
        </div>
        <div class="input-group">
            <label for="last_name">Last Name</label>
            <input type="text" id="last_name" name="last_name">
        </div>
        <div class="input-group">
            <label for="email">E-Mail</label>
            <input type="email" id="email" name="email">
        </div>
        <div class="input-group">
            <label for="password">Password</label>
            <input type="password" id="password" name="password">
        </div>
        <div class="input-group">
            <label for="address">Address</label>
            <input type="address" id="address" name="address">
        </div>
        <div class="input-group">
            <label for="city">City</label>
            <input type="city" id="city" name="city">
        </div>
        {{ csrf_field() }}
        <button type="submit">Sign Up</button>
    </form>
@endsection