{{-- Extends layout --}}
@extends('admin.layout.default')

{{-- Content --}}
@section('content')

<div class="card card-custom">
    <div class="card-header flex-wrap border-0 pt-6 pb-0">
        <div class="card-title">
            <h3 class="card-label">
                <div class="text-muted pt-2 font-size-sm">Send Notification To All</div>
            </h3>
        </div>
        <div class="card-toolbar">

        </div>
    </div>

    <div class="card-body">
        @if($message = Session::get('success'))
            <div id="alert" class="alert alert-custom alert-notice alert-light-success fade show" role="alert">
                <!-- <div class="alert-icon"><i class="flaticon-warning"></i></div> -->
                <div class="alert-text">{{ $message }}</div>
                <div class="alert-close">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true"><i class="ki ki-close"></i></span>
                    </button>
                </div>
            </div>
        @endif

        <form action="{{route('sendNotification')}}" method="POST" enctype="multipart/form-data" role="form">
            {{ csrf_field() }}

            <div class="form-group row">
                <label class="col-sm-4 col-form-label">Notification Type</label>
                <div class="col-sm-8">
                   <select name="item">
                    @foreach($orders as  $order)
                    <option value="{{$order->id}}">{{$order->device_token}} </option>
                    @endforeach
                   </select>
                </div>
            </div>

            <div class="form-group row">
                <label class="col-sm-4 col-form-label">Title </label>
                <div class="col-sm-8">
                    <input type="text" name="title" class="form-control" required >
                </div>
            </div>


            <div class="form-group row">
                <label class="col-sm-4 col-form-label">Description </label>
                <div class="col-sm-8">
                    <input type="text" name="body" class="form-control" required >
                </div>
            </div>

            <div class="form-group row">
                <label class="col-sm-4 col-form-label">Title locale</label>
                <div class="col-sm-8">
                    <input type="text" name="title_locale" class="form-control" required >
                </div>
            </div>


            <div class="form-group row">
                <label class="col-sm-4 col-form-label">Description Local</label>
                <div class="col-sm-8">
                    <input type="text" name="description_locale" class="form-control" required >
                </div>
            </div>

            <div class="form-group row">
                <label class="col-sm-4 col-form-label">Notification Type</label>
                <div class="col-sm-8">
                    <input type="text" name="notification_type" class="form-control" required >
                </div>
            </div>

            <div class="form-group row">
                <label class="col-sm-4 col-form-label">image </label>
                <div class="col-sm-8">
                    <input type="file" name="image_path" class="form-control" >
                </div>
            </div>


            <button type="submit" class="btn btn-primary ">Send</button>
            <button type="reset" class="btn btn-primary ">Rest</button>
        </form>




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

    var new_orders = $('#new_orders_table').DataTable({
        processing: true,
        serverSide: true,
        ajax: {
            "url": "{{ url('orders') }}",
            "type": "get",
            "data": function (data) {
                data.recived = 0
            },
        },
        columns: [
            {
                data: 'id', name: 'id'
            },
            {
                data: 'phone_number', name: 'phone_number'
            },
            {
                data: 'city', name: 'city'
            },
            {
                data: 'area', name: 'area'
            },
            {
                data: 'total_amount', name: 'total_amount'
            },
            {
                data: 'created_at', name: 'created_at'
            },
            {
                "render": function () {
                                return 'kkkk';
                            }
            },
            {data: 'action', name: 'action', orderable: false, searchable: false},

        ],
        order: [[0, 'desc']],
    });

    function new_orders_table() {
        new_orders.ajax.reload(null, false);
    }
    //-----------------------------------------------
    var recived = $('#recived_table').DataTable({
        processing: true,
        serverSide: true,
        // ajax: "{{ url('orders') }}",
        ajax: {
            "url": "{{ url('orders') }}",
            "type": "get",
            "data": function (data) {
                data.recived = 1
            },
        },
        columns: [{
                data: 'id', name: 'id'
            },
            {
                data: 'phone_number', name: 'phone_number'
            },
            {
                data: 'city', name: 'city'
            },
            {
                data: 'area', name: 'area'
            },
            {
                data: 'total_amount', name: 'total_amount'
            },
            {
                data: 'created_at', name: 'created_at'
            },
            {
                "render": function () {
                                return 'kkkk';
                            }
            },
            {data: 'action', name: 'action', orderable: false, searchable: false},

        ],
        order: [[0, 'desc']],
    });

    function recived_table() {
        recived.ajax.reload(null, false);
    }
    //-----------------------------------------------
    var in_process = $('#in_process_table').DataTable({
        processing: true,
        serverSide: true,
        // ajax: "{{ url('orders') }}",
        ajax: {
            "url": "{{ url('orders') }}",
            "type": "get",
            "data": function (data) {
                data.in_process = 1
            },
        },
        columns: [{
                data: 'id', name: 'id'
            },
            {
                data: 'phone_number', name: 'phone_number'
            },
            {
                data: 'city', name: 'city'
            },
            {
                data: 'area', name: 'area'
            },
            {
                data: 'total_amount', name: 'total_amount'
            },
            {
                data: 'created_at', name: 'created_at'
            },
            {
                "render": function () {
                                return 'kkkk';
                            }
            },
            {data: 'action', name: 'action', orderable: false, searchable: false},

        ],
        order: [[0, 'desc']],
    });

    function in_process_table() {
        in_process.ajax.reload(null, false);
    }
    //----------------------------------------------------------
    var in_delivery = $('#in_delivery_table').DataTable({
        processing: true,
        serverSide: true,
        // ajax: "{{ url('orders') }}",
        ajax: {
            "url": "{{ url('orders') }}",
            "type": "get",
            "data": function (data) {
                data.in_delivery = 1
            },
        },
        columns: [{
                data: 'id', name: 'id'
            },
            {
                data: 'phone_number', name: 'phone_number'
            },
            {
                data: 'city', name: 'city'
            },
            {
                data: 'area', name: 'area'
            },
            {
                data: 'total_amount', name: 'total_amount'
            },
            {
                data: 'created_at', name: 'created_at'
            },
            {
                "render": function () {
                                return 'kkkk';
                            }
            },
            {data: 'action', name: 'action', orderable: false, searchable: false},

        ],
        order: [[0, 'desc']],
    });

    function in_delivery_table() {
        in_delivery.ajax.reload(null, false);
    }
    //----------------------------------
    var deliverd = $('#deliverd_table').DataTable({
        processing: true,
        serverSide: true,
        // ajax: "{{ url('orders') }}",
        ajax: {
            "url": "{{ url('orders') }}",
            "type": "get",
            "data": function (data) {
                data.deliverd = 1
            },
        },
        columns: [{
                data: 'id', name: 'id'
            },
            {
                data: 'phone_number', name: 'phone_number'
            },
            {
                data: 'city', name: 'city'
            },
            {
                data: 'area', name: 'area'
            },
            {
                data: 'total_amount', name: 'total_amount'
            },
            {
                data: 'created_at', name: 'created_at'
            },
            {
                "render": function () {
                                return 'kkkk';
                            }
            },
            {data: 'action', name: 'action', orderable: false, searchable: false},

        ],
        order: [[0, 'desc']],
    });

    function deliverd_table() {
        deliverd.ajax.reload(null, false);
    }

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
