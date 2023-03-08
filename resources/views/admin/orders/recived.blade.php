{{-- Extends layout --}}
@extends('admin.layout.default')

{{-- Content --}}
@section('content')

<div class="card card-custom">
    <div class="card-header flex-wrap border-0 pt-6 pb-0">
        <div class="card-title">
            <h3 class="card-label">Orders
                <div class="text-muted pt-2 font-size-sm">All Orders Datatable</div>
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

        <div class="card-body pt-0">

            <!-- Tab Menu -->
            <nav class="user-tabs mb-4">
                <ul class="nav nav-tabs nav-tabs-bottom nav-justified">
                    <li class="nav-item">
                        <a class="nav-link active" onclick="new_orders_table()" href="#new_orders" data-toggle="tab">New
                            Orders</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" onclick="recived_table()" href="#recived_order" data-toggle="tab">
                            <span>Recived Orders</span>
                        </a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" onclick="in_process_table()" href="#in_process" data-toggle="tab"><span>In
                                Process</span></a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" onclick="in_delivery_table()" href="#in_delivery" data-toggle="tab"><span>In
                                Delevery</span></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" onclick="deliverd_table()" href="#deliverd"
                            data-toggle="tab"><span>Deliverd</span></a>
                    </li>

                </ul>
            </nav>
            <!-- /Tab Menu -->

            <!-- Tab Content -->
            <div class="tab-content pt-0">

                <!-- <input type="hidden" id="patient_id" value=""> -->
                <!-- Appointment Tab -->
                <div id="new_orders" class="tab-pane fade show active">
                    <div class="card card-table mb-0">
                        <div class="card-body">
                            <div class="table-responsive">
                                <table id="new_orders_table" class="table table-hover table-center mb-0">
                                    <thead>
                                        <tr>
                                            <th>Order Id </th>
                                            <th>Phone number</th>
                                            <th>City</th>
                                            <th>Area</th>
                                            <th>Total Amount</th>
                                            <th>Created At</th>
                                            <th>Status</th>
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
                <!-- /Appointment Tab -->
                <!-- orders Tab -->
                <div id="recived_order" class="tab-pane fade">
                    <div class="card card-table mb-0">
                        <div class="card-body">
                            <div class="table-responsive">
                                <table id="recived_table" class="table table-hover table-center mb-0">
                                    <thead>
                                        <tr>
                                            <th>Order Id </th>
                                            <th>Phone number</th>
                                            <th>City</th>
                                            <th>Area</th>
                                            <th>Total Amount</th>
                                            <th>Created At</th>
                                            <th>Status</th>
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
                <!-- /orders Tab -->
                <!-- patient lab requests Tab -->
                <div id="in_process" class="tab-pane fade">
                    <div class="card card-table mb-0">
                        <div class="card-body">
                            <div class="table-responsive">
                                <table id="in_process_table" class="table table-hover table-center mb-0">
                                    <thead>
                                        <tr>
                                            <th>Order Id </th>
                                            <th>Phone number</th>
                                            <th>City</th>
                                            <th>Area</th>
                                            <th>Total Amount</th>
                                            <th>Created At</th>
                                            <th>Status</th>
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
                <!-- /patient lab requests Tab -->

                <!-- Measurements Tab -->
                <div class="tab-pane fade" id="in_delivery">

                    <div class="card card-table mb-0">
                        <div class="card-body">
                            <div class="table-responsive">
                                <table id="in_delivery_table" style="width:100%"
                                    class="table table-hover table-center mb-0">
                                    <thead>
                                        <tr>
                                             <th>Order Id </th>
                                            <th>Phone number</th>
                                            <th>City</th>
                                            <th>Area</th>
                                            <th>Total Amount</th>
                                            <th>Created At</th>
                                            <th>Status</th>
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
                <!-- /Measurements Tab -->

                <!-- Prescription Tab -->
                <div class="tab-pane fade" id="deliverd">
                    <div class="card card-table mb-0">
                        <div class="card-body">
                            <div class="table-responsive">
                                <table id="deliverd_table" style="width:100%"
                                    class="table table-hover table-center mb-0">
                                    <thead>
                                        <tr>
                                             <th>Order Id </th>
                                            <th>Phone number</th>
                                            <th>City</th>
                                            <th>Area</th>
                                            <th>Total Amount</th>
                                            <th>Created At</th>
                                            <th>Status</th>
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
                <!-- /Prescription Tab -->




            </div>
            <!-- Tab Content -->
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

    var new_orders = $('#new_orders_table').DataTable({
        processing: true,
        serverSide: true,
        ajax: {
            "url": "{{ url('recived') }}",
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
    const interval = setInterval(function() {
            $('#new_orders_table').DataTable().ajax.reload();
        }, 5000);

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
