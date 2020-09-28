<!DOCTYPE html>
<html>
<head>
    <title>Congregation Import and Export</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.min.css" />
</head>
<body>
    @extends('layouts.app')

    @section('content')  
        <div class="container">
            <div class="card bg-light mt-3">
                <div class="card-header">
                    Import you Users
                </div>
                <div class="card-body">
                    <form action="{{ route('importUser') }}" method="POST" enctype="multipart/form-data">
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
   
</body>
</html>