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
                                <th>Image</th>
                                <th>Status</th>
                                <th>Action</th>
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
                                        <input type="text" required class="form-control" name="slider_name"
                                            id="slider_name" placeholder="Enter Name">
                                    </div>
                                </div>
                                <div class="col-md-6 col-12">
                                    <div class="form-group">
                                        <label for="last-name-column">Name Sub</label>
                                        <input type="text" required class="form-control" name="slider_desc"
                                            id="slider_desc" placeholder="Enter Name Sub">
                                    </div>
                                </div>
                                <div class="col-md-12 col-12">
                                    <div class="form-group">
                                        <label for="last-name-column">Url</label>
                                        <input type="text" data-parsley-type="url" data-parsley-trigger="keyup"
                                            class="form-control" name="slider_url" id="slider_url"
                                            placeholder="Enter Url">
                                    </div>
                                </div>
                                <div class="col-md-12 col-12">
                                    <div class="form-group">
                                        <label for="country-floating">Body Text</label>
                                        <select class="form-control" required id="slider_bodytext" name="slider_bodytext">
                                            <option value="1">Left</option>
                                            <option value="2">Center</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-12 col-12">
                                    <div class="form-group">
                                        <label for="country-floating">Status</label>
                                        <select class="form-control" required id="slider_status" name="slider_status">
                                            <option value="1">Show</option>
                                            <option value="2">Hide</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-12 col-12">
                                    <div class="form-group">
                                        <label for="country-floating">Ảnh</label>
                                        <input type="file" class="form-control" id="slider_image" name="slider_image"
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
                    url: "{{ route('slider.index') }}",
                },
                columns: [{
                        data: null,
                        render: function(data, type, full, meta) {
                            return "<img src={{ URL::to('/') }}/uploads/slider/" + data
                                .slider_image +
                                " width='90px' height='90px' class='img-thumbnail' />";
                        },
                        orderable: false
                    },
                    {
                        data: null,
                        render: function(data, type, full, meta) {
                            if (data.slider_status == 1) {
                                $output =
                                    '<div class="form-check form-switch">\
                                                                    <input class="form-check-input click_status" value="' +
                                    data.slider_id + '" type="checkbox" checked>\
                                                                </div>';
                            } else {
                                $output =
                                    '<div class="form-check form-switch">\
                                                                    <input class="form-check-input click_status" value="' +
                                    data.slider_id + '" type="checkbox">\
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
                    $(row).attr("id", data['slider_id']);
                }
            });
            // Show Add
            $('.addsample').click(function() {
                $('#submitSample')[0].reset();
                $('#ModalSample').modal('show');
                $('#actionhidden').val('Add');
                $('.modal-title').text('Add');
                $('#slider_image').attr('required', true);
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
                    url: 'slider/' + id,
                    data: {
                        action: action
                    },
                    success: function(res) {
                        if (res.status == 200) {
                            if (res.action == 'Del') {
                                $('#idhidden_del').val(id);
                                $('#myModalLabel120').text(' Delete ');
                                $('#txtbodoydel').text(' [ ' + res.data.slider_title + ' ]');
                            } else {
                                $('#slider_image').attr('required', false);
                                $('#idhidden').val(id);
                                $('#actionhidden').val('Edit');
                                $('.modal-title').text(' Edit [ ' + res.data.slider_title +
                                    ' ] ');

                                $('#slider_name').val(res.data.slider_title);
                                $('#slider_desc').val(res.data.slider_content);
                                $('#slider_url').val(res.data.slider_url);
                                $('#slider_bodytext').val(res.data.slider_bodytext);
                                $('#slider_status').val(res.data.slider_status);

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

                var slider_title = $('#slider_name').val();
                var slider_content = $('#slider_desc').val();
                var slider_url = $('#slider_url').val();
                var slider_status = $('#slider_status').val();
                var slider_bodytext = $('#slider_bodytext').val();
                var slider_image = $('#slider_image')[0].files[0];

                var data = new FormData(this);
                data.append('slider_title', slider_title);
                data.append('slider_content', slider_content);
                data.append('slider_url', slider_url);
                data.append('slider_status', slider_status);
                data.append('slider_bodytext', slider_bodytext);
                data.append('slider_image', slider_image);


                var url = '';
                if (action == 'Edit') {
                    var id = $('#idhidden').val();
                    url = 'slider/' + id;
                    data.append('_method', 'PUT');
                } else {
                    url = '{{ route('slider.store') }}';
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
                    url: 'slider/' + id,
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

            // Status
            $(document).on('click', '.click_status', function() {
                var checked = $(this).is(':checked');
                var id = $(this).val();
                var action = 'slider';
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
                    var slider_id_array = new Array();
                    $('#sorting_orderby tr').each(function() {
                        slider_id_array.push($(this).attr('id'));
                    });

                    $.ajax({
                        type: 'get',
                        url: '{{ route('slider.create') }}',
                        data: {
                            slider_id_array: slider_id_array
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
