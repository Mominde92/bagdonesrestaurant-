
<?php
// print_r('<pre>');
// print_r($item->subCategory);exit;
?>
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
            Edit item - {{$item->name}} details
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
    <form action="{{ url('items/update' , $item) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="card-body">
            <div class="form-group row">
                <div class="col-lg-4">
                    <label>Name<span class="text-danger">*</span></label>
                    <input type="text" name="name" required class="form-control" placeholder="Enter Item Name" value="{{$item->name}}" />
                    <span class="form-text text-muted">Please enter item Name</span>
                </div>

                <div class="col-lg-4">
                    <label>Name locale<span class="text-danger">*</span></label>
                    <input type="text" name="name_locale" class="form-control" placeholder="Enter Item Locale Name" value="{{$item->name_locale}}" />
                    <span class="form-text text-muted">Please enter item Locale Name</span>
                </div>
            </div>
            <div class="form-group row">
                <div class="col-lg-4">
                    <label>Description<span class="text-danger">*</span></label>
                    <textarea  cols="30" rows="10" name="description" required class="form-control"
                        placeholder="Enter Item Description">{{$item->description}}</textarea>
                  
                    <span class="form-text text-muted">Please enter Description</span>
                </div>

                <div class="col-lg-4">
                    <label>Description locale<span class="text-danger">*</span></label>
                    <textarea  cols="30" rows="10" name="description_locale" required class="form-control"
                        placeholder="Enter Item Description Locale">{{$item->description_locale}}</textarea>
                    
                    <span class="form-text text-muted">Please enter description Locale </span>
                </div>
            </div>
            <div class="form-group row">
                <div class="col-lg-4">
                    <label>Price<span class="text-danger">*</span></label>
                    <input type="number" step=0.01 name="price"  class="form-control"
                        placeholder="Enter Itme Price" value="{{$item->price}}" />
                    <span class="form-text text-muted">Please enter item price </span>
                </div>
                <div class="col-lg-4">
                    <label>New Price<span class="text-danger">*</span></label>
                    <input type="number" step=0.01 name="new_price" required class="form-control"
                        placeholder="Enter Itme New Price" value="{{$item->new_price}}" />
                    <span class="form-text text-muted">Please enter item new price </span>
                </div>
          

            </div>


            <div class="form-group row">
                <!-- <div class="col-lg-12 my-2">
                    <label>Category<span class="text-danger">*</span></label>

                </div> -->
                <div class="col-lg-12">
                    <label>Category <span class="text-danger">*</span></label>
                    <div class=" col-lg-12 col-md-12 col-sm-12">
                        <select class="form-control kt-select2 select2" id="category_select" name="category_id">
                        <option value="{{$item->subCategory->parent_id}}">{{$item->subCategory->get_parent->name}}</option>
                        </select>
                    </div>
                </div>
                <div class="col-lg-12">
                    <label>Sub Category <span class="text-danger">*</span></label>
                    <div class=" col-lg-12 col-md-12 col-sm-12">
                        <select class="form-control kt-select2 select2" id="sub_category_select" name="sub_category_id" required>
                        <option value="{{$item->sub_category_id}}">{{$item->subCategory['name']}}</option>
                        </select>
                    </div>
                </div>

            </div>
            <div class="form-group row">

                <div class="col-lg-12">
                    <label>Store<span class="text-danger">*</span></label>
                    <div class=" col-lg-12 col-md-12 col-sm-12">
                        <select class="form-control kt-select2 select2" id="store_select" name="store_id" required>
                            @foreach($stores as $store)
                                <option value="{{ $store['id'] }}" <?= $item->store_id == $store['id'] ? 'selected="selected"' :'' ?> >
                                    {{ $store['name'] }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>


            </div>
            <div class="form-group row">

                <div class="col-lg-12">
                    <label>Attributes<span class="text-danger">*</span></label>
                    <div class=" col-lg-12 col-md-12 col-sm-12">
                        <select class="form-control kt-select2 select2" id="attributes_select" name="attributes[]"
                            multiple="multiple">
                            @foreach($attributes as $attribute)
                                <option value="{{ $attribute['id'] }}" @if($item->itemAttributes->containsStrict('id', $attribute['id'])) selected="selected" @endif >
                                    {{ $attribute['name'] }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>


            </div>
            <div class="form-group row">

                <div class="col-lg-12">
                    <label>Compulsory Choices<span class="text-danger">*</span></label>
                    <div class="col-lg-12 col-md-12 col-sm-12">
                        <select class="form-control kt-select2 select2" id="compulsory_choices_select" name="compulsory_choices[]"
                            multiple="multiple">
                            @foreach($compulsory_choices as $compulsory_choice)
                                <option value="{{ $compulsory_choice['id'] }}" @if($item->compulsoryChoices->containsStrict('id', $compulsory_choice['id'])) selected="selected" @endif>
                                    {{ $compulsory_choice['name'] }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>


            </div>
            <div class="form-group row">

                <div class="col-lg-12">
                    <label>Multipule Choices<span class="text-danger">*</span></label>
                    <div class=" col-lg-12 col-md-12 col-sm-12">
                        <select class="form-control kt-select2 select2" id="multipule_choices_select" name="multipule_choices[]">
                            
                            @foreach($multipule_choices as $multipule_choice)
                                <option value="{{ $multipule_choice['id'] }}" @if($item->multipleChoices->containsStrict('id', $multipule_choice['id'])) selected="selected" @endif>
                                    {{ $multipule_choice['name'] }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>


            </div>


            <div class="form-group row">
                <label class="col-3 col-form-label">In stock<span class="text-danger">*</span></label>
                <div class="col-3">
                    <span class="switch">
                        <label>
                            <input type="checkbox" name="in_stock" <?=$item->in_stock ==1 ?'checked="checked"' :'' ?> />
                            <span></span>
                        </label>
                    </span>
                </div>
            </div>
            <!-- <div class="form-group row">
                <label class="col-3 col-form-label">On Sale<span class="text-danger">*</span></label>
                <div class="col-3">
                    <span class="switch">
                        <label>
                            <input type="checkbox"  name="on_sale" />
                            <span></span>
                        </label>
                    </span>
                </div>
            </div> -->

            <br>
            <br>
            <div class="form-group row">
                <div class="col-lg-4">
                    <label>Image to show in main screen<span class="text-danger">*</span></label>
                    <div class="image-input image-input-empty image-input-outline" id="kt_image_5"
                        style="background-image: url({{$item->main_screen_image != null ?' /uploads/items/'.$item->main_screen_image : '/media/users/blank.png' }})">
                        <div class="image-input-wrapper"></div>

                        <label class="btn btn-xs btn-icon btn-circle btn-white btn-hover-text-primary btn-shadow"
                            data-action="change" data-toggle="tooltip" title="" data-original-title="Change avatar">
                            <i class="fa fa-pen icon-sm text-muted"></i>
                            <input type="file" name="main_screen_image[]" accept=".png, .jpg, .jpeg" multiple/>
                            <input type="hidden" name="profile_avatar_remove" />
                        </label>

                        <span class="btn btn-xs btn-icon btn-circle btn-white btn-hover-text-primary btn-shadow"
                            data-action="cancel" data-toggle="tooltip" title="Cancel avatar">
                            <i class="ki ki-bold-close icon-xs text-muted"></i>
                        </span>

                        <span class="btn btn-xs btn-icon btn-circle btn-white btn-hover-text-primary btn-shadow"
                            data-action="remove" data-toggle="tooltip" title="Remove avatar">
                            <i class="ki ki-bold-close icon-xs text-muted"></i>
                        </span>
                    </div>
                </div>
            </div>
            <div class="row">
          
            @foreach($ItemImages as $ItemImage)
            <div class="col-lg-4">
            <div class="card">
            <img src="/uploads/items/{{$ItemImage->image}}" class="embed-responsive card-img-top">
            <input type="hidden" name="item_id" class="item_id" value="{{$ItemImage->id}}" />
            <input type="button" name="button-remover" value="Remove" class="button-remover" />
            </div>
            </div>
            @endforeach
           
            </div>
            <div class="form-group row">
                <div class="col-lg-4">
                    <label>Cover Image<span class="text-danger">*</span></label>
                    <div class="image-input image-input-empty image-input-outline" id="kt_image_4"
                        style="background-image: url({{$item->cover_image != null ?' /uploads/items/'.$item->cover_image : '/media/users/blank.png' }})">
                        <div class="image-input-wrapper"></div>

                        <label class="btn btn-xs btn-icon btn-circle btn-white btn-hover-text-primary btn-shadow"
                            data-action="change" data-toggle="tooltip" title="" data-original-title="Change avatar">
                            <i class="fa fa-pen icon-sm text-muted"></i>
                            <input type="file" name="cover_image" accept=".png, .jpg, .jpeg" />
                            <input type="hidden" name="profile_avatar_remove" />
                        </label>

                        <span class="btn btn-xs btn-icon btn-circle btn-white btn-hover-text-primary btn-shadow"
                            data-action="cancel" data-toggle="tooltip" title="Cancel avatar">
                            <i class="ki ki-bold-close icon-xs text-muted"></i>
                        </span>

                        <span class="btn btn-xs btn-icon btn-circle btn-white btn-hover-text-primary btn-shadow"
                            data-action="remove" data-toggle="tooltip" title="Remove avatar">
                            <i class="ki ki-bold-close icon-xs text-muted"></i>
                        </span>
                    </div>
                </div>
            </div>



            <div class="form-group row">
                <label class="col-form-label col-lg-3 col-sm-12 text-lg-right">File Type Validation</label>
                <div class="col-lg-4 col-md-9 col-sm-12">
                    <div class="dropzone dropzone-default dropzone-success dz-clickable" id="sssssss">
                        <div class="dropzone-msg dz-message needsclick">
                            <h3 class="dropzone-msg-title">Drop files here or click to upload.</h3>
                            <span class="dropzone-msg-desc">Only image, pdf and psd files are allowed for upload</span>
                        </div>
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
 
    $('#category_select').select2({
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
    $(function () {
    $('.button-remover').on('click', function () {
        var Status = $('[name="item_id"]') .val();
        console.log(Status);
        alert($('input[name=item_id]').val());

        $.ajax({
            url: 'Ajax/StatusUpdate.php',
            data: {
                text: $("textarea[name=Status]").val(),
                Status: Status
            },
            dataType : 'json'
        });
    });
});

</script>
@endsection
