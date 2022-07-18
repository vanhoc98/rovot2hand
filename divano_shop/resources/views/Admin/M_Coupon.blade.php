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
                                 <th> Mã </th>
                                 <th> Trạng thái </th>
                                 <th> Ngày </th>
                                 <th> Hành động </th>
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
                    <h4 class="modal-title" id="titleM"></h4>
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
                                        <label for="first-name-column">Code</label>
                                        <input type="text" id="coupon_code" name="coupon_code" class="form-control"
                                            placeholder="Enter Code" required>
                                    </div>
                                </div>
                                <div class="col-md-6 col-12">
                                    <div class="form-group">
                                        <label for="first-name-column">Qty</label>
                                        <input type="number" id="coupon_qty" name="coupon_qty" class="form-control"
                                            placeholder="Enter Qty" required>
                                    </div>
                                </div>
                                <div class="col-md-6 col-12">
                                    <div class="form-group">
                                        <label for="first-name-column">Ngày bắt đầu</label>
                                        <input type="date" id="coupon_date_start" name="coupon_date_start"
                                            class="form-control" placeholder="Enter Date Start" required>
                                    </div>
                                </div>
                                <div class="col-md-6 col-12">
                                    <div class="form-group">
                                        <label for="first-name-column">Ngày kết thúc</label>
                                        <input type="date" id="coupon_date_end" name="coupon_date_end"
                                            class="form-control" placeholder="Enter Date End" required>
                                    </div>
                                </div>
                                <div class="col-md-12 col-12">
                                    <div class="form-group">
                                        <label for="country-floating">Condition</label>
                                        <select class="form-control" id="coupon_condition" name="coupon_condition"
                                            required>
                                            <option value="">Chọn</option>
                                            <option value="1">Tiền</option>
                                            <option value="2">Phần trăm</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-12 col-12 salenumber display">
                                    <label for="country-floating" class="title_coupon_condition">Money</label>
                                    <div class="form-group position-relative has-icon-left">
                                        <input type="number" required pattern="^[1-9]\d{0,7}(?:\.\?:\,\d{1,4})?$"
                                            data-parsley-trigger="keyup" class="form-control" id="coupon_sale_number"
                                            name="coupon_sale_number">
                                        <div class="form-control-icon icon_coupon_condition">

                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-12 col-12">
                                    <div class="form-group">
                                        <label for="country-floating">Status</label>
                                        <select class="form-control" id="coupon_status" name="coupon_status" required>
                                            <option value="1">Show</option>
                                            <option value="2">Hide</option>
                                        </select>
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
            var today = new Date();
            var dd = today.getDate();
            var mm = today.getMonth() + 1;
            var yyyy = today.getFullYear();
            $('#Loadsample').DataTable({
                destroy: true,
                order: [],
                ajax: {
                    url: "{{ route('coupon.index') }}",
                },
                columns: [{
                        data: 'coupon_code'
                    },
                    {
                        data: null,
                        render: function(data, type, full, meta) {
                            if (data.coupon_status == 1) {
                                $output =
                                    '<div class="form-check form-switch">\
                                                                        <input class="form-check-input click_status" value="' +
                                    data.coupon_id + '" type="checkbox" checked>\
                                                                    </div>';
                            } else {
                                $output =
                                    '<div class="form-check form-switch">\
                                                                        <input class="form-check-input click_status" value="' +
                                    data.coupon_id + '" type="checkbox">\
                                                                    </div>';
                            }
                            return $output;
                        },
                        orderable: false
                    },
                    {
                        data: null,
                        render: function(data, type, full, meta) {
                            var date_end = new Date(data.coupon_date_end);
                            var date_end_dd = date_end.getDate();
                            var date_end_mm = date_end.getMonth() + 1;
                            var date_end_yyyy = date_end.getFullYear();
                            if (mm < date_end_mm && date_end_yyyy >= yyyy) {
                                $output =
                                    '<span class="badge bg-success btn-sm textTranform">Expiry Date</span>';
                            } else if (mm == date_end_mm && date_end_yyyy == yyyy) {
                                if (date_end_dd >= dd) {
                                    $output =
                                        '<span class="badge bg-success btn-sm textTranform">Expiry Date</span>';
                                } else {
                                    $output =
                                        '<span class="badge bg-danger btn-sm textTranform">Out Of Date</span>';
                                }
                            } else {
                                $output =
                                    '<span class="badge bg-danger btn-sm textTranform">Out Of Date</span>';
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
                    url: 'coupon/' + id,
                    data: {
                        action: action
                    },
                    success: function(res) {
                        if (res.status == 200) {
                            if (res.action == 'Del') {
                                $('#idhidden_del').val(id);
                                $('#myModalLabel120').text(' Delete ');
                                $('#txtbodoydel').text(' [ ' + res.data.coupon_code + ' ]');
                            } else {
                                $('.salenumber').removeClass('display');
                                if (res.data.coupon_condition == 1) {
                                    $('.icon_coupon_condition').html(
                                        '<i class="fas fa-dollar-sign"></i>');
                                } else {
                                    $('.icon_coupon_condition').html(
                                        '<i class="fas fa-percentage"></i>');
                                }
                                $('#actionhidden').val('Edit');
                                $('.modal-title').text('Edit [ ' + res.data.coupon_code + ' ] ');
                                $('#idhidden').val(id);
                                $('#coupon_code').val(res.data.coupon_code);
                                $('#coupon_qty').val(res.data.coupon_qty);
                                {{--  $('#coupon_date_start').val(res.data.coupon_date_end);
                                $('#coupon_date_end').val(res.data.coupon_date_end);  --}}
                                $('#coupon_condition').val(res.data.coupon_condition);
                                $('#coupon_sale_number').val(res.data.coupon_sale_number);
                                $('#coupon_status').val(res.data.coupon_status);
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

                var coupon_code = $('#coupon_code').val();
                var coupon_qty = $('#coupon_qty').val();
                var coupon_date_start = $('#coupon_date_start').val();
                var coupon_date_end = $('#coupon_date_end').val();
                var coupon_condition = $('#coupon_condition').val();
                var coupon_sale_number = $('#coupon_sale_number').val();
                var coupon_status = $('#coupon_status').val();

                var url = '';
                var type = '';
                if (action == 'Edit') {
                    var id = $('#idhidden').val();
                    url = 'coupon/' + id;
                    type = 'put';
                } else {
                    url = '{{ route('coupon.store') }}';
                    type = 'post';
                }

                $.ajax({
                    type: type,
                    url: url,
                    data: {
                        coupon_code: coupon_code,
                        coupon_qty: coupon_qty,
                        coupon_date_start: coupon_date_start,
                        coupon_date_end: coupon_date_end,
                        coupon_condition: coupon_condition,
                        coupon_sale_number: coupon_sale_number,
                        coupon_status: coupon_status,
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
                            alert(res.message);
                            setTimeout(function() {
                                $('.submit_text').text('Accept');
                                $('.submit').attr('disabled', false);
                                $('#ModalSample').modal('hide');
                            }, 2000);
                        } else {
                            $('.submit').attr('disabled', false);
                            $('.submit_text').text('Accept');
                            alert(res.message);
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
                    url: 'coupon/' + id,
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
                var action = 'coupon';
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
            // Change
            $('#coupon_condition').change(function() {
                var val = $(this).val();
                $('#coupon_sale_number').val('');
                if (val == 1) {
                    $('.salenumber').removeClass('display');
                    $('.icon_coupon_condition').html('<i class="fas fa-dollar-sign"></i>');
                } else {
                    $('.salenumber').removeClass('display');
                    $('.title_coupon_condition').text('Percent');
                    $('.icon_coupon_condition').html('<i class="fas fa-percentage"></i>');
                }
            });
        });
    </script>
@endsection
