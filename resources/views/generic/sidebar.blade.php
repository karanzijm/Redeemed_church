@extends('generic.mysidebar')
@section('content')
<div class="card-header py-3">
    <h6 class="m-0 font-weight-bold text-primary">Upload</h6>
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
    <div class="chart-area">
        <form action="{{ route('read') }}" method="POST" enctype="multipart/form-data" class="p-5 bg-white">
            @csrf
              <input type="file" name="file" class="form-control">
              <br>
          {{-- <div class="row form-group">
            <div class="col-md-12">
              <label class="font-weight-bold" for="message">Message</label>
              <textarea name="message" id="message" cols="30" rows="5" class="form-control" placeholder="Add Message to send"></textarea>
              <p id="message_character"></p>
            </div>
          </div> --}}
          <div class="row form-group">
            <div class="col-md-12">
              <input type="submit" value="Upload" class="btn btn-primary pill px-4 py-2">
            </div>
          </div>
        </form>
    </div>
    <hr>

</div>
@endsection
