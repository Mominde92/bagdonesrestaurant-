{{-- Extends layout --}}
@extends('admin.layout.default')

{{-- Content --}}
@section('content')

        <!-- Modal -->
        <div class="modal fade" id="Result" role="dialog">
            <div class="modal-dialog">
            
            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <h3 class="modal-title text-danger ">Something Error</h3></h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                
                </div>
                <div class="modal-body">
                <h4 id="result" class="text-center"></h4>
                </div>
                <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                </div>
            </div>
            
            </div>
        </div>

    <div class="content">
        <div class="breadcrumb-wrapper d-flex align-items-center justify-content-between">
            <div>
                <h1>Items</h1>
                <p class="breadcrumbs"><span><a href="{{route('dashboard')}}">Home</a></span>
                    <span><i class="mdi mdi-chevron-right"></i></span>Items</p>
            </div>
            <div>
                <a href="{{ url('items/create' ) }}" class="btn btn-primary"> Add Items</a>
            </div>
        </div>

        <div class="card-body">

            @if ($message = Session::get('success'))
            <div id="alert" style=" font-size: 16px; " class="alert alert-success alert-notice alert-light-success fade show" role="alert">
                <div class="alert-text">{{ $message }}</div>
                <div class="alert-close">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true"><i class="ki ki-close"></i></span>
                    </button>
                </div>
            </div>
            @endif
            @if(Session::get('alert'))
        <p>  dsadasewqewqewqewq </p>
            @endif

            
            @if ($message = Session::get('success'))
            <div id="alert" style=" font-size: 16px; " class="alert alert-success alert-notice alert-light-success fade show" role="alert">
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
                    <th>Products</th>
                    <th>Name</th>
                    <th>Price</th>
                    <th>Offer</th>
                    <!-- <th>Purchased</th> -->
                    <th>Stock</th>
                    <!-- <th>Status</th> -->
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
                </div>
        </div> <!-- End Content -->
    </div>



    </div>

@endsection

{{-- Scripts Section --}}
@section('scripts')
<link href="https://cdn.jsdelivr.net/npm/sweetalert2@11.7.1/dist/sweetalert2.min.css" rel="stylesheet">

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.7.1/dist/sweetalert2.all.min.js"></script>

<script>
   
</script>


    {{-- page scripts --}}
    <script type="text/javascript">
        
  

        var url = "{{asset('/items/edit/')}}/";
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
                ajax: "{{ url('items') }}",
                "order": [[ 0, "DESC" ]],
                columns: [
                    {
                        "data": "main_screen_image",
                        "render": function (data) {
                                if(data )
                                {
                                    return '<img src=" {{asset("uploads/items")}}/' + data + '" class="avatar" width="50" height="50"/>';
                                }
                                else
                                {
                                    return data;
                                }
                            }
                    },
                    {data: 'name', name: 'name',
                        fnCreatedCell: function (nTd, sData, oData, iRow, iCol) {
                       $(nTd).html("<a href="+url+oData.id+">"+oData.name+"</a>");
                        }
                    },
                    {
                        "data": "new_price",
                        "render": function (data) {
                            if(data != '' )
                            {
                                return data;
                            }
                            else
                            {
                                return data;
                            }
                        }
                    },
                    {
                        data: function (data) {
                            if(data.price != null)
                            {
                                return 100 - data.new_price / data.price * 100 + '% OFF' ;
                            }
                            else
                            {
                                return 0 + '% OFF';
                            }

                        },
                        name: 'Offer'

                    },

                    // {data: 'in_stock', name: 'Purchased'},


                    {
                        "data": "in_stock",
                        "render": function (data) {
                                if(data === 1){
                                        return 'Yes';
                             }else {
                                return 'No'
                             }
                            }
                    } ,


                    // {data: 'in_stock', name: 'Status'},

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
                        url: "{{ url('items/delete') }}",
                        data:{
                            'id': id,
                            '_token': '{{ csrf_token() }}',
                        },
                        dataType: 'json',
                        success: function(res)
                        {
                            if(res[1] == 1)
                            {
                                Swal.fire({
                            icon: 'error',
                            title: 'Oops...',
                            text: res[2]
                             })
                            }
                            

                            $('#datatable').DataTable().ajax.reload();
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
