@extends('LayoutAdmin')
@section('content')

    <div class="main-content container-fluid">
        @include('Admin.Sample.includeTitle')

        <section class="section">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-12">
                            <ul class="nav nav-tabs" id="myTab" role="tablist">
                                <li class="nav-item" role="presentation">
                                    <a class="nav-link active clicktab" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home"
                                        aria-selected="true">Home</a>
                                </li>
                                <li class="nav-item" role="presentation">
                                    <a class="nav-link" id="sample-tab" data-toggle="tab" href="#sample" role="tab" aria-controls="sample"
                                        aria-selected="false">Add</a>
                                </li>
                            </ul>
                            <div class="tab-content" id="myTabContent">
                                <div class="tab-pane fade show active mt-4" id="home" role="tabpanel" aria-labelledby="home-tab">
                                    <table class="table table-striped" id="Loadsample">
                                        <thead>
                                            <tr>
                                                <th>Image</th>
                                                <th>Name</th>
                                                <th>category</th>
                                                <th>Status</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>

                                        </tbody>
                                    </table>
                                </div>
                                <div class="tab-pane fade" id="sample" role="tabpanel" aria-labelledby="sample-tab">
                                    <p>
                                        <form method="post" id="submitSample">
                                            <div class="modal-body">
                                                <div class="form-body">
                                                    <div class="row">
                                                        <div class="col-12">
                                                            <div class="form-group">
                                                                <label>Title</label>
                                                                <input type="text" class="form-control" required name="blog_title" id="blog_title"
                                                                    placeholder="Title">
                                                            </div>
                                                        </div>
                                                        <div class="col-12">
                                                            <div class="form-group">
                                                                <label>Content</label>
                                                                <input type="text" class="form-control" required name="blog_content"
                                                                    id="blog_content" placeholder="Content">
                                                            </div>
                                                        </div>
                                                        <div class="col-12">
                                                            <div class="form-group">
                                                                <label>category</label>
                                                                <select name="blog_cate" id="blog_cate" class="form-control">
                                                                    @foreach ($category as $cate)
                                                                        <option value="{{ $cate->category_id }}">{{ $cate->category_name }}
                                                                        </option>
                                                                    @endforeach
                                                                </select>
                                                            </div>
                                                        </div>
                                                        <div class="col-12">
                                                            <div class="form-group">
                                                                <label>category</label>
                                                                <select name="blog_status" id="blog_status" class="form-control">
                                                                    <option value="1">Show</option>
                                                                    <option value="2">Hide</option>
                                                                </select>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-12 col-12">
                                                            <div class="form-group">
                                                                <label for="country-floating">Ảnh</label>
                                                                <input type="file" class="form-control" id="blog_image" name="blog_image" multiple
                                                                    required>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-12 col-12">
                                                            <div class="form-group">
                                                                <label for="country-floating">Desc</label>
                                                                <textarea class="form-control ckeditor" name="blog_desc" id="blog_desc"></textarea>
                                                            </div>
                                                        </div>

                                                    </div>
                                                </div>

                                            </div>
                                            <div class="modal-footer">
                                                <input type="hidden" id="actionhidden" value="">
                                                <input type="hidden" id="idhidden" value="">
                                                <button type="submit" class="btn btn-warning submit mt-3" style="margin-right: 3%">
                                                    <i class="bx bx-check d-block d-sm-none"></i>
                                                    <span class="d-none d-sm-block submit_text">Accept</span>
                                                </button>
                                            </div>
                                        </form>
                                    </p>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
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
    <script src="https://cdn.ckeditor.com/4.6.2/full-all/ckeditor.js"></script>
    <script src="https://cdn.datatables.net/1.10.12/js/jquery.dataTables.min.js"></script>
    <script>
        function CKupdate() {
            for (instance in CKEDITOR.instance) {
                CKEDITOR.instances['blog_desc'].updateElement();
            }
        }


        CKEDITOR.replace('blog_desc', {
            filebrowserUploadUrl: "{{ route('dashboard.store', ['_token' => csrf_token()]) }}",
            filebrowserUploadMethod: "form"
        });
        CKEDITOR.config.enterMode = CKEDITOR.ENTER_BR;
        $(document).ready(function() {
            $('#Loadsample').dataTable({
                destroy: true,
                order: [],
                ajax: {
                    url: "{{ route('blogs.index') }}",
                },
                columns: [{
                        data: null,
                        render: function(data, type, full, meta) {
                            return "<img src={{ URL::to('/') }}/uploads/blog/" + data
                                .blog_image +
                                " width='90px' height='90px' class='img-thumbnail' />";
                        },
                        orderable: false
                    },
                    {
                        data: null,
                        render: function(data, type, full, meta) {
                            var word = data.blog_title;
                            var part = word.substring(0, 46);
                            return part;
                        }
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
                            if (data.blog_status == 1) {
                                $output =
                                    '<div class="form-check form-switch">\
                                                                                <input class="form-check-input click_status" value="' +
                                    data.blog_id + '" type="checkbox" checked>\
                                                                            </div>';
                            } else {
                                $output =
                                    '<div class="form-check form-switch">\
                                                                                <input class="form-check-input click_status" value="' +
                                    data.blog_id + '" type="checkbox">\
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
            // Click Tab
            $('.clicktab').click(function() {
                $('#submitSample')[0].reset();

                $('#home-tab').addClass('active');
                $('#sample-tab').removeClass('active');
                $('#home').addClass('show active');
                $('#sample').removeClass('show active');
                $('#actionhidden').val(' ');
                $('#sample-tab').text('Add');

                $('#blog_desc').text('');
                CKEDITOR.instances['blog_desc'].setData(blog_desc);

                $('#blog_image').attr('required', true);
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
                    $('#home-tab').removeClass('active');
                    $('#sample-tab').addClass('active');
                    $('#home').removeClass('show active');
                    $('#sample').addClass('show active');
                }
                $.ajax({
                    type: 'get',
                    url: 'blogs/' + id,
                    data: {
                        action: action
                    },
                    success: function(res) {
                        if (res.status == 200) {
                            if (res.action == 'Del') {
                                $('#idhidden_del').val(id);
                                $('#myModalLabel120').text(' Delete ');
                                $('#txtbodoydel').text(' [ ' + res.data.blog_title + ' ]');
                            } else {
                                $('#blog_image').attr('required', false);
                                $('#idhidden').val(id);
                                $('#actionhidden').val('Edit');
                                $('#sample-tab').text(' Edit [ ' + res.data.blog_id +
                                    ' ] ');
                                $('#blog_title').val(res.data.blog_title);
                                $('#blog_content').val(res.data.blog_content);
                                $('#blog_status').val(res.data.blog_status);
                                CKupdate();
                                $('#blog_desc').text(res.data.blog_desc);
                                CKEDITOR.instances['blog_desc'].setData(blog_desc);
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
                var blog_image = $('#blog_image')[0].files[0],
                    blog_desc = $('#blog_desc').val(),
                    blog_cate = $('#blog_cate').val(),
                    blog_title = $('#blog_title').val(),
                    blog_status = $('#blog_status').val(),
                    blog_content = $('#blog_content').val();

                var data = new FormData(this);
                data.append('blog_image', blog_image);
                data.append('blog_desc', blog_desc);
                data.append('blog_cate', blog_cate);
                data.append('blog_title', blog_title);
                data.append('blog_status', blog_status);
                data.append('blog_content', blog_content);

                var url = '';
                if (action == 'Edit') {
                    var id = $('#idhidden').val();
                    url = 'blogs/' + id;
                    data.append('_method', 'PUT');
                } else {
                    url = '{{ route('blogs.store') }}';
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

                                $('#submitSample')[0].reset();

                                $('#home-tab').addClass('active');
                                $('#sample-tab').removeClass('active');
                                $('#home').addClass('show active');
                                $('#sample').removeClass('show active');
                                $('#actionhidden').val(' ');
                                $('#sample-tab').text('Add');

                                $('#blog_desc').text('');
                                CKEDITOR.instances['blog_desc'].setData(blog_desc);

                                $('#blog_image').attr('required', true);
                            }, 2000);
                            setTimeout(function() {
                                alert(res.message);
                            }, 2300);
                        } else {
                            $('.submit').attr('disabled', false);

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
                    url: 'blogs/' + id,
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
                var action = 'blog';
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
