{{-- <link rel="stylesheet" href="{{ asset('css/app.css')  }}">
<script src="{{ asset('js/app.js') }}"></script> --}}
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">

@extends('layouts.app')

@section('content')

@error('error')
<span class=”invalid-feedback” role=”alert”>
<strong>{{ $message }}</strong>
</span>
@enderror
<div class="col-sm-12">

  @if(session()->get('success'))
    <div class="alert alert-success">
      {{ session()->get('success') }}  
    </div>
  @endif
</div>
{{-- filter --}}

<div class="container">
<form class="form-inline" method="POST" action="{{ route('filters') }}">
  @csrf
  <div class="form-group mb-2">
    <label for="filter" class="col-sm-2 col-form-label">Show</label>
    <select class="form-control" name="paginate">
      <option value="10">10</option>
      <option value="50">50</option>
      <option value="200">200</option>
      <option value="1000">1000</option>
    </select>
  </div>
    <div class="form-group mb-2">
      <label for="filter" class="col-sm-2 col-form-label">Search</label>
      <input type="text" class="form-control" id="filter" name="filter" placeholder="name,email,contact..." value="{{$filter ?? ''}}">
    </div>
    <button type="submit" class="btn btn-primary mb-2">Search</button>
  </form>
{{-- end filter --}}

  <div class="table-responsive">
      <form method="POST" action="{{ route('send') }}" enctype="multipart/form-data">
      @csrf
      
        <table class="table">
          <thead>
            <tr>
              <th><input type="checkbox" class="selectAll" onclick()="selectAll()"></th>
              <th>Name</th>
              <th>Email</th>
              <th>Contact</th>
              <th>Location</th>
              <th>Home Cell</th>
              <th>Marital Status</th>
              <th>Number of Children</th>
              <th>Action</th>
            </tr>
          </thead>
          <tbody>
          @if ($users->count() == 0)
        <tr>
            <td colspan="7">No Results available.</td>
        </tr>
        @endif
            @foreach($users as $user)
              <tr id="tr_{{$user->contact}}">
                <td><input data-id="{{$user->contact}}" value="{{$user->id}}" class="sub_chk" type="checkbox" name="selected_values[]">
                <td>{{$user->name}}</td>
                <td>{{$user->email}}</td> 
                <td>{{$user->contact}}</td> 
                <td>{{$user->location}}</td> 
                <td>{{$user->home_cell}}</td> 
                <td>{{$user->marital_status?$user->marital_status: 'Not Set'}}</td> 
                <td>{{$user->no_of_children?$user->no_of_children: 'Not Set'}}</td> 
                <td>
                    <a href="{{ route('edit',$user->id) }}" class="edit btn btn-success btn-sm">Edit</a>
                    <a href="#" data-toggle="modal" data-id="{{$user->id}}" data-url="{!! URL::route('delete',$user->id) !!}" data-target="#deleteModal" class="delete btn btn-danger btn-sm">Delete</a>
                  </td> 
              </tr>

            @endforeach
            
          </tbody>
        </table>
        <button type="submit" name="submit">Here</button>
      <a href="{{ route('read') }}" class="btn btn-success btn-sm">Read File</a>
            </form>
            {!! $users->appends(Request::except('page'))->render() !!}
            <p>
              Displaying {{$users->count()}} of {{ $users->total() }} user(s).
          </p>
    </div>
</div>

              <!-- Delete Warning Modal -->
<form action="" method="POST" class="remove-record-model">
                <div id="deleteModal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="deleteLabel" aria-hidden="true" style="display: none;">
                    <div class="modal-dialog" style="width:55%;">
                        <div class="modal-content">
                            <div class="modal-header">
                              <h4 class="modal-title" id="deleteLabel">Confirm Delete Record</h4>

                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                            </div>
                            <div class="modal-body">
                                <h4>Are You Sure You want to Delete This Record?</h4>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-default waves-effect remove-data-from-delete-form" data-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-danger waves-effect waves-light">Delete</button>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
      <!-- End Delete Modal --> 
<?php
if(isset($_GET["submit"])){
    var_dump($_GET['selected_values']);
    $val = $_GET['selected_values'];
    echo $val[0];
}
?>
@endsection
<script>
$(document).ready(function(){
    $(".selectAll").click(function(e){
        if($(this).is(':checked', true)){
            $(".sub_chk").prop('checked',true);
        }else{
          $(".sub_chk").prop('checked',false);
        }
  });

  $('.delete').click(function (){
    var id = $(this).attr('data-id');
		var url = $(this).attr('data-url');
		var token = CSRF_TOKEN;
    $(".delete").attr("action",url);
		$('body').find('.delete').append('<input name="_token" type="hidden" value="'+ token +'">');
		$('body').find('.delete').append('<input name="_method" type="hidden" value="DELETE">');
		$('body').find('.delete').append('<input name="id" type="text" value="'+ id +'">');
	
  });
})

</script>
