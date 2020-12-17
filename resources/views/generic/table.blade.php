<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <meta name="csrf-token" content="{{ csrf_token() }}"/>


    <title>Congregation</title>

    <!-- Custom fonts for this template -->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">

    <!-- Custom styles for this page -->
    <link href="vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">
    <style>
        .links .linked {
            font-size: 2.9em;
            border: 30px;
            padding: 10px;
            margin: 10px;
            color: #4A6EDB
        }
    </style>

</head>

<body id="page-top">

<!-- Page Wrapper -->
<div id="wrapper">

    <!-- Sidebar -->
    <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

        <!-- Sidebar - Brand -->
        <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
            <div class="sidebar-brand-icon rotate-n-0">
                <i class="fas fa-church"></i>
            </div>
            <div class="sidebar-brand-text mx-3">Redeemed Church</div>
        </a>

        <!-- Divider -->
        <hr class="sidebar-divider my-0">

        <!-- Nav Item - Dashboard -->
        <li class="nav-item">
            <a class="nav-link" href="{{ route('home') }}">
                <i class="fas fa-fw fa-tachometer-alt"></i>
                <span>Dashboard</span></a>
        </li>
        {{--
        <li class="nav-item">
            <a class="nav-link" href="{{ route('home') }}">
                <i class="fas fa-fw fa-envelope"></i>
                <span>Messages</span></a>
        </li>
        --}}
        <li class="nav-item">
            <a class="nav-link" href="#">
                <i class="fas fa-fw fa-address-book"></i>
                <span>Phonebook</span></a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="#">
                <i class="fas fa-fw fa-money-bill-alt"></i>
                <span>Payments</span></a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="#">
                <i class="fas fa-fw fa-list"></i>
                <span>Summary Reports</span></a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="#">
                <i class="fas fa-fw fa-user"></i>
                <span>Account</span></a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="{{ route('logout') }}" onclick="event.preventDefault();
                document.getElementById('logout-form').submit();">
                <i class="fas fa-fw fa-sign-out-alt"></i>
                <span>{{ __('Logout') }}</span></a>
        </li>
        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
            @csrf
        </form>

        <!-- Sidebar Toggler (Sidebar) -->
        <div class="text-center d-none d-md-inline">
            <button class="rounded-circle border-0" id="sidebarToggle"></button>
        </div>

    </ul>
    <!-- End of Sidebar -->

    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">

        <!-- Main Content -->
        <div id="content">

            <!-- Topbar -->
            <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

                <!-- Sidebar Toggle (Topbar) -->
                <form class="form-inline">
                    <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                        <i class="fa fa-bars"></i>
                    </button>
                </form>

                <!-- Topbar Navbar -->
                <ul class="navbar-nav ml-auto">

                    <div class="topbar-divider d-none d-sm-block"></div>

                    <!-- Nav Item - User Information -->
                    <li class="nav-item dropdown">
                        <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button"
                           data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                            {{ Auth::user()->name }}
                        </a>

                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="{{ route('logout') }}"
                               onclick="event.preventDefault();
                                                 document.getElementById('logout-form').submit();">
                                {{ __('Logout') }}
                            </a>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                @csrf
                            </form>
                        </div>
                    </li>

                </ul>

            </nav>
            <!-- End of Topbar -->

            <!-- Begin Page Content -->
            <div class="container-fluid">

                <!-- Page Heading -->
                <h1 class="h3 mb-2 text-gray-800">Congregation</h1>

                @error('error')
                <span class=”invalid-feedback” role=”alert”>
                <strong>{{ $message }}</strong>
                </span>
                @enderror
                <div class="col-sm-12">

                    @if(session()->get('success'))
                    <div class="alert alert-success alert-dismissible fade show">
                        {{ session()->get('success') }}
                    </div>
                    @endif
                </div>

                <!-- DataTales Example -->
                <div class="card shadow mb-4">

                    <div class="card-body">
                        <form class="form-inline" method="POST" action="{{ route('filters') }}">
                            @csrf
                            <div class="form-group mb-2">
                                <label for="filter" class="col-sm-2 col-form-label mx-3">Show</label>
                                <select class="form-control" name="paginate">
                                    <option value="10">10</option>
                                    <option value="50">50</option>
                                    <option value="200">200</option>
                                    <option value="1000">1000</option>
                                    <option value="5000">5000</option>
                                    <option value="10000">10000</option>
                                </select>
                            </div>
                            <div class="form-group mb-2">
                                <label for="filter" class="col-sm-2 col-form-label mx-3">Search</label>
                                <input type="text" class="form-control" id="filter" name="filter"
                                       placeholder="name,email,contact..." value="{{$filter ?? ''}}">
                            </div>
                            <button type="submit" class="btn btn-primary mb-2">Search</button>
                        </form>
                        {{-- end filter --}}

                        <div class="table-responsive">
                            <div class="links">
                                <a href="{{ route('addUser') }}"><i class="fa fa-user-plus linked"></i><a>
                                        <i data-toggle="modal" data-target="#uploadContacts"
                                           class="fa fa-upload linked"></i>
                                        <i data-toggle="modal" data-target="#sendMessage"
                                           class="fa fa-envelope-square linked"></i>
                            </div>
                            <form method="POST" action="{{ route('send') }}" enctype="multipart/form-data">
                                @csrf

                                <table class="table table-bordered">
                                    <thead>
                                    <tr>
                                        <th><input type="checkbox" class="selectAll" onclick()="selectAll()"></th>
                                        <th>Name</th>
                                        <th>Email</th>
                                        <th>Phone Number</th>
                                        <th>Watsup Number</th>
                                        <th>Home Cell</th>
                                        <th>Role</th>
                                        <th>Department</th>
                                        <th>Action</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @if ($congregation->count() == 0)
                                    <tr>
                                        <td colspan="7">No Results available.</td>
                                    </tr>
                                    @endif
                                    @foreach($congregation as $user)
                                    <tr id="tr_{{$user->phone_number}}">
                                        <td><input data-id="{{$user->phone_number}}" value="{{$user->id}}"
                                                   class="sub_chk" type="checkbox" name="selected_values[]">
                                        <td>{{$user->name}}</td>
                                        <td>{{$user->email}}</td>
                                        <td>{{$user->phone_number}}</td>
                                        <td>{{$user->watsup_number}}</td>
                                        <td>{{$user->home_cell}}</td>
                                        <td>{{$user->role}}</td>
                                        <td>{{$user->department}}</td>
                                        <td>
                                            <a href="{{ route('edit',$user->id) }}" class="edit btn btn-success btn-sm">Edit</a>
<!--                                            <a href="#" data-toggle="modal" data-id="{{$user->id}}"-->
<!--                                               data-url="{!! URL::route('delete',$user->id) !!}"-->
<!--                                               data-target="#deleteModal"-->
<!--                                               class="delete_user btn btn-danger btn-sm">Delete</a>-->
                                        </td>
                                    </tr>

                                    @endforeach

                                    </tbody>
                                </table>
                                {{--
                                <button type="submit" name="submit">Here</button>
                                <a href="{{ route('read') }}" class="btn btn-success btn-sm">Read File</a> --}}
                            </form>
                            {!! $congregation->appends(Request::except('page'))->render() !!}
                            <p>
                                Displaying {{$congregation->count()}} of {{ $congregation->total() }} user(s).
                            </p>
                        </div>

                    </div>
                </div>

            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- End of Main Content -->

        <!-- Footer -->
        <footer class="sticky-footer bg-white">
            <div class="container my-auto">
                <div class="copyright text-center my-auto">
                    <span>Copyright &copy; Redeemed Church Uganda @php echo date("Y");
                    @endphp</span>
                </div>
            </div>
        </footer>
        <!-- End of Footer -->

    </div>
    <!-- End of Content Wrapper -->

</div>
<!-- End of Page Wrapper -->

<!-- Scroll to Top Button-->
<a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
</a>

<!-- Logout Modal-->
<div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
     aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
            <div class="modal-footer">
                <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                <a class="btn btn-primary" href="login.html">Logout</a>
            </div>
        </div>
    </div>
</div>

<!-- Delete Warning Modal -->
<form action="" method="POST" class="remove-record-model">
    <div id="deleteModal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="deleteLabel"
         aria-hidden="true" style="display: none;">
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
                    <button type="button" class="btn btn-default waves-effect remove-data-from-delete-form"
                            data-dismiss="modal">Close
                    </button>
                    <button type="submit" class="btn btn-danger waves-effect waves-light">Delete</button>
                </div>
            </div>
        </div>
    </div>
</form>
<!-- End Delete Modal -->

<!-- Send Message Modal-->
<div class="modal fade" id="sendMessage" tabindex="-1" role="dialog" aria-labelledby="uploadContacts"
     aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Send Message</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">

                <!-- Image loader -->
                <div id='loader' style='display: none;'>
                    <img src='{{ asset(' images/reload.gif') }}' width='32px' height='32px'>
                </div>
                <!-- END Image loader -->

                <div class="messageType"></div>
                <form id="message_push" action="javascript:void(0)" method="POST" enctype="multipart/form-data"
                      class="p-5 bg-white">
                    @csrf

                    <div class="row form-group">
                        <div class="col-md-12">
                            <label class="font-weight-bold" for="message">Message</label>
                            <textarea name="message" id="message" cols="30" rows="5" class="form-control"
                                      placeholder="Add Message to send"></textarea>
                            <p id="message_character"></p>
                        </div>
                    </div>

                    <div class="row form-group">
                        <div class="col-md-12">
                            <input type="submit" value="Send Message" class="btn btn-primary pill px-4 py-2">
                        </div>
                    </div>


                </form>

            </div>
            <div class="modal-footer">
                <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
            </div>
        </div>
    </div>
</div>

<!-- Upload contacts Modal-->
<div class="modal fade" id="uploadContacts" tabindex="-1" role="dialog" aria-labelledby="uploadContacts"
     aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="uploadModalLabel">Upload Contacts</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                <!-- Image loader -->
                <div id='loader_upload' style='display: none;'>
                    <img src='{{ asset(' images/reload.gif') }}' width='32px' height='32px'>
                </div>
                <!-- END Image loader -->
                <div class="uploadMessage"></div>
                <form method="POST" enctype="multipart/form-data" class="p-5 bg-white file_upload"
                      action="javascript:void(0)">

                    @csrf
                    <input type="file" name="file" class="form-control">
                    <span class="text-danger">{{ $errors->first('file') }}</span>
                    <div class="col-md-12">
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                </form>

            </div>
            <div class="modal-footer">
                <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
            </div>
        </div>
    </div>
</div>


<!-- Bootstrap core JavaScript-->
<script src="vendor/jquery/jquery.min.js"></script>
<script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

<!-- Core plugin JavaScript-->
<script src="vendor/jquery-easing/jquery.easing.min.js"></script>

<!-- Custom scripts for all pages-->
<script src="js/sb-admin-2.min.js"></script>

<!-- Page level plugins -->
<script src="vendor/datatables/jquery.dataTables.min.js"></script>
<script src="vendor/datatables/dataTables.bootstrap4.min.js"></script>

<!-- Page level custom scripts -->
<script src="js/demo/datatables-demo.js"></script>
<script>
    document.addEventListener('DOMContentLoaded', function () {
        window.setTimeout(function() {
            $(".alert").fadeTo(1000, 0).slideUp(1000, function(){
                $(this).remove();
            });
        }, 5000);

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $('.file_upload').submit(function () {
            console.log('upload_yeah');
            var formData = new FormData(this);
            // var file = $('.file_upload').val();
            $.ajax({
                type: 'POST',
                url: "{{ url('read') }}",
                data: formData,
                cache: false,
                contentType: false,
                processData: false,
                beforeSend: function () {
                    // Show image container
                    $("#loader_upload").show();
                },
                success: function (response) {
                    if (response == 0) {
                        $('.uploadMessage').css("margin-top", "10px");
                        $('.uploadMessage').addClass("alert alert-success");
                        $('.uploadMessage').text("Data has been uploaded successfully");
                        $('.uploadMessage').show();
                    } else {
                        $('.uploadMessage').css("margin-top", "10px");
                        $('.uploadMessage').addClass("alert alert-danger");
                        $('.uploadMessage').text("Data has failed to upload. Please Try again later");
                        $('.uploadMessage').show();
                    }
                    console.log(response);

                },
                complete: function (data) {
                    // Hide image container
                    $("#loader_upload").hide();
                    setTimeout(() => {
                        $('#sendMessage').modal('hide');
                        window.location.href = location.href;
                    }, 5000);
                },
                err: function (repsonse) {
                    console.log(response);
                }

            })
            ;
        });

        $('#message').keyup(function () {
            var words = $.trim($('#message').val()).split("");
            var message = words.length + " characters, " + ((Math.floor(words.length / 160)) + 1) + " message(s)";
            $('#message_character').html(message);
        });

        $('#message_push').submit(function () {
            var users = { !! json_encode($congregation->toArray()) !!
        }
            contacts = users.data;
            message = $('#message').val();
            $.ajax({
                type: 'POST',
                url: "{{ url('send_message') }}",
                data: {message, contacts},
                beforeSend: function () {
                    // Show image container
                    $("#loader").show();
                },
                success: function (response) {
                    if (response == 0) {
                        $('.messageType').css("margin-top", "10px");
                        $('.messageType').addClass("alert alert-success");
                        $('.messageType').text("Message(s) have been sent successfully");
                        $('.messageType').show();
                    } else {
                        $('.messageType').css("margin-top", "10px");
                        $('.messageType').addClass("alert alert-warning");
                        $('.messageType').text("Message(s) have not been sent successfully. Try again later");
                        $('.messageType').show();
                    }
                },
                complete: function (data) {
                    // Hide image container
                    $("#loader").hide();
                    setTimeout(() => {
                        $('#sendMessage').modal('hide');
                    }, 3000);
                },
                err: function () {

                }
            });
        });

        $(".selectAll").click(function (e) {
            if ($(this).is(':checked', true)) {
                $(".sub_chk").prop('checked', true);
            } else {
                $(".sub_chk").prop('checked', false);
            }
        });

        $('.delete_user').click(function () {
            console.log("deleting");
            var id = $(this).attr('data-id');
            var url = $(this).attr('data-url');
            var token = CSRF_TOKEN;
            $(".delete").attr("action", url);
            $('body').find('.delete').append('<input name="_token" type="hidden" value="' + token + '">');
            $('body').find('.delete').append('<input name="_method" type="hidden" value="DELETE">');
            $('body').find('.delete').append('<input name="id" type="text" value="' + id + '">');

        });
    });
</script>

</body>

</html>
