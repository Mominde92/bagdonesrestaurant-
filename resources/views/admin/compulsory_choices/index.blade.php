{{-- Extends layout --}}
@extends('admin.layout.default')

{{-- Content --}}
@section('content')

    <div class="content">
        <div class="breadcrumb-wrapper d-flex align-items-center justify-content-between">
            <div>
                <h1>Compulsory Choice</h1>
                <p class="breadcrumbs"><span><a href="{{route('dashboard')}}">Home</a></span>
                    <span><i class="mdi mdi-chevron-right"></i></span>Compulsory Choice</p>
            </div>
            <div>
                <a href="{{ url('compulsory_choice/create') }}" class="btn btn-primary"> Add compulsory choice</a>
            </div>
        </div>


        <div class="card-body">
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
                <table id="datatable" class="table main_datatable">
                <thead>
                <tr>
                    <th>ID</th>
                    <th>Name_en</th>
                    <th>Name_locale</th>
                    <th>Actions</th>
                </tr>
                </thead>
                <tbody>
                </tbody>

            </table>

        </div>

    </div>

@endsection

{{-- Styles Section --}}
@section('styles')
    <link href="{{ asset('plugins/custom/datatables/datatables.bundle.css') }}" rel="stylesheet" type="text/css"/>
@endsection


{{-- Scripts Section --}}
@section('scripts')
    {{-- vendors --}}
    <script src="{{ asset('plugins/custom/datatables/datatables.bundle.js') }}" type="text/javascript"></script>

    {{-- page scripts --}}
    <script type="text/javascript">
        $(function () {
            var table = $('.main_datatable').DataTable({
                processing: true,
                serverSide: true,
                ajax: "{{ url('compulsory_choice') }}",
                // ajax: "{{ url('attribute') }}",
                columns: [
                    {data: 'id', name: 'id'},
                    {data: 'name', name: 'name'},
                    {data: 'name_locale', name: 'name_locale'},
                    {data: 'action', name: 'action', orderable: false, searchable: false},
                    
                    // {
                    //     "data": "id",
                    //     render:function(data, type, row)
                    //     { 
                    //         var show_url = ''+data;
                    //         var edit_url = "{{ URL::to('/compulsory_choice/edit') }}/"+data;
                    //         return '<a href="'+show_url+'" class="btn btn-sm btn-clean btn-icon" title="View details"><i class="la la-eye"></i></a><a href="'+edit_url+'" class="btn btn-sm btn-clean btn-icon" title="Edit details"><i class="la la-edit"></i></a><a href="javascript:void(0)" data-id="'+data+'" class="delete btn btn-sm btn-clean btn-icon" title="Delete"><i class="la la-trash"></i></a>';
                    //     }
                    // }
                    //{data: 'action', name: 'action', orderable: false, searchable: false},
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
                        url: "{{ url('compulsory_choice/delete') }}",
                        data:{
                            'id': id,
                            '_token': '{{ csrf_token() }}',
                        },
                        dataType: 'json',
                        success: function(res){
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
