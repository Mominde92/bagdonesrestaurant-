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



        <form action="{{route('sendNotification')}}" method="POST" enctype="multipart/form-data" role="form">
            {{ csrf_field() }}

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
                    <input type="text" name="notification_type" value="normal" class="form-control" disabled >
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

