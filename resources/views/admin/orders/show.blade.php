{{-- Extends layout --}}
@extends('admin.layout.default')

{{-- Content --}}
@section('content')


    <div class="ec-content-wrapper">
        <div class="content">
            <div class="breadcrumb-wrapper breadcrumb-wrapper-2">
                <h1>Order Detail</h1>
                <p class="breadcrumbs"><span><a href="#">Home</a></span>
                    <span><i class="mdi mdi-chevron-right"></i></span>Orders
                </p>
            </div>
            <div class="col-lg-12 text-center">
                <button id="recived" type="button" class="btn btn-primary"
                    {{ $order->recived == 0 ? '' : 'disabled' }}>
                    Recieved </button>
                <button id="in_process" type="button" class="btn btn-warning"
                    {{ $order->recived == 1 && $order->in_process == 0 ? '' : 'disabled' }}>
                    In Process </button>
                <button id="in_delivery" type="button" class="btn btn-warning"
                    {{ $order->recived == 1 && $order->in_process == 1 && $order->in_delivery == 0 ? '' : 'disabled' }}>
                    In Delivery </button>
                <button id="deliverd" type="button" class="btn btn-success"
                    {{ $order->recived == 1 && $order->in_process == 1 && $order->in_delivery == 1 && $order->deliverd == 0 ? '' : 'disabled' }}>
                    Deliverd </button>
            </div>
            <div class="row">
                <div class="col-12">
                    <div class="ec-odr-dtl card card-default">
                        <div class="card-header card-header-border-bottom d-flex justify-content-between">
                            <h2 class="ec-odr"><br>
                                <span class="small">Order ID:  {{$order->id}}</span>
                            </h2>
                            <div class="form-group row">

                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-xl-3 col-lg-6">
                                    <address class="info-grid">
                                        <div class="info-title"><strong>Customer:</strong></div><br>
{{--                                        <div class="info-content">--}}
{{--                                            Twitter, Inc.<br>--}}
{{--                                            795 Folsom Ave, Suite 600<br>--}}
{{--                                            San Francisco, CA 94107<br>--}}
{{--                                            <abbr title="Phone">P:</abbr> (123) 456-7890--}}
{{--                                        </div>--}}
                                    </address>
                                </div>
                                <div class="col-xl-3 col-lg-6">
                                    <address class="info-grid">
                                        <div class="info-title"><strong>Shipped To:</strong></div><br>
{{--                                        <div class="info-content">--}}
{{--                                            Elaine Hernandez<br>--}}
{{--                                            P. Sherman 42,<br>--}}
{{--                                            Wallaby Way, Sidney<br>--}}
{{--                                            <abbr title="Phone">P:</abbr> (123) 345-6789--}}
{{--                                        </div>--}}
                                    </address>
                                </div>
                                <div class="col-xl-3 col-lg-6">
                                    <address class="info-grid">
                                        <div class="info-title"><strong>Payment Method:</strong></div><br>
{{--                                        <div class="info-content">--}}
{{--                                            Visa ending **** 1234<br>--}}
{{--                                            h.elaine@gmail.com<br>--}}
{{--                                        </div>--}}
                                    </address>
                                </div>
                                <div class="col-xl-3 col-lg-6">
                                    <address class="info-grid">
                                        <div class="info-title"><strong>Order Date:</strong></div><br>
                                        <div class="info-content">
                                          {{$order->created_at}}
                                        </div>
                                    </address>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <h3 class="tbl-title">PRODUCT SUMMARY</h3>
                                    <div class="table-responsive">
                                        <table class="table table-striped o-tbl">
                                            <thead>
                                            <tr class="line">
                                                <td><strong>#</strong></td>
                                                <td class="text-center"><strong>IMAGE</strong></td>
                                                <td class="text-center"><strong>PRODUCT</strong></td>
                                                <td class="text-center"><strong>PRICE/UNIT</strong></td>
                                                <td class="text-right"><strong>QUANTITY</strong></td>
                                                <td class="text-right"><strong>SUBTOTAL</strong></td>
                                            </tr>
                                            </thead>
                                            <tbody>
                                           <p style="display: none"> {{$sum = 0  }} </p>
                                            @foreach($order->items as $item)
                                              <tr>
                                                <td>
                                                {{$item->id}}
                                                </td>
                                                <td><img class="product-img" src="{{asset('uploads/items/'. $item->main_screen_image)}}" alt=""></td>
                                                <td><strong>{{$item->name}}</strong></td>
                                                <td class="text-center"><strong>{{$item->pivot->unit_price}}</td>
                                                <td class="text-center"><strong>{{$item->pivot->quantity}}</td>
                                                <td class="text-right"><strong>{{$item->pivot->unit_price * $item->pivot->quantity}}</td>
                                            </tr>
                                              <p style="display: none"> {{$sum += $item->pivot->unit_price * $item->pivot->quantity}} </p>
                                            @endforeach
                                            <tr>
                                                <td colspan="4"></td>
                                                <td class="text-right"><strong>Taxes</strong></td>
                                                <td class="text-right"><strong>5 AED</strong></td>
                                            </tr>

                                            <tr>
                                                <td colspan="4">
                                                </td>
                                                <td class="text-right"><strong>Total</strong></td>
                                                <td class="text-right"><strong>{{$sum + 5}}</strong></td>
                                            </tr>

                                            <tr>
                                                <td colspan="4">
                                                </td>
                                                <td class="text-right"><strong>Payment Status</strong></td>
                                                <td class="text-right"><strong>PAID</strong></td>
                                            </tr>

                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Tracking Detail -->
                    <div class="card mt-4 trk-order">
                        <div class="p-4 text-center text-white text-lg bg-dark rounded-top">
                            <span class="text-uppercase">Tracking Order No - </span>
                            <span class="text-medium">34VB5540K83</span>
                        </div>
                        <div class="d-flex flex-wrap flex-sm-nowrap justify-content-between py-3 px-2 bg-secondary">
                            <div class="w-100 text-center py-1 px-2"><span class="text-medium">Shipped
											Via:</span> UPS Ground</div>
                            <div class="w-100 text-center py-1 px-2"><span class="text-medium">Status:</span>
                                Checking Quality</div>
                            <div class="w-100 text-center py-1 px-2"><span class="text-medium">Expected
											Date:</span> DEC 09, 2021</div>
                        </div>
                        <div class="card-body">
                            <div class="steps d-flex flex-wrap flex-sm-nowrap justify-content-between padding-top-2x padding-bottom-1x">
                                <div class="step completed">
                                    <div class="step-icon-wrap">
                                        <div class="step-icon"><i class="mdi mdi-cart"></i></div>
                                    </div>
                                    <h4 class="step-title">Confirmed Order</h4>
                                </div>
                                <div class="step completed">
                                    <div class="step-icon-wrap">
                                        <div class="step-icon"><i class="mdi mdi-tumblr-reblog"></i></div>
                                    </div>
                                    <h4 class="step-title">Processing Order</h4>
                                </div>
                                <div class="step completed">
                                    <div class="step-icon-wrap">
                                        <div class="step-icon"><i class="mdi mdi-gift"></i></div>
                                    </div>
                                    <h4 class="step-title">Product Dispatched</h4>
                                </div>
                                <div class="step">
                                    <div class="step-icon-wrap">
                                        <div class="step-icon"><i class="mdi mdi-truck-delivery"></i></div>
                                    </div>
                                    <h4 class="step-title">On Delivery</h4>
                                </div>
                                <div class="step">
                                    <div class="step-icon-wrap">
                                        <div class="step-icon"><i class="mdi mdi-hail"></i></div>
                                    </div>
                                    <h4 class="step-title">Product Delivered</h4>
                                </div>
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
<script>
    var order = {!! $order->toJson() !!};

    $("#recived").on("click", function () {

        $.ajax({
            type: "POST",
            url: "{{ url('orders/change_status') }}",
            data: {
                'id': order.id,
                'status': 'recived',
                'value': '1',
                '_token': '{{ csrf_token() }}',
            },
            dataType: 'json',
            success: function (res) {
                location.reload();
            }
        });

    });
    $("#in_process").on("click", function () {

        $.ajax({
            type: "POST",
            url: "{{ url('orders/change_status') }}",
            data: {
                'id': order.id,
                'status': 'in_process',
                'value': '1',
                '_token': '{{ csrf_token() }}',
            },
            dataType: 'json',
            success: function (res) {
                location.reload();
            }
        });
    });
    $("#in_delivery").on("click", function () {
        $.ajax({
            type: "POST",
            url: "{{ url('orders/change_status') }}",
            data: {
                'id': order.id,
                'status': 'in_delivery',
                'value': '1',
                '_token': '{{ csrf_token() }}',
            },
            dataType: 'json',
            success: function (res) {
                location.reload();
            }
        });
    });
    $("#deliverd").on("click", function () {
        $.ajax({
            type: "POST",
            url: "{{ url('orders/change_status') }}",
            data: {
                'id': order.id,
                'status': 'deliverd',
                'value': '1',
                '_token': '{{ csrf_token() }}',
            },
            dataType: 'json',
            success: function (res) {
                location.reload();
            }
        });
    });

</script>
@endsection
