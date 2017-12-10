@extends('layouts.admin-master')
@section('content')
    <div class="row">
        <div class="medium-12 large-12 columns">
            <h4>{{ $modify == 1 ? 'Modify Room' : 'New Room' }}</h4>
            <form action="{{ $modify == 1 ? route('update_room', [ 'room_id' => $room_id ]) : route('create_room') }}" method="post">
                {{ csrf_field() }}
                <div class="medium-4  columns">
                    <label>Name</label>
                    <input name="name" type="text" value="{{ old('name') ? old('name') : $name }}">
                    <small class="error">{{$errors->first('name')}}</small>
                </div>
                <div class="medium-4  columns">
                    <label>Floor</label>
                    <input name="floor" type="text" value="{{ old('floor') ? old('floor') : $floor }}">
                    <small class="error">{{$errors->first('floor')}}</small>
                </div>
                <div class="medium-8  columns">
                    <label>Description</label>
                    <input name="description" type="text" value="{{ old('description') ? old('description') : $description }}">
                    <small class="error">{{$errors->first('description')}}</small>
                </div>
                <div class="medium-12  columns">
                    <input value="SAVE" class="button success hollow" type="submit">
                </div>
            </form>
        </div>
    </div>
@endsection