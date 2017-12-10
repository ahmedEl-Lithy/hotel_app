@extends('layouts.master')

@section('content')
<div class="row">
  <div class="medium-12 large-12 columns">
    <h4>New Client</h4>
      <form action="/clients/new" method="post">
        <div class="medium-4  columns">
          <label>First Name</label>
          <input name="form[first_name]" type="text">
        </div>
        <div class="medium-4  columns">
          <label>Last Name</label>
          <input name="form[lastName]" type="text">
        </div>
        <div class="medium-8  columns">
          <label>Address</label>
          <input name="form[address]" type="text">
        </div>
        <div class="medium-4  columns">
          <label>City</label>
          <input name="form[city]" type="text">
        </div>
        <div class="medium-4  columns">
          <label>State</label>
          <input name="form[state]" type="text">
        </div>
        <div class="medium-12  columns">
          <label>Email</label>
          <input name="form[email]" type="text">
        </div>
        <div class="medium-12  columns">
          <label>Password</label>
          <input name="form[password]" type="text">
        </div>
        <div class="medium-12  columns">
          <input value="SAVE" class="button success hollow" type="submit">
        </div>
      </form>
    </div>
  </div>
@endsection