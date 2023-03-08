{{-- Extends layout --}}
@extends('admin.layout.default')

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

<div class="ec-content-wrapper">
    <div class="content">
        <div class="breadcrumb-wrapper d-flex align-items-center justify-content-between">
            <div>
                <h1>Add Item</h1>
                <p class="breadcrumbs"><span><a href="{{route('dashboard')}}">Home</a></span>
                    <span><i class="mdi mdi-chevron-right"></i></span>Item</p>
            </div>
            <div>
                <a href="{{route('items')}}" class="btn btn-primary"> View All
                </a>
            </div>
        </div>
        @if($errors->any())
            <div class="alert alert-danger" style=" margin-top: 15px;">
                <strong>Whoops!</strong> There were some problems with your input.<br><br>
                <ul>
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <div class="row">
            <div class="col-12">
                <div class="card card-default">
                    <div class="card-header card-header-border-bottom">
                        <h2>Add Item</h2>
                    </div>
                    <form action="{{ url('items') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                    <div class="card-body">
                        <div class="row ec-vendor-uploads">
                            <div class="col-lg-4">
                                <div class="ec-vendor-img-upload">
                                    <div class="ec-vendor-main-img">
                                        <div class="avatar-upload">
                                            <p> Main Screen Image (You Can Add Multi Image)</p>
                                            <div class="avatar-edit">
                                                <input type="file" id="main_screen_image[]" name="main_screen_image[]" class="ec-image-upload" accept=".png, .jpg, .jpeg" multiple>
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
                                            <input type="text" class="form-control" name="name" value="{{old('name')}}"  id="name" required>
                                        </div>

                                        <div class="col-md-6">
                                            <label for="name_locale" class="form-label">Name local</label>
                                            <input type="text" class="form-control" value="{{old('name_locale')}}" name="name_locale">
                                        </div>

                                        <div class="col-md-6">
                                            <label class="form-label">Select Categories</label>
                                            <select class="form-control kt-select2 select2" id="category_select" name="category_id">

                                            </select>
                                        </div>
                                        <div class="col-md-6">
                                            <label class="form-label">Select Sub Categories</label>
                                            <select class="form-control kt-select2 select2" id="sub_category_select"  name="sub_category_id">
                                            </select>
                                        </div>

                                        <div class="col-md-6">
                                            <label class="form-label">Select Store</label>
                                            <select id="store_select" name="store_id" class="form-select">

                                            </select>
                                        </div>

                                        <div class="col-md-6">
                                        <label class="col-3 col-form-label">In stock<span class="text-danger">*</span></label>
                                            <div class="form-check form-check-inline">
                                            <input type="checkbox" name="in_stock" class="" checked="checked">
                                            </div>
                                        </div>

                                    <div class="col-md-6">
                                        <label>Attributes<span class="text-danger">*</span></label>
                                        <div class=" col-lg-12 col-md-12 col-sm-12">
                                            <select class="form-control kt-select2 select2" id="attributes_select" name="attributes[]"
                                                    multiple="multiple">
                                                @foreach($attributes as $attribute)
                                                    <option value="{{ $attribute['id'] }}">
                                                        {{ $attribute['name'] }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                    </div>

                                        <div class="col-md-6">
                                            <label for="price" class="form-label">Price</label>
                                            <input type="number" class="form-control" value="{{old('price')}}" name="price" id="price">
                                        </div>

                                        <div class="col-md-6">
                                            <label for="new_price" class="form-label">New Price</label>
                                            <input type="number" class="form-control slug-title" value="{{old('new_price')}}" name="new_price" id="new_price">
                                        </div>
                                        <div class="col-md-6">
                                            <label class="form-label">Description</label>
                                            <textarea class="form-control" name="description" value="{{old('description')}}" rows="4" required></textarea>
                                        </div>
                                        <div class="col-md-6">
                                            <label class="form-label">Description Locale</label>
                                            <textarea class="form-control" name="description_locale" value="{{old('description_locale')}}" rows="4"></textarea>
                                        </div>

                                        <div class="col-md-12" style=" margin-top: 2rem; ">
                                            <button type="submit" class="btn btn-primary">Submit</button>
                                        </div>
                                        </form>
                                </div>
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

    {{-- vendors --}}
    <!-- <script src="{{ asset('plugins/custom/datatables/datatables.bundle.js') }}" type="text/javascript"></script> -->

    {{-- page scripts --}}
    <script type="text/javascript">

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


        $( "#category_select" ).select2({

            ajax: {
                url: "{{ route('categoryAjax') }}",
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

        $( "#store_select" ).select2({

            ajax: {
                url: "{{ route('storeAjax') }}",
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

