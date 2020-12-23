@extends('generic.mysidebar')
@section('content')
<style>
    select:invalid {
        color: gray;
    }

    option {
        color: black;
    }
</style>
<div class="card-header py-3">
    <h6 class="m-0 font-weight-bold text-primary">Add</h6>
</div>
<div class="card-body">
    {{-- success message --}}
    <div class="col-sm-12">
        @if(session()->get('success'))
        <div class="alert-link" class="alert alert-success">
            {{ session()->get('success') }}
        </div>
        @endif
    </div>

    {{-- error messages --}}

    @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif
            <form action="{{ route('saveUser') }}" method="POST">
                @csrf
                <div class="form-group mb-2">
                    <label for="name" class="col-sm-6 col-form-label">Name*</label>
                    <input type="text" class="form-control" id="name" name="name" value="{{ old('name') }}"
                           required>
                </div>

                <div class="form-group mb-2">
                    <label for="gender" class="col-sm-3">Gender</label>
                    <div class="form-check-inline">
                        <label class="form-check-label">
                            <input value="female" type="radio" class="form-check-input" name="gender">Female
                        </label>
                    </div>
                    <div class="form-check-inline">
                        <label class="form-check-label">
                            <input value="male" type="radio" class="form-check-input" name="gender">Male
                        </label>
                    </div>

                    </select>
                </div>

                <div class="form-group mb-2">
                    <label for="email" class="col-sm-6 col-form-label">Email</label>
                    <input type="email" class="form-control" id="email" name="email" value="{{ old('email') }}">
                </div>

                <div class="form-group mb-2">
                    <label for="contact" class="col-sm-6 col-form-label">Phone Number*</label>
                    <input type="text" class="form-control" id="contact" name="phone_number"
                           value="{{ old('phone_number') }}" required>
                </div>

                <div class="form-group mb-2">
                    <label for="location" class="col-sm-6 col-form-label">Watsup Number</label>
                    <input type="text" class="form-control" id="location" name="watsup_number"
                           value="{{ old('watsup_number') }}">
                </div>

                <div class="form-group mb-2">
                    <label for="home_cell" class="col-sm-6 col-form-label">Home Cell</label>
                    <input type="text" class="form-control" id="home_cell" name="home_cell"
                           value="{{ old('home_cell') }}">
                </div>

                <div class="form-group mb-2">
                    <label for="role" class="col-sm-6 col-form-label">Role</label>
                    <input type="text" class="form-control" id="role" name="role"
                           value="{{ old('role') }}">
                </div>


                <div class="form-group mb-2">
                    <label for="department" class="col-sm-6 col-form-label">Department</label>
                    <input type="text" class="form-control" id="department" name="department"
                           value="{{ old('department') }}">
                </div>

                <div class="form-group mb-2">
                    <label for="marital_status" class="col-sm-6 col-form-label">Marital Status</label>

                    <select value="{{ old('marital_status') }}" class="col-sm-12 form-control" name="marital_status" aria-placeholder="Marital Status">
                        <option value="" disabled selected hidden>Choose Status...</option>
                        <option value="Married">Married</option>
                        <option value="Single">Single</option>
                        <option value="Divorced">Divorced</option>
                        <option value="Widow">Widow</option>
                        <option value="Widower">Widower</option>
                    </select>
                </div>

                <div class="form-group mb-2">
                    <label for="no_of_children" class="col-sm-6 col-form-label">Number of Children</label>
                    <input type="number" class="form-control" id="no_of_children" name="no_of_children"
                           value="{{ old('marital_status') }}">
                </div>
                <button type="submit" class="btn btn-primary submit-btn pill px-4 py-2">Submit</button>

            </form>
            <hr>

        </div>
        @endsection


