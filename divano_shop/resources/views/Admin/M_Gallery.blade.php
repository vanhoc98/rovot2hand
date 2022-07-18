@extends('LayoutAdmin')
@section('content')
    <div class="main-content container-fluid">
        <section class="section">
            <div class="row">
                <div class="col-md-6 col-12">
                    <div class="form-group">
                        <button class="btn icon btn-sm btn-outline-warning addsample">Thêm <i
                                class="fas fa-plus-circle"></i></button>
                        <button class="btn icon btn-sm btn-outline-danger delete_gal"
                            data-url="{{ route('gallery.destroy', $pro_id) }}" data-action="All">Del All <i
                                class="fas fa-trash-restore-alt"></i></button>
                    </div>
                </div>
            </div>
            <div class="card">
                <div class="card-body">
                    <table class="table">
                        <thead class="thead-light">
                            <tr>
                                <th scope="col">ID</th>
                                <th scope="col">Ảnh</th>
                                <th scope="col">Hoạt động</th>
                            </tr>
                        </thead>
                        <tbody id="loadGal">

                        </tbody>
                    </table>
                </div>
            </div>

        </section>
    </div>

    <div class="modal fade text-left" id="ModalAdd" tabindex="-1" role="dialog" aria-labelledby="myModalLabel120"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable" role="document">
            <form action="{{ route('gallery.update',$pro_id) }}" method="post" id="submitAdd">
                <div class="modal-content">
                    <div class="modal-header bg-warning" id="colorHeader">
                        <h5 class="modal-title white" id="myModalLabel120">
                            Thêm thư viện</h5>
                        <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                            <i data-feather="x"></i>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="col-md-12 col-12">
                            <div class="form-group">
                                <label for="country-floating">Ảnh</label>
                                <input type="file" class="form-control" id="gall_image" accept="image/*"
                                    name="gall_image[]" multiple required>
                                <div class="invalid-feedback error">
                                    <i class="bx bx-radio-circle"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-light-secondary" data-bs-dismiss="modal">
                            <i class="bx bx-x d-block d-sm-none"></i>
                            <span class="d-none d-sm-block">Đóng</span>
                        </button>
                        <button type="submit" class="btn btn-warning ml-1">
                            <i class="bx bx-check d-block d-sm-none"></i>
                            <span class="d-none d-sm-block">Chấp nhận</span>
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <input type="hidden" id="pro_idHidden" value="{{ $pro_id }}">
@endsection
@section('css')
    <style>
        #txtbodoydel {
            font-weight: bold;
        }

    </style>
@endsection
@section('js')
    <script>
        function LoadGallery() {
            $.ajax({
                type: 'get',
                url: '{{ route('gallery.index') }}',
                data: {
                    id: $('#pro_idHidden').val()
                },
                success: function(res) {
                    $('#loadGal').html(res.data);
                }
            });
        }
        $(document).ready(function() {
            LoadGallery();
            // Check file
            $('#gall_image').change(function() {
                var error = '';
                var files = $('#gall_image')[0].files;

                if (files.length > 4) {
                    error += 'Tối đa 4 ảnh';
                } else if (files.length == '') {
                    error += 'Vui lòng chọn ảnh';
                } else if (files.size > 5000000) {
                    error += 'File ảnh không quá 5MB';
                }

                if (error == '') {
                    $('#gall_image').removeClass('is-invalid');
                    $('#gall_image').addClass('is-valid');
                } else {
                    $('#gall_image').val('');
                    $('#gall_image').addClass('is-invalid');
                    $('.error').text(error);
                    return false;
                }
            });
            // Show Add
            $('.addsample').click(function() {
                $('#ModalAdd').modal('show');
                $('#submitAdd')[0].reset();
                $('#gall_image').removeClass('is-invalid');
                $('#gall_image').removeClass('is-valid');
            });
            // Submit Add
            $(document).on('submit','#submitAdd', function(e){
                e.preventDefault();
                var url = $(this).attr('action');
                var action = 'Add';
                var gall_image = $('#gall_image')[0].files;
                var id_pro = $('#pro_idHidden').val();

                var data = new FormData(this);
                data.append('_method', 'PUT');
                data.append('gall_image', gall_image);
                data.append('id_pro', id_pro);
                data.append('action', action);

                $.ajax({
                    type: 'post',
                    url: url,
                    data: data,
                    contentType: false,
                    cache: false,
                    processData: false,
                    success:function(res){
                        if(res.status == 200){
                            $('#ModalAdd').modal('hide');
                            $('#submitAdd')[0].reset();
                            LoadGallery();
                        }else{
                            alert(res.message);
                        }
                    }
                });
            });
            // Update Gallery
            $(document).on('change', '.file_image', function() {
                var url = $(this).data('url');
                var up_id = $(this).data('gal_id');
                var action = 'Up';
                var image = document.getElementById('file-' + up_id).files[0];

                var data = new FormData();
                data.append("file", image);
                data.append("up_id", up_id);
                data.append('_method', 'PUT');
                data.append('action', action);

                $.ajax({
                    type: 'post',
                    url: url,
                    data: data,
                    contentType: false,
                    cache: false,
                    processData: false,
                    dataType: 'json',
                    success: function(res) {
                        if (res.status == 200) {
                            alert(res.message);
                            LoadGallery();
                        } else {
                            alert(res.message);
                        }
                    }

                });
            });
            // Delete Gallery
            $(document).on('click', '.delete_gal', function(e) {
                e.preventDefault();
                var url = '';
                var idGall = '';
                var action = $(this).data('action');

                if(action == 'One'){
                    idGall = $(this).data('id');
                }else{
                    idGall = '';
                }

                var result = confirm("Want to delete?");
                if (result) {
                    $.ajax({
                        type: 'DELETE',
                        url: url,
                        data: {
                            action: action,
                            idGall:idGall
                        },
                        dataType: 'json',
                        success: function(res) {
                            if (res.status == 200) {
                                LoadGallery();
                            } else {
                                alert(res.message);
                            }
                        }
                    });
                }

            });
        });
    </script>
@endsection
