{{-- @extends('layouts.app')
 --}}
 @extends('generic.mysidebar')
 @section('content')
 <div class="card-header py-3">
     <h6 class="m-0 font-weight-bold text-primary">Edit</h6>
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
        <form action="{{ route('edit',$user->id.'/edit')}}" method="POST">
            @csrf
            @method('PUT')
                <div class="form-group mb-2">
                    <label for="name" class="col-sm-6 col-form-label">Name</label>
                    <input type="text" class="form-control" id="name" name="name" value="{{$user->name ?? ''}}">
                </div>

                <div class="form-group mb-2">
                    <label for="gender" class="col-sm-3 col-form-label">Gender</label>
                    <select name="gender">
                        <option value="{{$user->gender ?? ''}}">{{$user->gender ?? ''}}</option>
                    <option selected value="Male">Male</option>
                    <option value="Female">Female</option>

                    </select>
                </div>

                <div class="form-group mb-2">
                    <label for="email" class="col-sm-6 col-form-label">Email</label>
                    <input type="email" class="form-control" id="email" name="email" value="{{$user->email ?? ''}}">
                </div>

                <div class="form-group mb-2">
                    <label for="contact" class="col-sm-6 col-form-label">Phone Number</label>
                    <input type="text" class="form-control" id="contact" name="phone_number" value="{{$user->phone_number ?? ''}}">
                </div>

                <div class="form-group mb-2">
                    <label for="location" class="col-sm-6 col-form-label">Watsup Number</label>
                    <input type="text" class="form-control" id="location" name="watsup_number" value="{{$user->watsup_number ?? ''}}">
                </div>

                <div class="form-group mb-2">
                    <label for="home_cell" class="col-sm-6 col-form-label">Home Cell</label>
                    <input type="text" class="form-control" id="home_cell" name="home_cell" value="{{$user->home_cell ?? ''}}">
                </div>

                <div class="form-group mb-2">
                    <label for="marital_status" class="col-sm-3 col-form-label">Marital Status</label>
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
                    <label for="no_of_children" class="col-sm-6 col-form-label">Number of Children</label>
                    <input type="number" class="form-control" id="no_of_children" name="no_of_children" value="{{$user->no_of_children ?? ''}}">
                </div>
                <button type="submit" class="btn btn-primary submit-btn pill px-4 py-2">Submit</button>

        </form>
     <hr>

 </div>
 @endsection


