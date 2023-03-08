{{-- Extends layout --}}
@extends('admin.layout.default')

{{-- Content --}}
@section('content')

<div class="card card-custom">
    <div class="card-header flex-wrap border-0 pt-6 pb-0">
        <div class="card-title">
            <h3 class="card-label">
                <div class="text-muted pt-2 font-size-sm">Orders History</div>
            </h3>
        </div>
        <div class="card-toolbar">

        </div>
    </div>

    <div class="card-body">
        @if($message = Session::get('success'))
            <div id="alert" class="alert alert-custom alert-notice alert-light-success fade show" role="alert">
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
                                            <th>Item</th>
                                            <th>Name</th>
                                            <th>Customer</th>
                                            <th>Items</th>
                                            <th>Price</th>
                                            <th>Payment</th>
                                            <th>Status</th>
                                            <th>Date</th>
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

    var new_orders = $('.main_datatable').DataTable({
        processing: true,
        serverSide: true,
        ajax: {
            "url": "{{ url('ordershistory') }}",
            "type": "get",
            "data": function (data) {

            },
        },
        columns: [

            {
                data: 'id', name: 'id'
            },
            {
                data: 'id', name: 'Item'
            },
            {
                data: 'city', name: 'Name'
            },
            {
                data: 'area', name: 'Customer'
            },
            {
                data: 'total_amount', name: 'Items'
            },
            {
                data: 'total_amount', name: 'Price'
            },
            {
                data: 'total_amount', name: 'Payment'
            },


            {
                data: function (data) {
                    if(data.deliverd == 1)
                    {
                        return '<span class="mb-2 mr-2 badge badge-success">Deliverd</span>';
                    }
                    if(data.in_delivery == 1)
                    {
                        return '<span class="mb-2 mr-2 badge badge-info">In Delivery</span>';
                    }
                    if(data.in_process == 1)
                    {
                        return '<span class="mb-2 mr-2 badge badge-info">In Process</span>';
                    }
                    if(data.recived == 1)
                    {
                        return '<span class="mb-2 mr-2 badge badge-secondary">Recived</span>' ;
                    }

                    if(data.recived == 0)
                    {
                        return '<span class="mb-2 mr-2 badge badge-secondary">Recived</span>' ;
                    }


                },
                name: 'Status'

            },

            {
                "data": "created_at",
                "render": function (data) {
                    return formatDate(data) ;
                }
            },

            {data: 'action', name: 'action', orderable: false, searchable: false},

        ],
        order: [[0, 'desc']],
    });


</script>
        @if($message = Session::get('success'))
            <script>
                $('#alert').show();
                setTimeout(function () {
                    $('#alert').hide();
                }, 5000);
            </script>
@endif
@endsection
