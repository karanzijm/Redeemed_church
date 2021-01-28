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
    <h6 class="m-0 font-weight-bold text-primary">Add Department</h6>
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
            <form action="{{ route('departments.store') }}" method="POST">
                @csrf
                <div class="form-group mb-2">
                    <label for="name" class="col-sm-6 col-form-label">Name*</label>
                    <input type="text" class="form-control" id="name" name="name" value="{{ old('name') }}"
                           required>
                </div>

                <button type="submit" class="btn btn-primary submit-btn pill px-4 py-2">Submit</button>

            </form>
            <hr>

        </div>
        @endsection


