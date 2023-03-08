{{-- Extends layout --}}
@extends('admin.layout.default')

{{-- Content --}}
@section('content')

    <div class="content">
        <div class="breadcrumb-wrapper d-flex align-items-center justify-content-between">
            <div>
                <h1>Store</h1>
                <p class="breadcrumbs"><span><a href="#">Home</a></span>
                    <span><i class="mdi mdi-chevron-right"></i></span>Store</p>
            </div>
            <div>
                <a href="{{ url('store/create') }}" class="btn btn-primary"> Add Store</a>
            </div>
        </div>

    <div class="card-body">
        @if($message = Session::get('success'))
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

            <div class="product-brand card card-default p-24px">
                <div class="row mb-m-24px">

                    @foreach($stores as $store)
                    <div class="col-xxl-2 col-xl-3 col-lg-4 col-md-6">
                        <div class="card card-default">
                            <div class="card-body text-center p-24px">
                                <div class="image mb-3">
                                    <img src="{{asset('uploads/stores/').'/'. $store->image}}" class="img-fluid rounded-circle" alt="">
                                </div>
                                <h5 class="card-title text-dark">{{$store->name}}</h5>
                                <span class="brand-delete mdi mdi-delete-outline delete" data-id="{{ $store->id }}"></span>
                                <a class="dropdown-item" href="{{ url('store/edit',$store->id) }}" title="Edit">  <i class="fas fa-user-edit"></i></a>

                            </div>
                        </div>
                    </div>
                    @endforeach

                </div>
            </div>
    </div>

@endsection

{{-- Styles Section --}}
@section('styles')
<link href="{{ asset('plugins/custom/datatables/datatables.bundle.css') }}" rel="stylesheet"
    type="text/css" />
@endsection


{{-- Scripts Section --}}
@section('scripts')
{{-- vendors --}}
<script src="{{ asset('plugins/custom/datatables/datatables.bundle.js') }}"
    type="text/javascript"></script>

{{-- page scripts --}}
<script type="text/javascript">
    $(function () {

        var table = $('.main_datatable').DataTable({
            processing: true,
            serverSide: true,
            ajax: "{{ url('store') }}",
            columns: [{
                    data: 'id',
                    name: 'id'
                },
                {
                    data: 'name',
                    name: 'name'
                },
                {
                    data: 'slogan',
                    name: 'slogan'
                },
                {
                    data: 'location_text',
                    name: 'location_text'
                },
                {
                    data: 'is_open',
                    name: 'is_open'
                },
                {
                    data: 'allow_add_hot_price',
                    name: 'allow_add_hot_price'
                },
                {
                    data: 'phone_number',
                    name: 'phone_number'
                },
                {
                    data: 'area_name_en',
                    name: 'area_name_en'
                },

                {
                    data: 'action',
                    name: 'action',
                    orderable: false,
                    searchable: false
                },
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
                        url: "{{ url('store/delete') }}",
                        data:{
                            'id': id,
                            '_token': '{{ csrf_token() }}',
                        },
                        dataType: 'json',
                        success: function(res)
                        {
                            window.location.reload();
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

@endsection
