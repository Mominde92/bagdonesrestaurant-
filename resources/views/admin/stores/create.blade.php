{{-- Extends layout --}}
@extends('admin.layout.default')

{{-- Content --}}
@section('content')

    <div class="ec-content-wrapper">
        <div class="content">
            <div class="breadcrumb-wrapper d-flex align-items-center justify-content-between">
                <div>
                    <h1>Add New Store</h1>
                    <p class="breadcrumbs"><span><a href="#">Home</a></span>
                        <span><i class="mdi mdi-chevron-right"></i></span>Store</p>
                </div>
                <div>
                    <a href="{{url('store')}}" class="btn btn-primary"> View All
                    </a>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <div class="card card-default">
                        <div class="card-header card-header-border-bottom">
                            <h2>Add Store</h2>
                        </div>
    @if($errors->any())
        <div class="alert alert-danger">
            <strong>Whoops!</strong> There were some problems with your input.<br><br>
            <ul>
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <!--begin::Form-->
    <form action="{{ url('store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="card-body">
            <div class="row ec-vendor-uploads">
                <div class="col-lg-4">
                    <div class="ec-vendor-img-upload">
                        <div class="ec-vendor-main-img">
                            <div class="avatar-upload">
                                <p> Image </p>
                                <div class="avatar-edit">
                                    <input type="file" id="image" name="image" class="ec-image-upload" accept=".png, .jpg, .jpeg" multiple>
                                    <label for="imageUpload"><img src="{{asset('admin/assets/img/icons/edit.svg')}}" class="svg_img header_svg" alt="edit"></label>
                                </div>
                                <div class="avatar-preview ec-preview">
                                    <div class="imagePreview ec-div-preview">
                                        <img class="ec-image-preview" src="{{asset('admin/assets/img/products/vender-upload-preview.jpg')}}" alt="edit">
                                    </div>
                                </div>
                            </div>
                            <p> Cover Image </p>
                            <div class="thumb-upload-set colo-md-12">
                                <div class="thumb-upload">
                                    <div class="thumb-edit">
                                        <input type="file" id="cover_image" name="cover_image" class="ec-image-upload" accept=".png, .jpg, .jpeg">
                                        <label for="imageUpload"><img src="{{asset('admin/assets/img/icons/edit.svg')}}" class="svg_img header_svg" alt="edit"></label>
                                    </div>
                                    <div class="thumb-preview ec-preview">
                                        <div class="image-thumb-preview">
                                            <img class="image-thumb-preview ec-image-preview" src="{{asset('admin/assets/img/products/vender-upload-preview.jpg')}}" alt="edit">
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>

                <div class="col-lg-8">
                    <div class="ec-vendor-upload-detail row">

                        <div class="col-md-6">
                            <label for="name" class="form-label">Name</label>
                            <input type="text" class="form-control" name="name" value="{{old('name')}}"  id="name" placeholder="Enter Store Name" required>
                        </div>

                        <div class="col-md-6">
                            <label for="name_locale" class="form-label">Name local</label>
                            <input type="text" class="form-control" name="name_locale" value="{{old('name_locale')}}" placeholder="Enter Store Locale Name">
                        </div>

                        <div class="col-md-6">
                            <label>Slogan<span class="text-danger">*</span></label>
                            <input type="text" name="slogan" required class="form-control" value="{{old('slogan')}}" placeholder="Enter Store Slogan" />
                        </div>
                        <div class="col-md-6">
                            <label>Slogan locale<span class="text-danger">*</span></label>
                            <input type="text" name="slogan_locale" value="{{old('slogan_locale')}}"  class="form-control"
                                   placeholder="Enter Store Slogan Locale" />
                        </div>

                        <div class="col-md-6">
                            <label>Store Location Address<span class="text-danger">*</span></label>
                            <input type="text" name="location_text" value="{{old('location_text')}}" required class="form-control"
                                   placeholder="Enter Store Location Adress" />
                        </div>

                        <div class="col-md-6">
                            <label>Store Location Address locale<span class="text-danger">*</span></label>
                            <input type="text" name="location_text_locale" value="{{old('location_text_locale')}}" class="form-control"
                                   placeholder="Enter Store Location Adress Locale" />
                        </div>

                        <div class="col-md-6">
                            <label>Attributes<span class="text-danger">*</span></label>
                            <div class=" col-lg-12 col-md-12 col-sm-12">
                                <label>Store Phone Number<span class="text-danger">*</span></label>
                                <input type="text" name="phone_number" value="{{old('phone_number')}}" required class="form-control"
                                       placeholder="Enter Store Phone Number" />
                            </div>
                        </div>

                        <div class="col-md-6">
                        </div>

                        <div class="col-md-6">
                            <label>Delivery Areas<span class="text-danger">*</span></label>
                        </div>

                        <div class="col-md-6">
                            <label>Delivery Time Range<span class="text-danger">*</span></label>
                            <input type="text" name="delivery_time_range" value="{{old('delivery_time_range')}}" required class="form-control"
                                   placeholder="Enter delivery_time_range" />
                        </div>
                        <div class="col-md-6">
                            <label>Google Map Link<span class="text-danger">*</span></label>
                            <input type="text" name="google_map_link" required class="form-control"
                                   placeholder="Enter Google Map Link" />
                            <span class="form-text text-muted">Please enter google map link </span>
                        </div>
                        <div class="col-md-6">
                            <label class="col-3 col-form-label">Is Open<span class="text-danger">*</span></label>
                            <div class="col-3">
                    <span class="switch">
                        <label>
                            <input type="checkbox" checked="checked" name="is_open" />
                            <span></span>
                        </label>
                    </span>
                            </div>
                        </div>

                        <div class="col-md-12">
                            <label class="col-3 col-form-label">Allow Add Hot Price<span class="text-danger">*</span></label>
                            <div class="col-3">
                    <span class="switch">
                        <label>
                            <input type="checkbox" checked="checked" name="allow_add_hot_price" />
                            <span></span>
                        </label>
                    </span>
                            </div>
                        </div>
        <div class="card-footer">
            <div class="row">
                <div class="col-lg-4"></div>
                <div class="col-lg-8">
                    <button type="submit" class="btn btn-primary mr-2">Submit</button>
                </div>
            </div>
        </div>
    </form>

</div>
@endsection

{{-- Scripts Section --}}
@section('scripts')
<script>
    $('#subcategory_select').hide();
    $('#country_select').select2({
        placeholder: "Select country",
        allowClear: true
    });
    $('#city_select').select2({
        placeholder: "Select city ",
        allowClear: true
    });
    $('#areas').select2({
        placeholder: "Select area",
        allowClear: true
    });

    //Image
    var avatar5 = new KTImageInput('kt_image_5');

    avatar5.on('cancel', function (imageInput) {
        swal.fire({
            title: 'Image successfully changed !',
            type: 'success',
            buttonsStyling: false,
            confirmButtonText: 'Awesome!',
            confirmButtonClass: 'btn btn-primary font-weight-bold'
        });
    });

    avatar5.on('change', function (imageInput) {
        swal.fire({
            title: 'Image successfully changed !',
            type: 'success',
            buttonsStyling: false,
            confirmButtonText: 'Awesome!',
            confirmButtonClass: 'btn btn-primary font-weight-bold'
        });
    });

    avatar5.on('remove', function (imageInput) {
        swal.fire({
            title: 'Image successfully removed !',
            type: 'error',
            buttonsStyling: false,
            confirmButtonText: 'Got it!',
            confirmButtonClass: 'btn btn-primary font-weight-bold'
        });
    });

    //cover image
    var avatar4 = new KTImageInput('kt_image_4');

    avatar4.on('cancel', function (imageInput) {
        swal.fire({
            title: 'Image successfully changed !',
            type: 'success',
            buttonsStyling: false,
            confirmButtonText: 'Awesome!',
            confirmButtonClass: 'btn btn-primary font-weight-bold'
        });
    });

    avatar4.on('change', function (imageInput) {
        swal.fire({
            title: 'Image successfully changed !',
            type: 'success',
            buttonsStyling: false,
            confirmButtonText: 'Awesome!',
            confirmButtonClass: 'btn btn-primary font-weight-bold'
        });
    });

    avatar4.on('remove', function (imageInput) {
        swal.fire({
            title: 'Image successfully removed !',
            type: 'error',
            buttonsStyling: false,
            confirmButtonText: 'Got it!',
            confirmButtonClass: 'btn btn-primary font-weight-bold'
        });
    });



    //get cities

    $('#country_select').change(function () {
        // alert($('#country_select').val());
        var country_id=  $('#country_select').val();

        $( "#city_select" ).select2({
        ajax: {
            url: "{{url('api/country/cities')}}",
          type: "post",
          dataType: 'json',
          delay: 250,
          data: function (params) {
            return {
              '_token': '{{ csrf_token() }}',
              'search' : params.term, // search term
              'country_id':country_id
            };
          },
          processResults: function (response) {
            return {
              results: response
            };
          },
          cache: true
        }

      });

    });

    $('#city_select').change(function () {
        var city_id=  $('#city_select').val();
        // alert(city_id);
        $( "#areas" ).select2({
        ajax: {
          url: "{{url('api/city/areas')}}",
          type: "post",
          dataType: 'json',
          delay: 250,
          data: function (params) {
            return {
              '_token': '{{ csrf_token() }}',
              'search' : params.term, // search term
              'city_id':city_id
            };
          },
          processResults: function (response) {
            return {
              results: response
            };
          },
          cache: true
        }

      });
    });

    //get areas

</script>
@endsection
