@extends('layouts.admin-master')
@section('content')
    <div class="row">
        <div class="medium-12 large-12 columns">
            <h4>New Room</h4>
            <form action="/admin/new" method="post">
                <div class="medium-4  columns">
                    <label>Name</label>
                    <input name="form[name]" type="text">
                </div>
                <div class="medium-4  columns">
                    <label>Floor</label>
                    <input name="form[floor]" type="text">
                </div>
                <div class="medium-8  columns">
                    <label>Description</label>
                    <input name="form[description]" type="text">
                </div>
                <div class="medium-12  columns">
                    <input value="SAVE" class="button success hollow" type="submit">
                </div>
            </form>
        </div>
    </div>
@endsection