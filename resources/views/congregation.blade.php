@extends('layouts.app')

@section('content')
<div class="container">
    <div class="card bg-light mt-3">
        <div class="card-header">
            Import you congregation
        </div>
        <div class="card-body">
            <form action="{{ route('importCongregation') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <input type="file" name="file" class="form-control">
                <br>
                <button class="btn btn-success">Import User Data</button>
                <a class="btn btn-warning" href="{{ route('exportCongregation') }}">Export User Data</a>
            </form>
        </div>
    </div>
</div>
   
@endsection