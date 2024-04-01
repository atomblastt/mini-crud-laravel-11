
<!doctype html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="">
        <meta name="author" content="Thomas R">
        <meta name="generator" content="Hugo 0.84.0">
        <title>Lokatani Test</title>

        <!-- Bootstrap core CSS -->
        <link href="{{ asset('assets/css/bootstrap.min.css') }}" rel="stylesheet">
        <!-- Bootstrap Data Table -->
        <link href="{{ asset('assets/css/dataTables/dataTables.bootstrap5.css') }}">
        <link href="{{ asset('assets/css/dataTables/buttons.dataTables.css') }}">

        <!-- Favicons -->
        <link rel="icon" href="{{ asset('assets/logo/logo.png')}}">
        <meta name="theme-color" content="#7952b3">


        <style>
        .bd-placeholder-img {
            font-size: 1.125rem;
            text-anchor: middle;
            -webkit-user-select: none;
            -moz-user-select: none;
            user-select: none;
        }

        .btn-primary {
            color: #fff !important;
            background-color: #668647 !important;
            border-color: #668647 !important;
        }

        .btn-danger {
            color: #fff !important;
            background-color: #992934eb !important;
            border-color: #992934eb !important;
        }

        .modal-header{
            background-color: #58763e !important;
            color: white !important;
        }

        .btn-sm {
            color: black !important;
        }

        .form-group{
            padding: inherit !important;
        }

        @media (min-width: 768px) {
            .bd-placeholder-img-lg {
            font-size: 3.5rem;
            }
        }
        </style>
    </head>
<body>
    <div class="col-lg-8 mx-auto p-3 py-md-5">
        <header class="d-flex align-items-center pb-3 mb-5 border-bottom">
            <a href="/" class="d-flex align-items-center text-dark text-decoration-none">
                <img src="{{ asset('assets/logo/logo.png')}}" width="auto" height="32" class="me-2" viewBox="0 0 118 94" role="img">
                <span class="fs-4" style="color: #5d7a41;">Lokatani Test</span>
            </a>
        </header>

        <main>
            @if(Session::has('status'))
                @if(Session::get('status') === 'success')
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        {{ Session::get('message') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @elseif(Session::get('status') === 'error')
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        {{ Session::get('message') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif
            @endif
            
            @yield('content')

            {{-- Modal Start Here --}}
            <div class="modal fade" id="userPersonalAddModal" tabindex="-1" aria-labelledby="userPersonalAddModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="userPersonalAddModalLabel">Create User</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <div class="form-group row">
                                <label for="user-personal-name-add" class="col-sm-2 col-form-label">Name</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" id="user-personal-name-add" placeholder="Name">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="user-personal-email-add" class="col-sm-2 col-form-label">Email</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" id="user-personal-email-add" placeholder="example@mail.com">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="user-personal-phone-add" class="col-sm-2 col-form-label">Phone</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" id="user-personal-phone-add" placeholder="+6282286526666">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="user-personal-address-add" class="col-sm-2 col-form-label">Address</label>
                                <div class="col-sm-10">
                                    <textarea class="form-control" id="user-personal-address-add" rows="4" placeholder="Lorem Ipsum"></textarea>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button type="button" class="btn btn-primary" id="confirmAddButton">Submit</button>
                        </div>
                    </div>
                </div>
            </div>

            <div class="modal fade" id="userPersonalViewModal" tabindex="-1" aria-labelledby="userPersonalViewModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="userPersonalViewModalLabel"></h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <input type="hidden" id="user-personal-id-view">
                            <div class="form-group row">
                                <label for="user-personal-name-view" class="col-sm-2 col-form-label">Name</label>
                                <div class="col-sm-10">
                                    <input type="text" readonly class="form-control-plaintext" id="user-personal-name-view">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="user-personal-email-view" class="col-sm-2 col-form-label">Email</label>
                                <div class="col-sm-10">
                                    <input type="text" readonly class="form-control-plaintext" id="user-personal-email-view">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="user-personal-phone-view" class="col-sm-2 col-form-label">Phone</label>
                                <div class="col-sm-10">
                                    <input type="text" readonly class="form-control-plaintext" id="user-personal-phone-view">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="user-personal-address-view" class="col-sm-2 col-form-label">Address</label>
                                <div class="col-sm-10">
                                    <textarea readonly class="form-control-plaintext" id="user-personal-address-view" rows="4"></textarea>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button type="button" class="user-personal-edit btn btn-primary" data-user-id="isi-dari-ajax">Edit</button>
                            <button type="button" class="user-personal-delete btn btn-danger" data-id="isi-dari-ajax" data-name="isi-dari-ajax" data-bs-toggle="modal" data-bs-target="#userPersonalDeleteModal">Delete</button>
                        </div>
                    </div>
                </div>
            </div>

            <div class="modal fade" id="userPersonalEditModal" tabindex="-1" aria-labelledby="userPersonalEditModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="userPersonalEditModalLabel">Update User</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <input type="hidden" id="user-personal-id-edit">
                            <div class="form-group row">
                                <label for="user-personal-name-edit" class="col-sm-2 col-form-label">Name</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" id="user-personal-name-edit" placeholder="Name">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="user-personal-email-edit" class="col-sm-2 col-form-label">Email</label>
                                <div class="col-sm-10">
                                    <input type="text" readonly class="form-control-plaintext" id="user-personal-email-edit">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="user-personal-phone-edit" class="col-sm-2 col-form-label">Phone</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" id="user-personal-phone-edit" placeholder="+6282286526666">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="user-personal-address-edit" class="col-sm-2 col-form-label">Address</label>
                                <div class="col-sm-10">
                                    <textarea class="form-control" id="user-personal-address-edit" rows="4"></textarea>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button type="button" class="btn btn-primary" id="confirmUpdateButton">Submit</button>
                        </div>
                    </div>
                </div>
            </div>

            <div class="modal fade" id="userPersonalDeleteModal" tabindex="-1" aria-labelledby="userPersonalDeleteModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="userPersonalDeleteModalLabel">Delete Data</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button type="button" class="btn btn-danger" id="confirmDeleteButton">Delete</button>
                        </div>
                    </div>
                </div>
            </div>
            {{-- Modal End Here --}}
        </main>

        <footer class="pt-5 my-5 text-muted border-top">
            <span style="color: #5d7a41;"> Created by Thomas R &middot; &copy; 2024 </span>
        </footer>
    </div>
    <script src="{{ asset('assets/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('assets/js/jquery-3.7.1.js') }}"></script>
    {{-- Data Tables --}}
    <script src="{{ asset('assets/js/dataTables/dataTables.js') }}"></script>
    <script src="{{ asset('assets/js/dataTables/dataTables.bootstrap5.js') }}"></script>
    <script src="{{ asset('assets/js/dataTables/dataTables.buttons.js') }}"></script>
    <script src="{{ asset('assets/js/dataTables/buttons.dataTables.js') }}"></script>
    {{-- Custom JS --}}
    <script>
        /* Data Table */
        new DataTable('#userPersonalTable', {
            layout: {
                topStart: {
                    buttons: [
                        {
                            text: '+ Add New',
                            className: 'btn btn-primary btn-rounded',
                            action: function (e, dt, node, config) {
                                $('#userPersonalAddModal').modal('show');
                            }
                        }
                    ]
                }
            }
        });
        
        /* Trigger button submit in ADD/CREATE new user modal */
        $('#confirmAddButton').click(function() {
            let name = $('#user-personal-name-add').val()
            let email = $('#user-personal-email-add').val()
            let phone = $('#user-personal-phone-add').val()
            let address = $('#user-personal-address-add').val()
            $.ajax({
                url: '{{ route("add-user") }}',
                type: 'POST',
                data: {
                    'name': name,
                    'email': email,
                    'phone': phone,
                    'address': address,
                    '_token': '{{ csrf_token() }}'
                },
                success: function(response) {
                    $('#userPersonalAddModal').modal('hide');
                    location.reload();
                },
                error: function(xhr, status, error) {
                    var errorMessage = xhr.responseText;
                    var parsedError = JSON.parse(errorMessage);
                    var errorMessages = Object.values(parsedError.errors).flat().join(', ');
                    $('#userPersonalAddModal .modal-body').before('<div class="alert alert-danger alert-dismissible fade show" role="alert">' + errorMessages + '<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>');
                }
            });
        });

        /* Trigger modal view data in table */
        $('.user-personal-view').click(function() {
            var userId = $(this).data('user-id');
            var userName = $(this).data('name');
            $.ajax({
                url: '{{ route("show-user", ":id") }}'.replace(':id', userId),
                type: 'GET',
                cache: false,
                success: function(response) {
                    console.log(userId)
                    console.log(userName)
                    
                    $('#user-personal-id-view').val(response.data.id);
                    $('#user-personal-name-view').val(response.data.name);
                    $('#user-personal-email-view').val(response.data.email);
                    $('#user-personal-phone-view').val(response.data.phone ? response.data.phone : 'no phone number');
                    $('#user-personal-address-view').val(response.data.address ? response.data.address : 'no address');
                    $('#userPersonalViewModalLabel').html('Detail User '+response.data.name);

                    $('.user-personal-edit').attr('data-user-id', userId);
                    $('.user-personal-delete').attr('data-id', userId);
                    $('.user-personal-delete').attr('data-name', userName);

                    $('#userPersonalViewModal').modal('show');
                },
                error: function(xhr, status, error) {
                    console.error(xhr.responseText);
                }
            });
        });

        /* Trigger modal edit data in table */
        $('.user-personal-edit').click(function() {
            $('#userPersonalViewModal').modal('hide');
            var userId = $(this).data('user-id');
            $.ajax({
                url: '{{ route("show-user", ":id") }}'.replace(':id', userId),
                type: 'GET',
                cache: false,
                success: function(response) {
                    $('#user-personal-id-edit').val(response.data.id);
                    $('#user-personal-name-edit').val(response.data.name);
                    $('#user-personal-email-edit').val(response.data.email);
                    $('#user-personal-phone-edit').val(response.data.phone);
                    $('#user-personal-address-edit').val(response.data.address);

                    $('#userPersonalEditModal').modal('show');
                },
                error: function(xhr, status, error) {
                    console.error(xhr.responseText);
                }
            });
        });
        
        /* Trigger button submit in modal UPDATE user */
        $('#confirmUpdateButton').click(function() {
            let userId = $('#user-personal-id-edit').val();
            let name = $('#user-personal-name-edit').val()
            let email = $('#user-personal-email-edit').val()
            let phone = $('#user-personal-phone-edit').val()
            let address = $('#user-personal-address-edit').val()
            $.ajax({
                url: '{{ route("update-user", ":id") }}'.replace(':id', userId),
                type: 'PUT',
                data: {
                    'name': name,
                    'email': email,
                    'phone': phone,
                    'address': address,
                    '_token': '{{ csrf_token() }}'
                },
                success: function(response) {
                    $('#userPersonalEditModal').modal('hide');
                    location.reload();
                },
                error: function(xhr, status, error) {
                    var errorMessage = xhr.responseText;
                    var parsedError = JSON.parse(errorMessage);
                    var errorMessages = Object.values(parsedError.errors).flat().join(', ');
                    $('#userPersonalEditModal .modal-body').before('<div class="alert alert-danger alert-dismissible fade show" role="alert">' + errorMessages + '<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>');
                }
            });

        });

        /* Trigger modal delete data in table */
        $('.user-personal-delete').click(function() {
            $('#userPersonalViewModal').modal('hide');
            var userId = $(this).data('id');
            var userName = $(this).data('name');
            $('#userPersonalDeleteModal .modal-body').html('<p>Are you sure you want to delete the user by name: <br> <span style="color: #992934eb; font-weight:bold;">' + userName + '</span></p>');
            $('#userPersonalDeleteModal').data('user-id', userId);
        });
        
        /* Trigger button submit in modal DELETE user */
        $('#confirmDeleteButton').click(function() {
            var userId = $('#userPersonalDeleteModal').data('user-id');
            $.ajax({
                url: '{{ route("delete-user", ":id") }}'.replace(':id', userId),
                type: 'POST',
                data: {
                    _token: '{{ csrf_token() }}'
                },
                success: function(response) {
                    $('#userPersonalDeleteModal').modal('hide');
                    location.reload();
                },
                error: function(xhr, status, error) {
                    console.error(xhr.responseText);
                }
            });
        });
    </script>
</body>
</html>
