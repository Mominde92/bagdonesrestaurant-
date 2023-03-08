{{-- Extends layout --}}
@extends('admin.layout.default')

{{-- Content --}}
@section('content')

<div class="card card-custom">
    <div class="card-header flex-wrap border-0 pt-6 pb-0">
        <div class="card-title">
            <h3 class="card-label">
                <div class="text-muted pt-2 font-size-sm">Item Notification</div>
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

        <form action="{{route('senditemnotification')}}" method="POST" enctype="multipart/form-data" role="form">
            {{ csrf_field() }}

            <div class="form-group row">
                <label class="col-sm-4 col-form-label">Notification Type</label>
                <div class="col-sm-8">
                    <input type="text" name="notification_type" class="form-control" value="item" disabled  required >
                </div>
            </div>

            <div class="form-group row" id="item_select">
                <div class="col-lg-4">
                    <label> Item <span class="text-danger">*</span></label>
                    <div class=" col-lg-12 col-md-12 col-sm-12">
                        <select class="form-control kt-select2 select2" name="item">
                            <!-- <option value="">Select subCategory</option> -->
                            @foreach($Items as  $Item)
                    <option value="{{$Item->id}}">{{$Item->id}} </option>
                               @endforeach
                        </select>
                    </div>
                </div>

            </div>

            <div class="form-group row" id="item_select">
                <div class="col-lg-4">
                    <label> Item <span class="text-danger">*</span></label>
                    <div class=" col-lg-12 col-md-12 col-sm-12">
                        <select class="form-control kt-select2 select2" id="item_id" name="item_id">
                                @foreach($Items as $item)
                                    <option
                                        value="{{ $item['id'] }}">{{ $item['name'] }}
                                    </option>
                                @endforeach
                        </select>
                    </div>
                </div>
            </div>

            <button type="submit" class="btn btn-primary ">Send</button>
            <button type="reset" class="btn btn-primary ">Rest</button>
        </form>
    </div>

</div>

@endsection


{{-- Scripts Section --}}
@section('scripts')
    @if($message = Session::get('success'))
        <script>
            var message =  "{!! $message !!}" ;
            Swal.fire(
                'Good job!',
                message,
                'success'
            )
        </script>
    @endif
@endsection
