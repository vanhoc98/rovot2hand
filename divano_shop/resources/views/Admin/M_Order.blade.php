@extends('LayoutAdmin')
@section('content')
    <div class="main-content container-fluid">
        @include('Admin.Sample.includeTitle')
        <section class="section">
            <div class="card">
                <div class="card-body">
                    <table class='table table-striped' id="Loadsample">
                        <thead>
                            <tr>
                                <th>Code</th>
                                <th>Name</th>
                                <th>Thanh toán</th>
                                <th>Status</th>
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
                            <div class="col-12">
                                <div class="row">
                                    <div class="card-content">
                                        <div class="card-body">
                                            <div class="card-header">
                                                <h3 style="text-align: center;">Thông tin khách hàng</h3>
                                            </div>
                                            <form class="form" id="submit_form" action="post">
                                                <input type="hidden" id="hidden_cate_id">
                                                <input type="hidden" id="code_hidden">
                                                <div class="row">
                                                    <div class="col-md-6 col-12">
                                                        <div class="form-group">
                                                            <label for="first-name-column">Tên</label>
                                                            <input type="text" class="form-control" name="cus_name"
                                                                id="cus_name" disabled>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6 col-12">
                                                        <div class="form-group">
                                                            <label for="first-name-column">Email</label>
                                                            <input type="text" class="form-control" name="cus_email"
                                                                id="cus_email" disabled>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-8 col-12">
                                                        <div class="form-group">
                                                            <label for="first-name-column">Số điện thoại</label>
                                                            <input type="text" class="form-control" name="cus_phone"
                                                                id="cus_phone" disabled>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4 col-12">
                                                        <div class="form-group">
                                                            <label for="first-name-column">Thanh toán</label>
                                                            <input type="text" class="form-control" name="cus_pay"
                                                                id="cus_pay" disabled>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-12 col-12">
                                                        <div class="form-group">
                                                            <label for="first-name-column">Địa chỉ</label>
                                                            <textarea class="form-control" name="cus_address"
                                                                id="cus_address" rows="4" disabled></textarea>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-12 col-12 dis_note display">
                                                        <div class="form-group">
                                                            <label for="first-name-column">Ghi chú</label>
                                                            <textarea class="form-control" name="cus_note" id="cus_note"
                                                                rows="4" disabled></textarea>
                                                        </div>
                                                    </div>

                                                </div>
                                                <div class="row">
                                                    <div class="card-header">
                                                        <h3 style="text-align: center;">Liệt kê chi tiết đơn hàng</h3>
                                                    </div>
                                                    <div class="col-md-12 col-12">
                                                        <table class="table">
                                                            <thead class="thead-light">
                                                                <tr>
                                                                    <th scope="col">Sản phẩm</th>
                                                                    <th scope="col">Qty</th>
                                                                    <th scope="col">Qty Sold</th>
                                                                    <th scope="col">Phiếu mua hàng</th>
                                                                    <th scope="col">Giá</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody id="detailorder">

                                                            </tbody>
                                                            <tfoot id="loadtotal">

                                                            </tfoot>
                                                        </table>
                                                    </div>
                                                    <div class="col-md-12 col-12">
                                                        <div class="form-group">
                                                            <label for="country-floating">Status</label>
                                                            <select class="form-control" id="status_or" name="status_or">
                                                                <option value="1">PROCESSING</option>
                                                                <option value="2">BEING TRANSPORTED</option>
                                                                <option id="com_pay" class="display" value="3">
                                                                    COMPLETELY PAYMENT</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-light" data-bs-dismiss="modal">
                            <i class="bx bx-x d-block d-sm-none"></i>
                            <span class="d-none d-sm-block">Đóng</span>
                        </button>
                        <input type="hidden" id="actionhidden" value="">
                        <input type="hidden" id="idhidden" value="">
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
        .textTranform{
            text-transform: uppercase;
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
                    url: "{{ route('order.index') }}",
                },
                columns: [{
                        data: null,
                        render: function(data, type, full, meta) {
                            return '#' + data.order_code + '';
                        },

                    },
                    {
                        data: 'customer_name'
                    },
                    {
                        data: 'customer_pay'
                    },
                    {
                        data: null,
                        render: function(data, type, full, meta) {
                            if (data.order_status == 1) {
                                return "<span class='badge bg-danger btn-sm textTranform'>Processing</span>";
                            } else if (data.order_status == 2) {
                                return "<span class='badge bg-info btn-sm textTranform'>being transported</span>";
                            } else {
                                return "<span class='badge bg-success btn-sm textTranform'>Completely Payment</span>";
                            }
                        },
                        orderable: false
                    },
                    {
                        data: 'action'
                    }
                ]
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
                    url: 'order/' + id,
                    data: {
                        action: action
                    },
                    success: function(res) {
                        if (res.status == 200) {
                            if (res.action == 'Del') {
                                $('#idhidden_del').val(id);
                                $('#myModalLabel120').text(' Delete ');
                                $('#txtbodoydel').text(' [ #' + res.order.order_code + ' ] ');
                            } else {
                                $('.editclick').text('Detail "#' + res.order.order_code + '"');
                                $('#hidden_cate_id').val(id);
                                $('#cus_name').val(res.cus.customer_name);
                                $('#cus_email').val(res.cus.customer_email);
                                $('#cus_phone').val(res.cus.customer_phone);
                                $('#cus_pay').val(res.cus.customer_pay);
                                $('#cus_address').text(res.cus.customer_address);
                                $('#status_or').val(res.order.order_status);
                                if (res.cus.customer_note != null) {
                                    $('.dis_note').removeClass('display');
                                    $('#cus_note').text(res.cus.customer_note);
                                } else {
                                    $('.dis_note').addClass('display');
                                }
                                if (res.order.order_status == 3) {
                                    $('#status_or').attr('disabled', true);
                                }
                                if (res.order.order_status == 2) {
                                    $('#com_pay').removeClass('display');
                                } else {
                                    $('#com_pay').addClass('display');
                                }
                                $('#code_hidden').val(id);
                                $('#detailorder').html(res.data);
                                $('#loadtotal').html(res.data_2);
                            }
                        } else {
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
                    url: 'order/' + id,
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

            // Change Qty
            $(document).on('blur', '.update_qty', function() {
                var id = $(this).data('id');
                var order_text = $('.idpro_' + id + '').text();
                var code_hidden = $('#code_hidden').val();

                $.ajax({
                    type: 'put',
                    url: 'order/' + id,
                    data: {
                        order_text: order_text,
                        code_hidden: code_hidden
                    },
                    success: function(res) {
                        if (res.status == 200) {
                            $('.subtotal').text(res.subtotal);
                            $('.total').text(res.total);
                            alert(res.message);
                        } else if (res.status == 400) {
                            $.each(res.errors, function(key, err_values) {
                                alert(err_values);
                            });
                            $('.idpro_' + id + '').text(res.data.order_de_qty);
                        } else {
                            alert(res.message);
                            $('.idpro_' + id + '').text(res.data.order_de_qty);
                        }
                    }

                });
            });
            // Change Status
            $(document).on('change', '#status_or', function(e) {
                e.preventDefault();
                var value = $(this).val();
                var id = $('#code_hidden').val();

                //lay so luong
                quantity = [];
                $("input[name='product_quantity_order']").each(function() {
                    quantity.push($(this).val());
                });

                //lay product id
                order_product_id = [];
                $("input[name='order_product_id']").each(function() {
                    order_product_id.push($(this).val());
                });

                j = 0;
                for (i = 0; i < order_product_id.length; i++) {
                    var order_qty = $('.order_qty_' + order_product_id[i]).val();
                    var order_qty_storage = $('.order_qty_storage_' + order_product_id[i]).val();

                    if (parseInt(order_qty) > parseInt(order_qty_storage)) {
                        j += 1;
                        if (j == 1) {
                            alert('Số lượng trong kho không đủ');
                        }
                        $('.color_qty_' + order_product_id[i]).css('color', '#e74a3b').css('font-weight',
                            'bold');
                    }

                }
                if (j == 0) {

                    $.ajax({
                        type: 'get',
                        url: 'order/' + id + '/edit',
                        data: {
                            value: value,
                            order_product_id: order_product_id,
                            quantity: quantity
                        },
                        success: function(response) {
                            if (response.status == 404) {
                                alert(response.message);
                            } else {
                                $('#Loadsample').DataTable().ajax.reload();
                                alert(response.message);
                                $('#ModalSample').modal('hide');
                            }
                        }

                    });
                }
            });
        });
    </script>
@endsection
