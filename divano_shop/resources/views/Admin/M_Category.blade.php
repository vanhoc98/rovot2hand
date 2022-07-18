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
                                <th>Hình ảnh</th>
                                <th>Tên</th>
                                <th>Trạng thái</th>
                                <th>Hoạt động</th>
                            </tr>
                        </thead>
                        <tbody id="sorting_orderby">

                        </tbody>
                    </table>
                </div>
            </div>

        </section>
    </div>
    <!--Extra Large Modal Sample -->
    <div class="modal fade" id="ModalSample" tabindex="-1" role="dialog" aria-labelledby="myModalLabel16"
        aria-hidden="true">
        <div class="modal-dialog modal-xl" role="document">
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
                                <div class="col-md-6 col-12">
                                    <div class="form-group">
                                        <label for="first-name-column">Name</label>
                                        <input type="text" id="cate_name" name="cate_name" class="form-control"
                                            placeholder="Name" name="fname-column" required>
                                    </div>
                                </div>
                                <div class="col-md-6 col-12">
                                    <div class="form-group">
                                        <label for="last-name-column">Slug</label>
                                        <input type="text" id="cate_slug" name="cate_slug" class="form-control"
                                            placeholder="Slug Name" name="lname-column" required>
                                    </div>
                                </div>
                                <div class="col-md-12 col-12">
                                    <div class="form-group">
                                        <label for="country-floating">Status</label>
                                        <select class="form-control" id="cate_status" name="cate_status" required>
                                            <option value="1">Show</option>
                                            <option value="2">Hide</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-12 col-12">
                                    <div class="form-group">
                                        <label for="country-floating">Ảnh</label>
                                        <input type="file" class="form-control" id="category_image" name="category_image"
                                            multiple required data-max-file-size="2MB" data-max-files="1">
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
                            <span class="d-none d-sm-block submit_text">Accept</span>
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
                            Notification</h5>
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
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#Loadsample').DataTable({
                destroy: true,
                order: [],
                ajax: {
                    url: "{{ route('category.index') }}",
                },
                columns: [{
                        data: null,
                        render: function(data, type, full, meta) {
                            return '<img src="{{ URL::to('/') }}/uploads/category/' + data
                                .category_image +
                                '" width="80px" height="80px" class="img-thumbnail"/>';
                        },
                        orderable: false
                    },
                    {
                        data: 'category_name'
                    },
                    {
                        data: null,
                        render: function(data, type, full, meta) {
                            if (data.category_status == 1) {
                                $output =
                                    '<div class="form-check form-switch">\
                                                    <input class="form-check-input click_status" value="' +
                                    data.category_id + '" type="checkbox" checked>\
                                                </div>';
                            } else {
                                $output =
                                    '<div class="form-check form-switch">\
                                                    <input class="form-check-input click_status" value="' +
                                    data.category_id + '" type="checkbox">\
                                                </div>';
                            }
                            return $output;
                        },
                        orderable: false
                    },
                    {
                        data: 'action'
                    }
                ],
                createdRow: function(row, data, index) {
                    $(row).attr("id", data['category_id']);
                }
            });
            // Show Add
            $('.addsample').click(function() {
                $('#submitSample')[0].reset();
                $('#ModalSample').modal('show');
                $('#actionhidden').val('Add');
                $('.modal-title').text('Add');
                $('#category_image').attr('required', true);
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
                }
                $.ajax({
                    type: 'get',
                    url: 'category/' + id,
                    data: {
                        action: action
                    },
                    success: function(res) {
                        if (res.status == 200) {
                            if (res.action == 'Del') {
                                $('#idhidden_del').val(id);
                                $('#myModalLabel120').text(' Delete ');
                                $('#txtbodoydel').text(' [ ' + res.data.category_name + ' ]');
                            } else {
                                $('#category_image').attr('required', false);
                                $('#idhidden').val(id);
                                $('#actionhidden').val('Edit');
                                $('.modal-title').text(' Edit [ ' + res.data.category_name +
                                    ' ] ');

                                $('.editclick').text('Edit "' + res.data.category_name + '"');
                                $('#hidden_cate_id').val(id);
                                $('#cate_name').val(res.data.category_name);
                                $('#cate_slug').val(res.data.category_slug);
                                $('#cate_status').val(res.data.category_status);

                            }
                        } else {
                            alert(res.message);
                        }
                    }
                });
            });
            // Submit
            $(document).on('submit', '#submitSample', function(e) {
                e.preventDefault();
                var action = $('#actionhidden').val();

                var cate_name = $('#cate_name').val();
                var cate_slug = $('#cate_slug').val();
                var cate_status = $('#cate_status').val();
                var category_image = $('#category_image')[0].files[0];

                var data = new FormData(this);
                data.append('cate_name', cate_name);
                data.append('cate_slug', cate_slug);
                data.append('cate_status', cate_status);
                data.append('category_image', category_image);

                var url = '';
                if (action == 'Edit') {
                    var id = $('#idhidden').val();
                    url = 'category/' + id;
                    data.append('_method', 'PUT');
                } else {
                    url = '{{ route('category.store') }}';
                    data.append('_method', 'POST');
                }

                $.ajax({
                    type: 'post',
                    url: url,
                    data: data,
                    contentType: false,
                    cache: false,
                    processData: false,
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
                    url: 'category/' + id,
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

            // Change Slug
            $('#cate_name').keyup(function() {
                $.ajax({
                    type: 'get',
                    url: '{{ route('dashboard.create') }}',
                    data: {
                        keyword: $('#cate_name').val()
                    },
                    dataType: 'json',
                    success: function(data) {
                        $('#cate_slug').val(data);
                    }
                });
            });
            // Status
            $(document).on('click', '.click_status', function() {
                var checked = $(this).is(':checked');
                var id = $(this).val();
                var action = 'category';
                var statusss = '';

                if (checked == true) {
                    statusss = 1;
                } else {
                    statusss = 2;
                }

                $.ajax({
                    type: 'post',
                    url: '{{ route('gallery.store') }}',
                    data: {
                        statusss: statusss,
                        id: id,
                        action: action
                    },
                    success: function(res) {
                        if (res.status == 200) {
                            alert(res.message);
                            $('#Loadsample').DataTable().ajax.reload();
                        } else {
                            alert(res.message);
                        }
                    }
                });
            });
            // Sorting
            $('#sorting_orderby').sortable({
                palceholder: 'ui-state-highlight',
                update: function(event, ui) {
                    var category_id_array = new Array();
                    $('#sorting_orderby tr').each(function() {
                        category_id_array.push($(this).attr('id'));
                    });

                    $.ajax({
                        type: 'get',
                        url: '{{ route('category.create') }}',
                        data: {
                            category_id_array: category_id_array
                        },
                        success: function(res) {
                            $('#Loadsample').DataTable().ajax.reload();
                            alert(res.message);
                        }
                    });
                }
            });
        });
    </script>
@endsection
