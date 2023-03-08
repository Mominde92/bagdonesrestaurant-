{{-- Extends layout --}}
@extends('admin.layout.default')

{{-- Content --}}
@section('content')

    <div class="ec-content-wrapper">
        <div class="content">
            <div class="breadcrumb-wrapper d-flex align-items-center justify-content-between">
                <div>
                    <h1>Users</h1>
                    <p class="breadcrumbs"><span><a href="{{route('category.create')}}">Home</a></span>
                        <span><i class="mdi mdi-chevron-right"></i></span>Users</p>
                </div>
            </div>

            @if ($message = Session::get('success'))
                <div id="alert" class="alert alert-success alert-notice alert-light-success fade show" role="alert">
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
                                            <th>Profile</th>
                                            <th>Name</th>
                                            <th>Email</th>
                                            <th>Phone</th>
                                            <th>Total Buy</th>
                                            <th>Status</th>
                                            <th>Join On</th>
                                            <th>Action</th>
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

    {{-- page scripts --}}
    <script type="text/javascript">

        function formatDate(date) {
            var d = new Date(date),
                month = '' + (d.getMonth() + 1),
                day = '' + d.getDate(),
                year = d.getFullYear();

            if (month.length < 2)
                month = '0' + month;
            if (day.length < 2)
                day = '0' + day;

            return [year, month, day].join('-');
        }

        $(function () {

            var table = $('.main_datatable').DataTable({
                processing: true,
                serverSide: true,
                ajax: "{{ url('Users') }}",
                columns: [
                    {
                        "data": "image_path",
                        "render": function (data) {
                            if(data != null){
                                // return '<img src="{{asset("/media/users/blank.png")}}" class="avatar" width="50" height="50"/>';
                                return '<img src=" {{asset("uploads/Users")}}/' + data + '" class="avatar" width="50" height="50"/>';
                            }else{
                                return '<img src="{{asset('media/logos/bagdones_logo.svg')}}" class="avatar" width="50" height="50"/>';
                            }

                        }
                    },
                    {data: 'full_name', name: 'full_name'},
                    {data: 'email', name: 'email'},
                    {data: 'email', name: 'Phone'},
                    {data: 'email', name: 'Total Buy'},
                    {data: 'email', name: 'Status'},
                    {
                        "data": "created_at",
                        "render": function (data) {
                            return formatDate(data) ;
                        }
                    },
                    {data: 'action', name: 'action', orderable: false, searchable: false},
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
                        url: "{{ url('Users/delete') }}",
                        data:{
                            'id': id,
                            '_token': '{{ csrf_token() }}',
                        },
                        dataType: 'json',
                        success: function(res){
                        // success: function(res){
                        // success: function(res){
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
    <!-- @if ($message = Session::get('success')) -->
    <script>
        // $('#alert').show();
        //     setTimeout(function() {
        //         $('#alert').hide();
        // }, 5000);
     </script>
    <!-- @endif -->
@endsection
