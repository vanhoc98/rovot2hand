@extends('LayoutAdmin')
@section('content')
    <div class="main-content container-fluid">
        @include('Admin.Sample.includeTitle')
        <section class="section">
            <div class="card">
                <button class="btn icon btn-sm btn-outline-warning addsample"><i class="fas fa-plus-circle"></i></button>
                <div class="card-body">
                    <table class='table table-striped' id="Loadsample">
                        <thead>
                            <tr>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Role</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>

                        </tbody>
                    </table>
                </div>
            </div>

        </section>
    </div>
    <!--Extra Large Modal Sample -->
    <div class="modal fade text-left w-100" id="ModalSample" tabindex="-1" role="dialog" aria-labelledby="myModalLabel16"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable modal-xl" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title"></h4>
                    <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                        <i data-feather="x"></i>
                    </button>
                </div>
                <form method="post" id="submitSample">
                    <div class="modal-body">
                        <div class="form-body">
                            <div class="row">
                                <div class="col-12">
                                    <div class="form-group">
                                        <label>Name</label>
                                        <input type="text" class="form-control" required name="txtname" id="txtname"
                                            placeholder="Name">
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-group">
                                        <label>Email</label>
                                        <input type="email" class="form-control" required name="txtemail" id="txtemail"
                                            placeholder="Email">
                                        <div class="invalid-feedback error_email">
                                            <i class="bx bx-radio-circle"></i>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-group">
                                        <label>Role</label>
                                        <select class="form-control" id="txtrole" name="txtrole" required>
                                            <option value="">Choose</option>
                                            @foreach ($roles as $role)
                                                <option value="{{ $role->role_id }}">{{ $role->role_name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-12 showPass display">
                                    <div class="form-group">
                                        <label>Password</label>
                                        <input type="password" class="form-control" name="txtpass" id="txtpass"
                                            placeholder="Password">
                                        <div class="invalid-feedback error_pass">
                                            <i class="bx bx-radio-circle"></i>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12 showRePass display">
                                    <div class="form-group">
                                        <label>Re Password</label>
                                        <input type="password" class="form-control" name="txtrepass" id="txtrepass"
                                            placeholder="Re Password">
                                        <div class="invalid-feedback error_repass">
                                            <i class="bx bx-radio-circle"></i>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12 checkPass">
                                    <div class='form-check'>
                                        <div class="checkbox">
                                            <input type="checkbox" id="changepass" class='form-check-input'>
                                            <label for="checkbox3">Edit Password</label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-light-secondary" data-bs-dismiss="modal">
                            <i class="bx bx-x d-block d-sm-none"></i>
                            <span class="d-none d-sm-block">Đóng</span>
                        </button>
                        <input type="hidden" id="actionhidden" value="">
                        <input type="hidden" id="idhidden" value="">
                        <button type="submit" class="btn btn-warning ml-1 submit">
                            <i class="bx bx-check d-block d-sm-none"></i>
                            <span class="d-none d-sm-block submit_text">Chấp nhận</span>
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!--Danger theme Modal -->
    <div class="modal fade text-left" id="ModalDel" tabindex="-1" role="dialog" aria-labelledby="myModalLabel120"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable" role="document">
            <form method="post" id="submitDelete">
                <input type="hidden" id="idhidden_del">
                <div class="modal-content">
                    <div class="modal-header bg-danger" id="colorHeader">
                        <h5 class="modal-title white" id="myModalLabel120">
                            Danger Modal</h5>
                        <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                            <i data-feather="x"></i>
                        </button>
                    </div>
                    <div class="modal-body">
                        Are You Sure Want Delete <span id="txtbodoydel"></span>?
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-light-secondary" data-bs-dismiss="modal">
                            <i class="bx bx-x d-block d-sm-none"></i>
                            <span class="d-none d-sm-block">Đóng</span>
                        </button>
                        <button type="submit" class="btn btn-danger ml-1">
                            <i class="bx bx-check d-block d-sm-none"></i>
                            <span class="d-none d-sm-block">Chấp nhận</span>
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
@section('css')
    <style>
        #txtbodoydel {
            font-weight: bold;
        }

    </style>
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.12/css/jquery.dataTables.min.css" />
@endsection
@section('js')
    <script src="https://cdn.datatables.net/1.10.12/js/jquery.dataTables.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#Loadsample').dataTable({
                destroy: true,
                order: [],
                ajax: {
                    url: "{{ route('account.index') }}",
                },
                columns: [{
                        data: 'name'
                    },
                    {
                        data: 'email'
                    },
                    {
                        data: null,
                        render: function(data, type, full, meta) {
                            if (data.level == 2) {
                                $output =
                                    '<a class="badge bg-danger btn-sm click_status" data-id="' +
                                    data.id + '">' + data.role_name + '</a>';
                            } else {
                                $output =
                                    '<a class="badge bg-success btn-sm click_status" data-id="' +
                                    data.id + '">' + data.role_name + '</a>';
                            }
                            return $output;
                        },
                        orderable: false
                    },
                    {
                        data: 'action'
                    }
                ]
            });
            // Show Add
            $('.addsample').click(function() {
                $('#submitSample')[0].reset();
                $('#ModalSample').modal('show');
                $('#actionhidden').val('Add');
                $('.modal-title').text('Add');
                $('#txtpass').attr('required', true);

                $('.checkPass').addClass('display');
                $('.showPass').removeClass('display');
            });
            // Show Edit & Del
            $(document).on('click', '.actionsample', function() {
                var id = $(this).data('id');
                var action = $(this).data('action');
                if (action == 'Del') {
                    $('#ModalDel').modal('show');
                    $('.modal-footer').removeClass('display');
                    $('#colorHeader').addClass('bg-danger');
                } else {
                    $('#ModalSample').modal('show');
                    $('#txtpass').attr('required', false);
                    $('.checkPass').removeClass('display');
                    $('.showPass').addClass('display');
                }
                $.ajax({
                    type: 'get',
                    url: 'account/' + id,
                    data: {
                        action: action
                    },
                    success: function(res) {
                        if (res.status == 200) {
                            if (res.action == 'Del') {
                                $('#idhidden_del').val(id);
                                $('#myModalLabel120').text(' Delete ');
                                $('#txtbodoydel').text(' [ ' + res.data.name + ' ]');
                            } else {
                                $('#idhidden').val(id);
                                $('#actionhidden').val('Edit');
                                $('.modal-title').text(' Edit [ ' + res.data.name + ' ] ');
                                $('#txtname').val(res.data.name);
                                $('#txtemail').val(res.data.email);
                                $('#txtrole').val(res.data.level);
                            }
                        } else {
                            alert(res.message);
                        }
                    }
                });
            });
            // Show Check
            $('#changepass').click(function() {
                var checked = $(this).is(':checked');

                if (checked == true) {
                    $('.showPass').removeClass('display');
                    $('.showRePass').removeClass('display');
                } else {
                    $('.showPass').addClass('display');
                    $('.showRePass').addClass('display');
                }
            });
            // Submit
            $(document).on('submit', '#submitSample', function(e) {
                e.preventDefault();
                var action = $('#actionhidden').val();

                var url = '';
                var type = '';
                if (action == 'Edit') {
                    var id = $('#idhidden').val();
                    url = 'account/' + id;
                    type = 'put';
                } else {
                    url = '{{ route('account.store') }}';
                    type = 'post';
                }

                $.ajax({
                    type: type,
                    url: url,
                    data: {
                        name: $('#txtname').val(),
                        password: $('#txtpass').val(),
                        repassword: $('#txtrepass').val(),
                        email: $('#txtemail').val(),
                        level: $('#txtrole').val()
                    },
                    beforeSend: function() {
                        $('.submit').attr('disabled', 'disabled');
                        $('.submit_text').text('Submitting...');
                    },
                    success: function(res) {
                        if (res.status == 200) {
                            $('#submitSample')[0].reset();
                            $('.form-control').removeClass('is-invalid');
                            $('.invalid-feedback').text('');
                            $('#Loadsample').DataTable().ajax.reload();
                            setTimeout(function() {
                                $('.submit_text').text('Accept');
                                $('.submit').attr('disabled', false);
                                $('#ModalSample').modal('hide');
                            }, 2000);
                        } else {
                            $('.submit').attr('disabled', false);
                            $('.submit_text').text('Accept');
                            if (res.errors.repassword) {
                                $('#txtrepass').addClass('is-invalid');
                                $('.error_repass').text(res.errors.repassword);
                            }
                            if (res.errors.email) {
                                $('#txtemail').addClass('is-invalid');
                                $('.error_email').text(res.errors.email);
                            }

                        }
                    }
                });
            });
            //Delete
            $(document).on('submit', '#submitDelete', function(e) {
                e.preventDefault();
                var id = $('#idhidden_del').val();

                $.ajax({
                    type: 'delete',
                    url: 'account/' + id,
                    success: function(res) {
                        if (res.status == 200) {
                            $('#Loadsample').DataTable().ajax.reload();
                            $('.modal-body').text(res.message);
                            $('#colorHeader').removeClass('bg-danger');
                            $('#colorHeader').addClass('bg-success');
                            $('.modal-footer').addClass('display');
                            setTimeout(function() {
                                $('#ModalDel').modal('hide');
                            }, 2000);
                        } else {
                            alert(res.message);
                        }

                    }
                });
            });
        });
    </script>
@endsection
