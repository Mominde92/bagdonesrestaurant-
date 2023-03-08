<div class="btn-group mb-1">
    <a href="{{ url('orders',$id) }}"> <button type="button" class="btn btn-outline-success">Info</button> </a>

</div>

<!-- <div class="btn-group mb-1">
    <button type="button" class="btn btn-outline-success dropdown-toggle dropdown-toggle-split" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" data-display="static">
        <span class="sr-only">Info</span>
    </button>

    <div class="dropdown-menu" style="">

        <a class="dropdown-item" id="recived" href="#">Recived</a>
        <a class="dropdown-item" id="in_process" href="#" >In process</a>
        <a class="dropdown-item" id="in_delivery" href="#">In Delivery</a>
        <a class="dropdown-item" id="deliverd" href="#">Deliverd</a>
    </div>
</div> -->


{{-- Scripts Section --}}
@section('scripts')
    <script>
        var order = {{ $id }};

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
