@extends('layouts.app')

@section('content')
<form action="{{ route('edit',$user->id.'/edit')}}" method="POST">
    @csrf
    @method('PUT') 
        <div class="form-group mb-2">
            <label for="name" class="col-sm-2 col-form-label">Name</label>
            <input type="text" class="form-control" id="name" name="name" value="{{$user->name ?? ''}}">
        </div>

        <div class="form-group mb-2">
            <label for="email" class="col-sm-2 col-form-label">Email</label>
            <input type="email" class="form-control" id="email" name="email" value="{{$user->email ?? ''}}">
        </div>

        <div class="form-group mb-2">
            <label for="contact" class="col-sm-2 col-form-label">Contact</label>
            <input type="text" class="form-control" id="contact" name="contact" value="{{$user->contact ?? ''}}">
        </div>

        <div class="form-group mb-2">
            <label for="location" class="col-sm-2 col-form-label">Location</label>
            <input type="text" class="form-control" id="location" name="location" value="{{$user->location ?? ''}}">
        </div>

        <div class="form-group mb-2">
            <label for="home_cell" class="col-sm-2 col-form-label">Home Cell</label>
            <input type="text" class="form-control" id="home_cell" name="home_cell" value="{{$user->home_cell ?? ''}}">
        </div>

        <div class="form-group mb-2">
            <label for="marital_status" class="col-sm-2 col-form-label">Marital Status</label>
            <select name="marital_status">
                <option value="{{$user->marital_status ?? ''}}">{{$user->marital_status ?? ''}}</option>
            <option value="Married">Married</option>
            <option value="Single">Single</option>
            <option value="Divorced">Divorced</option>
            <option value="Widow">Widow</option>
            <option value="Widower">Widower</option>
            </select>
        </div>

        <div class="form-group mb-2">
            <label for="no_of_children" class="col-sm-2 col-form-label">Number of Children</label>
            <input type="number" class="form-control" id="no_of_children" name="no_of_children" value="{{$user->no_of_children ?? ''}}">
        </div>
        <button type="submit" class="btn btn-default submit-btn">Submit</button>

</form>
@endsection