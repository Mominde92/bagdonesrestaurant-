{{-- Extends layout --}}
@extends('admin.layout.default')

{{-- Content --}}
@section('content')

<div class="card card-custom example example-compact">
    <div class="card-header">
        <h3 class="card-title">
            Add New Country
        </h3>
        <div class="card-toolbar">
            <div class="example-tools justify-content-center">
            <a href="{{ route('country.index') }}" class="btn btn-secondary">Go Back</a>
            </div>
        </div>
    </div>
    @if ($errors->any())
        <div class="alert alert-danger">
            <strong>Whoops!</strong> There were some problems with your input.<br><br>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <!--begin::Form-->
    <form action="{{ route('country.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="card-body">
            <div class="form-group row">
                <div class="col-lg-4">
                    <label>ISO<span class="text-danger">*</span></label>
                    <input type="text" name="iso" required class="form-control" value="{{old('iso')}}" placeholder="Enter ISO"/>
                    <span class="form-text text-muted">Please enter ISO, Max 2 character allowed</span>
                </div>
                <div class="col-lg-4">
                    <label>Name<span class="text-danger">*</span></label>
                    <input type="text" name="name" required class="form-control" value="{{old('name')}}" placeholder="Enter Name"/>
                    <span class="form-text text-muted">Please enter Name, Max 50 character allowed</span>
                </div>
                <div class="col-lg-4">
                    <label>Name_local</label>
                    <input type="text" name="name_local" class="form-control" value="{{old('name_local')}}" placeholder="Enter Local Name"/>
                    <span class="form-text text-muted">Please enter Local Name, Max 50 character allowed</span>
                </div>
            </div>
            <div class="form-group row">
                <div class="col-lg-4">
                    <label>Phone<span class="text-danger">*</span></label>
                    <input type="number" name="phone" required class="form-control" value="{{old('phone')}}" placeholder="Enter Phone"/>
                    <span class="form-text text-muted">Please enter Phone, Max 6 character allowed</span>
                </div>
            </div>
            <div class="form-group row">
                <div class="col-lg-4">
                    <label>Image<span class="text-danger">*</span></label>
                    <!-- <div class="image-input image-input-empty image-input-outline" id="kt_image_5" style="background-image: url(/media/users/blank.png)">
                        <div class="image-input-wrapper"></div> -->

                        <!-- <label class="btn btn-xs btn-icon btn-circle btn-white btn-hover-text-primary btn-shadow" data-action="change" data-toggle="tooltip" title="" data-original-title="Change avatar"> -->
                        <!-- <i class="fa fa-pen icon-sm text-muted"></i> -->
                        <input type="file" name="image" accept=".png, .jpg, .jpeg"/>
                        <!-- <input type="hidden" name="profile_avatar_remove"/> -->
                        <!-- </label> -->

                        <!-- <span class="btn btn-xs btn-icon btn-circle btn-white btn-hover-text-primary btn-shadow" data-action="cancel" data-toggle="tooltip" title="Cancel avatar">
                        <i class="ki ki-bold-close icon-xs text-muted"></i>
                        </span>

                        <span class="btn btn-xs btn-icon btn-circle btn-white btn-hover-text-primary btn-shadow" data-action="remove" data-toggle="tooltip" title="Remove avatar">
                        <i class="ki ki-bold-close icon-xs text-muted"></i>
                        </span> -->
                    </div>
                </div>
            </div>
        </div>
        <div class="card-footer">
            <div class="row">
                <div class="col-lg-4"></div>
                <div class="col-lg-8">
                    <button type="submit" class="btn btn-primary mr-2">Submit</button>
                    <button type="reset" class="btn btn-secondary">Cancel</button>
                </div>
            </div>
        </div>
    </form>
    <!--end::Form-->
</div>

@endsection

{{-- Scripts Section --}}
@section('scripts')
<script>
    var avatar5 = new KTImageInput('kt_image_5');

    avatar5.on('cancel', function(imageInput) {
        swal.fire({
            title: 'Image successfully changed !',
            type: 'success',
            buttonsStyling: false,
            confirmButtonText: 'Awesome!',
            confirmButtonClass: 'btn btn-primary font-weight-bold'
        });
    });

    avatar5.on('change', function(imageInput) {
        swal.fire({
            title: 'Image successfully changed !',
            type: 'success',
            buttonsStyling: false,
            confirmButtonText: 'Awesome!',
            confirmButtonClass: 'btn btn-primary font-weight-bold'
        });
    });

    avatar5.on('remove', function(imageInput) {
        swal.fire({
            title: 'Image successfully removed !',
            type: 'error',
            buttonsStyling: false,
            confirmButtonText: 'Got it!',
            confirmButtonClass: 'btn btn-primary font-weight-bold'
        });
    });
</script>
@endsection
