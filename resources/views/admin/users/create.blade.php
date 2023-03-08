{{-- Extends layout --}}
@extends('layout.default')

{{-- Content --}}
@section('content')

<style>
    .dropzone.dropzone-default .dz-remove {
        color: #394277;
        font-size: 10px;
        font-weight: 500;
        transition: color 0.15s ease, background-color 0.15s ease, border-color 0.15s ease, box-shadow 0.15s ease;
    }

</style>
<div class="card card-custom example example-compact">
    <div class="card-header">
        <h3 class="card-title">
            Add New User
        </h3>
        <div class="card-toolbar">
            <div class="example-tools justify-content-center">
                <a href="{{ url('items') }}" class="btn btn-secondary">Go Back</a>
            </div>
        </div>
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
    <form action="{{ url('Users') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="card-body">
            <div class="form-group row">
                <div class="col-lg-4">
                    <label>Full Name<span class="text-danger">*</span></label>
                    <input type="text" name="full_name" required class="form-control" placeholder="Enter Item Name" />
                    <span class="form-text text-muted">Please enter item Name</span>
                </div>

                <div class="col-lg-4">
                    <label>Email<span class="text-danger">*</span></label>
                    <input type="text" name="email" class="form-control" placeholder="Enter email" />
                    <span class="form-text text-muted">Please enter Email</span>
                </div>
            </div>

            <div class="col-lg-4">
                    <label>Email<span class="text-danger">*</span></label>
                    <input type="text" name="email" class="form-control" placeholder="Enter email" />
                    <span class="form-text text-muted">Please enter Email</span>
                </div>
            </div>


            <div class="form-group row">

                <div class="col-lg-12">
                    <label>Language<span class="text-danger">*</span></label>
                    <div class=" col-lg-12 col-md-12 col-sm-12">
                        <select class="form-control kt-select2 select2" id="login_type" name="login_type" required>
                        <option value="Google">Google</option>
                        <option value="Facebook">Facebook</option>
                    </div>
                </div>
               </div>

    
            <div class="form-group row">

                <div class="col-lg-12">
                    <label>Language<span class="text-danger">*</span></label>
                    <div class=" col-lg-12 col-md-12 col-sm-12">
                        <select class="form-control kt-select2 select2" id="language_id" name="language_id" required>
                            @foreach($languages as $language)
                                <option value="{{  $language->id }}">
                                    {{ $language->name }}</option>
                            @endforeach
                        </select>
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

</div>
@endsection

{{-- Scripts Section --}}
@section('scripts')
{{-- vendors --}}
<!-- <script src="{{ asset('plugins/custom/datatables/datatables.bundle.js') }}" type="text/javascript"></script> -->
<!-- <script src="https://unpkg.com/dropzone@5/dist/min/dropzone.min.js"></script> -->
<!-- <link rel="stylesheet" href="https://unpkg.com/dropzone@5/dist/min/dropzone.min.css" type="text/css" /> -->

{{-- page scripts --}}
<script type="text/javascript">
    // $(document).ready(function () {
 
    $('#language_id').select2({
        placeholder: "Select Category",
        allowClear: true
    });
    $('#sub_category_select').select2({
        placeholder: "Select Sub Category ",
        allowClear: true
    });
    $('#store_select').select2({
        placeholder: "Select Store",
        allowClear: true
    });
    $('#attributes_select').select2({
        placeholder: "Select Attributes",
        allowClear: true
    });
    $('#compulsory_choices_select').select2({
        placeholder: "Select Compulsory Choices",
        allowClear: true
    });
    $('#multipule_choices_select').select2({
        placeholder: "Select Multipule Choices",
        allowClear: true
    });

    // Dropzone.autoDiscover = false;
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



    Dropzone.autoDiscover = false;

    $(document).ready(function () {

        $('#sssssss').dropzone({
            url: 'post.php',
            method: 'post'
        });

    });
    //Dropzone Configuration
    // Dropzone.autoDiscover = false;

    // $('#sssssss').dropzone({
    //     maxFilesize: 10,
    //     maxFiles: 10,
    //     addRemoveLinks: true,
    //     uploadMultiple: true,
    //     acceptedFiles: "image/*",
    // })

    // $('#item_images').dropzone({
    //     url: "", // Set the url for your upload script location
    //     paramName: "file", // The name that will be used to transfer the file
    // maxFilesize: 10,
    // maxFiles: 10,
    // addRemoveLinks: true,
    //     autoProcessQueue: false,
    //     //    autoDiscover = false,
    //     uploadMultiple: true,
    //     acceptedFiles: "image/*",
    //     accept: function (file, done) {
    //         if (file.name == "wow.jpg") {
    //             done("Naha, you don't.");
    //         } else {
    //             done();
    //         }
    //     }
    // });
    $( "#category_select" ).select2({
        ajax: {
          url: "/api/category/dataAjax",
          type: "post",
          dataType: 'json',
          delay: 250,
          data: function (params) {
            return {
                '_token': '{{ csrf_token() }}',
              'search' : params.term // search term
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

    $('#category_select').change(function () {
        // alert($('#country_select').val());
        var category_id = $('#category_select').val();
        $('#sub_category_select').empty();
        $("#sub_category_select").select2({
            ajax: {
                url: "{{ url('api/subcategory/dataAjax') }}",
                type: "get",
                dataType: 'json',
                delay: 250,
                data: function (params) {
                    return {
                        '_token': '{{ csrf_token() }}',
                        'search': params.term, // search term
                        'parent_id': category_id
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
    // });

</script>
@endsection
