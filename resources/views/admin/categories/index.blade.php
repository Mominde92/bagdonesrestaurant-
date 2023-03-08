{{-- Extends layout --}}
@extends('admin.layout.default')


{{-- Content --}}
@section('content')

    <div class="ec-content-wrapper">
        <div class="content">
            <div class="breadcrumb-wrapper d-flex align-items-center justify-content-between">
                <div>
                    <h1>Category</h1>
                    <p class="breadcrumbs"><span><a href="#">Home</a></span>
                        <span><i class="mdi mdi-chevron-right"></i></span>Category</p>
                </div>
                <div>
                    <a href="{{route('category.create')}}" class="btn btn-primary"> Add Category</a>
                </div>
            </div>

            <div class="card-body">
                @if ($message = Session::get('success'))
                <div id="alert" class="alert alert-success alert-notice alert-light-success fade show" role="alert">
                    <!-- <div class="alert-icon"><i class="flaticon-warning"></i></div> -->
                    <div class="alert-text">{{ $message }}</div>
                    <div class="alert-close">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true"><i class="ki ki-close"></i></span>
                        </button>
                    </div>
                </div>
                @endif
                

            <div class="row">
                <div class="col-12">
                    <div class="card card-default">
                        <div class="card-body">
                            <div class="table-responsive">
                                <div id="responsive-data-table_wrapper" class="dataTables_wrapper dt-bootstrap5 no-footer">

                                    <table id="datatable" class="table main_datatable">
                                        <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Name</th>
                                            <th>Name_locale</th>
                                            <th>image</th>
                                            <th>Actions</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        </tbody>
                                    </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div> <!-- End Content -->
    </div>
@endsection


{{-- Scripts Section --}}
@section('scripts')
            {{-- Includable JS --}}
            <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>
            <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.js"></script>
            <script src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>
            <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
            <script src="https://cdn.datatables.net/1.10.21/js/dataTables.bootstrap4.min.js"></script>
    {{-- page scripts --}}
    <script type="text/javascript">

        $(function () {
            var table = $('#datatable').DataTable({
                processing: true,
                serverSide: true,
                ajax: "{{ route('category') }}",
                columns: [
                    {data: 'id', name: 'id'},
                    {data: 'name', name: 'name'},
                    {data: 'name_locale', name: 'name_locale'},
                    {
                        "data": "image",
                        "render": function (data) {
                            return '<img src="' + data + '" class="avatar" width="50" height="50"/>';
                            }
                    },
                    {data: 'action', name: 'action', orderable: false, searchable: false}
                ]
            });
        });

        $('body').on('click', '.delete', function () {
            var id = $(this).data('id');
            Swal.fire({
                title: "Are you sure?",
                text: "You won't be able to revert this!",
                icon: "warning",
                showCancelButton: true,
                confirmButtonText: "Yes, delete it!"
            }).then(function(result) {
                if (result.value) {

                    // ajax
                    $.ajax({
                        type:"POST",
                        url: "{{ url('category/delete') }}",
                        data:{
                            'id': id,
                            '_token': '{{ csrf_token() }}',
                        },
                        dataType: 'json',
                        success: function(res)
                        {
                            $('.main_datatable').DataTable().ajax.reload();
                        }
                    });
                    Swal.fire(
                        "Deleted!",
                        "Your file has been deleted.",
                        "success"
                    );
                }
            });
        });
    </script>
    @if ($message = Session::get('success'))
    <script>
        $('#alert').show();
            setTimeout(function() {
                $('#alert').hide();
        }, 5000);
    </script>
    @endif
@endsection
