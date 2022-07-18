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
                                <th>Tên</th>
                                <th>Hình ảnh</th>
                                <th>Phòng trưng bày</th>
                                <th>Giá</th>
                                <th>Loại</th>
                                <th>Trạng thái</th>
                                <th>Hoạt động</th>
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
                                <div class="col-12">
                                    <div class="form-group">
                                        <label>Name</label>
                                        <input type="text" id="pro_name" name="pro_name" class="form-control"
                                            placeholder="Name" required>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-group">
                                        <label>Slug</label>
                                        <input type="text" id="pro_slug" name="pro_slug" class="form-control"
                                            placeholder="Slug Name" required>
                                        <div class="invalid-feedback error_slug">
                                            <i class="bx bx-radio-circle"></i>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-group">
                                        <label>Price</label>
                                        <input type="text" data-parsley-pattern="^[1-9]\d{0,7}(?:\.\?:\,\d{1,4})?$"
                                            data-parsley-trigger="keyup" id="pro_price" name="pro_price"
                                            class="form-control" placeholder="Enter Price" required>
                                        <input type="hidden" id="pro_old_price" name="pro_old_price" class="form-control">
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-group">
                                        <label>Qty</label>
                                        <input type="number" data-parsley-pattern="^[1-9]\d{0,7}(?:\.\d{1,4})?$"
                                            data-parsley-trigger="keyup" id="pro_qty" name="pro_qty" class="form-control"
                                            placeholder="Enter Qty" required value="20">
                                        <div class="invalid-feedback error_repass">
                                            <i class="bx bx-radio-circle"></i>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-group">
                                        <label>Desc</label>
                                        <textarea class="form-control" id="pro_desc" name="pro_desc" required></textarea>
                                    </div>
                                </div>
                                <div class="col-md-12 col-12">
                                    <div class="form-group">
                                        <label for="country-floating">Category</label>
                                        <div class="form-group">
                                            <select class="choices form-select" id="pro_cate" name="pro_cate" required>
                                                @foreach ($category as $cate)
                                                    <option value="{{ $cate->category_id }}">
                                                        {{ $cate->category_name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-12 col-12">
                                    <div class="form-group">
                                        <label for="country-floating">Status</label>
                                        <div class="form-group">
                                            <select class="choices form-select" id="pro_status" name="pro_status" required>
                                                <option value="1">Show</option>
                                                <option value="2">Hide</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-12 col-12">
                                    <div class="form-group">
                                        <label for="country-floating">Ảnh</label>
                                        <input type="file" class="form-control" id="pro_image" accept="image/*"
                                            name="pro_image" multiple required data-max-file-size="2MB" data-max-files="1">
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
    <script>
        $(document).ready(function() {
            $('#Loadsample').DataTable({
                destroy: true,
                order: [],
                ajax: {
                    url: "{{ route('products.index') }}",
                },
                columns: [{
                        data: 'product_name'
                    },
                    {
                        data: 'image',
                        orderable: false
                    },
                    {
                        data: 'gallery_td',
                        orderable: false
                    },
                    {
                        data: 'price_td',
                        orderable: false
                    },
                    {
                        data: null,
                        render: function(data, type, full, meta) {
                            return '<span class="badge bg-dark btn-sm">' + data.category_name +
                                '</span>';
                        }
                    },
                    {
                        data: null,
                        render: function(data, type, full, meta) {
                            if (data.product_status == 1) {
                                $output =
                                    '<div class="form-check form-switch">\
                                                                                                <input class="form-check-input click_status" value="' +
                                    data.product_id + '" type="checkbox" checked>\
                                                                                            </div>';
                            } else {
                                $output =
                                    '<div class="form-check form-switch">\
                                                                                                <input class="form-check-input click_status" value="' +
                                    data.product_id + '" type="checkbox">\
                                                                                            </div>';
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
                $('#pro_image').attr('required', true);
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
                    url: 'products/' + id,
                    data: {
                        action: action
                    },
                    success: function(res) {
                        if (res.status == 200) {
                            if (res.action == 'Del') {
                                $('#idhidden_del').val(id);
                                $('#myModalLabel120').text(' Delete ');
                                $('#txtbodoydel').text(' [ ' + res.data.product_name + ' ]');
                            } else {
                                $('#idhidden').val(id);
                                $('#actionhidden').val('Edit');
                                $('.modal-title').text(' Edit [ ' + res.data.product_name +
                                    ' ] ');

                                $('#pro_name').val(res.data.product_name);
                                $('#pro_slug').val(res.data.product_slug);
                                $('#pro_status').val(res.data.product_status);
                                $('#pro_price').val(res.data.product_price);
                                $('#pro_old_price').val(res.data.product_price);
                                $('#pro_qty').val(res.data.product_quantity);
                                $('#pro_cate').val(res.data.category_id);
                                $('#pro_desc').val(res.data.product_desc);

                                $('#pro_image').attr('required', false);

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

                var size = [];
                var color = [];
                var pro_name = $('#pro_name').val();
                var pro_slug = $('#pro_slug').val();
                var pro_status = $('#pro_status').val();
                var pro_price = $('#pro_price').val();
                var pro_old_price = $('#pro_old_price').val();
                var pro_qty = $('#pro_qty').val();
                var pro_cate = $('#pro_cate').val();
                var pro_desc = $('#pro_desc').val();

                var pro_image = $('#pro_image')[0].files[0];

                var data = new FormData(this);
                data.append('pro_name', pro_name);
                data.append('pro_slug', pro_slug);
                data.append('pro_status', pro_status);
                data.append('pro_price', pro_price);
                data.append('pro_old_price', pro_old_price);
                data.append('pro_qty', pro_qty);
                data.append('pro_cate', pro_cate);
                data.append('pro_desc', pro_desc);

                data.append('pro_image', pro_image);

                var url = '';
                if (action == 'Edit') {
                    var id = $('#idhidden').val();
                    url = 'products/' + id;
                    data.append('_method', 'PUT');
                } else {
                    url = '{{ route('products.store') }}';
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
                    url: 'products/' + id,
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
            $('#pro_name').keyup(function() {
                $.ajax({
                    type: 'get',
                    url: '{{ route('dashboard.create') }}',
                    data: {
                        keyword: $('#pro_name').val()
                    },
                    dataType: 'json',
                    success: function(data) {
                        $('#pro_slug').val(data);
                    }
                });
            });
            // Status
            $(document).on('click', '.click_status', function() {
                var checked = $(this).is(':checked');
                var id = $(this).val();
                var action = 'product';
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
        });
    </script>
@endsection
