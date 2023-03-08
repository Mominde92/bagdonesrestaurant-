{{-- Extends layout --}}
@extends('admin.layout.default')

{{-- Content --}}
@section('content')

<div class="ec-content-wrapper">
    <div class="content">
        <div class="breadcrumb-wrapper d-flex align-items-center justify-content-between">
            <div>
                <h1>Edit Items</h1>
                <p class="breadcrumbs"><span><a href="{{route('dashboard')}}">Home</a></span>
                    <span><i class="mdi mdi-chevron-right"></i></span>Items</p>
            </div>
            <div>
                <a href="{{url('items')}}" class="btn btn-primary"> View All </a>
            </div>
        </div>
        <div class="row">
            <div class="col-12">


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


                                </div>
                                <form action="{{ url('items/update' , $item) }}" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    @method('PUT')
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
                                                                    <img class="ec-image-preview" 
                                                                    @if($item->main_screen_image)
                                                                    src="{{asset('uploads/items/'.'/'. $item->main_screen_image)}}" 
                                                                    @else
                                                                    src="{{asset('admin/assets/img/products/vender-upload-thumb-preview.jpg')}}" 
                                                                    @endif
                                                                    alt="edit">
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
                                                                        <img class="image-thumb-preview ec-image-preview" 
                                                                
                                                                        @if($item->cover_image)
                                                                        src="{{asset('uploads/items/'.'/'. $item->cover_image)}}" 
                                                                        @else
                                                                        src="{{asset('admin/assets/img/products/vender-upload-thumb-preview.jpg')}}" 
                                                                        @endif
                                                                        alt="edit">
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
                                                        <input type="text" class="form-control" name="name"  id="name" value="{{$item->name}}" required>
                                                    </div>

                                                    <div class="col-md-6">
                                                        <label for="name_locale" class="form-label">Name local</label>
                                                        <input type="text" class="form-control" name="name_locale" value="{{$item->name_locale}}">
                                                    </div>

                                                    <div class="col-md-6">
                                                        <label class="form-label">Select Categories</label>
                                                        <select class="form-control kt-select2 select2" id="category_select" name="category_id">
                                                            <option value="{{$item->subCategory->parent_id}}">{{$item->subCategory->get_parent->name}}</option>

                                                        </select>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <label class="form-label">Select Sub Categories</label>
                                                        <select class="form-control kt-select2 select2" id="sub_category_select" name="sub_category_id">
                                                            <option value="{{$item->sub_category_id}}">{{$item->subCategory['name']}}</option>
                                                        </select>
                                                    </div>

                                                    <div class="col-md-6">
                                                        <label class="form-label">Select Store</label>
                                                        <select class="form-control kt-select2 select2" id="store_select" name="store_id" required>
                                                            @foreach($stores as $store)
                                                                <option value="{{ $store['id'] }}" <?= $item->store_id == $store['id'] ? 'selected="selected"' :'' ?> >
                                                                    {{ $store['name'] }}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>

                                                    <div class="col-md-6">
                                                        <label class="col-3 col-form-label">In stock<span class="text-danger">*</span></label>
                                                        <input type="checkbox" name="in_stock" <?=$item->in_stock ==1 ?'checked="checked"' :'' ?> />
                                                    </div>

                                                    <div class="col-md-6">
                                                        <label>Attributes<span class="text-danger">*</span></label>
                                                        <div class=" col-lg-12 col-md-12 col-sm-12">
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

                                                    <div class="col-md-6">
                                                    </div>

                                                    <div class="col-md-6">
                                                        <label for="price" class="form-label">Price</label>
                                                        <input type="text" class="form-control" name="price" value="{{$item->price}}" id="price">
                                                    </div>

                                                    <div class="col-md-6">
                                                        <label for="new_price" class="form-label">New Price</label>
                                                        <input type="text" class="form-control slug-title" name="new_price" value="{{$item->new_price}}" id="new_price">
                                                    </div>
                                                    <div class="col-md-6">
                                                        <label class="form-label">Description</label>
                                                        <textarea class="form-control" name="description" rows="4" required>{{$item->description}}</textarea>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <label class="form-label">Description Locale</label>
                                                        <textarea class="form-control" name="description_locale" rows="4">{{$item->description_locale}}</textarea>
                                                    </div>

                                    <div class="col-md-6">
                                     @foreach($ItemImages as $ItemImage)
                                            <div class="col-lg-4">
                                             <div class="card">
                                              <img src="{{asset('/uploads/items/'.$ItemImage->image)}}" class="embed-responsive card-img-top">
                                              <input type="hidden" name="item_id" class="item_id" value="{{asset('../uploads/items/'.$ItemImage->image)}}" />
                                              <input type="button" name="{{$ItemImage->image}}" value="Remove" class="button-remover" />
                                              <input type="hidden" name="_token" id="token" value="{{ csrf_token() }}">
                                                </div>
                                                        </div>
                                                    @endforeach
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
</div> <!-- End Content -->
</div>


</div>
@endsection


{{-- Scripts Section --}}
@section('scripts')
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

    var category_id = $('#category_select').val();

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


    $( "#category_select" ).select2({
        ajax: {
          url: "{{ url('/api/category/dataAjax') }}",
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


   
    $(function () {
    $('.button-remover').on('click', function () {
        var image = $(this).attr("name");

        $.ajax({
            type:'POST',
            url: '{{ url('/delete_image')}}',
            data: { 'image' : image},
            headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
            success:function(data){
                alert('Deleted');
                location.reload();

         }
        });
    });
});

</script>
@endsection
